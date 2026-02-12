{{-- News & Announcements Section --}}
<section class="relative pt-12 pb-24 bg-[#0a1628] overflow-hidden z-20">
    {{-- Decorative News Background --}}
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-[#10b981]/10 to-transparent"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_bottom_left,rgba(16,185,129,0.03),transparent_40%)]"></div>
        <div class="absolute bottom-0 right-0 w-1/3 h-1/2 bg-[radial-gradient(circle_at_center,rgba(16,185,129,0.05),transparent_70%)]"></div>
    </div>
    <div class="container-exchange relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            {{-- Left: News Slideshow (8/12) --}}
            <div class="lg:col-span-8 group" 
                x-data="{ 
                    activeSlide: 0, 
                    slides: {{ $news->map(fn($item) => [
                        'title' => $item->title,
                        'date' => $item->published_at?->format('d.m.Y') ?: $item->created_at->format('d.m.Y'),
                        'category' => t('common.news'),
                        'image' => $item->image ? Storage::url($item->image) : 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&h=500&fit=crop',
                        'desc' => $item->excerpt,
                        'url' => route('news.show', $item->slug)
                    ])->toJson() }},
                    next() { if(this.slides.length > 0) this.activeSlide = (this.activeSlide + 1) % this.slides.length },
                    prev() { if(this.slides.length > 0) this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length }
                }" 
                x-init="if(slides.length > 1) setInterval(() => next(), 5000)">
                
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-white tracking-tight">{{ t('home.latest_news') }}</h2>
                    <div class="flex items-center gap-2" x-show="slides.length > 1">
                        <button @click="prev()" class="w-9 h-9 rounded-full bg-white/5 hover:bg-white/10 flex items-center justify-center transition-all border border-white/5 text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
                        </button>
                        <button @click="next()" class="w-9 h-9 rounded-full bg-white/5 hover:bg-white/10 flex items-center justify-center transition-all border border-white/5 text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                        </button>
                    </div>
                </div>

                <div class="relative overflow-hidden rounded-3xl bg-slate-900 border border-white/5 aspect-[16/9] lg:aspect-[21/9]">
                    @if($news->isEmpty())
                        <div class="absolute inset-0 flex items-center justify-center text-slate-500">
                            {{ t('common.no_news') }}
                        </div>
                    @else
                        <template x-for="(slide, index) in slides" :key="index">
                            <div x-show="activeSlide === index" 
                                 x-transition:enter="transition ease-out duration-500"
                                 x-transition:enter-start="opacity-0 scale-105"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 class="absolute inset-0">
                                <img :src="slide.image" class="w-full h-full object-cover opacity-60">
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>
                                <div class="absolute bottom-0 left-0 right-0 p-8 lg:p-12 text-left">
                                    <span class="px-3 py-1 bg-emerald-500 text-white text-xs font-bold rounded-full mb-4 inline-block tracking-wider uppercase" x-text="slide.category"></span>
                                    <h3 class="text-3xl lg:text-4xl font-black text-white mb-4 leading-tight" x-text="slide.title"></h3>
                                    <p class="text-slate-300 text-lg max-w-2xl line-clamp-2" x-text="slide.desc"></p>
                                    <div class="flex items-center gap-4 mt-6">
                                        <div class="text-slate-300 font-medium" x-text="slide.date"></div>
                                        <div class="w-1 h-1 rounded-full bg-slate-600"></div>
                                        <a :href="slide.url" class="text-emerald-400 font-bold hover:text-emerald-300 transition-colors">{{ t('common.read_full') }} →</a>
                                    </div>
                                </div>
                            </div>
                        </template>

                        {{-- Progress Dots --}}
                        <div class="absolute top-8 right-8 flex gap-2" x-show="slides.length > 1">
                            <template x-for="(slide, index) in slides" :key="index">
                                <button @click="activeSlide = index" 
                                        :class="activeSlide === index ? 'w-8 bg-emerald-500' : 'w-2 bg-white/20'"
                                        class="h-2 rounded-full transition-all duration-300"></button>
                            </template>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Right: Announcements (4/12) --}}
            <div class="lg:col-span-4 flex flex-col h-full">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-white tracking-tight">{{ t('home.announcements') }}</h2>
                    <a href="{{ route('announcements') }}" class="text-emerald-400 text-xs font-bold hover:underline">{{ t('home.all_announcements') }}</a>
                </div>

                <div class="space-y-3 flex-grow">
                    @forelse($announcements as $announcement)
                        <a href="{{ route('announcements.show', $announcement->slug) }}" class="group p-3.5 rounded-xl bg-white/5 border border-white/5 hover:bg-white/10 hover:border-emerald-500/30 transition-all cursor-pointer block">
                            <div class="flex items-start gap-3.5">
                                @php
                                    $colorClass = match($announcement->type) {
                                        'warning' => 'bg-orange-500/10 text-orange-400',
                                        'urgent' => 'bg-rose-500/10 text-rose-400',
                                        default => 'bg-blue-500/10 text-blue-400',
                                    };
                                    $icon = match($announcement->type) {
                                        'warning' => '<path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />',
                                        'urgent' => '<path d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />',
                                        default => '<path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />',
                                    };
                                    $label = match($announcement->type) {
                                        'warning' => t('common.attention'),
                                        'urgent' => t('common.urgent'),
                                        default => t('common.info'),
                                    };
                                @endphp
                                <div class="w-10 h-10 rounded-lg {{ $colorClass }} flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $icon !!}</svg>
                                </div>
                                <div>
                                    <div class="text-slate-500 text-[10px] font-bold mb-0.5 uppercase tracking-widest">{{ $label }}</div>
                                    <h4 class="text-white text-sm font-bold leading-tight group-hover:text-emerald-400 transition-colors">{{ $announcement->title }}</h4>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="p-8 text-center text-slate-500 bg-white/5 rounded-xl border border-white/5">
                            {{ t('common.no_announcements') }}
                        </div>
                    @endforelse
                </div>

                {{-- View All Button --}}
                <a href="{{ route('announcements') }}" class="mt-4 w-full py-3 rounded-xl border border-slate-800 hover:border-emerald-500/50 text-white text-sm font-bold text-center transition-all block">
                    {{ t('home.view_all_announcements') }}
                </a>
            </div>
        </div>
    </div>
</section>