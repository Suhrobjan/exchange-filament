<x-app :title="t('header.documents_regulatory', 'Нормативно-правовые документы') . ' — ' . t('footer.company_name')">
    {{-- Decorative Background --}}
    <div class="fixed inset-0 bg-[#0a1628] pointer-events-none z-0">
        <div class="absolute top-0 right-1/4 w-1/2 h-1/2 bg-blue-500/5 blur-[120px] rounded-full"></div>
        <div class="absolute bottom-0 left-1/4 w-1/2 h-1/2 bg-emerald-500/5 blur-[120px] rounded-full"></div>
    </div>

    {{-- Page Header --}}
    <section class="relative z-10 pt-16 pb-12 overflow-hidden">
        <div class="container-exchange">
            {{-- Breadcrumbs --}}
            <nav class="flex items-center gap-3 text-xs font-bold uppercase tracking-widest mb-10">
                <a href="/" class="text-slate-500 hover:text-emerald-400 transition-colors">{{ t('common.home') }}</a>
                <svg class="w-3 h-3 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
                </svg>
                <a href="{{ route('documents') }}" class="text-slate-500 hover:text-emerald-400 transition-colors">{{ t('header.documents') }}</a>
                <svg class="w-3 h-3 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
                </svg>
                <span class="text-emerald-400">{{ t('header.documents_regulatory', 'Нормативно-правовые документы') }}</span>
            </nav>

            <div class="max-w-4xl">
                <h1 class="text-4xl lg:text-6xl font-black text-white mb-6 leading-tight tracking-tight">
                    {{ t('header.documents_regulatory', 'Нормативно-правовые документы') }}
                </h1>
                <div class="h-1.5 w-24 bg-gradient-to-r from-emerald-500 to-blue-500 rounded-full mb-8"></div>
                <p class="text-slate-300 text-lg lg:text-xl font-medium leading-relaxed mb-12">
                    {{ t('pages.voluntary_disclosure_subtitle', 'Законы Республики Узбекистан, Указы и Постановления Президента, Постановления Кабинета Министров, регулирующие биржевую деятельность.') }}
                </p>

                {{-- Search and Filter Controls --}}
                <div class="bg-white/5 border border-white/10 rounded-[2.5rem] p-4 lg:p-6 backdrop-blur-md shadow-2xl">
                    <form action="{{ route('documents.regulatory') }}" method="GET" class="flex flex-col gap-6">
                        <div class="relative group">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="{{ t('common.search_placeholder', 'Поиск по названию или номеру документа...') }}"
                                class="w-full bg-[#0a1628]/50 border border-white/10 rounded-2xl py-4 pl-14 pr-6 text-white placeholder-slate-500 focus:outline-none focus:border-emerald-500/50 focus:ring-4 focus:ring-emerald-500/10 transition-all duration-300 text-sm font-medium">
                            <div class="absolute left-5 top-1/2 -translate-y-1/2 text-slate-500 group-focus-within:text-emerald-400 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 px-6 py-2 bg-emerald-500 hover:bg-emerald-400 text-slate-950 text-[10px] font-black uppercase tracking-widest rounded-xl transition-all shadow-lg shadow-emerald-500/20 active:scale-95">
                                {{ t('common.search', 'Найти') }}
                            </button>
                        </div>

                        <div class="flex flex-wrap items-center gap-3">
                            @php
                                $categories = [
                                    '' => 'Все документы',
                                    'law' => 'Законы РУз',
                                    'decree' => 'Указы Президента',
                                    'resolution_president' => 'Постановления Президента',
                                    'resolution_cabinet' => 'Постановления Кабинета Министров',
                                    'justice_ministry' => 'Акты Минюста',
                                ];
                                $currentType = request('type', '');
                            @endphp

                            @foreach($categories as $key => $label)
                                <a href="{{ route('documents.regulatory', array_merge(request()->query(), ['type' => $key])) }}"
                                    class="px-5 py-2.5 rounded-xl border {{ $currentType === (string)$key ? 'bg-emerald-500 border-emerald-500 text-slate-950 font-black' : 'bg-white/5 border-white/10 text-slate-400 font-bold hover:bg-white/10 hover:border-white/20 transition-all' }} text-[10px] uppercase tracking-widest whitespace-nowrap">
                                    {{ $label }}
                                </a>
                            @endforeach
                            
                            @if(request()->hasAny(['type', 'search']))
                                <a href="{{ route('documents.regulatory') }}" class="ml-auto text-[10px] font-black uppercase tracking-widest text-slate-500 hover:text-rose-500 transition-colors flex items-center gap-2">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    {{ t('common.reset_filters', 'Сбросить') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- Documents List --}}
    <section class="relative z-10 pb-24">
        <div class="container-exchange">
            <div class="grid grid-cols-1 gap-6">
                @forelse($documents as $doc)
                    <div class="group bg-white/5 border border-white/5 rounded-[2rem] p-6 lg:p-8 hover:bg-white/10 hover:border-emerald-500/30 transition-all duration-500 flex flex-col lg:flex-row lg:items-center gap-6">
                        <div class="flex-shrink-0">
                            <div class="w-16 h-16 rounded-2xl bg-emerald-500/10 flex items-center justify-center border border-emerald-500/20 group-hover:scale-110 group-hover:bg-emerald-500 group-hover:text-slate-950 transition-all duration-500 text-emerald-400">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                        </div>

                        <div class="flex-grow">
                            <div class="flex flex-wrap items-center gap-3 mb-3">
                                <span class="px-3 py-1 bg-white/5 text-slate-400 text-[10px] font-black uppercase tracking-widest rounded-full border border-white/10">
                                    @switch($doc->type)
                                        @case('law') Закон Республики Узбекистан @break
                                        @case('decree') Указ Президента Республики Узбекистан @break
                                        @case('resolution_president') Постановление Президента Республики Узбекистан @break
                                        @case('resolution_cabinet') Постановление Кабинета Министров Республики Узбекистан @break
                                        @case('justice_ministry') НПА, зарегистрированный в Минюсте @break
                                        @default Прочее
                                    @endswitch
                                </span>
                                @if($doc->document_number)
                                    <span class="text-[10px] font-black text-emerald-500 uppercase tracking-widest">
                                        № {{ $doc->document_number }}
                                    </span>
                                @endif
                                @if($doc->adopted_at)
                                    <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest">
                                        от {{ $doc->adopted_at->format('d.m.Y') }}
                                    </span>
                                @endif
                            </div>
                            <h3 class="text-xl font-black text-white group-hover:text-emerald-400 transition-colors leading-snug mb-2">
                                {{ $doc->getTranslation('title', app()->getLocale()) }}
                            </h3>
                            @if($doc->description)
                                <p class="text-slate-400 text-sm leading-relaxed line-clamp-2">
                                    {{ $doc->getTranslation('description', app()->getLocale()) }}
                                </p>
                            @endif
                        </div>

                        <div class="lg:flex-shrink-0">
                            <a href="{{ $doc->url }}" target="_blank" class="inline-flex items-center gap-3 px-8 py-4 bg-emerald-500 text-slate-950 rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-white hover:text-slate-950 transition-all duration-500 shadow-xl shadow-emerald-500/20 group/btn">
                                <span>Открыть на Lex.uz</span>
                                <svg class="w-4 h-4 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-20 bg-white/5 border border-dashed border-white/10 rounded-[2rem]">
                        <div class="w-20 h-20 bg-white/5 rounded-3xl flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <p class="text-slate-500 font-black uppercase tracking-widest italic leading-relaxed">
                            {{ t('common.no_documents_found', 'По вашему запросу ничего не найдено') }}<br>
                            <span class="text-[10px] font-bold not-italic text-slate-700 mt-2 block">{{ t('common.no_documents_hint', 'Попробуйте изменить параметры поиска или фильтрации') }}</span>
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</x-app>