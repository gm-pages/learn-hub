with open(r"C:\Users\info\Working\Website-Dev\learn-hub\types\manifestor.html", "r", encoding="utf-8") as f:
    html = f.read()

# 1. Remove pipe spans from all h2 headings
html = html.replace('<span class="text-gm-purple">|</span> ', '')

# 2. Meta description: add "the"
html = html.replace(
    'a motor to Throat',
    'a motor to the Throat'
)

# 3. Aura stat: ampersand to "and", lowercase
html = html.replace(
    'Closed & Repelling',
    'Closed and repelling'
)

# 4. Percentage: "nine percent" to "9 percent" everywhere
html = html.replace('nine percent', '9 percent')

# 5. Subheads: sentence case
html = html.replace(
    'Why Informing Feels Hard',
    'Why informing feels hard'
)
html = html.replace(
    'Who to Inform',
    'Who to inform'
)

with open(r"C:\Users\info\Working\Website-Dev\learn-hub\types\manifestor.html", "w", encoding="utf-8") as f:
    f.write(html)

print("Manifestor normalized.")
