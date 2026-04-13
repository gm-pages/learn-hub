<?php
/**
 * Tailwind Nav Partial for Celebrity Category Templates
 *
 * INSTALLATION (Shafik):
 *   1. Copy this file to: /wp-content/themes/geneticmatrix/partials/gm-tailwind-nav.php
 *   2. In your celebrity category template, replace the existing Bootstrap nav with:
 *        <?php include get_template_directory() . '/partials/gm-tailwind-nav.php'; ?>
 *   3. Add Tailwind CDN + flag-icon CSS to your template's <head>:
 *        <script src="https://cdn.tailwindcss.com"></script>
 *        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css">
 *   4. Also add this Tailwind config AFTER the CDN script:
 *        <script>
 *        tailwind.config = {
 *          theme: {
 *            extend: {
 *              colors: {
 *                'gm-purple': '#6E5898','gm-purple-light':'#9080B1','gm-purple-soft':'#AC94D8',
 *                'gm-dark':'#3C2864','gm-green':'#54931E','gm-green-dark':'#468018',
 *                'gm-gray':'#707070','gm-light':'#F7F8F9','gm-card-active':'#F4F0FC',
 *                'gm-text-dark':'#1A1A2E','gm-text':'#444444','gm-text-light':'#949494'
 *              }
 *            }
 *          }
 *        }
 *        </script>
 *
 * NOTES:
 *   - Auth state (logged in/out, cart count) is handled via WordPress PHP, not JS fetch
 *   - Language switcher uses WPML's icl_get_languages() so links go to translated WP pages
 *   - Visual structure matches Learn Hub static nav exactly
 *   - Asset paths point to /learn-hub/assets/ (shared icons live there)
 */

// Auth state
$is_logged_in = is_user_logged_in();
$cart_count = 0;
if (function_exists('WC') && WC()->cart) {
    $cart_count = WC()->cart->get_cart_contents_count();
}

// Language data
$lang_data = [
    'en' => ['name' => 'English',    'flag' => 'gb'],
    'de' => ['name' => 'Deutsch',    'flag' => 'de'],
    'es' => ['name' => 'Español',    'flag' => 'es'],
    'fr' => ['name' => 'Français',   'flag' => 'fr'],
    'it' => ['name' => 'Italiano',   'flag' => 'it'],
    'nl' => ['name' => 'Nederland',  'flag' => 'nl'],
    'pt' => ['name' => 'Português',  'flag' => 'pt'],
];

// Current language from WPML
$current_lang = 'en';
if (defined('ICL_LANGUAGE_CODE')) {
    $current_lang = ICL_LANGUAGE_CODE;
    if ($current_lang === 'pt-pt') $current_lang = 'pt';
}

// WPML language URLs for the current page
$wpml_languages = [];
if (function_exists('icl_get_languages')) {
    $langs = icl_get_languages('skip_missing=0&orderby=code');
    if ($langs) {
        foreach ($langs as $code => $info) {
            $norm = ($code === 'pt-pt') ? 'pt' : $code;
            $wpml_languages[$norm] = $info['url'];
        }
    }
}
// Fallback if WPML not available
if (empty($wpml_languages)) {
    foreach ($lang_data as $code => $info) {
        $wpml_languages[$code] = ($code === 'en') ? '/' : '/' . $code . '/';
    }
}

$current_name = isset($lang_data[$current_lang]) ? $lang_data[$current_lang]['name'] : 'English';
$current_flag = isset($lang_data[$current_lang]) ? $lang_data[$current_lang]['flag'] : 'gb';

// Nav string translations
$nav_strings = [
    'en' => ['free_chart'=>'Free Chart','learn'=>'Learn','learn_hub'=>'Learn Hub','hd_edu'=>'HD and Astrology education','celeb_search'=>'Celebrity Search','celeb_desc'=>'88,600+ celebrity charts','dictionary'=>'Dictionary','dict_desc'=>'HD and Astrology terms','our_plans'=>'Our Plans','sign_in'=>'Sign In','register'=>'Register','log_out'=>'Log Out','my_hub'=>'My Hub'],
    'de' => ['free_chart'=>'Kostenlose Grafik','learn'=>'Lernen','learn_hub'=>'Lernzentrum','hd_edu'=>'HD und Astrologie Bildung','celeb_search'=>'Promi-Suche','celeb_desc'=>'88.600+ Prominenten-Charts','dictionary'=>'Wörterbuch','dict_desc'=>'HD und Astrologie Begriffe','our_plans'=>'Unsere Tarife','sign_in'=>'Anmelden','register'=>'Registrieren','log_out'=>'Abmelden','my_hub'=>'Mein Hub'],
    'es' => ['free_chart'=>'Gráfico Gratis','learn'=>'Aprender','learn_hub'=>'Centro de Aprendizaje','hd_edu'=>'Educación de DH y Astrología','celeb_search'=>'Búsqueda de Celebridades','celeb_desc'=>'Más de 88.600 cartas de celebridades','dictionary'=>'Diccionario','dict_desc'=>'Términos de DH y Astrología','our_plans'=>'Nuestros Planes','sign_in'=>'Iniciar Sesión','register'=>'Registrarse','log_out'=>'Cerrar Sesión','my_hub'=>'Mi Hub'],
    'fr' => ['free_chart'=>'Graphique Gratuit','learn'=>'Apprendre','learn_hub'=>"Centre d'Apprentissage",'hd_edu'=>'Éducation HD et Astrologie','celeb_search'=>'Recherche de Célébrités','celeb_desc'=>'Plus de 88 600 chartes de célébrités','dictionary'=>'Dictionnaire','dict_desc'=>'Termes HD et Astrologie','our_plans'=>'Nos Forfaits','sign_in'=>'Se Connecter','register'=>"S'inscrire",'log_out'=>'Se Déconnecter','my_hub'=>'Mon Hub'],
    'it' => ['free_chart'=>'Grafico Gratuito','learn'=>'Impara','learn_hub'=>'Centro Didattico','hd_edu'=>'Formazione HD e Astrologia','celeb_search'=>'Ricerca Celebrità','celeb_desc'=>'Oltre 88.600 carte di celebrità','dictionary'=>'Dizionario','dict_desc'=>'Termini HD e Astrologia','our_plans'=>'I Nostri Piani','sign_in'=>'Accedi','register'=>'Registrati','log_out'=>'Esci','my_hub'=>'Il Mio Hub'],
    'nl' => ['free_chart'=>'Gratis grafiek','learn'=>'Leren','learn_hub'=>'Leercentrum','hd_edu'=>'HD en Astrologie educatie','celeb_search'=>'Beroemdheden zoeken','celeb_desc'=>'88.600+ beroemdheden charts','dictionary'=>'Woordenboek','dict_desc'=>'HD en Astrologie termen','our_plans'=>'Onze plannen','sign_in'=>'Inloggen','register'=>'Registreren','log_out'=>'Uitloggen','my_hub'=>'Mijn Hub'],
    'pt' => ['free_chart'=>'Gráfico Grátis','learn'=>'Aprender','learn_hub'=>'Centro de Aprendizagem','hd_edu'=>'Educação HD e Astrologia','celeb_search'=>'Pesquisa de Celebridades','celeb_desc'=>'Mais de 88.600 cartas de celebridades','dictionary'=>'Dicionário','dict_desc'=>'Termos HD e Astrologia','our_plans'=>'Os Nossos Planos','sign_in'=>'Iniciar Sessão','register'=>'Registar','log_out'=>'Terminar Sessão','my_hub'=>'O Meu Hub'],
];
$t = isset($nav_strings[$current_lang]) ? $nav_strings[$current_lang] : $nav_strings['en'];
?>

    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50" style="font-family: Bilo, Segoe UI, Roboto, Helvetica Neue, Arial, sans-serif;">
        <div class="w-full px-[30px] flex items-center h-[80px]">
            <!-- Logo -->
            <a href="<?php echo esc_url(home_url('/')); ?>" class="flex-shrink-0">
                <img src="/learn-hub/assets/logo.svg" alt="Genetic Matrix - Know you" class="h-8 md:h-14">
            </a>

            <!-- Mobile: Cart + Hamburger -->
            <div class="lg:hidden flex items-center gap-4">
                <a href="<?php echo esc_url(wc_get_cart_url()); ?>" title="Cart" class="px-3 relative">
                    <img src="/learn-hub/assets/icon-cart.svg" alt="Cart" class="h-5 w-auto">
                    <?php if ($cart_count > 0): ?>
                    <span class="absolute top-[2px] left-[55%] -translate-x-1/2 text-[#54931E] font-bold text-[10px] leading-none"><?php echo $cart_count; ?></span>
                    <?php endif; ?>
                </a>
                <button id="gm-hamburger" class="flex items-center justify-center w-10 h-10 rounded-lg hover:bg-gray-100 transition">
                    <svg class="w-6 h-6 text-[#707070]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>

            <!-- Desktop Nav -->
            <div class="hidden lg:flex flex-1 items-center justify-end">
                <?php if ($is_logged_in): ?>
                <!-- Calendar (logged in only) -->
                <a href="<?php echo esc_url(home_url('/calendar/')); ?>" class="mx-3 flex items-center justify-center w-9 h-9 rounded-lg border border-[#dee2e6] hover:border-[#6E5898]/30 hover:bg-gray-50 transition" title="Calendar">
                    <img src="/learn-hub/assets/icon-calendar.svg" alt="Calendar" class="h-5 w-5">
                </a>
                <?php endif; ?>
                <!-- Reports -->
                <a href="<?php echo esc_url(home_url('/geneticmatrix-reports/')); ?>" class="mx-3 flex items-center justify-center w-9 h-9 rounded-lg border border-[#dee2e6] hover:border-[#6E5898]/30 hover:bg-gray-50 transition" title="Reports">
                    <img src="/learn-hub/assets/icon-report.svg" alt="Reports" class="h-6 w-6">
                </a>
                <!-- Talking Charts -->
                <a href="<?php echo esc_url(home_url('/talking-charts/')); ?>" class="mx-3 flex items-center justify-center w-9 h-9 rounded-lg border border-[#dee2e6] hover:border-[#6E5898]/30 hover:bg-gray-50 transition" title="Talking Charts">
                    <img src="/learn-hub/assets/icon-talking-chart.svg" alt="Talking Charts" class="h-5 w-5">
                </a>
                <?php if (!$is_logged_in): ?>
                <!-- Free Chart -->
                <a href="#" class="px-3 text-[#707070] hover:text-gray-900 text-base font-medium" data-action="free-chart-popup"><?php echo esc_html($t['free_chart']); ?></a>
                <?php endif; ?>
                <!-- Learn Dropdown -->
                <div class="relative group">
                    <button class="px-3 text-[#6E5898] hover:text-[#3C2864] text-base font-semibold flex items-center gap-1">
                        <?php echo esc_html($t['learn']); ?>
                        <svg class="w-3 h-3 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="absolute top-full left-1/2 -translate-x-1/2 mt-4 w-[420px] bg-white rounded-xl shadow-xl border border-gray-100 p-3 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                        <div class="grid grid-cols-2 gap-1">
                            <a href="/learn-hub/" class="flex items-start gap-3 p-1 rounded-lg hover:bg-[#F7F8F9] transition">
                                <div class="w-7 h-7 bg-[#F4F0FC] rounded-md flex items-center justify-center flex-shrink-0 mt-0.5"><img src="/learn-hub/assets/menu-icon-hub.svg" alt="" class="w-6 h-6"></div>
                                <div><div class="text-sm font-semibold text-gray-800"><?php echo esc_html($t['learn_hub']); ?></div><div class="text-xs text-[#949494] mt-0.5"><?php echo esc_html($t['hd_edu']); ?></div></div>
                            </a>
                            <a href="/learn-hub/celebrities/" class="flex items-start gap-3 p-1 rounded-lg hover:bg-[#F7F8F9] transition">
                                <div class="w-7 h-7 bg-[#F4F0FC] rounded-md flex items-center justify-center flex-shrink-0 mt-0.5"><img src="/learn-hub/assets/menu-icon-celebrity.svg" alt="" class="w-6 h-6"></div>
                                <div><div class="text-sm font-semibold text-gray-800"><?php echo esc_html($t['celeb_search']); ?></div><div class="text-xs text-[#949494] mt-0.5"><?php echo esc_html($t['celeb_desc']); ?></div></div>
                            </a>
                            <a href="/dictionary/dictionary.html" class="flex items-start gap-3 p-1 rounded-lg hover:bg-[#F7F8F9] transition">
                                <div class="w-7 h-7 bg-[#F4F0FC] rounded-md flex items-center justify-center flex-shrink-0 mt-0.5"><img src="/learn-hub/assets/menu-icon-dictionary.svg" alt="" class="w-6 h-6"></div>
                                <div><div class="text-sm font-semibold text-gray-800"><?php echo esc_html($t['dictionary']); ?></div><div class="text-xs text-[#949494] mt-0.5"><?php echo esc_html($t['dict_desc']); ?></div></div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Our Plans -->
                <a href="<?php echo esc_url(home_url('/plans-features/')); ?>" class="px-3 text-[#707070] hover:text-gray-900 text-base font-medium"><?php echo esc_html($t['our_plans']); ?></a>
                <!-- Cart -->
                <a href="<?php echo esc_url(wc_get_cart_url()); ?>" title="Cart" class="px-3 relative">
                    <img src="/learn-hub/assets/icon-cart.svg" alt="Cart" class="h-5 w-auto">
                    <?php if ($cart_count > 0): ?>
                    <span class="absolute top-[2px] left-[55%] -translate-x-1/2 text-[#54931E] font-bold text-[10px] leading-none"><?php echo $cart_count; ?></span>
                    <?php endif; ?>
                </a>
                <!-- Language Switcher -->
                <div class="relative group px-3">
                    <button class="flex items-center gap-2 text-[#707070] hover:text-gray-900 text-base">
                        <svg class="w-3 h-3 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        <span><?php echo esc_html($current_name); ?></span>
                        <span class="flag-icon flag-icon-<?php echo esc_attr($current_flag); ?>"></span>
                    </button>
                    <div class="absolute top-full right-0 mt-4 w-44 bg-white rounded-xl shadow-xl border border-gray-100 py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                        <?php
                        // Reverse order to match static nav (PT, NL, IT, FR, ES, DE, EN)
                        $display_order = ['pt','nl','it','fr','es','de','en'];
                        foreach ($display_order as $code):
                            $info = $lang_data[$code];
                            $url = isset($wpml_languages[$code]) ? $wpml_languages[$code] : '#';
                            $active = ($code === $current_lang) ? ' text-[#6E5898] font-semibold' : '';
                        ?>
                        <a href="<?php echo esc_url($url); ?>" class="flex items-center gap-3 px-4 py-2 text-sm text-[#707070] hover:bg-[#F7F8F9] hover:text-[#6E5898] transition<?php echo $active; ?>"><span class="flag-icon flag-icon-<?php echo esc_attr($info['flag']); ?>"></span> <?php echo esc_html($info['name']); ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php if (!$is_logged_in): ?>
                <!-- Logged OUT -->
                <div class="flex items-center">
                    <a href="<?php echo esc_url(home_url('/my-account/')); ?>" class="px-3 text-[#707070] hover:text-gray-900 text-base font-medium"><?php echo esc_html($t['sign_in']); ?></a>
                    <a href="<?php echo esc_url(home_url('/register/')); ?>" class="bg-red-500 hover:bg-red-600 text-white text-base font-semibold px-5 py-2 rounded-full transition"><?php echo esc_html($t['register']); ?></a>
                </div>
                <?php else: ?>
                <!-- Logged IN -->
                <div class="flex items-center">
                    <a href="<?php echo esc_url(wp_logout_url(home_url('/logout-1/'))); ?>" class="px-3 text-[#707070] hover:text-gray-900 text-base font-medium"><?php echo esc_html($t['log_out']); ?></a>
                    <a href="<?php echo esc_url(home_url('/user-home/')); ?>" class="bg-[#54931E] hover:bg-[#468018] text-white text-sm font-semibold px-5 py-2 rounded-full transition"><?php echo esc_html($t['my_hub']); ?></a>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="gm-mobile-menu" style="display:none" class="lg:hidden bg-white border-t border-gray-100 px-6 py-4">
            <div class="flex flex-col gap-3">
                <a href="/learn-hub/" class="flex items-center gap-3 py-2 text-sm font-semibold text-gray-800 hover:text-[#6E5898] transition">
                    <img src="/learn-hub/assets/menu-icon-hub.svg" alt="" class="w-5 h-5"> <?php echo esc_html($t['learn_hub']); ?>
                </a>
                <a href="/learn-hub/celebrities/" class="flex items-center gap-3 py-2 text-sm font-semibold text-gray-800 hover:text-[#6E5898] transition">
                    <img src="/learn-hub/assets/menu-icon-celebrity.svg" alt="" class="w-5 h-5"> <?php echo esc_html($t['celeb_search']); ?>
                </a>
                <a href="/dictionary/dictionary.html" class="flex items-center gap-3 py-2 text-sm font-semibold text-gray-800 hover:text-[#6E5898] transition">
                    <img src="/learn-hub/assets/menu-icon-dictionary.svg" alt="" class="w-5 h-5"> <?php echo esc_html($t['dictionary']); ?>
                </a>
                <div class="border-t border-gray-100 my-1"></div>
                <?php if (!$is_logged_in): ?>
                <a href="#" class="py-2 text-sm text-[#707070] hover:text-gray-900 transition" data-action="free-chart-popup"><?php echo esc_html($t['free_chart']); ?></a>
                <?php endif; ?>
                <a href="<?php echo esc_url(home_url('/plans-features/')); ?>" class="py-2 text-sm text-[#707070] hover:text-gray-900 transition"><?php echo esc_html($t['our_plans']); ?></a>
                <div class="border-t border-gray-100 my-1"></div>
                <?php if ($is_logged_in): ?>
                <a href="<?php echo esc_url(home_url('/user-home/')); ?>" class="py-2 text-sm font-semibold text-[#54931E] hover:text-[#468018] transition"><?php echo esc_html($t['my_hub']); ?></a>
                <a href="<?php echo esc_url(wp_logout_url(home_url('/logout-1/'))); ?>" class="py-2 text-sm text-[#707070] hover:text-gray-900 transition"><?php echo esc_html($t['log_out']); ?></a>
                <?php else: ?>
                <a href="<?php echo esc_url(home_url('/my-account/')); ?>" class="py-2 text-sm text-[#707070] hover:text-gray-900 transition"><?php echo esc_html($t['sign_in']); ?></a>
                <a href="<?php echo esc_url(home_url('/register/')); ?>" class="py-2 text-sm font-semibold text-red-500 hover:text-red-600 transition"><?php echo esc_html($t['register']); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <script>(function(){var h=document.getElementById("gm-hamburger");var m=document.getElementById("gm-mobile-menu");if(h&&m){h.onclick=function(){m.style.display=m.style.display==="block"?"none":"block";};}})();</script>
