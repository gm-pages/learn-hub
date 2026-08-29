/**
 * Tailwind build config for the Learn Hub.
 *
 * Replaces the Tailwind PLAY CDN (https://cdn.tailwindcss.com), which all 467 pages were loading.
 * The Play CDN ships the whole Tailwind engine and compiles the stylesheet IN THE BROWSER on every
 * page load; Tailwind's own docs say it is for development only. This produces one purged,
 * minified file instead.
 *
 * Rebuild:
 *   cd learn-hub
 *   npx tailwindcss@3 -c tailwind.learnhub.config.js -i tailwind.input.css \
 *       -o assets/css/learn-hub.min.css --minify
 *
 * PINNED TO 3. The Play CDN serves Tailwind 3 and the pages use v3 syntax (`tailwind.config = {}`,
 * v3 class names). Building with v4 would change what the same class names mean.
 *
 * THE NAV IS NOT IN THIS FOLDER. It is injected at request time by Apache SSI from
 * gm-web/_nav/{lang}.html, so its utility classes exist in no Learn Hub file. Without that glob the
 * purge drops every nav class and the language switcher renders unstyled on all 467 pages.
 *
 * Colours are the UNION of the 8 different inline configs found across the pages - 27 colours, with
 * no name defined twice at different values, so merging them is lossless. Taken verbatim from the
 * pages; none is invented.
 */
module.exports = {
  content: [
    './**/*.html',
    './**/*.js',
    '!./node_modules/**',
    '../gm-web/_nav/*.html',
  ],
  /* CLASSES THAT ONLY EXIST AT RUNTIME.
   *
   * The pages toggle visibility in JavaScript - classList.add('hidden'), classList.add('flex') -
   * and a purge cannot see a class that is never written in the markup. Both happen to appear in
   * static HTML today, so the build would probably emit them anyway, but "probably" is not good
   * enough for the class that hides and shows menus on 467 pages: if it were ever dropped, every
   * dropdown and accordion would fail silently and no layout check would catch it. */
  safelist: ['hidden', 'block', 'flex', 'inline-block'],
  theme: {
    extend: {
      colors: {
        'alpha': '#7c3aed',
        'arrow-left': '#C41E2F',
        'arrow-right': '#4A4A8A',
        'demonrealm': '#2563eb',
        'earthplane': '#e85d04',
        'gm-border': '#D8D4E4',
        'gm-card': '#FAFBFC',
        'gm-card-active': '#F4F0FC',
        'gm-dark': '#3C2864',
        'gm-darker': '#2e1f4d',
        'gm-gray': '#707070',
        'gm-green': '#54931E',
        'gm-green-dark': '#468018',
        'gm-green-light': '#8EB86A',
        'gm-light': '#F7F8F9',
        'gm-orange': '#E8961D',
        'gm-pink': '#F66378',
        'gm-purple': '#6E5898',
        'gm-purple-light': '#9080B1',
        'gm-purple-soft': '#AC94D8',
        'gm-text': '#444444',
        'gm-text-dark': '#1A1A2E',
        'gm-text-light': '#949494',
        'gm-warning': '#F8F8E8',
        'lightfield': '#7c3aed',
        'metamorphosis': '#0d9488',
        'territory': '#b45309',
      },
      // 283 of the pages already declared this stack, Bilo first. bilo is the family name in
      // assets/css/bilo.css; font-family matching is case insensitive.
      fontFamily: {
        sans: ['bilo', 'Segoe UI', 'Roboto', 'Helvetica Neue', 'Arial', 'sans-serif'],
      },
    },
  },
  plugins: [],
};
