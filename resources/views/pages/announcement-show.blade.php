<x-app :title="$announcement->title . ' — ' . t('footer.company_name')">
    {{-- Decorative Background --}}
    <div class="fixed inset-0 bg-[#0a1628] pointer-events-none z-0">
        <div class="absolute top-0 left-1/3 w-1/2 h-1/2 bg-blue-500/5 blur-[120px] rounded-full"></div>
    </div>

    {{-- Breadcrumbs & Header --}}
    <section class="relative z-10 pt-12 pb-16">
        <div class="container-exchange">
            <nav class="flex items-center gap-3 text-xs font-bold uppercase tracking-widest mb-8">
                <a href="/" class="text-slate-500 hover:text-emerald-400 transition-colors">{{ t('common.home') }}</a>
                <svg class="w-3 h-3 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
                </svg>
                <a href="{{ route('announcements') }}"
                    class="text-slate-500 hover:text-emerald-400 transition-colors">{{ t('pages.announcements') }}</a>
                <svg class="w-3 h-3 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
                </svg>
                <span class="text-emerald-400 truncate max-w-[200px]">{{ $announcement->title }}</span>
            </nav>

            <div class="max-w-4xl">
                <div class="flex items-center gap-4 mb-6">
                    @php
                        $colorClass = match ($announcement->type) {
                            'warning' => 'bg-orange-500/10 text-orange-400',
                            'urgent' => 'bg-rose-500/10 text-rose-400',
                            default => 'bg-blue-500/10 text-blue-400',
                        };
                        $label = match ($announcement->type) {
                            'warning' => t('common.attention'),
                            'urgent' => t('common.urgent'),
                            default => t('common.info'),
                        };
                    @endphp
                    <span
                        class="px-3 py-1 {{ $colorClass }} text-[10px] font-black uppercase tracking-widest rounded-full">{{ $label }}</span>
                    <time class="text-slate-500 text-sm font-medium">
                        {{ $announcement->published_at?->format('d.m.Y') ?: $announcement->created_at->format('d.m.Y') }}
                    </time>
                </div>
                <h1 class="text-4xl lg:text-5xl font-black text-white leading-tight tracking-tight mb-8">
                    {{ $announcement->title }}
                </h1>
            </div>
        </div>
    </section>

    {{-- Announcement Content --}}
    <section class="relative z-10 pb-24">
        <div class="container-exchange">
            <div class="max-w-4xl bg-white/5 border border-white/5 rounded-[2.5rem] p-8 lg:p-12 backdrop-blur-xl">
                <div class="prose prose-invert prose-emerald max-w-none text-slate-200
                    prose-headings:text-white prose-headings:font-black prose-headings:tracking-tight
                    prose-p:text-slate-200 prose-p:leading-relaxed prose-p:text-lg
                    prose-a:text-emerald-400 prose-a:no-underline hover:prose-a:text-emerald-300
                    prose-strong:text-white prose-ul:text-slate-200 prose-li:my-2">
                    {!! $announcement->content !!}
                </div>

                @if($announcement->expires_at)
                    <div class="mt-12 p-6 rounded-2xl bg-white/5 border border-white/5 flex items-center gap-4">
                        <svg class="w-6 h-6 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-slate-500 text-sm">{{ t('common.announcement_valid_until') }} <span
                                class="text-white font-bold">{{ $announcement->expires_at->format('d.m.Y') }}</span></p>
                    </div>
                @endif
            </div>

            <div class="mt-12">
                <a href="{{ route('announcements') }}"
                    class="inline-flex items-center gap-2 text-emerald-400 text-xs font-black uppercase tracking-widest hover:gap-4 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                    </svg>
                    {{ t('common.back_to_announcements') }}
                </a>
            </div>
        </div>
    </section>
</x-app>