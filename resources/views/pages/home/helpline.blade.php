{{-- Helpline & Quick Info Section --}}
<section class="bg-[#0a1628] pb-24">
    {{-- Red Helpline Banner --}}
    <div class="bg-gradient-to-r from-rose-600 via-rose-500 to-rose-600 py-8 mb-16 relative overflow-hidden group">
        <div
            class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-10">
        </div>
        <div class="container-exchange relative z-10">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-8">
                <div class="flex items-center gap-6">
                    <div
                        class="w-16 h-16 rounded-2xl bg-white/20 flex items-center justify-center backdrop-blur-md border border-white/30 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-rose-100 text-xs font-bold uppercase tracking-widest mb-1">
                            {{ t('topbar.hotline') }}
                        </div>
                        <div class="text-4xl font-black text-white leading-none">1198</div>
                    </div>
                    <div class="hidden md:block w-px h-12 bg-white/20 mx-4"></div>
                    <p class="text-rose-100 text-sm font-medium max-w-xs hidden md:block">
                        {{ t('home.hotline_desc') }}
                    </p>
                </div>

                <a href="#"
                    class="px-8 py-4 bg-white text-rose-600 font-black rounded-xl hover:bg-rose-50 transition-all shadow-xl hover:-translate-y-1 active:scale-95">
                    {{ t('home.learn_more') }}
                </a>
            </div>
        </div>
    </div>

    {{-- Bottom Utility Cards --}}
    <div class="container-exchange">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- Card 1: Accreditation --}}
            <a href="#"
                class="group p-8 rounded-3xl bg-white/5 border border-white/5 hover:bg-white/10 hover:border-emerald-500/30 transition-all duration-500">
                <div
                    class="w-14 h-14 rounded-2xl bg-emerald-500/10 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2 group-hover:text-emerald-400 transition-colors">
                    {{ t('home.get_accredited') }}</h3>
                <p class="text-slate-500 text-sm mb-6 leading-relaxed">{{ t('home.get_accredited_desc') }}</p>
                <div class="text-emerald-400 text-xs font-bold uppercase tracking-widest flex items-center gap-2">
                    {{ t('home.learn_more') }}
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </div>
            </a>

            {{-- Card 2: Disclosure --}}
            <a href="#"
                class="group p-8 rounded-3xl bg-white/5 border border-white/5 hover:bg-white/10 hover:border-blue-500/30 transition-all duration-500">
                <div
                    class="w-14 h-14 rounded-2xl bg-blue-500/10 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2 group-hover:text-blue-400 transition-colors">
                    {{ t('footer.disclosure') }}</h3>
                <p class="text-slate-500 text-sm mb-6 leading-relaxed">{{ t('home.disclosure_desc') }}</p>
                <div class="text-blue-400 text-xs font-bold uppercase tracking-widest flex items-center gap-2">
                    {{ t('footer.documents') }}
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </div>
            </a>

            {{-- Card 3: FAQ --}}
            <a href="#"
                class="group p-8 rounded-3xl bg-white/5 border border-white/5 hover:bg-white/10 hover:border-orange-500/30 transition-all duration-500">
                <div
                    class="w-14 h-14 rounded-2xl bg-orange-500/10 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2 group-hover:text-orange-400 transition-colors">
                    {{ t('home.faq_title') }}</h3>
                <p class="text-slate-500 text-sm mb-6 leading-relaxed">{{ t('home.faq_desc') }}
                </p>
                <div class="text-orange-400 text-xs font-bold uppercase tracking-widest flex items-center gap-2">
                    {{ t('home.view_faq') }}
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </div>
            </a>
        </div>
    </div>
</section>