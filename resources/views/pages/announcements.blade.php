<x-app :title="t('pages.announcements') . ' — ' . t('footer.company_name')">
    {{-- Page Header --}}
    <section class="bg-[#0a1628] border-b border-white/5 py-16 relative overflow-hidden">
        <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-emerald-500/20 to-transparent">
        </div>
        <div class="container-exchange relative z-10">
            <h1 class="text-4xl lg:text-5xl font-black text-white mb-4 tracking-tight">{{ t('pages.announcements') }}
            </h1>
            <p class="text-slate-300 text-lg max-w-2xl">{{ t('pages.announcements_subtitle') }}</p>
        </div>
    </section>

    {{-- Announcements List --}}
    <section class="py-20 bg-[#0a1628]">
        <div class="container-exchange">
            @if($announcements->isEmpty())
                <div class="bg-white/5 rounded-3xl p-12 text-center border border-white/5">
                    <p class="text-slate-500 text-lg">{{ t('common.no_announcements') }}</p>
                </div>
            @else
                <div class="max-w-4xl mx-auto space-y-4">
                    @foreach($announcements as $announcement)
                        <a href="{{ route('announcements.show', $announcement->slug) }}"
                            class="group block p-6 rounded-2xl bg-white/5 border border-white/5 hover:bg-white/10 hover:border-emerald-500/30 transition-all duration-300">
                            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                                <div class="flex items-start gap-6">
                                    @php
                                        $colorClass = match ($announcement->type) {
                                            'warning' => 'bg-orange-500/10 text-orange-400',
                                            'urgent' => 'bg-rose-500/10 text-rose-400',
                                            default => 'bg-blue-500/10 text-blue-400',
                                        };
                                        $icon = match ($announcement->type) {
                                            'warning' => '<path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />',
                                            'urgent' => '<path d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />',
                                            default => '<path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />',
                                        };
                                        $label = match ($announcement->type) {
                                            'warning' => t('common.attention'),
                                            'urgent' => t('common.urgent'),
                                            default => t('common.info'),
                                        };
                                    @endphp
                                    <div
                                        class="w-14 h-14 rounded-2xl {{ $colorClass }} flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                                        <svg class="w-7 h-7" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">{!! $icon !!}</svg>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-3 mb-2">
                                            <span
                                                class="text-slate-500 text-[10px] font-black uppercase tracking-widest">{{ $label }}</span>
                                            <div class="w-1 h-1 rounded-full bg-slate-700"></div>
                                            <span
                                                class="text-slate-500 text-[10px] font-bold">{{ $announcement->published_at?->format('d.m.Y') ?: $announcement->created_at->format('d.m.Y') }}</span>
                                        </div>
                                        <h3
                                            class="text-xl font-bold text-white group-hover:text-emerald-400 transition-colors leading-tight">
                                            {{ $announcement->title }}
                                        </h3>
                                    </div>
                                </div>
                                <div class="flex-shrink-0">
                                    <div
                                        class="w-10 h-10 rounded-full border border-white/10 flex items-center justify-center text-slate-500 group-hover:bg-emerald-500 group-hover:text-white group-hover:border-emerald-500 transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach

                    {{-- Pagination --}}
                    <div class="mt-12">
                        {{ $announcements->links('pagination::tailwind') }}
                    </div>
                </div>
            @endif
        </div>
    </section>
</x-app>