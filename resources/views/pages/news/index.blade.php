<x-app :title="t('pages.news_title') . ' — ' . t('footer.company_name')">
    {{-- Page Header --}}
    <section class="bg-[#0a1628] border-b border-white/5 py-16 relative overflow-hidden">
        <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-emerald-500/20 to-transparent">
        </div>
        <div class="container-exchange relative z-10">
            <h1 class="text-4xl lg:text-5xl font-black text-white mb-4 tracking-tight">{{ t('common.news') }}</h1>
            <p class="text-slate-300 text-lg max-w-2xl">{{ t('pages.news_subtitle') }}</p>
        </div>
    </section>

    {{-- News Grid --}}
    {{-- News Grid with Sidebar --}}
    <section class="py-20 bg-[#0a1628]">
        <div class="container-exchange">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-12">
                {{-- Main Content --}}
                <div class="lg:col-span-3">
                    @if(isset($currentCategory))
                        <div class="mb-8 flex items-center justify-between">
                            <h2 class="text-2xl font-bold text-white">
                                {{ t('common.category') }}: <span
                                    class="text-emerald-400">{{ $currentCategory->name }}</span>
                            </h2>
                            <a href="{{ route('news') }}" class="text-slate-400 hover:text-white text-sm transition-colors">
                                &larr; {{ t('home.all_news') }}
                            </a>
                        </div>
                    @endif

                    @if($news->isEmpty())
                        <div class="bg-white/5 rounded-3xl p-12 text-center border border-white/5">
                            <p class="text-slate-500 text-lg">{{ t('common.no_news') }}</p>
                        </div>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            @foreach($news as $article)
                                <article
                                    class="group relative bg-white/5 border border-white/5 rounded-3xl overflow-hidden hover:bg-white/10 hover:border-emerald-500/30 transition-all duration-500 hover:-translate-y-2 flex flex-col h-full">
                                    <div class="relative aspect-[16/10] overflow-hidden shrink-0">
                                        <img src="{{ $article->image ? Storage::url($article->image) : 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&h=500&fit=crop' }}"
                                            alt="{{ $article->title }}"
                                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 opacity-80 group-hover:opacity-100">

                                        @if($article->category)
                                            <div class="absolute top-4 left-4">
                                                <span
                                                    class="px-3 py-1 bg-emerald-500 text-white text-[10px] font-black uppercase tracking-widest rounded-full">
                                                    {{ $article->category->name }}
                                                </span>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="p-8 flex flex-col flex-grow">
                                        <div
                                            class="flex items-center gap-3 text-slate-500 text-xs font-bold uppercase tracking-widest mb-4">
                                            {{ $article->published_at?->format('d.m.Y') ?: $article->created_at->format('d.m.Y') }}
                                        </div>

                                        <h2
                                            class="text-xl font-bold text-white mb-4 leading-snug group-hover:text-emerald-400 transition-colors line-clamp-2">
                                            <a href="{{ route('news.show', $article->slug) }}">
                                                {{ $article->title }}
                                            </a>
                                        </h2>

                                        <p class="text-slate-300 text-sm leading-relaxed line-clamp-3 mb-6 flex-grow">
                                            {{ $article->excerpt }}
                                        </p>

                                        <a href="{{ route('news.show', $article->slug) }}"
                                            class="inline-flex items-center gap-2 text-emerald-400 text-xs font-black uppercase tracking-widest group-hover:gap-4 transition-all mt-auto">
                                            {{ t('common.read_full') }}
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                            </svg>
                                        </a>
                                    </div>
                                </article>
                            @endforeach
                        </div>

                        {{-- Pagination --}}
                        <div class="mt-16">
                            {{ $news->appends(request()->query())->links('pagination::tailwind') }}
                        </div>
                    @endif
                </div>

                {{-- Sidebar --}}
                <div class="lg:col-span-1 space-y-8">
                    {{-- Search Widget (Placeholder) --}}
                    <div class="bg-white/5 border border-white/5 rounded-3xl p-6">
                        <h3 class="text-white font-bold text-lg mb-4">{{ t('common.search') }}</h3>
                        <form action="{{ route('search') }}" method="GET" class="relative">
                            <input type="text" name="q" placeholder="{{ t('common.search_placeholder') }}"
                                class="w-full bg-white/10 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-emerald-500 transition-colors">
                            <button type="submit" class="absolute right-3 top-3 text-slate-500 hover:text-white">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>
                        </form>
                    </div>

                    {{-- Categories Widget --}}
                    <div class="bg-white/5 border border-white/5 rounded-3xl p-6">
                        <h3 class="text-white font-bold text-lg mb-4">{{ t('common.categories') }}</h3>
                        <ul class="space-y-2">
                            <li>
                                <a href="{{ route('news') }}"
                                    class="flex items-center justify-between text-slate-400 hover:text-emerald-400 transition-colors group {{ !request('category') ? 'text-emerald-400' : '' }}">
                                    <span>{{ t('home.all_news') }}</span>
                                </a>
                            </li>
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('news', ['category' => $category->slug]) }}"
                                        class="flex items-center justify-between text-slate-400 hover:text-emerald-400 transition-colors group {{ request('category') == $category->slug ? 'text-emerald-400' : '' }}">
                                        <span>{{ $category->name }}</span>
                                        <span
                                            class="bg-white/10 text-xs px-2 py-0.5 rounded-full group-hover:bg-emerald-500/20 group-hover:text-emerald-400 transition-colors">
                                            {{ $category->news_count }}
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Latest Announcements Widget --}}
                    <div class="bg-white/5 border border-white/5 rounded-3xl p-6">
                        <h3 class="text-white font-bold text-lg mb-4">{{ t('home.announcements') }}</h3>
                        <div class="space-y-4">
                            @foreach($latestAnnouncements as $announcement)
                                <div class="group">
                                    <div class="text-[10px] text-emerald-500 font-bold uppercase tracking-widest mb-1">
                                        {{ $announcement->published_at?->format('d.m.Y') }}
                                    </div>
                                    <a href="{{ route('announcements.show', $announcement->slug) }}"
                                        class="text-slate-300 hover:text-white font-medium text-sm transition-colors line-clamp-2">
                                        {{ $announcement->title }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <a href="{{ route('announcements') }}"
                            class="inline-block mt-4 text-xs font-bold text-slate-500 hover:text-emerald-400 uppercase tracking-widest transition-colors">
                            {{ t('home.all_announcements') }} &rarr;
                        </a>
                    </div>

                    {{-- Subscribe Widget --}}
                    <div class="bg-gradient-to-br from-emerald-600 to-teal-700 rounded-3xl p-6 text-center">
                        <svg class="w-10 h-10 text-white/80 mx-auto mb-3" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <h3 class="text-white font-bold text-lg mb-2">{{ t('common.subscription') }}</h3>
                        <p class="text-emerald-100 text-sm mb-4">{{ t('common.subscribe_desc') }}</p>
                        <form action="#" class="space-y-2">
                            <input type="email" placeholder="{{ t('common.your_email') }}"
                                class="w-full bg-white/20 border-none placeholder-emerald-200 text-white rounded-xl px-4 py-2 text-sm focus:ring-2 focus:ring-white/50">
                            <button
                                class="w-full bg-white text-emerald-700 font-bold text-sm py-2 rounded-xl hover:bg-emerald-50 transition-colors">{{ t('common.subscribe') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app>