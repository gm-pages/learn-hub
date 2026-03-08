import re

filepath = r"C:\Users\info\Working\Website-Dev\learn-hub\types\reflector.html"

# Read with binary mode to preserve original line endings, then normalize to \n for replacements
with open(filepath, "rb") as f:
    raw = f.read()

has_crlf = b"\r\n" in raw
html = raw.decode("utf-8")
if has_crlf:
    html = html.replace("\r\n", "\n")

# ── 1. Meta tags ──

html = html.replace(
    '<title>Reflector in Human Design - The Lunar Cycle, Open Centers & the Path to Surprise | Genetic Matrix</title>',
    '<title>Reflector in Human Design - Strategy &amp; Authority | Genetic Matrix</title>'
)

html = html.replace(
    '<meta name="description" content="Reflectors make up just 1% of humanity - the rarest Type with no defined centers. Learn the Reflector Strategy (wait a lunar cycle), Lunar Authority, sampling aura, not-self theme of disappointment, and the path to surprise and delight.">',
    '<meta name="description" content="A Reflector has all Centers undefined and no motor to the Throat. Learn Reflector Strategy (wait a lunar cycle), Authority, sampling and resistant aura, and the path to surprise.">'
)

html = html.replace(
    '<meta property="og:title" content="Reflector in Human Design - The Mirror of Humanity">',
    '<meta property="og:title" content="Human Design Reflector Type - Strategy, Authority &amp; Aura">'
)

html = html.replace(
    '<meta property="og:description" content="Reflectors are the rarest Type - no defined centers, completely open. Learn Strategy, Lunar Authority, and how the Moon guides their decisions.">',
    '<meta property="og:description" content="Reflectors are the rarest Type with all Centers undefined. Learn Strategy, Lunar Authority, and how the Moon guides decisions.">'
)

# ── 2. JSON-LD: replace both script blocks with single @graph block ──

new_jsonld = ''' <script type="application/ld+json">
{"@context":"https://schema.org","@graph":[{"@type":"Article","@id":"https://www.geneticmatrix.com/learn/types/reflector#article","mainEntityOfPage":{"@type":"WebPage","@id":"https://www.geneticmatrix.com/learn/types/reflector"},"headline":"Human Design Reflector Type: Strategy, Authority, Aura, Surprise","description":"Learn the Human Design Reflector Type: wait a lunar cycle, sampling and resistant aura, Lunar Authority, and how surprise and disappointment work. Includes a one-month Reflector experiment and practical tips. Create a free Foundation chart at Genetic Matrix to confirm Type and Authority.","author":{"@type":"Organization","name":"Genetic Matrix"},"publisher":{"@type":"Organization","name":"Genetic Matrix","logo":{"@type":"ImageObject","url":"https://www.geneticmatrix.com/favicon.ico"}}},{"@type":"FAQPage","@id":"https://www.geneticmatrix.com/learn/types/reflector#faq","mainEntity":[{"@type":"Question","name":"What is a Reflector in Human Design?","acceptedAnswer":{"@type":"Answer","text":"A Reflector has all Centers undefined and no motor to the Throat by definition. About 1 percent of the population. Strategy is to wait a lunar cycle. Signature is surprise. The aura is sampling and resistant."}},{"@type":"Question","name":"Do Reflectors really need a full month to decide?","acceptedAnswer":{"@type":"Answer","text":"For big decisions, yes, because the lunar cycle reveals a complete pattern. For small daily choices, follow what feels light and clear, and keep options open."}},{"@type":"Question","name":"Why does environment matter so much?","acceptedAnswer":{"@type":"Answer","text":"With all Centers undefined, your body mirrors the field you are in. The right place feels clear and supportive. The wrong place feels draining or confusing. Change place first, then reassess."}},{"@type":"Question","name":"How can friends and partners support a Reflector?","acceptedAnswer":{"@type":"Answer","text":"Offer time and space, avoid pressuring quick decisions, and be a sounding board in calm environments. Expect variability and appreciate accurate reflection."}},{"@type":"Question","name":"Can Reflectors lead or run companies?","acceptedAnswer":{"@type":"Answer","text":"Yes, in roles that emphasize evaluation, timing, and environment curation. Effective leadership centers on asking the right questions, mirroring truth, and sensing readiness."}},{"@type":"Question","name":"Why do I feel so different day to day?","acceptedAnswer":{"@type":"Answer","text":"You are sampling people and transits. Variability is part of the design. Track your month and build routines that flex with your tone instead of fighting it."}}]}]}
</script>'''

html = re.sub(
    r' <script type="application/ld\+json">.*?</script>\n <script type="application/ld\+json">.*?</script>',
    new_jsonld,
    html,
    flags=re.DOTALL
)

# ── 3. Hero changes ──

# Hero description
html = html.replace(
    'The mirror of humanity. With no defined centers at all, Reflectors are the most open, the most sensitive, and the most fundamentally different Type. They take in the world, amplify it, and reflect it back - serving as barometers for the health of their communities.',
    'This page is about the Human Design Reflector Type. It explains the sampling and resistant aura, the Strategy to wait a lunar cycle, Authorities for decision making, and how surprise and disappointment show up in practice.'
)

# Population stat -> Aura stat (use regex to handle variable whitespace between divs)
html = re.sub(
    r'(<div class="text-\[10px\] uppercase tracking-widest text-gray-400 font-semibold mb-0\.5">)Population(</div>\s*<div class="text-sm text-white font-semibold">)~1%(</div>)',
    r'\g<1>Aura\g<2>Resistant and sampling\g<3>',
    html
)

# Alt text
html = html.replace(
    'alt="Human Design Reflector Bodygraph chart - Richard Burton"',
    'alt="Human Design Reflector Bodygraph chart. Richard Burton."'
)

# ── 4. Remove Doctrine box ──

html = re.sub(
    r'\n <!-- ==================== DOCTRINE BOX ==================== -->.*?</section>\n',
    '\n',
    html,
    flags=re.DOTALL
)

# ── 5. Remove Quick Facts ──

html = re.sub(
    r'\n <!-- ==================== QUICK FACTS ==================== -->.*?</section>\n',
    '\n',
    html,
    flags=re.DOTALL
)

# ── 6. Content sections ──

# What Is a Reflector?
old_what_is = '''<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6"><span class="text-gm-purple">|</span> What Is a Reflector?</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">A Reflector is someone with <strong class="text-gray-800">no defined centers</strong>. All nine centers in their Bodygraph are open - completely white. This is the rarest configuration in Human Design, occurring in approximately 1% of the population. It creates a being unlike any other Type.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">With no fixed definition, Reflectors have no consistent energy pattern of their own. Instead, they <strong class="text-gray-800">sample and amplify</strong> the energy of everyone and everything around them. In a room full of Generators, a Reflector absorbs and amplifies Sacral energy. With a Manifestor, they take on initiating energy. Alone, they return to a kind of energetic baseline that is fluid, open, and deeply sensitive.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">This openness is not weakness. It is the Reflector's extraordinary gift. They experience all possible configurations of energy - which means they can see what is healthy and what is not, what is working and what is broken. They are the <strong class="text-gray-800">mirrors and barometers of their communities</strong>.</p>
 <div class="bg-gm-card-active border-l-4 border-gm-purple rounded-r-lg p-5 my-6">
 <p class="text-xs font-semibold text-gm-purple uppercase tracking-widest mb-2">Key Insight</p>
 <p class="text-gm-text text-sm leading-relaxed italic">The Reflector's greatest challenge is identity. In a world that values consistency - "know who you are, be the same person every day" - the Reflector's fluid nature can feel like a problem. It is not. Consistency is not their design. Their identity is in the reflection itself: the ability to show others what they cannot see about themselves.</p>
 </div>'''

new_what_is = '''<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">What Is a Reflector?</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">A Reflector has <strong class="text-gray-800">no defined Centers</strong>. All nine Centers in the Bodygraph are open and white. This is the rarest configuration in Human Design, occurring in about 1 percent of the population. With no fixed definition, there is no consistent inner energy pattern. Reflectors sample and amplify the energy of everyone and everything around them.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">In a room full of <a href="generator.html" class="text-gm-purple hover:underline">Generators</a>, a Reflector absorbs and amplifies Sacral energy. With a <a href="manifestor.html" class="text-gm-purple hover:underline">Manifestor</a>, they take on initiating tone. Alone, they return to a fluid, open, and sensitive baseline.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">This openness is not weakness. It is the Reflector's gift. By experiencing many configurations of energy, they can see what is healthy and what is not, what is working and what is broken. They serve as mirrors and barometers for their communities.</p>
 <div class="bg-gm-card-active border-l-4 border-gm-purple rounded-r-lg p-5 my-6">
 <p class="text-xs font-semibold text-gm-purple uppercase tracking-widest mb-2">Key Insight</p>
 <p class="text-gm-text text-sm leading-relaxed italic">Identity is the central Reflector challenge. Culture prizes consistency, know who you are and be the same every day. That is not this design. The Reflector's identity lives in reflection itself, the capacity to show others what they cannot see about themselves.</p>
 </div>'''

html = html.replace(old_what_is, new_what_is)

# Strategy section
old_strategy = '''<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6"><span class="text-gm-purple">|</span> Strategy: Wait a Lunar Cycle</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">The Reflector's Strategy for major decisions is to <strong class="text-gray-800">wait a full lunar cycle - approximately 28 to 29 days</strong>. This sounds extreme, and it is. But it is rooted in mechanics.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">The Moon moves through all 64 Gates in approximately 28 days. As it transits, it activates different centers and channels in the Reflector's completely open chart. On one day, the Reflector might feel certain about a decision. A week later, with different activations, they might feel completely different. By waiting the full cycle, the Reflector experiences all possible activations and can identify <strong class="text-gray-800">what remains consistent</strong> versus what was temporary conditioning from a transit.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">This does not mean Reflectors cannot make any decisions for 28 days. Small, everyday choices do not require the full cycle. But for major life decisions - career changes, relationships, moves - the lunar cycle provides the clarity that no other process can.</p>
 <h3 class="text-lg font-semibold text-gray-800 mt-8 mb-3">Tracking the Moon</h3>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Reflectors benefit enormously from tracking the Moon's transit through their chart. Knowing which Gates and Centers are activated on any given day helps them distinguish between their own consistent knowing and the influence of the current transit. Over time, patterns emerge - certain lunar activations consistently bring clarity, while others bring confusion. This is invaluable self-knowledge.</p>'''

new_strategy = '''<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">Strategy: wait a lunar cycle</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">For major decisions, the Strategy is to wait a full lunar cycle, about 28 to 29 days. Across a month, the Moon moves through the 64 Gates and temporarily activates different Centers and Channels in the Reflector's open chart. A choice that feels certain on one day can feel different a week later. Time reveals what stays consistent after many activations and what was only a passing influence.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Use the lunar cycle for big moves such as career changes, commitments, relocations, and major relationships. Daily choices can remain light and exploratory. Tell close people your rhythm so they understand that time is your clarity.</p>
 <h3 class="text-lg font-semibold text-gray-800 mt-8 mb-3">Tracking the Moon</h3>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Many Reflectors benefit from tracking the Moon's transit through their chart. Note which Gates and Centers are active each day. Over time, patterns emerge. Certain activations bring clarity, others bring fog. This becomes practical self knowledge that supports timing.</p>'''

html = html.replace(old_strategy, new_strategy)

# Aura section
old_aura = '''<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6"><span class="text-gm-purple">|</span> The Reflector Aura</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">The Reflector aura is <strong class="text-gray-800">resistant and sampling</strong>. It samples the energy of others without fully absorbing it in the way that Projectors absorb. There is a Teflon-like quality - the energy comes in, is reflected back, and does not stick permanently. This is what makes Reflectors such effective mirrors: they show others their own energy without taking it on as their own identity.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">The sampling quality means Reflectors experience each person's energy vividly - they can feel what a Generator feels, sense what a Manifestor is about to do, perceive a Projector's gift. But because the energy does not stick, the Reflector is always moving, always shifting, always reflecting something new.</p>'''

new_aura = '''<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">The Reflector aura</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">The aura is <strong class="text-gray-800">resistant and sampling</strong>. It takes in energy to test it and reflects it back without it sticking. In healthy environments, others feel neutrally seen around a Reflector. If a space is off, Reflectors often sense it first.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Because the aura is not penetrating or enveloping, people may project expectations or try to define Reflectors. Boundaries and place hygiene are essential. Leave when a place feels wrong. Choose venues and groups that leave the body at ease.</p>'''

html = html.replace(old_aura, new_aura)

# Surprise and Disappointment section
old_surprise = '''<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6"><span class="text-gm-purple">|</span> Surprise and Disappointment</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Surprise</strong> is the Reflector's signature. When a Reflector is in the right environment, surrounded by healthy energy, living according to their lunar Strategy, life unfolds in ways that continually surprise and delight them. The surprise comes from the Reflector's openness: because they are not fixed in any configuration, life can bring them experiences that no other Type can access.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Disappointment</strong> is the not-self theme. Reflectors become disappointed when they are in the wrong environment, when they make decisions too quickly (without waiting the lunar cycle), or when they try to be consistent in a way that is not their design. Disappointment often accumulates slowly - a gradual realization that life is not delivering what was expected.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">The most common source of Reflector disappointment is environment. Because they take in and amplify everything around them, being in the wrong place - the wrong city, the wrong office, the wrong community - creates a persistent sense that something is off. Finding the right environment is the single most transformative thing a Reflector can do.</p>'''

new_surprise = '''<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">Surprise and disappointment</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Surprise</strong> is the Signature. It is the fresh delight that appears when environment is correct and timing is honored.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Disappointment</strong> is the Not-Self Theme. It signals rushed timing, false expectations, or staying in the wrong place. When disappointment appears, slow down, change environments, and let the Moon reveal the larger pattern.</p>'''

html = html.replace(old_surprise, new_surprise)

# Environment section
old_environment = '''<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6"><span class="text-gm-purple">|</span> Reflectors and Environment</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">For Reflectors, environment is everything. More than any other Type, Reflectors are shaped by their surroundings. The energy of the place - the people, the physical space, the quality of interactions - becomes the Reflector's daily experience. In a healthy environment, the Reflector thrives, reflects wellbeing, and serves as a mirror for the community's success. In a toxic environment, the Reflector absorbs that toxicity and breaks down.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">This is why the most important decision a Reflector makes is <strong class="text-gray-800">where to be</strong>. The right city, the right neighborhood, the right office, the right home. When the environment is right, everything else follows. When it is wrong, nothing else can compensate.</p>
 <div class="bg-gm-card-active border-l-4 border-gm-purple rounded-r-lg p-5 my-6">
 <p class="text-xs font-semibold text-gm-purple uppercase tracking-widest mb-2">Key Insight</p>
 <p class="text-gm-text text-sm leading-relaxed italic">Reflectors often report that when they finally find the right environment, it feels like coming home for the first time. The chronic sense of being "off" dissolves. Energy stabilizes. Disappointment transforms into surprise. If you are a Reflector who has never felt settled, the environment is the first place to look.</p>
 </div>'''

new_environment = '''<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">Reflectors and environment</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">For Reflectors, environment is everything. More than any other Type, they are shaped by people and place. In a healthy environment, the Reflector thrives, reflects wellbeing, and mirrors community health. In an unhealthy environment, the Reflector picks up that tone and wears it.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">The most important decision is <strong class="text-gray-800">where to be</strong>. The right city, neighborhood, office, and home come first. When the environment is right, everything else follows. When it is wrong, nothing compensates.</p>
 <div class="bg-gm-card-active border-l-4 border-gm-purple rounded-r-lg p-5 my-6">
 <p class="text-xs font-semibold text-gm-purple uppercase tracking-widest mb-2">Key Insight</p>
 <p class="text-gm-text text-sm leading-relaxed italic">Many Reflectors describe the right place as finally coming home. The chronic sense of being off dissolves. Energy steadies. Disappointment turns to surprise.</p>
 </div>'''

html = html.replace(old_environment, new_environment)

# Identity section
old_identity = '''<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6"><span class="text-gm-purple">|</span> Reflectors and Identity</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">The Reflector's relationship with identity is unlike any other Type. With no fixed definition, there is no consistent "self" in the way that other Types experience it. The Reflector's identity shifts daily as the Moon activates different parts of their chart and as they interact with different people and environments.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">This can feel disorienting in a culture that demands consistency. But the Reflector's gift is precisely this fluidity. They can be anything, experience everything, understand all configurations of energy. They are the one Type that can truly say: "I have felt what it is like to be every other Type."</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">The practice for Reflectors is not to find a fixed identity but to <strong class="text-gray-800">enjoy the ride</strong>. To appreciate the fluidity as a gift rather than a problem. To recognize that some days you will feel like a Generator, some days like a Projector, some days like a Manifestor - and that all of it is correct, because none of it is permanently you.</p>'''

new_identity = '''<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">Reflectors and identity</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">With no fixed definition, there is no single consistent self day to day. Identity shifts as the Moon activates different parts of the chart and as different people and places come and go. This can feel disorienting in a culture that demands sameness, but the fluidity is the gift.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Some days you may feel like a <a href="generator.html" class="text-gm-purple hover:underline">Generator</a>, some like a <a href="projector.html" class="text-gm-purple hover:underline">Projector</a>, some like a <a href="manifestor.html" class="text-gm-purple hover:underline">Manifestor</a>. All of it is correct because none of it is permanent. The practice is not to lock identity down, but to witness and enjoy the reflection.</p>'''

html = html.replace(old_identity, new_identity)

# Explore section
old_explore = '''<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6"><span class="text-gm-purple">|</span> How to Explore Your Reflector Design</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">On Genetic Matrix:</strong> Generate a free Foundation chart to confirm your Type. Reflectors benefit particularly from tools that track the Moon's transit through their chart. Pro features reveal your Variable, Profile, and the specific ways your openness operates.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">The experiment:</strong> Begin tracking the Moon through your chart. Notice how you feel on different days as different activations occur. For one month, make no major decisions - instead, journal your feelings and see what remains consistent through the full cycle. This is the beginning of learning your own lunar pattern.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">The celebrity database:</strong> Reflectors are rare, and finding other Reflectors can be profoundly validating. Explore Reflectors in Genetic Matrix's 87,000+ celebrity database. See how this rare configuration manifests in public figures who have navigated a world not designed for their openness.</p>'''

new_explore = '''<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">How to explore your Reflector design</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">On Genetic Matrix:</strong> Generate a free Foundation chart to confirm Type. All Centers will be white. Review the lunar return chart to see how the next month highlights your Gates and Channels. Advanced and Pro charts reveal <a href="../variables/" class="text-gm-purple hover:underline">Variables</a> and environment, which matter greatly for Reflectors.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">One month experiment.</strong> Choose one important decision and give it the full lunar cycle. Keep a simple journal with daily notes on mood, body tone, environment quality, and moments of clarity. Meet with one trusted listener in a quiet space twice during the month to speak your reflections out loud. At month's end, read the notes and choose based on what stayed consistent.</p>'''

html = html.replace(old_explore, new_explore)

# ── 7. FAQ section ──

old_faq = '''<div class="space-y-3">
 <details class="bg-white rounded-lg border border-gm-border">
 <summary class="py-4 px-6 text-sm font-semibold text-gray-800">What is a Reflector in Human Design?</summary>
 <div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">A Reflector has no defined centers - all nine are open. About 1% of the population, they take in and reflect the energy of everyone around them. Their Strategy is to wait a full lunar cycle (28 days) for major decisions, and their signature is surprise.</div>
 </details>
 <details class="bg-white rounded-lg border border-gm-border">
 <summary class="py-4 px-6 text-sm font-semibold text-gray-800">Do I really have to wait 28 days for every decision?</summary>
 <div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">Not for every decision - the lunar cycle applies to major life decisions like career changes, relationships, and where to live. Everyday choices do not require it. The 28-day process ensures that what feels clear is genuine clarity, not temporary conditioning from a transit or another person's energy.</div>
 </details>
 <details class="bg-white rounded-lg border border-gm-border">
 <summary class="py-4 px-6 text-sm font-semibold text-gray-800">Why do I feel different every day?</summary>
 <div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">With no fixed definition, your experience changes as the Moon and other transits activate different centers and channels in your chart. This is correct for you. Rather than seeking consistency, track these shifts and learn your lunar pattern - which activations bring clarity and which bring confusion.</div>
 </details>
 <details class="bg-white rounded-lg border border-gm-border">
 <summary class="py-4 px-6 text-sm font-semibold text-gray-800">Is something wrong with me because I cannot be consistent?</summary>
 <div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">No. Consistency is not your design. The Reflector's nature is fluid - you experience all possible configurations of energy. This is your gift, not a flaw. The world values consistency because most people (Generators, Projectors, Manifestors) have fixed definition. You do not, and that is what makes you extraordinary.</div>
 </details>
 <details class="bg-white rounded-lg border border-gm-border">
 <summary class="py-4 px-6 text-sm font-semibold text-gray-800">Why is finding the right place so important?</summary>
 <div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">Reflectors take in and amplify the energy of their environment more than any other Type. The wrong environment creates chronic disappointment, while the right environment transforms everything. Where you physically are - city, home, workspace - has a more profound impact on your wellbeing than perhaps any other single factor.</div>
 </details>
 <details class="bg-white rounded-lg border border-gm-border">
 <summary class="py-4 px-6 text-sm font-semibold text-gray-800">How do Reflectors relate to other Types?</summary>
 <div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">Reflectors can work with any Type because they sample and understand all energies. They often thrive around consistent, healthy people - particularly Generators whose stable Sacral energy provides a reliable field to reflect. Reflectors teach others about themselves by mirroring back what they experience, offering insights that insiders cannot see.</div>
 </details>
 </div>'''

new_faq = '''<div class="space-y-3">
 <details class="bg-white rounded-lg border border-gm-border">
 <summary class="py-4 px-6 text-sm font-semibold text-gray-800">What is a Reflector in Human Design?</summary>
 <div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">A Reflector has all Centers undefined and no motor to the Throat by definition. About 1 percent of the population. Strategy is to wait a lunar cycle. Signature is surprise. The aura is sampling and resistant.</div>
 </details>
 <details class="bg-white rounded-lg border border-gm-border">
 <summary class="py-4 px-6 text-sm font-semibold text-gray-800">Do Reflectors really need a full month to decide?</summary>
 <div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">For big decisions, yes, because the lunar cycle reveals a complete pattern. For small daily choices, follow what feels light and clear, and keep options open.</div>
 </details>
 <details class="bg-white rounded-lg border border-gm-border">
 <summary class="py-4 px-6 text-sm font-semibold text-gray-800">Why does environment matter so much?</summary>
 <div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">With all Centers undefined, your body mirrors the field you are in. The right place feels clear and supportive. The wrong place feels draining or confusing. Change place first, then reassess.</div>
 </details>
 <details class="bg-white rounded-lg border border-gm-border">
 <summary class="py-4 px-6 text-sm font-semibold text-gray-800">How can friends and partners support a Reflector?</summary>
 <div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">Offer time and space, avoid pressuring quick decisions, and be a sounding board in calm environments. Expect variability and appreciate accurate reflection.</div>
 </details>
 <details class="bg-white rounded-lg border border-gm-border">
 <summary class="py-4 px-6 text-sm font-semibold text-gray-800">Can Reflectors lead or run companies?</summary>
 <div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">Yes, in roles that emphasize evaluation, timing, and environment curation. Effective leadership centers on asking the right questions, mirroring truth, and sensing readiness.</div>
 </details>
 <details class="bg-white rounded-lg border border-gm-border">
 <summary class="py-4 px-6 text-sm font-semibold text-gray-800">Why do I feel so different day to day?</summary>
 <div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">You are sampling people and transits. Variability is part of the design. Track your month and build routines that flex with your tone instead of fighting it.</div>
 </details>
 </div>'''

html = html.replace(old_faq, new_faq)

# Restore CRLF line endings if original had them
if has_crlf:
    html = html.replace("\n", "\r\n")

with open(filepath, "wb") as f:
    f.write(html.encode("utf-8"))

print("Reflector page updated successfully.")
