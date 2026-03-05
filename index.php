<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn Hub | Genetic Matrix</title>
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
        /* Hero starfield — 3 independent layers for visible twinkling */
        .hero-stars-1, .hero-stars-2, .hero-stars-3 {
            position: absolute; inset: 0; pointer-events: none;
        }
        .hero-stars-1 {
            background-image:
                radial-gradient(2.5px 2.5px at 10% 15%, rgba(255,255,255,0.95) 0%, transparent 100%),
                radial-gradient(2px 2px at 40% 20%, rgba(255,255,255,1) 0%, transparent 100%),
                radial-gradient(2.5px 2.5px at 85% 55%, rgba(255,255,255,0.9) 0%, transparent 100%),
                radial-gradient(2px 2px at 50% 10%, rgba(255,255,255,0.85) 0%, transparent 100%),
                radial-gradient(2px 2px at 35% 45%, rgba(255,255,255,0.9) 0%, transparent 100%),
                radial-gradient(2px 2px at 80% 12%, rgba(255,255,255,0.85) 0%, transparent 100%),
                radial-gradient(2.5px 2.5px at 20% 30%, rgba(172,148,216,1) 0%, transparent 100%),
                radial-gradient(2px 2px at 30% 5%, rgba(255,255,255,0.9) 0%, transparent 100%);
            animation: twinkle1 3s ease-in-out infinite;
        }
        .hero-stars-2 {
            background-image:
                radial-gradient(1.5px 1.5px at 25% 60%, rgba(255,255,255,0.85) 0%, transparent 100%),
                radial-gradient(2px 2px at 70% 35%, rgba(255,255,255,0.9) 0%, transparent 100%),
                radial-gradient(1.5px 1.5px at 15% 80%, rgba(255,255,255,0.8) 0%, transparent 100%),
                radial-gradient(2px 2px at 5% 50%, rgba(255,255,255,0.85) 0%, transparent 100%),
                radial-gradient(2px 2px at 72% 65%, rgba(255,255,255,0.85) 0%, transparent 100%),
                radial-gradient(2.5px 2.5px at 75% 50%, rgba(172,148,216,0.9) 0%, transparent 100%),
                radial-gradient(2px 2px at 60% 15%, rgba(232,150,29,0.75) 0%, transparent 100%),
                radial-gradient(1.5px 1.5px at 58% 52%, rgba(255,255,255,0.75) 0%, transparent 100%);
            animation: twinkle2 4s ease-in-out infinite;
        }
        .hero-stars-3 {
            background-image:
                radial-gradient(1.5px 1.5px at 55% 75%, rgba(255,255,255,0.75) 0%, transparent 100%),
                radial-gradient(1.5px 1.5px at 90% 85%, rgba(255,255,255,0.85) 0%, transparent 100%),
                radial-gradient(1.5px 1.5px at 65% 90%, rgba(255,255,255,0.75) 0%, transparent 100%),
                radial-gradient(1.5px 1.5px at 48% 42%, rgba(255,255,255,0.7) 0%, transparent 100%),
                radial-gradient(1.5px 1.5px at 92% 30%, rgba(255,255,255,0.8) 0%, transparent 100%),
                radial-gradient(2px 2px at 8% 35%, rgba(172,148,216,0.85) 0%, transparent 100%),
                radial-gradient(1.5px 1.5px at 45% 88%, rgba(232,150,29,0.65) 0%, transparent 100%);
            animation: twinkle3 5s ease-in-out infinite;
        }
        @keyframes twinkle1 {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.3; }
        }
        @keyframes twinkle2 {
            0%, 100% { opacity: 0.4; }
            50% { opacity: 1; }
        }
        @keyframes twinkle3 {
            0%, 100% { opacity: 0.9; }
            35% { opacity: 0.25; }
            70% { opacity: 1; }
        }
        /* Neutrino stream animation */
        .neutrino-stream {
            position: absolute;
            pointer-events: none;
            overflow: hidden;
        }
        .neutrino-stream::after {
            content: '';
            position: absolute;
            width: 2px;
            height: 80px;
            background: linear-gradient(to bottom, transparent, rgba(172,148,216,0.8), rgba(255,255,255,1), rgba(172,148,216,0.8), transparent);
            animation: neutrino 3s linear infinite;
            border-radius: 2px;
        }
        .neutrino-stream.n1 { left: 8%; top: 0; height: 100%; transform: rotate(15deg); }
        .neutrino-stream.n1::after { animation-delay: 0s; animation-duration: 2.5s; }
        .neutrino-stream.n2 { right: 10%; top: 0; height: 100%; transform: rotate(-12deg); }
        .neutrino-stream.n2::after { animation-delay: 1.2s; animation-duration: 3s; }
        .neutrino-stream.n3 { left: 15%; top: 0; height: 100%; transform: rotate(8deg); }
        .neutrino-stream.n3::after { animation-delay: 2s; animation-duration: 3.5s; width: 1.5px; height: 40px; }
        @keyframes neutrino {
            0% { top: -60px; opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { top: 100%; opacity: 0; }
        }
        /* Bodygraph float */
        .bodygraph-float {
            animation: bgFloat 8s ease-in-out infinite;
        }
        .bodygraph-float-alt {
            animation: bgFloat 10s ease-in-out infinite reverse;
        }
        @keyframes bgFloat {
            0%, 100% { transform: translateY(-50%) translateX(0); }
            50% { transform: translateY(-52%) translateX(3px); }
        }
        @keyframes twinkle {
            0%, 100% { filter: brightness(1); }
            45% { filter: brightness(1.1) drop-shadow(0 0 2px rgba(110,88,152,0.15)); }
            75% { filter: brightness(0.95); }
        }
        .icon-twinkle { animation: twinkle 8s ease-in-out infinite; }
        /* Card reveal animation — CSS transition (works both directions) */
        .card-reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.5s ease-out, transform 0.5s ease-out;
        }
        .card-reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }
        /* Stretched link — entire card clickable */
        .card-link { position: relative; cursor: pointer; }
        .card-link .card-link-target::after {
            content: '';
            position: absolute;
            inset: 0;
            z-index: 1;
        }
        /* Pulsing glow on CTA button */
        @keyframes btnGlow {
            0%, 100% { box-shadow: 0 0 8px rgba(84,147,30,0.3); }
            50% { box-shadow: 0 0 20px rgba(84,147,30,0.55), 0 0 40px rgba(84,147,30,0.15); }
        }
        .btn-glow { animation: btnGlow 3s ease-in-out infinite; }
        /* Button hover/press scale */
        .btn-scale { transition: transform 0.2s ease; }
        .btn-scale:hover { transform: scale(1.02); }
        .btn-scale:active { transform: scale(0.97); }
    </style>
</head>
<body class="bg-white text-gray-700">

    <!-- ==================== NAV BAR ==================== -->
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-[1400px] mx-auto px-6 flex items-center justify-between h-[80px]">
            <!-- Logo -->
            <a href="https://www.geneticmatrix.com" class="flex-shrink-0">
                <img src="assets/logo.svg" alt="Genetic Matrix - Know you" class="h-14">
            </a>

            <!-- Right Nav: LOGGED OUT (default for static pages) -->
            <div class="flex items-center gap-8">
                <!-- Report Icon -->
                <a href="https://www.geneticmatrix.com/geneticmatrix-reports/" class="hidden md:block" title="Reports">
                    <img src="assets/icon-report.svg" alt="Reports" class="h-9 w-9">
                </a>
                <!-- Talking Chart Icon -->
                <a href="https://www.geneticmatrix.com/talking-charts/" class="hidden md:block" title="Talking Charts">
                    <img src="assets/icon-talking-chart.svg" alt="Talking Charts" class="h-7 w-7">
                </a>
                <!-- Free Chart (popup on live site - Shafik to wire up) -->
                <a href="#" class="hidden lg:block text-gm-gray hover:text-gray-900 text-sm font-medium" data-action="free-chart-popup">Free Chart</a>
                <!-- Our Plans -->
                <a href="https://www.geneticmatrix.com/plans-features/" class="hidden lg:block text-gm-gray hover:text-gray-900 text-sm font-medium">Our Plans</a>
                <!-- Cart -->
                <a href="https://www.geneticmatrix.com/cart/" title="Cart">
                    <img src="assets/icon-cart.svg" alt="Cart" class="h-8 w-auto">
                </a>
                <!-- Language Selector -->
                <div class="hidden md:flex items-center gap-1 text-gm-gray text-sm">
                    <span>English</span>
                    <img src="assets/icon-english.svg" alt="English" class="h-5 w-7">
                </div>
                <!-- Sign In (popup on live site - Shafik to wire up) -->
                <a href="#" class="hidden md:block text-gm-gray hover:text-gray-900 text-sm font-medium" data-action="sign-in-popup">Sign In</a>
                <!-- Register -->
                <a href="https://www.geneticmatrix.com/register/" class="bg-gm-green hover:bg-gm-green-dark text-white text-sm font-semibold px-5 py-2 rounded-full transition">Register</a>
            </div>
        </div>
    </nav>

    <!-- ==================== HERO / PAGE HEADER ==================== -->
    <section class="relative overflow-hidden py-16 md:py-20 text-center" style="background: linear-gradient(135deg, #1e1240 0%, #3C2864 35%, #4a3070 55%, #3C2864 75%, #1a0e38 100%);">
        <!-- Zodiac wheel — decorative SVG -->
        <div class="absolute inset-0 flex items-center justify-center pointer-events-none" aria-hidden="true">
            <svg class="w-[500px] h-[500px] md:w-[650px] md:h-[650px] opacity-[0.18]" viewBox="0 0 400 400" fill="none" xmlns="http://www.w3.org/2000/svg">
                <!-- Outer ring -->
                <circle cx="200" cy="200" r="190" stroke="white" stroke-width="1.2"/>
                <circle cx="200" cy="200" r="170" stroke="white" stroke-width="0.8"/>
                <circle cx="200" cy="200" r="150" stroke="white" stroke-width="0.5"/>
                <!-- 12 division lines (zodiac houses) -->
                <line x1="200" y1="10" x2="200" y2="50" stroke="white" stroke-width="0.8"/>
                <line x1="295" y1="27.7" x2="275" y2="62.3" stroke="white" stroke-width="0.8"/>
                <line x1="372.3" y1="105" x2="337.7" y2="125" stroke="white" stroke-width="0.8"/>
                <line x1="390" y1="200" x2="350" y2="200" stroke="white" stroke-width="0.8"/>
                <line x1="372.3" y1="295" x2="337.7" y2="275" stroke="white" stroke-width="0.8"/>
                <line x1="295" y1="372.3" x2="275" y2="337.7" stroke="white" stroke-width="0.8"/>
                <line x1="200" y1="390" x2="200" y2="350" stroke="white" stroke-width="0.8"/>
                <line x1="105" y1="372.3" x2="125" y2="337.7" stroke="white" stroke-width="0.8"/>
                <line x1="27.7" y1="295" x2="62.3" y2="275" stroke="white" stroke-width="0.8"/>
                <line x1="10" y1="200" x2="50" y2="200" stroke="white" stroke-width="0.8"/>
                <line x1="27.7" y1="105" x2="62.3" y2="125" stroke="white" stroke-width="0.8"/>
                <line x1="105" y1="27.7" x2="125" y2="62.3" stroke="white" stroke-width="0.8"/>
                <!-- Inner detail rings -->
                <circle cx="200" cy="200" r="120" stroke="white" stroke-width="0.5"/>
                <circle cx="200" cy="200" r="80" stroke="white" stroke-width="0.3"/>
                <!-- Zodiac symbols (simplified glyphs) -->
                <text x="200" y="25" fill="white" font-size="11" text-anchor="middle" opacity="0.9">♈</text>
                <text x="290" y="45" fill="white" font-size="11" text-anchor="middle" opacity="0.9">♉</text>
                <text x="358" y="115" fill="white" font-size="11" text-anchor="middle" opacity="0.9">♊</text>
                <text x="378" y="205" fill="white" font-size="11" text-anchor="middle" opacity="0.9">♋</text>
                <text x="358" y="295" fill="white" font-size="11" text-anchor="middle" opacity="0.9">♌</text>
                <text x="290" y="365" fill="white" font-size="11" text-anchor="middle" opacity="0.9">♍</text>
                <text x="200" y="385" fill="white" font-size="11" text-anchor="middle" opacity="0.9">♎</text>
                <text x="112" y="365" fill="white" font-size="11" text-anchor="middle" opacity="0.9">♏</text>
                <text x="42" y="295" fill="white" font-size="11" text-anchor="middle" opacity="0.9">♐</text>
                <text x="22" y="205" fill="white" font-size="11" text-anchor="middle" opacity="0.9">♑</text>
                <text x="42" y="115" fill="white" font-size="11" text-anchor="middle" opacity="0.9">♒</text>
                <text x="112" y="45" fill="white" font-size="11" text-anchor="middle" opacity="0.9">♓</text>
            </svg>
        </div>
        <!-- ====== GM-STYLE BODYGRAPH — left (rounded centers) ====== -->
        <div class="absolute pointer-events-none hidden md:block bodygraph-float" style="left: 2%; top: 50%; transform: translateY(-50%);" aria-hidden="true">
            <svg class="w-[210px] h-[320px] lg:w-[260px] lg:h-[400px] opacity-[0.3]" viewBox="0 0 140 220" fill="none" xmlns="http://www.w3.org/2000/svg">
                <!-- Head — rounded triangle up -->
                <path d="M70,6 C74,6 80,18 82,24 C82,28 78,30 70,30 C62,30 58,28 58,24 C60,18 66,6 70,6Z" stroke="white" stroke-width="1.5" fill="none"/>
                <!-- Ajna — rounded inverted triangle -->
                <path d="M58,38 C58,36 62,34 70,34 C78,34 82,36 82,38 C80,44 74,54 70,54 C66,54 60,44 58,38Z" stroke="white" stroke-width="1.5" fill="none"/>
                <!-- Channel Head-Ajna -->
                <line x1="70" y1="30" x2="70" y2="34" stroke="white" stroke-width="1"/>
                <!-- Throat — rounded rect -->
                <rect x="50" y="60" width="40" height="22" rx="6" stroke="white" stroke-width="1.5" fill="none"/>
                <line x1="70" y1="54" x2="70" y2="60" stroke="white" stroke-width="1"/>
                <!-- G Center — rounded diamond -->
                <path d="M70,90 C76,90 84,100 84,106 C84,112 76,122 70,122 C64,122 56,112 56,106 C56,100 64,90 70,90Z" stroke="white" stroke-width="1.5" fill="none"/>
                <line x1="70" y1="82" x2="70" y2="90" stroke="white" stroke-width="1"/>
                <!-- Heart/Will — small rounded triangle (right) -->
                <path d="M100,94 C104,94 106,100 106,104 C106,108 100,112 98,112 C94,112 92,106 92,100 C92,96 96,94 100,94Z" stroke="white" stroke-width="1.2" fill="none"/>
                <line x1="84" y1="98" x2="92" y2="100" stroke="white" stroke-width="0.8"/>
                <line x1="90" y1="74" x2="96" y2="94" stroke="white" stroke-width="0.8"/>
                <!-- Spleen — rounded triangle (left) -->
                <path d="M28,140 C32,134 40,130 44,130 C46,130 46,134 44,140 C42,146 36,152 32,152 C28,152 26,146 28,140Z" stroke="white" stroke-width="1.2" fill="none"/>
                <!-- Solar Plexus — rounded triangle (right) -->
                <path d="M112,140 C108,134 100,130 96,130 C94,130 94,134 96,140 C98,146 104,152 108,152 C112,152 114,146 112,140Z" stroke="white" stroke-width="1.2" fill="none"/>
                <!-- Sacral — rounded rect -->
                <rect x="52" y="132" width="36" height="20" rx="6" stroke="white" stroke-width="1.5" fill="none"/>
                <line x1="70" y1="122" x2="70" y2="132" stroke="white" stroke-width="1"/>
                <line x1="52" y1="142" x2="44" y2="140" stroke="white" stroke-width="0.8"/>
                <line x1="88" y1="142" x2="96" y2="140" stroke="white" stroke-width="0.8"/>
                <!-- Root — rounded rect -->
                <rect x="52" y="166" width="36" height="20" rx="6" stroke="white" stroke-width="1.5" fill="none"/>
                <line x1="70" y1="152" x2="70" y2="166" stroke="white" stroke-width="1"/>
                <line x1="44" y1="152" x2="52" y2="176" stroke="white" stroke-width="0.8"/>
                <line x1="96" y1="152" x2="88" y2="176" stroke="white" stroke-width="0.8"/>
            </svg>
        </div>
        <!-- ====== GM-STYLE BODYGRAPH — right (smaller, tilted) ====== -->
        <div class="absolute pointer-events-none hidden md:block bodygraph-float-alt" style="right: 3%; top: 50%; transform: translateY(-50%) rotate(5deg);" aria-hidden="true">
            <svg class="w-[180px] h-[270px] lg:w-[220px] lg:h-[340px] opacity-[0.22]" viewBox="0 0 140 220" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M70,6 C74,6 80,18 82,24 C82,28 78,30 70,30 C62,30 58,28 58,24 C60,18 66,6 70,6Z" stroke="white" stroke-width="1.5" fill="none"/>
                <path d="M58,38 C58,36 62,34 70,34 C78,34 82,36 82,38 C80,44 74,54 70,54 C66,54 60,44 58,38Z" stroke="white" stroke-width="1.5" fill="none"/>
                <line x1="70" y1="30" x2="70" y2="34" stroke="white" stroke-width="1"/>
                <rect x="50" y="60" width="40" height="22" rx="6" stroke="white" stroke-width="1.5" fill="none"/>
                <line x1="70" y1="54" x2="70" y2="60" stroke="white" stroke-width="1"/>
                <path d="M70,90 C76,90 84,100 84,106 C84,112 76,122 70,122 C64,122 56,112 56,106 C56,100 64,90 70,90Z" stroke="white" stroke-width="1.5" fill="none"/>
                <line x1="70" y1="82" x2="70" y2="90" stroke="white" stroke-width="1"/>
                <path d="M100,94 C104,94 106,100 106,104 C106,108 100,112 98,112 C94,112 92,106 92,100 C92,96 96,94 100,94Z" stroke="white" stroke-width="1.2" fill="none"/>
                <line x1="84" y1="98" x2="92" y2="100" stroke="white" stroke-width="0.8"/>
                <path d="M28,140 C32,134 40,130 44,130 C46,130 46,134 44,140 C42,146 36,152 32,152 C28,152 26,146 28,140Z" stroke="white" stroke-width="1.2" fill="none"/>
                <path d="M112,140 C108,134 100,130 96,130 C94,130 94,134 96,140 C98,146 104,152 108,152 C112,152 114,146 112,140Z" stroke="white" stroke-width="1.2" fill="none"/>
                <rect x="52" y="132" width="36" height="20" rx="6" stroke="white" stroke-width="1.5" fill="none"/>
                <line x1="70" y1="122" x2="70" y2="132" stroke="white" stroke-width="1"/>
                <line x1="52" y1="142" x2="44" y2="140" stroke="white" stroke-width="0.8"/>
                <line x1="88" y1="142" x2="96" y2="140" stroke="white" stroke-width="0.8"/>
                <rect x="52" y="166" width="36" height="20" rx="6" stroke="white" stroke-width="1.5" fill="none"/>
                <line x1="70" y1="152" x2="70" y2="166" stroke="white" stroke-width="1"/>
            </svg>
        </div>
        <!-- ====== REFINED LIFE FORM ICONS ====== -->
        <!-- Human figure — standing, left inner area -->
        <div class="absolute pointer-events-none hidden lg:block" style="left: 21%; top: 20%; opacity: 0.22;" aria-hidden="true">
            <svg class="w-[28px] h-[52px]" viewBox="0 0 24 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="12" cy="5" r="4" stroke="white" stroke-width="1.3" fill="none"/>
                <line x1="12" y1="9" x2="12" y2="28" stroke="white" stroke-width="1.3"/>
                <line x1="12" y1="14" x2="3" y2="22" stroke="white" stroke-width="1.3" stroke-linecap="round"/>
                <line x1="12" y1="14" x2="21" y2="22" stroke="white" stroke-width="1.3" stroke-linecap="round"/>
                <line x1="12" y1="28" x2="4" y2="44" stroke="white" stroke-width="1.3" stroke-linecap="round"/>
                <line x1="12" y1="28" x2="20" y2="44" stroke="white" stroke-width="1.3" stroke-linecap="round"/>
            </svg>
        </div>
        <!-- Human figure with headwrap — right inner -->
        <div class="absolute pointer-events-none hidden lg:block" style="right: 24%; top: 18%; opacity: 0.2;" aria-hidden="true">
            <svg class="w-[28px] h-[52px]" viewBox="0 0 24 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="12" cy="5" r="4" stroke="white" stroke-width="1.3" fill="none"/>
                <path d="M8,3 C8,1 10,0 12,0 C14,0 16,1 16,3" stroke="white" stroke-width="1" fill="none"/>
                <line x1="12" y1="9" x2="12" y2="28" stroke="white" stroke-width="1.3"/>
                <path d="M12,14 C8,18 4,20 2,24" stroke="white" stroke-width="1.3" fill="none" stroke-linecap="round"/>
                <path d="M12,14 C16,18 20,20 22,24" stroke="white" stroke-width="1.3" fill="none" stroke-linecap="round"/>
                <path d="M6,28 L12,28 L18,28" stroke="white" stroke-width="1" stroke-linecap="round"/>
                <line x1="12" y1="28" x2="5" y2="44" stroke="white" stroke-width="1.3" stroke-linecap="round"/>
                <line x1="12" y1="28" x2="19" y2="44" stroke="white" stroke-width="1.3" stroke-linecap="round"/>
            </svg>
        </div>
        <!-- Human meditating — lower center-left -->
        <div class="absolute pointer-events-none hidden xl:block" style="left: 28%; bottom: 10%; opacity: 0.18;" aria-hidden="true">
            <svg class="w-[36px] h-[40px]" viewBox="0 0 36 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="18" cy="5" r="4" stroke="white" stroke-width="1.3" fill="none"/>
                <line x1="18" y1="9" x2="18" y2="24" stroke="white" stroke-width="1.3"/>
                <path d="M18,16 C14,18 8,20 4,18" stroke="white" stroke-width="1.3" fill="none" stroke-linecap="round"/>
                <path d="M18,16 C22,18 28,20 32,18" stroke="white" stroke-width="1.3" fill="none" stroke-linecap="round"/>
                <path d="M18,24 C14,28 8,32 6,36" stroke="white" stroke-width="1.3" fill="none" stroke-linecap="round"/>
                <path d="M18,24 C22,28 28,32 30,36" stroke="white" stroke-width="1.3" fill="none" stroke-linecap="round"/>
                <path d="M6,36 L30,36" stroke="white" stroke-width="1" stroke-linecap="round" opacity="0.5"/>
            </svg>
        </div>
        <!-- Dog — clean pictogram style -->
        <div class="absolute pointer-events-none hidden lg:block" style="left: 22%; top: 55%; opacity: 0.2;" aria-hidden="true">
            <svg class="w-[38px] h-[32px]" viewBox="0 0 40 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8,12 L6,4 C6,3 7,2 8,3 L12,8 M28,8 L32,3 C33,2 34,3 34,4 L32,12" stroke="white" stroke-width="1.3" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                <ellipse cx="20" cy="16" rx="14" ry="10" stroke="white" stroke-width="1.3" fill="none"/>
                <circle cx="15" cy="14" r="1.2" fill="white"/>
                <circle cx="25" cy="14" r="1.2" fill="white"/>
                <ellipse cx="20" cy="18" rx="2.5" ry="1.5" stroke="white" stroke-width="1" fill="none"/>
                <line x1="10" y1="26" x2="10" y2="32" stroke="white" stroke-width="1.2" stroke-linecap="round"/>
                <line x1="16" y1="26" x2="16" y2="32" stroke="white" stroke-width="1.2" stroke-linecap="round"/>
                <line x1="24" y1="26" x2="24" y2="32" stroke="white" stroke-width="1.2" stroke-linecap="round"/>
                <line x1="30" y1="26" x2="30" y2="32" stroke="white" stroke-width="1.2" stroke-linecap="round"/>
            </svg>
        </div>
        <!-- Cat — minimal -->
        <div class="absolute pointer-events-none hidden lg:block" style="left: 17%; top: 12%; opacity: 0.2;" aria-hidden="true">
            <svg class="w-[30px] h-[30px]" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6,12 L3,3 L10,8" stroke="white" stroke-width="1.2" fill="none" stroke-linejoin="round"/>
                <path d="M26,12 L29,3 L22,8" stroke="white" stroke-width="1.2" fill="none" stroke-linejoin="round"/>
                <ellipse cx="16" cy="18" rx="12" ry="10" stroke="white" stroke-width="1.3" fill="none"/>
                <circle cx="11" cy="16" r="1" fill="white"/>
                <circle cx="21" cy="16" r="1" fill="white"/>
                <path d="M14,20 L16,21.5 L18,20" stroke="white" stroke-width="1" fill="none" stroke-linecap="round"/>
            </svg>
        </div>
        <!-- Horse — elegant profile -->
        <div class="absolute pointer-events-none hidden xl:block" style="left: 15%; bottom: 16%; opacity: 0.17;" aria-hidden="true">
            <svg class="w-[44px] h-[44px]" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12,16 C12,8 16,4 22,2 L26,2 C28,2 30,4 30,6 L32,4 L33,6 L31,10 C34,12 38,16 38,22 L38,30 L38,38" stroke="white" stroke-width="1.3" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12,16 C8,18 6,22 6,26 L6,38" stroke="white" stroke-width="1.3" fill="none" stroke-linecap="round"/>
                <line x1="12" y1="30" x2="12" y2="38" stroke="white" stroke-width="1.2" stroke-linecap="round"/>
                <line x1="32" y1="30" x2="32" y2="38" stroke="white" stroke-width="1.2" stroke-linecap="round"/>
                <circle cx="26" cy="8" r="0.8" fill="white"/>
            </svg>
        </div>
        <!-- Bird in flight — minimal -->
        <div class="absolute pointer-events-none hidden lg:block" style="left: 35%; top: 8%; opacity: 0.22;" aria-hidden="true">
            <svg class="w-[32px] h-[16px]" viewBox="0 0 32 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0,12 C4,4 8,2 16,6 C24,2 28,4 32,12" stroke="white" stroke-width="1.3" fill="none" stroke-linecap="round"/>
            </svg>
        </div>
        <!-- Second bird -->
        <div class="absolute pointer-events-none hidden lg:block" style="right: 32%; top: 6%; opacity: 0.16;" aria-hidden="true">
            <svg class="w-[24px] h-[12px]" viewBox="0 0 32 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0,12 C4,4 8,2 16,6 C24,2 28,4 32,12" stroke="white" stroke-width="1.3" fill="none" stroke-linecap="round"/>
            </svg>
        </div>
        <!-- Fish — streamlined -->
        <div class="absolute pointer-events-none hidden lg:block" style="left: 25%; bottom: 20%; opacity: 0.2;" aria-hidden="true">
            <svg class="w-[40px] h-[20px]" viewBox="0 0 42 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4,11 C4,5 12,2 22,2 C30,2 36,5 36,11 C36,17 30,20 22,20 C12,20 4,17 4,11Z" stroke="white" stroke-width="1.3" fill="none"/>
                <path d="M36,11 L42,4 L42,18 Z" stroke="white" stroke-width="1.2" fill="none" stroke-linejoin="round"/>
                <circle cx="12" cy="10" r="1.5" fill="white"/>
            </svg>
        </div>
        <!-- Snake — flowing S-curve -->
        <div class="absolute pointer-events-none hidden lg:block" style="right: 20%; bottom: 14%; opacity: 0.18;" aria-hidden="true">
            <svg class="w-[50px] h-[20px]" viewBox="0 0 52 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2,16 C8,4 16,4 20,11 C24,18 32,18 36,11 C40,4 44,6 48,8" stroke="white" stroke-width="1.5" fill="none" stroke-linecap="round"/>
                <circle cx="48" cy="8" r="2.5" stroke="white" stroke-width="1.2" fill="none"/>
                <circle cx="49" cy="7" r="0.6" fill="white"/>
            </svg>
        </div>
        <!-- Butterfly — geometric -->
        <div class="absolute pointer-events-none hidden lg:block" style="right: 28%; bottom: 8%; opacity: 0.18;" aria-hidden="true">
            <svg class="w-[34px] h-[28px]" viewBox="0 0 36 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line x1="18" y1="4" x2="18" y2="28" stroke="white" stroke-width="1.3" stroke-linecap="round"/>
                <ellipse cx="10" cy="12" rx="8" ry="6" stroke="white" stroke-width="1.2" fill="none"/>
                <ellipse cx="26" cy="12" rx="8" ry="6" stroke="white" stroke-width="1.2" fill="none"/>
                <ellipse cx="11" cy="22" rx="6" ry="5" stroke="white" stroke-width="1.1" fill="none"/>
                <ellipse cx="25" cy="22" rx="6" ry="5" stroke="white" stroke-width="1.1" fill="none"/>
                <path d="M18,4 L14,0" stroke="white" stroke-width="1" stroke-linecap="round"/>
                <path d="M18,4 L22,0" stroke="white" stroke-width="1" stroke-linecap="round"/>
            </svg>
        </div>
        <!-- Tree — organic silhouette -->
        <div class="absolute pointer-events-none hidden lg:block" style="right: 26%; top: 18%; opacity: 0.18;" aria-hidden="true">
            <svg class="w-[32px] h-[44px]" viewBox="0 0 32 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line x1="16" y1="48" x2="16" y2="26" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                <ellipse cx="16" cy="16" rx="14" ry="15" stroke="white" stroke-width="1.3" fill="none"/>
                <path d="M12,48 C10,46 8,46 6,47" stroke="white" stroke-width="0.8" fill="none" stroke-linecap="round"/>
                <path d="M20,48 C22,46 24,46 26,47" stroke="white" stroke-width="0.8" fill="none" stroke-linecap="round"/>
            </svg>
        </div>
        <!-- Turtle — clean -->
        <div class="absolute pointer-events-none hidden xl:block" style="right: 17%; top: 56%; opacity: 0.16;" aria-hidden="true">
            <svg class="w-[38px] h-[24px]" viewBox="0 0 42 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                <ellipse cx="20" cy="13" rx="16" ry="10" stroke="white" stroke-width="1.3" fill="none"/>
                <circle cx="38" cy="11" r="3" stroke="white" stroke-width="1.2" fill="none"/>
                <circle cx="39" cy="10" r="0.6" fill="white"/>
                <line x1="8" y1="22" x2="5" y2="26" stroke="white" stroke-width="1.1" stroke-linecap="round"/>
                <line x1="8" y1="4" x2="5" y2="0" stroke="white" stroke-width="1.1" stroke-linecap="round"/>
                <line x1="30" y1="22" x2="33" y2="26" stroke="white" stroke-width="1.1" stroke-linecap="round"/>
                <line x1="30" y1="4" x2="33" y2="0" stroke="white" stroke-width="1.1" stroke-linecap="round"/>
                <path d="M4,13 L0,14" stroke="white" stroke-width="1" stroke-linecap="round"/>
            </svg>
        </div>
        <!-- Crystal — faceted -->
        <div class="absolute pointer-events-none hidden lg:block" style="right: 22%; top: 42%; opacity: 0.17;" aria-hidden="true">
            <svg class="w-[26px] h-[34px]" viewBox="0 0 28 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14,2 L6,16 L10,36 L18,36 L22,16 Z" stroke="white" stroke-width="1.3" fill="none" stroke-linejoin="round"/>
                <line x1="14" y1="2" x2="14" y2="36" stroke="white" stroke-width="0.7" opacity="0.5"/>
                <line x1="6" y1="16" x2="22" y2="16" stroke="white" stroke-width="0.7" opacity="0.5"/>
            </svg>
        </div>
        <!-- Sleeping figure — zzz -->
        <div class="absolute pointer-events-none hidden lg:block" style="right: 24%; bottom: 20%; opacity: 0.18;" aria-hidden="true">
            <svg class="w-[44px] h-[28px]" viewBox="0 0 48 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="10" cy="12" r="5" stroke="white" stroke-width="1.3" fill="none"/>
                <path d="M15,14 C18,18 22,20 28,20 L42,20" stroke="white" stroke-width="1.3" fill="none" stroke-linecap="round"/>
                <path d="M22,20 L22,26 C22,28 24,28 28,28 L40,28 C42,28 42,26 42,26 L42,20" stroke="white" stroke-width="1.1" fill="none" stroke-linejoin="round"/>
                <text x="18" y="8" fill="white" font-size="7" font-family="Inter,sans-serif" opacity="0.8">z</text>
                <text x="24" y="4" fill="white" font-size="5.5" font-family="Inter,sans-serif" opacity="0.6">z</text>
            </svg>
        </div>
        <!-- Neutrino streams -->
        <div class="neutrino-stream n1 hidden md:block" aria-hidden="true"></div>
        <div class="neutrino-stream n2 hidden md:block" aria-hidden="true"></div>
        <div class="neutrino-stream n3 hidden md:block" aria-hidden="true"></div>
        <!-- Stars layers — 3 independent layers for visible twinkling -->
        <div class="hero-stars-1" aria-hidden="true"></div>
        <div class="hero-stars-2" aria-hidden="true"></div>
        <div class="hero-stars-3" aria-hidden="true"></div>
        <!-- Warm glow overlay -->
        <div class="absolute inset-0 pointer-events-none" aria-hidden="true" style="background: radial-gradient(ellipse at 60% 40%, rgba(172,148,216,0.2) 0%, transparent 60%), radial-gradient(ellipse at 30% 70%, rgba(232,150,29,0.1) 0%, transparent 50%);"></div>
        <!-- Content -->
        <div class="relative z-10 max-w-3xl mx-auto px-6">
            <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">Learn Human Design &amp; Astrology</h1>
            <p class="text-gray-300 text-base md:text-lg leading-relaxed max-w-2xl mx-auto">
                Free educational resources to deepen your understanding of Human Design,
                astrology, and the tools available on Genetic Matrix. No login required.
            </p>
        </div>
    </section>

    <!-- ==================== HUMAN DESIGN SECTION ==================== -->
    <section class="bg-gm-light py-12 md:py-16">
        <div class="max-w-6xl mx-auto px-6">
            <!-- Section Header -->
            <div class="mb-2">
                <span class="text-xs font-semibold tracking-widest text-gray-400 uppercase">Human Design</span>
            </div>
            <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-3">
                <span class="text-gm-purple">|</span> Foundations & Advanced Topics
            </h2>
            <p class="text-gray-500 text-sm md:text-base max-w-3xl mb-10">
                Explore the mechanics of your design — from basic core body elements at right to the deepest layers of cognitive differentiation.
            </p>

            <!-- Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Type Card -->
                <div class="card-reveal card-link bg-white rounded-lg border border-gm-border p-6 hover:shadow-md hover:-translate-y-1 hover:border-gray-300 hover:bg-[#F5F3F8] transition-all duration-300 flex flex-col">
                    <div class="flex items-start gap-4 mb-4 flex-1">
                        <img src="assets/icon-type.svg" alt="Type" class="w-16 h-16 flex-shrink-0">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-1">Type</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                Human Design System works primarily through your Bodygraph. It divides all of us into four Types: Generator, Manifesting Generator, Projector, Manifestor, and Reflector.
                            </p>
                        </div>
                    </div>
                    <a href="types/index.html" class="text-gm-purple text-sm font-semibold hover:underline mt-auto card-link-target">Explore →</a>
                </div>

                <!-- Profile Card -->
                <div class="card-reveal card-link bg-white rounded-lg border border-gm-border p-6 hover:shadow-md hover:-translate-y-1 hover:border-gray-300 hover:bg-[#F5F3F8] transition-all duration-300 flex flex-col">
                    <div class="flex items-start gap-4 mb-4 flex-1">
                        <img src="assets/icon-profile.svg" alt="Profile" class="w-16 h-16 flex-shrink-0">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-1">Profile</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                Your Profile — your Personality is a combination of two numbers that create your Profile. It describes the costume you wear to fulfill your life's purpose and direction.
                            </p>
                        </div>
                    </div>
                    <a href="profiles/index.php" class="text-gm-purple text-sm font-semibold hover:underline mt-auto card-link-target">Explore →</a>
                </div>

                <!-- Centers Card -->
                <div class="card-reveal card-link bg-white rounded-lg border border-gm-border p-6 hover:shadow-md hover:-translate-y-1 hover:border-gray-300 hover:bg-[#F5F3F8] transition-all duration-300 flex flex-col">
                    <div class="flex items-start gap-4 mb-4 flex-1">
                        <img src="assets/icon-centres.svg" alt="Centers" class="w-16 h-16 flex-shrink-0">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-1">Centers</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                The Bodygraph contains nine Centers. Understanding your defined, undefined, and open Centers reveals your authority, definition, and conditioning.
                            </p>
                        </div>
                    </div>
                    <a href="#" class="text-gm-purple text-sm font-semibold hover:underline mt-auto card-link-target">Explore →</a>
                </div>

                <!-- Variables & Arrows Card -->
                <div class="card-reveal card-link bg-white rounded-lg border border-gm-border p-6 hover:shadow-md hover:-translate-y-1 hover:border-gray-300 hover:bg-[#F5F3F8] transition-all duration-300 flex flex-col">
                    <div class="flex items-start gap-4 mb-4 flex-1">
                        <img src="assets/icon-arrows.svg" alt="Variables & Arrows" class="w-16 h-16 flex-shrink-0">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-1">Variables & Arrows <span class="text-gm-pink text-xs font-bold">(NEW)</span></h3>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                The four arrows at the top of your Bodygraph reveal your Variables — the deepest layer of differentiation in Human Design, covering digestion, environment, perspective, and motivation.
                            </p>
                        </div>
                    </div>
                    <a href="variables/index.html" class="text-gm-purple text-sm font-semibold hover:underline mt-auto card-link-target">Explore →</a>
                </div>

                <!-- Sleep Design Card -->
                <div class="card-reveal card-link bg-white rounded-lg border border-gm-border p-6 hover:shadow-md hover:-translate-y-1 hover:border-gray-300 hover:bg-[#F5F3F8] transition-all duration-300 flex flex-col">
                    <div class="flex items-start gap-4 mb-4 flex-1">
                        <img src="assets/icon-moon.svg" alt="Sleep Design" class="w-16 h-16 flex-shrink-0">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-1">Sleep Design</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                Your design functions at night. When you sleep, your conditioning field changes. Explore how the transit field affects your rest and regeneration.
                            </p>
                        </div>
                    </div>
                    <a href="sleep-design/index.html" class="text-gm-purple text-sm font-semibold hover:underline mt-auto card-link-target">Explore →</a>
                </div>

                <!-- Animal Human Design Card -->
                <div class="card-reveal card-link bg-white rounded-lg border border-gm-border p-6 hover:shadow-md hover:-translate-y-1 hover:border-gray-300 hover:bg-[#F5F3F8] transition-all duration-300 flex flex-col">
                    <div class="flex items-start gap-4 mb-4 flex-1">
                        <img src="assets/icon-paw.svg" alt="Animal Human Design" class="w-16 h-16 flex-shrink-0">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-1">Animal Human Design</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                Explore the Human Design of animals. Discover how pets and animals carry their own unique energetic blueprint.
                            </p>
                        </div>
                    </div>
                    <a href="animals/index.html" class="text-gm-purple text-sm font-semibold hover:underline mt-auto card-link-target">Explore →</a>
                </div>

            </div>
        </div>
    </section>

    <!-- ==================== CALCULATION METHOD SECTION ==================== -->
    <section class="bg-white py-12 md:py-16">
        <div class="max-w-6xl mx-auto px-6">
            <!-- Section Header -->
            <div class="mb-2">
                <span class="text-xs font-semibold tracking-widest text-gray-400 uppercase">Calculation Method</span>
            </div>
            <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-3">
                <span class="text-gm-purple">|</span> Understand How Charts Are Calculated
            </h2>
            <p class="text-gray-500 text-sm md:text-base max-w-4xl mb-10">
                Genetic Matrix offers multiple calculation systems that each produces a valid chart — explore the differences and decide what resonates with you.
            </p>

            <!-- Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- J2000 Card -->
                <div class="card-reveal card-link bg-gm-light rounded-lg border border-gm-border p-6 hover:shadow-lg hover:-translate-y-2 hover:bg-white transition-all duration-300 border-t-4 border-t-gm-pink flex flex-col">
                    <div class="flex items-start gap-4 mb-4 flex-1">
                        <img src="assets/icon-rhombus.svg" alt="J2000" class="w-16 h-16 flex-shrink-0">
                        <div>
                            <span class="text-xs font-semibold tracking-widest text-gm-pink uppercase">Tropical</span>
                            <h3 class="text-lg font-bold text-gray-800 mb-1">J2000 — Fixed Reference</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                The standard system used by Ra Uru Hu. Uses a fixed reference point — the position of stars and constellations on January 1, 2000, at Epoch J2000.0.
                            </p>
                        </div>
                    </div>
                    <a href="#" class="text-gm-purple text-sm font-semibold hover:underline mt-auto card-link-target">Explore →</a>
                </div>

                <!-- Sidereal Calculation Card -->
                <div class="card-reveal card-link bg-gm-light rounded-lg border border-gm-border p-6 hover:shadow-lg hover:-translate-y-2 hover:bg-white transition-all duration-300 border-t-4 border-t-[#2ea89e] flex flex-col">
                    <div class="flex items-start gap-4 mb-4 flex-1">
                        <img src="assets/icon-windrose.svg" alt="Sidereal" class="w-16 h-16 flex-shrink-0">
                        <div>
                            <span class="text-xs font-semibold tracking-widest text-[#2ea89e] uppercase">Sidereal</span>
                            <h3 class="text-lg font-bold text-gray-800 mb-1">Sidereal Calculation</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                Unlike the tropical zodiac, sidereal systems take into account the precession of the equinoxes, aligning with the actual star positions.
                            </p>
                        </div>
                    </div>
                    <a href="#" class="text-gm-purple text-sm font-semibold hover:underline mt-auto card-link-target">Explore →</a>
                </div>

                <!-- Draconic Zodiac Card -->
                <div class="card-reveal card-link bg-gm-light rounded-lg border border-gm-border p-6 hover:shadow-lg hover:-translate-y-2 hover:bg-white transition-all duration-300 border-t-4 border-t-[#c94040] flex flex-col">
                    <div class="flex items-start gap-4 mb-4 flex-1">
                        <img src="assets/icon-dragon.svg" alt="Draconic" class="w-16 h-16 flex-shrink-0">
                        <div>
                            <span class="text-xs font-semibold tracking-widest text-[#c94040] uppercase">Draconic</span>
                            <h3 class="text-lg font-bold text-gray-800 mb-1">Draconic Zodiac</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                The Draconic system shifts the entire zodiac so the North Node becomes 0° Aries. It reveals a soul-level chart connected to your karmic path.
                            </p>
                        </div>
                    </div>
                    <a href="#" class="text-gm-purple text-sm font-semibold hover:underline mt-auto card-link-target">Explore →</a>
                </div>

                <!-- True Sidereal Variants Card -->
                <div class="card-reveal card-link bg-gm-light rounded-lg border border-gm-border p-6 hover:shadow-lg hover:-translate-y-2 hover:bg-white transition-all duration-300 border-t-4 border-t-[#d46ba3] flex flex-col">
                    <div class="flex items-start gap-4 mb-4 flex-1">
                        <img src="assets/icon-star.svg" alt="True Sidereal" class="w-16 h-16 flex-shrink-0">
                        <div>
                            <span class="text-xs font-semibold tracking-widest text-[#d46ba3] uppercase">True Sidereal</span>
                            <h3 class="text-lg font-bold text-gray-800 mb-1">True Sidereal Variants</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                True Sidereal systems position — Fagan-Bradley, Lahiri, and other variations. Explore the differences and determine which resonates.
                            </p>
                        </div>
                    </div>
                    <a href="#" class="text-gm-purple text-sm font-semibold hover:underline mt-auto card-link-target">Explore →</a>
                </div>

                <!-- 13-Sign Sidereal Card -->
                <div class="card-reveal card-link bg-gm-light rounded-lg border border-gm-border p-6 hover:shadow-lg hover:-translate-y-2 hover:bg-white transition-all duration-300 border-t-4 border-t-[#3d5a96] flex flex-col">
                    <div class="flex items-start gap-4 mb-4 flex-1">
                        <img src="assets/icon-ophiuchus.svg" alt="13-Sign Sidereal" class="w-16 h-16 flex-shrink-0">
                        <div>
                            <span class="text-xs font-semibold tracking-widest text-[#3d5a96] uppercase">13-Sign</span>
                            <h3 class="text-lg font-bold text-gray-800 mb-1">13-Sign Sidereal</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                Includes Ophiuchus as the 13th constellation. This system reflects the actual astronomical boundaries of the zodiac constellations.
                            </p>
                        </div>
                    </div>
                    <a href="#" class="text-gm-purple text-sm font-semibold hover:underline mt-auto card-link-target">Explore →</a>
                </div>

            </div>
        </div>
    </section>

    <!-- ==================== ASTROLOGY SECTION ==================== -->
    <section class="bg-gm-light py-8 md:py-10">
        <div class="max-w-6xl mx-auto px-6">
            <!-- Section Header with Solar System Animation -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-10 gap-4">
                <!-- Text (left side) -->
                <div class="md:max-w-lg">
                    <div class="mb-2">
                        <span class="text-xs font-semibold tracking-widest text-gray-400 uppercase">Astrology</span>
                    </div>
                    <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-3">
                        <span class="text-gm-purple">|</span> Astrology Tools & Resources
                    </h2>
                    <p class="text-gray-500 text-sm md:text-base">
                        Genetic Matrix bridges Human Design and astrology. Explore tools that bring additional depth to your chart readings.
                    </p>
                </div>
                <!-- Planet Transit Animation (right side, md+ screens) -->
                <div class="hidden md:block flex-shrink-0">
                    <svg width="340" height="130" viewBox="0 0 420 160" fill="none" style="overflow:visible" aria-hidden="true">
                        <!-- Three orbit rings (inner → outer) -->
                        <ellipse cx="210" cy="80" rx="75" ry="30" stroke="#6E5898" stroke-width="0.8" opacity="0.16" stroke-dasharray="3 5"/>
                        <ellipse cx="210" cy="80" rx="140" ry="52" stroke="#6E5898" stroke-width="1.1" opacity="0.20" stroke-dasharray="4 5"/>
                        <ellipse cx="210" cy="80" rx="200" ry="72" stroke="#6E5898" stroke-width="1.4" opacity="0.24" stroke-dasharray="6 5"/>
                        <!-- Sun (center) with pulsing glow -->
                        <circle cx="210" cy="80" r="18" fill="#E8961D" opacity="0.1">
                            <animate attributeName="r" values="18;24;18" dur="5s" repeatCount="indefinite"/>
                            <animate attributeName="opacity" values="0.1;0.04;0.1" dur="5s" repeatCount="indefinite"/>
                        </circle>
                        <circle cx="210" cy="80" r="10" fill="#E8961D" opacity="0.65"/>
                        <circle cx="210" cy="80" r="6" fill="#FBBF24" opacity="0.85"/>
                        <!-- Inner planet — Mercury -->
                        <g>
                            <animateMotion dur="12s" repeatCount="indefinite">
                                <mpath href="#orbit-inner"/>
                            </animateMotion>
                            <circle r="5" fill="#9080B1" opacity="0.08"/>
                            <circle r="3.5" fill="#9080B1" opacity="0.7"/>
                        </g>
                        <!-- Middle planet — Earth (green) -->
                        <g>
                            <animateMotion dur="22s" begin="-5s" repeatCount="indefinite">
                                <mpath href="#orbit-mid"/>
                            </animateMotion>
                            <circle r="12" fill="#54931E" opacity="0.06"/>
                            <circle r="5.5" fill="#54931E" opacity="0.6"/>
                        </g>
                        <!-- Outer planet — Saturn (with ring) -->
                        <g>
                            <animateMotion dur="35s" repeatCount="indefinite">
                                <mpath href="#orbit-outer"/>
                            </animateMotion>
                            <circle r="18" fill="#6E5898" opacity="0.08"/>
                            <circle r="8" fill="#6E5898" opacity="0.8"/>
                            <ellipse rx="13" ry="3" fill="none" stroke="#6E5898" stroke-width="1.2" opacity="0.5" transform="rotate(-25)"/>
                        </g>
                        <!-- Small moon on outer orbit -->
                        <circle r="3" fill="#AC94D8" opacity="0.5">
                            <animateMotion dur="25s" begin="-8s" repeatCount="indefinite">
                                <mpath href="#orbit-outer"/>
                            </animateMotion>
                        </circle>
                        <!-- Orbit path definitions -->
                        <path id="orbit-inner" d="M 135,80 A 75,30 0 1,1 285,80 A 75,30 0 1,1 135,80"/>
                        <path id="orbit-mid" d="M 70,80 A 140,52 0 1,1 350,80 A 140,52 0 1,1 70,80"/>
                        <path id="orbit-outer" d="M 10,80 A 200,72 0 1,1 410,80 A 200,72 0 1,1 10,80"/>
                    </svg>
                </div>
            </div>

            <!-- Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Zodiac Signs Card -->
                <div class="card-reveal card-link bg-white rounded-lg border border-gm-border p-6 hover:shadow-md hover:-translate-y-1 hover:border-gray-300 hover:bg-[#F5F3F8] transition-all duration-300 flex flex-col">
                    <div class="flex items-start gap-4 mb-4 flex-1">
                        <img src="assets/icon-zodiac.svg" alt="Zodiac Signs" class="w-16 h-16 flex-shrink-0">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-1">Zodiac Signs</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                The 12 zodiac signs — plus the controversial 13th sign Ophiuchus. Explore each sign's element, modality, ruling planet, and core characteristics.
                            </p>
                        </div>
                    </div>
                    <a href="astrology/zodiac-signs.html" class="text-gm-purple text-sm font-semibold hover:underline mt-auto card-link-target">Explore →</a>
                </div>

                <!-- Planets Card -->
                <div class="card-reveal card-link bg-white rounded-lg border border-gm-border p-6 hover:shadow-md hover:-translate-y-1 hover:border-gray-300 hover:bg-[#F5F3F8] transition-all duration-300 flex flex-col">
                    <div class="flex items-start gap-4 mb-4 flex-1">
                        <img src="assets/icon-planets.svg" alt="Planets" class="w-16 h-16 flex-shrink-0">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-1">Planets</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                From personal planets like the Sun and Moon to outer planets like Pluto — understand what each planetary body represents in your birth chart.
                            </p>
                        </div>
                    </div>
                    <a href="astrology/planets.html" class="text-gm-purple text-sm font-semibold hover:underline mt-auto card-link-target">Explore →</a>
                </div>

                <!-- Houses Card -->
                <div class="card-reveal card-link bg-white rounded-lg border border-gm-border p-6 hover:shadow-md hover:-translate-y-1 hover:border-gray-300 hover:bg-[#F5F3F8] transition-all duration-300 flex flex-col">
                    <div class="flex items-start gap-4 mb-4 flex-1">
                        <img src="assets/icon-houses.svg" alt="Houses" class="w-16 h-16 flex-shrink-0">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-1">Houses & House Systems</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                The 12 houses represent areas of life. Explore 10 house systems supported by Genetic Matrix — from Placidus and Koch to Whole Sign and Equal.
                            </p>
                        </div>
                    </div>
                    <a href="astrology/houses.html" class="text-gm-purple text-sm font-semibold hover:underline mt-auto card-link-target">Explore →</a>
                </div>

                <!-- Aspects Card -->
                <div class="card-reveal card-link bg-white rounded-lg border border-gm-border p-6 hover:shadow-md hover:-translate-y-1 hover:border-gray-300 hover:bg-[#F5F3F8] transition-all duration-300 flex flex-col">
                    <div class="flex items-start gap-4 mb-4 flex-1">
                        <img src="assets/icon-aspects.svg" alt="Aspects" class="w-16 h-16 flex-shrink-0">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-1">Aspects & Orbs</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                Angular relationships between planets — conjunctions, trines, squares, and more. Includes Genetic Matrix's exclusive True Astrology aspect analysis.
                            </p>
                        </div>
                    </div>
                    <a href="astrology/aspects.html" class="text-gm-purple text-sm font-semibold hover:underline mt-auto card-link-target">Explore →</a>
                </div>

                <!-- Asteroids Card -->
                <div class="card-reveal card-link bg-white rounded-lg border border-gm-border p-6 hover:shadow-md hover:-translate-y-1 hover:border-gray-300 hover:bg-[#F5F3F8] transition-all duration-300 flex flex-col">
                    <div class="flex items-start gap-4 mb-4 flex-1">
                        <img src="assets/icon-asteroids.svg" alt="Asteroids" class="w-16 h-16 flex-shrink-0">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-1">Asteroids & Planetoids</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                Ceres, Pallas, Juno, Vesta, and beyond — asteroids add nuance and specificity to chart readings, tracked in both tropical and sidereal coordinates.
                            </p>
                        </div>
                    </div>
                    <a href="astrology/asteroids.html" class="text-gm-purple text-sm font-semibold hover:underline mt-auto card-link-target">Explore →</a>
                </div>

                <!-- Fixed Stars Card -->
                <div class="card-reveal card-link bg-white rounded-lg border border-gm-border p-6 hover:shadow-md hover:-translate-y-1 hover:border-gray-300 hover:bg-[#F5F3F8] transition-all duration-300 flex flex-col">
                    <div class="flex items-start gap-4 mb-4 flex-1">
                        <img src="assets/icon-fixed-stars.svg" alt="Fixed Stars" class="w-16 h-16 flex-shrink-0 icon-twinkle">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-1">Fixed Stars</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                When planets conjunct fixed stars they add intensity and specificity. Explore the Royal Stars, Sirius, Spica, Algol, and hundreds more.
                            </p>
                        </div>
                    </div>
                    <a href="astrology/fixed-stars.html" class="text-gm-purple text-sm font-semibold hover:underline mt-auto card-link-target">Explore →</a>
                </div>

                <!-- Sabian Symbols Card -->
                <div class="card-reveal card-link bg-white rounded-lg border border-gm-border p-6 hover:shadow-md hover:-translate-y-1 hover:border-gray-300 hover:bg-[#F5F3F8] transition-all duration-300 flex flex-col">
                    <div class="flex items-start gap-4 mb-4 flex-1">
                        <img src="assets/icon-sabian.svg" alt="Sabian Symbols" class="w-16 h-16 flex-shrink-0">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-1">Sabian Symbols</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                Each of the 360 degrees of the zodiac carries a unique symbolic image. Genetic Matrix integrates Sabian Symbols directly into your chart reading.
                            </p>
                        </div>
                    </div>
                    <a href="#" class="text-gm-purple text-sm font-semibold hover:underline mt-auto card-link-target">Explore →</a><!-- Sabian page TBD -->
                </div>

                <!-- Astro Tarot Card -->
                <div class="card-reveal card-link bg-white rounded-lg border border-gm-border p-6 hover:shadow-md hover:-translate-y-1 hover:border-gray-300 hover:bg-[#F5F3F8] transition-all duration-300 flex flex-col">
                    <div class="flex items-start gap-4 mb-4 flex-1">
                        <img src="assets/icon-tarot.svg" alt="Astro Tarot" class="w-16 h-16 flex-shrink-0">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-1">Astro Tarot</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                Discover the deep connection between astrology and tarot. Genetic Matrix maps your natal chart placements to Major and Minor Arcana cards.
                            </p>
                        </div>
                    </div>
                    <a href="astrology/astro-tarot.html" class="text-gm-purple text-sm font-semibold hover:underline mt-auto card-link-target">Explore →</a>
                </div>

                <!-- Ayanamsha Card -->
                <div class="card-reveal card-link bg-white rounded-lg border border-gm-border p-6 hover:shadow-md hover:-translate-y-1 hover:border-gray-300 hover:bg-[#F5F3F8] transition-all duration-300 flex flex-col">
                    <div class="flex items-start gap-4 mb-4 flex-1">
                        <img src="assets/icon-ayanamsha.svg" alt="Ayanamsha" class="w-16 h-16 flex-shrink-0">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-1">Ayanamsha Systems</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                The angular difference between tropical and sidereal zodiacs. Explore 50+ ayanamsha systems supported by Genetic Matrix, from Lahiri to custom.
                            </p>
                        </div>
                    </div>
                    <a href="astrology/ayanamsha.html" class="text-gm-purple text-sm font-semibold hover:underline mt-auto card-link-target">Explore →</a>
                </div>

                <!-- Chinese Astrology Card -->
                <div class="card-reveal card-link bg-white rounded-lg border border-gm-border p-6 hover:shadow-md hover:-translate-y-1 hover:border-gray-300 hover:bg-[#F5F3F8] transition-all duration-300 flex flex-col">
                    <div class="flex items-start gap-4 mb-4 flex-1">
                        <img src="assets/icon-chinese.svg" alt="Chinese Astrology" class="w-16 h-16 flex-shrink-0">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-1">Chinese Astrology</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                The 12 animal signs, five elements, and yin-yang polarity. Genetic Matrix integrates Chinese astrology with Western systems for a multi-system view.
                            </p>
                        </div>
                    </div>
                    <a href="astrology/chinese-astrology.html" class="text-gm-purple text-sm font-semibold hover:underline mt-auto card-link-target">Explore →</a>
                </div>

            </div>
        </div>
    </section>

    <!-- ==================== CELEBRITY CHARTS SECTION ==================== -->
    <section class="py-10 md:py-14 bg-white">
        <div class="max-w-6xl mx-auto px-6">
            <div class="bg-gm-dark rounded-2xl p-10 md:p-14 text-center">
                <!-- Star Icon -->
                <img src="assets/icon-celebrity.svg" alt="" class="w-14 h-14 mb-4 brightness-0 invert mx-auto">
                <span class="text-xs font-semibold tracking-widest text-gm-pink uppercase mb-3 block">Celebrity Charts</span>
                <h2 class="text-2xl md:text-3xl font-bold text-white mb-4 leading-tight">
                    Explore 87,000+ Celebrity Human Design Charts
                </h2>
                <p class="text-gray-300 text-sm md:text-base leading-relaxed mb-8 max-w-2xl mx-auto">
                    The largest celebrity Human Design database. Every chart calculated
                    across multiple systems — filter by Type, Profile, Authority,
                    Definition, Sun Sign, Moon Sign, and more.
                </p>

                <!-- Category Icons (generic outline style) -->
                <div class="flex justify-center flex-wrap gap-6 md:gap-8 mb-3">
                    <!-- Star / Fame -->
                    <div class="flex flex-col items-center gap-1.5">
                        <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.4)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <polygon points="12,2 15.1,8.3 22,9.2 17,14.1 18.2,21 12,17.8 5.8,21 7,14.1 2,9.2 8.9,8.3"/>
                        </svg>
                        <span class="text-[10px] text-gray-400 uppercase tracking-wider">Film & TV</span>
                    </div>
                    <!-- Music note -->
                    <div class="flex flex-col items-center gap-1.5">
                        <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.4)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M9 18V5l12-2v13"/>
                            <circle cx="6" cy="18" r="3"/>
                            <circle cx="18" cy="16" r="3"/>
                        </svg>
                        <span class="text-[10px] text-gray-400 uppercase tracking-wider">Music</span>
                    </div>
                    <!-- Globe / World -->
                    <div class="flex flex-col items-center gap-1.5">
                        <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.4)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M2 12h20"/>
                            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10A15.3 15.3 0 0 1 12 2z"/>
                        </svg>
                        <span class="text-[10px] text-gray-400 uppercase tracking-wider">Politics</span>
                    </div>
                    <!-- Lightning / Sport -->
                    <div class="flex flex-col items-center gap-1.5">
                        <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.4)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <polygon points="13,2 3,14 12,14 11,22 21,10 12,10"/>
                        </svg>
                        <span class="text-[10px] text-gray-400 uppercase tracking-wider">Sports</span>
                    </div>
                    <!-- Lightbulb / Science -->
                    <div class="flex flex-col items-center gap-1.5">
                        <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.4)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M9 18h6"/>
                            <path d="M10 22h4"/>
                            <path d="M12 2a7 7 0 0 0-4 12.7V17h8v-2.3A7 7 0 0 0 12 2z"/>
                        </svg>
                        <span class="text-[10px] text-gray-400 uppercase tracking-wider">Science</span>
                    </div>
                    <!-- Book / Literature -->
                    <div class="flex flex-col items-center gap-1.5">
                        <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.4)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                            <path d="M4 4.5A2.5 2.5 0 0 1 6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15z"/>
                        </svg>
                        <span class="text-[10px] text-gray-400 uppercase tracking-wider">Authors</span>
                    </div>
                    <!-- Heart / Humanitarians -->
                    <div class="flex flex-col items-center gap-1.5">
                        <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.4)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1-1.1a5.5 5.5 0 0 0-7.8 7.8l1 1.1L12 21.3l7.8-7.8 1-1.1a5.5 5.5 0 0 0 0-7.8z"/>
                        </svg>
                        <span class="text-[10px] text-gray-400 uppercase tracking-wider">Leaders</span>
                    </div>
                </div>
                <p class="text-gray-400 text-xs mb-8">& 100s More</p>

                <!-- Stats -->
                <div class="flex justify-center gap-8 md:gap-16 mb-10">
                    <div>
                        <div class="text-2xl md:text-3xl font-bold text-gm-pink">87,000+</div>
                        <div class="text-xs text-white uppercase tracking-wider mt-1">Celebrities</div>
                    </div>
                    <div>
                        <div class="text-2xl md:text-3xl font-bold text-gm-pink">7</div>
                        <div class="text-xs text-white uppercase tracking-wider mt-1">Calculation<br>Systems</div>
                    </div>
                    <div>
                        <div class="text-2xl md:text-3xl font-bold text-gm-pink">500K+</div>
                        <div class="text-xs text-white uppercase tracking-wider mt-1">Chart Pages</div>
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="https://www.geneticmatrix.com/register/" class="btn-glow btn-scale bg-gm-green hover:bg-gm-green-dark text-white text-center font-semibold py-3.5 px-10 rounded-xl transition text-sm md:text-base min-w-[240px]">
                        Create Free Account
                    </a>
                    <a href="https://www.geneticmatrix.com/plans-features/" class="btn-scale border-2 border-white text-white text-center font-semibold py-3.5 px-10 rounded-xl hover:bg-white hover:text-gm-dark transition text-sm md:text-base min-w-[240px]">
                        See Our Plans
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== START WITH YOUR OWN CHART ==================== -->
    <section class="pb-14 md:pb-20 pt-4 bg-white">
        <div class="max-w-6xl mx-auto px-6">
            <div class="bg-[#ede8f5] rounded-2xl p-10 md:p-14 text-center">
                <h2 class="text-2xl md:text-3xl font-bold text-gm-dark mb-4">Start With Your Own Chart</h2>
                <p class="text-gray-600 text-sm md:text-base leading-relaxed mb-8 max-w-2xl mx-auto">
                    Everything on this page is free to read. To explore your own charts with the full
                    depth of these tools, create an account and choose the membership level that
                    fits your needs.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#" class="btn-scale bg-gm-dark text-white font-semibold py-4 px-10 rounded-xl hover:bg-gm-darker transition text-base md:text-lg">
                        Get Your Free Chart
                    </a>
                    <a href="#" class="btn-scale border-2 border-gm-dark text-gm-dark font-semibold py-4 px-10 rounded-xl hover:bg-gm-dark hover:text-white transition text-base md:text-lg">
                        See Our Plans
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== FOOTER ==================== -->
    <footer class="bg-[#d5d5d5] py-10">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 items-start">

                <!-- Left: Logo & Copyright -->
                <div class="text-center md:text-left">
                    <img src="assets/logo-footer.svg" alt="Genetic Matrix" class="h-9 mb-4 mx-auto md:mx-0">
                    <p class="text-sm text-gray-600 mb-1">&copy; 2026 Genetic Matrix LLC.</p>
                    <p class="text-sm text-gray-600 mb-2">All right reserved.</p>
                    <p class="text-sm">
                        <a href="#" class="text-gray-700 underline hover:text-gray-900">Privacy, Terms and Conditions</a>
                        <span class="mx-1">&bull;</span>
                        <a href="#" class="text-gray-700 underline hover:text-gray-900">FAQ</a>
                    </p>
                </div>

                <!-- Center: Newsletter (Shafik to wire up form backend) -->
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
                        <a href="https://www.facebook.com/GeneticMatrixx" title="Facebook" target="_blank" rel="noopener" class="hover:-translate-y-1 hover:opacity-70 transition-all duration-300">
                            <img src="assets/icon-fb.svg" alt="Facebook" class="w-10 h-10">
                        </a>
                        <a href="https://x.com/GeneticMatrix" title="X" target="_blank" rel="noopener" class="hover:-translate-y-1 hover:opacity-70 transition-all duration-300">
                            <img src="assets/icon-x.svg" alt="X" class="w-10 h-10">
                        </a>
                        <a href="https://www.instagram.com/genetic_matrix/" title="Instagram" target="_blank" rel="noopener" class="hover:-translate-y-1 hover:opacity-70 transition-all duration-300">
                            <img src="assets/icon-insta.svg" alt="Instagram" class="w-10 h-10">
                        </a>
                        <a href="https://www.youtube.com/@geneticmatrixhd" title="YouTube" target="_blank" rel="noopener" class="hover:-translate-y-1 hover:opacity-70 transition-all duration-300">
                            <img src="assets/icon-yt.svg" alt="YouTube" class="w-10 h-10">
                        </a>
                    </div>
                    <a href="#" class="text-sm font-semibold text-gray-800 underline hover:text-gm-dark uppercase tracking-wide">Get in Touch</a>
                </div>

            </div>
        </div>
    </footer>

    <!-- Card reveal on scroll -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const cards = document.querySelectorAll('.card-reveal');
            // Assign stagger delay per card within its grid row
            document.querySelectorAll('.grid').forEach(grid => {
                grid.querySelectorAll('.card-reveal').forEach((card, i) => {
                    card.style.transitionDelay = `${(i % 3) * 0.12}s`;
                });
            });
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    } else {
                        entry.target.classList.remove('visible');
                    }
                });
            }, { threshold: 0.1 });
            cards.forEach(card => observer.observe(card));
        });
    </script>
</body>
</html>
