<x-app :title="t('footer.shareholders', 'Акционеры') . ' — ' . t('footer.company_name')">
    {{-- Decorative Background --}}
    <div class="fixed inset-0 bg-[#0a1628] pointer-events-none z-0">
        <div class="absolute top-0 right-1/4 w-1/2 h-1/2 bg-emerald-500/5 blur-[120px] rounded-full"></div>
        <div class="absolute bottom-1/4 left-1/4 w-1/2 h-1/2 bg-blue-500/5 blur-[120px] rounded-full"></div>
    </div>

    {{-- Page Header --}}
    <section class="relative z-10 pt-16 pb-20 overflow-hidden">
        <div class="container-exchange">
            {{-- Breadcrumbs --}}
            <nav class="flex items-center gap-3 text-xs font-bold uppercase tracking-widest mb-10">
                <a href="/" class="text-slate-500 hover:text-emerald-400 transition-colors">{{ t('common.home') }}</a>
                <svg class="w-3 h-3 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
                </svg>
                <span class="text-emerald-400">{{ t('footer.shareholders', 'Акционеры') }}</span>
            </nav>

            <div class="max-w-3xl">
                <h1 class="text-4xl lg:text-6xl font-black text-white mb-6 leading-tight tracking-tight">
                    {{ t('footer.shareholders', 'Акционеры') }}
                </h1>
                <div class="h-1.5 w-24 bg-gradient-to-r from-emerald-500 to-blue-500 rounded-full mb-8"></div>
                <p class="text-slate-300 text-lg lg:text-xl font-medium leading-relaxed">
                    {{ t('pages.shareholders_subtitle', 'Информация для акционеров и инвесторов: корпоративное управление, отчетность и дивидендная политика.') }}
                </p>
            </div>
        </div>
    </section>

    {{-- Main Content --}}
    <section class="relative z-10 pb-24">
        <div class="container-exchange">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                {{-- Left Side: Info & Documents --}}
                <div class="lg:col-span-8 space-y-12">
                    {{-- Share Capital Structure --}}
                    <div class="bg-white/5 border border-white/5 rounded-[2.5rem] p-8 lg:p-12 backdrop-blur-xl">
                        <h2 class="text-2xl lg:text-3xl font-black text-white mb-8 tracking-tight">
                            {{ t('pages.share_capital_structure', 'Структура уставного капитала') }}
                        </h2>

                        <div class="space-y-6">
                            <div
                                class="p-6 rounded-2xl bg-white/5 border border-white/5 flex items-center justify-between">
                                <span
                                    class="text-slate-300 font-medium">{{ t('pages.total_shares', 'Общее количество акций') }}</span>
                                <span class="text-white font-black">100 000 000 шт.</span>
                            </div>
                            <div
                                class="p-6 rounded-2xl bg-white/5 border border-white/5 flex items-center justify-between">
                                <span
                                    class="text-slate-300 font-medium">{{ t('pages.nominal_value', 'Номинальная стоимость') }}</span>
                                <span class="text-white font-black">1 000 сум</span>
                            </div>
                            <div
                                class="p-6 rounded-2xl bg-white/5 border border-white/5 flex items-center justify-between">
                                <span
                                    class="text-slate-300 font-medium">{{ t('pages.authorized_capital', 'Уставный фонд') }}</span>
                                <span class="text-white font-black">100 000 000 000 сум</span>
                            </div>
                        </div>
                    </div>

                    {{-- Important Links --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <a href="{{ route('disclosure') }}"
                            class="group p-8 rounded-[2rem] bg-emerald-500/10 border border-emerald-500/20 hover:border-emerald-500/50 transition-all">
                            <div
                                class="w-12 h-12 rounded-2xl bg-emerald-500/20 flex items-center justify-center text-emerald-400 mb-6 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-black text-white mb-2">
                                {{ t('footer.disclosure', 'Раскрытие информации') }}
                            </h3>
                            <p class="text-emerald-100/60 text-sm italic">{{ t('common.learn_more', 'Подробнее') }} →
                            </p>
                        </a>

                        <a href="{{ route('documents') }}"
                            class="group p-8 rounded-[2rem] bg-blue-500/10 border border-blue-500/20 hover:border-blue-500/50 transition-all">
                            <div
                                class="w-12 h-12 rounded-2xl bg-blue-500/20 flex items-center justify-center text-blue-400 mb-6 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-black text-white mb-2">{{ t('footer.documents', 'Документы') }}</h3>
                            <p class="text-blue-100/60 text-sm italic">{{ t('common.learn_more', 'Подробнее') }} →</p>
                        </a>
                    </div>
                </div>

                {{-- Right Side: Contact & Support --}}
                <div class="lg:col-span-4">
                    <div
                        class="bg-white/5 border border-white/5 rounded-[2.5rem] p-8 lg:p-10 backdrop-blur-xl sticky top-8">
                        <h3 class="text-2xl font-black text-white mb-8 tracking-tight">
                            {{ t('pages.investor_relations', 'Для инвесторов') }}
                        </h3>

                        <div class="space-y-8">
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-10 h-10 rounded-xl bg-emerald-500/10 flex items-center justify-center text-emerald-400 shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-500 mb-1">
                                        {{ t('footer.phone_label', 'Телефон') }}
                                    </p>
                                    <a href="tel:+998712070033"
                                        class="text-white font-bold hover:text-emerald-400 transition-colors">
                                        +998 71 207-00-33
                                    </a>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div
                                    class="w-10 h-10 rounded-xl bg-blue-500/10 flex items-center justify-center text-blue-400 shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-500 mb-1">
                                        Email
                                    </p>
                                    <a href="mailto:invest@uzex.uz"
                                        class="text-white font-bold hover:text-blue-400 transition-colors">
                                        invest@uzex.uz
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="mt-12 p-6 bg-white/5 rounded-2xl border border-white/5">
                            <p class="text-[11px] text-slate-300 leading-relaxed italic">
                                {{ t('pages.shareholders_notice', 'По вопросам выплаты дивидендов, пожалуйста, обращайтесь в отдел по работе с акционерами.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app>