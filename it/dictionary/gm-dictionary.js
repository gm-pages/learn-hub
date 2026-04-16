/**
 * GM Dictionary Auto-Linker
 * Scans content areas for dictionary terms and wraps them with hover tooltips.
 * Usage: <script src="gm-dictionary.js"></script>
 *        <script>GMDictionary.init({ selectors: ['#descriptionArea', '#summaryArea'] });</script>
 */
(function() {
    'use strict';

    const GMDictionary = {
        terms: [],
        regex: null,
        termMap: {},
        tooltipEl: null,
        config: {
            selectors: [],
            dictionaryUrl: '/dictionary.json',
            tooltipClass: 'gm-dict-term',
            maxFirstMatch: true  // only link first occurrence of each term
        },

        async init(options = {}) {
            Object.assign(this.config, options);
            await this.loadTerms();
            this.buildRegex();
            this.createTooltip();
            this.scanAll();
        },

        async loadTerms() {
            try {
                const res = await fetch(this.config.dictionaryUrl);
                const data = await res.json();
                this.terms = data.terms || [];
            } catch(e) {
                console.warn('GM Dictionary: Could not load dictionary.json', e);
                this.terms = [];
            }
        },

        buildRegex() {
            if (this.terms.length === 0) return;

            // Collect all matchable strings (term + aliases), map back to term data
            const allPhrases = [];
            this.termMap = {};

            this.terms.forEach(t => {
                const phrases = [t.term, ...(t.aliases || [])].filter(p => p);
                phrases.forEach(phrase => {
                    allPhrases.push(phrase);
                    this.termMap[phrase] = t;
                });
            });

            // Sort longest first to avoid partial matches
            allPhrases.sort((a, b) => b.length - a.length);

            // Escape regex special chars and build pattern
            const escaped = allPhrases.map(p =>
                p.replace(/[.*+?^${}()|[\]\\]/g, '\\$&')
            );

            // Word boundary matching - case sensitive (only matches exact capitalization)
            this.regex = new RegExp('\\b(' + escaped.join('|') + ')\\b', 'g');
        },

        createTooltip() {
            if (this.tooltipEl) return;

            const tip = document.createElement('div');
            tip.id = 'gm-dict-tooltip';
            tip.style.cssText = `
                position: fixed; z-index: 9999; display: none;
                max-width: 320px; padding: 10px 14px;
                background: #2d2d3d; color: #fff; border-radius: 8px;
                font-size: 13px; line-height: 1.5; box-shadow: 0 4px 20px rgba(0,0,0,0.3);
                pointer-events: none; transition: opacity 0.15s;
            `;
            tip.innerHTML = '<div id="gm-dict-tip-title" style="font-weight:700;margin-bottom:4px;color:#AC94D8;"></div><div id="gm-dict-tip-def"></div>';
            document.body.appendChild(tip);
            this.tooltipEl = tip;
        },

        scanAll() {
            if (!this.regex || this.config.selectors.length === 0) return;

            // Page-wide first-match-only: one shared Set across all scanned elements.
            const matched = new Set();
            this.config.selectors.forEach(selector => {
                const els = document.querySelectorAll(selector);
                els.forEach(el => this.scanElement(el, matched));
            });
        },

        scanElement(el, matched) {
            if (!this.regex) return;

            // Use shared Set if passed (page-wide dedup); otherwise local (back-compat).
            if (!matched) matched = new Set();
            const walker = document.createTreeWalker(el, NodeFilter.SHOW_TEXT, null);
            const textNodes = [];

            while (walker.nextNode()) {
                // Skip if inside an existing tooltip link or inside a script/style
                const parent = walker.currentNode.parentElement;
                if (parent && (
                    parent.classList.contains(this.config.tooltipClass) ||
                    parent.tagName === 'SCRIPT' ||
                    parent.tagName === 'STYLE' ||
                    parent.closest('.' + this.config.tooltipClass)
                )) continue;
                textNodes.push(walker.currentNode);
            }

            textNodes.forEach(node => {
                const text = node.textContent;
                this.regex.lastIndex = 0;
                const fragments = [];
                let lastIndex = 0;
                let match;

                while ((match = this.regex.exec(text)) !== null) {
                    const termData = this.termMap[match[0]];
                    if (!termData) continue;

                    // First match only per term
                    if (this.config.maxFirstMatch && matched.has(termData.id)) continue;
                    matched.add(termData.id);

                    // Text before match
                    if (match.index > lastIndex) {
                        fragments.push(document.createTextNode(text.substring(lastIndex, match.index)));
                    }

                    // Create linked span
                    const span = document.createElement('span');
                    span.className = this.config.tooltipClass;
                    span.textContent = match[0];
                    span.dataset.termId = termData.id;
                    span.style.cssText = 'border-bottom: 1px dotted #6E5898; cursor: help;';

                    // Hover events
                    span.addEventListener('mouseenter', (e) => this.showTooltip(e, termData));
                    span.addEventListener('mouseleave', () => this.hideTooltip());

                    // Click to navigate if URL exists
                    if (termData.url) {
                        span.style.cursor = 'pointer';
                        span.addEventListener('click', () => {
                            window.open(termData.url, '_blank');
                        });
                    }

                    fragments.push(span);
                    lastIndex = match.index + match[0].length;
                }

                if (fragments.length > 0) {
                    // Remaining text
                    if (lastIndex < text.length) {
                        fragments.push(document.createTextNode(text.substring(lastIndex)));
                    }
                    // Replace the text node
                    const wrapper = document.createDocumentFragment();
                    fragments.forEach(f => wrapper.appendChild(f));
                    node.parentNode.replaceChild(wrapper, node);
                }
            });
        },

        showTooltip(event, termData) {
            const tip = this.tooltipEl;
            document.getElementById('gm-dict-tip-title').textContent = termData.term;
            document.getElementById('gm-dict-tip-def').textContent = termData.definition;

            tip.style.display = 'block';
            tip.style.opacity = '0';

            // Position above the term
            const rect = event.target.getBoundingClientRect();
            const tipRect = tip.getBoundingClientRect();
            let top = rect.top - tipRect.height - 8;
            let left = rect.left;

            // If would go off top, show below
            if (top < 8) top = rect.bottom + 8;
            // If would go off right
            if (left + tipRect.width > window.innerWidth - 8) {
                left = window.innerWidth - tipRect.width - 8;
            }
            if (left < 8) left = 8;

            tip.style.top = top + 'px';
            tip.style.left = left + 'px';
            tip.style.opacity = '1';
        },

        hideTooltip() {
            this.tooltipEl.style.display = 'none';
        },

        // Re-scan after content changes (e.g., new view selected)
        rescan() {
            // Remove existing tooltip spans
            document.querySelectorAll('.' + this.config.tooltipClass).forEach(span => {
                const text = document.createTextNode(span.textContent);
                span.parentNode.replaceChild(text, span);
            });
            // Normalize text nodes
            this.config.selectors.forEach(sel => {
                document.querySelectorAll(sel).forEach(el => el.normalize());
            });
            this.scanAll();
        }
    };

    // Expose globally
    window.GMDictionary = GMDictionary;
})();
