import glob, os, re

base = r"C:\Users\info\Working\Website-Dev\learn-hub"
html_files = glob.glob(os.path.join(base, "**", "*.html"), recursive=True)

issues = []
for fpath in sorted(html_files):
    rel = os.path.relpath(fpath, base)
    if "includes" in rel or "index_preview" in rel:
        continue
    with open(fpath, "r", encoding="utf-8") as f:
        content = f.read()

    # Check for localhost references
    if "localhost" in content:
        issues.append(f"{rel}: contains localhost reference")

    # Check for local file paths
    if "file://" in content:
        issues.append(f"{rel}: contains file:// path")

    # Check for .php references that are local (not on geneticmatrix.com)
    php_refs = re.findall(r'href=["\']([^"\']*\.php[^"\']*)["\']', content)
    for ref in php_refs:
        if "geneticmatrix.com" not in ref:
            issues.append(f"{rel}: local .php link: {ref}")

    # Check canonical and og:url use correct domain
    canonicals = re.findall(r'rel="canonical"\s+href="([^"]*)"', content)
    for c in canonicals:
        if "geneticmatrix.com" not in c:
            issues.append(f"{rel}: canonical not on geneticmatrix.com: {c}")

    og_urls = re.findall(r'property="og:url"\s+content="([^"]*)"', content)
    for o in og_urls:
        if "geneticmatrix.com" not in o:
            issues.append(f"{rel}: og:url not on geneticmatrix.com: {o}")

if issues:
    print("ISSUES FOUND:")
    for i in issues:
        print(f"  {i}")
else:
    print("No issues found - all links look clean for live deployment")

# Domain references
print()
print("Domain references across all files:")
domains = {}
for fpath in sorted(html_files):
    rel = os.path.relpath(fpath, base)
    if "includes" in rel or "index_preview" in rel:
        continue
    with open(fpath, "r", encoding="utf-8") as f:
        content = f.read()
    for match in re.findall(r"https?://[a-zA-Z0-9.-]+", content):
        if match not in domains:
            domains[match] = 0
        domains[match] += 1

for d, count in sorted(domains.items(), key=lambda x: -x[1]):
    print(f"  {d}: {count} references")
