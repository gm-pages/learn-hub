import re

with open(r"C:\Users\info\Working\Website-Dev\learn-hub\types\manifestor.html", "r", encoding="utf-8") as f:
    html = f.read()

# 1. META TAGS
html = html.replace(
    '<title>Manifestor in Human Design - Strategy, Initiation & the Path to Peace | Genetic Matrix</title>',
    '<title>Manifestor in Human Design - Strategy & Authority | Genetic Matrix</title>'
)
html = html.replace(
    '<meta name="description" content="Manifestors make up 9% of humanity - the initiators, the catalysts, the ones designed to act independently. Learn the Manifestor Strategy (inform before acting), Authority, closed aura, not-self theme of anger, and the path to peace.">',
    '<meta name="description" content="A Manifestor has an undefined Sacral Center and a motor to Throat. Learn Manifestor Strategy (inform before acting), Authority, closed aura, and the path to peace.">'
)
html = html.replace(
    '<meta property="og:title" content="Manifestor in Human Design - The Initiator">',
    '<meta property="og:title" content="Human Design Manifestor Type - Strategy, Authority & Aura">'
)
html = html.replace(
    '<meta property="og:description" content="Manifestors are the only Type designed to act independently. Learn Strategy, Authority, and how informing creates peace.">',
    '<meta property="og:description" content="Manifestors are the only Type designed to initiate independently. Learn Strategy, Authority, and how informing creates peace.">'
)

# 2. JSON-LD - replace both script blocks with single @graph
old_jsonld_start = ' <script type="application/ld+json">\n {'
old_jsonld_end = ']\n}\n</script>\n</head>'

jsonld_block = """ <script type="application/ld+json">
{"@context":"https://schema.org","@graph":[{"@type":"Article","@id":"https://www.geneticmatrix.com/learn/types/manifestor#article","mainEntityOfPage":{"@type":"WebPage","@id":"https://www.geneticmatrix.com/learn/types/manifestor"},"headline":"Human Design Manifestor Type: Strategy, Authority, Aura, Peace","description":"Learn the Human Design Manifestor Type: inform before acting, closed and repelling aura, Manifestor Authorities, and how peace and anger work. Includes a one-week Manifestor experiment and practical tips. Create a free Foundation chart at Genetic Matrix to confirm Type and Authority.","author":{"@type":"Organization","name":"Genetic Matrix"},"publisher":{"@type":"Organization","name":"Genetic Matrix","logo":{"@type":"ImageObject","url":"https://www.geneticmatrix.com/favicon.ico"}}},{"@type":"FAQPage","@id":"https://www.geneticmatrix.com/learn/types/manifestor#faq","mainEntity":[{"@type":"Question","name":"What is a Manifestor in Human Design?","acceptedAnswer":{"@type":"Answer","text":"A Manifestor has an undefined Sacral Center with a motor connected to the Throat. The motor can be Root, Solar Plexus, or Ego or Heart. About nine percent of the population, Manifestors are the only Type designed to initiate independently. Strategy is to inform before acting. Signature is peace."}},{"@type":"Question","name":"Is informing the same as asking permission?","acceptedAnswer":{"@type":"Answer","text":"No. Informing is a declaration, not a request. I am going to do this. It alerts impacted people and reduces resistance without sacrificing independence."}},{"@type":"Question","name":"How is a Manifestor different from a Manifesting Generator?","acceptedAnswer":{"@type":"Answer","text":"Manifestors do not have a defined Sacral and do not have sustainable life force. They initiate in bursts. Manifesting Generators have a defined Sacral, must respond before initiating, and have an open, enveloping aura rather than a closed, repelling aura."}},{"@type":"Question","name":"Why is my Manifestor child so challenging?","acceptedAnswer":{"@type":"Answer","text":"Manifestor children act independently because their aura does not naturally include others. Teaching them to inform, tell me before you do it, preserves autonomy while creating family peace."}},{"@type":"Question","name":"Can Manifestors work in teams?","acceptedAnswer":{"@type":"Answer","text":"Yes. They thrive with autonomy and clear lanes to initiate and lead new directions while others build and sustain. Informing keeps teams aligned without micromanagement."}},{"@type":"Question","name":"Why do I feel so much anger?","acceptedAnswer":{"@type":"Answer","text":"Anger often points to control, blockage, or skipped informing in the present, and to conditioning from being managed or punished for independence in childhood. Returning to Strategy and Authority and adopting informing as a habit reduces resistance and restores peace."}}]}]}
</script>
</head>"""

# Find and replace the JSON-LD section
pattern = r' <script type="application/ld\+json">\s*\n\s*\{[^}]*"@context"[^<]*</script>\s*\n\s*<script type="application/ld\+json">\s*\n\{[^<]*</script>\s*\n</head>'
html = re.sub(pattern, jsonld_block, html, flags=re.DOTALL)

# 3. HERO - update description, replace Population with Aura
html = html.replace(
    'The initiator. Manifestors are the only Type designed to act independently - to start things, catalyze change, and set new directions in motion. Their closed aura protects them from outside influence, and their path to peace lies in one practice: informing.',
    'This page is about the Human Design Manifestor Type. It explains the closed and repelling aura, the Strategy to inform before acting, Authorities for decision making, and how peace and anger show up in practice.'
)

# Replace Population stat with Aura stat in hero
html = html.replace(
    """<div>
 <div class="text-[10px] uppercase tracking-widest text-gray-400 font-semibold mb-0.5">Population</div>
 <div class="text-sm text-white font-semibold">~9%</div>
 </div>""",
    """<div>
 <div class="text-[10px] uppercase tracking-widest text-gray-400 font-semibold mb-0.5">Aura</div>
 <div class="text-sm text-white font-semibold">Closed & Repelling</div>
 </div>"""
)

# 4. REMOVE DOCTRINE BOX
doctrine_pattern = r' <!-- ==================== DOCTRINE BOX ====================.*?</section>\n'
html = re.sub(doctrine_pattern, '', html, flags=re.DOTALL)

# 5. REMOVE QUICK FACTS
quickfacts_pattern = r' <!-- ==================== QUICK FACTS ====================.*?</section>\n'
html = re.sub(quickfacts_pattern, '', html, flags=re.DOTALL)

# 6. WHAT IS A MANIFESTOR - replace content
old_whatis = """<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6"><span class="text-gm-purple">|</span> What Is a Manifestor?</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">A Manifestor is someone with an <strong class="text-gray-800">undefined Sacral center</strong> and a <strong class="text-gray-800">motor center connected directly to the Throat</strong>. The motor can be the Root, the Solar Plexus, or the Heart/Ego - but not the Sacral. This configuration creates the only Type in Human Design that is designed to <strong class="text-gray-800">initiate action independently</strong>.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Historically, Manifestors were the rulers, the monarchs, the alpha leaders. In the seven-centered era before 1781, they dominated human society. They could act on their own impulses, make things happen, and lead by force of will. The shift to the nine-centered era has changed the Manifestor's role - they are no longer the dominant Type - but their initiating capacity remains unique and powerful.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Manifestors make up approximately 9% of the population. They are rare, and their energy is distinct. They do not have sustainable life force like Generators - they operate in powerful bursts of initiating energy, followed by periods of rest. They are designed to start things, not necessarily to sustain them.</p>
 <div class="bg-gm-card-active border-l-4 border-gm-purple rounded-r-lg p-5 my-6">
 <p class="text-xs font-semibold text-gm-purple uppercase tracking-widest mb-2">Key Insight</p>
 <p class="text-gm-text text-sm leading-relaxed italic">The deepest wound most Manifestors carry is from childhood. Manifestor children act independently - they go where they want, do what they want, without telling anyone. This terrifies parents, who respond with control and punishment. The child learns to hide their actions, creating a lifelong pattern of anger and secrecy. The adult practice of informing heals this wound by creating transparency without sacrificing independence.</p>
 </div>"""

new_whatis = """<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6"><span class="text-gm-purple">|</span> What Is a Manifestor?</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">A Manifestor in Human Design has an <strong class="text-gray-800">undefined <a href="../centers/" class="text-gm-purple hover:underline">Sacral Center</a></strong> and at least one motor Center connected directly to the Throat. The motor can be the Root, Solar Plexus, or Ego or Heart, but not the Sacral. This configuration creates the only Type that is designed to initiate action independently.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Historically, Manifestors were the rulers and monarchs in the seven centered era before 1781. They acted on impulse, moved quickly, and often led by force of will. In the nine centered era they are no longer the dominant Type, but their initiating capacity remains unique and powerful.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Manifestors make up about nine percent of charts. They do not have sustainable Sacral life force. They move in potent bursts of initiating energy followed by natural periods of rest. They are designed to start, not necessarily to sustain. They light the spark that others can build and maintain.</p>
 <div class="bg-gm-card-active border-l-4 border-gm-purple rounded-r-lg p-5 my-6 space-y-3">
 <p class="text-xs font-semibold text-gm-purple uppercase tracking-widest mb-2">Key Insight</p>
 <p class="text-gm-text text-sm leading-relaxed italic">A common Manifestor conditioning pattern begins in childhood. Independent action without informing scares caregivers, who respond with control or punishment. Many Manifestors then learn secrecy to protect freedom, storing anger that resurfaces later in life. The adult practice of informing restores transparency without surrendering independence and gradually replaces resistance with peace.</p>
 </div>"""

html = html.replace(old_whatis, new_whatis)

# 7. STRATEGY SECTION
old_strategy = """<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6"><span class="text-gm-purple">|</span> Strategy: Inform Before Acting</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">The Manifestor Strategy is simple in concept and revolutionary in practice: <strong class="text-gray-800">tell the people who will be impacted by your actions what you are about to do, before you do it</strong>.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">This is not asking permission. Manifestors are not designed to ask for approval. Informing is a declaration: "I am going to do this." It is a courtesy that reduces the resistance that Manifestors naturally encounter because of their closed aura.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Without informing, Manifestors blindside people. Their closed aura means others cannot sense what they are about to do - and when action comes out of nowhere, people react with fear, control, and opposition. The Manifestor meets anger and resistance everywhere they go. With informing, the path clears. People step aside. Resistance dissolves. Peace becomes possible.</p>
 <h3 class="text-lg font-semibold text-gray-800 mt-8 mb-3">Why Informing Is So Hard</h3>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Most Manifestors resist informing because it feels like asking permission - a direct trigger for childhood conditioning. They were controlled as children, and any transparency feels like vulnerability. The practice of informing requires recognizing that <strong class="text-gray-800">informing is power, not weakness</strong>. It is the Manifestor choosing to clear their own path rather than fighting through resistance.</p>
 <h3 class="text-lg font-semibold text-gray-800 mt-8 mb-3">Who to Inform</h3>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Inform anyone who will be impacted by your action. Not the whole world - just the people in the blast radius. Your partner, your team, your collaborators. "I am starting a new project." "I am leaving early." "I have decided to change direction." Simple, clear, and before the action - not after.</p>"""

new_strategy = """<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6"><span class="text-gm-purple">|</span> Strategy: Inform Before Acting</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">The Manifestor Strategy is simple to state and transformative in practice. <strong class="text-gray-800">Tell the people who will be impacted what you are about to do, before you do it.</strong></p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Informing is not asking permission. It is a clear declaration: <em>I am going to do this.</em> Because the aura is closed and repelling, others cannot read what the Manifestor is about to do. Uninformed action often blindsides people and provokes control or pushback. When a Manifestor informs, the path tends to clear, resistance drops, and peace becomes possible.</p>
 <h3 class="text-lg font-semibold text-gray-800 mt-8 mb-3">Why Informing Feels Hard</h3>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Informing can trigger old patterns because it resembles asking permission. The practical reframe is that informing is a power move to reduce friction. It preserves autonomy while minimizing delays and confrontations that drain Manifestor energy.</p>
 <h3 class="text-lg font-semibold text-gray-800 mt-8 mb-3">Who to Inform</h3>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Inform those who will be meaningfully affected by the action. Partners, collaborators, teams, family, anyone in the likely blast radius. Keep it short, concrete, and ahead of the move. <em>I am starting a new project. I am changing direction on this. I am leaving early today.</em></p>"""

html = html.replace(old_strategy, new_strategy)

# 8. AUTHORITY SECTION
old_authority = """<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6"><span class="text-gm-purple">|</span> Manifestor Authority</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Manifestors can have several Authorities:</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Emotional Authority (Solar Plexus defined):</strong> The most common. Despite the urge to initiate immediately, Emotional Manifestors must wait for emotional clarity. There is no truth in the now. The wave must settle before acting. This is the hardest practice for a Type built to move fast.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Splenic Authority:</strong> Instinctual, in-the-moment knowing. The Spleen speaks once - act on it immediately. Splenic Manifestors have the fastest decision-making of any configuration: the impulse to initiate is confirmed by the Spleen in real time.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Ego/Heart Authority:</strong> The will speaks through blurted truths. When the Ego-manifested Manifestor speaks spontaneously, what comes out is their truth. If the will says yes, it is total commitment. If it says no, nothing can force it.</p>"""

new_authority = """<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6"><span class="text-gm-purple">|</span> Manifestor Authority</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Emotional Authority</strong>, Solar Plexus defined. The most common. There is no truth in the now. Ride the emotional wave and act from calm clarity rather than from highs or lows. This can feel counter to the urge to move fast, and it is essential for clean initiation.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Splenic Authority.</strong> Quiet, instantaneous recognition of what is correct. The Spleen speaks once and softly. When it pings, initiate. When it is silent, wait.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Ego or Heart Authority.</strong> The will speaks directly. Spontaneous statements often reveal truth. If the will commits, it is total. If the will is not present, forcing action backfires.</p>"""

html = html.replace(old_authority, new_authority)

# 9. AURA SECTION
old_aura = """<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6"><span class="text-gm-purple">|</span> The Manifestor Aura</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">The Manifestor aura is <strong class="text-gray-800">closed and repelling</strong>. It pushes others away - not out of hostility, but as a protective mechanism. The Manifestor is designed to act independently, and their aura ensures that outside influences cannot easily penetrate and redirect them.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">This creates a paradox: Manifestors have a powerful impact on others, but others cannot impact them in the same way. People feel the Manifestor's energy - it can be intimidating, exciting, or unsettling - but they cannot read what the Manifestor is about to do. This unpredictability is what makes informing essential.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">The Manifestor aura also creates a natural sense of authority. People instinctively respond to Manifestor energy - they either get out of the way or try to control it. There is rarely a neutral reaction. This is the energetic reality that has made Manifestors the rulers and catalysts throughout human history.</p>"""

new_aura = """<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6"><span class="text-gm-purple">|</span> The Manifestor Aura</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">The Manifestor aura is <strong class="text-gray-800">closed and repelling</strong>. It is a protective field that limits outside influence so independent action can occur. People feel a Manifestor's impact, yet they cannot easily read intentions or next moves.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">This unpredictability often invites either deference or attempts at control. Informing becomes the practical bridge between independence and peace.</p>"""

html = html.replace(old_aura, new_aura)

# 10. PEACE AND ANGER
old_peace = """<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6"><span class="text-gm-purple">|</span> Peace and Anger</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Peace</strong> is the Manifestor's signature. It is not passivity - it is the absence of resistance. When a Manifestor informs before acting, moves through the world with transparency, and honors their initiating impulses without meeting pushback, they experience a profound ease. Things flow. Doors open. The path is clear.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Anger</strong> is the not-self theme. Manifestor anger is not ordinary frustration - it is a deep, burning response to being controlled, blocked, or forced to wait. It often traces back to childhood conditioning, where the Manifestor's independent nature was punished. Adult anger typically signals that the Manifestor has not informed and is meeting the resistance that follows.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Some Manifestors carry a lifetime of suppressed anger. The practice of informing - consistently, as a way of life - gradually dissolves the patterns that create resistance. Peace is not something Manifestors achieve overnight. It is something that builds as informing becomes natural.</p>"""

new_peace = """<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6"><span class="text-gm-purple">|</span> Peace and Anger</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Peace</strong> is the Signature. It is the felt absence of resistance. Informing before acting, honoring natural bursts, and initiating from Authority opens a clearer path.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Anger</strong> is the Not-Self Theme. It is a signal that control, blockage, or skipped informing is creating friction. Many Manifestors carry accumulated anger from early life. Consistent informing, not perfection, is what gradually dissolves the patterns that create resistance.</p>"""

html = html.replace(old_peace, new_peace)

# 11. ENERGY SECTION
old_energy = """<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6"><span class="text-gm-purple">|</span> Manifestors and Energy</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Without a defined Sacral center, Manifestors do not have sustainable energy. They operate in <strong class="text-gray-800">bursts</strong> - powerful surges of initiating energy followed by periods where the energy withdraws. This is correct. The Manifestor is not designed to work eight hours a day sustaining output. They are designed to initiate, catalyze, and then step back.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Manifestors often do best when they can start things and hand them off to Generators and Manifesting Generators to build and sustain. The Manifestor lights the spark; others tend the fire. Trying to do both leads to burnout and anger.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Like Projectors and Reflectors, Manifestors should lie down before they are exhausted to allow the energies of others to discharge from their open Sacral center.</p>"""

new_energy = """<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6"><span class="text-gm-purple">|</span> Manifestors and Energy</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Without a defined Sacral Center, Manifestors are not built for sustained, uniform output. They function best in surges of initiation followed by rest and recalibration.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">A healthy dynamic is to start the thing, then allow <a href="generator.html" class="text-gm-purple hover:underline">Generators</a> and <a href="manifesting-generator.html" class="text-gm-purple hover:underline">Manifesting Generators</a> to build and sustain it. Trying to both initiate and sustain tends to produce burnout and more anger.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">As with <a href="projector.html" class="text-gm-purple hover:underline">Projectors</a> and <a href="reflector.html" class="text-gm-purple hover:underline">Reflectors</a>, lying down to decompress before sleep can help discharge conditioned energy from the body.</p>"""

html = html.replace(old_energy, new_energy)

# 12. EXPLORE SECTION
old_explore = """<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6"><span class="text-gm-purple">|</span> How to Explore Your Manifestor Design</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">On Genetic Matrix:</strong> Generate a free Foundation chart to confirm your Type and Authority. See which motor connects to your Throat - this reveals the nature of your initiating energy. Advanced and Pro charts show deeper layers of your design.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">The experiment:</strong> For one week, practice informing before every significant action. Tell your partner, your colleagues, your family what you are about to do - before you do it. Notice how the resistance in your life changes. Notice how peace begins to replace anger.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">The celebrity database:</strong> Explore Manifestors in Genetic Matrix's 87,000+ celebrity database. See how the Manifestor mechanic manifests in catalysts, innovators, and independent leaders across every field.</p>"""

new_explore = """<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6"><span class="text-gm-purple">|</span> How to Explore Your Manifestor Design</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">On Genetic Matrix:</strong> Generate a free Foundation chart to confirm your Type and Authority. Note which motor connects to the Throat, because this nuances the feel and tempo of your initiation. Advanced and Pro charts reveal deeper layers such as <a href="../variables/" class="text-gm-purple hover:underline">Variables</a> and environment.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">One week experiment.</strong> For seven days, practice informing before each significant action. Keep a simple log of what you informed, who you informed, and the outcome. Notice shifts in resistance and your baseline level of peace by the end of the week.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Explore the Genetic Matrix celebrity database to see Manifestor mechanics expressed across fields. Dive deeper into your <a href="../profiles/" class="text-gm-purple hover:underline">Profile</a>, <a href="../centers/" class="text-gm-purple hover:underline">Centers</a>, <a href="../channels/" class="text-gm-purple hover:underline">Channels</a>, and <a href="../gates/" class="text-gm-purple hover:underline">Gates</a> to see how they shape your specific Manifestor design.</p>"""

html = html.replace(old_explore, new_explore)

# 13. FAQ ANSWERS - update each one
# Q1: What is a Manifestor
html = html.replace(
    '<div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">A Manifestor has an undefined Sacral center with a motor (Root, Solar Plexus, or Heart) connected to the Throat. About 9% of the population, they are the only Type designed to initiate independently. Their Strategy is to inform before acting, and their signature is peace.</div>',
    '<div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">A Manifestor has an undefined Sacral Center with a motor connected to the Throat. The motor can be Root, Solar Plexus, or Ego or Heart. About nine percent of the population, Manifestors are the only Type designed to initiate independently. Strategy is to inform before acting. Signature is peace.</div>'
)

# Q2: Is informing same as asking permission
html = html.replace(
    '<div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">No. Informing is a declaration, not a request. "I am going to do this" - not "Can I do this?" The Manifestor does not need approval. Informing simply lets those who will be impacted know what is coming, which clears resistance and creates peace.</div>',
    '<div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">No. Informing is a declaration, not a request. I am going to do this. It alerts impacted people and reduces resistance without sacrificing independence.</div>'
)

# Q3: Manifestor vs MG
html = html.replace(
    '<div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">Manifestors have an undefined Sacral - no sustainable energy. They initiate in bursts. Manifesting Generators have a defined Sacral with regenerative energy and must respond first before initiating. Manifestors have a closed aura; MGs have an open, enveloping aura. Fundamentally different mechanics.</div>',
    '<div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">Manifestors do not have a defined Sacral and do not have sustainable life force. They initiate in bursts. Manifesting Generators have a defined Sacral, must respond before initiating, and have an open, enveloping aura rather than a closed, repelling aura.</div>'
)

# Q4: Manifestor child - update question text too
html = html.replace(
    'Why is my Manifestor child so difficult?',
    'Why is my Manifestor child so challenging?'
)
html = html.replace(
    '<div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">Manifestor children are designed to act independently. They go, do, and create without telling anyone - because their closed aura does not naturally include others. Rather than controlling them, teach them to inform: "Just tell me what you are going to do before you do it." This preserves their independence while creating family peace.</div>',
    '<div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">Manifestor children act independently because their aura does not naturally include others. Teaching them to inform, tell me before you do it, preserves autonomy while creating family peace.</div>'
)

# Q5: Teams
html = html.replace(
    '<div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">Yes, but they work best in roles where they can initiate and lead without being micromanaged. Manifestors thrive when given autonomy and the freedom to catalyze new directions. The team\'s role is often to build and sustain what the Manifestor starts. Informing keeps the team aligned without restricting the Manifestor\'s independence.</div>',
    '<div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">Yes. They thrive with autonomy and clear lanes to initiate and lead new directions while others build and sustain. Informing keeps teams aligned without micromanagement.</div>'
)

# Q6: Anger
html = html.replace(
    '<div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">Manifestor anger typically comes from two sources: childhood conditioning (being controlled and punished for your independent nature) and current resistance (meeting pushback because you have not informed). The practice of informing dissolves current resistance; deconditioning through Strategy and Authority gradually heals the childhood wounds.</div>',
    '<div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">Anger often points to control, blockage, or skipped informing in the present, and to conditioning from being managed or punished for independence in childhood. Returning to Strategy and Authority and adopting informing as a habit reduces resistance and restores peace.</div>'
)

# 14. Fix breadcrumb - link back to Types page, not Learn Hub
html = html.replace(
    '<a href="../index.html" class="text-sm text-gm-purple hover:text-gm-dark font-medium transition">&larr; Back to Learn Hub</a>',
    '<a href="index.html" class="text-sm text-gm-purple hover:text-gm-dark font-medium transition">&larr; Back to Types</a>'
)

# 15. Update image alt text
html = html.replace(
    'alt="Human Design Manifestor Bodygraph chart - Julianne Moore"',
    'alt="Human Design Manifestor Bodygraph chart showing motor to Throat connection and undefined Sacral Center"'
)

# Write the file
with open(r"C:\Users\info\Working\Website-Dev\learn-hub\types\manifestor.html", "w", encoding="utf-8") as f:
    f.write(html)

print("Manifestor page updated successfully.")
