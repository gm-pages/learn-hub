import glob, os

base = r"C:\Users\info\Working\Website-Dev\learn-hub"
html_files = glob.glob(os.path.join(base, "**", "*.html"), recursive=True)

updated = 0
for fpath in sorted(html_files):
    rel = os.path.relpath(fpath, base)
    if "includes" in rel or "index_preview" in rel:
        continue

    with open(fpath, "r", encoding="utf-8") as f:
        content = f.read()

    # Replace non-www with www, but avoid double-www
    # Match https://geneticmatrix.com (without www) and replace with https://www.geneticmatrix.com
    new_content = content.replace("https://geneticmatrix.com", "https://www.geneticmatrix.com")

    if new_content != content:
        with open(fpath, "w", encoding="utf-8") as f:
            f.write(new_content)
        count = content.count("https://geneticmatrix.com") - content.count("https://www.geneticmatrix.com")
        print(f"  FIXED {count} refs: {rel}")
        updated += 1

print(f"\nDone. Fixed {updated} files.")
