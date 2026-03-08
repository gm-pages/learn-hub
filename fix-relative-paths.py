"""
Fix all relative paths for Vercel trailingSlash: true compatibility.

With trailingSlash enabled, /types/generator/ makes relative paths resolve
one level deeper than expected. Convert all relative href/src to root-relative.
"""
import os
import re
import glob

ROOT = os.path.dirname(os.path.abspath(__file__))

def fix_file(filepath):
    rel = os.path.relpath(filepath, ROOT).replace('\\', '/')
    parts = rel.split('/')

    # Skip root-level files (index.html etc) - they don't have ../ issues
    if len(parts) < 2:
        return

    section = parts[0]  # e.g. 'types', 'profiles', 'astrology'
    filename = parts[-1]  # e.g. 'generator.html', 'index.html'
    is_index = filename == 'index.html'

    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()

    original = content

    # 1. Fix ../index.html -> / (Learn Hub root - used in nav "Learn" link)
    content = content.replace('href="../index.html"', 'href="/"')

    # 2. Fix ../ links to other sections: ../centers/ -> /centers/
    #    ../profiles/ -> /profiles/, ../centers/index.html -> /centers/
    content = re.sub(
        r'href="\.\./([^"]+?)(?:/index\.html|/)"',
        lambda m: f'href="/{m.group(1)}/"',
        content
    )
    # Also handle ../section/page.html -> /section/page/ (cleanUrls)
    content = re.sub(
        r'href="\.\./([^"]+?)\.html"',
        lambda m: f'href="/{m.group(1)}/"',
        content
    )

    # For non-index pages only (sub-pages like generator.html, profile-1-3.html):
    if not is_index:
        # 3. Fix sibling links: href="generator.html" -> href="/types/generator/"
        content = re.sub(
            r'href="(?!/)(?!http)(?!\.\.)(?!#)([^"]+?)\.html"',
            lambda m: f'href="/{section}/{m.group(1)}/"',
            content
        )

        # 4. Fix href="index.html" -> href="/section/"
        # (already covered by rule 3, but just in case)

        # 5. Fix image src: src="/types/images/ already done, but catch any remaining
        content = re.sub(
            r'src="(?!/)(?!http)(?!\.\.)images/',
            f'src="/{section}/images/',
            content
        )

    if content != original:
        with open(filepath, 'w', encoding='utf-8') as f:
            f.write(content)
        print(f"  Fixed: {rel}")
    else:
        print(f"  OK:    {rel}")

# Process all HTML files in subdirectories
for html_file in sorted(glob.glob(os.path.join(ROOT, '*', '*.html'))):
    if 'node_modules' in html_file or 'includes' in html_file:
        continue
    fix_file(html_file)

print("\nDone!")
