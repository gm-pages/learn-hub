import re

with open(r"C:\Users\info\Working\Website-Dev\learn-hub\types\projector.html", "r", encoding="utf-8") as f:
    html = f.read()

# 1. Remove pipe spans from all h2 headings
html = html.replace('<span class="text-gm-purple">|</span> ', '')

# 2. Meta description: add "the" in motor phrasing
html = html.replace(
    'no motor to Throat',
    'no motor to the Throat'
)

# 3. Hero description
html = html.replace(
    'This page summarizes Projector mechanics in Human Design. Projectors are one of the five Types, defined by an undefined Sacral Center and no motor connected to the Throat. They make up approximately 20% of charts.',
    'This page is about the Human Design Projector Type. It explains the focused and absorbing aura, the Strategy to wait for the invitation, Authorities for decision making, and how success and bitterness show up in practice.'
)

# 4. Aura stat: ampersand to "and", lowercase
html = html.replace(
    'Focused & Absorbing',
    'Focused and absorbing'
)

# 5. Alt text: dash to period
html = html.replace(
    'alt="Human Design Projector Bodygraph chart with undefined Sacral Center - Mark Zuckerberg"',
    'alt="Human Design Projector Bodygraph chart with undefined Sacral Center. Mark Zuckerberg."'
)

# 6. What is section: motor phrasing
html = html.replace(
    'no motor-to-Throat connection',
    'no motor to the Throat'
)

# 7. What is section: percentage
html = html.replace(
    'About one fifth of charts are Projectors',
    'About 20 percent of charts are Projectors'
)

# 8. Subheads: sentence case
html = html.replace(
    'Recognition Before Invitation',
    'Recognition before invitation'
)
html = html.replace(
    'When Guidance Is Uninvited',
    'When guidance is uninvited'
)

# 9. Authority: colons to periods, case changes
html = html.replace(
    '<strong class="text-gray-800">Emotional Authority:</strong> Solar Plexus defined.',
    '<strong class="text-gray-800">Emotional Authority.</strong> Solar Plexus defined.'
)
html = html.replace(
    '<strong class="text-gray-800">Splenic Authority:</strong> Instant',
    '<strong class="text-gray-800">Splenic Authority.</strong> Instant'
)
html = html.replace(
    '<strong class="text-gray-800">Ego Projected Authority:</strong> Will',
    '<strong class="text-gray-800">Ego projected Authority.</strong> Will'
)
html = html.replace(
    '<strong class="text-gray-800">Self-Projected Authority:</strong> Identity',
    '<strong class="text-gray-800">Self projected Authority.</strong> Identity'
)
html = html.replace(
    '<strong class="text-gray-800">Mental or Environmental Authority:</strong> No',
    '<strong class="text-gray-800">Mental or environmental Authority.</strong> No'
)

# 10. Energy section: colon to periods
html = html.replace(
    'honor natural rhythms: concentrated effort when energy is present, rest and study when it is not.',
    'honor natural rhythms. Concentrated effort when energy is present. Rest and study when it is not.'
)

# 11. JSON-LD: fix motor phrasing
html = html.replace(
    'no motor-to-Throat connection',
    'no motor to the Throat'
)

with open(r"C:\Users\info\Working\Website-Dev\learn-hub\types\projector.html", "w", encoding="utf-8") as f:
    f.write(html)

print("Projector normalized.")
