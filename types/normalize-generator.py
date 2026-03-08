import re

with open(r"C:\Users\info\Working\Website-Dev\learn-hub\types\generator.html", "r", encoding="utf-8") as f:
    html = f.read()

# 1. Remove pipe spans from all h2 headings
html = html.replace('<span class="text-gm-purple">|</span> ', '')

# 2. Hero description
html = html.replace(
    'This page summarizes Generator mechanics in Human Design. Generators are one of the five Types and, together with Manifesting Generators, comprise the majority of charts. They are defined by a connected Sacral center.',
    'This page is about the Human Design Generator Type. It explains the open and enveloping aura, the Strategy to wait to respond, Authorities for decision making, and how satisfaction and frustration show up in practice.'
)

# 3. Aura stat: ampersand to "and", lowercase
html = html.replace(
    'Open & Enveloping',
    'Open and enveloping'
)

# 4. Alt text: dash to period
html = html.replace(
    'alt="Human Design Generator Bodygraph chart - Jim Carrey"',
    'alt="Human Design Generator Bodygraph chart. Jim Carrey."'
)

# 5. Subheads: sentence case
html = html.replace(
    'What Response Feels Like',
    'What response feels like'
)
html = html.replace(
    'What Happens When Generators Initiate',
    'What happens when Generators initiate'
)

# 6. Strategy section: normalize quotes and hyphens in Sacral sounds
# "uh-huh" -> uh huh, "uhn-uhn" -> uh uh (matching user house style)
html = html.replace('"uh-huh"', 'uh huh')
html = html.replace('"uhn-uhn"', 'uh uh')
html = html.replace('"uh huh"', 'uh huh')
html = html.replace('"uhn uhn"', 'uh uh')

# 7. Strategy section: "yes/no" -> "yes or no"
html = html.replace('yes/no stimuli', 'yes or no stimuli')

# 8. Strategy section text tweaks
html = html.replace(
    '"Wait to respond" is the most misunderstood phrase in Human Design. Waiting to respond is not passivity. Stay present',
    'Wait to respond is often misunderstood. Waiting is not passivity. Stay present'
)

# 9. Strategy: "This response is always reliable" -> drop "always"
html = html.replace(
    'This response is always reliable, far more reliable',
    'This response is reliable, far more reliable'
)

# 10. Strategy: body-based -> body based
html = html.replace('body-based', 'body based')
html = html.replace('pre-mental', 'pre mental')

# 11. Strategy: "it is a motor response" - fix comma splice
html = html.replace(
    'It is not an emotion, it is a motor response.',
    'It is not an emotion. It is a motor response.'
)

# 12. Strategy: "what should I do" quote cleanup
html = html.replace(
    'thinking "what should I do with my life?" will not get a Sacral response - there is nothing to respond to. But a Generator who sees ten different options',
    'thinking what should I do with my life will not get a Sacral response because there is nothing to respond to. A Generator who sees several options'
)

# 13. Strategy: "clear, reliable guidance" -> "clear and reliable guidance"
html = html.replace('clear, reliable guidance', 'clear and reliable guidance')

# 14. Strategy initiation: "action versus inaction, it is" -> "action versus inaction. It is"
html = html.replace(
    'The distinction is not about action versus inaction, it is about',
    'The distinction is not action versus inaction. It is whether'
)

# 15. Authority section: restructure
html = html.replace(
    'While all Generators share the same Strategy (wait to respond), they can have different Authorities. Only two Authorities can appear with a defined Sacral:',
    'All Generators share the same Strategy. Wait to respond. There are two Authorities with a defined Sacral.'
)

html = html.replace(
    '<strong class="text-gray-800">Emotional Generators (Solar Plexus Authority):</strong> Let',
    '<strong class="text-gray-800">Emotional Generators have Solar Plexus Authority.</strong> Let'
)

html = html.replace(
    'The Sacral does not override Emotional Authority. It informs you, but timing comes from the Solar Plexus when it is defined.',
    'The Sacral does not override Emotional Authority. It informs you, but timing comes from the Solar Plexus when it is defined.'
)

html = html.replace(
    '<strong class="text-gray-800">Sacral Generators (Sacral Authority):</strong> Trust the immediate',
    '<strong class="text-gray-800">Sacral Generators have Sacral Authority.</strong> Trust the immediate'
)

# Clean up remaining quoted Sacral sounds in Authority
html = html.replace('"uh-huh" or "uhn-uhn."', 'uh huh or uh uh.')

# 16. Satisfaction section: quote cleanup
html = html.replace(
    """Satisfaction is the body's confirmation: "This is correct. This is what I am here to do.\"""",
    "Satisfaction is the body's confirmation. This is correct. This is what I am here to do."
)

# 17. Work section: "Re-engage" -> "Re engage"
html = html.replace('Re-engage', 'Re engage')

# 18. Work section: "engage-and-restore" -> "engage and restore"
html = html.replace('engage-and-restore', 'engage and restore')

# 19. Explore section: update experiment paragraph
html = html.replace(
    '<strong class="text-gray-800">The experiment:</strong> For one week, notice',
    '<strong class="text-gray-800">One week experiment.</strong> Notice'
)

# 20. Explore section: update celebrity paragraph
html = html.replace(
    """<strong class="text-gray-800">The celebrity database:</strong> Explore Generators in Genetic Matrix's 87,000+ celebrity database. Study how the Generator mechanic manifests in public figures across every field - from artists to athletes to entrepreneurs. See the pattern of response, mastery, and satisfaction playing out in real lives.""",
    """Explore the Genetic Matrix celebrity database to see Generator mechanics expressed across fields."""
)

# 21. JSON-LD: Replace old dual-block with @graph format
old_jsonld = """<script type="application/ld+json">
{"@context":"https://schema.org","@type":"Article","headline":"Generator in Human Design - Strategy & Authority","description":"A Generator has a defined Sacral Center. Learn the Generator Strategy, Authority, aura, Not-Self Theme of frustration, and the path to satisfaction.","publisher":{"@type":"Organization","name":"Genetic Matrix","url":"https://www.geneticmatrix.com"},"mainEntityOfPage":"https://www.geneticmatrix.com/learn/types/generator/","datePublished":"2025-01-15","dateModified":"2026-03-08"}
</script>
 <script type="application/ld+json">
{"@context":"https://schema.org","@type":"FAQPage","mainEntity":[
{"@type":"Question","name":"What is a Generator in Human Design?","acceptedAnswer":{"@type":"Answer","text":"A Generator has a defined Sacral Center. Together with Manifesting Generators, Sacral Types make up the majority of charts. Many sources quote about 37 percent for Generators, but exact percentages vary by source. Generators have sustainable life force designed to be used in response to life. Their Strategy is wait to respond, and their Signature is satisfaction."}},
{"@type":"Question","name":"What does 'wait to respond' actually mean?","acceptedAnswer":{"@type":"Answer","text":"It means allowing something from the outside world to engage the Sacral before committing energy. This is not passivity. It is trusting the body's response over mental analysis. The Sacral can answer with gut sounds like uh huh or uh uh, a physical pull or drop, warmth or flatness."}},
{"@type":"Question","name":"What is the difference between a Generator and a Manifesting Generator?","acceptedAnswer":{"@type":"Answer","text":"Both have a defined Sacral Center and both wait to respond. A Manifesting Generator also has a motor connected to the Throat, which gives more immediate expression and a tendency toward speed and rapid pivots. Generators tend to build steadily through sustained commitment. These are tendencies, not rules."}},
{"@type":"Question","name":"Why am I always frustrated?","acceptedAnswer":{"@type":"Answer","text":"Frustration is the Not-Self Theme for Generators. It often shows up when energy is committed without a true Sacral response, when the mind initiates, or when work no longer engages the life force. The practice is to honor the Sacral consistently. Over time, frustration gives way to satisfaction."}},
{"@type":"Question","name":"Can Generators be leaders and entrepreneurs?","acceptedAnswer":{"@type":"Answer","text":"Yes. Generators lead through response and stamina. Success tends to emerge by responding to real needs, building mastery, and creating from Sacral engagement rather than mental pushing."}},
{"@type":"Question","name":"What happens when a Generator does not use their energy?","acceptedAnswer":{"@type":"Answer","text":"Unused Sacral energy can feel like restlessness or a lingering buzz. Generators tend to sleep best after using their energy during the day. Satisfying activity supports deep sleep and natural regeneration."}},
{"@type":"Question","name":"How do Generators sleep?","acceptedAnswer":{"@type":"Answer","text":"Many find it helpful to go to bed when physically tired, after using Sacral energy, rather than by the clock alone. If lying down early, light activity or winding down can help the body discharge residual energy. During sleep the Sacral resets, so waking with fresh energy is common when the day was satisfying."}},
{"@type":"Question","name":"How do I explore Generator celebrities on Genetic Matrix?","acceptedAnswer":{"@type":"Answer","text":"Genetic Matrix has a searchable celebrity database that can be filtered by Type. Browsing Generator charts can illustrate how the mechanics show up across different lives and careers. Availability and features depend on the current Genetic Matrix offering."}}
]}
</script>"""

new_jsonld = """<script type="application/ld+json">
{"@context":"https://schema.org","@graph":[{"@type":"Article","@id":"https://www.geneticmatrix.com/learn/types/generator#article","mainEntityOfPage":{"@type":"WebPage","@id":"https://www.geneticmatrix.com/learn/types/generator"},"headline":"Human Design Generator Type: Strategy, Authority, Aura, Satisfaction","description":"Learn the Human Design Generator Type: wait to respond, open and enveloping aura, Generator Authorities, and how satisfaction and frustration work. Includes a one-week Generator experiment and practical tips. Create a free Foundation chart at Genetic Matrix to confirm Type and Authority.","author":{"@type":"Organization","name":"Genetic Matrix"},"publisher":{"@type":"Organization","name":"Genetic Matrix","logo":{"@type":"ImageObject","url":"https://www.geneticmatrix.com/favicon.ico"}}},{"@type":"FAQPage","@id":"https://www.geneticmatrix.com/learn/types/generator#faq","mainEntity":[{"@type":"Question","name":"What is a Generator in Human Design?","acceptedAnswer":{"@type":"Answer","text":"A Generator has a defined Sacral Center. Together with Manifesting Generators, Sacral Types make up the majority of charts. Many sources quote about 37 percent for Generators, but exact percentages vary by source. Generators have sustainable life force designed to be used in response to life. Strategy is wait to respond. Signature is satisfaction."}},{"@type":"Question","name":"What does wait to respond actually mean?","acceptedAnswer":{"@type":"Answer","text":"It means allowing something from the outside world to engage the Sacral before committing energy. This is not passivity. It is trusting the body's response over mental analysis. The Sacral can answer with gut sounds like uh huh or uh uh, a physical pull or drop, warmth or flatness."}},{"@type":"Question","name":"What is the difference between a Generator and a Manifesting Generator?","acceptedAnswer":{"@type":"Answer","text":"Both have a defined Sacral Center and both wait to respond. A Manifesting Generator also has a motor to the Throat, which gives more immediate expression and a tendency toward speed and rapid pivots. Generators tend to build steadily through sustained commitment. These are tendencies, not rules."}},{"@type":"Question","name":"Why am I always frustrated?","acceptedAnswer":{"@type":"Answer","text":"Frustration is the Not-Self Theme for Generators. It often shows up when energy is committed without a true Sacral response, when the mind initiates, or when work no longer engages the life force. The practice is to honor the Sacral consistently. Over time, frustration gives way to satisfaction."}},{"@type":"Question","name":"Can Generators be leaders and entrepreneurs?","acceptedAnswer":{"@type":"Answer","text":"Yes. Generators lead through response and stamina. Success tends to emerge by responding to real needs, building mastery, and creating from Sacral engagement rather than mental pushing."}},{"@type":"Question","name":"What happens when a Generator does not use their energy?","acceptedAnswer":{"@type":"Answer","text":"Unused Sacral energy can feel like restlessness or a lingering buzz. Generators tend to sleep best after using their energy during the day. Satisfying activity supports deep sleep and natural regeneration."}},{"@type":"Question","name":"How do Generators sleep?","acceptedAnswer":{"@type":"Answer","text":"Many find it helpful to go to bed when physically tired, after using Sacral energy, rather than by the clock alone. If lying down early, light activity or winding down can help the body discharge residual energy. During sleep the Sacral resets, so waking with fresh energy is common when the day was satisfying."}},{"@type":"Question","name":"How do I explore Generator celebrities on Genetic Matrix?","acceptedAnswer":{"@type":"Answer","text":"Genetic Matrix has a searchable celebrity database that can be filtered by Type. Browsing Generator charts can illustrate how the mechanics show up across different lives and careers. Availability and features depend on the current Genetic Matrix offering."}}]}]}
</script>"""

html = html.replace(old_jsonld, new_jsonld)

# 22. Key Insight: remove quotes around "wait to respond"
html = html.replace(
    """This is why the Strategy is "wait to respond." It is not passivity.""",
    "This is why the Strategy is wait to respond. It is not passivity."
)

# 23. Work section: em dash in "from artists to athletes" - rewrite
html = html.replace(' - from artists to athletes to entrepreneurs. See the pattern of response, mastery, and satisfaction playing out in real lives.', '')

with open(r"C:\Users\info\Working\Website-Dev\learn-hub\types\generator.html", "w", encoding="utf-8") as f:
    f.write(html)

print("Generator normalized.")
