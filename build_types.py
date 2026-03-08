#!/usr/bin/env python
"""
Build script for Genetic Matrix Learn Hub - Human Design Type Pages
Reads 5 source HTML files, extracts content, and generates Tailwind-styled pages.
"""

import re
import os
import json
from html.parser import HTMLParser

SOURCE_DIR = r"C:\Users\info\Working\Zip-Archives\types-extract"
OUTPUT_DIR = r"C:\Users\info\Working\Website-Dev\learn-hub\types"

# Ensure output directory exists
os.makedirs(OUTPUT_DIR, exist_ok=True)

TYPE_FILES = [
    "generator.html",
    "manifesting-generator.html",
    "projector.html",
    "manifestor.html",
    "reflector.html",
]

# ============================================================
# HELPER: strip base64 images from source
# ============================================================
def strip_base64(html):
    return re.sub(r'src="data:image/[^"]+"', 'src="PLACEHOLDER"', html)


# ============================================================
# HELPER: clean em-dashes and enforce rules
# ============================================================
def clean_text(text):
    # Replace em-dashes with spaced hyphens
    text = text.replace('\u2014', ' - ')
    text = text.replace('&mdash;', ' - ')
    text = text.replace('\u2013', ' - ')
    text = text.replace('&ndash;', ' - ')
    # Fix double spaces that might result
    text = re.sub(r'  +', ' ', text)
    # Fix " - -" patterns
    text = text.replace(' - - ', ' - ')
    return text


# ============================================================
# HELPER: extract text content from an HTML string (strip tags)
# ============================================================
def strip_tags(html):
    return re.sub(r'<[^>]+>', '', html).strip()


# ============================================================
# HELPER: convert source HTML paragraphs/headings to Tailwind
# ============================================================
def convert_section_html(section_html):
    """Convert a source section's inner HTML to Tailwind-styled HTML."""
    lines = []
    # Process h2
    section_html = re.sub(
        r'<h2>(.*?)</h2>',
        r'<h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6"><span class="text-gm-purple">|</span> \1</h2>',
        section_html
    )
    # Process h3
    section_html = re.sub(
        r'<h3>(.*?)</h3>',
        r'<h3 class="text-lg font-semibold text-gray-800 mt-8 mb-3">\1</h3>',
        section_html
    )
    # Process regular paragraphs (not inside insight-box)
    # First handle insight boxes
    def convert_insight_box(match):
        inner = match.group(1).strip()
        # Extract <p> content
        p_match = re.search(r'<p>(.*?)</p>', inner, re.DOTALL)
        if p_match:
            p_content = p_match.group(1).strip()
        else:
            p_content = strip_tags(inner)
        return f'''<div class="bg-gm-card-active border-l-4 border-gm-purple rounded-r-lg p-5 my-6">
                <p class="text-xs font-semibold text-gm-purple uppercase tracking-widest mb-2">Key Insight</p>
                <p class="text-gm-text text-sm leading-relaxed italic">{p_content}</p>
            </div>'''

    section_html = re.sub(
        r'<div class="insight-box">\s*(.*?)\s*</div>',
        convert_insight_box,
        section_html,
        flags=re.DOTALL
    )

    # Process <p> tags with strong tags preserved
    def convert_paragraph(match):
        content = match.group(1).strip()
        # Convert <strong> to include text-gray-800 class
        content = re.sub(r'<strong>(.*?)</strong>', r'<strong class="text-gray-800">\1</strong>', content)
        return f'<p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">{content}</p>'

    section_html = re.sub(
        r'<p>(.*?)</p>',
        convert_paragraph,
        section_html,
        flags=re.DOTALL
    )

    return section_html


# ============================================================
# PARSE A SINGLE SOURCE FILE
# ============================================================
def parse_source(filename):
    filepath = os.path.join(SOURCE_DIR, filename)
    with open(filepath, 'r', encoding='utf-8') as f:
        raw = f.read()

    stripped = strip_base64(raw)
    data = {}

    # --- META ---
    data['title'] = re.search(r'<title>(.*?)</title>', stripped).group(1)
    data['meta_desc'] = re.search(r'<meta name="description" content="(.*?)"', stripped).group(1)
    kw = re.search(r'<meta name="keywords" content="(.*?)"', stripped)
    data['keywords'] = kw.group(1) if kw else ''
    data['canonical'] = re.search(r'<link rel="canonical" href="(.*?)"', stripped).group(1)
    og_title = re.search(r'<meta property="og:title" content="(.*?)"', stripped)
    data['og_title'] = og_title.group(1) if og_title else data['title']
    og_desc = re.search(r'<meta property="og:description" content="(.*?)"', stripped)
    data['og_desc'] = og_desc.group(1) if og_desc else data['meta_desc']

    # --- JSON-LD ---
    jsonld_blocks = re.findall(r'<script type="application/ld\+json">(.*?)</script>', stripped, re.DOTALL)
    data['jsonld'] = jsonld_blocks

    # --- BODY ---
    body_match = re.search(r'<body>(.*?)</body>', stripped, re.DOTALL)
    body = body_match.group(1).strip()

    # --- HERO ---
    hero_match = re.search(r'<section class="hero">(.*?)</section>', body, re.DOTALL)
    hero = hero_match.group(1)

    badge = re.search(r'<span class="hero-badge"[^>]*>(.*?)</span>', hero)
    data['badge'] = strip_tags(badge.group(1)) if badge else ''

    h1 = re.search(r'<h1>(.*?)</h1>', hero)
    data['h1'] = h1.group(1).strip() if h1 else ''

    subtitle = re.search(r'<p class="subtitle">(.*?)</p>', hero, re.DOTALL)
    data['subtitle'] = subtitle.group(1).strip() if subtitle else ''

    img_alt = re.search(r'<img[^>]+alt="(.*?)"', hero)
    data['chart_alt'] = img_alt.group(1) if img_alt else f'Human Design {data["h1"]} bodygraph chart'

    # Hero meta items
    meta_items = re.findall(r'<div class="hm-item"><div class="hm-label">(.*?)</div><div class="hm-value">(.*?)</div></div>', hero)
    data['meta_items'] = meta_items  # list of (label, value) tuples

    # --- DOCTRINE BOX ---
    doctrine = re.search(r'<div class="doctrine-box">(.*?)</div>', body, re.DOTALL)
    if doctrine:
        doc_html = doctrine.group(1).strip()
        data['doctrine'] = doc_html
    else:
        data['doctrine'] = ''

    # --- QUICK FACTS ---
    facts = re.findall(r'<div class="fact-card"><div class="fact-label">(.*?)</div><div class="fact-value">(.*?)</div></div>', body)
    data['facts'] = facts  # list of (label, value)

    # --- CONTENT SECTIONS (split by dividers) ---
    # Everything after the facts grid and before the CTA section
    # Split on divider
    sections_area = body
    # Remove hero
    sections_area = re.sub(r'<section class="hero">.*?</section>', '', sections_area, flags=re.DOTALL)
    # Remove doctrine box
    sections_area = re.sub(r'<div class="doctrine-box">.*?</div>', '', sections_area, count=1, flags=re.DOTALL)
    # Remove facts grid
    sections_area = re.sub(r'<div class="section-wide">.*?</div>\s*</div>\s*</div>', '', sections_area, count=1, flags=re.DOTALL)
    # Remove CTA
    sections_area = re.sub(r'<section class="cta-section">.*?</section>', '', sections_area, flags=re.DOTALL)
    # Remove related/continue learning
    sections_area = re.sub(r'<div class="section">\s*<h2>Other Learn Topics</h2>.*', '', sections_area, flags=re.DOTALL)
    # Remove footer
    sections_area = re.sub(r'<footer>.*', '', sections_area, flags=re.DOTALL)

    # Split on dividers
    parts = re.split(r'<div class="divider"><hr></div>', sections_area)
    content_sections = []
    for part in parts:
        part = part.strip()
        if not part:
            continue
        # Extract the section div
        sec_match = re.search(r'<div class="section"[^>]*>(.*)</div>\s*$', part, re.DOTALL)
        if sec_match:
            inner = sec_match.group(1).strip()
            # Get heading
            h2_match = re.search(r'<h2>(.*?)</h2>', inner)
            heading = h2_match.group(1).strip() if h2_match else ''
            # Get section id
            id_match = re.search(r'id="([^"]*)"', part)
            section_id = id_match.group(1) if id_match else ''
            # Skip FAQ section - handled separately
            if section_id == 'faq':
                continue
            content_sections.append({
                'id': section_id,
                'heading': heading,
                'html': inner,
            })
    data['content_sections'] = content_sections

    # --- FAQ ITEMS ---
    # Use a broader regex to capture the FAQ section: find from id="faq" to the CTA section
    faq_section = re.search(r'<div class="section" id="faq">(.*?)(?=<section class="cta-section"|<footer)', body, re.DOTALL)
    faq_items = []
    if faq_section:
        faq_html = faq_section.group(1)
        faqs = re.findall(r'<details class="faq-item">\s*<summary>(.*?)</summary>\s*<div class="faq-body">(.*?)</div>\s*</details>', faq_html, re.DOTALL)
        for q, a in faqs:
            faq_items.append({'question': q.strip(), 'answer': a.strip()})
    data['faq_items'] = faq_items

    # --- CTA ---
    cta_match = re.search(r'<section class="cta-section">(.*?)</section>', body, re.DOTALL)
    if cta_match:
        cta_html = cta_match.group(1)
        cta_h2 = re.search(r'<h2>(.*?)</h2>', cta_html)
        cta_p = re.search(r'<p>(.*?)</p>', cta_html, re.DOTALL)
        data['cta_title'] = cta_h2.group(1).strip() if cta_h2 else f'Discover Your {data["h1"]} Design'
        data['cta_desc'] = cta_p.group(1).strip() if cta_p else ''
    else:
        data['cta_title'] = f'Discover Your {data["h1"]} Design'
        data['cta_desc'] = ''

    # --- RELATED LINKS ---
    related_match = re.search(r'<h2>Other Learn Topics</h2>\s*<div class="related-grid">(.*?)</div>\s*</div>', body, re.DOTALL)
    related_links = []
    if related_match:
        links = re.findall(r'<a href="([^"]*)" class="related-card">\s*<div class="rc-title">(.*?)</div>\s*<div class="rc-desc">(.*?)</div>\s*</a>', related_match.group(1), re.DOTALL)
        for href, title, desc in links:
            related_links.append({'href': href, 'title': title.strip(), 'desc': desc.strip()})
    data['related_links'] = related_links

    return data


# ============================================================
# MAP SOURCE URLS TO LOCAL .html LINKS
# ============================================================
def localize_href(href):
    """Convert absolute geneticmatrix.com URLs to local .html paths."""
    mapping = {
        'https://geneticmatrix.com/learn/types/': 'index.html',
        'https://geneticmatrix.com/learn/types/generator/': 'generator.html',
        'https://geneticmatrix.com/learn/types/manifesting-generator/': 'manifesting-generator.html',
        'https://geneticmatrix.com/learn/types/projector/': 'projector.html',
        'https://geneticmatrix.com/learn/types/manifestor/': 'manifestor.html',
        'https://geneticmatrix.com/learn/types/reflector/': 'reflector.html',
    }
    return mapping.get(href, href)


# ============================================================
# GENERATE A SINGLE OUTPUT PAGE
# ============================================================
def generate_page(data, filename):
    """Generate a Tailwind-styled HTML page from parsed data."""

    slug = filename.replace('.html', '')

    # Clean all text data of em-dashes
    for key in ['title', 'meta_desc', 'keywords', 'og_title', 'og_desc', 'badge',
                'h1', 'subtitle', 'doctrine', 'cta_title', 'cta_desc', 'chart_alt']:
        data[key] = clean_text(data[key])

    # Build JSON-LD scripts
    jsonld_html = ''
    for block in data.get('jsonld', []):
        cleaned = clean_text(block)
        jsonld_html += f'    <script type="application/ld+json">{cleaned}</script>\n'

    # Build hero meta cards
    meta_cards_html = ''
    for label, value in data['meta_items']:
        label = clean_text(label)
        value = clean_text(value)
        meta_cards_html += f'''                        <div>
                            <div class="text-[10px] uppercase tracking-widest text-gray-400 font-semibold mb-0.5">{label}</div>
                            <div class="text-sm text-white font-semibold">{value}</div>
                        </div>
'''

    # Build quick facts cards
    facts_html = ''
    for label, value in data['facts']:
        label = clean_text(label)
        value = clean_text(value)
        facts_html += f'''                <div class="bg-gm-card-active rounded-lg border border-gm-border p-5 text-center">
                    <div class="text-xs text-gm-text-light uppercase tracking-wide font-semibold mb-1">{label}</div>
                    <div class="text-base font-bold text-gray-800">{value}</div>
                </div>
'''

    # Build content sections (alternating white/gm-light backgrounds)
    content_html = ''
    for i, section in enumerate(data['content_sections']):
        bg = 'bg-gm-light' if i % 2 == 0 else 'bg-white'
        section_id = section['id']
        inner_html = clean_text(convert_section_html(section['html']))
        id_attr = f' id="{section_id}"' if section_id else ''
        content_html += f'''    <!-- ==================== {section['heading'].upper()} ==================== -->
    <section class="py-10 md:py-14 {bg}"{id_attr}>
        <div class="max-w-4xl mx-auto px-6">
            {inner_html}
        </div>
    </section>

'''

    # Build FAQ accordion
    faq_html = ''
    for item in data['faq_items']:
        q = clean_text(item['question'])
        a = clean_text(item['answer'])
        faq_html += f'''                <details class="bg-white rounded-lg border border-gm-border">
                    <summary class="py-4 px-6 text-sm font-semibold text-gray-800">{q}</summary>
                    <div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">{a}</div>
                </details>
'''

    # Build related links
    related_html = ''
    for link in data['related_links']:
        href = localize_href(link['href'])
        title = clean_text(link['title'])
        desc = clean_text(link['desc'])
        # Replace arrow entity in title
        title_display = title
        related_html += f'''                <a href="{href}" class="bg-gm-light rounded-lg border border-gm-border p-4 hover:shadow-md transition">
                    <h3 class="text-sm font-bold text-gm-purple mb-1">{title_display}</h3>
                    <p class="text-gray-400 text-xs leading-relaxed">{desc}</p>
                </a>
'''

    # Doctrine box HTML
    doctrine_inner = clean_text(data['doctrine'])
    # Convert <strong> tags in doctrine
    doctrine_inner = re.sub(r'<strong>(.*?)</strong>', r'<strong class="text-gray-800">\1</strong>', doctrine_inner)

    # Chart alt text
    chart_alt = clean_text(data['chart_alt'])

    # Celebrity name from chart alt
    celeb_match = re.search(r'chart.*?[\-\u2014]\s*(.*?)$', chart_alt, re.IGNORECASE)
    if not celeb_match:
        celeb_match = re.search(r'aura.*?[\-\u2014]\s*(.*?)$', chart_alt, re.IGNORECASE)
    celeb_name = celeb_match.group(1).strip() if celeb_match else data['h1']
    # Clean the " - " prefix if present
    celeb_name = celeb_name.strip(' -')

    cta_title = clean_text(data['cta_title'])
    cta_desc = clean_text(data['cta_desc'])

    # Determine FAQ bg based on content sections count
    num_content = len(data['content_sections'])
    faq_bg = 'bg-gm-light' if num_content % 2 == 0 else 'bg-white'
    related_bg = 'bg-white' if faq_bg == 'bg-gm-light' else 'bg-gm-light'

    page_html = f'''<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{clean_text(data['title'])}</title>
    <meta name="description" content="{clean_text(data['meta_desc'])}">
    <meta name="keywords" content="{clean_text(data['keywords'])}">
    <link rel="canonical" href="{data['canonical']}">
    <meta property="og:title" content="{clean_text(data['og_title'])}">
    <meta property="og:description" content="{clean_text(data['og_desc'])}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{data['canonical']}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {{
            theme: {{
                extend: {{
                    colors: {{
                        'gm-purple': '#6E5898',
                        'gm-purple-light': '#9080B1',
                        'gm-purple-soft': '#AC94D8',
                        'gm-dark': '#3C2864',
                        'gm-darker': '#2e1f4d',
                        'gm-green': '#54931E',
                        'gm-green-dark': '#468018',
                        'gm-green-light': '#8EB86A',
                        'gm-pink': '#F66378',
                        'gm-orange': '#E8961D',
                        'gm-gray': '#707070',
                        'gm-light': '#F7F8F9',
                        'gm-card': '#FAFBFC',
                        'gm-card-active': '#F4F0FC',
                        'gm-border': '#D8D4E4',
                        'gm-warning': '#F8F8E8',
                        'gm-text-dark': '#1A1A2E',
                        'gm-text': '#444444',
                        'gm-text-light': '#949494',
                    }}
                }}
            }}
        }}
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body {{ font-family: 'Inter', sans-serif; }}
        details summary {{ cursor: pointer; list-style: none; }}
        details summary::-webkit-details-marker {{ display: none; }}
        details summary::after {{ content: '+'; float: right; font-size: 1.25rem; font-weight: 600; color: #6e5898; transition: transform 0.2s; }}
        details[open] summary::after {{ content: '\\2212'; }}
        details[open] > div {{ animation: fadeIn 0.2s ease-in-out; }}
        @keyframes fadeIn {{ from {{ opacity: 0; transform: translateY(-4px); }} to {{ opacity: 1; transform: translateY(0); }} }}
    </style>
{jsonld_html}</head>
<body class="bg-white text-gray-700">

    <!-- ==================== NAV BAR ==================== -->
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 flex items-center justify-between h-[80px]">
            <a href="https://geneticmatrix.com">
                <img src="../assets/logo.svg" alt="Genetic Matrix - Know you" class="h-14">
            </a>
            <div class="hidden md:flex items-center gap-8">
                <a href="#" class="text-gm-text hover:text-gm-purple transition"><img src="../assets/icon-chart.svg" alt="Charts" class="h-5 w-5 inline-block"></a>
                <a href="#" class="text-gm-text hover:text-gm-purple transition"><img src="../assets/icon-relationship.svg" alt="Compatibility" class="h-5 w-5 inline-block"></a>
                <a href="#" class="text-gm-text hover:text-gm-purple transition"><img src="../assets/icon-calendar.svg" alt="Calendar" class="h-5 w-5 inline-block"></a>
                <a href="#" class="text-gm-text hover:text-gm-purple transition"><img src="../assets/icon-transits.svg" alt="Transits" class="h-5 w-5 inline-block"></a>
                <div class="flex items-center gap-1 text-sm text-gm-text">
                    English <img src="../assets/flag-uk.svg" alt="EN" class="h-4 w-4 ml-1">
                </div>
                <a href="#" class="text-sm text-gm-text hover:text-gm-purple transition">Log Out</a>
                <a href="#" class="bg-gm-green hover:bg-gm-green-dark text-white text-sm font-semibold px-5 py-2 rounded-xl transition">My Hub</a>
            </div>
        </div>
    </nav>

    <!-- ==================== HERO BANNER ==================== -->
    <section class="bg-gm-dark text-white py-12 md:py-16">
        <div class="max-w-5xl mx-auto px-6">
            <div class="flex flex-col lg:flex-row items-center gap-10 lg:gap-16">
                <div class="flex-1 text-center lg:text-left">
                    <span class="inline-block bg-gm-purple text-white text-xs font-semibold tracking-widest uppercase px-4 py-1.5 rounded-full mb-4">{clean_text(data['badge'])}</span>
                    <h1 class="text-3xl md:text-4xl font-bold mb-3">{clean_text(data['h1'])}</h1>
                    <p class="text-gray-400 text-sm md:text-base leading-relaxed max-w-xl mb-6">{clean_text(data['subtitle'])}</p>
                    <div class="flex gap-8 justify-center lg:justify-start flex-wrap">
{meta_cards_html}                    </div>
                </div>
                <div class="w-64 lg:w-72 flex-shrink-0">
                    <div class="bg-gm-darker/50 border-2 border-dashed border-gm-purple-light/30 rounded-xl flex items-center justify-center h-72">
                        <span class="text-gm-purple-light/50 text-sm font-semibold uppercase tracking-wide text-center px-4">Chart Image<br>{celeb_name}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== DOCTRINE BOX ==================== -->
    <section class="py-10 md:py-14 bg-white">
        <div class="max-w-4xl mx-auto px-6">
            <div class="bg-gm-card-active rounded-2xl p-8 md:p-10">
                <p class="text-gm-text text-sm md:text-base leading-relaxed">{doctrine_inner}</p>
            </div>
        </div>
    </section>

    <!-- ==================== QUICK FACTS ==================== -->
    <section class="pb-10 bg-white">
        <div class="max-w-4xl mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
{facts_html}            </div>
        </div>
    </section>

    <!-- ==================== CONTENT SECTIONS ==================== -->
{content_html}
    <!-- ==================== FAQ ACCORDION ==================== -->
    <section class="py-10 md:py-14 {faq_bg}">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-8">
                <span class="text-gm-purple">|</span> Frequently Asked Questions
            </h2>
            <div class="space-y-3">
{faq_html}            </div>
        </div>
    </section>

    <!-- ==================== CONTINUE LEARNING ==================== -->
    <section class="py-10 md:py-14 {related_bg}">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-8">
                <span class="text-gm-purple">|</span> Other Learn Topics
            </h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
{related_html}            </div>
        </div>
    </section>

    <!-- ==================== CTA BANNER ==================== -->
    <section class="py-14 md:py-20 bg-gm-dark text-white text-center">
        <div class="max-w-2xl mx-auto px-6">
            <h2 class="text-2xl md:text-3xl font-bold mb-4">{cta_title}</h2>
            <p class="text-gray-300 text-sm md:text-base leading-relaxed mb-8 max-w-lg mx-auto">{cta_desc}</p>
            <a href="https://geneticmatrix.com/free-foundation-chart/" class="inline-block bg-gm-orange hover:bg-[#d07d18] text-white font-bold py-4 px-10 rounded-xl transition text-lg">
                Try free with Starter plan &rarr;
            </a>
        </div>
    </section>

    <!-- ==================== FOOTER ==================== -->
    <footer class="bg-gm-darker text-gray-400 py-10">
        <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-4">
                <img src="../assets/logo-white.svg" alt="Genetic Matrix" class="h-8">
                <span class="text-xs">&copy; 2025 Genetic Matrix. All right reserved.</span>
            </div>
            <div class="flex items-center gap-6">
                <a href="#" class="text-gray-400 hover:text-white transition"><img src="../assets/social-facebook.svg" alt="Facebook" class="h-5 w-5"></a>
                <a href="#" class="text-gray-400 hover:text-white transition"><img src="../assets/social-x.svg" alt="X" class="h-5 w-5"></a>
                <a href="#" class="text-gray-400 hover:text-white transition"><img src="../assets/social-instagram.svg" alt="Instagram" class="h-5 w-5"></a>
                <a href="#" class="text-gray-400 hover:text-white transition"><img src="../assets/social-youtube.svg" alt="YouTube" class="h-5 w-5"></a>
            </div>
            <div class="text-xs space-x-4">
                <a href="#" class="hover:text-white transition">Privacy, Terms and Conditions</a>
            </div>
        </div>
    </footer>

</body>
</html>'''

    return page_html


# ============================================================
# MAIN
# ============================================================
def main():
    for filename in TYPE_FILES:
        print(f"Processing {filename}...")
        data = parse_source(filename)
        html = generate_page(data, filename)

        # Final cleanup pass for any remaining em-dashes
        html = clean_text(html)

        # Also ensure no literal em dash characters slipped through
        assert '\u2014' not in html, f"Em dash found in {filename}"
        assert '&mdash;' not in html, f"&mdash; entity found in {filename}"

        output_path = os.path.join(OUTPUT_DIR, filename)
        with open(output_path, 'w', encoding='utf-8') as f:
            f.write(html)
        print(f"  -> Written to {output_path}")
        print(f"     Sections: {len(data['content_sections'])}, FAQs: {len(data['faq_items'])}, Related: {len(data['related_links'])}")

    print("\nAll 5 type pages generated successfully!")


if __name__ == '__main__':
    main()
