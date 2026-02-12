<x-app :title="t('common.search_results', 'Результаты поиска') . ' — ' . t('footer.company_name')">
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
                <span class="text-emerald-400">{{ t('common.search', 'Поиск') }}</span>
            </nav>

            <div class="max-w-3xl">
                <h1 class="text-3xl lg:text-5xl font-black text-white mb-6 leading-tight tracking-tight">
                    {{ t('common.search_results', 'Результаты поиска') }}
                </h1>
                <p class="text-slate-300 text-lg font-medium leading-relaxed">
                    {{ t('common.search_query', 'По запросу') }}: <span class="text-emerald-400">"{{ $query }}"</span>
                </p>
            </div>
        </div>
    </section>

    {{-- Search Content --}}
    <section class="relative z-10 pb-24">
        <div class="container-exchange">
            <div class="max-w-4xl">
                {{-- Search Form --}}
                <div class="mb-12">
                    <form action="{{ route('search') }}" method="GET" class="relative group">
                        <input type="text" name="q" value="{{ $query }}"
                            placeholder="{{ t('common.search_placeholder', 'Что вы ищете?') }}"
                            class="w-full bg-white/5 border border-white/10 rounded-2xl px-8 py-6 text-white text-lg placeholder-slate-600 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all shadow-2xl">
                        <button type="submit"
                            class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-emerald-500 text-slate-950 rounded-xl flex items-center justify-center hover:bg-emerald-400 transition-colors group-hover:scale-110">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </form>
                </div>

                {{-- Results Stats --}}
                <div
                    class="mb-8 flex items-center justify-between text-slate-500 text-sm font-bold uppercase tracking-widest">
                    <span>
                        {{-- Here we would normally count results --}}
                        {{ t('common.nothing_found', 'Ничего не найдено') }}
                    </span>
                </div>

                {{-- Mockup / Empty State --}}
                <div
                    class="bg-white/5 border border-white/10 rounded-[2.5rem] p-12 lg:p-20 text-center backdrop-blur-xl">
                    <div
                        class="w-24 h-24 bg-white/5 rounded-full flex items-center justify-center mx-auto mb-8 border border-white/10 text-slate-400">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9.172 17.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-black text-white mb-4">
                        {{ t('common.no_search_results', 'К сожалению, по вашему запросу ничего не найдено') }}</h2>
                    <p class="text-slate-400 max-w-lg mx-auto leading-relaxed">
                        {{ t('common.search_tips', 'Попробуйте использовать более общие слова или проверьте правильность написания запроса.') }}
                    </p>
                    <div class="mt-12">
                        <a href="/"
                            class="inline-flex items-center gap-2 text-emerald-400 font-black uppercase tracking-widest hover:gap-3 transition-all">
                            {{ t('common.back_to_home', 'Вернуться на главную') }}
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app>