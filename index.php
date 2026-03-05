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
    <section class="py-12 md:py-16 text-center bg-white">
        <div class="max-w-3xl mx-auto px-6">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Learn Human Design & Astrology</h1>
            <p class="text-gray-500 text-base md:text-lg leading-relaxed">
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
                <div class="bg-white rounded-lg border border-gm-border p-6 hover:shadow-md transition flex flex-col">
                    <div class="flex items-start gap-4 mb-4 flex-1">
                        <img src="assets/icon-type.svg" alt="Type" class="w-16 h-16 flex-shrink-0">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-1">Type</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                Human Design System works primarily through your Bodygraph. It divides all of us into four Types: Generator, Manifesting Generator, Projector, Manifestor, and Reflector.
                            </p>
                        </div>
                    </div>
                    <a href="#" class="text-gm-purple text-sm font-semibold hover:underline mt-auto">Resources &gt;</a>
                </div>

                <!-- Profile Card -->
                <div class="bg-white rounded-lg border border-gm-border p-6 hover:shadow-md transition flex flex-col">
                    <div class="flex items-start gap-4 mb-4 flex-1">
                        <img src="assets/icon-profile.svg" alt="Profile" class="w-16 h-16 flex-shrink-0">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-1">Profile</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                Your Profile — your Personality is a combination of two numbers that create your Profile. It describes the costume you wear to fulfill your life's purpose and direction.
                            </p>
                        </div>
                    </div>
                    <a href="profiles/index.php" class="text-gm-purple text-sm font-semibold hover:underline mt-auto">Resources &gt;</a>
                </div>

                <!-- Centers Card -->
                <div class="bg-white rounded-lg border border-gm-border p-6 hover:shadow-md transition flex flex-col">
                    <div class="flex items-start gap-4 mb-4 flex-1">
                        <img src="assets/icon-centres.svg" alt="Centers" class="w-16 h-16 flex-shrink-0">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-1">Centers</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                The Bodygraph contains nine Centers. Understanding your defined, undefined, and open Centers reveals your authority, definition, and conditioning.
                            </p>
                        </div>
                    </div>
                    <a href="#" class="text-gm-purple text-sm font-semibold hover:underline mt-auto">Resources &gt;</a>
                </div>

                <!-- Variables & Arrows Card -->
                <div class="bg-white rounded-lg border border-gm-border p-6 hover:shadow-md transition flex flex-col">
                    <div class="flex items-start gap-4 mb-4 flex-1">
                        <img src="assets/icon-arrows.svg" alt="Variables & Arrows" class="w-16 h-16 flex-shrink-0">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-1">Variables & Arrows <span class="text-gm-pink text-xs font-bold">(NEW)</span></h3>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                The four arrows at the top of your Bodygraph reveal your Variables — the deepest layer of differentiation in Human Design, covering digestion, environment, perspective, and motivation.
                            </p>
                        </div>
                    </div>
                    <a href="#" class="text-gm-purple text-sm font-semibold hover:underline mt-auto">Resources &gt;</a>
                </div>

                <!-- Sleep Design Card -->
                <div class="bg-white rounded-lg border border-gm-border p-6 hover:shadow-md transition flex flex-col">
                    <div class="flex items-start gap-4 mb-4 flex-1">
                        <img src="assets/icon-moon.svg" alt="Sleep Design" class="w-16 h-16 flex-shrink-0">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-1">Sleep Design</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                Your design functions at night. When you sleep, your conditioning field changes. Explore how the transit field affects your rest and regeneration.
                            </p>
                        </div>
                    </div>
                    <a href="#" class="text-gm-purple text-sm font-semibold hover:underline mt-auto">Resources &gt;</a>
                </div>

                <!-- Animal Human Design Card -->
                <div class="bg-white rounded-lg border border-gm-border p-6 hover:shadow-md transition flex flex-col">
                    <div class="flex items-start gap-4 mb-4 flex-1">
                        <img src="assets/icon-paw.svg" alt="Animal Human Design" class="w-16 h-16 flex-shrink-0">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-1">Animal Human Design</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                Explore the Human Design of animals. Discover how pets and animals carry their own unique energetic blueprint.
                            </p>
                        </div>
                    </div>
                    <a href="#" class="text-gm-purple text-sm font-semibold hover:underline mt-auto">Resources &gt;</a>
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
                <div class="bg-gm-light rounded-lg border border-gm-border p-6 hover:shadow-md transition border-t-4 border-t-gm-pink flex flex-col">
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
                    <a href="#" class="text-gm-purple text-sm font-semibold hover:underline mt-auto">Resources &gt;</a>
                </div>

                <!-- Sidereal Calculation Card -->
                <div class="bg-gm-light rounded-lg border border-gm-border p-6 hover:shadow-md transition border-t-4 border-t-[#2ea89e] flex flex-col">
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
                    <a href="#" class="text-gm-purple text-sm font-semibold hover:underline mt-auto">Resources &gt;</a>
                </div>

                <!-- Draconic Zodiac Card -->
                <div class="bg-gm-light rounded-lg border border-gm-border p-6 hover:shadow-md transition border-t-4 border-t-[#c94040] flex flex-col">
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
                    <a href="#" class="text-gm-purple text-sm font-semibold hover:underline mt-auto">Resources &gt;</a>
                </div>

                <!-- True Sidereal Variants Card -->
                <div class="bg-gm-light rounded-lg border border-gm-border p-6 hover:shadow-md transition border-t-4 border-t-[#d46ba3] flex flex-col">
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
                    <a href="#" class="text-gm-purple text-sm font-semibold hover:underline mt-auto">Resources &gt;</a>
                </div>

                <!-- 13-Sign Sidereal Card -->
                <div class="bg-gm-light rounded-lg border border-gm-border p-6 hover:shadow-md transition border-t-4 border-t-[#3d5a96] flex flex-col">
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
                    <a href="#" class="text-gm-purple text-sm font-semibold hover:underline mt-auto">Resources &gt;</a>
                </div>

            </div>
        </div>
    </section>

    <!-- ==================== ASTROLOGY SECTION ==================== -->
    <section class="bg-gm-light py-12 md:py-16">
        <div class="max-w-6xl mx-auto px-6">
            <!-- Section Header -->
            <div class="mb-2">
                <span class="text-xs font-semibold tracking-widest text-gray-400 uppercase">Astrology</span>
            </div>
            <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-3">
                <span class="text-gm-purple">|</span> Astrology Tools & Resources
            </h2>
            <p class="text-gray-500 text-sm md:text-base max-w-3xl mb-10">
                Genetic Matrix bridges Human Design and astrology. Explore tools that bring additional depth to your chart readings.
            </p>

            <!-- Single Card -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white rounded-lg border border-gm-border p-6 hover:shadow-md transition flex flex-col">
                    <div class="flex items-start gap-4 mb-4 flex-1">
                        <img src="assets/icon-sabian.svg" alt="Sabian Symbols" class="w-16 h-16 flex-shrink-0">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-1">Sabian Symbols</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                Genetic Matrix integrates Sabian Symbols into your chart. Each of the 360 degrees of the zodiac carries a unique symbolic image that adds poetic depth to your reading.
                            </p>
                        </div>
                    </div>
                    <a href="#" class="text-gm-purple text-sm font-semibold hover:underline mt-auto">Resources &gt;</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== CELEBRITY CHARTS SECTION ==================== -->
    <section class="py-10 md:py-14 bg-white">
        <div class="max-w-6xl mx-auto px-6">
            <div class="bg-gm-dark rounded-2xl p-10 md:p-14">
                <div class="flex flex-col lg:flex-row items-center gap-10 lg:gap-16">
                    <!-- Left Content -->
                    <div class="flex-1 text-white">
                        <!-- Star Icon -->
                        <img src="assets/icon-celebrity.svg" alt="" class="w-14 h-14 mb-4 brightness-0 invert">
                        <span class="text-xs font-semibold tracking-widest text-gm-pink uppercase mb-3 block">Celebrity Charts</span>
                        <h2 class="text-2xl md:text-3xl font-bold mb-4 leading-tight">
                            Explore 87,000+ Celebrity<br>Human Design Charts
                        </h2>
                        <p class="text-gray-300 text-sm md:text-base leading-relaxed mb-8 max-w-lg">
                            Browse the largest celebrity Human Design database. Filter by
                            Type, Profile, Authority, Definition, Sun Sign, Moon Sign, and
                            more. Every celebrity chart calculated across multiple systems.
                        </p>

                        <!-- Stats -->
                        <div class="flex items-start gap-8 md:gap-12">
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
                    </div>

                    <!-- Right Buttons -->
                    <div class="flex flex-col gap-4 w-full lg:w-auto justify-center">
                        <a href="#" class="bg-[#b8a9d4] border-2 border-[#b8a9d4] text-white text-center font-semibold py-3.5 px-8 rounded-xl hover:bg-[#a090c0] transition text-sm md:text-base min-w-[240px]">
                            Browse Celebrities
                        </a>
                        <a href="#" class="border-2 border-white text-white text-center font-semibold py-3.5 px-8 rounded-xl hover:bg-white hover:text-gm-dark transition text-sm md:text-base min-w-[240px]">
                            Browse by Type
                        </a>
                        <a href="#" class="border-2 border-white text-white text-center font-semibold py-3.5 px-8 rounded-xl hover:bg-white hover:text-gm-dark transition text-sm md:text-base min-w-[240px]">
                            Browse by Profile
                        </a>
                    </div>
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
                    <a href="#" class="bg-gm-dark text-white font-semibold py-4 px-10 rounded-xl hover:bg-gm-darker transition text-base md:text-lg">
                        Get Your Free Chart
                    </a>
                    <a href="#" class="border-2 border-gm-dark text-gm-dark font-semibold py-4 px-10 rounded-xl hover:bg-gm-dark hover:text-white transition text-base md:text-lg">
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
                        <a href="https://www.facebook.com/GeneticMatrixx" title="Facebook" target="_blank" rel="noopener">
                            <img src="assets/icon-fb.svg" alt="Facebook" class="w-10 h-10">
                        </a>
                        <a href="https://x.com/GeneticMatrix" title="X" target="_blank" rel="noopener">
                            <img src="assets/icon-x.svg" alt="X" class="w-10 h-10">
                        </a>
                        <a href="https://www.instagram.com/genetic_matrix/" title="Instagram" target="_blank" rel="noopener">
                            <img src="assets/icon-insta.svg" alt="Instagram" class="w-10 h-10">
                        </a>
                        <a href="https://www.youtube.com/@geneticmatrixhd" title="YouTube" target="_blank" rel="noopener">
                            <img src="assets/icon-yt.svg" alt="YouTube" class="w-10 h-10">
                        </a>
                    </div>
                    <a href="#" class="text-sm font-semibold text-gray-800 underline hover:text-gm-dark uppercase tracking-wide">Get in Touch</a>
                </div>

            </div>
        </div>
    </footer>

</body>
</html>
