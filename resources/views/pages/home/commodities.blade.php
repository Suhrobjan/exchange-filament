{{-- Popular Commodities Section --}}
<section class="relative py-12 bg-gradient-to-b from-[#0a1628] to-[#0a1628] overflow-hidden">
    {{-- Decorative SVG Background - Blended with Hero --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        {{-- Faded continuation of Hero waves/grid if needed --}}
        <div class="absolute top-0 left-0 w-full h-24 bg-gradient-to-b from-transparent to-transparent opacity-50">
        </div>

        <svg class="absolute -top-24 right-0 w-2/3 h-[150%] opacity-20" viewBox="0 0 400 600">
            <defs>
                <radialGradient id="grad-blend" cx="50%" cy="0%" r="100%">
                    <stop offset="0%" style="stop-color:#10b981;stop-opacity:0.3" />
                    <stop offset="100%" style="stop-color:#0a1628;stop-opacity:0" />
                </radialGradient>
            </defs>
            <path d="M400,0 L400,600 L0,600 Q200,300 150,0 Z" fill="url(#grad-blend)" />
        </svg>
    </div>

    <div class="container-exchange relative z-10">
        {{-- Section Header --}}
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-white tracking-tight">{{ t('home.popular_commodities') }}</h2>
            <div class="flex items-center gap-2">
                <button id="prevCommodity"
                    class="w-10 h-10 rounded-full bg-white/5 hover:bg-white/10 flex items-center justify-center transition-all border border-white/5">
                    <svg class="w-5 h-5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button id="nextCommodity"
                    class="w-10 h-10 rounded-full bg-white/5 hover:bg-white/10 flex items-center justify-center transition-all border border-white/5">
                    <svg class="w-5 h-5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- Commodities Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            {{-- Cotton Card --}}
            <div
                class="group relative overflow-hidden rounded-2xl bg-white/5 border border-white/5 hover:border-emerald-500/30 transition-all duration-500 hover:shadow-[0_20px_40px_-15px_rgba(16,185,129,0.2)]">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent z-10">
                </div>
                <img src="https://images.unsplash.com/photo-1615485290382-441e4d049cb5?w=400&h=300&fit=crop"
                    alt="Cotton"
                    class="w-full h-32 object-cover group-hover:scale-110 transition-transform duration-700">
                <div class="relative z-20 p-5 -mt-8">
                    <h3 class="text-white font-semibold text-base group-hover:text-emerald-400 transition-colors">
                        {{ t('commodities.cotton') }}
                        (Cotton)
                    </h3>
                    <div class="flex items-baseline gap-2 mt-1">
                        <span class="text-xl font-bold text-white font-mono">1,250</span>
                        <span class="text-slate-500 text-xs">USD/т</span>
                        <span class="text-emerald-400 text-sm ml-auto font-bold">+0.8%</span>
                    </div>
                </div>
            </div>

            {{-- Wheat Card --}}
            <div
                class="group relative overflow-hidden rounded-2xl bg-white/5 border border-white/5 hover:border-emerald-500/30 transition-all duration-500 hover:shadow-[0_20px_40px_-15px_rgba(16,185,129,0.2)]">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent z-10">
                </div>
                <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?w=400&h=300&fit=crop" alt="Wheat"
                    class="w-full h-32 object-cover group-hover:scale-110 transition-transform duration-700">
                <div class="relative z-20 p-5 -mt-8">
                    <h3 class="text-white font-semibold text-base group-hover:text-emerald-400 transition-colors">
                        {{ t('commodities.wheat') }} (Wheat)
                    </h3>
                    <div class="flex items-baseline gap-2 mt-1">
                        <span class="text-xl font-bold text-white font-mono">340.00</span>
                        <span class="text-slate-500 text-xs">USD/т</span>
                        <span class="text-emerald-400 text-sm ml-auto font-bold">+1.8%</span>
                    </div>
                </div>
            </div>

            {{-- Oil Card --}}
            <div
                class="group relative overflow-hidden rounded-2xl bg-white/5 border border-white/5 hover:border-emerald-500/30 transition-all duration-500 hover:shadow-[0_20px_40px_-15px_rgba(16,185,129,0.2)]">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent z-10">
                </div>
                <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=400&h=300&fit=crop" alt="Oil"
                    class="w-full h-32 object-cover group-hover:scale-110 transition-transform duration-700">
                <div class="relative z-20 p-5 -mt-8">
                    <h3 class="text-white font-semibold text-base group-hover:text-emerald-400 transition-colors">
                        {{ t('commodities.oil') }}
                        (Oil)
                    </h3>
                    <div class="flex items-baseline gap-2 mt-1">
                        <span class="text-xl font-bold text-white font-mono">78.50</span>
                        <span class="text-slate-500 text-xs">USD/барр</span>
                        <span class="text-emerald-400 text-sm ml-auto font-bold">+2.1%</span>
                    </div>
                </div>
            </div>

            {{-- Metals Card --}}
            <div
                class="group relative overflow-hidden rounded-2xl bg-white/5 border border-white/5 hover:border-emerald-500/30 transition-all duration-500 hover:shadow-[0_20px_40px_-15px_rgba(16,185,129,0.2)]">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent z-10">
                </div>
                <img src="https://images.unsplash.com/photo-1610375461246-83df859d849d?w=400&h=300&fit=crop"
                    alt="Metals"
                    class="w-full h-32 object-cover group-hover:scale-110 transition-transform duration-700">
                <div class="relative z-20 p-5 -mt-8">
                    <h3 class="text-white font-semibold text-base group-hover:text-emerald-400 transition-colors">
                        {{ t('commodities.metals') }} (Metals)
                    </h3>
                    <div class="flex items-baseline gap-2 mt-1">
                        <span class="text-xl font-bold text-white font-mono">1,945</span>
                        <span class="text-slate-500 text-xs">USD/oz</span>
                        <span class="text-red-400 text-sm ml-auto font-bold">-0.2%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>