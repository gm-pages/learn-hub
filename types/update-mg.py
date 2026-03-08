import re

filepath = r"C:\Users\info\Working\Website-Dev\learn-hub\types\manifesting-generator.html"

with open(filepath, "r", encoding="utf-8") as f:
    html = f.read()

# Normalize CRLF to LF for reliable matching
html = html.replace("\r\n", "\n")

# ========== 1. META TAGS ==========
html = html.replace(
    "<title>Manifesting Generator in Human Design - Strategy, Speed & Sacral Response | Genetic Matrix</title>",
    "<title>Manifesting Generator in Human Design - Strategy & Authority | Genetic Matrix</title>"
)

html = html.replace(
    '<meta name="description" content="Manifesting Generators make up 33% of humanity - fast-moving, multi-passionate hybrids with Sacral energy and a motor-to-Throat connection. Learn the MG Strategy (respond then inform), Authority, aura, and how to find satisfaction and peace.">',
    '<meta name="description" content="A Manifesting Generator has a defined Sacral Center and a motor to the Throat. Learn MG Strategy (respond then inform), Authority, aura, and the path to satisfaction and peace.">'
)

html = html.replace(
    '<meta property="og:title" content="Manifesting Generator in Human Design - Speed, Response & Multi-Passionate Energy">',
    '<meta property="og:title" content="Human Design Manifesting Generator Type - Strategy, Authority & Aura">'
)

html = html.replace(
    '<meta property="og:description" content="Manifesting Generators combine Sacral life force with initiating speed. Learn Strategy, Authority, and the path to satisfaction and peace.">',
    '<meta property="og:description" content="Manifesting Generators combine Sacral life force with initiating speed. Learn Strategy, Authority, and the path to satisfaction and peace.">'
)

# ========== 2. JSON-LD: Replace BOTH script blocks with single @graph ==========
json_ld_replacement = """ <script type="application/ld+json">
{"@context":"https://schema.org","@graph":[{"@type":"Article","@id":"https://www.geneticmatrix.com/learn/types/manifesting-generator#article","mainEntityOfPage":{"@type":"WebPage","@id":"https://www.geneticmatrix.com/learn/types/manifesting-generator"},"headline":"Human Design Manifesting Generator Type: Strategy, Authority, Aura, Satisfaction","description":"Learn the Human Design Manifesting Generator Type: respond then inform, open and enveloping aura with initiating tone, MG Authorities, and how satisfaction, peace, frustration, and anger work. Includes a one-week MG experiment and practical tips. Create a free Foundation chart at Genetic Matrix to confirm Type and Authority.","author":{"@type":"Organization","name":"Genetic Matrix"},"publisher":{"@type":"Organization","name":"Genetic Matrix","logo":{"@type":"ImageObject","url":"https://www.geneticmatrix.com/favicon.ico"}}},{"@type":"FAQPage","@id":"https://www.geneticmatrix.com/learn/types/manifesting-generator#faq","mainEntity":[{"@type":"Question","name":"What is a Manifesting Generator in Human Design?","acceptedAnswer":{"@type":"Answer","text":"A Manifesting Generator has a defined Sacral Center plus a motor to the Throat. They combine Generator life force with initiating speed. About 33 percent of the population. Strategy is respond, then inform. Signature is satisfaction and peace."}},{"@type":"Question","name":"Is a Manifesting Generator the same as a Generator?","acceptedAnswer":{"@type":"Answer","text":"They share a defined Sacral and the need to wait to respond. MGs also have a motor to the Throat, which adds speed, multi tasking ability, and initiating capacity. MGs need to inform before acting. Pure Generators do not."}},{"@type":"Question","name":"Why do MGs lose interest quickly?","acceptedAnswer":{"@type":"Answer","text":"When the Sacral shifts away, energy withdraws. This is not flakiness. It is correct redirection. Forcing yourself to continue without Sacral engagement leads to burnout. Pivot to the next Sacral yes."}},{"@type":"Question","name":"Can MGs focus on one thing?","acceptedAnswer":{"@type":"Answer","text":"Yes, if the Sacral is truly lit by one focus. Many MGs thrive with several pursuits. Do not force single focus if multiple focus is correct. Do not scatter across too many threads without real Sacral yes for each."}},{"@type":"Question","name":"What does informing look like for MGs?","acceptedAnswer":{"@type":"Answer","text":"Informing means telling people who will be impacted what you are about to do before you do it. I am going to start this project. I have decided to change direction. It is not asking permission. It clears resistance."}},{"@type":"Question","name":"Why does my MG child seem chaotic?","acceptedAnswer":{"@type":"Answer","text":"MG children move fast and shift interests often. Offer things to respond to instead of dictating. Teach them to inform. That supports both satisfaction and peace."}}]}]}
</script>"""

html = re.sub(
    r' <script type="application/ld\+json">\s*\{.*?\}\s*</script>\s* <script type="application/ld\+json">\s*\{.*?\}\s*</script>',
    json_ld_replacement,
    html,
    flags=re.DOTALL
)

# ========== 3. HERO CHANGES ==========
# Description
html = html.replace(
    "The multi-passionate hybrid. Manifesting Generators carry the same Sacral life force as Generators but with a motor-to-Throat connection that gives them speed, initiating power, and the ability to work on multiple things simultaneously.",
    "This page is about the Human Design Manifesting Generator Type. It explains the open and enveloping aura with initiating tone, the Strategy to respond then inform, Authorities for decision making, and how satisfaction, peace, frustration, and anger show up in practice."
)

# Signature stat
html = html.replace("Satisfaction & peace", "Satisfaction and peace")

# Not-Self stat
html = html.replace("Frustration & anger", "Frustration and anger")

# Population stat -> Aura stat
html = html.replace(
    '<div class="text-[10px] uppercase tracking-widest text-gray-400 font-semibold mb-0.5">Population</div>\n <div class="text-sm text-white font-semibold">~33%</div>',
    '<div class="text-[10px] uppercase tracking-widest text-gray-400 font-semibold mb-0.5">Aura</div>\n <div class="text-sm text-white font-semibold">Open and enveloping</div>'
)

# Alt text
html = html.replace(
    'alt="Human Design Manifesting Generator Bodygraph chart - Elon Musk"',
    'alt="Human Design Manifesting Generator Bodygraph chart. Elon Musk."'
)

# ========== 4. REMOVE DOCTRINE BOX ==========
html = re.sub(
    r'\n <!-- ==================== DOCTRINE BOX ==================== -->.*?</section>\n',
    '\n',
    html,
    flags=re.DOTALL
)

# ========== 5. REMOVE QUICK FACTS ==========
html = re.sub(
    r'\n <!-- ==================== QUICK FACTS ==================== -->.*?</section>\n',
    '\n',
    html,
    flags=re.DOTALL
)

# ========== 6. REMOVE ALL PIPE SPANS FROM H2 HEADINGS ==========
html = html.replace('<span class="text-gm-purple">|</span> ', '')

# ========== 7. CONTENT SECTIONS ==========

# --- What Is a Manifesting Generator? ---
old_what_is = """<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">What Is a Manifesting Generator?</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">A Manifesting Generator is someone with a <strong class="text-gray-800">defined Sacral center</strong> and a <strong class="text-gray-800">motor center connected to the Throat</strong>. This dual mechanical reality creates a being who has the sustainable life-force energy of a Generator combined with the speed and initiating capacity of a Manifestor. They are hybrids - and that hybrid nature makes them unlike either parent Type.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">The motor-to-Throat connection is what distinguishes an MG from a pure Generator. It gives them direct access to expression and action. Where a pure Generator builds momentum gradually, an MG can leap from response to action almost instantly. They move fast. They skip steps. They can work on five things at once and somehow make it all work.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Manifesting Generators make up approximately 33% of the population. Combined with pure Generators, Sacral beings represent about 70% of humanity. MGs bring the speed, the innovation, and the multi-passionate energy that keeps the world evolving.</p>
 <div class="bg-gm-card-active border-l-4 border-gm-purple rounded-r-lg p-5 my-6">
 <p class="text-xs font-semibold text-gm-purple uppercase tracking-widest mb-2">Key Insight</p>
 <p class="text-gm-text text-sm leading-relaxed italic">The biggest challenge for Manifesting Generators is not their speed - it is learning to respond before they initiate. The motor-to-Throat connection creates a powerful urge to just go. But the Sacral still needs to respond first. The sequence matters: something appears \u2192 Sacral responds \u2192 inform \u2192 act. Skip the response and you get frustration. Skip the informing and you get anger.</p>
 </div>"""

new_what_is = """<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">What Is a Manifesting Generator?</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">A Manifesting Generator has a <strong class="text-gray-800">defined <a href="../centers/" class="text-gm-purple hover:underline">Sacral Center</a></strong> and at least one motor to the Throat. This dual mechanic combines sustainable <a href="generator.html" class="text-gm-purple hover:underline">Generator</a> life force with <a href="manifestor.html" class="text-gm-purple hover:underline">Manifestor</a> like speed and direct expression. It is a true hybrid, not identical to either parent Type.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">The motor to the Throat distinguishes an MG from a pure Generator. It provides immediate access to action and voice. Where a pure Generator tends to build momentum gradually, an MG can leap from response to action almost instantly. They move fast, often skip steps, and can hold several pursuits in motion at once.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Manifesting Generators make up about 33 percent of the population. Together with pure Generators, Sacral beings are the majority. MGs contribute speed, innovation, and multi passionate energy that keep the world evolving.</p>
 <div class="bg-gm-card-active border-l-4 border-gm-purple rounded-r-lg p-5 my-6">
 <p class="text-xs font-semibold text-gm-purple uppercase tracking-widest mb-2">Key Insight</p>
 <p class="text-gm-text text-sm leading-relaxed italic">The central MG challenge is not speed. It is sequencing. Respond before you initiate. The motor to the Throat creates a powerful urge to go now, but the Sacral still leads. The clean sequence is simple. Something appears. The Sacral responds. Inform. Act. Skip response and frustration appears. Skip informing and anger appears.</p>
 </div>"""

html = html.replace(old_what_is, new_what_is)

# --- Strategy section ---
old_strategy = """<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">Strategy: Respond, Then Inform</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">The Manifesting Generator Strategy has two parts - and both are essential:</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">First: Wait to respond.</strong> Like pure Generators, MGs need something from the outside world to activate their Sacral before committing energy. The gut responds - "uh-huh" or "uhn-uhn" - and this response is the green light. Without it, the MG is initiating from the mind, and frustration follows.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Second: Inform before acting.</strong> This is the Manifestor piece. Because MGs move fast and their actions impact others, informing reduces resistance. It is not asking permission - it is letting those who will be affected know what is about to happen. When MGs skip this step, they meet anger and pushback.</p>
 <h3 class="text-lg font-semibold text-gray-800 mt-8 mb-3">The Multi-Passionate Nature</h3>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Manifesting Generators are often involved in multiple projects, interests, and pursuits simultaneously. This is not a flaw - it is their design. The key is that each pursuit must have a genuine Sacral response behind it. When an MG loses interest in something, it is often because the Sacral response has shifted. The correct move is to pivot - not to force themselves to finish out of obligation.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">This can look like quitting to others. It is not quitting. It is the Sacral redirecting energy to where it belongs. MGs who force themselves to finish everything they start - regardless of whether the Sacral is still engaged - burn out and become deeply frustrated.</p>
 <h3 class="text-lg font-semibold text-gray-800 mt-8 mb-3">Skipping Steps</h3>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">MGs naturally skip steps. They see the shortcut, take the leap, and fill in gaps later. This efficiency is part of their design - the motor-to-Throat connection allows them to move from A to D without needing B and C. They may circle back for missed steps, and that is fine. The initial leap is correct.</p>"""

new_strategy = """<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">Strategy: respond, then inform</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">The Strategy has two parts. First, wait to respond. Like pure Generators, MGs need something from the outside world to activate the Sacral before committing energy. The gut answers uh huh or uh uh. That is the green light. Without it, the mind is initiating and frustration follows.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Second, inform before acting. This is the Manifestor piece. Because MGs move fast and impact others, informing reduces resistance. It is not asking permission. It is telling the people affected what is about to happen. When MGs skip informing, pushback and anger are common.</p>
 <h3 class="text-lg font-semibold text-gray-800 mt-8 mb-3">The multi passionate nature</h3>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">MGs often pursue multiple projects and interests at once. This is correct for many MGs. The key is that each thread needs a genuine Sacral yes. When interest fades, the Sacral has shifted. The correct move is to pivot, not to force yourself to finish from obligation.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">To outsiders this can look like quitting. It is not quitting. It is correct energy redirection. Forcing completion after the Sacral has withdrawn leads to burnout and deep frustration.</p>
 <h3 class="text-lg font-semibold text-gray-800 mt-8 mb-3">Skipping steps</h3>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">MGs naturally skip steps. They see the shortcut, take the leap, and fill gaps later. This is efficient for their design. The motor to the Throat allows movement from A to D without B and C. Circling back to clean up missed steps is fine. The initial leap is often correct.</p>"""

html = html.replace(old_strategy, new_strategy)

# --- Authority section ---
old_authority = """<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">Manifesting Generator Authority</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Like Generators, MGs can have different Authorities:</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Emotional Authority (Solar Plexus defined):</strong> The most common for MGs. Despite their speed, Emotional MGs need to slow down for decisions. The wave must settle. This is the hardest practice for fast-moving MGs - learning that clarity takes time even when every instinct says "go now."</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Sacral Authority (Solar Plexus undefined):</strong> Pure in-the-moment response. The gut speaks and it is reliable immediately. For MGs with Sacral Authority, the speed of response matches their speed of action - respond and go.</p>
 <div class="bg-gm-card-active border-l-4 border-gm-purple rounded-r-lg p-5 my-6">
 <p class="text-xs font-semibold text-gm-purple uppercase tracking-widest mb-2">Key Insight</p>
 <p class="text-gm-text text-sm leading-relaxed italic">Emotional MGs face a unique challenge: their speed wants to act now, but their Authority says wait. Learning to trust the emotional process - to sleep on it, to let the wave settle - is the MG's deepest practice. The response is still there; it just needs time to be confirmed.</p>
 </div>"""

new_authority = """<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">Manifesting Generator Authority</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">MGs can have Emotional Authority or Sacral Authority.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Emotional Authority</strong> is most common. Let the Sacral respond, then wait until the emotional wave settles into calm clarity before committing. The response remains, but timing comes from the Solar Plexus.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Sacral Authority</strong> is immediate, in the moment uh huh or uh uh. If it is fuzzy, ask yes or no questions and check again later.</p>
 <div class="bg-gm-card-active border-l-4 border-gm-purple rounded-r-lg p-5 my-6">
 <p class="text-xs font-semibold text-gm-purple uppercase tracking-widest mb-2">Key Insight</p>
 <p class="text-gm-text text-sm leading-relaxed italic">Emotional MGs face a unique tension. Speed wants to act now while Authority says wait. Trust the emotional process. Sleep on it. Let the wave settle. That discipline preserves satisfaction and peace.</p>
 </div>"""

html = html.replace(old_authority, new_authority)

# --- Aura section ---
old_aura = """<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">The Manifesting Generator Aura</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Like Generators, the MG aura is <strong class="text-gray-800">open and enveloping</strong>. It draws life toward them. But because of the motor-to-Throat connection, their aura also carries an initiating quality - a sense that something is about to happen. People can feel the MG's energy before they speak or act. There is a buzz, a momentum, an electrical quality to their presence.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">When an MG is operating correctly - responding to what lights them up, informing before acting, moving at their natural speed - their aura is magnetic and exciting. When they are frustrated or angry, that same intensity becomes overwhelming and chaotic.</p>"""

new_aura = """<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">The Manifesting Generator aura</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Like Generators, the MG aura is <strong class="text-gray-800">open and enveloping</strong>. It draws life in. The motor to the Throat adds an initiating tone, a sense that something is about to happen. People feel MG momentum before words or action.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">When an MG is living correctly, responding to what lights them up, informing before acting, and moving at natural speed, the aura is magnetic and exciting. When frustration or anger takes over, the same intensity can feel chaotic.</p>"""

html = html.replace(old_aura, new_aura)

# --- Satisfaction/Frustration section ---
old_satisfaction = """<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">Satisfaction, Peace, Frustration & Anger</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Manifesting Generators have a dual signature and a dual not-self theme, reflecting their hybrid nature:</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Satisfaction</strong> comes from the Generator side - using Sacral energy in response to things that light you up. <strong class="text-gray-800">Peace</strong> comes from the Manifestor side - moving through the world without resistance because you informed before acting.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Frustration</strong> signals the Generator misalignment - energy committed without a genuine Sacral response. <strong class="text-gray-800">Anger</strong> signals the Manifestor misalignment - acting without informing and meeting resistance from others.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">When both satisfaction and peace are present, the MG is operating at full capacity. When both frustration and anger are present, something has gone deeply off track - usually the MG is initiating from the mind without responding or informing.</p>"""

new_satisfaction = """<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">Satisfaction, peace, frustration, and anger</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Satisfaction</strong> arises from the Generator side when Sacral energy is used in response to what lights you up. <strong class="text-gray-800">Peace</strong> arises from the Manifestor side when informing removes resistance.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Frustration</strong> signals a Generator error, committing energy without a true Sacral yes. <strong class="text-gray-800">Anger</strong> signals a Manifestor error, acting without informing and meeting resistance.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">When satisfaction and peace are present together, MG mechanics are aligned. When frustration and anger appear together, the sequence is usually off and action came from the mind.</p>"""

html = html.replace(old_satisfaction, new_satisfaction)

# --- Generator vs MG section ---
old_gen_vs_mg = """<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">Generator vs. Manifesting Generator</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">The question of whether MGs are a separate Type or a sub-type of Generator is one of the most debated topics in Human Design. Here is what the mechanics show:</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Shared:</strong> Both have a defined Sacral center. Both share the Strategy of waiting to respond. Both experience satisfaction when living correctly and frustration when not. Both have an open and enveloping aura.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Different:</strong> MGs have a motor-to-Throat connection that Generators do not. This gives MGs speed, multi-tasking ability, step-skipping efficiency, and an initiating quality. MGs also carry the Manifestor's need to inform and can experience anger when they do not. Pure Generators build steadily and develop mastery through sustained focus; MGs move fast and often work on multiple things simultaneously.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">On Genetic Matrix, Manifesting Generators are tracked as a distinct Type because the mechanical differences are significant enough to warrant separate treatment - particularly when it comes to the informing piece of the Strategy.</p>"""

new_gen_vs_mg = """<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">Generator and Manifesting Generator</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Both Types have a defined Sacral and both wait to respond. Both feel satisfaction when aligned and frustration when not. Both have an open and enveloping aura.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">MGs differ by having a motor to the Throat. This brings speed, multi tasking, step skipping efficiency, and an initiating tone. MGs also carry the need to inform and can experience anger when they do not.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Pure Generators often build steadily and deepen mastery through sustained focus, while many MGs move quickly and keep several threads alive. On Genetic Matrix, Manifesting Generators are tracked as a distinct Type to reflect these mechanical differences, especially the informing piece.</p>"""

html = html.replace(old_gen_vs_mg, new_gen_vs_mg)

# --- Explore section ---
old_explore = """<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">How to Explore Your MG Design</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">On Genetic Matrix:</strong> Generate a free Foundation chart to confirm your Type and Authority. Advanced charts reveal your Profile, Centers, Channels, and Gates. Pro charts show your complete Variable - the full cognitive architecture of your design.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">The experiment:</strong> For one week, practice the two-step Strategy. Before acting on anything, check: did my Sacral respond to this? After responding, practice informing those who will be affected before you move. Notice the difference between initiated action (frustration, resistance) and responded-then-informed action (satisfaction, peace).</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">The celebrity database:</strong> Explore Manifesting Generators in Genetic Matrix's 87,000+ celebrity database. See how MG speed and multi-passionate energy manifests across different lives and careers.</p>"""

new_explore = """<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">How to explore your MG design</h2>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">On Genetic Matrix:</strong> Generate a free Foundation chart to confirm Type and Authority. Advanced and Pro charts reveal your <a href="../profiles/" class="text-gm-purple hover:underline">Profile</a>, <a href="../centers/" class="text-gm-purple hover:underline">Centers</a>, <a href="../channels/" class="text-gm-purple hover:underline">Channels</a>, <a href="../gates/" class="text-gm-purple hover:underline">Gates</a>, and complete <a href="../variables/" class="text-gm-purple hover:underline">Variable</a>.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">One week experiment.</strong> Practice the two step Strategy. Before any commitment, ask did my Sacral respond to this. After a clear response, inform those who will be affected before you move. Notice the contrast between initiated action, which often brings frustration and resistance, and responded then informed action, which tends to bring satisfaction and peace.</p>
 <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Explore the Genetic Matrix celebrity database to see MG speed and multi passionate energy expressed across fields.</p>"""

html = html.replace(old_explore, new_explore)

# ========== 8. FAQ SECTION ==========
old_faq = """<details class="bg-white rounded-lg border border-gm-border">
 <summary class="py-4 px-6 text-sm font-semibold text-gray-800">What is a Manifesting Generator?</summary>
 <div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">A Manifesting Generator has a defined Sacral center plus a motor center connected to the Throat. They combine Generator life-force energy with Manifestor initiating speed. About 33% of the population, they are multi-passionate, fast-moving beings who thrive when they respond first, then inform before acting.</div>
 </details>
 <details class="bg-white rounded-lg border border-gm-border">
 <summary class="py-4 px-6 text-sm font-semibold text-gray-800">Is a Manifesting Generator the same as a Generator?</summary>
 <div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">They share a defined Sacral and the Strategy of waiting to respond, but MGs additionally have a motor-to-Throat connection giving them speed, multi-tasking ability, and initiating capacity. MGs also need to inform before acting - a step pure Generators do not require.</div>
 </details>
 <details class="bg-white rounded-lg border border-gm-border">
 <summary class="py-4 px-6 text-sm font-semibold text-gray-800">Why do MGs lose interest so quickly?</summary>
 <div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">When the Sacral response shifts away from something, the energy withdraws. This is not flakiness - it is the Sacral redirecting energy to where it belongs. MGs who force themselves to keep going without Sacral engagement burn out. The correct move is to pivot to what the Sacral is now responding to.</div>
 </details>
 <details class="bg-white rounded-lg border border-gm-border">
 <summary class="py-4 px-6 text-sm font-semibold text-gray-800">Can MGs focus on one thing?</summary>
 <div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">Yes - if the Sacral is genuinely lit up by one thing. But many MGs are designed to have multiple pursuits simultaneously. The key is not forcing single-focus when multiple-focus is correct, and not scattering energy across too many things without genuine Sacral response for each one.</div>
 </details>
 <details class="bg-white rounded-lg border border-gm-border">
 <summary class="py-4 px-6 text-sm font-semibold text-gray-800">What does informing look like for MGs?</summary>
 <div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">Informing is simply letting those who will be impacted know what you are about to do - before you do it. "I am going to start working on this project." "I have decided to change direction." It is not asking permission. It is a courtesy that reduces resistance and creates peace.</div>
 </details>
 <details class="bg-white rounded-lg border border-gm-border">
 <summary class="py-4 px-6 text-sm font-semibold text-gray-800">Why does my MG child seem so chaotic?</summary>
 <div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">MG children move fast, change interests frequently, and can seem unfocused to adults - especially Generator or Projector parents. This is their design operating correctly. Support them by offering things to respond to rather than dictating what they should focus on, and teach them the practice of informing.</div>
 </details>"""

new_faq = """<details class="bg-white rounded-lg border border-gm-border">
 <summary class="py-4 px-6 text-sm font-semibold text-gray-800">What is a Manifesting Generator in Human Design?</summary>
 <div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">A Manifesting Generator has a defined Sacral Center plus a motor to the Throat. They combine Generator life force with initiating speed. About 33 percent of the population. Strategy is respond, then inform. Signature is satisfaction and peace.</div>
 </details>
 <details class="bg-white rounded-lg border border-gm-border">
 <summary class="py-4 px-6 text-sm font-semibold text-gray-800">Is a Manifesting Generator the same as a Generator?</summary>
 <div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">They share a defined Sacral and the need to wait to respond. MGs also have a motor to the Throat, which adds speed, multi tasking ability, and initiating capacity. MGs need to inform before acting. Pure Generators do not.</div>
 </details>
 <details class="bg-white rounded-lg border border-gm-border">
 <summary class="py-4 px-6 text-sm font-semibold text-gray-800">Why do MGs lose interest quickly?</summary>
 <div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">When the Sacral shifts away, energy withdraws. This is not flakiness. It is correct redirection. Forcing yourself to continue without Sacral engagement leads to burnout. Pivot to the next Sacral yes.</div>
 </details>
 <details class="bg-white rounded-lg border border-gm-border">
 <summary class="py-4 px-6 text-sm font-semibold text-gray-800">Can MGs focus on one thing?</summary>
 <div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">Yes, if the Sacral is truly lit by one focus. Many MGs thrive with several pursuits. Do not force single focus if multiple focus is correct. Do not scatter across too many threads without real Sacral yes for each.</div>
 </details>
 <details class="bg-white rounded-lg border border-gm-border">
 <summary class="py-4 px-6 text-sm font-semibold text-gray-800">What does informing look like for MGs?</summary>
 <div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">Informing means telling people who will be impacted what you are about to do before you do it. I am going to start this project. I have decided to change direction. It is not asking permission. It clears resistance.</div>
 </details>
 <details class="bg-white rounded-lg border border-gm-border">
 <summary class="py-4 px-6 text-sm font-semibold text-gray-800">Why does my MG child seem chaotic?</summary>
 <div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">MG children move fast and shift interests often. Offer things to respond to instead of dictating. Teach them to inform. That supports both satisfaction and peace.</div>
 </details>"""

html = html.replace(old_faq, new_faq)

# Restore CRLF before writing
html = html.replace("\n", "\r\n")

with open(filepath, "w", encoding="utf-8") as f:
    f.write(html)

print("Manifesting Generator page updated successfully.")
