<x-app :title="t('footer.management') . ' — ' . t('footer.company_name')">
    {{-- Decorative Background --}}
    <div class="fixed inset-0 bg-[#0a1628] pointer-events-none z-0">
        <div class="absolute top-0 right-1/3 w-1/2 h-1/2 bg-emerald-500/5 blur-[120px] rounded-full"></div>
        <div class="absolute bottom-0 left-1/3 w-1/2 h-1/2 bg-blue-500/5 blur-[120px] rounded-full"></div>
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
                <span class="text-emerald-400">{{ t('footer.management') }}</span>
            </nav>

            <div class="max-w-3xl">
                <h1 class="text-4xl lg:text-6xl font-black text-white mb-6 leading-tight tracking-tight">
                    {{ t('footer.management') }}
                </h1>
                <div class="h-1.5 w-24 bg-gradient-to-r from-emerald-500 to-blue-500 rounded-full mb-8"></div>
                <p class="text-slate-200 text-lg lg:text-xl font-medium leading-relaxed">
                    {{ t('pages.management_subtitle', 'Наблюдательный совет и Правление биржи') }}
                </p>
            </div>
        </div>
    </section>

    {{-- Supervisory Board Section --}}
    <section class="relative z-10 pb-24">
        <div class="container-exchange">
            <div class="flex items-center gap-4 mb-12">
                <h2 class="text-3xl lg:text-4xl font-black text-white tracking-tight">
                    {{ t('common.supervisory_board', 'Наблюдательный совет') }}
                </h2>
                <div class="flex-1 h-px bg-white/10"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($supervisoryBoard as $member)
                    <div
                        class="group bg-white/5 border border-white/5 rounded-[2.5rem] p-8 backdrop-blur-xl hover:bg-white/10 hover:border-emerald-500/30 transition-all text-center">
                        <div class="relative w-40 h-40 mx-auto mb-8">
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-emerald-500 to-blue-500 rounded-full blur-2xl opacity-0 group-hover:opacity-20 transition-opacity">
                            </div>
                            <div
                                class="relative w-40 h-40 rounded-full overflow-hidden border-4 border-white/10 group-hover:border-emerald-500/50 transition-colors">
                                @if($member->photo)
                                    <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div class="w-full h-full bg-white/5 flex items-center justify-center text-slate-700">
                                        <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="mb-4">
                            <span
                                class="px-3 py-1 bg-emerald-500/10 text-emerald-400 text-[10px] font-black uppercase tracking-widest rounded-full">
                                {{ $member->position }}
                            </span>
                        </div>

                        <h3
                            class="text-2xl font-black text-white mb-4 tracking-tight group-hover:text-emerald-400 transition-colors">
                            {{ $member->name }}
                        </h3>

                        <div
                            class="text-slate-200 text-sm leading-relaxed line-clamp-4 prose prose-invert prose-sm mx-auto text-slate-200">
                            {!! $member->bio !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Board of Directors Section --}}
    <section class="relative z-10 py-24 bg-white/5 backdrop-blur-md">
        <div class="container-exchange">
            <div class="flex items-center gap-4 mb-12">
                <h2 class="text-3xl lg:text-4xl font-black text-white tracking-tight">
                    {{ t('common.board_of_directors', 'Правление') }}
                </h2>
                <div class="flex-1 h-px bg-white/10"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($boardOfDirectors as $member)
                    <div
                        class="group bg-white/5 border border-white/5 rounded-3xl p-6 text-center hover:bg-white/10 hover:border-blue-500/30 transition-all">
                        <div
                            class="w-24 h-24 rounded-full overflow-hidden bg-white/5 mx-auto mb-6 border-2 border-white/10 group-hover:border-blue-500/50 transition-colors">
                            @if($member->photo)
                                <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}"
                                    class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-700">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="text-[10px] font-black uppercase tracking-widest text-emerald-400 mb-2">
                            {{ $member->position }}
                        </div>
                        <h3 class="font-black text-white group-hover:text-blue-400 transition-colors mb-4 tracking-tight">
                            {{ $member->name }}
                        </h3>
                        @if($member->bio)
                            <div class="text-[11px] text-slate-500 leading-relaxed line-clamp-3">
                                {!! strip_tags($member->bio) !!}
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Reception / Contact Section --}}
    <section class="relative z-10 py-24">
        <div class="container-exchange">
            <div class="max-w-5xl mx-auto">
                <div
                    class="bg-gradient-to-br from-emerald-600 to-blue-600 rounded-[3rem] p-12 lg:p-16 relative overflow-hidden group shadow-[0_20px_60px_rgba(0,0,0,0.3)]">
                    <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition-colors"></div>
                    <div class="relative z-10 text-center">
                        <h2 class="text-3xl lg:text-4xl font-black text-white mb-12 tracking-tight">
                            {{ t('pages.chairman_reception', 'Приёмная Председателя Правления') }}
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                            <div class="flex flex-col items-center group/item">
                                <div
                                    class="w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center mb-6 border border-white/20 group-hover/item:scale-110 transition-transform">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <div class="text-[10px] font-black text-emerald-100 uppercase tracking-widest mb-2">
                                    {{ t('footer.phone_label', 'Телефон') }}
                                </div>
                                <a href="tel:+998712000001"
                                    class="text-xl lg:text-2xl font-black text-white hover:text-emerald-200 transition-colors">+998
                                    71 200-00-01</a>
                            </div>

                            <div class="flex flex-col items-center group/item">
                                <div
                                    class="w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center mb-6 border border-white/20 group-hover/item:scale-110 transition-transform">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div class="text-[10px] font-black text-emerald-100 uppercase tracking-widest mb-2">
                                    Email</div>
                                <a href="mailto:reception@uzex.uz"
                                    class="text-xl lg:text-2xl font-black text-white hover:text-emerald-200 transition-colors">reception@uzex.uz</a>
                            </div>

                            <div class="flex flex-col items-center group/item">
                                <div
                                    class="w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center mb-6 border border-white/20 group-hover/item:scale-110 transition-transform">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="text-[10px] font-black text-emerald-100 uppercase tracking-widest mb-2">
                                    {{ t('common.reception_hours', 'Часы приёма') }}
                                </div>
                                <div class="text-xl lg:text-2xl font-black text-white">
                                    {{ t('common.mon_fri_hours', 'Пн-Пт, 10:00 - 17:00') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Decorative Elements --}}
                    <div class="absolute -bottom-10 -right-10 text-white/10 rotate-12 pointer-events-none">
                        <svg class="w-64 h-64" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14h-2V9h-2V7h4v10z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app>