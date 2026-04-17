<!DOCTYPE html>
<html lang="en">
<head>
    <link id="gm-flag-icons" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css">
<script id="gm-lang-redirect">(function(){
  var SUPPORTED = ["en","de","es","fr","it","nl","pt"];
  var path = window.location.pathname;
  var m = path.match(/^\/learn-hub\/(de|es|fr|it|nl|pt)(\/|$)/);
  var current = m ? m[1] : "en";
  var v = ("; " + document.cookie).split("; gm_lang=");
  var cookieLang = v.length === 2 ? decodeURIComponent(v.pop().split(";").shift()) : null;

  // URL is the source of truth on direct navigation. If the URL has an
  // explicit language prefix, trust it and update the cookie to match.
  // Only redirect when the URL is the default (English, no prefix) AND
  // the cookie indicates a non-default language preference.
  if (current !== "en") {
    if (cookieLang !== current) {
      var d = new Date(); d.setTime(d.getTime() + 365*24*60*60*1000);
      var parts = location.hostname.split('.');
      var domain = parts.length >= 2 ? "; domain=." + parts.slice(-2).join('.') : "";
      document.cookie = "gm_lang=" + current + "; expires=" + d.toUTCString() + "; path=/; samesite=lax" + domain;
    }
    return;
  }

  // current === "en" (no language prefix in URL). Honor cookie if non-en.
  if (cookieLang && SUPPORTED.indexOf(cookieLang) !== -1 && cookieLang !== "en") {
    var rest = path.replace(/^\/learn-hub/, "");
    if (!rest) rest = "/";
    var target = "/learn-hub/" + cookieLang + rest;
    window.location.replace(target + window.location.search + window.location.hash);
  }
})();</script>

    <meta charset="UTF-8">
 <link rel="icon" href="/favicon.ico" type="image/x-icon">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>The 12 Zodiac Signs (Plus the 13th Sign) | Astrology Signs Explained | Genetic Matrix</title>
 <meta name="description" content="Explore all 12 zodiac signs plus the controversial 13th sign Ophiuchus. Learn what each sign means, how planets express differently in each sign, and what it means to have planets in specific houses.">
 <link rel="canonical" href="https://www.geneticmatrix.com/learn-hub/astrology/zodiac-signs.php">    <link rel="alternate" hreflang="en" href="https://www.geneticmatrix.com/learn-hub/astrology/zodiac-signs.php">
    <link rel="alternate" hreflang="x-default" href="https://www.geneticmatrix.com/learn-hub/astrology/zodiac-signs.php">
<script src="https://cdn.tailwindcss.com"></script>
 <script>
 tailwind.config = {
 theme: {
 extend: {
 colors: {
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
 }
 }
 }
 }
 </script>
 <style>
 @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
 body { font-family: 'Inter', sans-serif; }
 details summary { cursor: pointer; list-style: none; }
 details summary::-webkit-details-marker { display: none; }
 details summary::after { content: '+'; float: right; font-size: 1.25rem; font-weight: 600; color: #6e5898; transition: transform 0.2s; }
 details[open] summary::after { content: '\2212'; }
 details[open] > div { animation: fadeIn 0.2s ease-in-out; }
 @keyframes fadeIn { from { opacity: 0; transform: translateY(-4px); } to { opacity: 1; transform: translateY(0); } }

 /* Milky Way drift */
 .milky-way {
     position: absolute;
     width: 200%;
     height: 100%;
     background: linear-gradient(135deg, transparent 30%, rgba(255,255,255,0.03) 45%, rgba(172,148,216,0.05) 50%, rgba(255,255,255,0.03) 55%, transparent 70%);
     animation: milkyDrift 30s linear infinite;
 }
 @keyframes milkyDrift {
     0% { transform: translateX(-25%); }
     100% { transform: translateX(25%); }
 }

 /* Starfield for astro hero */
 .astro-stars {
     position: absolute; inset: 0; pointer-events: none;
     background-image:
         radial-gradient(1.5px 1.5px at 10% 20%, rgba(255,255,255,0.8) 0%, transparent 100%),
         radial-gradient(2px 2px at 30% 50%, rgba(255,255,255,0.9) 0%, transparent 100%),
         radial-gradient(1.5px 1.5px at 50% 15%, rgba(255,255,255,0.7) 0%, transparent 100%),
         radial-gradient(2px 2px at 70% 60%, rgba(255,255,255,0.85) 0%, transparent 100%),
         radial-gradient(1.5px 1.5px at 85% 30%, rgba(255,255,255,0.75) 0%, transparent 100%),
         radial-gradient(2px 2px at 15% 70%, rgba(172,148,216,0.8) 0%, transparent 100%),
         radial-gradient(1.5px 1.5px at 60% 80%, rgba(255,255,255,0.7) 0%, transparent 100%),
         radial-gradient(2px 2px at 90% 85%, rgba(232,150,29,0.5) 0%, transparent 100%),
         radial-gradient(1.5px 1.5px at 40% 90%, rgba(255,255,255,0.6) 0%, transparent 100%),
         radial-gradient(2px 2px at 25% 40%, rgba(255,255,255,0.8) 0%, transparent 100%);
     animation: astroTwinkle 4s ease-in-out infinite alternate;
 }
 @keyframes astroTwinkle {
     0% { opacity: 0.7; }
     100% { opacity: 1; }
 }

 /* Gold constellation patterns - scattered around hero edges */
 .constellation-layer {
     position: absolute; inset: 0; pointer-events: none; overflow: hidden;
 }
 .constellation-layer svg {
     position: absolute; opacity: 0.15;
 }

 /* Hero text entrance animation */
 .hero-fade-in { opacity: 0; transform: translateY(12px); animation: heroEntrance 0.8s ease-out forwards; }
 .hero-fade-in:nth-child(1) { animation-delay: 0.2s; }
 .hero-fade-in:nth-child(2) { animation-delay: 0.4s; }
 .hero-fade-in:nth-child(3) { animation-delay: 0.6s; }
 @keyframes heroEntrance {
     to { opacity: 1; transform: translateY(0); }
 }

 /* Background zodiac wheel rotation */
 @keyframes slowSpin {
     from { transform: rotate(0deg); }
     to { transform: rotate(360deg); }
 }
 @keyframes counterSpin {
     from { rotate: 0deg; }
     to { rotate: -360deg; }
 }

 /* Zodiac wheel - gold line art */
 .zodiac-wheel-container {
     animation: slowSpin 120s linear infinite;
 }
 .zodiac-wheel-container text {
     animation: counterSpin 120s linear infinite;
     transform-box: fill-box;
     transform-origin: center;
 }
 .zodiac-wheel-container svg {
     filter: drop-shadow(0 0 8px rgba(232,150,29,0.15));
 }

 /* Sign card styles */
 .sign-card {
     transition: all 0.3s ease;
     cursor: pointer;
 }
 .sign-card:hover {
     transform: translateY(-4px);
     box-shadow: 0 8px 30px rgba(110,88,152,0.2);
 }
 .sign-card:hover .sign-icon {
     filter: drop-shadow(0 0 12px rgba(172,148,216,0.6));
 }
 .sign-card .sign-icon {
     transition: filter 0.3s ease;
 }

 /* Element filter pills */
 .element-pill {
     transition: all 0.2s ease;
     cursor: pointer;
     border: 2px solid transparent;
 }
 .element-pill:hover { transform: translateY(-1px); }
 .element-pill.active { border-color: currentColor; box-shadow: 0 2px 12px rgba(0,0,0,0.15); }
 .element-pill[data-element="fire"] { background: #dc2626; color: white; }
 .element-pill[data-element="earth"] { background: #65a30d; color: white; }
 .element-pill[data-element="air"] { background: #0891b2; color: white; }
 .element-pill[data-element="water"] { background: #2563eb; color: white; }
 .element-pill[data-element="all"] { background: #6E5898; color: white; }

 /* Card filtering animation */
 .sign-card.filtered-out {
     opacity: 0; transform: scale(0.9); pointer-events: none;
     max-height: 0; padding: 0; margin: 0; border: none; overflow: hidden;
     transition: all 0.3s ease;
 }
 .sign-card.filtered-in {
     opacity: 1; transform: scale(1);
     transition: all 0.3s ease;
 }

 /* Scroll offset for sticky nav */
 [id$="-detail"] { scroll-margin-top: 100px; }

 /* FAQ hover */
 details { transition: background-color 0.2s ease; }
 details:hover { background-color: #F4F0FC; }
 </style>
 <script type="application/ld+json">
{"@context":"https://schema.org","@type":"Article","headline":"The 12 Zodiac Signs (Plus the 13th Sign) | Astrology Signs Explained","description":"Explore all 12 zodiac signs plus the controversial 13th sign Ophiuchus. Learn what each sign means, how planets express differently in each sign, and what it means to have planets in specific houses.","publisher":{"@type":"Organization","name":"Genetic Matrix","url":"https://www.geneticmatrix.com"},"mainEntityOfPage":"https://www.geneticmatrix.com/learn-hub/astrology/zodiac-signs.php","datePublished":"2025-01-15","dateModified":"2026-03-06"}
</script>
 <script type="application/ld+json">
{"@context":"https://schema.org","@type":"FAQPage","mainEntity":[
{"@type":"Question","name":"Is the 13th sign real?","acceptedAnswer":{"@type":"Answer","text":"The constellation Ophiuchus is astronomically real, and the Sun does pass through it. Whether it should be included in the astrological zodiac depends on which system you use. Traditional astrology uses 12 equal signs. The 13-Sign system includes it. Genetic Matrix lets you explore both approaches."}},
{"@type":"Question","name":"What matters more, my Sun sign or Moon sign?","acceptedAnswer":{"@type":"Answer","text":"Both are essential. Your Sun sign describes your conscious identity and life direction. Your Moon sign describes your emotional nature and inner needs. Many people find their Moon sign more relatable because it reflects their private, feeling self rather than their public identity."}},
{"@type":"Question","name":"Do my signs change if I switch from tropical to sidereal?","acceptedAnswer":{"@type":"Answer","text":"Yes. The sidereal zodiac is shifted roughly 24 degrees from the tropical zodiac, which typically moves your sign placements back by one sign. Genetic Matrix lets you view your chart in both systems to compare."}},
{"@type":"Question","name":"What does it mean if I have no planets in a house?","acceptedAnswer":{"@type":"Answer","text":"It does not mean that area of life is empty or unimportant. It simply means no planet was in that section of the sky at your birth. The sign on the house cusp and its ruling planet still describe how that life area functions for you."}}
]}
</script>
</head>
<body class="bg-white text-gray-700">

 <!-- ==================== NAV BAR ==================== -->
                             <nav class="bg-white border-b border-gray-200 sticky top-0 z-50" style="font-family: Bilo, Segoe UI, Roboto, Helvetica Neue, Arial, sans-serif;">
        <div class="w-full px-[30px] flex items-center h-[80px]">
            <!-- Logo -->
            <a id="gm-logo-link" href="/" class="flex-shrink-0">
                <img src="/learn-hub/assets/logo.svg" alt="Genetic Matrix - Know you" class="h-8 md:h-14">
            </a>

            <!-- Mobile: Cart + Hamburger (right side) -->
            <div class="lg:hidden flex items-center gap-4">
                <a href="https://www.geneticmatrix.com/cart/" title="Cart" class="px-3 relative">
                    <img src="/learn-hub/assets/icon-cart.svg" alt="Cart" class="h-5 w-auto">
                    <span id="gm-cart-count-mobile" class="absolute top-[2px] left-[55%] -translate-x-1/2 text-gm-green font-bold text-[10px] leading-none hidden">0</span>
                </a>
                <button id="gm-hamburger" class="flex items-center justify-center w-10 h-10 rounded-lg hover:bg-gray-100 transition">
                    <svg class="w-6 h-6 text-gm-gray" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>

            <!-- Desktop Nav -->
            <div class="hidden lg:flex flex-1 items-center justify-end">
                <!-- Calendar (shown when logged in) -->
                <a id="gm-calendar-icon" href="https://www.geneticmatrix.com/calendar/" class="hidden mx-3 items-center justify-center w-9 h-9 rounded-lg border border-[#dee2e6] hover:border-gm-purple/30 hover:bg-gray-50 transition" title="Calendar">
                    <img src="/learn-hub/assets/icon-calendar.svg" alt="Calendar" class="h-5 w-5">
                </a>
                <!-- Reports -->
                <a href="https://www.geneticmatrix.com/geneticmatrix-reports/" class="mx-3 flex items-center justify-center w-9 h-9 rounded-lg border border-[#dee2e6] hover:border-gm-purple/30 hover:bg-gray-50 transition" title="Reports">
                    <img src="/learn-hub/assets/icon-report.svg" alt="Reports" class="h-6 w-6">
                </a>
                <!-- Talking Charts -->
                <a href="https://www.geneticmatrix.com/talking-charts/" class="mx-3 flex items-center justify-center w-9 h-9 rounded-lg border border-[#dee2e6] hover:border-gm-purple/30 hover:bg-gray-50 transition" title="Talking Charts">
                    <img src="/learn-hub/assets/icon-talking-chart.svg" alt="Talking Charts" class="h-5 w-5">
                </a>
                <!-- Free Chart (hidden when logged in) -->
                <a id="gm-free-chart" href="#" class="px-3 text-gm-gray hover:text-gray-900 text-base font-medium" data-action="free-chart-popup">Free Chart</a>
                <!-- Learn Dropdown -->
                <div class="relative group">
                    <button class="px-3 text-gm-purple hover:text-gm-dark text-base font-semibold flex items-center gap-1">
                        Learn
                        <svg class="w-3 h-3 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="absolute top-full left-1/2 -translate-x-1/2 mt-4 w-[420px] bg-white rounded-xl shadow-xl border border-gray-100 p-3 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                        <div class="grid grid-cols-2 gap-1">
                            <a href="/learn-hub/" class="flex items-start gap-3 p-1 rounded-lg hover:bg-gm-light transition">
                                <div class="w-7 h-7 bg-gm-card-active rounded-md flex items-center justify-center flex-shrink-0 mt-0.5"><img src="/learn-hub/assets/menu-icon-hub.svg" alt="Learn Hub" class="w-6 h-6"></div>
                                <div><div class="text-sm font-semibold text-gray-800">Learn Hub</div><div class="text-xs text-gm-text-light mt-0.5">HD and Astrology education</div></div>
                            </a>
                            <a href="/celebrities/" class="flex items-start gap-3 p-1 rounded-lg hover:bg-gm-light transition">
                                <div class="w-7 h-7 bg-gm-card-active rounded-md flex items-center justify-center flex-shrink-0 mt-0.5"><img src="/learn-hub/assets/menu-icon-celebrity.svg" alt="Celebrity Search" class="w-6 h-6"></div>
                                <div><div class="text-sm font-semibold text-gray-800">Celebrity Search</div><div class="text-xs text-gm-text-light mt-0.5">88,600+ celebrity charts</div></div>
                            </a>
                            <a href="/learn-hub/dictionary/dictionary.html" class="flex items-start gap-3 p-1 rounded-lg hover:bg-gm-light transition">
                                <div class="w-7 h-7 bg-gm-card-active rounded-md flex items-center justify-center flex-shrink-0 mt-0.5"><img src="/learn-hub/assets/menu-icon-dictionary.svg" alt="Dictionary" class="w-6 h-6"></div>
                                <div><div class="text-sm font-semibold text-gray-800">Dictionary</div><div class="text-xs text-gm-text-light mt-0.5">HD and Astrology terms</div></div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Our Plans -->
                <a href="https://www.geneticmatrix.com/plans-features/" class="px-3 text-gm-gray hover:text-gray-900 text-base font-medium">Our Plans</a>
                <!-- Cart -->
                <a href="https://www.geneticmatrix.com/cart/" title="Cart" class="px-3 relative">
                    <img src="/learn-hub/assets/icon-cart.svg" alt="Cart" class="h-5 w-auto">
                    <span id="gm-cart-count" class="absolute top-[2px] left-[55%] -translate-x-1/2 text-gm-green font-bold text-[10px] leading-none hidden">0</span>
                </a>
                <!-- Language Switcher -->
                <div class="relative group px-3">
                    <button class="flex items-center gap-2 text-gm-gray hover:text-gray-900 text-base">
                        <svg class="w-3 h-3 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        <span id="gm-lang-current">English</span>
                        <span id="gm-lang-flag" class="flag-icon flag-icon-gb"></span>
                    </button>
                    <div class="absolute top-full right-0 mt-4 w-44 bg-white rounded-xl shadow-xl border border-gray-100 py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                        <a data-lang="pt" href="#" class="flex items-center gap-3 px-4 py-2 text-sm text-gm-gray hover:bg-gm-light hover:text-gm-purple transition"><span class="flag-icon flag-icon-pt"></span> Português</a>
                        <a data-lang="nl" href="#" class="flex items-center gap-3 px-4 py-2 text-sm text-gm-gray hover:bg-gm-light hover:text-gm-purple transition"><span class="flag-icon flag-icon-nl"></span> Nederland</a>
                        <a data-lang="it" href="#" class="flex items-center gap-3 px-4 py-2 text-sm text-gm-gray hover:bg-gm-light hover:text-gm-purple transition"><span class="flag-icon flag-icon-it"></span> Italiano</a>
                        <a data-lang="fr" href="#" class="flex items-center gap-3 px-4 py-2 text-sm text-gm-gray hover:bg-gm-light hover:text-gm-purple transition"><span class="flag-icon flag-icon-fr"></span> Français</a>
                        <a data-lang="es" href="#" class="flex items-center gap-3 px-4 py-2 text-sm text-gm-gray hover:bg-gm-light hover:text-gm-purple transition"><span class="flag-icon flag-icon-es"></span> Español</a>
                        <a data-lang="de" href="#" class="flex items-center gap-3 px-4 py-2 text-sm text-gm-gray hover:bg-gm-light hover:text-gm-purple transition"><span class="flag-icon flag-icon-de"></span> Deutsch</a>
                        <a data-lang="en" href="#" class="flex items-center gap-3 px-4 py-2 text-sm text-gm-gray hover:bg-gm-light hover:text-gm-purple transition"><span class="flag-icon flag-icon-gb"></span> English</a>
                    </div>
                </div>
                <!-- Logged OUT -->
                <div id="gm-logged-out" class="flex items-center">
                    <a href="https://www.geneticmatrix.com/my-account/" class="px-3 text-gm-gray hover:text-gray-900 text-base font-medium" class="px-3">Sign In</a>
                    <a href="https://www.geneticmatrix.com/register/" class="bg-red-500 hover:bg-red-600 text-white text-base font-semibold px-5 py-2 rounded-full transition">Register</a>
                </div>
                <!-- Logged IN -->
                <div id="gm-logged-in" class="hidden items-center">
                    <a href="https://www.geneticmatrix.com/wp-login.php?action=logout&redirect_to=%2Flogout-1%2F" class="px-3 text-gm-gray hover:text-gray-900 text-base font-medium" class="px-3">Log Out</a>
                    <a href="https://www.geneticmatrix.com/user-home/" class="bg-gm-green hover:bg-gm-green-dark text-white text-sm font-semibold px-5 py-2 rounded-full transition">My Hub</a>
                </div>
            </div>

        </div>

        <!-- Mobile Menu -->
        <div id="gm-mobile-menu" style="display:none" class="lg:hidden bg-white border-t border-gray-100 px-6 py-4">
            <div class="flex flex-col gap-3">
                <a href="/learn-hub/" class="flex items-center gap-3 py-2 text-sm font-semibold text-gray-800 hover:text-gm-purple transition">
                    <img src="/learn-hub/assets/menu-icon-hub.svg" alt="" class="w-5 h-5"> Learn Hub
                </a>
                <a href="/celebrities/" class="flex items-center gap-3 py-2 text-sm font-semibold text-gray-800 hover:text-gm-purple transition">
                    <img src="/learn-hub/assets/menu-icon-celebrity.svg" alt="" class="w-5 h-5"> Celebrity Search
                </a>
                <a href="/learn-hub/dictionary/dictionary.html" class="flex items-center gap-3 py-2 text-sm font-semibold text-gray-800 hover:text-gm-purple transition">
                    <img src="/learn-hub/assets/menu-icon-dictionary.svg" alt="" class="w-5 h-5"> Dictionary
                </a>
                <div class="border-t border-gray-100 my-1"></div>
                <a href="#" class="py-2 text-sm text-gm-gray hover:text-gray-900 transition" data-action="free-chart-popup">Free Chart</a>
                <a href="https://www.geneticmatrix.com/plans-features/" class="py-2 text-sm text-gm-gray hover:text-gray-900 transition">Our Plans</a>
                <div class="border-t border-gray-100 my-1"></div>
                <a href="https://www.geneticmatrix.com/user-home/" class="py-2 text-sm font-semibold text-gm-green hover:text-gm-green-dark transition">My Hub</a>
                <a href="https://www.geneticmatrix.com/wp-login.php?action=logout&redirect_to=%2Flogout-1%2F" class="py-2 text-sm text-gm-gray hover:text-gray-900 transition" class="px-3">Log Out</a>
            </div>
        </div>
    </nav>
    <script id="gm-calendar-auth">(function(){
      // Show calendar icon in nav when user is logged in. Fetches user state
      // once per page load (browser caches the response so cost is minimal).
      fetch('/learn-hub/api/user-state.php', { credentials: 'same-origin' })
        .then(function(r){ return r.json(); })
        .then(function(data){
          if (data && data.logged_in) {
            var cal = document.getElementById('gm-calendar-icon');
            if (cal) { cal.classList.remove('hidden'); cal.classList.add('flex'); }
          }
        })
        .catch(function(){});
    })();</script>
    <script id="gm-lang-switcher">(function(){
      var LANGS = {en:"English",de:"Deutsch",es:"Español",fr:"Français",it:"Italiano",nl:"Nederland",pt:"Português"};
      var FLAGS = {en:"gb",de:"de",es:"es",fr:"fr",it:"it",nl:"nl",pt:"pt"};
      var SUPPORTED = ["en","de","es","fr","it","nl","pt"];
      var path = window.location.pathname;
      var m = path.match(/^\/learn-hub\/(de|es|fr|it|nl|pt)(\/|$)/);
      var current = m ? m[1] : "en";
      var rest = m ? path.substring(("/learn-hub/" + current).length) : path.replace(/^\/learn-hub/, "");
      if (!rest) rest = "/";

      // Cookie helpers (shared with WordPress/WPML on .geneticmatrix.com)
      function getCookie(name){
        var v = ("; " + document.cookie).split("; " + name + "=");
        return v.length === 2 ? decodeURIComponent(v.pop().split(";").shift()) : null;
      }
      function setCookie(name, value){
        var d = new Date(); d.setTime(d.getTime() + 365*24*60*60*1000);
        var parts = location.hostname.split('.');
        var domain = parts.length >= 2 ? "; domain=." + parts.slice(-2).join('.') : "";
        document.cookie = name + "=" + value + "; expires=" + d.toUTCString() + "; path=/; samesite=lax" + domain;
      }

      // Sync cookie to current URL language (head script handles redirect before render)
      var cookieLang = getCookie("gm_lang");
      if (cookieLang !== current) setCookie("gm_lang", current);

      var label = document.getElementById("gm-lang-current");
      if (label) label.textContent = LANGS[current];
      var flagEl = document.getElementById("gm-lang-flag");
      if (flagEl) flagEl.className = "flag-icon flag-icon-" + (FLAGS[current] || "gb");
      // Point logo at the matching WordPress language root so clicking it
      // doesn't trigger a cross-language redirect hop through PHP.
      var logo = document.getElementById("gm-logo-link");
      if (logo) logo.href = current === "en" ? "/" : ("/" + current + "/");

      document.querySelectorAll('a[data-lang]').forEach(function(a){
        var lang = a.getAttribute('data-lang');
        a.href = lang === "en" ? ("/learn-hub" + rest) : ("/learn-hub/" + lang + rest);
        if (lang === current) a.classList.add('text-gm-purple','font-semibold');
        a.addEventListener('click', function(){ setCookie("gm_lang", lang); });
      });
    })();</script>
<script id="gm-calendar-auth">(function(){
      // Show calendar icon in nav when user is logged in. Fetches user state
      // once per page load (browser caches the response so cost is minimal).
      fetch('/learn-hub/api/user-state.php', { credentials: 'same-origin' })
        .then(function(r){ return r.json(); })
        .then(function(data){
          if (data && data.logged_in) {
            var cal = document.getElementById('gm-calendar-icon');
            if (cal) { cal.classList.remove('hidden'); cal.classList.add('flex'); }
          }
        })
        .catch(function(){});
    })();</script>
    <script id="gm-lang-switcher">(function(){
      var LANGS = {en:"English",de:"Deutsch",es:"Español",fr:"Français",it:"Italiano",nl:"Nederland",pt:"Português"};
      var FLAGS = {en:"gb",de:"de",es:"es",fr:"fr",it:"it",nl:"nl",pt:"pt"};
      var SUPPORTED = ["en","de","es","fr","it","nl","pt"];
      var path = window.location.pathname;
      var m = path.match(/^\/learn-hub\/(de|es|fr|it|nl|pt)(\/|$)/);
      var current = m ? m[1] : "en";
      var rest = m ? path.substring(("/learn-hub/" + current).length) : path.replace(/^\/learn-hub/, "");
      if (!rest) rest = "/";

      // Cookie helpers (shared with WordPress/WPML on .geneticmatrix.com)
      function getCookie(name){
        var v = ("; " + document.cookie).split("; " + name + "=");
        return v.length === 2 ? decodeURIComponent(v.pop().split(";").shift()) : null;
      }
      function setCookie(name, value){
        var d = new Date(); d.setTime(d.getTime() + 365*24*60*60*1000);
        var parts = location.hostname.split('.');
        var domain = parts.length >= 2 ? "; domain=." + parts.slice(-2).join('.') : "";
        document.cookie = name + "=" + value + "; expires=" + d.toUTCString() + "; path=/; samesite=lax" + domain;
      }

      // Sync cookie to current URL language (head script handles redirect before render)
      var cookieLang = getCookie("gm_lang");
      if (cookieLang !== current) setCookie("gm_lang", current);

      var label = document.getElementById("gm-lang-current");
      if (label) label.textContent = LANGS[current];
      var flagEl = document.getElementById("gm-lang-flag");
      if (flagEl) flagEl.className = "flag-icon flag-icon-" + (FLAGS[current] || "gb");
      // Point logo at the matching WordPress language root so clicking it
      // doesn't trigger a cross-language redirect hop through PHP.
      var logo = document.getElementById("gm-logo-link");
      if (logo) logo.href = current === "en" ? "/" : ("/" + current + "/");

      document.querySelectorAll('a[data-lang]').forEach(function(a){
        var lang = a.getAttribute('data-lang');
        a.href = lang === "en" ? ("/learn-hub" + rest) : ("/learn-hub/" + lang + rest);
        if (lang === current) a.classList.add('text-gm-purple','font-semibold');
        a.addEventListener('click', function(){ setCookie("gm_lang", lang); });
      });
    })();</script>
<script id="gm-calendar-auth">(function(){
      // Show calendar icon in nav when user is logged in. Fetches user state
      // once per page load (browser caches the response so cost is minimal).
      fetch('/learn-hub/api/user-state.php', { credentials: 'same-origin' })
        .then(function(r){ return r.json(); })
        .then(function(data){
          if (data && data.logged_in) {
            var cal = document.getElementById('gm-calendar-icon');
            if (cal) { cal.classList.remove('hidden'); cal.classList.add('flex'); }
          }
        })
        .catch(function(){});
    })();</script>
    <script id="gm-lang-switcher">(function(){
      var LANGS = {en:"English",de:"Deutsch",es:"Español",fr:"Français",it:"Italiano",nl:"Nederland",pt:"Português"};
      var FLAGS = {en:"gb",de:"de",es:"es",fr:"fr",it:"it",nl:"nl",pt:"pt"};
      var SUPPORTED = ["en","de","es","fr","it","nl","pt"];
      var path = window.location.pathname;
      var m = path.match(/^\/learn-hub\/(de|es|fr|it|nl|pt)(\/|$)/);
      var current = m ? m[1] : "en";
      var rest = m ? path.substring(("/learn-hub/" + current).length) : path.replace(/^\/learn-hub/, "");
      if (!rest) rest = "/";

      // Cookie helpers (shared with WordPress/WPML on .geneticmatrix.com)
      function getCookie(name){
        var v = ("; " + document.cookie).split("; " + name + "=");
        return v.length === 2 ? decodeURIComponent(v.pop().split(";").shift()) : null;
      }
      function setCookie(name, value){
        var d = new Date(); d.setTime(d.getTime() + 365*24*60*60*1000);
        var parts = location.hostname.split('.');
        var domain = parts.length >= 2 ? "; domain=." + parts.slice(-2).join('.') : "";
        document.cookie = name + "=" + value + "; expires=" + d.toUTCString() + "; path=/; samesite=lax" + domain;
      }

      // Sync cookie to current URL language (head script handles redirect before render)
      var cookieLang = getCookie("gm_lang");
      if (cookieLang !== current) setCookie("gm_lang", current);

      var label = document.getElementById("gm-lang-current");
      if (label) label.textContent = LANGS[current];
      var flagEl = document.getElementById("gm-lang-flag");
      if (flagEl) flagEl.className = "flag-icon flag-icon-" + (FLAGS[current] || "gb");
      // Point logo at the matching WordPress language root so clicking it
      // doesn't trigger a cross-language redirect hop through PHP.
      var logo = document.getElementById("gm-logo-link");
      if (logo) logo.href = current === "en" ? "/" : ("/" + current + "/");

      document.querySelectorAll('a[data-lang]').forEach(function(a){
        var lang = a.getAttribute('data-lang');
        a.href = lang === "en" ? ("/learn-hub" + rest) : ("/learn-hub/" + lang + rest);
        if (lang === current) a.classList.add('text-gm-purple','font-semibold');
        a.addEventListener('click', function(){ setCookie("gm_lang", lang); });
      });
    })();</script>
<script id="gm-calendar-auth">(function(){
      // Show calendar icon in nav when user is logged in. Fetches user state
      // once per page load (browser caches the response so cost is minimal).
      fetch('/learn-hub/api/user-state.php', { credentials: 'same-origin' })
        .then(function(r){ return r.json(); })
        .then(function(data){
          if (data && data.logged_in) {
            var cal = document.getElementById('gm-calendar-icon');
            if (cal) { cal.classList.remove('hidden'); cal.classList.add('flex'); }
          }
        })
        .catch(function(){});
    })();</script>
    <script id="gm-lang-switcher">(function(){
      var LANGS = {en:"English",de:"Deutsch",es:"Español",fr:"Français",it:"Italiano",nl:"Nederland",pt:"Português"};
      var FLAGS = {en:"gb",de:"de",es:"es",fr:"fr",it:"it",nl:"nl",pt:"pt"};
      var SUPPORTED = ["en","de","es","fr","it","nl","pt"];
      var path = window.location.pathname;
      var m = path.match(/^\/learn-hub\/(de|es|fr|it|nl|pt)(\/|$)/);
      var current = m ? m[1] : "en";
      var rest = m ? path.substring(("/learn-hub/" + current).length) : path.replace(/^\/learn-hub/, "");
      if (!rest) rest = "/";

      // Cookie helpers (shared with WordPress/WPML on .geneticmatrix.com)
      function getCookie(name){
        var v = ("; " + document.cookie).split("; " + name + "=");
        return v.length === 2 ? decodeURIComponent(v.pop().split(";").shift()) : null;
      }
      function setCookie(name, value){
        var d = new Date(); d.setTime(d.getTime() + 365*24*60*60*1000);
        var parts = location.hostname.split('.');
        var domain = parts.length >= 2 ? "; domain=." + parts.slice(-2).join('.') : "";
        document.cookie = name + "=" + value + "; expires=" + d.toUTCString() + "; path=/; samesite=lax" + domain;
      }

      // Sync cookie to current URL language (head script handles redirect before render)
      var cookieLang = getCookie("gm_lang");
      if (cookieLang !== current) setCookie("gm_lang", current);

      var label = document.getElementById("gm-lang-current");
      if (label) label.textContent = LANGS[current];
      var flagEl = document.getElementById("gm-lang-flag");
      if (flagEl) flagEl.className = "flag-icon flag-icon-" + (FLAGS[current] || "gb");
      // Point logo at the matching WordPress language root so clicking it
      // doesn't trigger a cross-language redirect hop through PHP.
      var logo = document.getElementById("gm-logo-link");
      if (logo) logo.href = current === "en" ? "/" : ("/" + current + "/");

      document.querySelectorAll('a[data-lang]').forEach(function(a){
        var lang = a.getAttribute('data-lang');
        a.href = lang === "en" ? ("/learn-hub" + rest) : ("/learn-hub/" + lang + rest);
        if (lang === current) a.classList.add('text-gm-purple','font-semibold');
        a.addEventListener('click', function(){ setCookie("gm_lang", lang); });
      });
    })();</script>
<script id="gm-calendar-auth">(function(){
      // Show calendar icon in nav when user is logged in. Fetches user state
      // once per page load (browser caches the response so cost is minimal).
      fetch('/learn-hub/api/user-state.php', { credentials: 'same-origin' })
        .then(function(r){ return r.json(); })
        .then(function(data){
          if (data && data.logged_in) {
            var cal = document.getElementById('gm-calendar-icon');
            if (cal) { cal.classList.remove('hidden'); cal.classList.add('flex'); }
          }
        })
        .catch(function(){});
    })();</script>
    <script id="gm-lang-switcher">(function(){
      var LANGS = {en:"English",de:"Deutsch",es:"Español",fr:"Français",it:"Italiano",nl:"Nederland",pt:"Português"};
      var FLAGS = {en:"gb",de:"de",es:"es",fr:"fr",it:"it",nl:"nl",pt:"pt"};
      var SUPPORTED = ["en","de","es","fr","it","nl","pt"];
      var path = window.location.pathname;
      var m = path.match(/^\/learn-hub\/(de|es|fr|it|nl|pt)(\/|$)/);
      var current = m ? m[1] : "en";
      var rest = m ? path.substring(("/learn-hub/" + current).length) : path.replace(/^\/learn-hub/, "");
      if (!rest) rest = "/";

      // Cookie helpers (shared with WordPress/WPML on .geneticmatrix.com)
      function getCookie(name){
        var v = ("; " + document.cookie).split("; " + name + "=");
        return v.length === 2 ? decodeURIComponent(v.pop().split(";").shift()) : null;
      }
      function setCookie(name, value){
        var d = new Date(); d.setTime(d.getTime() + 365*24*60*60*1000);
        var parts = location.hostname.split('.');
        var domain = parts.length >= 2 ? "; domain=." + parts.slice(-2).join('.') : "";
        document.cookie = name + "=" + value + "; expires=" + d.toUTCString() + "; path=/; samesite=lax" + domain;
      }

      // Sync cookie to current URL language (head script handles redirect before render)
      var cookieLang = getCookie("gm_lang");
      if (cookieLang !== current) setCookie("gm_lang", current);

      var label = document.getElementById("gm-lang-current");
      if (label) label.textContent = LANGS[current];
      var flagEl = document.getElementById("gm-lang-flag");
      if (flagEl) flagEl.className = "flag-icon flag-icon-" + (FLAGS[current] || "gb");

      document.querySelectorAll('a[data-lang]').forEach(function(a){
        var lang = a.getAttribute('data-lang');
        a.href = lang === "en" ? ("/learn-hub" + rest) : ("/learn-hub/" + lang + rest);
        if (lang === current) a.classList.add('text-gm-purple','font-semibold');
        a.addEventListener('click', function(){ setCookie("gm_lang", lang); });
      });
    })();</script>
<!-- Breadcrumb -->
    <div class="bg-gray-50 border-b border-gray-100">
        <div class="max-w-[1400px] mx-auto px-6 py-2.5">
            <a href="/learn-hub/" class="text-sm text-gm-purple hover:text-gm-dark font-medium transition">&larr; Back to Learn Hub</a>
        </div>
    </div>

 <!-- ==================== HERO BANNER ==================== -->
 <section class="relative overflow-hidden text-white text-center py-14 md:py-20" style="background: linear-gradient(135deg, #1e1240 0%, #3C2864 35%, #4a3070 55%, #3C2864 75%, #1a0e38 100%);">
     <!-- Milky Way band -->
     <div class="milky-way"></div>
     <!-- Star dots -->
     <div class="astro-stars"></div>
     <!-- Gold constellation patterns - scattered at edges -->
     <div class="constellation-layer">
         <!-- Top-left: Aries-like constellation -->
         <svg width="120" height="140" viewBox="0 0 120 140" style="left: 3%; top: 8%;">
             <circle cx="60" cy="10" r="3" fill="#d4a843"/><circle cx="35" cy="35" r="4" fill="#d4a843"/><circle cx="15" cy="65" r="3" fill="#d4a843"/><circle cx="40" cy="80" r="3.5" fill="#d4a843"/><circle cx="25" cy="110" r="3" fill="#d4a843"/><circle cx="55" cy="55" r="2.5" fill="#d4a843"/><circle cx="80" cy="45" r="3" fill="#d4a843"/>
             <line x1="60" y1="10" x2="35" y2="35" stroke="#d4a843" stroke-width="0.8"/><line x1="35" y1="35" x2="55" y2="55" stroke="#d4a843" stroke-width="0.8"/><line x1="55" y1="55" x2="80" y2="45" stroke="#d4a843" stroke-width="0.8"/><line x1="35" y1="35" x2="15" y2="65" stroke="#d4a843" stroke-width="0.8"/><line x1="15" y1="65" x2="40" y2="80" stroke="#d4a843" stroke-width="0.8"/><line x1="40" y1="80" x2="25" y2="110" stroke="#d4a843" stroke-width="0.8"/>
         </svg>
         <!-- Top-right: Gemini-like constellation -->
         <svg width="90" height="100" viewBox="0 0 90 100" style="right: 8%; top: 5%;">
             <circle cx="20" cy="10" r="3" fill="#d4a843"/><circle cx="70" cy="10" r="3" fill="#d4a843"/><circle cx="25" cy="40" r="2.5" fill="#d4a843"/><circle cx="65" cy="40" r="2.5" fill="#d4a843"/><circle cx="30" cy="70" r="3" fill="#d4a843"/><circle cx="60" cy="70" r="3" fill="#d4a843"/><circle cx="45" cy="90" r="3.5" fill="#d4a843"/>
             <line x1="20" y1="10" x2="25" y2="40" stroke="#d4a843" stroke-width="0.8"/><line x1="70" y1="10" x2="65" y2="40" stroke="#d4a843" stroke-width="0.8"/><line x1="25" y1="40" x2="65" y2="40" stroke="#d4a843" stroke-width="0.8"/><line x1="25" y1="40" x2="30" y2="70" stroke="#d4a843" stroke-width="0.8"/><line x1="65" y1="40" x2="60" y2="70" stroke="#d4a843" stroke-width="0.8"/><line x1="30" y1="70" x2="45" y2="90" stroke="#d4a843" stroke-width="0.8"/><line x1="60" y1="70" x2="45" y2="90" stroke="#d4a843" stroke-width="0.8"/>
         </svg>
         <!-- Bottom-left: Sagittarius-like -->
         <svg width="100" height="120" viewBox="0 0 100 120" style="left: 2%; bottom: 5%;">
             <circle cx="10" cy="100" r="3" fill="#d4a843"/><circle cx="30" cy="80" r="2.5" fill="#d4a843"/><circle cx="50" cy="60" r="3.5" fill="#d4a843"/><circle cx="70" cy="40" r="3" fill="#d4a843"/><circle cx="90" cy="20" r="2.5" fill="#d4a843"/><circle cx="40" cy="40" r="2.5" fill="#d4a843"/><circle cx="60" cy="90" r="3" fill="#d4a843"/>
             <line x1="10" y1="100" x2="30" y2="80" stroke="#d4a843" stroke-width="0.8"/><line x1="30" y1="80" x2="50" y2="60" stroke="#d4a843" stroke-width="0.8"/><line x1="50" y1="60" x2="70" y2="40" stroke="#d4a843" stroke-width="0.8"/><line x1="70" y1="40" x2="90" y2="20" stroke="#d4a843" stroke-width="0.8"/><line x1="50" y1="60" x2="40" y2="40" stroke="#d4a843" stroke-width="0.8"/><line x1="30" y1="80" x2="60" y2="90" stroke="#d4a843" stroke-width="0.8"/>
         </svg>
         <!-- Bottom-right: Orion-like -->
         <svg width="110" height="130" viewBox="0 0 110 130" style="right: 5%; bottom: 8%;">
             <circle cx="55" cy="10" r="3" fill="#d4a843"/><circle cx="35" cy="35" r="3.5" fill="#d4a843"/><circle cx="75" cy="35" r="3.5" fill="#d4a843"/><circle cx="55" cy="55" r="2.5" fill="#d4a843"/><circle cx="30" cy="80" r="3" fill="#d4a843"/><circle cx="80" cy="80" r="3" fill="#d4a843"/><circle cx="20" cy="110" r="2.5" fill="#d4a843"/><circle cx="90" cy="110" r="2.5" fill="#d4a843"/>
             <line x1="55" y1="10" x2="35" y2="35" stroke="#d4a843" stroke-width="0.8"/><line x1="55" y1="10" x2="75" y2="35" stroke="#d4a843" stroke-width="0.8"/><line x1="35" y1="35" x2="75" y2="35" stroke="#d4a843" stroke-width="0.8"/><line x1="35" y1="35" x2="55" y2="55" stroke="#d4a843" stroke-width="0.8"/><line x1="75" y1="35" x2="55" y2="55" stroke="#d4a843" stroke-width="0.8"/><line x1="35" y1="35" x2="30" y2="80" stroke="#d4a843" stroke-width="0.8"/><line x1="75" y1="35" x2="80" y2="80" stroke="#d4a843" stroke-width="0.8"/><line x1="30" y1="80" x2="20" y2="110" stroke="#d4a843" stroke-width="0.8"/><line x1="80" y1="80" x2="90" y2="110" stroke="#d4a843" stroke-width="0.8"/>
         </svg>
         <!-- Center-right small cluster -->
         <svg width="60" height="50" viewBox="0 0 60 50" style="right: 20%; top: 15%;">
             <circle cx="10" cy="25" r="2" fill="#d4a843"/><circle cx="30" cy="10" r="2.5" fill="#d4a843"/><circle cx="50" cy="30" r="2" fill="#d4a843"/><circle cx="35" cy="45" r="2.5" fill="#d4a843"/>
             <line x1="10" y1="25" x2="30" y2="10" stroke="#d4a843" stroke-width="0.6"/><line x1="30" y1="10" x2="50" y2="30" stroke="#d4a843" stroke-width="0.6"/><line x1="50" y1="30" x2="35" y2="45" stroke="#d4a843" stroke-width="0.6"/>
         </svg>
     </div>
     <div class="max-w-3xl mx-auto px-6 relative z-10">
         <span class="hero-fade-in inline-block bg-gm-purple text-white text-xs font-semibold tracking-widest uppercase px-4 py-1.5 rounded-full mb-4">Astrology</span>
         <h1 class="hero-fade-in text-3xl md:text-4xl font-bold mb-3">The 12 Zodiac Signs (Plus the 13th Sign)</h1>
         <p class="hero-fade-in text-gray-300 text-sm md:text-base leading-relaxed max-w-xl mx-auto">Explore all 12 zodiac signs plus the controversial 13th sign Ophiuchus. Learn what each sign means, how planets express differently in each sign, and what it means to have planets in specific houses.</p>
     </div>
 </section>

 <!-- ==================== WHAT ARE ZODIAC SIGNS? ==================== -->
 <section class="py-10 md:py-14 bg-white" id="what-are-zodiac-signs">
     <div class="max-w-4xl mx-auto px-6">
         <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6"><span class="text-gm-purple">|</span> What Are Zodiac Signs?</h2>

         <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">The zodiac is a belt of sky extending roughly 8 degrees on either side of the ecliptic, the apparent path the Sun traces across the sky over the course of a year. This belt is divided into 12 segments of 30 degrees each, and each segment is named after a constellation. These are the zodiac signs.</p>

         <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">In astrology, your Sun sign is determined by which segment of the zodiac the Sun occupied at the moment of your birth. But your full birth chart places all the planets, the Moon, and other significant points in the zodiac, giving you placements in multiple signs. You are not just your Sun sign. You are an entire chart.</p>

         <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Each sign has a <strong class="text-gray-800">ruling planet</strong>, an <strong class="text-gray-800">element</strong> (Fire, Earth, Air, Water), a <strong class="text-gray-800">modality</strong> (Cardinal, Fixed, Mutable), and a <strong class="text-gray-800">polarity</strong> (Yin or Yang). These qualities shape how the sign expresses its energy.</p>

         <div class="bg-gm-card-active border-l-4 border-gm-purple rounded-r-lg p-5 my-6">
             <p class="text-xs font-semibold text-gm-purple uppercase tracking-widest mb-2">Key Insight</p>
             <p class="text-gm-text text-sm leading-relaxed italic">You are not just your Sun sign. You are an entire chart. Your full birth chart places all the planets, the Moon, and other significant points across the zodiac, giving you placements in multiple signs that together paint a complete picture of who you are.</p>
         </div>
     </div>
 </section>

 <!-- ==================== ZODIAC WHEEL ==================== -->
 <section class="py-14 md:py-20 bg-gm-light relative overflow-hidden" id="zodiac-wheel">
     <div class="max-w-4xl mx-auto px-6 relative z-10">
         <!-- Rotating zodiac wheel -->
         <div class="flex justify-center mb-12">
             <div class="zodiac-wheel-container w-[300px] h-[300px] md:w-[380px] md:h-[380px]">
                 <svg viewBox="0 0 400 400" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <!-- Outer ring -->
                     <circle cx="200" cy="200" r="190" stroke="#d4a843" stroke-width="1.5"/>
                     <!-- Glyph guide ring -->
                     <circle cx="200" cy="200" r="145" stroke="#d4a843" stroke-width="0.4" stroke-dasharray="2 4"/>
                     <!-- Inner ring -->
                     <circle cx="200" cy="200" r="100" stroke="#d4a843" stroke-width="1"/>
                     <!-- Center starburst ring -->
                     <circle cx="200" cy="200" r="38" stroke="#d4a843" stroke-width="0.6"/>

                     <!-- 12 segment lines from outer ring (r=190) to inner ring (r=100) -->
                     <!-- x = 200 + r*sin(angle), y = 200 - r*cos(angle) -->
                     <line x1="200" y1="10" x2="200" y2="100" stroke="#d4a843" stroke-width="0.8"/>
                     <line x1="295" y1="35.5" x2="250" y2="113.4" stroke="#d4a843" stroke-width="0.8"/>
                     <line x1="364.5" y1="105" x2="286.6" y2="150" stroke="#d4a843" stroke-width="0.8"/>
                     <line x1="390" y1="200" x2="300" y2="200" stroke="#d4a843" stroke-width="0.8"/>
                     <line x1="364.5" y1="295" x2="286.6" y2="250" stroke="#d4a843" stroke-width="0.8"/>
                     <line x1="295" y1="364.5" x2="250" y2="286.6" stroke="#d4a843" stroke-width="0.8"/>
                     <line x1="200" y1="390" x2="200" y2="300" stroke="#d4a843" stroke-width="0.8"/>
                     <line x1="105" y1="364.5" x2="150" y2="286.6" stroke="#d4a843" stroke-width="0.8"/>
                     <line x1="35.5" y1="295" x2="113.4" y2="250" stroke="#d4a843" stroke-width="0.8"/>
                     <line x1="10" y1="200" x2="100" y2="200" stroke="#d4a843" stroke-width="0.8"/>
                     <line x1="35.5" y1="105" x2="113.4" y2="150" stroke="#d4a843" stroke-width="0.8"/>
                     <line x1="105" y1="35.5" x2="150" y2="113.4" stroke="#d4a843" stroke-width="0.8"/>

                     <!-- Center 12-pointed starburst -->
                     <!-- Cardinal rays -->
                     <line x1="200" y1="163" x2="200" y2="237" stroke="#d4a843" stroke-width="1" opacity="0.5"/>
                     <line x1="163" y1="200" x2="237" y2="200" stroke="#d4a843" stroke-width="1" opacity="0.5"/>
                     <!-- Diagonal rays -->
                     <line x1="174" y1="174" x2="226" y2="226" stroke="#d4a843" stroke-width="0.8" opacity="0.4"/>
                     <line x1="226" y1="174" x2="174" y2="226" stroke="#d4a843" stroke-width="0.8" opacity="0.4"/>
                     <!-- 30-degree rays -->
                     <line x1="181" y1="164" x2="219" y2="236" stroke="#d4a843" stroke-width="0.5" opacity="0.3"/>
                     <line x1="219" y1="164" x2="181" y2="236" stroke="#d4a843" stroke-width="0.5" opacity="0.3"/>
                     <line x1="164" y1="181" x2="236" y2="219" stroke="#d4a843" stroke-width="0.5" opacity="0.3"/>
                     <line x1="164" y1="219" x2="236" y2="181" stroke="#d4a843" stroke-width="0.5" opacity="0.3"/>
                     <!-- Star tip accents -->
                     <polygon points="200,163 196,178 200,168 204,178" fill="#d4a843" opacity="0.5"/>
                     <polygon points="200,237 204,222 200,232 196,222" fill="#d4a843" opacity="0.5"/>
                     <polygon points="163,200 178,204 168,200 178,196" fill="#d4a843" opacity="0.5"/>
                     <polygon points="237,200 222,196 232,200 222,204" fill="#d4a843" opacity="0.5"/>
                     <!-- Center dot -->
                     <circle cx="200" cy="200" r="3" fill="#d4a843"/>

                     <!-- Zodiac glyphs centered in segments (r=145, at 15°/45°/75°... between divider lines) -->
                     <!-- Aries at 15° -->
                     <text x="237.5" y="60" text-anchor="middle" dominant-baseline="central" fill="#d4a843" font-size="28" font-family="serif">&#x2648;</text>
                     <!-- Taurus at 45° -->
                     <text x="302.5" y="97.5" text-anchor="middle" dominant-baseline="central" fill="#d4a843" font-size="28" font-family="serif">&#x2649;</text>
                     <!-- Gemini at 75° -->
                     <text x="340" y="162.5" text-anchor="middle" dominant-baseline="central" fill="#d4a843" font-size="28" font-family="serif">&#x264A;</text>
                     <!-- Cancer at 105° -->
                     <text x="340" y="237.5" text-anchor="middle" dominant-baseline="central" fill="#d4a843" font-size="28" font-family="serif">&#x264B;</text>
                     <!-- Leo at 135° -->
                     <text x="302.5" y="302.5" text-anchor="middle" dominant-baseline="central" fill="#d4a843" font-size="28" font-family="serif">&#x264C;</text>
                     <!-- Virgo at 165° -->
                     <text x="237.5" y="340" text-anchor="middle" dominant-baseline="central" fill="#d4a843" font-size="28" font-family="serif">&#x264D;</text>
                     <!-- Libra at 195° -->
                     <text x="162.5" y="340" text-anchor="middle" dominant-baseline="central" fill="#d4a843" font-size="28" font-family="serif">&#x264E;</text>
                     <!-- Scorpio at 225° -->
                     <text x="97.5" y="302.5" text-anchor="middle" dominant-baseline="central" fill="#d4a843" font-size="28" font-family="serif">&#x264F;</text>
                     <!-- Sagittarius at 255° -->
                     <text x="60" y="237.5" text-anchor="middle" dominant-baseline="central" fill="#d4a843" font-size="28" font-family="serif">&#x2650;</text>
                     <!-- Capricorn at 285° -->
                     <text x="60" y="162.5" text-anchor="middle" dominant-baseline="central" fill="#d4a843" font-size="28" font-family="serif">&#x2651;</text>
                     <!-- Aquarius at 315° -->
                     <text x="97.5" y="97.5" text-anchor="middle" dominant-baseline="central" fill="#d4a843" font-size="28" font-family="serif">&#x2652;</text>
                     <!-- Pisces at 345° -->
                     <text x="162.5" y="60" text-anchor="middle" dominant-baseline="central" fill="#d4a843" font-size="28" font-family="serif">&#x2653;</text>
                 </svg>
             </div>
         </div>
     </div>
 </section>

 <!-- ==================== THE 12 ZODIAC SIGNS - CARD GRID ==================== -->
 <section class="py-10 md:py-14 bg-white" id="the-12-zodiac-signs">
     <div class="max-w-5xl mx-auto px-6">
         <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6"><span class="text-gm-purple">|</span> The 12 Zodiac Signs</h2>

         <!-- Element filter pills -->
         <div class="flex flex-wrap gap-3 mb-8" id="element-filters">
             <button class="element-pill active text-sm font-semibold px-5 py-2 rounded-full" data-element="all" onclick="filterSigns('all')">All Signs</button>
             <button class="element-pill text-sm font-semibold px-5 py-2 rounded-full" data-element="fire" onclick="filterSigns('fire')">&#x1F525; Fire</button>
             <button class="element-pill text-sm font-semibold px-5 py-2 rounded-full" data-element="earth" onclick="filterSigns('earth')">&#x1F30D; Earth</button>
             <button class="element-pill text-sm font-semibold px-5 py-2 rounded-full" data-element="air" onclick="filterSigns('air')">&#x1F4A8; Air</button>
             <button class="element-pill text-sm font-semibold px-5 py-2 rounded-full" data-element="water" onclick="filterSigns('water')">&#x1F4A7; Water</button>
         </div>

         <!-- Sign cards grid -->
         <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5" id="sign-cards">

             <!-- Aries -->
             <a href="#aries-detail" class="sign-card filtered-in bg-gm-card rounded-xl border border-gm-border p-5 text-center" data-element="fire">
                 <div class="w-14 h-14 mx-auto mb-3">
                     <img src="../assets/zodiac/Aries.svg" alt="Aries" class="sign-icon w-full h-full">
                 </div>
                 <h3 class="text-base font-bold text-gray-800 mb-1">Aries</h3>
                 <p class="text-gm-text-light text-xs mb-2">March 21 - April 19</p>
                 <span class="inline-block text-[10px] font-bold uppercase tracking-wider px-2.5 py-0.5 rounded-full bg-red-500/10 text-red-600">Fire</span>
             </a>

             <!-- Taurus -->
             <a href="#taurus-detail" class="sign-card filtered-in bg-gm-card rounded-xl border border-gm-border p-5 text-center" data-element="earth">
                 <div class="w-14 h-14 mx-auto mb-3">
                     <img src="../assets/zodiac/Taurus.svg" alt="Taurus" class="sign-icon w-full h-full">
                 </div>
                 <h3 class="text-base font-bold text-gray-800 mb-1">Taurus</h3>
                 <p class="text-gm-text-light text-xs mb-2">April 20 - May 20</p>
                 <span class="inline-block text-[10px] font-bold uppercase tracking-wider px-2.5 py-0.5 rounded-full bg-green-500/10 text-green-700">Earth</span>
             </a>

             <!-- Gemini -->
             <a href="#gemini-detail" class="sign-card filtered-in bg-gm-card rounded-xl border border-gm-border p-5 text-center" data-element="air">
                 <div class="w-14 h-14 mx-auto mb-3">
                     <img src="../assets/zodiac/Gemini.svg" alt="Gemini" class="sign-icon w-full h-full">
                 </div>
                 <h3 class="text-base font-bold text-gray-800 mb-1">Gemini</h3>
                 <p class="text-gm-text-light text-xs mb-2">May 21 - June 20</p>
                 <span class="inline-block text-[10px] font-bold uppercase tracking-wider px-2.5 py-0.5 rounded-full bg-cyan-500/10 text-cyan-700">Air</span>
             </a>

             <!-- Cancer -->
             <a href="#cancer-detail" class="sign-card filtered-in bg-gm-card rounded-xl border border-gm-border p-5 text-center" data-element="water">
                 <div class="w-14 h-14 mx-auto mb-3">
                     <img src="../assets/zodiac/Cancer.svg" alt="Cancer" class="sign-icon w-full h-full">
                 </div>
                 <h3 class="text-base font-bold text-gray-800 mb-1">Cancer</h3>
                 <p class="text-gm-text-light text-xs mb-2">June 21 - July 22</p>
                 <span class="inline-block text-[10px] font-bold uppercase tracking-wider px-2.5 py-0.5 rounded-full bg-blue-500/10 text-blue-600">Water</span>
             </a>

             <!-- Leo -->
             <a href="#leo-detail" class="sign-card filtered-in bg-gm-card rounded-xl border border-gm-border p-5 text-center" data-element="fire">
                 <div class="w-14 h-14 mx-auto mb-3">
                     <img src="../assets/zodiac/Leo.svg" alt="Leo" class="sign-icon w-full h-full">
                 </div>
                 <h3 class="text-base font-bold text-gray-800 mb-1">Leo</h3>
                 <p class="text-gm-text-light text-xs mb-2">July 23 - August 22</p>
                 <span class="inline-block text-[10px] font-bold uppercase tracking-wider px-2.5 py-0.5 rounded-full bg-red-500/10 text-red-600">Fire</span>
             </a>

             <!-- Virgo -->
             <a href="#virgo-detail" class="sign-card filtered-in bg-gm-card rounded-xl border border-gm-border p-5 text-center" data-element="earth">
                 <div class="w-14 h-14 mx-auto mb-3">
                     <img src="../assets/zodiac/Virgo.svg" alt="Virgo" class="sign-icon w-full h-full">
                 </div>
                 <h3 class="text-base font-bold text-gray-800 mb-1">Virgo</h3>
                 <p class="text-gm-text-light text-xs mb-2">August 23 - September 22</p>
                 <span class="inline-block text-[10px] font-bold uppercase tracking-wider px-2.5 py-0.5 rounded-full bg-green-500/10 text-green-700">Earth</span>
             </a>

             <!-- Libra -->
             <a href="#libra-detail" class="sign-card filtered-in bg-gm-card rounded-xl border border-gm-border p-5 text-center" data-element="air">
                 <div class="w-14 h-14 mx-auto mb-3">
                     <img src="../assets/zodiac/Libra.svg" alt="Libra" class="sign-icon w-full h-full">
                 </div>
                 <h3 class="text-base font-bold text-gray-800 mb-1">Libra</h3>
                 <p class="text-gm-text-light text-xs mb-2">September 23 - October 22</p>
                 <span class="inline-block text-[10px] font-bold uppercase tracking-wider px-2.5 py-0.5 rounded-full bg-cyan-500/10 text-cyan-700">Air</span>
             </a>

             <!-- Scorpio -->
             <a href="#scorpio-detail" class="sign-card filtered-in bg-gm-card rounded-xl border border-gm-border p-5 text-center" data-element="water">
                 <div class="w-14 h-14 mx-auto mb-3">
                     <img src="../assets/zodiac/Scorpio.svg" alt="Scorpio" class="sign-icon w-full h-full">
                 </div>
                 <h3 class="text-base font-bold text-gray-800 mb-1">Scorpio</h3>
                 <p class="text-gm-text-light text-xs mb-2">October 23 - November 21</p>
                 <span class="inline-block text-[10px] font-bold uppercase tracking-wider px-2.5 py-0.5 rounded-full bg-blue-500/10 text-blue-600">Water</span>
             </a>

             <!-- Sagittarius -->
             <a href="#sagittarius-detail" class="sign-card filtered-in bg-gm-card rounded-xl border border-gm-border p-5 text-center" data-element="fire">
                 <div class="w-14 h-14 mx-auto mb-3">
                     <img src="../assets/zodiac/Sagittarius.svg" alt="Sagittarius" class="sign-icon w-full h-full">
                 </div>
                 <h3 class="text-base font-bold text-gray-800 mb-1">Sagittarius</h3>
                 <p class="text-gm-text-light text-xs mb-2">November 22 - December 21</p>
                 <span class="inline-block text-[10px] font-bold uppercase tracking-wider px-2.5 py-0.5 rounded-full bg-red-500/10 text-red-600">Fire</span>
             </a>

             <!-- Capricorn -->
             <a href="#capricorn-detail" class="sign-card filtered-in bg-gm-card rounded-xl border border-gm-border p-5 text-center" data-element="earth">
                 <div class="w-14 h-14 mx-auto mb-3">
                     <img src="../assets/zodiac/Capricorn.svg" alt="Capricorn" class="sign-icon w-full h-full">
                 </div>
                 <h3 class="text-base font-bold text-gray-800 mb-1">Capricorn</h3>
                 <p class="text-gm-text-light text-xs mb-2">December 22 - January 19</p>
                 <span class="inline-block text-[10px] font-bold uppercase tracking-wider px-2.5 py-0.5 rounded-full bg-green-500/10 text-green-700">Earth</span>
             </a>

             <!-- Aquarius -->
             <a href="#aquarius-detail" class="sign-card filtered-in bg-gm-card rounded-xl border border-gm-border p-5 text-center" data-element="air">
                 <div class="w-14 h-14 mx-auto mb-3">
                     <img src="../assets/zodiac/Aquarius.svg" alt="Aquarius" class="sign-icon w-full h-full">
                 </div>
                 <h3 class="text-base font-bold text-gray-800 mb-1">Aquarius</h3>
                 <p class="text-gm-text-light text-xs mb-2">January 20 - February 18</p>
                 <span class="inline-block text-[10px] font-bold uppercase tracking-wider px-2.5 py-0.5 rounded-full bg-cyan-500/10 text-cyan-700">Air</span>
             </a>

             <!-- Pisces -->
             <a href="#pisces-detail" class="sign-card filtered-in bg-gm-card rounded-xl border border-gm-border p-5 text-center" data-element="water">
                 <div class="w-14 h-14 mx-auto mb-3">
                     <img src="../assets/zodiac/Pisces.svg" alt="Pisces" class="sign-icon w-full h-full">
                 </div>
                 <h3 class="text-base font-bold text-gray-800 mb-1">Pisces</h3>
                 <p class="text-gm-text-light text-xs mb-2">February 19 - March 20</p>
                 <span class="inline-block text-[10px] font-bold uppercase tracking-wider px-2.5 py-0.5 rounded-full bg-blue-500/10 text-blue-600">Water</span>
             </a>

         </div>

         <!-- Key Insight box -->
         <div class="bg-gm-card-active border-l-4 border-gm-purple rounded-r-lg p-5 mt-8">
             <p class="text-xs font-semibold text-gm-purple uppercase tracking-widest mb-2">Key Insight</p>
             <p class="text-gm-text text-sm leading-relaxed italic">Each zodiac sign rules a part of the body, creating a map from head (Aries) to feet (Pisces). This ancient correspondence connects celestial patterns to physical experience, reflecting astrology's holistic view that the macrocosm is mirrored in the microcosm.</p>
         </div>
     </div>
 </section>

 <!-- ==================== SIGN DETAIL SECTIONS ==================== -->
 <section class="py-10 md:py-14 bg-gm-light" id="sign-details">
     <div class="max-w-4xl mx-auto px-6">
         <div id="aries-detail" class="mb-10">
             <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center gap-3">
                 <img src="../assets/zodiac/Aries.svg" alt="Aries" class="w-7 h-7 flex-shrink-0">
                 Aries (March 21 - April 19)
             </h3>
             <p class="text-gm-text text-sm md:text-base leading-relaxed mb-2"><strong class="text-gray-800">Element:</strong> Fire | <strong class="text-gray-800">Modality:</strong> Cardinal | <strong class="text-gray-800">Ruler:</strong> Mars</p>
             <p class="text-gm-text text-sm md:text-base leading-relaxed">Aries is the first sign of the zodiac and carries the energy of initiation, courage, and direct action. Aries energy is competitive, independent, and impulsive. It wants to be first, to lead, and to pioneer. At its best, Aries is brave, honest, and energizing. At its most challenging, it can be impatient, aggressive, and self-centered. Aries rules the head and face.</p>
         </div>

         <div id="taurus-detail" class="mb-10">
             <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center gap-3">
                 <img src="../assets/zodiac/Taurus.svg" alt="Taurus" class="w-7 h-7 flex-shrink-0">
                 Taurus (April 20 - May 20)
             </h3>
             <p class="text-gm-text text-sm md:text-base leading-relaxed mb-2"><strong class="text-gray-800">Element:</strong> Earth | <strong class="text-gray-800">Modality:</strong> Fixed | <strong class="text-gray-800">Ruler:</strong> Venus</p>
             <p class="text-gm-text text-sm md:text-base leading-relaxed">Taurus is the sign of stability, sensuality, and material comfort. Taurus energy is patient, reliable, and deeply connected to the physical world: food, touch, nature, money, beauty. It values security above almost everything and can be extraordinarily persistent. At its most challenging, Taurus becomes stubborn, possessive, and resistant to change. Taurus rules the throat and neck.</p>
         </div>

         <div id="gemini-detail" class="mb-10">
             <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center gap-3">
                 <img src="../assets/zodiac/Gemini.svg" alt="Gemini" class="w-7 h-7 flex-shrink-0">
                 Gemini (May 21 - June 20)
             </h3>
             <p class="text-gm-text text-sm md:text-base leading-relaxed mb-2"><strong class="text-gray-800">Element:</strong> Air | <strong class="text-gray-800">Modality:</strong> Mutable | <strong class="text-gray-800">Ruler:</strong> Mercury</p>
             <p class="text-gm-text text-sm md:text-base leading-relaxed">Gemini is the sign of communication, curiosity, and mental agility. Gemini energy wants to learn everything, talk to everyone, and juggle multiple interests simultaneously. It is adaptable, witty, and socially versatile. At its most challenging, Gemini can be superficial, inconsistent, and scattered. Gemini rules the hands, arms, and lungs.</p>
         </div>

         <div id="cancer-detail" class="mb-10">
             <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center gap-3">
                 <img src="../assets/zodiac/Cancer.svg" alt="Cancer" class="w-7 h-7 flex-shrink-0">
                 Cancer (June 21 - July 22)
             </h3>
             <p class="text-gm-text text-sm md:text-base leading-relaxed mb-2"><strong class="text-gray-800">Element:</strong> Water | <strong class="text-gray-800">Modality:</strong> Cardinal | <strong class="text-gray-800">Ruler:</strong> Moon</p>
             <p class="text-gm-text text-sm md:text-base leading-relaxed">Cancer is the sign of nurturing, emotional depth, and home. Cancer energy is protective, intuitive, and deeply attached to family and the past. It creates safety for those it loves and has powerful emotional memory. At its most challenging, Cancer can be moody, clingy, and manipulative through guilt. Cancer rules the chest, breasts, and stomach.</p>
         </div>

         <div id="leo-detail" class="mb-10">
             <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center gap-3">
                 <img src="../assets/zodiac/Leo.svg" alt="Leo" class="w-7 h-7 flex-shrink-0">
                 Leo (July 23 - August 22)
             </h3>
             <p class="text-gm-text text-sm md:text-base leading-relaxed mb-2"><strong class="text-gray-800">Element:</strong> Fire | <strong class="text-gray-800">Modality:</strong> Fixed | <strong class="text-gray-800">Ruler:</strong> Sun</p>
             <p class="text-gm-text text-sm md:text-base leading-relaxed">Leo is the sign of creativity, self-expression, and personal magnetism. Leo energy is warm, generous, dramatic, and wants to be seen and appreciated. It has natural leadership qualities and a genuine desire to bring joy to others. At its most challenging, Leo can be egocentric, attention-seeking, and prideful. Leo rules the heart and upper back.</p>
         </div>

         <div id="virgo-detail" class="mb-10">
             <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center gap-3">
                 <img src="../assets/zodiac/Virgo.svg" alt="Virgo" class="w-7 h-7 flex-shrink-0">
                 Virgo (August 23 - September 22)
             </h3>
             <p class="text-gm-text text-sm md:text-base leading-relaxed mb-2"><strong class="text-gray-800">Element:</strong> Earth | <strong class="text-gray-800">Modality:</strong> Mutable | <strong class="text-gray-800">Ruler:</strong> Mercury</p>
             <p class="text-gm-text text-sm md:text-base leading-relaxed">Virgo is the sign of analysis, service, and practical improvement. Virgo energy is meticulous, health-conscious, and driven to make things work better. It notices what others miss and finds purpose in being useful. At its most challenging, Virgo can be overly critical, anxious, and perfectionist to the point of paralysis. Virgo rules the digestive system and intestines.</p>
         </div>

         <div id="libra-detail" class="mb-10">
             <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center gap-3">
                 <img src="../assets/zodiac/Libra.svg" alt="Libra" class="w-7 h-7 flex-shrink-0">
                 Libra (September 23 - October 22)
             </h3>
             <p class="text-gm-text text-sm md:text-base leading-relaxed mb-2"><strong class="text-gray-800">Element:</strong> Air | <strong class="text-gray-800">Modality:</strong> Cardinal | <strong class="text-gray-800">Ruler:</strong> Venus</p>
             <p class="text-gm-text text-sm md:text-base leading-relaxed">Libra is the sign of balance, partnership, and aesthetic harmony. Libra energy seeks fairness, beauty, and meaningful one-to-one connection. It is diplomatic, charming, and socially graceful. At its most challenging, Libra can be indecisive, people-pleasing, and conflict-avoidant to the point of dishonesty. Libra rules the kidneys, lower back, and skin.</p>
         </div>

         <div id="scorpio-detail" class="mb-10">
             <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center gap-3">
                 <img src="../assets/zodiac/Scorpio.svg" alt="Scorpio" class="w-7 h-7 flex-shrink-0">
                 Scorpio (October 23 - November 21)
             </h3>
             <p class="text-gm-text text-sm md:text-base leading-relaxed mb-2"><strong class="text-gray-800">Element:</strong> Water | <strong class="text-gray-800">Modality:</strong> Fixed | <strong class="text-gray-800">Rulers:</strong> Mars (traditional), Pluto (modern)</p>
             <p class="text-gm-text text-sm md:text-base leading-relaxed">Scorpio is the sign of transformation, intensity, and psychological depth. Scorpio energy is penetrating, passionate, and unafraid of the dark side of life. It seeks truth at any cost and has remarkable resilience. At its most challenging, Scorpio can be controlling, jealous, secretive, and vindictive. Scorpio rules the reproductive organs.</p>
         </div>

         <div id="sagittarius-detail" class="mb-10">
             <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center gap-3">
                 <img src="../assets/zodiac/Sagittarius.svg" alt="Sagittarius" class="w-7 h-7 flex-shrink-0">
                 Sagittarius (November 22 - December 21)
             </h3>
             <p class="text-gm-text text-sm md:text-base leading-relaxed mb-2"><strong class="text-gray-800">Element:</strong> Fire | <strong class="text-gray-800">Modality:</strong> Mutable | <strong class="text-gray-800">Ruler:</strong> Jupiter</p>
             <p class="text-gm-text text-sm md:text-base leading-relaxed">Sagittarius is the sign of exploration, philosophy, and the search for meaning. Sagittarius energy is optimistic, adventurous, and intellectually expansive. It wants freedom, truth, and the big picture. At its most challenging, Sagittarius can be reckless, dogmatic, and commitment-phobic. Sagittarius rules the hips, thighs, and liver.</p>
         </div>

         <div id="capricorn-detail" class="mb-10">
             <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center gap-3">
                 <img src="../assets/zodiac/Capricorn.svg" alt="Capricorn" class="w-7 h-7 flex-shrink-0">
                 Capricorn (December 22 - January 19)
             </h3>
             <p class="text-gm-text text-sm md:text-base leading-relaxed mb-2"><strong class="text-gray-800">Element:</strong> Earth | <strong class="text-gray-800">Modality:</strong> Cardinal | <strong class="text-gray-800">Ruler:</strong> Saturn</p>
             <p class="text-gm-text text-sm md:text-base leading-relaxed">Capricorn is the sign of ambition, discipline, and long-term achievement. Capricorn energy is strategic, responsible, and willing to work harder and longer than anyone else to reach the top. It respects tradition, hierarchy, and mastery through effort. At its most challenging, Capricorn can be rigid, cold, status-obsessed, and workaholic. Capricorn rules the bones, knees, and joints.</p>
         </div>

         <div id="aquarius-detail" class="mb-10">
             <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center gap-3">
                 <img src="../assets/zodiac/Aquarius.svg" alt="Aquarius" class="w-7 h-7 flex-shrink-0">
                 Aquarius (January 20 - February 18)
             </h3>
             <p class="text-gm-text text-sm md:text-base leading-relaxed mb-2"><strong class="text-gray-800">Element:</strong> Air | <strong class="text-gray-800">Modality:</strong> Fixed | <strong class="text-gray-800">Rulers:</strong> Saturn (traditional), Uranus (modern)</p>
             <p class="text-gm-text text-sm md:text-base leading-relaxed">Aquarius is the sign of innovation, humanitarianism, and individual freedom within the collective. Aquarius energy is progressive, intellectual, and often ahead of its time. It values independence, originality, and social causes. At its most challenging, Aquarius can be emotionally detached, contrarian, and aloof. Aquarius rules the ankles and circulatory system.</p>
         </div>

         <div id="pisces-detail" class="mb-4">
             <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center gap-3">
                 <img src="../assets/zodiac/Pisces.svg" alt="Pisces" class="w-7 h-7 flex-shrink-0">
                 Pisces (February 19 - March 20)
             </h3>
             <p class="text-gm-text text-sm md:text-base leading-relaxed mb-2"><strong class="text-gray-800">Element:</strong> Water | <strong class="text-gray-800">Modality:</strong> Mutable | <strong class="text-gray-800">Rulers:</strong> Jupiter (traditional), Neptune (modern)</p>
             <p class="text-gm-text text-sm md:text-base leading-relaxed">Pisces is the last sign of the zodiac, carrying the energy of dissolution, compassion, and spiritual transcendence. Pisces energy is empathic, imaginative, and deeply connected to the unseen realms: dreams, intuition, art, and the collective unconscious. At its most challenging, Pisces can be escapist, boundary-less, and prone to victimhood or martyrdom. Pisces rules the feet and the lymphatic system.</p>
         </div>
     </div>
 </section>

 <!-- ==================== THE 13TH SIGN: OPHIUCHUS ==================== -->
 <section class="py-10 md:py-14 bg-white" id="ophiuchus">
     <div class="max-w-4xl mx-auto px-6">
         <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6"><span class="text-gm-purple">|</span> The 13th Sign: Ophiuchus</h2>

         <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Ophiuchus is the constellation that sits between Scorpio and Sagittarius along the ecliptic. The Sun actually passes through Ophiuchus from roughly November 29 to December 17, meaning the astronomical Sun spends time in 13 constellations, not 12.</p>

         <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Periodically, news articles claim that NASA has "changed" the zodiac signs or "discovered" a 13th sign. This misunderstands the distinction between <strong class="text-gray-800">astronomical constellations</strong> (which are irregular, unequal sky regions) and <strong class="text-gray-800">astrological signs</strong> (which are equal 30-degree divisions of the ecliptic).</p>

         <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Traditional astrology has always known about Ophiuchus and deliberately chose 12 equal signs for mathematical and symbolic reasons. However, some modern astrologers and the 13-Sign sidereal system do incorporate Ophiuchus, giving it roughly 18 days of the year and adjusting the other signs accordingly.</p>

         <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Ophiuchus is associated with <strong class="text-gray-800">healing, serpent wisdom, forbidden knowledge, and the archetype of the healer-shaman</strong>. The constellation depicts a figure holding a serpent, the mythological Asclepius, the Greek god of medicine.</p>

         <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Genetic Matrix supports 13-Sign calculations for both astrology and Human Design charts, allowing users to explore how incorporating Ophiuchus changes their chart. This is available as one of the calculation system options.</p>

         <div class="bg-gm-card-active border-l-4 border-gm-purple rounded-r-lg p-5 my-6">
             <p class="text-xs font-semibold text-gm-purple uppercase tracking-widest mb-2">Key Insight</p>
             <p class="text-gm-text text-sm leading-relaxed italic">Traditional astrology has always known about Ophiuchus and deliberately chose 12 equal signs for mathematical and symbolic reasons. The 13-Sign system offers an alternative perspective, and Genetic Matrix lets you explore both approaches to see how your chart shifts.</p>
         </div>
     </div>
 </section>

 <!-- ==================== PLANETS IN SIGNS ==================== -->
 <section class="py-10 md:py-14 bg-gm-light" id="planets-in-signs">
     <div class="max-w-4xl mx-auto px-6">
         <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6"><span class="text-gm-purple">|</span> Planets in Signs</h2>

         <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">When a planet occupies a sign, the sign colors how that planet's energy expresses. The planet represents <em>what</em> is happening; the sign describes <em>how</em> it happens.</p>

         <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Sun in a Sign</strong> describes your core identity, ego, and life purpose. This is what most people mean when they say "I'm a Leo" or "I'm a Pisces." It is the most visible layer of your chart.</p>

         <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Moon in a Sign</strong> describes your emotional nature, instincts, and inner world. The Moon sign often feels more accurate than the Sun sign because it reflects how you process feelings and what you need to feel safe.</p>

         <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Mercury in a Sign</strong> shapes how you think, communicate, and learn. Mercury in Aries thinks quickly and speaks bluntly. Mercury in Pisces thinks in images and communicates through feeling.</p>

         <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Venus in a Sign</strong> describes how you love, what you find beautiful, and your relationship with pleasure and money. Venus in Capricorn loves through commitment and action. Venus in Gemini loves through conversation and intellectual connection.</p>

         <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Mars in a Sign</strong> describes how you assert yourself, pursue what you want, and express anger. Mars in Scorpio is strategic, intense, and relentless. Mars in Libra is indirect, diplomatic, and conflict-averse.</p>

         <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Jupiter in a Sign</strong> shows where you find growth, luck, and expansion. Jupiter in Sagittarius is in its home sign and expands through travel, philosophy, and big visions.</p>

         <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Saturn in a Sign</strong> shows where you face limitations, responsibilities, and hard-won mastery. Saturn in Capricorn is in its home sign and builds structures that endure.</p>

         <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">The outer planets (Uranus, Neptune, Pluto) move so slowly that they describe <strong class="text-gray-800">generational themes</strong> rather than individual personality. Their sign placements are shared by everyone born within a multi-year window. Their house placements and aspects to personal planets are what individualize their effects.</p>
     </div>
 </section>

 <!-- ==================== PLANETS IN HOUSES ==================== -->
 <section class="py-10 md:py-14 bg-white" id="planets-in-houses">
     <div class="max-w-4xl mx-auto px-6">
         <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6"><span class="text-gm-purple">|</span> Planets in Houses</h2>

         <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">When a planet sits in a house, it brings its energy to that area of life. The house is the <em>stage</em> where the planet performs.</p>

         <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">Here are some key combinations that illustrate the principle:</p>

         <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Sun in the 1st House:</strong> Strong sense of identity, natural confidence, tendency to lead. The self is the primary focus.</p>

         <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Moon in the 4th House:</strong> Deep connection to home and family, emotional roots run deep, need for domestic security.</p>

         <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Venus in the 7th House:</strong> Natural ease in partnerships, attractiveness to others, love of harmony in relationships.</p>

         <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Mars in the 10th House:</strong> Ambitious drive in career, competitive in the professional sphere, desire for public achievement.</p>

         <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Saturn in the 12th House:</strong> Hidden fears and responsibilities, spiritual discipline through solitude, karmic work done behind the scenes.</p>

         <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4"><strong class="text-gray-800">Jupiter in the 2nd House:</strong> Ease with money and resources, generous with possessions, tendency toward financial growth.</p>

         <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">The full picture of any house comes from combining its sign, its ruling planet, and any planets placed within it. A house with no planets is not empty or inactive. Its sign and ruler still describe how that life area operates for you.</p>
     </div>
 </section>

    <!-- ==================== CELEBRITY SEARCH BANNER ==================== -->
    <section class="py-10 md:py-12 bg-gm-dark text-white text-center">
        <div class="max-w-3xl mx-auto px-6">
            <p class="text-gm-pink text-xs font-semibold tracking-widest uppercase mb-3">Celebrity Database</p>
            <h2 class="text-xl md:text-2xl font-bold mb-3">Explore 88,600+ Celebrity Charts</h2>
            <p class="text-gray-300 text-sm leading-relaxed mb-6 max-w-xl mx-auto">Search by name and explore free Human Design charts calculated across 7 systems. Filter by Type, Profile, Authority, Sun Sign, Moon Sign, and more.</p>
            <a href="/celebrities/" class="inline-block bg-gm-pink hover:bg-[#e04d63] text-white font-semibold py-3 px-8 rounded-xl transition text-sm">
                Search Celebrities →
            </a>
        </div>
    </section>

 <!-- ==================== FAQ ACCORDION ==================== -->
 <section class="py-10 md:py-14 bg-gm-light">
     <div class="max-w-4xl mx-auto px-6">
         <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-8"><span class="text-gm-purple">|</span> Frequently Asked Questions</h2>
         <div class="space-y-3">
             <details class="bg-white rounded-lg border border-gm-border">
                 <summary class="py-4 px-6 text-sm font-semibold text-gray-800">Is the 13th sign real?</summary>
                 <div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">The constellation Ophiuchus is astronomically real, and the Sun does pass through it. Whether it should be included in the astrological zodiac depends on which system you use. Traditional astrology uses 12 equal signs. The 13-Sign system includes it. Genetic Matrix lets you explore both approaches.</div>
             </details>
             <details class="bg-white rounded-lg border border-gm-border">
                 <summary class="py-4 px-6 text-sm font-semibold text-gray-800">What matters more, my Sun sign or Moon sign?</summary>
                 <div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">Both are essential. Your Sun sign describes your conscious identity and life direction. Your Moon sign describes your emotional nature and inner needs. Many people find their Moon sign more relatable because it reflects their private, feeling self rather than their public identity.</div>
             </details>
             <details class="bg-white rounded-lg border border-gm-border">
                 <summary class="py-4 px-6 text-sm font-semibold text-gray-800">Do my signs change if I switch from tropical to sidereal?</summary>
                 <div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">Yes. The sidereal zodiac is shifted roughly 24 degrees from the tropical zodiac, which typically moves your sign placements back by one sign. Genetic Matrix lets you view your chart in both systems to compare.</div>
             </details>
             <details class="bg-white rounded-lg border border-gm-border">
                 <summary class="py-4 px-6 text-sm font-semibold text-gray-800">What does it mean if I have no planets in a house?</summary>
                 <div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">It does not mean that area of life is empty or unimportant. It simply means no planet was in that section of the sky at your birth. The sign on the house cusp and its ruling planet still describe how that life area functions for you.</div>
             </details>
         </div>
     </div>
 </section>

 <!-- ==================== CONTINUE LEARNING ==================== -->
 <section class="py-10 md:py-14 bg-white">
     <div class="max-w-4xl mx-auto px-6">
         <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-8"><span class="text-gm-purple">|</span> Other Learn Topics</h2>
         <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
             <a href="/learn-hub/astrology/planets.html" class="bg-gm-light rounded-lg border border-gm-border p-4 hover:shadow-md transition">
                 <h3 class="text-sm font-bold text-gm-purple mb-1">Planets &rarr;</h3>
                 <p class="text-gray-400 text-xs leading-relaxed">Sun through Pluto, Chiron, and Lilith.</p>
             </a>
             <a href="/learn-hub/astrology/houses.html" class="bg-gm-light rounded-lg border border-gm-border p-4 hover:shadow-md transition">
                 <h3 class="text-sm font-bold text-gm-purple mb-1">Houses &rarr;</h3>
                 <p class="text-gray-400 text-xs leading-relaxed">12 houses and 10 house systems explained.</p>
             </a>
             <a href="/learn-hub/astrology/aspects.html" class="bg-gm-light rounded-lg border border-gm-border p-4 hover:shadow-md transition">
                 <h3 class="text-sm font-bold text-gm-purple mb-1">Aspects &amp; Orbs &rarr;</h3>
                 <p class="text-gray-400 text-xs leading-relaxed">Conjunctions, trines, squares, and more.</p>
             </a>
             <a href="/learn-hub/astrology/asteroids.html" class="bg-gm-light rounded-lg border border-gm-border p-4 hover:shadow-md transition">
                 <h3 class="text-sm font-bold text-gm-purple mb-1">Asteroids &rarr;</h3>
                 <p class="text-gray-400 text-xs leading-relaxed">Ceres, Pallas, Juno, Vesta, and beyond.</p>
             </a>
             <a href="/learn-hub/astrology/fixed-stars.html" class="bg-gm-light rounded-lg border border-gm-border p-4 hover:shadow-md transition">
                 <h3 class="text-sm font-bold text-gm-purple mb-1">Fixed Stars &rarr;</h3>
                 <p class="text-gray-400 text-xs leading-relaxed">Royal Stars, Sirius, Spica, and Algol.</p>
             </a>
         </div>
     </div>
 </section>

 <!-- ==================== CTA BANNER ==================== -->
 <section class="py-14 md:py-20 bg-gm-dark text-white text-center">
     <div class="max-w-2xl mx-auto px-6">
         <h2 class="text-2xl md:text-3xl font-bold mb-4">Unlock Your Full Birth Chart</h2>
         <p class="text-gray-300 text-sm md:text-base leading-relaxed mb-8 max-w-lg mx-auto">Access detailed astrology charts, Human Design charts, and hundreds of views and tools with a Genetic Matrix Pro membership.</p>
        <a href="https://www.geneticmatrix.com/plans-features/" class="inline-block bg-gm-orange hover:bg-[#d07d18] text-white font-bold py-4 px-10 rounded-xl transition text-lg">
            Get Pro &rarr;
        </a>
    </div>
 </section>

 <!-- ==================== FOOTER ==================== -->
 <footer class="bg-[#d5d5d5] py-10">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 items-start">
                <div class="text-center md:text-left">
                    <img src="../assets/logo-footer.svg" alt="Genetic Matrix" class="h-9 mb-4 mx-auto md:mx-0">
                    <p class="text-sm text-gray-600 mb-1">&copy; 2026 Genetic Matrix LLC.</p>
                    <p class="text-sm text-gray-600 mb-2">All right reserved.</p>
                    <p class="text-sm">
                        <a href="#" class="text-gray-700 underline hover:text-gray-900">Privacy, Terms and Conditions</a>
                        <span class="mx-1">&bull;</span>
                        <a href="#" class="text-gray-700 underline hover:text-gray-900">FAQ</a>
                    </p>
                </div>
                <div class="bg-[#c5c5c5] rounded-lg p-6 text-center">
                    <h3 class="text-base font-bold text-gray-800 uppercase tracking-wide mb-2">Subscribe to Our Newsletter</h3>
                    <p class="text-gray-600 text-sm mb-4 leading-relaxed">Sign up to our newsletter to receive updates, offers, new releases, and everything related to Genetic Matrix.</p>
                    <form class="flex items-center bg-white rounded-full overflow-hidden border border-gray-400 max-w-sm mx-auto" data-action="newsletter-signup">
                        <input type="email" placeholder="Your Email Address" class="flex-1 px-4 py-2.5 text-sm text-gray-700 bg-transparent outline-none placeholder:text-gray-400">
                        <button type="submit" class="px-4 py-2.5 bg-gray-500 text-white hover:bg-gray-600 transition rounded-r-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                        </button>
                    </form>
                </div>
                <div class="text-center md:text-right">
                    <h3 class="text-base font-bold text-gray-800 uppercase tracking-wide mb-4">Connect With Us</h3>
                    <div class="flex justify-center md:justify-end gap-3 mb-4">
                        <a href="https://www.facebook.com/GeneticMatrixx" title="Facebook" target="_blank" rel="noopener"><img src="../assets/icon-fb.svg" alt="Facebook" class="w-10 h-10"></a>
                        <a href="https://x.com/GeneticMatrix" title="X" target="_blank" rel="noopener"><img src="../assets/icon-x.svg" alt="X" class="w-10 h-10"></a>
                        <a href="https://www.instagram.com/genetic_matrix/" title="Instagram" target="_blank" rel="noopener"><img src="../assets/icon-insta.svg" alt="Instagram" class="w-10 h-10"></a>
                        <a href="https://www.youtube.com/@geneticmatrixhd" title="YouTube" target="_blank" rel="noopener"><img src="../assets/icon-yt.svg" alt="YouTube" class="w-10 h-10"></a>
                    </div>
                    <a href="#" class="text-sm font-semibold text-gray-800 underline hover:text-gm-dark uppercase tracking-wide">Get in Touch</a>
                </div>
            </div>
        </div>
    </footer>

 <!-- Element filter JS -->
 <script>
 function filterSigns(element) {
     const cards = document.querySelectorAll('.sign-card');
     const pills = document.querySelectorAll('.element-pill');

     // Update active pill
     pills.forEach(p => p.classList.remove('active'));
     document.querySelector(`[data-element="${element}"]`).classList.add('active');

     // Filter cards
     cards.forEach(card => {
         if (element === 'all' || card.dataset.element === element) {
             card.classList.remove('filtered-out');
             card.classList.add('filtered-in');
         } else {
             card.classList.remove('filtered-in');
             card.classList.add('filtered-out');
         }
     });
 }
 </script>

<script>
(function() {
    fetch('/learn-hub/api/user-state.php', { credentials: 'same-origin' })
        .then(function(r) { return r.json(); })
        .then(function(data) {
            var badge = document.getElementById('gm-cart-count');
            if (badge && data.cart_count > 0) {
                badge.textContent = data.cart_count;
                badge.classList.remove('hidden');
            }
            var loggedOut = document.getElementById('gm-logged-out');
            var loggedIn = document.getElementById('gm-logged-in');
            if (data.logged_in) {
                var freeChart = document.getElementById("gm-free-chart");
                if (freeChart) freeChart.classList.add("hidden");
                if (loggedOut) loggedOut.classList.add('hidden');
                if (loggedIn) { loggedIn.classList.remove('hidden'); loggedIn.classList.add('flex'); }
            }
        })
        .catch(function() {});
})();
</script>
<script id="gm-hamburger-script">(function(){var h=document.getElementById("gm-hamburger");var m=document.getElementById("gm-mobile-menu");if(h&&m){h.onclick=function(){if(m.style.display==="block"){m.style.display="none";}else{m.style.display="block";}};}})()</script>
<script>document.addEventListener("contextmenu",e=>e.preventDefault());document.addEventListener("copy",e=>e.preventDefault());document.addEventListener("keydown",e=>{if((e.ctrlKey||e.metaKey)&&(e.key==="c"||e.key==="u"||e.key==="a"))e.preventDefault()});</script>
<script id="gm-dict-tooltip-loader">(function(){
  // Auto-detect language from URL so the same snippet works on all 7 language versions.
  var parts = window.location.pathname.split('/');
  var lang = (parts[1] === 'learn-hub' && ['de','es','fr','it','nl','pt'].indexOf(parts[2]) !== -1) ? '/' + parts[2] : '';
  var basePath = '/learn-hub' + lang + '/dictionary';
  var s = document.createElement('script');
  s.src = basePath + '/gm-dictionary.js';
  s.onload = function(){
    if (window.GMDictionary) {
      GMDictionary.init({ selectors: ['section p, section li, section blockquote'], dictionaryUrl: basePath + '/dictionary.json' });
    }
  };
  document.body.appendChild(s);
})();</script>
</body>
</html>