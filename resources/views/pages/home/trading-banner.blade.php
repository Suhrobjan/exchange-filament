{{-- Ready to Start Trading CTA --}}
<section class="relative py-24 bg-[#0a1628] overflow-hidden border-y border-white/5">
    {{-- Background Glow --}}
    <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-emerald-500/20 to-transparent">
    </div>
    <div
        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full bg-[radial-gradient(circle_at_center,rgba(16,185,129,0.05),transparent_60%)]">
    </div>

    <div class="container-exchange relative z-10 text-center">
        <div
            class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs font-bold uppercase tracking-wider mb-8">
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
            {{ t('home.start_trading_today') }}
        </div>

        <h2 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-6 tracking-tight leading-tight">
            {{ t('home.ready_to_start') }}<br>
            <span
                class="text-emerald-500 underline decoration-white/10 underline-offset-8">{{ t('home.trading_question') }}</span>
        </h2>

        <p class="text-slate-300 text-lg md:text-xl max-w-2xl mx-auto mb-10 leading-relaxed font-medium">
            {{ t('home.cta_desc') }}
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-12">
            <a href="{{ route('accreditation') }}"
                class="w-full sm:w-auto px-10 py-4 bg-emerald-500 hover:bg-emerald-600 text-white font-black rounded-xl transition-all shadow-[0_15px_30px_rgba(16,185,129,0.3)] hover:-translate-y-1 active:scale-95 text-lg">
                {{ t('home.start_accreditation') }}
            </a>
            <a href="{{ route('contacts') }}"
                class="w-full sm:w-auto px-10 py-4 bg-white/5 hover:bg-white/10 border border-white/10 text-white font-black rounded-xl transition-all hover:-translate-y-1 active:scale-95 text-lg">
                {{ t('header.contacts') }}
            </a>
        </div>

        <div class="flex flex-wrap justify-center gap-8 md:gap-12">
            <div class="flex items-center gap-2 text-slate-400">
                <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-sm font-bold uppercase tracking-wide">{{ t('home.fast_registration') }}</span>
            </div>
            <div class="flex items-center gap-2 text-slate-400">
                <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-sm font-bold uppercase tracking-wide">{{ t('home.reliable_platform') }}</span>
            </div>
            <div class="flex items-center gap-2 text-slate-400">
                <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-sm font-bold uppercase tracking-wide">{{ t('home.advantage4_title') }}</span>
            </div>
        </div>
    </div>
</section>