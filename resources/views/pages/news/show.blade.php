<x-app :title="$article->title . ' — ' . t('footer.company_name')">
    {{-- Decorative Background --}}
    <div class="fixed inset-0 bg-[#0a1628] pointer-events-none z-0">
        <div class="absolute top-0 left-1/4 w-1/2 h-1/2 bg-emerald-500/5 blur-[120px] rounded-full"></div>
        <div class="absolute bottom-0 right-1/4 w-1/2 h-1/2 bg-blue-500/5 blur-[120px] rounded-full"></div>
    </div>

    {{-- Breadcrumbs & Header --}}
    <section class="relative z-10 pt-12 pb-16">
        <div class="container-exchange">
            <nav class="flex items-center gap-3 text-xs font-bold uppercase tracking-widest mb-8">
                <a href="/" class="text-slate-500 hover:text-emerald-400 transition-colors">{{ t('common.home') }}</a>
                <svg class="w-3 h-3 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
                </svg>
                <a href="{{ route('news') }}"
                    class="text-slate-500 hover:text-emerald-400 transition-colors">{{ t('common.news') }}</a>
                <svg class="w-3 h-3 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
                </svg>
                <span class="text-emerald-400 truncate max-w-[200px]">{{ $article->title }}</span>
            </nav>

            <div class="max-w-4xl">
                <div class="flex items-center gap-4 mb-6">
                    <span
                        class="px-3 py-1 bg-emerald-500 text-white text-[10px] font-black uppercase tracking-widest rounded-full">{{ t('common.news') }}</span>
                    <time class="text-slate-500 text-sm font-medium">
                        {{ $article->published_at?->format('d.m.Y') ?: $article->created_at->format('d.m.Y') }}
                    </time>
                </div>
                <h1 class="text-4xl lg:text-6xl font-black text-white leading-tight tracking-tight mb-8">
                    {{ $article->title }}
                </h1>
            </div>
        </div>
    </section>

    {{-- Article Content --}}
    <section class="relative z-10 pb-24">
        <div class="container-exchange">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                <div class="lg:col-span-8">
                    {{-- Featured Image --}}
                    @if($article->image)
                        <div class="rounded-3xl overflow-hidden mb-12 border border-white/5 shadow-2xl">
                            <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}"
                                class="w-full h-auto opacity-90">
                        </div>
                    @endif

                    {{-- Content --}}
                    <div class="prose prose-invert prose-emerald max-w-none text-slate-200
                        prose-headings:text-white prose-headings:font-black prose-headings:tracking-tight
                        prose-p:text-slate-200 prose-p:leading-relaxed prose-p:text-lg
                        prose-a:text-emerald-400 prose-a:no-underline hover:prose-a:text-emerald-300
                        prose-strong:text-white prose-img:rounded-3xl prose-img:border prose-img:border-white/5">
                        {!! $article->content !!}
                    </div>

                    {{-- Share & Navigation --}}
                    <div
                        class="mt-16 pt-8 border-t border-white/5 flex flex-col sm:flex-row items-center justify-between gap-8">
                        <div class="flex items-center gap-4">
                            <span
                                class="text-slate-500 text-xs font-bold uppercase tracking-widest">{{ t('common.share') }}:</span>
                            <div class="flex gap-2">
                                <a href="#"
                                    class="w-10 h-10 rounded-xl bg-white/5 border border-white/5 flex items-center justify-center text-white hover:bg-emerald-500 hover:border-emerald-500 transition-all">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <a href="{{ route('news') }}"
                            class="flex items-center gap-2 text-emerald-400 text-xs font-black uppercase tracking-widest hover:gap-4 transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                            </svg>
                            {{ t('common.back_to_news') }}
                        </a>
                    </div>
                </div>

                {{-- Sidebar / Extra Info can go here --}}
                <div class="lg:col-span-4">
                    <div class="sticky top-8 space-y-8">
                        {{-- Quick Stats / Info --}}
                        <div class="p-8 rounded-3xl bg-white/5 border border-white/5 backdrop-blur-xl">
                            <h3 class="text-white font-bold mb-6">{{ t('common.info') }}</h3>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between py-3 border-b border-white/5">
                                    <span class="text-slate-500 text-sm">{{ t('common.views') }}</span>
                                    <span class="text-white font-bold">1,205</span>
                                </div>
                                <div class="flex items-center justify-between py-3 border-b border-white/5">
                                    <span class="text-slate-500 text-sm">{{ t('common.reading_time') }}</span>
                                    <span class="text-white font-bold">3 {{ t('common.min_short') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app>