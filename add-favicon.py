import glob
import os

favicon_tag = '<link rel="icon" href="/favicon.ico" type="image/x-icon">'
base = r"C:\Users\info\Working\Website-Dev\learn-hub"

# Find all HTML files except includes/ and partials
html_files = glob.glob(os.path.join(base, "**", "*.html"), recursive=True)

# Skip includes folder and build scripts
skip = ["includes", "index_preview.html"]

updated = 0
skipped = 0
already = 0

for fpath in sorted(html_files):
    rel = os.path.relpath(fpath, base)

    # Skip includes folder
    if any(s in rel for s in skip):
        skipped += 1
        continue

    with open(fpath, "r", encoding="utf-8") as f:
        content = f.read()

    # Skip if already has favicon
    if 'rel="icon"' in content or "rel='icon'" in content:
        already += 1
        print(f"  SKIP (already has favicon): {rel}")
        continue

    # Skip if no <head> tag (not a full HTML page)
    if "<head>" not in content and "<HEAD>" not in content:
        skipped += 1
        print(f"  SKIP (no <head>): {rel}")
        continue

    # Insert favicon after <meta charset="UTF-8"> line
    if '<meta charset="UTF-8">' in content:
        content = content.replace(
            '<meta charset="UTF-8">',
            '<meta charset="UTF-8">\n ' + favicon_tag
        )
    elif '<meta charset="utf-8">' in content:
        content = content.replace(
            '<meta charset="utf-8">',
            '<meta charset="utf-8">\n ' + favicon_tag
        )
    else:
        # Fallback: insert after <head>
        content = content.replace("<head>", "<head>\n " + favicon_tag)

    with open(fpath, "w", encoding="utf-8") as f:
        f.write(content)

    updated += 1
    print(f"  UPDATED: {rel}")

print(f"\nDone. Updated: {updated}, Already had favicon: {already}, Skipped: {skipped}")
