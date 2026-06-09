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
    <title>Human Design Variable: The Four Arrows Explained | Genetic Matrix</title>
    <meta name="description" content="Variable is the four-arrow system at the top of the Human Design Bodygraph. Learn how Determination, Environment, Motivation, and Perspective combine into 16 Variable configurations that describe how your body and mind are oriented.">
    <meta name="keywords" content="human design variable, human design arrows, human design determination, human design environment, human design motivation, human design perspective, 16 variables, left right variable, variable configuration, human design PHS, variable arrows, bodygraph arrows">
    <link rel="canonical" href="https://www.geneticmatrix.com/learn-hub/variables/index.php">    <link rel="alternate" hreflang="en" href="https://www.geneticmatrix.com/learn-hub/variables/index.php">
    <link rel="alternate" hreflang="x-default" href="https://www.geneticmatrix.com/learn-hub/variables/index.php">
<meta property="og:title" content="Human Design Variable: The Four Arrows Explained">
    <meta property="og:description" content="Variable is the four-arrow system at the top of the Bodygraph. Learn what left and right orientation mean and how the four arrows combine into 16 configurations.">
    <meta property="og:type" content="article">
    <meta property="og:url" content="https://www.geneticmatrix.com/learn-hub/variables/index.php">
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
                        'arrow-left': '#C41E2F',
                        'arrow-right': '#4A4A8A',
                    },
                    fontFamily: {
                        'sans': ['Bilo', 'Segoe UI', 'Roboto', 'Helvetica Neue', 'Arial', 'sans-serif'],
                    },
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
        .arrow-card { transition: box-shadow 0.2s ease; }
        .arrow-card:hover { box-shadow: 0 4px 16px rgba(0,0,0,0.06); }
    </style>

    <!-- Article JSON-LD Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Article",
        "headline": "Human Design Variable: The Four Arrows Explained",
        "description": "Variable is the four-arrow system at the top of the Human Design Bodygraph. Learn how Determination, Environment, Motivation, and Perspective combine into 16 configurations.",
        "publisher": {
            "@type": "Organization",
            "name": "Genetic Matrix",
            "url": "https://www.geneticmatrix.com"
        },
        "mainEntityOfPage": "https://www.geneticmatrix.com/learn-hub/variables/index.php",
        "datePublished": "2025-01-15",
        "dateModified": "2026-03-12"
    }
    </script>

    <!-- FAQ JSON-LD Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
            {
                "@type": "Question",
                "name": "What is Variable in Human Design?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Variable is the four-arrow system at the top of the Bodygraph. It shows how deeper mechanics such as Brain, Environment, Perspective, and Mind are oriented."
                }
            },
            {
                "@type": "Question",
                "name": "What do the arrows mean in Human Design?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "The arrows show whether each area is configured with a left-oriented or right-oriented mode of functioning. Broadly speaking, this reflects strategic versus receptive orientation."
                }
            },
            {
                "@type": "Question",
                "name": "How many Variable configurations are there?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "There are 16 total configurations, because each of the four arrows can point in one of two directions."
                }
            },
            {
                "@type": "Question",
                "name": "Does Variable matter more than Type or Authority?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "No. Variable is advanced and should be approached after foundational mechanics are understood and lived."
                }
            },
            {
                "@type": "Question",
                "name": "Can your Variable change?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "No. Your natal Variable configuration does not change. What can change is your clarity and lived relationship to it."
                }
            }
        ]
    }
    </script>

</head>
<body class="bg-white text-gray-700">

    <!-- ==================== NAV BAR ==================== -->
                        <nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
    <div class="max-w-[1400px] mx-auto px-[30px] flex items-center h-[80px]">
        <a id="gm-logo-link" href="/" class="flex-shrink-0 mr-auto">
            <img src="/learn-hub/assets/logo.svg" alt="Genetic Matrix" class="h-11">
        </a>
        <div class="lg:hidden flex items-center gap-4">
            <button id="gm-hamburger" class="flex items-center justify-center w-10 h-10 rounded-lg hover:bg-gray-100 transition">
                <svg class="w-6 h-6 text-gm-gray" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>
        <div class="hidden lg:flex items-center gap-4">
            <!-- Products dropdown: Talking Charts + Reports (future Career, Sleep, etc. land here) -->
            <div class="relative group">
                <button class="text-gm-gray hover:text-gray-900 text-xl font-medium transition whitespace-nowrap flex items-center gap-1">
                    Products <svg class="w-3 h-3 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div class="absolute top-full left-1/2 -translate-x-1/2 pt-4 w-[320px] bg-white rounded-xl shadow-xl border border-gray-100 p-3 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                    <div class="flex flex-col gap-1">
                        <a href="/geneticmatrix-reports/" class="flex items-start gap-3 p-2 rounded-lg hover:bg-gm-light transition">
                            <div class="w-7 h-7 bg-gm-card-active rounded-md flex items-center justify-center flex-shrink-0 mt-0.5"><img src="/wp-content/themes/geneticmatrix/assets/icons/report%20icon%20(2).svg" alt="" class="w-5 h-5"></div>
                            <div><div class="text-sm font-semibold text-gray-800">Reports</div><div class="text-xs text-gm-text-light mt-0.5">Deep written guides for your chart</div></div>
                        </a>
                        <a href="/talking-charts/" class="flex items-start gap-3 p-2 rounded-lg hover:bg-gm-light transition">
                            <div class="w-7 h-7 bg-gm-card-active rounded-md flex items-center justify-center flex-shrink-0 mt-0.5"><img src="/wp-content/themes/geneticmatrix/assets/icons/GM%20Icon%20Talking%20Chart.svg" alt="" class="w-5 h-5"></div>
                            <div><div class="text-sm font-semibold text-gray-800">Talking Charts</div><div class="text-xs text-gm-text-light mt-0.5">Audio interpretations for your chart</div></div>
                        </a>
                                                <a href="/free-foundation-chart/" class="flex items-start gap-3 p-2 rounded-lg hover:bg-gm-light transition gm-logged-out-only">
                            <div class="w-7 h-7 bg-gm-green/15 rounded-md flex items-center justify-center flex-shrink-0 mt-0.5"><svg class="w-4 h-4 text-gm-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg></div>
                            <div class="flex-1"><div class="flex items-center gap-1.5"><span class="text-sm font-semibold text-gray-800">Free Chart</span><span class="text-[10px] font-semibold text-gm-green bg-gm-green/10 px-1.5 py-0.5 rounded-full">Free</span></div><div class="text-xs text-gm-text-light mt-0.5">Generate your chart in seconds</div></div>
                        </a>
                                            </div>
                </div>
            </div>
                                    <div class="relative group">
                <button class="text-gm-purple font-semibold text-xl transition whitespace-nowrap flex items-center gap-1">
                    Explore <svg class="w-3 h-3 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div style="width: 560px;" class="absolute top-full left-1/2 -translate-x-1/2 pt-4 bg-white rounded-xl shadow-xl border border-gray-100 p-3 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                    <div class="grid grid-cols-2 gap-1">
                        <a href="/learn-hub/" class="flex items-start gap-3 p-2 rounded-lg hover:bg-gm-light transition">
                            <div class="w-7 h-7 bg-gm-card-active rounded-md flex items-center justify-center flex-shrink-0 mt-0.5"><img src="/learn-hub/assets/menu-icon-hub.svg" alt="" class="w-5 h-5"></div>
                            <div><div class="flex items-center gap-1.5"><span class="text-sm font-semibold text-gray-800">Learn Hub</span><span class="text-[10px] font-semibold text-gm-green bg-gm-green/10 px-1.5 py-0.5 rounded-full">Free</span></div><div class="text-xs text-gm-text-light mt-0.5">70+ in-depth guides, free for everyone</div></div>
                        </a>
                        <a href="/celebrities/" class="flex items-start gap-3 p-2 rounded-lg hover:bg-gm-light transition">
                            <div class="w-7 h-7 bg-gm-card-active rounded-md flex items-center justify-center flex-shrink-0 mt-0.5"><img src="/learn-hub/assets/menu-icon-celebrity.svg" alt="" class="w-5 h-5"></div>
                            <div><div class="flex items-center gap-1.5"><span class="text-sm font-semibold text-gray-800">Celebrity Search</span><span class="text-[10px] font-semibold text-gm-green bg-gm-green/10 px-1.5 py-0.5 rounded-full">Free</span></div><div class="text-xs text-gm-text-light mt-0.5">90,000+ celebrity charts, free to browse</div></div>
                        </a>
                        <a href="/learn-hub/dictionary/dictionary.html" class="flex items-start gap-3 p-2 rounded-lg hover:bg-gm-light transition">
                            <div class="w-7 h-7 bg-gm-card-active rounded-md flex items-center justify-center flex-shrink-0 mt-0.5"><img src="/learn-hub/assets/menu-icon-dictionary.svg" alt="" class="w-5 h-5"></div>
                            <div><div class="flex items-center gap-1.5"><span class="text-sm font-semibold text-gray-800">Dictionary</span><span class="text-[10px] font-semibold text-gm-green bg-gm-green/10 px-1.5 py-0.5 rounded-full">Free</span></div><div class="text-xs text-gm-text-light mt-0.5">Every HD and Astrology term explained</div></div>
                        </a>
                    </div>
                </div>
            </div>
            <a href="/plans-features/" class="text-gm-gray hover:text-gray-900 text-xl font-medium transition whitespace-nowrap">Our Plans</a>
            <!-- Language Switcher -->
                <div class="relative group px-3">
                                        <button class="flex items-center gap-2 text-gm-gray hover:text-gray-900 text-base">
                        <span class="flag-icon flag-icon-gb"></span>
                        <span>English</span>
                        <svg class="w-3 h-3 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                     
                    <div class="absolute top-full left-0 mt-4 w-44 bg-white rounded-xl shadow-xl border border-gray-100 py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                       
                        <a data-lang="pt" href="/learn-hub/" class="flex items-center gap-3 px-4 py-2 text-sm text-gm-gray hover:bg-gm-light hover:text-gm-purple transition"><span class="flag-icon flag-icon-pt"></span> Português</a>
                            
                        <a data-lang="nl" href="/learn-hub/" class="flex items-center gap-3 px-4 py-2 text-sm text-gm-gray hover:bg-gm-light hover:text-gm-purple transition"><span class="flag-icon flag-icon-nl"></span> Nederlands</a>
                            
                        <a data-lang="it" href="/learn-hub/" class="flex items-center gap-3 px-4 py-2 text-sm text-gm-gray hover:bg-gm-light hover:text-gm-purple transition"><span class="flag-icon flag-icon-it"></span> Italiano</a>
                            
                        <a data-lang="fr" href="/learn-hub/" class="flex items-center gap-3 px-4 py-2 text-sm text-gm-gray hover:bg-gm-light hover:text-gm-purple transition"><span class="flag-icon flag-icon-fr"></span> Français</a>
                            
                        <a data-lang="es" href="/learn-hub/" class="flex items-center gap-3 px-4 py-2 text-sm text-gm-gray hover:bg-gm-light hover:text-gm-purple transition"><span class="flag-icon flag-icon-es"></span> Español</a>
                            
                        <a data-lang="de" href="/learn-hub/" class="flex items-center gap-3 px-4 py-2 text-sm text-gm-gray hover:bg-gm-light hover:text-gm-purple transition"><span class="flag-icon flag-icon-de"></span> Deutsch</a>
                            
                        <a data-lang="en" href="/learn-hub/" class="flex items-center gap-3 px-4 py-2 text-sm text-gm-gray hover:bg-gm-light hover:text-gm-purple transition"><span class="flag-icon flag-icon-gb"></span> English</a>
                                             </div>
                </div>
                                                    <a href="/login/" class="text-gm-gray hover:text-gray-900 text-xl font-medium transition whitespace-nowrap gm-logged-out-only">Sign In</a>
                <a href="/register/" class="bg-gm-green hover:bg-gm-green-dark text-white text-base font-semibold px-5 py-2 rounded-full transition cursor-pointer gm-logged-out-only">Sign Up</a>
                <a href="/cart/"
                   class="gm-logged-in-only flex items-center pl-1 pr-3 -ml-2 text-gm-gray hover:text-gm-purple transition"
                   style="display:none" aria-label="Cart" title="Cart">
                    <span class="relative inline-block" style="line-height: 0;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="22" viewBox="0 0 36.334 28.226" aria-hidden="true">
                            <g transform="translate(-1096.613 -119.196)">
                                <g transform="translate(1109.379 141.823)">
                                    <path d="M1.55-1A2.55,2.55,0,1,1-1,1.55,2.553,2.553,0,0,1,1.55-1Z" transform="translate(1 1)" fill="currentColor"/>
                                    <path d="M1.55-1.5A3.05,3.05,0,1,1-1.5,1.55,3.053,3.053,0,0,1,1.55-1.5Zm0,5.1A2.05,2.05,0,1,0-.5,1.55,2.052,2.052,0,0,0,1.55,3.6Z" transform="translate(1 1)" fill="currentColor"/>
                                    <path d="M1.55-1A2.55,2.55,0,1,1-1,1.55,2.553,2.553,0,0,1,1.55-1Z" transform="translate(15.025 1)" fill="currentColor"/>
                                    <path d="M1.55-1.5A3.05,3.05,0,1,1-1.5,1.55,3.053,3.053,0,0,1,1.55-1.5Zm0,5.1A2.05,2.05,0,1,0-.5,1.55,2.052,2.052,0,0,0,1.55,3.6Z" transform="translate(15.025 1)" fill="currentColor"/>
                                </g>
                                <g transform="translate(1096.773 119.356)">
                                    <path d="M31.491,22.4H14.555a1.5,1.5,0,0,1-1.4-.959L6.406,4H2.5a1.5,1.5,0,0,1,0-3H7.434a1.5,1.5,0,0,1,1.4.959L15.583,19.4h14.9l3.962-9.737a1.5,1.5,0,1,1,2.779,1.131L32.88,21.467A1.5,1.5,0,0,1,31.491,22.4Z" transform="translate(-1.16 -1.16)" fill="currentColor"/>
                                </g>
                            </g>
                        </svg>
                        <span id="gm-cart-count" class="absolute text-gm-pink text-xs font-bold leading-none" style="left:60%; top:40%; transform:translate(-50%,-50%); display:none;"></span>
                    </span>
                </a>
                <a href="/learn-hub/api/logout.php?to=en" class="gm-logged-in-only text-gm-gray hover:text-gray-900 text-xl font-medium transition whitespace-nowrap" style="display:none">Log Out</a>
                <a href="/user-home/" class="gm-logged-in-only bg-gm-green hover:bg-gm-green-dark text-white text-base font-semibold px-5 py-2 rounded-full transition" style="display:none">My Hub</a>

                    </div>
    </div>
    <!-- Mobile menu -->
    <div id="gm-mobile-menu" style="display:none" class="lg:hidden bg-white border-t border-gray-100 px-6 py-4">
        <div class="flex flex-col gap-3">
            <!-- Auth block FIRST so returning users don't hunt for Sign In (2026-05-29) -->
                            <a href="/register/" class="inline-block bg-gm-green text-white text-sm font-semibold px-5 py-2 rounded-full transition text-center cursor-pointer gm-logged-out-only">Sign Up</a>
                <a href="/login/" class="py-2 text-sm text-gm-gray hover:text-gray-900 transition gm-logged-out-only">Sign In</a>
                <a href="/user-home/" class="gm-logged-in-only inline-block bg-gm-green text-white text-sm font-semibold px-5 py-2 rounded-full transition text-center" style="display:none">My Hub</a>
                <a href="/learn-hub/api/logout.php?to=en" class="gm-logged-in-only py-2 text-sm text-gm-gray hover:text-gray-900 transition" style="display:none">Log Out</a>

                        <div class="border-t border-gray-100 my-1"></div>
            <a href="/geneticmatrix-reports/" class="py-2 text-sm text-gm-gray hover:text-gray-900 transition">Reports</a>
            <a href="/talking-charts/" class="py-2 text-sm text-gm-gray hover:text-gray-900 transition">Talking Charts</a>
                        <a href="/free-foundation-chart/" class="py-2 text-sm text-gm-gray hover:text-gray-900 transition gm-logged-out-only">Free Chart</a>
                                    <div class="border-t border-gray-100 my-1"></div>
            <a href="/learn-hub/" class="py-2 text-sm font-semibold text-gray-800 hover:text-gm-purple transition flex items-center gap-1.5">Learn Hub<span class="text-[10px] font-semibold text-gm-green bg-gm-green/10 px-1.5 py-0.5 rounded-full">Free</span></a>
            <a href="/celebrities/" class="py-2 text-sm font-semibold text-gray-800 hover:text-gm-purple transition flex items-center gap-1.5">Celebrity Search<span class="text-[10px] font-semibold text-gm-green bg-gm-green/10 px-1.5 py-0.5 rounded-full">Free</span></a>
            <a href="/learn-hub/dictionary/dictionary.html" class="py-2 text-sm font-semibold text-gray-800 hover:text-gm-purple transition flex items-center gap-1.5">Dictionary<span class="text-[10px] font-semibold text-gm-green bg-gm-green/10 px-1.5 py-0.5 rounded-full">Free</span></a>
            <div class="border-t border-gray-100 my-1"></div>
            <a href="/plans-features/" class="py-2 text-sm text-gm-gray hover:text-gray-900 transition">Our Plans</a>
            <!-- Language Switcher -->
                <div class="relative group px-3">
                                        <button class="flex items-center gap-2 text-gm-gray hover:text-gray-900 text-base">
                        <span class="flag-icon flag-icon-gb"></span>
                        <span>English</span>
                        <svg class="w-3 h-3 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                     
                    <div class="absolute top-full left-0 mt-4 w-44 bg-white rounded-xl shadow-xl border border-gray-100 py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                                            <a data-lang="pt" href="/learn-hub/" class="flex items-center gap-3 px-4 py-2 text-sm text-gm-gray hover:bg-gm-light hover:text-gm-purple transition"><span class="flag-icon flag-icon-pt"></span> Português</a>
                                                 <a data-lang="nl" href="/learn-hub/" class="flex items-center gap-3 px-4 py-2 text-sm text-gm-gray hover:bg-gm-light hover:text-gm-purple transition"><span class="flag-icon flag-icon-nl"></span> Nederlands</a>
                                                 <a data-lang="it" href="/learn-hub/" class="flex items-center gap-3 px-4 py-2 text-sm text-gm-gray hover:bg-gm-light hover:text-gm-purple transition"><span class="flag-icon flag-icon-it"></span> Italiano</a>
                                                 <a data-lang="fr" href="/learn-hub/" class="flex items-center gap-3 px-4 py-2 text-sm text-gm-gray hover:bg-gm-light hover:text-gm-purple transition"><span class="flag-icon flag-icon-fr"></span> Français</a>
                                                 <a data-lang="es" href="/learn-hub/" class="flex items-center gap-3 px-4 py-2 text-sm text-gm-gray hover:bg-gm-light hover:text-gm-purple transition"><span class="flag-icon flag-icon-es"></span> Español</a>
                                                 <a data-lang="de" href="/learn-hub/" class="flex items-center gap-3 px-4 py-2 text-sm text-gm-gray hover:bg-gm-light hover:text-gm-purple transition"><span class="flag-icon flag-icon-de"></span> Deutsch</a>
                                                 <a data-lang="en" href="/learn-hub/" class="flex items-center gap-3 px-4 py-2 text-sm text-gm-gray hover:bg-gm-light hover:text-gm-purple transition"><span class="flag-icon flag-icon-gb"></span> English</a>
                                             </div>
                </div>
        </div>
    </div>
</nav>
<script id="gm-calendar-auth">(function(){
  // Toggle nav between logged-in and logged-out views via /learn-hub/api/user-state.php.
  // .gm-logged-out-only: visible by default, hidden when logged in.
  // .gm-logged-in-only:  hidden  by default (inline display:none), shown when logged in.
  fetch('/learn-hub/api/user-state.php', { credentials: 'same-origin' })
    .then(function(r){ return r.json(); })
    .then(function(data){
      if (data && data.logged_in) {
        document.querySelectorAll('.gm-logged-out-only').forEach(function(el){ el.style.display = 'none'; });
        document.querySelectorAll('.gm-logged-in-only').forEach(function(el){ el.style.display = ''; });
      }
    })
    .catch(function(){});
})();</script>
<script id="gm-lang-switcher">(function(){
  var LANGS = {en:"English",de:"Deutsch",es:"Español",fr:"Français",it:"Italiano",nl:"Nederlands",pt:"Português"};
  var FLAGS = {en:"gb",de:"de",es:"es",fr:"fr",it:"it",nl:"nl",pt:"pt"};
  var URL_TO_WP = {pt: "pt-pt"};

  var path = window.location.pathname;
  var m = path.match(/^\/learn-hub\/(de|es|fr|it|nl|pt)(\/|$)/);
  var current = m ? m[1] : "en";
  var rest = m ? path.substring(("/learn-hub/" + current).length) : path.replace(/^\/learn-hub/, "");
  if (!rest) rest = "/";

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

  var cookieLang = getCookie("gm_lang");
  if (cookieLang !== current) setCookie("gm_lang", current);

  document.querySelectorAll('.flag-icon').forEach(function(flag){
    if (flag.parentElement && flag.parentElement.tagName === 'BUTTON') {
      flag.className = "flag-icon flag-icon-" + (FLAGS[current] || "gb");
      var sib = flag.nextElementSibling;
      while (sib && sib.tagName !== 'SPAN') sib = sib.nextElementSibling;
      if (sib) sib.textContent = LANGS[current];
    }
  });

  var logo = document.getElementById("gm-logo-link");
  if (logo) {
    var wpLang = URL_TO_WP[current] || current;
    logo.href = current === "en" ? "/" : ("/" + wpLang + "/");
  }

  document.querySelectorAll('a[data-lang]').forEach(function(a){
    var lang = a.getAttribute('data-lang');
    a.href = lang === "en" ? ("/learn-hub" + rest) : ("/learn-hub/" + lang + rest);
    if (lang === current) a.classList.add('text-gm-purple','font-semibold');
    a.addEventListener('click', function(){ setCookie("gm_lang", lang); });
  });

  var btn = document.getElementById('gm-hamburger');
  var menu = document.getElementById('gm-mobile-menu');
  if (btn && menu) btn.addEventListener('click', function(){ menu.style.display = menu.style.display === 'none' ? 'block' : 'none'; });
})();</script>
<!-- ==================== BREADCRUMB ==================== -->
    <div class="bg-gm-light border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-6 py-3">
            <a href="/learn-hub/" class="text-gm-purple hover:text-gm-dark text-sm font-medium transition">&larr; Back to Learn Hub</a>
        </div>
    </div>

    <!-- ==================== HERO ==================== -->
    <section class="bg-gm-dark text-white text-center py-12 md:py-16">
        <div class="max-w-3xl mx-auto px-6">
            <p class="text-xs font-semibold tracking-widest text-gray-400 uppercase mb-4">Deeper Mechanics &middot; Variable</p>
            <h1 class="text-3xl md:text-4xl font-bold mb-4">Human Design Variable: The Four Arrows Explained</h1>
            <p class="text-gray-300 text-sm md:text-base leading-relaxed max-w-2xl mx-auto italic">
                The four arrows at the top of your Bodygraph reveal your cognitive architecture, showing how you're designed to take in nourishment, find the right environment, process awareness, and perceive the world.
            </p>
        </div>
    </section>

    <!-- ==================== INTRO ==================== -->
    <section class="py-10 md:py-14 bg-gm-light" id="what-is-variable">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">
                <span class="text-gm-purple">|</span> What Is Variable in Human Design?
            </h2>
            <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">
                This is one of the most advanced areas of Human Design. It does not replace Type, Strategy, Authority, or Profile, and it should not be treated as a shortcut around foundational mechanics. What Variable does offer is a more precise understanding of how your body and mind are configured to take in, process, and orient awareness.
            </p>
            <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">
                Variable refers to the four arrows shown at the top of the Bodygraph. Each arrow points either left or right, creating a four-part pattern that reflects the way your design is differentiated at a subtle level.
            </p>
            <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">
                Variable is often spoken about loosely, but it is not a personality label. It is a substructure framework that describes orientation. Properly understood, it shows how the body is designed to operate and how the mind is designed to view and frame experience.
            </p>

            <!-- Birth data warning -->
            <div class="bg-gm-warning border border-yellow-200 rounded-lg p-5 mb-8">
                <p class="text-xs font-semibold text-gm-orange uppercase tracking-widest mb-2">Important</p>
                <p class="text-sm text-gray-700">Variable depends on an accurate birth time. Even small differences can change the arrow orientation.</p>
            </div>

            <!-- The Four Arrows -->
            <h3 class="text-lg md:text-xl font-bold text-gray-800 mb-2">The Four Arrows and What They Represent</h3>
            <p class="text-gm-text text-sm md:text-base leading-relaxed mb-6">
                Variable is based on Tone and appears in the Bodygraph as the four arrows at the top of the chart, showing the left or right orientation of key aspects of your design.
            </p>

            <!-- Four-arrow overview cards -->
            <div class="grid md:grid-cols-2 gap-4 mb-8">
                <!-- Arrow 1: Determination -->
                <div class="arrow-card bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Top Left Arrow</p>
                    <p class="text-lg font-bold text-gray-800 mb-2">Determination</p>
                    <div class="flex items-center gap-2 text-sm text-gray-600 mb-1"><span class="font-bold text-arrow-left w-6 text-center">&larr;</span> Active</div>
                    <div class="flex items-center gap-2 text-sm text-gray-600 mb-3"><span class="font-bold text-arrow-left w-6 text-center">&rarr;</span> Passive</div>
                    <p class="text-sm text-gray-500 leading-relaxed">Describes how the body and brain are designed to take in and process information. Belongs to the body side of Variable.</p>
                </div>

                <!-- Arrow 2: Environment -->
                <div class="arrow-card bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Bottom Left Arrow</p>
                    <p class="text-lg font-bold text-gray-800 mb-2">Environment</p>
                    <div class="flex items-center gap-2 text-sm text-gray-600 mb-1"><span class="font-bold text-arrow-left w-6 text-center">&larr;</span> Observed</div>
                    <div class="flex items-center gap-2 text-sm text-gray-600 mb-3"><span class="font-bold text-arrow-left w-6 text-center">&rarr;</span> Observer</div>
                    <p class="text-sm text-gray-500 leading-relaxed">Describes how the body integrates within the correct environment. Belongs to the body side of Variable.</p>
                </div>

                <!-- Arrow 3: Motivation -->
                <div class="arrow-card bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Top Right Arrow</p>
                    <p class="text-lg font-bold text-gray-800 mb-2">Motivation</p>
                    <div class="flex items-center gap-2 text-sm text-gray-600 mb-1"><span class="font-bold text-gray-800 w-6 text-center">&larr;</span> Strategic</div>
                    <div class="flex items-center gap-2 text-sm text-gray-600 mb-3"><span class="font-bold text-gray-800 w-6 text-center">&rarr;</span> Receptive</div>
                    <p class="text-sm text-gray-500 leading-relaxed">The deeper mechanic connected to Mind Style and mental awareness. Belongs to the personality side of Variable.</p>
                </div>

                <!-- Arrow 4: Perspective -->
                <div class="arrow-card bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Bottom Right Arrow</p>
                    <p class="text-lg font-bold text-gray-800 mb-2">Perspective</p>
                    <div class="flex items-center gap-2 text-sm text-gray-600 mb-1"><span class="font-bold text-gray-800 w-6 text-center">&larr;</span> Focused</div>
                    <div class="flex items-center gap-2 text-sm text-gray-600 mb-3"><span class="font-bold text-gray-800 w-6 text-center">&rarr;</span> Peripheral</div>
                    <p class="text-sm text-gray-500 leading-relaxed">Describes how the mind is designed to view the environment correctly. Belongs to the personality side of Variable.</p>
                </div>
            </div>

            <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">
                These Variable mechanics have dedicated pages of their own. Here, they matter because they form the structure of Variable in Human Design. Explore each one in more detail below:
            </p>
            <ul class="list-disc list-inside text-gm-text text-sm md:text-base leading-relaxed space-y-2">
                <li>Brain Style in Human Design — <a href="/learn-hub/deeper-mechanics/determination.html" class="text-gm-purple hover:underline">Determination</a></li>
                <li>Environment Style in Human Design — <a href="/learn-hub/deeper-mechanics/environment.html" class="text-gm-purple hover:underline">Environment</a></li>
                <li>Perspective in Human Design — <a href="/learn-hub/deeper-mechanics/perspective.html" class="text-gm-purple hover:underline">View</a></li>
                <li>Mind Style in Human Design — <a href="/learn-hub/deeper-mechanics/motivation.html" class="text-gm-purple hover:underline">Motivation</a></li>
            </ul>
        </div>
    </section>

    <!-- ==================== BODY SIDE AND MIND SIDE ==================== -->
    <section class="py-10 md:py-14 bg-white" id="body-mind">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">
                <span class="text-gm-purple">|</span> <span class="text-arrow-left">Body Side</span> and Mind Side
            </h2>
            <p class="text-gm-text text-sm md:text-base leading-relaxed mb-6">
                Variable is easier to understand when you separate the arrows into two sides.
            </p>

            <div class="grid md:grid-cols-2 gap-6 mb-6">
                <div>
                    <h3 class="text-lg font-bold text-arrow-left mb-3">Body Side</h3>
                    <p class="text-gm-text text-sm leading-relaxed mb-3">The left-side arrows correspond to the design side of the chart:</p>
                    <ul class="space-y-2 text-sm text-gm-text">
                        <li class="flex items-start gap-2"><span class="text-gm-purple font-bold mt-0.5">&bull;</span> Brain Style</li>
                        <li class="flex items-start gap-2"><span class="text-gm-purple font-bold mt-0.5">&bull;</span> Environment Style</li>
                    </ul>
                    <p class="text-gm-text text-sm leading-relaxed mt-3">These arrows speak more directly to how the body takes in and processes information, and how it integrates within the correct environment.</p>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-800 mb-3">Mind Side</h3>
                    <p class="text-gm-text text-sm leading-relaxed mb-3">The right-side arrows correspond to the personality side of the chart:</p>
                    <ul class="space-y-2 text-sm text-gm-text">
                        <li class="flex items-start gap-2"><span class="text-gm-purple font-bold mt-0.5">&bull;</span> Mind Style</li>
                        <li class="flex items-start gap-2"><span class="text-gm-purple font-bold mt-0.5">&bull;</span> Perspective</li>
                    </ul>
                    <p class="text-gm-text text-sm leading-relaxed mt-3">These arrows speak more directly to how the mind thinks and how it views the environment correctly.</p>
                </div>
            </div>

            <p class="text-gm-text text-sm md:text-base leading-relaxed">
                This is why Variable should be read as a system rather than as four disconnected labels. The arrows only operate correctly as a chain: correct cognition in the brain leads to the correct environment; the correct environment locks in the correct view; and the correct view provides the correct information for the mind to become a unique outer authority. Until the body is aligned correctly, neither correct view nor correct mental functioning is possible.
            </p>
        </div>
    </section>

    <!-- ==================== LEFT AND RIGHT ==================== -->
    <section class="py-10 md:py-14 bg-gm-light" id="left-right">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">
                <span class="text-gm-purple">|</span> Left and Right Variable Orientation
            </h2>
            <p class="text-gm-text text-sm md:text-base leading-relaxed mb-8">
                The central distinction in Variable is whether an arrow points left or right. These are not value judgments. Left is not superior to right, and right is not more evolved than left. They describe different modes of orientation.
            </p>

            <!-- Left vs Right comparison cards -->
            <div class="grid md:grid-cols-2 gap-4 mb-8">
                <!-- Left box -->
                <div class="bg-red-50 border border-red-200 rounded-xl p-5">
                    <p class="text-xs font-semibold text-arrow-left uppercase tracking-wider mb-2">&larr; Left-Facing Variable</p>
                    <div class="space-y-1.5 text-sm text-gray-600">
                        <p><strong>Strategic</strong> focus</p>
                        <p><strong>Consistency</strong> in a defined field</p>
                        <p>Defined <strong>directionality</strong></p>
                        <p><strong>Structure</strong></p>
                        <p><strong>Specificity</strong></p>
                        <p><strong>Active</strong> engagement</p>
                        <p><strong>Concentrated</strong> attention</p>
                    </div>
                </div>
                <!-- Right box -->
                <div class="bg-indigo-50 border border-indigo-200 rounded-xl p-5">
                    <p class="text-xs font-semibold text-arrow-right uppercase tracking-wider mb-2">&rarr; Right-Facing Variable</p>
                    <div class="space-y-1.5 text-sm text-gray-600">
                        <p><strong>Receptivity</strong></p>
                        <p><strong>Openness</strong></p>
                        <p><strong>Flexibility</strong></p>
                        <p><strong>Peripheral</strong> awareness</p>
                        <p><strong>Panoramic</strong> attention</p>
                        <p><strong>Non-strategic</strong> processing</p>
                        <p><strong>Non-active</strong> engagement</p>
                    </div>
                </div>
            </div>

            <p class="text-gm-text text-sm md:text-base leading-relaxed">
                The mistake most people make is confusing Variable with the old notion of left-brain and right-brain hemispheres. That misses the point. Left and right in Variable describe modes of operation within the system, not a simplistic split between analytical and logical versus creative and intuitive styles of thinking.
            </p>
        </div>
    </section>

    <!-- ==================== THE 16 VARIABLE CONFIGURATIONS ==================== -->
    <section class="py-10 md:py-14 bg-white" id="16-configurations">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">
                <span class="text-gm-purple">|</span> The 16 Variable Configurations
            </h2>
            <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">
                Because each of the four arrows can point in one of two directions, there are 16 possible Variable configurations. What matters is not memorizing the code for its own sake, but understanding that each arrangement creates a distinct relationship between how the body and brain take in and process information, how the body integrates within the correct environment, how the mind views the environment, and how the mind thinks.
            </p>

            <h3 class="text-lg font-bold text-gray-800 mt-8 mb-4">What a Configuration Can Reveal</h3>
            <ul class="space-y-2 text-sm text-gm-text mb-8">
                <li class="flex items-start gap-2"><span class="text-gm-purple font-bold mt-0.5">&bull;</span> Whether your system is strategic or receptive</li>
                <li class="flex items-start gap-2"><span class="text-gm-purple font-bold mt-0.5">&bull;</span> Whether your mind is oriented toward focused attention or broader receptivity</li>
                <li class="flex items-start gap-2"><span class="text-gm-purple font-bold mt-0.5">&bull;</span> Whether your brain and body operate actively or passively</li>
                <li class="flex items-start gap-2"><span class="text-gm-purple font-bold mt-0.5">&bull;</span> How body and mental orientation interact</li>
                <li class="flex items-start gap-2"><span class="text-gm-purple font-bold mt-0.5">&bull;</span> How differentiated your overall operating style is</li>
            </ul>

            <div class="bg-gm-card-active rounded-2xl p-6 md:p-8 mb-4 flex justify-center">
                <img src="../assets/16-variable-configurations.webp" alt="The 16 Variable configurations showing all combinations of left and right arrows across Brain Style, Environment Style, Mind Style, and Perspective" class="max-w-full h-auto rounded-lg" loading="lazy">
            </div>
            <p class="text-gm-text text-xs text-center italic mb-6">
                The chart above shows the 16 possible Variable arrangements created by the four arrows. These are read as integrated patterns of body and mind orientation, not as isolated codes.
            </p>

            <h3 class="text-lg font-bold text-gray-800 mt-8 mb-4">How to Read a Variable Code</h3>

            <div class="overflow-x-auto rounded-xl border border-gm-border mb-6">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gm-card-active text-left">
                            <th class="px-5 py-3 font-semibold text-gray-800">Code</th>
                            <th class="px-5 py-3 font-semibold text-gray-800">Position</th>
                            <th class="px-5 py-3 font-semibold text-gray-800">Left (&larr;)</th>
                            <th class="px-5 py-3 font-semibold text-gray-800">Right (&rarr;)</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gm-border">
                        <tr class="bg-white">
                            <td class="px-5 py-3 font-semibold text-arrow-left">D _ _</td>
                            <td class="px-5 py-3 font-semibold text-arrow-left">Design (body side)</td>
                            <td class="px-5 py-3 text-gray-400" colspan="2">-</td>
                        </tr>
                        <tr class="bg-gm-card">
                            <td class="px-5 py-3 text-gray-700">D <strong>L</strong>_ or D <strong>R</strong>_</td>
                            <td class="px-5 py-3 text-gray-600">1st letter: Brain Style (top-left arrow)</td>
                            <td class="px-5 py-3 text-arrow-left font-semibold">L = Active</td>
                            <td class="px-5 py-3 text-arrow-right font-semibold">R = Passive</td>
                        </tr>
                        <tr class="bg-white">
                            <td class="px-5 py-3 text-gray-700">D _<strong>L</strong> or D _<strong>R</strong></td>
                            <td class="px-5 py-3 text-gray-600">2nd letter: Environment Style (bottom-left arrow)</td>
                            <td class="px-5 py-3 text-arrow-left font-semibold">L = Observed</td>
                            <td class="px-5 py-3 text-arrow-right font-semibold">R = Observer</td>
                        </tr>
                        <tr class="bg-gm-card">
                            <td class="px-5 py-3 font-semibold text-gray-800">P _ _</td>
                            <td class="px-5 py-3 text-gray-600">Personality (mind side)</td>
                            <td class="px-5 py-3 text-gray-400" colspan="2">-</td>
                        </tr>
                        <tr class="bg-white">
                            <td class="px-5 py-3 text-gray-700">P <strong>L</strong>_ or P <strong>R</strong>_</td>
                            <td class="px-5 py-3 text-gray-600">1st letter: Mind Style (top-right arrow)</td>
                            <td class="px-5 py-3 text-arrow-left font-semibold">L = Strategic</td>
                            <td class="px-5 py-3 text-arrow-right font-semibold">R = Receptive</td>
                        </tr>
                        <tr class="bg-gm-card">
                            <td class="px-5 py-3 text-gray-700">P _<strong>L</strong> or P _<strong>R</strong></td>
                            <td class="px-5 py-3 text-gray-600">2nd letter: Perspective (bottom-right arrow)</td>
                            <td class="px-5 py-3 text-arrow-left font-semibold">L = Focused</td>
                            <td class="px-5 py-3 text-arrow-right font-semibold">R = Peripheral</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <p class="text-gm-text text-xs italic mb-4">
                <strong>Note:</strong> On the Personality side, the correct order for Variable correctness is Perspective first and Mind Style second. The standard display convention has been retained here, even though it was originally specified incorrectly by Ra Uru Hu and later acknowledged as such.
            </p>

            <p class="text-gm-text text-sm md:text-base leading-relaxed">
                Each configuration combines these four mechanics into a single Variable pattern. The rows describe the Design side through Brain Style and Environment Style. The columns describe the Personality side through Mind Style and Perspective. Read them together as an integrated pattern of body and mind orientation, not as four isolated labels.
            </p>
        </div>
    </section>

    <!-- ==================== WHAT VARIABLE TELLS YOU ==================== -->
    <section class="py-10 md:py-14 bg-gm-light" id="what-variable-tells-you">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">
                <span class="text-gm-purple">|</span> What Variable Actually Tells You
            </h2>
            <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">
                Variable is valuable because it refines orientation. It does not tell you whether you are more conscious, more spiritual, more advanced, or more aligned than anyone else. What it can indicate with more precision is:
            </p>
            <ul class="space-y-2 text-sm text-gm-text mb-8">
                <li class="flex items-start gap-2"><span class="text-gm-purple font-bold mt-0.5">&bull;</span> How your awareness naturally scans, filters, and frames life experience</li>
                <li class="flex items-start gap-2"><span class="text-gm-purple font-bold mt-0.5">&bull;</span> How the body side and mind side of the chart are differentiated</li>
                <li class="flex items-start gap-2"><span class="text-gm-purple font-bold mt-0.5">&bull;</span> How left and right orientation shape the way the Variable operates</li>
                <li class="flex items-start gap-2"><span class="text-gm-purple font-bold mt-0.5">&bull;</span> How the four arrows work together as an integrated pattern</li>
                <li class="flex items-start gap-2"><span class="text-gm-purple font-bold mt-0.5">&bull;</span> How body orientation and mental orientation interact</li>
            </ul>
            <p class="text-gm-text text-sm md:text-base leading-relaxed">
                This is why Variable matters to serious Human Design students. It is not a branding device. It is a description of how your system is configured beneath the more familiar chart layers, revealing the pattern of your absolute uniqueness at its highest level.
            </p>
        </div>
    </section>

    <!-- ==================== WHERE VARIABLE APPEARS ==================== -->
    <section class="py-10 md:py-14 bg-white" id="where-variable-appears">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">
                <span class="text-gm-purple">|</span> Where Variable Appears in the Bodygraph
            </h2>
            <p class="text-gm-text text-sm md:text-base leading-relaxed mb-6">
                Variable appears as the four arrows at the top of the Human Design chart, positioned around the head area and the nodes area. Each arrow points either left or right. Together, they form the full Variable configuration.
            </p>

            <!-- Bodygraph arrow-location visual -->
            <div class="bg-gm-card-active rounded-2xl p-6 md:p-8 mb-8 flex justify-center">
                <img src="../assets/variable-arrows-bodygraph.webp" alt="Human Design Bodygraph showing the four Variable arrows positioned around the head and nodes area" class="max-w-full h-auto rounded-lg" loading="lazy">
            </div>

            <!-- Arrow position table -->
            <div class="overflow-x-auto rounded-xl border border-gm-border mb-8">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gm-card-active text-left">
                            <th class="px-5 py-3 font-semibold text-gray-800">Arrow Position</th>
                            <th class="px-5 py-3 font-semibold text-gray-800">Variable Area</th>
                            <th class="px-5 py-3 font-semibold text-gray-800">Broad Domain</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gm-border">
                        <tr class="bg-white">
                            <td class="px-5 py-3 font-semibold text-gm-purple">Top Left</td>
                            <td class="px-5 py-3 text-gray-600">Brain Style</td>
                            <td class="px-5 py-3 text-gray-600">Body / intake and processing</td>
                        </tr>
                        <tr class="bg-gm-card">
                            <td class="px-5 py-3 font-semibold text-gm-purple">Bottom Left</td>
                            <td class="px-5 py-3 text-gray-600">Environment Style</td>
                            <td class="px-5 py-3 text-gray-600">Body / environmental integration</td>
                        </tr>
                        <tr class="bg-white">
                            <td class="px-5 py-3 font-semibold text-gm-purple">Top Right</td>
                            <td class="px-5 py-3 text-gray-600">Mind Style</td>
                            <td class="px-5 py-3 text-gray-600">Mind / thinking style</td>
                        </tr>
                        <tr class="bg-gm-card">
                            <td class="px-5 py-3 font-semibold text-gm-purple">Bottom Right</td>
                            <td class="px-5 py-3 text-gray-600">Perspective</td>
                            <td class="px-5 py-3 text-gray-600">Mind / view</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <p class="text-gm-text text-sm md:text-base leading-relaxed">
                The left-side arrows belong to the Design side of Variable. The right-side arrows belong to the Personality side. Read together, they show how body and mind are oriented through Variable.
            </p>
        </div>
    </section>

    <!-- ==================== DEEPER MECHANICS + COMMON ERRORS ==================== -->
    <section class="py-10 md:py-14 bg-gm-light" id="deeper-mechanics">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">
                <span class="text-gm-purple">|</span> Variable and the Deeper Mechanics
            </h2>
            <p class="text-gm-text text-sm md:text-base leading-relaxed mb-4">
                Variable is closely related to the deeper mechanics of Human Design, but it should not be confused with them. The arrows point to major advanced domains such as Tonal Cognition, Determination, Environment, Perspective, and Motivation. Those topics can and should be studied in their own right. This page is about the Variable system itself rather than trying to teach all of those mechanics in full. See the <a href="/learn-hub/deeper-mechanics/index.html" class="text-gm-purple hover:underline">Deeper Mechanics</a> section for deeper insight into these areas.
            </p>
            <p class="text-gm-text text-sm md:text-base leading-relaxed mb-8">
                That distinction matters. If a Variable page tries to become a complete guide to PHS, Environment, Motivation, and Perspective all at once, it loses topical clarity and becomes weaker for both search and serious users.
            </p>

            <h3 class="text-lg font-bold text-gray-800 mb-4">Common Errors in Variable Interpretation</h3>
            <div class="grid grid-cols-1 gap-3">
                <div class="bg-white rounded-xl border border-gm-border p-5">
                    <div class="text-sm font-bold text-gray-800 mb-1">Treating Left as Better Than Right</div>
                    <p class="text-xs text-gray-500 leading-relaxed">Variable is not hierarchical. Left and right are different orientations, not rankings.</p>
                </div>
                <div class="bg-white rounded-xl border border-gm-border p-5">
                    <div class="text-sm font-bold text-gray-800 mb-1">Using Variable to Bypass Strategy and Authority</div>
                    <p class="text-xs text-gray-500 leading-relaxed">Variable is advanced substructure. It does not override the foundations of the chart. In fact, it does not function correctly without Strategy and Authority.</p>
                </div>
                <div class="bg-white rounded-xl border border-gm-border p-5">
                    <div class="text-sm font-bold text-gray-800 mb-1">Reading One Arrow in Isolation</div>
                    <p class="text-xs text-gray-500 leading-relaxed">Each arrow can be described individually, but the real meaning emerges through the full four-arrow pattern. You are a holistic whole; each arrow on its own is useful for study, not for living.</p>
                </div>
                <div class="bg-white rounded-xl border border-gm-border p-5">
                    <div class="text-sm font-bold text-gray-800 mb-1">Turning Variable Into Personality Branding</div>
                    <p class="text-xs text-gray-500 leading-relaxed">Variable describes orientation and ultimate differentiation. It is not a branding device, a slogan, or a comparison tool.</p>
                </div>
                <div class="bg-white rounded-xl border border-gm-border p-5">
                    <div class="text-sm font-bold text-gray-800 mb-1">Forcing Yourself Into a Preferred Style</div>
                    <p class="text-xs text-gray-500 leading-relaxed">This is pure not-self behavior. Your Variable is correct as it is, and you cannot be fulfilled by forcing yourself into any other modality.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== FAQ ACCORDION ==================== -->
    <section class="py-10 md:py-14 bg-white">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-8">
                <span class="text-gm-purple">|</span> Frequently Asked Questions
            </h2>
            <div class="space-y-3">

                <details class="bg-gm-light rounded-lg border border-gm-border">
                    <summary class="py-4 px-6 text-sm font-semibold text-gray-800">
                        What is Variable in Human Design?
                    </summary>
                    <div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">
                        Variable is the four-arrow system at the top of the Bodygraph. It shows how deeper mechanics such as Brain, Environment, Perspective, and Mind are oriented.
                    </div>
                </details>

                <details class="bg-gm-light rounded-lg border border-gm-border">
                    <summary class="py-4 px-6 text-sm font-semibold text-gray-800">
                        What do the arrows mean in Human Design?
                    </summary>
                    <div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">
                        The arrows show whether each area is configured with a left-oriented or right-oriented mode of functioning. Broadly speaking, this reflects strategic versus receptive orientation.
                    </div>
                </details>

                <details class="bg-gm-light rounded-lg border border-gm-border">
                    <summary class="py-4 px-6 text-sm font-semibold text-gray-800">
                        How many Variable configurations are there?
                    </summary>
                    <div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">
                        There are 16 total configurations, because each of the four arrows can point in one of two directions.
                    </div>
                </details>

                <details class="bg-gm-light rounded-lg border border-gm-border">
                    <summary class="py-4 px-6 text-sm font-semibold text-gray-800">
                        Does Variable matter more than Type or Authority?
                    </summary>
                    <div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">
                        No. Variable is advanced and should be approached after foundational mechanics are understood and lived.
                    </div>
                </details>

                <details class="bg-gm-light rounded-lg border border-gm-border">
                    <summary class="py-4 px-6 text-sm font-semibold text-gray-800">
                        Can your Variable change?
                    </summary>
                    <div class="px-6 pb-4 text-sm text-gray-600 leading-relaxed">
                        No. Your natal Variable configuration does not change. What can change is your clarity and lived relationship to it.
                    </div>
                </details>

            </div>
        </div>
    </section>

    <!-- ==================== RELATED TOPICS ==================== -->
    <section class="py-10 md:py-14 bg-gm-light">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-8">
                <span class="text-gm-purple">|</span> Related Topics
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <a href="/learn-hub/deeper-mechanics/index.html" class="bg-white rounded-lg border border-gm-border p-5 hover:shadow-md hover:border-gm-purple transition">
                    <h3 class="text-sm font-bold text-gm-purple mb-1">Deeper Mechanics &rarr;</h3>
                    <p class="text-gray-400 text-xs leading-relaxed">Advanced mechanics beyond the foundational chart.</p>
                </a>
                <a href="/learn-hub/deeper-mechanics/determination.html" class="bg-white rounded-lg border border-gm-border p-5 hover:shadow-md hover:border-gm-purple transition">
                    <h3 class="text-sm font-bold text-gm-purple mb-1">Determination &rarr;</h3>
                    <p class="text-gray-400 text-xs leading-relaxed">How the body and brain are designed to take in and process information.</p>
                </a>
                <a href="/learn-hub/deeper-mechanics/environment.html" class="bg-white rounded-lg border border-gm-border p-5 hover:shadow-md hover:border-gm-purple transition">
                    <h3 class="text-sm font-bold text-gm-purple mb-1">Environment &rarr;</h3>
                    <p class="text-gray-400 text-xs leading-relaxed">How the body integrates within the correct environment.</p>
                </a>
                <a href="/learn-hub/deeper-mechanics/motivation.html" class="bg-white rounded-lg border border-gm-border p-5 hover:shadow-md hover:border-gm-purple transition">
                    <h3 class="text-sm font-bold text-gm-purple mb-1">Motivation &rarr;</h3>
                    <p class="text-gray-400 text-xs leading-relaxed">The deeper mechanic connected to Mind Style and mental awareness.</p>
                </a>
                <a href="/learn-hub/deeper-mechanics/perspective.html" class="bg-white rounded-lg border border-gm-border p-5 hover:shadow-md hover:border-gm-purple transition">
                    <h3 class="text-sm font-bold text-gm-purple mb-1">Perspective &rarr;</h3>
                    <p class="text-gray-400 text-xs leading-relaxed">How the mind is designed to view the environment correctly.</p>
                </a>
            </div>
        </div>
    </section>

    <!-- ==================== CTA BANNER ==================== -->
    <section class="py-14 md:py-20 bg-gm-dark text-white text-center">
        <div class="max-w-2xl mx-auto px-6">
            <h2 class="text-2xl md:text-3xl font-bold mb-4">Explore Your Variable</h2>
            <p class="text-gray-300 text-sm md:text-base leading-relaxed mb-8 max-w-lg mx-auto">
                To see your Variable, you need an accurate Human Design chart with a reliable birth time and access to the Variable arrows. Genetic Matrix free charts do not include Variable arrows, so membership is required to view the full arrow configuration.
            </p>
            <a href="https://www.geneticmatrix.com/register/" class="inline-block bg-gm-orange hover:bg-[#d07d18] text-white font-bold py-4 px-10 rounded-xl transition text-lg">
                Get Pro &rarr;
            </a>
        </div>
    </section>

    <!-- ==================== FOOTER ==================== -->
    <footer class="bg-[#d5d5d5] py-10">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 items-start">

                <!-- Left: Logo & Copyright -->
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

                <!-- Center: Newsletter -->
                <div class="bg-[#c5c5c5] rounded-lg p-6 text-center">
                    <h3 class="text-base font-bold text-gray-800 uppercase tracking-wide mb-2">Subscribe to Our Newsletter</h3>
                    <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                        Sign up to our newsletter to receive updates, offers,
                        new releases, and everything related to Genetic Matrix.
                    </p>
                    <form class="flex items-center bg-white rounded-full overflow-hidden border border-gray-400 max-w-sm mx-auto" data-action="newsletter-signup">
                        <input
                            type="email"
                            placeholder="Your Email Address"
                            class="flex-1 px-4 py-2.5 text-sm text-gray-700 bg-transparent outline-none placeholder:text-gray-400"
                        >
                        <button type="submit" class="px-4 py-2.5 bg-gray-500 text-white hover:bg-gray-600 transition rounded-r-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                    </form>
                </div>

                <!-- Right: Social & Contact -->
                <div class="text-center md:text-right">
                    <h3 class="text-base font-bold text-gray-800 uppercase tracking-wide mb-4">Connect With Us</h3>
                    <div class="flex justify-center md:justify-end gap-3 mb-4">
                        <a href="https://www.facebook.com/GeneticMatrixx" title="Facebook" target="_blank" rel="noopener">
                            <img src="../assets/icon-fb.svg" alt="Facebook" class="w-10 h-10">
                        </a>
                        <a href="https://x.com/GeneticMatrix" title="X" target="_blank" rel="noopener">
                            <img src="../assets/icon-x.svg" alt="X" class="w-10 h-10">
                        </a>
                        <a href="https://www.instagram.com/genetic_matrix/" title="Instagram" target="_blank" rel="noopener">
                            <img src="../assets/icon-insta.svg" alt="Instagram" class="w-10 h-10">
                        </a>
                        <a href="https://www.youtube.com/@geneticmatrixhd" title="YouTube" target="_blank" rel="noopener">
                            <img src="../assets/icon-yt.svg" alt="YouTube" class="w-10 h-10">
                        </a>
                    </div>
                    <a href="#" class="text-sm font-semibold text-gray-800 underline hover:text-gm-dark uppercase tracking-wide">Get in Touch</a>
                </div>

            </div>
        </div>
    </footer>

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
