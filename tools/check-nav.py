#!/usr/bin/env python3
"""CI gate for the shared nav. Fails the build rather than the website.

The site nav is ONE Apache SSI include at /_nav/{lang}.html (locked 2026-08-21). That is a huge
win - edit one file, every page changes - but it also means one bad commit can break every page at
once. This is the check that makes that trade safe.

WHAT IT ENFORCES

  1. Every page carries exactly one nav include, and it points at the language matching its folder.
     A German page including /_nav/en.html is a silent, sitewide-looking bug.

  2. No page has a site nav baked back into it. Checked by SIGNATURE (the logo link / mobile menu
     ids), NOT by the presence of a <nav> tag - seven Learn Hub index pages legitimately carry
     <nav aria-label="Section navigation">, an in-page anchor list, and failing those would train
     people to ignore this check.

  3. The include is hardened: #config errmsg="" so a missing file renders empty instead of
     printing Apache's error directive into the page, plus the fail-safe fetch that recovers the
     nav if SSI is ever switched off (in which case the include silently becomes an HTML comment).

  4. Every /_nav/{lang}.html referenced actually exists, is non-trivial, and has balanced div tags.

Exit 0 = safe. Exit 1 = do not merge.

Usage:  python tools/check-nav.py [--nav-dir PATH]
"""
import argparse
import os
import re
import sys

SKIP = {'includes', 'assets', 'data', 'node_modules', '.git', 'prompts',
        'maja-spec', 'api', 'joseph-instructions', '__pycache__', 'tools'}
LANG_FOLDERS = {'de', 'es', 'fr', 'it', 'nl', 'pt', 'hi'}

INCLUDE = re.compile(r'<!--#include virtual="/_nav/([a-z]{2})\.html" -->')
ERRMSG = re.compile(r'<!--#config errmsg="" -->')
FAILSAFE = re.compile(r'fetch\("/_nav/([a-z]{2})\.html"\)')
# The site nav's signature. Deliberately NOT "<nav" - see the docstring.
BAKED = re.compile(r'id="gm-logo-link"|id="gm-mobile-menu"')


def page_lang(rel):
    top = rel.replace('\\', '/').split('/')[0]
    return top if top in LANG_FOLDERS else 'en'


def main():
    ap = argparse.ArgumentParser()
    ap.add_argument('--root', default=os.path.dirname(os.path.dirname(os.path.abspath(__file__))))
    ap.add_argument('--nav-dir', default=None,
                    help='where /_nav lives; skipped if not given (it ships from the web repo)')
    args = ap.parse_args()

    errors = []
    checked = 0
    langs_used = set()

    for dp, dn, fn in os.walk(args.root):
        dn[:] = [d for d in dn if d not in SKIP and not d.startswith('.')]
        for f in fn:
            if not f.endswith(('.html', '.php')):
                continue
            p = os.path.join(dp, f)
            rel = os.path.relpath(p, args.root)
            with open(p, encoding='utf-8', errors='replace') as fh:
                src = fh.read()

            incs = INCLUDE.findall(src)
            if not incs:
                # A page with no nav at all is allowed (fragments, previews), but one that has a
                # BAKED nav and no include is exactly the regression this exists to stop.
                if BAKED.search(src):
                    errors.append('%s: site nav is baked into the page, and there is no include' % rel)
                continue

            checked += 1
            want = page_lang(rel)
            langs_used.add(want)

            if len(incs) > 1:
                errors.append('%s: %d nav includes, expected exactly 1' % (rel, len(incs)))
            if incs[0] != want:
                errors.append('%s: includes /_nav/%s.html but the page is "%s"'
                              % (rel, incs[0], want))
            if not ERRMSG.search(src):
                errors.append('%s: missing <!--#config errmsg="" -->; a missing nav file would '
                              'print Apache\'s error directive into the page' % rel)
            fs = FAILSAFE.findall(src)
            if not fs:
                errors.append('%s: missing the nav fail-safe fetch; if SSI is ever disabled this '
                              'page loses its nav silently' % rel)
            elif fs[0] != want:
                errors.append('%s: fail-safe fetches /_nav/%s.html, expected %s' % (rel, fs[0], want))
            if BAKED.search(src):
                errors.append('%s: has BOTH an include and a baked site nav' % rel)

    if args.nav_dir:
        for lang in sorted(langs_used):
            navf = os.path.join(args.nav_dir, lang + '.html')
            if not os.path.isfile(navf):
                errors.append('_nav/%s.html is MISSING and %d pages include it' % (lang, checked))
                continue
            with open(navf, encoding='utf-8', errors='replace') as fh:
                nav = fh.read()
            if len(nav) < 500:
                errors.append('_nav/%s.html is only %d bytes, looks truncated' % (lang, len(nav)))
            if nav.count('<div') != nav.count('</div>'):
                errors.append('_nav/%s.html has unbalanced div tags (%d open, %d close)'
                              % (lang, nav.count('<div'), nav.count('</div>')))

    print('nav check: %d pages with an include, %d language(s)' % (checked, len(langs_used)))
    if errors:
        print('\nFAILED - %d problem(s):' % len(errors))
        for e in errors[:40]:
            print('  %s' % e)
        if len(errors) > 40:
            print('  ... and %d more' % (len(errors) - 40))
        return 1
    print('OK - every page has one correct, hardened include.')
    return 0


if __name__ == '__main__':
    raise SystemExit(main())
