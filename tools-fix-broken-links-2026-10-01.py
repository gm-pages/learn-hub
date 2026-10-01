"""Fix the Learn Hub's broken links to pages outside the Learn Hub (Mark's report, 1 Oct 2026).

Usage: python fix_lh_links.py <learn-hub root> [--dry]
Runs on the repo copy AND, unchanged, on the live server's learn-hub folder, so live keeps its own
files and only these exact links change. Every file is backed up by the caller first.

Per file, the language comes from its first folder (de/es/fr/it/nl/pt, else English) and every
replacement points at that language's own page:
  /calculations/<slug>/        -> /learn-hub[/lang]/calculations/<slug>.html   (only if the page exists)
  /astrology/sabian-symbols/   -> /learn-hub[/lang]/astrology/sabian-symbols.html
  /dictionary/dictionary.html  -> /learn-hub[/lang]/dictionary/dictionary.html
  /types/                      -> /learn-hub[/lang]/types/   (the server sent English visitors to French)
  /types/<slug>/               -> /learn-hub[/lang]/types/<slug>.html
  celebrities/index.html: the "Browse by Category" section is removed; its 12 cards point at
  category pages that were never built.
Mockups and the joseph-instructions folder are left alone (not served pages).
"""
import io, os, re, sys

root = sys.argv[1]
dry = '--dry' in sys.argv
LANGS = {'de', 'es', 'fr', 'it', 'nl', 'pt'}
SKIP = ('mockups', 'joseph-instructions', 'includes', '.git', 'node_modules')
total = 0
changed_files = []

for dp, dns, fns in os.walk(root):
    dns[:] = [d for d in dns if d not in SKIP]
    for fn in fns:
        if not fn.endswith('.html'):
            continue
        path = os.path.join(dp, fn)
        rel = os.path.relpath(path, root).replace('\\', '/')
        first = rel.split('/')[0]
        lang = first if first in LANGS else ''
        pre = '/learn-hub/' + (lang + '/' if lang else '')
        lroot = os.path.join(root, lang) if lang else root
        raw = io.open(path, encoding='utf-8', newline='').read()
        s = raw
        n = 0

        def calc(m):
            global n
            slug = m.group(1)
            if not os.path.exists(os.path.join(lroot, 'calculations', slug + '.html')):
                return m.group(0)
            n += 1
            return 'href="%scalculations/%s.html"' % (pre, slug)

        s = re.sub(r'href="/calculations/([a-z0-9-]+)/"', calc, s)

        def simple(old, new):
            global s, n
            c = s.count(old)
            if c:
                s = s.replace(old, new)
                n += c

        simple('href="/astrology/sabian-symbols/"', 'href="%sastrology/sabian-symbols.html"' % pre)
        simple('href="/dictionary/dictionary.html"', 'href="%sdictionary/dictionary.html"' % pre)
        simple('href="/types/"', 'href="%stypes/"' % pre)

        def typ(m):
            global n
            slug = m.group(1)
            if not os.path.exists(os.path.join(lroot, 'types', slug + '.html')):
                return m.group(0)
            n += 1
            return 'href="%stypes/%s.html"' % (pre, slug)

        s = re.sub(r'href="/types/([a-z-]+)/"', typ, s)

        if rel.endswith('celebrities/index.html'):
            m = re.search(r'[ \t]*<!-- Browse by Category -->\r?\n[\s\S]*?</section>\r?\n\r?\n?', s)
            if m and m.group(0).count('href="/celebrities/') == 12:
                s = s[:m.start()] + s[m.end():]
                n += 1
            elif 'href="/celebrities/type/"' in s:
                print('!! could not remove the Browse by Category section in', rel)

        if s != raw:
            total += n
            changed_files.append((rel, n))
            if not dry:
                io.open(path, 'w', encoding='utf-8', newline='').write(s)

for rel, n in sorted(changed_files):
    print('%3d  %s' % (n, rel))
print('files changed:', len(changed_files), ' replacements:', total, '(dry run)' if dry else '')
