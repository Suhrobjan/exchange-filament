@php
    $title = __('Все документы');
    $currentCategory = request('category', 'all');

    $categories = [
        'all' => 'Все',
        'annual_report' => 'Годовые отчеты',
        'quarterly_report' => 'Квартальные отчеты',
        'material_fact' => 'Существенные факты',
        'license' => 'Лицензии',
        'financial_statement' => 'Фин. отчетность',
        'charter' => 'Устав',
        'audit_report' => 'Аудит',
    ];
@endphp

<x-app :title="$title . ' — ' . t('footer.company_name')">
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
                <a href="{{ route('disclosure') }}"
                    class="text-slate-500 hover:text-emerald-400 transition-colors">{{ t('header.disclosure') }}</a>
                <svg class="w-3 h-3 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
                </svg>
                <span class="text-emerald-400">{{ $title }}</span>
            </nav>

            <div class="max-w-3xl">
                <h1 class="text-4xl lg:text-6xl font-black text-white mb-6 leading-tight tracking-tight">
                    {{ $title }}
                </h1>
                <div class="h-1.5 w-24 bg-gradient-to-r from-emerald-500 to-blue-500 rounded-full mb-8"></div>
                <p class="text-slate-300 text-lg lg:text-xl font-medium leading-relaxed">
                    {{ t('pages.documents_all_subtitle', 'Полный перечень документов, подлежащих обязательному раскрытию согласно законодательству.') }}
                </p>
            </div>
        </div>
    </section>

    {{-- Filter Tabs --}}
    <section class="relative z-20 sticky top-[80px] bg-[#0a1628]/80 backdrop-blur-md border-y border-white/5">
        <div class="container-exchange">
            <div class="flex items-center gap-2 overflow-x-auto py-4 scrollbar-hide no-scrollbar">
                @foreach($categories as $id => $label)
                    <a href="{{ $id === 'all' ? route('documents') : route('documents', ['category' => $id]) }}"
                        class="whitespace-nowrap px-6 py-2.5 rounded-xl text-[11px] font-black uppercase tracking-widest transition-all duration-300 {{ $currentCategory === $id ? 'bg-emerald-500 text-slate-950 shadow-[0_0_20px_rgba(16,185,129,0.3)]' : 'bg-white/5 text-slate-400 hover:bg-white/10 hover:text-white' }}">
                        {{ __($label) }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Documents List --}}
    <section class="relative z-10 py-16 min-h-[60vh]">
        <div class="container-exchange">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @php
                    $filteredDocs = $currentCategory === 'all'
                        ? collect($documents)
                        : collect($documents)->where('category', $currentCategory);
                @endphp

                @forelse($filteredDocs as $doc)
                    <div
                        class="group bg-white/5 border border-white/5 rounded-[2rem] p-8 hover:bg-white/10 hover:border-emerald-500/30 transition-all duration-500 flex flex-col">
                        <div class="flex items-center justify-between gap-4 mb-6">
                            <span
                                class="px-3 py-1 bg-emerald-500/10 text-emerald-400 text-[10px] font-black uppercase tracking-widest rounded-full border border-emerald-500/20">
                                {{ __($doc->category) }}
                            </span>
                            <span class="text-[11px] font-bold text-slate-500 uppercase tracking-widest italic">
                                {{ $doc->updated_at->format('d.m.Y') }}
                            </span>
                        </div>

                        <h3
                            class="text-xl font-black text-white mb-4 leading-tight group-hover:text-emerald-400 transition-colors flex-grow">
                            {{ $doc->getTranslation('title', app()->getLocale()) }}
                        </h3>

                        @if($doc->getTranslation('description', app()->getLocale()))
                            <p class="text-slate-400 text-sm leading-relaxed mb-8 line-clamp-2 italic">
                                {{ $doc->getTranslation('description', app()->getLocale()) }}
                            </p>
                        @endif

                        <div class="mt-auto">
                            @if($doc->file_path)
                                <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank"
                                    class="inline-flex items-center gap-3 py-3 px-8 bg-emerald-500 hover:bg-emerald-400 text-slate-950 rounded-xl font-black uppercase tracking-widest text-xs transition-all hover:scale-[1.02] shadow-xl group/btn">
                                    <span>{{ t('common.download_pdf', 'Скачать PDF') }}</span>
                                    <svg class="w-5 h-5 group-hover/btn:translate-y-0.5 transition-transform" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                </a>
                            @else
                                <span class="text-xs text-slate-600 italic font-medium uppercase tracking-widest">
                                    {{ t('common.document_expected', 'Ожидается публикация') }}
                                </span>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-24 text-center">
                        <div
                            class="w-20 h-20 bg-white/5 rounded-full flex items-center justify-center mx-auto mb-8 border border-white/10 text-slate-700">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M9.172 17.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h4 class="text-2xl font-black text-white mb-4 tracking-tight">{{ t('common.nothing_found') }}</h4>
                        <p class="text-slate-400 max-w-md mx-auto">
                            {{ t('common.no_docs_category', 'В данной категории пока нет опубликованных документов.') }}
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Back Link --}}
    <div class="relative z-10 container-exchange pb-16">
        <a href="{{ route('disclosure') }}"
            class="group inline-flex items-center gap-4 py-4 px-8 bg-white/5 border border-white/5 rounded-2xl text-slate-400 hover:text-white hover:bg-white/10 transition-all font-black uppercase tracking-widest text-xs">
            <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            {{ t('common.back_to_disclosure', 'К раскрытию информации') }}
        </a>
    </div>
</x-app>