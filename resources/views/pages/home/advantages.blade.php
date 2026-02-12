{{-- Our Advantages Section --}}
<section class="py-24 bg-[#0a1628] relative overflow-hidden">
    <div class="container-exchange relative z-10">
        <div class="text-center mb-16">
            <div class="flex items-center gap-2 text-slate-300">
                <div class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></div>
                <span class="text-emerald-400 text-xs font-bold uppercase tracking-widest">{{ t('home.why_us') }}</span>
            </div>
            <h2 class="text-4xl lg:text-5xl font-black text-white tracking-tight">{{ t('home.advantages_title') }}</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            {{-- Advantage 1: Reliability --}}
            <div
                class="group p-8 rounded-3xl bg-white/5 border border-white/5 hover:bg-white/10 hover:border-emerald-500/30 transition-all duration-500 hover:-translate-y-2">
                <div
                    class="w-16 h-16 rounded-2xl bg-emerald-500/10 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">{{ t('home.advantage1_title') }}</h3>
                <p class="text-slate-300 text-sm leading-relaxed">
                    {{ t('home.advantage1_desc') }}
                </p>
            </div>

            {{-- Advantage 2: Transparency --}}
            <div
                class="group p-8 rounded-3xl bg-white/5 border border-white/5 hover:bg-white/10 hover:border-blue-500/30 transition-all duration-500 hover:-translate-y-2">
                <div
                    class="w-16 h-16 rounded-2xl bg-blue-500/10 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">{{ t('home.advantage2_title') }}</h3>
                <p class="text-slate-300 text-sm leading-relaxed">
                    {{ t('home.advantage2_desc') }}
                </p>
            </div>

            {{-- Advantage 3: Speed --}}
            <div
                class="group p-8 rounded-3xl bg-white/5 border border-white/5 hover:bg-white/10 hover:border-orange-500/30 transition-all duration-500 hover:-translate-y-2">
                <div
                    class="w-16 h-16 rounded-2xl bg-orange-500/10 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">{{ t('home.advantage3_title') }}</h3>
                <p class="text-slate-300 text-sm leading-relaxed">
                    {{ t('home.advantage3_desc') }}
                </p>
            </div>

            {{-- Advantage 4: Support --}}
            <div
                class="group p-8 rounded-3xl bg-white/5 border border-white/5 hover:bg-white/10 hover:border-indigo-500/30 transition-all duration-500 hover:-translate-y-2">
                <div
                    class="w-16 h-16 rounded-2xl bg-indigo-500/10 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.172l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">{{ t('home.advantage4_title') }}</h3>
                <p class="text-slate-300 text-sm leading-relaxed">
                    {{ t('home.advantage4_desc') }}
                </p>
            </div>
        </div>
    </div>
</section>