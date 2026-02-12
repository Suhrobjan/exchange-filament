<x-app :title="t('footer.sitemap', 'Карта сайта') . ' — ' . t('footer.company_name')">
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
                <span class="text-emerald-400">{{ t('footer.sitemap', 'Карта сайта') }}</span>
            </nav>

            <div class="max-w-3xl">
                <h1 class="text-4xl lg:text-6xl font-black text-white mb-6 leading-tight tracking-tight">
                    {{ t('footer.sitemap', 'Карта сайта') }}
                </h1>
                <div class="h-1.5 w-24 bg-gradient-to-r from-emerald-500 to-blue-500 rounded-full mb-8"></div>
            </div>
        </div>
    </section>

    {{-- Main Content --}}
    <section class="relative z-10 pb-24">
        <div class="container-exchange">
            <div class="bg-white/5 border border-white/5 rounded-[2.5rem] p-8 lg:p-16 backdrop-blur-xl">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 lg:gap-20">
                    {{-- About Section --}}
                    <div>
                        <h2 class="text-xl font-black text-white mb-6 uppercase tracking-wider flex items-center gap-3">
                            <span class="w-2 h-8 bg-emerald-500 rounded-full"></span>
                            {{ t('footer.company_info', 'О бирже') }}
                        </h2>
                        <ul class="space-y-4">
                            <li><a href="{{ route('about') }}"
                                    class="text-slate-400 hover:text-emerald-400 transition-colors">{{ t('footer.about') }}</a>
                            </li>
                            <li><a href="{{ route('management') }}"
                                    class="text-slate-400 hover:text-emerald-400 transition-colors">{{ t('footer.management') }}</a>
                            </li>
                            <li><a href="{{ route('shareholders') }}"
                                    class="text-slate-400 hover:text-emerald-400 transition-colors">{{ t('footer.shareholders') }}</a>
                            </li>
                            <li><a href="{{ route('regions') }}"
                                    class="text-slate-400 hover:text-emerald-400 transition-colors">{{ t('pages.regional_offices', 'Региональные офисы') }}</a>
                            </li>
                        </ul>
                    </div>

                    {{-- Trading Section --}}
                    <div>
                        <h2 class="text-xl font-black text-white mb-6 uppercase tracking-wider flex items-center gap-3">
                            <span class="w-2 h-8 bg-blue-500 rounded-full"></span>
                            {{ t('footer.trading', 'Торги') }}
                        </h2>
                        <ul class="space-y-4">
                            <li><a href="{{ route('quotes') }}"
                                    class="text-slate-400 hover:text-blue-400 transition-colors">{{ t('footer.quotes') }}</a>
                            </li>
                            <li><a href="{{ route('trading.calendar') }}"
                                    class="text-slate-400 hover:text-blue-400 transition-colors">{{ t('footer.trading_calendar') }}</a>
                            </li>
                            <li><a href="{{ route('trading.results') }}"
                                    class="text-slate-400 hover:text-blue-400 transition-colors">{{ t('footer.trading_results') }}</a>
                            </li>
                        </ul>
                    </div>

                    {{-- Participants Section --}}
                    <div>
                        <h2 class="text-xl font-black text-white mb-6 uppercase tracking-wider flex items-center gap-3">
                            <span class="w-2 h-8 bg-purple-500 rounded-full"></span>
                            {{ t('footer.participants', 'Участникам') }}
                        </h2>
                        <ul class="space-y-4">
                            <li><a href="{{ route('accreditation') }}"
                                    class="text-slate-400 hover:text-purple-400 transition-colors">{{ t('footer.accreditation') }}</a>
                            </li>
                            <li><a href="{{ route('brokers') }}"
                                    class="text-slate-400 hover:text-purple-400 transition-colors">{{ t('footer.brokers') }}</a>
                            </li>
                            <li><a href="{{ route('faq') }}"
                                    class="text-slate-400 hover:text-purple-400 transition-colors">{{ t('footer.faq') }}</a>
                            </li>
                        </ul>
                    </div>

                    {{-- Information Section --}}
                    <div>
                        <h2 class="text-xl font-black text-white mb-6 uppercase tracking-wider flex items-center gap-3">
                            <span class="w-2 h-8 bg-orange-500 rounded-full"></span>
                            {{ t('footer.information', 'Пресс-центр') }}
                        </h2>
                        <ul class="space-y-4">
                            <li><a href="{{ route('news') }}"
                                    class="text-slate-400 hover:text-orange-400 transition-colors">{{ t('common.news') }}</a>
                            </li>
                            <li><a href="{{ route('announcements') }}"
                                    class="text-slate-400 hover:text-orange-400 transition-colors">{{ t('home.announcements') }}</a>
                            </li>
                        </ul>
                    </div>

                    {{-- Legal Section --}}
                    <div>
                        <h2 class="text-xl font-black text-white mb-6 uppercase tracking-wider flex items-center gap-3">
                            <span class="w-2 h-8 bg-rose-500 rounded-full"></span>
                            {{ t('common.legal_info', 'Правовая информация') }}
                        </h2>
                        <ul class="space-y-4">
                            <li><a href="{{ route('disclosure') }}"
                                    class="text-slate-400 hover:text-rose-400 transition-colors">{{ t('footer.disclosure', 'Раскрытие информации') }}</a>
                            </li>
                            <li><a href="{{ route('documents') }}"
                                    class="text-slate-400 hover:text-rose-400 transition-colors">{{ t('footer.documents', 'Документы') }}</a>
                            </li>
                            <li><a href="{{ route('privacy') }}"
                                    class="text-slate-400 hover:text-rose-400 transition-colors">{{ t('common.privacy_policy', 'Политика конфиденциальности') }}</a>
                            </li>
                        </ul>
                    </div>

                    {{-- Support Section --}}
                    <div>
                        <h2 class="text-xl font-black text-white mb-6 uppercase tracking-wider flex items-center gap-3">
                            <span class="w-2 h-8 bg-amber-500 rounded-full"></span>
                            {{ t('footer.support', 'Поддержка') }}
                        </h2>
                        <ul class="space-y-4">
                            <li><a href="{{ route('contacts') }}"
                                    class="text-slate-400 hover:text-amber-400 transition-colors">{{ t('footer.contacts') }}</a>
                            </li>
                            <li><a href="/locale/ru"
                                    class="text-slate-400 hover:text-amber-400 transition-colors">Русский</a></li>
                            <li><a href="/locale/uz"
                                    class="text-slate-400 hover:text-amber-400 transition-colors">O'zbekcha</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app>