{{-- Header - Glassmorphism Navigation with Ticker --}}
<header class="flex flex-col relative">
    {{-- TopBar is first - Highest priority --}}
    <div class="relative z-50">
        @include('components.topbar')
    </div>

    {{-- Main Navigation - Second priority --}}
    <nav x-data="{ mobileMenuOpen: false }"
        class="bg-[#0a1628] {{ request()->routeIs('home') ? 'lg:bg-[rgba(10,22,40,0.2)] lg:backdrop-blur-xl' : '' }} border-b border-white/5 transition-all duration-300 relative z-40">
        <div class="container-exchange">
            <div class="flex items-center justify-between h-[70px]">
                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <img src="/logo_universal_exchange.svg" alt="{{ t('footer.company_name') }}"
                        class="h-10 w-auto group-hover:scale-105 transition-transform">
                </a>

                {{-- Desktop Navigation (Mega Menu) --}}
                <div x-data="{ openMenu: null }" class="hidden lg:flex items-center gap-1 relative z-40"
                    @mouseleave="openMenu = null">
                    @php
                        $rootMenuItems = \App\Models\MenuItem::root()->active()->with('children')->orderBy('sort_order')->get();
                    @endphp

                    @foreach($rootMenuItems as $item)
                        @php /** @var \App\Models\MenuItem $item */ @endphp
                        @if($item->children->count() > 0)
                            <div class="relative group/menu">
                                <button @mouseenter="openMenu = '{{ $item->id }}'"
                                    class="px-4 py-6 text-[13px] font-black uppercase tracking-widest text-slate-300 hover:text-emerald-400 transition-all flex items-center gap-1.5 border-b-2 border-transparent hover:border-emerald-500/50"
                                    :class="{ 'text-emerald-400 border-emerald-500/50': openMenu === '{{ $item->id }}' }">
                                    {{ $item->title }}
                                    <svg class="w-2.5 h-2.5 transition-transform duration-300"
                                        :class="{ 'rotate-180': openMenu === '{{ $item->id }}' }" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>

                                {{-- Mega Menu Dropdown --}}
                                <div x-show="openMenu === '{{ $item->id }}'" x-cloak
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 -translate-y-4"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100 translate-y-0"
                                    x-transition:leave-end="opacity-0 -translate-y-4"
                                    class="absolute left-0 top-full pt-2 w-[350px] pointer-events-auto z-[100]"
                                    style="display: none;">
                                    <div
                                        class="bg-slate-900/95 backdrop-blur-2xl border border-white/5 rounded-2xl shadow-[0_20px_50px_rgba(0,0,0,0.5)] overflow-hidden">
                                        <div class="p-6 space-y-2">
                                            @foreach($item->children as $child)
                                                @php /** @var \App\Models\MenuItem $child */ @endphp
                                                <a href="{{ url($child->url) }}" target="{{ $child->target }}"
                                                    class="group/item flex items-start gap-4 p-3 rounded-xl hover:bg-white/5 transition-all">
                                                    <div
                                                        class="w-10 h-10 rounded-lg bg-emerald-500/10 flex items-center justify-center flex-shrink-0 group-hover/item:bg-emerald-500 transition-colors">
                                                        <svg class="w-5 h-5 text-emerald-400 group-hover/item:text-white"
                                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M9 5l7 7-7 7" />
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <div
                                                            class="text-sm font-bold text-white group-hover/item:text-emerald-400 transition-colors">
                                                            {{ $child->title }}
                                                        </div>
                                                        <div class="text-[11px] text-slate-500 mt-0.5">
                                                            {{ $child->description }}
                                                        </div>
                                                    </div>
                                                </a>
                                            @endforeach
                                        </div>
                                        <div class="bg-emerald-500/5 p-4 border-t border-white/5">
                                            <div
                                                class="flex items-center justify-between text-[10px] font-black uppercase tracking-widest text-emerald-400">
                                                <span>{{ t('footer.company_name') }} {{ date('Y') }}</span>
                                                <div class="flex gap-2">
                                                    <div class="w-1 h-1 rounded-full bg-emerald-500 animate-pulse"></div>
                                                    <span>LIVE DATA</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <a href="{{ url($item->url) }}" target="{{ $item->target }}"
                                class="px-4 py-6 text-[13px] font-black uppercase tracking-widest text-slate-300 hover:text-emerald-400 transition-all border-b-2 border-transparent hover:border-emerald-500/50">
                                {{ $item->title }}
                            </a>
                        @endif
                    @endforeach
                </div>

                {{-- Right Side: Search + CTA --}}
                <div class="flex items-center gap-6">
                    {{-- Search --}}
                    <button class="text-slate-300 hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>

                    {{-- CTA Button --}}
                    <a href="{{ route('accreditation') }}"
                        class="hidden md:flex items-center gap-2 px-6 py-2.5 bg-[#10b981] hover:bg-[#0da371] text-white font-semibold rounded-full transition-all shadow-[0_0_20px_rgba(16,185,129,0.3)] text-sm">
                        {{ t('header.accreditation') }}
                    </a>

                    {{-- Mobile Menu Button --}}
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden text-white relative w-6 h-6">
                        <span
                            class="absolute inset-0 flex flex-col items-center justify-center gap-1.5 transition-all duration-300"
                            :class="mobileMenuOpen ? 'opacity-0 rotate-90' : 'opacity-100'">
                            <span class="block w-6 h-0.5 bg-white rounded"></span>
                            <span class="block w-6 h-0.5 bg-white rounded"></span>
                            <span class="block w-6 h-0.5 bg-white rounded"></span>
                        </span>
                        <svg x-show="mobileMenuOpen" x-transition class="w-6 h-6" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Mobile Menu Panel --}}
        <div x-show="mobileMenuOpen" x-cloak x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-4" class="lg:hidden border-t border-white/5 bg-[#0a1628]"
            style="display: none;">
            <div class="container-exchange py-6">
                <div class="space-y-1">
                    @foreach($rootMenuItems ?? [] as $mItem)
                        @php /** @var \App\Models\MenuItem $mItem */ @endphp
                        @if($mItem->children->count() > 0)
                            <div x-data="{ open: false }">
                                <button @click="open = !open"
                                    class="w-full flex items-center justify-between py-3 px-4 text-sm font-bold uppercase tracking-wider text-slate-300 hover:text-emerald-400 rounded-xl hover:bg-white/5 transition-all">
                                    {{ $mItem->title }}
                                    <svg class="w-4 h-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div x-show="open" x-cloak x-collapse class="pl-4 space-y-1" style="display: none;">
                                    @foreach($mItem->children as $mChild)
                                        @php /** @var \App\Models\MenuItem $mChild */ @endphp
                                        <a href="{{ url($mChild->url) }}"
                                            class="block py-2.5 px-4 text-sm text-slate-400 hover:text-emerald-400 hover:bg-white/5 rounded-lg transition-all"
                                            @click="mobileMenuOpen = false">
                                            {{ $mChild->title }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <a href="{{ url($mItem->url) }}"
                                class="block py-3 px-4 text-sm font-bold uppercase tracking-wider text-slate-300 hover:text-emerald-400 rounded-xl hover:bg-white/5 transition-all"
                                @click="mobileMenuOpen = false">
                                {{ $mItem->title }}
                            </a>
                        @endif
                    @endforeach
                </div>

                {{-- Mobile CTA --}}
                <div class="mt-6 pt-6 border-t border-white/10">
                    <a href="{{ route('accreditation') }}"
                        class="flex items-center justify-center gap-2 w-full py-3 bg-emerald-500 hover:bg-emerald-600 text-white font-bold rounded-xl transition-all text-sm">
                        {{ t('header.accreditation') }}
                    </a>
                </div>
            </div>
        </div>
    </nav>

    {{-- Quotes Ticker Bar - Lower z-index than Nav --}}
    <div
        class="bg-[#0d1f3c] {{ request()->routeIs('home') ? 'lg:bg-[rgba(10,22,40,0.4)] lg:backdrop-blur-md' : '' }} border-b border-white/5 overflow-hidden relative z-10">
        <div class="quotes-ticker py-2">
            <div class="ticker-content flex items-center gap-8 animate-ticker whitespace-nowrap">
                @for($i = 0; $i < 2; $i++)
                    <div class="flex items-center gap-8">
                        @forelse($tickerQuotes ?? [] as $tq)
                            @php /** @var \App\Models\Quote $tq */ @endphp
                            <div class="flex items-center gap-3">
                                <span class="text-slate-400 text-sm">{{ $tq->commodity_name }}</span>
                                <span
                                    class="text-white font-mono font-semibold">{{ number_format((float) $tq->price, 0, ',', ' ') }}</span>
                                @if($tq->change_percent > 0)
                                    <span class="text-emerald-400 text-sm flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        +{{ $tq->change_percent }}%
                                    </span>
                                @elseif($tq->change_percent < 0)
                                    <span class="text-red-400 text-sm flex items-center gap-1">
                                        <svg class="w-3 h-3 rotate-180" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{ $tq->change_percent }}%
                                    </span>
                                @else
                                    <span class="text-slate-500 text-sm">0%</span>
                                @endif
                            </div>
                            <div class="w-px h-4 bg-slate-700"></div>
                        @empty
                            <span class="text-slate-500 text-sm">{{ t('header.quotes_loading') }}</span>
                        @endforelse
                    </div>
                @endfor
            </div>
        </div>
    </div>
</header>