<x-app :title="t('header.documents') . ' — ' . t('footer.company_name')">
    {{-- Decorative Background --}}
    <div class="fixed inset-0 bg-[#0a1628] pointer-events-none z-0">
        <div class="absolute top-0 right-1/4 w-1/2 h-1/2 bg-blue-500/5 blur-[120px] rounded-full"></div>
        <div class="absolute bottom-0 left-1/4 w-1/2 h-1/2 bg-emerald-500/5 blur-[120px] rounded-full"></div>
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
                <span class="text-emerald-400">{{ t('header.documents') }}</span>
            </nav>

            <div class="max-w-3xl">
                <h1 class="text-4xl lg:text-6xl font-black text-white mb-6 leading-tight tracking-tight">
                    {{ t('header.documents') }}
                </h1>
                <div class="h-1.5 w-24 bg-gradient-to-r from-emerald-500 to-blue-500 rounded-full mb-8"></div>
                <p class="text-slate-300 text-lg lg:text-xl font-medium leading-relaxed">
                    {{ t('pages.documents_subtitle', 'Регламентирующие документы, тарифы и правила проведения торгов на бирже.') }}
                </p>
            </div>
        </div>
    </section>

    {{-- Documents Grid --}}
    <section class="relative z-10 pb-24">
        <div class="container-exchange">
            {{-- Categories --}}
            <div class="flex flex-wrap gap-3 mb-12">
                <button
                    class="px-6 py-2.5 rounded-xl text-[11px] font-black uppercase tracking-widest bg-emerald-500 text-slate-950 shadow-[0_0_20px_rgba(16,185,129,0.3)] transition-all">
                    {{ t('common.all_documents', 'Все документы') }}
                </button>
                @foreach(['trading_rules', 'tariffs', 'application_forms', 'reports'] as $cat)
                    <button
                        class="px-6 py-2.5 rounded-xl text-[11px] font-black uppercase tracking-widest bg-white/5 text-slate-400 border border-white/5 hover:bg-white/10 hover:text-white transition-all">
                        {{ t('documents.' . $cat) }}
                    </button>
                @endforeach
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $documents = [
                        ['title' => 'Правила проведения биржевых торгов', 'category' => 'Правила', 'date' => '2026-01-15', 'size' => '2.4 MB', 'type' => 'pdf'],
                        ['title' => 'Тарифы на услуги биржи', 'category' => 'Тарифы', 'date' => '2026-01-10', 'size' => '845 KB', 'type' => 'pdf'],
                        ['title' => 'Заявление на аккредитацию (юр. лица)', 'category' => 'Формы', 'date' => '2025-12-20', 'size' => '156 KB', 'type' => 'docx'],
                        ['title' => 'Заявление на аккредитацию (физ. лица)', 'category' => 'Формы', 'date' => '2025-12-20', 'size' => '124 KB', 'type' => 'docx'],
                        ['title' => 'Регламент клиринга и расчётов', 'category' => 'Правила', 'date' => '2025-11-15', 'size' => '1.8 MB', 'type' => 'pdf'],
                        ['title' => 'Годовой отчёт 2025', 'category' => 'Отчёты', 'date' => '2025-03-01', 'size' => '5.2 MB', 'type' => 'pdf'],
                    ];
                @endphp

                @foreach($documents as $doc)
                    <div
                        class="group bg-white/5 border border-white/5 rounded-[2rem] p-8 hover:bg-white/10 hover:border-emerald-500/30 transition-all duration-500 flex flex-col h-full">
                        <div class="flex items-center justify-between gap-4 mb-6">
                            <span
                                class="px-3 py-1 bg-emerald-500/10 text-emerald-400 text-[10px] font-black uppercase tracking-widest rounded-full border border-emerald-500/20">
                                {{ $doc['category'] }}
                            </span>
                            <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest italic">
                                {{ $doc['date'] }}
                            </span>
                        </div>

                        <div class="flex items-start gap-5 mb-8">
                            <div
                                class="w-14 h-14 rounded-2xl bg-white/5 flex items-center justify-center shrink-0 border border-white/10 group-hover:scale-110 group-hover:bg-emerald-500 group-hover:text-slate-950 transition-all duration-500">
                                @if($doc['type'] === 'pdf')
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                @else
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                @endif
                            </div>
                            <div>
                                <h3
                                    class="text-lg font-black text-white group-hover:text-emerald-400 transition-colors leading-snug">
                                    {{ $doc['title'] }}
                                </h3>
                                <p class="text-xs text-slate-500 mt-2 font-bold uppercase tracking-widest">
                                    {{ $doc['size'] }}</p>
                            </div>
                        </div>

                        <a href="#"
                            class="mt-auto w-full flex items-center justify-center gap-3 py-4 bg-white/5 text-slate-300 rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-emerald-500 hover:text-slate-950 transition-all duration-500 shadow-xl group/btn">
                            <span>{{ t('common.download') }}</span>
                            <svg class="w-4 h-4 group-hover/btn:translate-y-0.5 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-app>