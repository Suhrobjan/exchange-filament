{{-- Trading Calendar & TOP Brokers Section --}}
<section class="py-20 bg-[#0a1628] relative overflow-hidden">
    {{-- Background Glow --}}
    <div
        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[400px] bg-emerald-500/5 rounded-full blur-[120px] pointer-events-none">
    </div>

    <div class="container-exchange relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- Left: Trading Calendar (2/3) --}}
            <div class="lg:col-span-2 bg-white/5 backdrop-blur-xl border border-white/5 rounded-3xl p-8 lg:p-10">
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-emerald-500/10 flex items-center justify-center">
                            <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-white tracking-tight">{{ t('home.trading_sessions') }}</h2>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @forelse($tradingSessions as $session)
                        <div
                            class="flex items-center gap-4 p-4 rounded-2xl bg-white/5 border border-white/5 hover:border-emerald-500/50 transition-all group">
                            <div
                                class="w-12 h-12 rounded-xl bg-emerald-500/10 flex items-center justify-center flex-shrink-0 group-hover:bg-emerald-500 transition-colors">
                                @if($session->icon === 'wheat')
                                    <svg class="w-6 h-6 text-emerald-400 group-hover:text-white" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2L15 8L21 9L17 14L18 20L12 17L6 20L7 14L3 9L9 8L12 2Z" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                @elseif($session->icon === 'cotton')
                                    <svg class="w-6 h-6 text-emerald-400 group-hover:text-white" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M12 12L12 12.01" stroke-width="4" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                @elseif($session->icon === 'oil')
                                    <svg class="w-6 h-6 text-emerald-400 group-hover:text-white" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2L12 22M2 12H22" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                @else
                                    <svg class="w-6 h-6 text-emerald-400 group-hover:text-white" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                @endif
                            </div>
                            <div class="flex-grow">
                                <h4 class="text-white font-bold text-sm group-hover:text-emerald-400 transition-colors">
                                    {{ $session->getTranslation('title', app()->getLocale()) }}
                                </h4>
                                <div class="text-slate-500 text-[11px] font-black uppercase tracking-widest mt-0.5">
                                    {{ $session->time }}
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full py-10 text-center text-slate-500 text-sm italic">
                            {{ t('home.no_sessions_info') }}
                        </div>
                    @endforelse
                </div>
            </div>

            {{-- Right: TOP Brokers (1/3) --}}
            <div class="bg-white/5 backdrop-blur-xl border border-white/5 rounded-3xl p-8 flex flex-col">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-10 h-10 rounded-xl bg-emerald-500/10 flex items-center justify-center">
                        <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-white tracking-tight">{{ t('home.top_brokers') }}</h2>
                </div>

                <div class="space-y-4 flex-grow">
                    @forelse($brokers as $broker)
                        <a href="{{ route('brokers') }}"
                            class="group flex items-center gap-4 p-3 rounded-2xl bg-white/5 border border-white/5 hover:border-emerald-500/50 transition-all">
                            <div
                                class="w-12 h-12 rounded-xl bg-white/5 flex items-center justify-center p-2 group-hover:scale-110 transition-transform">
                                @if($broker->logo)
                                    <img src="{{ asset('storage/' . $broker->logo) }}" alt="{{ $broker->name }}"
                                        class="max-w-full max-h-full object-contain filter brightness-0 invert opacity-60 group-hover:opacity-100 transition-opacity">
                                @else
                                    <div
                                        class="text-lg font-black text-emerald-500/30 group-hover:text-emerald-500 transition-colors">
                                        {{ Str::limit($broker->name, 2, '') }}
                                    </div>
                                @endif
                            </div>
                            <div>
                                <div
                                    class="text-white font-bold text-sm group-hover:text-emerald-400 transition-colors leading-tight">
                                    {{ $broker->name }}
                                </div>
                                <div class="text-slate-500 text-[9px] font-black uppercase tracking-widest mt-0.5">
                                    {{ t('home.broker_office') }}
                                </div>
                            </div>
                        </a>
                    @empty
                        @foreach(range(1, 4) as $i)
                            <div
                                class="flex items-center gap-4 p-3 rounded-2xl bg-white/5 border border-white/5 opacity-50 grayscale">
                                <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center">
                                    <span class="text-slate-700 font-black text-sm">BC</span>
                                </div>
                                <div class="h-4 w-24 bg-white/10 rounded"></div>
                            </div>
                        @endforeach
                    @endforelse
                </div>

                <a href="{{ route('brokers') }}"
                    class="mt-6 flex items-center justify-center gap-2 text-slate-400 font-bold text-xs uppercase tracking-widest hover:text-emerald-400 transition-colors">
                    {{ t('common.show_all') }}
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>