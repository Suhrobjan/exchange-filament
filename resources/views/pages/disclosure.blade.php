<x-app :title="t('header.disclosure') . ' — ' . t('footer.company_name')">
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
                <span class="text-emerald-400">{{ t('header.disclosure') }}</span>
            </nav>

            <div class="max-w-3xl">
                <h1 class="text-4xl lg:text-6xl font-black text-white mb-6 leading-tight tracking-tight">
                    {{ t('header.disclosure') }}
                </h1>
                <div class="h-1.5 w-24 bg-gradient-to-r from-emerald-500 to-blue-500 rounded-full mb-8"></div>
                <p class="text-slate-300 text-lg lg:text-xl font-medium leading-relaxed">
                    {{ t('pages.disclosure_subtitle', 'Официальные документы и отчетность АО «УзРТСБ» в соответствии с требованиями законодательства.') }}
                </p>
            </div>
        </div>
    </section>

    {{-- Icon Hub --}}
    <section class="relative z-10 -mt-12 pb-16">
        <div class="container-exchange">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                @php
                    $categories = [
                        ['id' => 'charter', 'icon' => 'heroicon-m-document-text', 'title' => t('disclosure.charter', 'Устав'), 'color' => 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20'],
                        ['id' => 'annual_report', 'icon' => 'heroicon-m-chart-bar', 'title' => t('disclosure.annual_reports', 'Годовые отчеты'), 'color' => 'bg-blue-500/10 text-blue-400 border-blue-500/20'],
                        ['id' => 'quarterly_report', 'icon' => 'heroicon-m-calendar-days', 'title' => t('disclosure.quarterly_reports', 'Квартальные отчеты'), 'color' => 'bg-indigo-500/10 text-indigo-400 border-indigo-500/20'],
                        ['id' => 'material_fact', 'icon' => 'heroicon-m-exclamation-triangle', 'title' => t('disclosure.material_facts', 'Существенные факты'), 'color' => 'bg-orange-500/10 text-orange-400 border-orange-500/20'],
                        ['id' => 'license', 'icon' => 'heroicon-m-check-badge', 'title' => t('disclosure.licenses', 'Лицензии'), 'color' => 'bg-purple-500/10 text-purple-400 border-purple-500/20'],
                        ['id' => 'financial_statement', 'icon' => 'heroicon-m-banknotes', 'title' => t('disclosure.financial_reports', 'Фин. отчетность'), 'color' => 'bg-slate-500/10 text-slate-400 border-slate-500/20'],
                    ];
                @endphp

                @foreach($categories as $cat)
                    <a href="{{ route('documents') }}?category={{ $cat['id'] }}"
                        class="group bg-white/5 backdrop-blur-xl rounded-[2rem] p-6 border border-white/5 hover:bg-white/10 hover:border-emerald-500/30 transition-all duration-500 text-center flex flex-col items-center">
                        <div
                            class="w-14 h-14 {{ $cat['color'] }} rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform border">
                            <x-dynamic-component :component="$cat['icon']" class="w-7 h-7" />
                        </div>
                        <span
                            class="text-[11px] font-black text-white uppercase tracking-widest leading-tight group-hover:text-emerald-400 transition-colors">
                            {{ $cat['title'] }}
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Additional info cards --}}
    <section class="relative z-10 pb-16">
        <div class="container-exchange">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <a href="{{ route('shareholders') }}"
                    class="group bg-white/5 border border-white/5 rounded-[2.5rem] p-8 hover:bg-white/10 hover:border-emerald-500/30 transition-all duration-500 flex items-center justify-between backdrop-blur-xl">
                    <div class="flex items-center gap-6">
                        <div
                            class="w-16 h-16 bg-emerald-500/10 text-emerald-400 rounded-2xl flex items-center justify-center group-hover:bg-emerald-500 group-hover:text-slate-950 transition-all duration-500 border border-emerald-500/20">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                            </svg>
                        </div>
                        <div>
                            <h3
                                class="text-xl font-black text-white mb-1 group-hover:text-emerald-400 transition-colors">
                                {{ t('disclosure.capital_structure', 'Структура акционерного капитала') }}
                            </h3>
                            <p class="text-sm text-slate-400 font-medium">
                                {{ t('disclosure.shareholders_info', 'Информация об акционерах и долях участия в УК биржи.') }}
                            </p>
                        </div>
                    </div>
                    <svg class="w-6 h-6 text-slate-700 group-hover:text-emerald-400 transform group-hover:translate-x-1 transition-all"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
                    </svg>
                </a>

                <a href="{{ route('management') }}"
                    class="group bg-white/5 border border-white/5 rounded-[2.5rem] p-8 hover:bg-white/10 hover:border-emerald-500/30 transition-all duration-500 flex items-center justify-between backdrop-blur-xl">
                    <div class="flex items-center gap-6">
                        <div
                            class="w-16 h-16 bg-blue-500/10 text-blue-400 rounded-2xl flex items-center justify-center group-hover:bg-blue-500 group-hover:text-slate-950 transition-all duration-500 border border-blue-500/20">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-black text-white mb-1 group-hover:text-blue-400 transition-colors">
                                {{ t('disclosure.management_manual', 'Руководство') }}
                            </h3>
                            <p class="text-sm text-slate-400 font-medium">
                                {{ t('disclosure.management_info', 'Информация о наблюдательном совете и правлении биржи.') }}
                            </p>
                        </div>
                    </div>
                    <svg class="w-6 h-6 text-slate-700 group-hover:text-blue-400 transform group-hover:translate-x-1 transition-all"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    {{-- Main Content --}}
    <section class="relative z-10 pb-24">
        <div class="container-exchange">
            <div class="bg-white/5 border border-white/5 rounded-[2.5rem] overflow-hidden backdrop-blur-xl">
                {{-- Table Header --}}
                <div class="p-8 lg:p-12 border-b border-white/5 bg-white/[0.02]">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                        <div>
                            <h2 class="text-2xl font-black text-white tracking-tight mb-2">
                                {{ t('common.recent_documents', 'Последние документы') }}
                            </h2>
                            <p class="text-slate-400 text-sm font-bold uppercase tracking-widest italic">
                                {{ t('common.update_notice', 'Список регулярно обновляется по мере выхода новых отчетов') }}
                            </p>
                        </div>
                        <a href="{{ route('documents') }}"
                            class="inline-flex items-center gap-3 py-3 px-8 bg-emerald-500 text-slate-950 rounded-2xl text-[11px] font-black uppercase tracking-widest hover:bg-emerald-400 transition-all shadow-[0_0_20px_rgba(16,185,129,0.3)]">
                            {{ t('common.all_documents', 'Все документы') }}
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Table Body --}}
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-white/[0.03]">
                                <th
                                    class="px-8 py-6 text-[10px] font-black text-emerald-100/40 uppercase tracking-widest border-b border-white/5">
                                    {{ t('common.document', 'Документ') }}
                                </th>
                                <th
                                    class="px-8 py-6 text-[10px] font-black text-emerald-100/40 uppercase tracking-widest border-b border-white/5">
                                    {{ t('common.type', 'Тип') }}
                                </th>
                                <th
                                    class="px-8 py-6 text-[10px] font-black text-emerald-100/40 uppercase tracking-widest border-b border-white/5 text-center">
                                    {{ t('common.date', 'Дата') }}
                                </th>
                                <th
                                    class="px-8 py-6 text-[10px] font-black text-emerald-100/40 uppercase tracking-widest border-b border-white/5 text-right">
                                    {{ t('common.action', 'Действие') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5">
                            @forelse($recentDocuments as $doc)
                                <tr class="group hover:bg-white/[0.03] transition-colors">
                                    <td class="px-8 py-8">
                                        <div class="flex items-start gap-4">
                                            <div
                                                class="w-12 h-12 rounded-xl bg-emerald-500/10 flex items-center justify-center text-emerald-400 shrink-0 group-hover:scale-110 transition-transform border border-emerald-500/20">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <div
                                                    class="font-black text-white mb-2 group-hover:text-emerald-400 transition-colors text-lg leading-tight">
                                                    {{ $doc->getTranslation('title', app()->getLocale()) }}
                                                </div>
                                                @if($doc->getTranslation('description', app()->getLocale()))
                                                    <div
                                                        class="text-[11px] text-slate-500 italic max-w-md line-clamp-1 font-bold uppercase tracking-widest">
                                                        {{ $doc->getTranslation('description', app()->getLocale()) }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-8">
                                        <span
                                            class="inline-flex px-4 py-1.5 bg-white/5 rounded-full text-[10px] font-black uppercase tracking-widest text-slate-400 border border-white/10">
                                            {{ t('documents.' . $doc->category, $doc->category) }}
                                        </span>
                                    </td>
                                    <td
                                        class="px-8 py-8 text-center text-[13px] font-black text-slate-500 uppercase tracking-widest italic">
                                        {{ $doc->updated_at->format('d.m.Y') }}
                                    </td>
                                    <td class="px-8 py-8 text-right">
                                        @if($doc->file_path)
                                            <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank"
                                                class="inline-flex items-center gap-3 py-3 px-6 bg-white/5 hover:bg-emerald-500 hover:text-slate-950 text-slate-300 hover:text-slate-950 rounded-xl font-black uppercase tracking-widest text-[10px] transition-all group/btn border border-white/10 hover:border-emerald-500 shadow-xl">
                                                <span>{{ t('common.download', 'PDF') }}</span>
                                                <svg class="w-4 h-4 group-hover/btn:translate-y-0.5 transition-transform text-emerald-400 group-hover:text-slate-950"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-8 py-24 text-center">
                                        <div
                                            class="w-20 h-20 bg-white/5 rounded-full flex items-center justify-center mx-auto mb-6 border border-white/10 text-slate-800">
                                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                    d="M9.172 17.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <div class="text-white font-black uppercase tracking-widest text-sm">
                                            {{ t('common.no_documents', 'Документы не найдены') }}
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Info Notice --}}
            <div class="mt-12 p-8 lg:p-12 bg-blue-500/5 border border-blue-500/10 rounded-[2.5rem] backdrop-blur-xl">
                <div class="flex items-start gap-8">
                    <div
                        class="w-16 h-16 rounded-[1.5rem] bg-blue-500/10 flex items-center justify-center text-blue-400 shrink-0 border border-blue-500/20">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="prose prose-invert max-w-none">
                        <p class="text-slate-300 font-medium leading-relaxed m-0 text-lg">
                            {{ t('pages.disclosure_notice', 'Раскрытие информации осуществляется в соответствии с Законом Республики Узбекистан «О рынке ценных бумаг» и иными нормативно-правовыми актами, регулирующими деятельность биржи.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app>