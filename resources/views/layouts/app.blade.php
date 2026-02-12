<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth" x-data="accessibilityPanel()" :class="{ 
    'accessibility-high-contrast': highContrast,
    'accessibility-large-font': largeFont,
    'accessibility-no-images': noImages,
    'accessibility-mode': accessibilityMode
}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Республиканская универсальная агропромышленная биржа' }}</title>
    <meta name="description"
        content="{{ $description ?? 'Официальный сайт Республиканской универсальной агропромышленной биржи Узбекистана. Котировки, торги, аккредитация.' }}">

    {{-- Favicon --}}
    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap"
        rel="stylesheet">

    {{-- Styles --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    {{-- Accessibility CSS --}}
    <style>
        [x-cloak] { display: none !important; }
        /* Версия для слабовидящих - ПКМ 176/355/81 */
        .accessibility-high-contrast {
            filter: contrast(1.4) !important;
        }

        .accessibility-high-contrast body {
            background: #000 !important;
            color: #fff !important;
        }

        .accessibility-high-contrast a {
            color: #ff0 !important;
        }

        .accessibility-high-contrast .btn,
        .accessibility-high-contrast button {
            background: #fff !important;
            color: #000 !important;
            border: 2px solid #fff !important;
        }

        .accessibility-large-font {
            font-size: 120% !important;
        }

        .accessibility-large-font h1 {
            font-size: 2.5rem !important;
        }

        .accessibility-large-font h2 {
            font-size: 2rem !important;
        }

        .accessibility-large-font h3 {
            font-size: 1.5rem !important;
        }

        .accessibility-large-font p,
        .accessibility-large-font li,
        .accessibility-large-font td {
            font-size: 1.25rem !important;
            line-height: 1.8 !important;
        }

        .accessibility-no-images img,
        .accessibility-no-images svg,
        .accessibility-no-images [style*="background-image"] {
            visibility: hidden !important;
        }

        .accessibility-no-images [style*="background-image"] {
            background-image: none !important;
            background-color: #333 !important;
        }

        .accessibility-mode .hero-finance-bg,
        .accessibility-mode .price-ticker,
        .accessibility-mode .floating-tickers {
            display: none !important;
        }
    </style>

    @stack('styles')
</head>

<body class="font-sans antialiased bg-[#0a1628] text-white selection:bg-emerald-500/30 selection:text-emerald-400">
    {{-- Accessibility Panel moved to TopBar (GOST compliant) --}}

    {{-- Skip to Content (Accessibility) --}}
    <a href="#main-content"
        class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 focus:z-[9999] focus:bg-white focus:px-4 focus:py-2 focus:rounded focus:shadow-lg">
        Перейти к основному содержанию
    </a>

    {{-- Navigation Group (Header contains TopBar) --}}
    <div
        class="{{ request()->routeIs('home') ? 'lg:absolute lg:top-0 lg:left-0 lg:right-0 lg:z-[1000]' : 'relative z-[1000]' }}">
        @include('components.header')
    </div>

    {{-- Main Content --}}
    <main id="main-content" role="main">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    @include('components.footer')

    {{-- Back to Top Button --}}
    <button x-data="{ show: false }" x-init="window.addEventListener('scroll', () => show = window.scrollY > 500)"
        x-show="show" x-transition @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
        class="fixed bottom-8 right-8 z-50 w-12 h-12 rounded-full bg-primary-600 text-white shadow-lg hover:bg-primary-700 transition-colors flex items-center justify-center"
        aria-label="Вернуться наверх">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
        </svg>
    </button>

    {{-- Alpine.js Accessibility Data --}}
    <script>
        function accessibilityPanel() {
            return {
                accessibilityMode: localStorage.getItem('accessibilityMode') === 'true',
                highContrast: localStorage.getItem('highContrast') === 'true',
                largeFont: localStorage.getItem('largeFont') === 'true',
                noImages: localStorage.getItem('noImages') === 'true',

                toggleAccessibility() {
                    this.accessibilityMode = !this.accessibilityMode;
                    localStorage.setItem('accessibilityMode', this.accessibilityMode);
                    if (!this.accessibilityMode) {
                        this.highContrast = false;
                        this.largeFont = false;
                        this.noImages = false;
                        localStorage.setItem('highContrast', false);
                        localStorage.setItem('largeFont', false);
                        localStorage.setItem('noImages', false);
                    }
                },

                toggleHighContrast() {
                    this.highContrast = !this.highContrast;
                    localStorage.setItem('highContrast', this.highContrast);
                },

                toggleLargeFont() {
                    this.largeFont = !this.largeFont;
                    localStorage.setItem('largeFont', this.largeFont);
                },

                toggleNoImages() {
                    this.noImages = !this.noImages;
                    localStorage.setItem('noImages', this.noImages);
                }
            }
        }
    </script>

    @livewireScripts
    @stack('scripts')
</body>

</html>