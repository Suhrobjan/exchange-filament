<x-app :title="t('header.calendar') . ' — ' . t('footer.company_name')">
    {{-- Decorative Background --}}
    <div class="fixed inset-0 bg-[#0a1628] pointer-events-none z-0">
        <div class="absolute top-0 left-1/4 w-1/2 h-1/2 bg-blue-500/5 blur-[120px] rounded-full"></div>
        <div class="absolute bottom-0 right-1/4 w-1/2 h-1/2 bg-emerald-500/5 blur-[120px] rounded-full"></div>
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
                <span class="text-emerald-400">{{ t('header.calendar') }}</span>
            </nav>

            <div class="max-w-3xl">
                <h1 class="text-4xl lg:text-6xl font-black text-white mb-6 leading-tight tracking-tight">
                    {{ t('header.calendar') }}
                </h1>
                <div class="h-1.5 w-24 bg-gradient-to-r from-emerald-500 to-blue-500 rounded-full mb-8"></div>
                <p class="text-slate-300 text-lg lg:text-xl font-medium leading-relaxed">
                    {{ t('pages.calendar_subtitle', 'Расписание предстоящих торговых сессий, аукционов и событий биржи.') }}
                </p>
            </div>
        </div>
    </section>

    {{-- Calendar Grid --}}
    <section class="relative z-10 pb-24">
        <div class="container-exchange">
            @if($events->isEmpty())
                <div class="bg-white/5 border border-white/5 rounded-[3rem] p-20 text-center backdrop-blur-xl">
                    <div
                        class="w-24 h-24 bg-white/5 rounded-3xl flex items-center justify-center mx-auto mb-8 text-slate-700">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-black text-white mb-4 tracking-tight uppercase">
                        {{ t('common.no_events_scheduled', 'На ближайшее время событий не запланировано') }}</h3>
                    <p class="text-slate-500 font-medium">
                        {{ t('common.check_back_later', 'Следите за обновлениями расписания.') }}</p>
                </div>
            @else
                <div class="space-y-20">
                    @foreach($events as $date => $dayEvents)
                        @php $dateObj = \Carbon\Carbon::parse($date); @endphp
                        <div class="relative">
                            {{-- Date Heading --}}
                            <div class="sticky top-20 z-30 mb-8 pt-4">
                                <div
                                    class="inline-flex items-center gap-6 bg-[#0a1628]/80 backdrop-blur-xl border border-white/10 rounded-3xl px-8 py-4 shadow-2xl overflow-hidden group">
                                    <div
                                        class="absolute inset-0 bg-emerald-500/5 opacity-0 group-hover:opacity-100 transition-opacity">
                                    </div>
                                    <div class="relative z-10 flex items-center gap-4">
                                        <div
                                            class="w-12 h-12 rounded-2xl bg-emerald-500/10 flex flex-col items-center justify-center text-emerald-400">
                                            <span class="text-lg font-black leading-none">{{ $dateObj->format('d') }}</span>
                                            <span
                                                class="text-[8px] font-black uppercase tracking-widest">{{ $dateObj->locale(app()->getLocale())->isoFormat('MMM') }}</span>
                                        </div>
                                        <div class="flex flex-col">
                                            <span
                                                class="text-white font-black uppercase tracking-widest text-sm">{{ $dateObj->locale(app()->getLocale())->isoFormat('dddd') }}</span>
                                            <span
                                                class="text-slate-500 text-[10px] font-bold uppercase tracking-[0.2em]">{{ $dateObj->format('Y') }}</span>
                                        </div>
                                    </div>
                                    @if($dayEvents->first()->is_holiday)
                                        <div
                                            class="relative z-10 px-4 py-1.5 bg-red-500/10 border border-red-500/20 text-red-500 text-[10px] font-black uppercase tracking-widest rounded-xl">
                                            {{ t('common.holiday', 'Выходной') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{-- Events Grid --}}
                            <div class="grid gap-6">
                                @foreach($dayEvents as $event)
                                                    <div
                                                        class="group relative bg-white/5 border border-white/5 rounded-[2.5rem] p-8 backdrop-blur-xl hover:bg-white/10 hover:border-emerald-500/30 transition-all duration-500 flex flex-col md:flex-row md:items-center gap-8">
                                                        {{-- Time Slot --}}
                                                        <div class="flex items-center gap-6 min-w-[160px]">
                                                            <div
                                                                class="flex flex-col text-center bg-white/5 border border-white/10 rounded-2xl p-4 min-w-[100px] group-hover:bg-emerald-500 group-hover:border-emerald-500 transition-all duration-500">
                                                                <span
                                                                    class="text-xl font-black text-white group-hover:text-slate-950 transition-colors">{{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }}</span>
                                                                @if($event->end_time)
                                                                    <div class="h-px bg-white/10 my-2 group-hover:bg-slate-950/20"></div>
                                                                    <span
                                                                        class="text-[10px] font-black text-slate-500 uppercase tracking-widest group-hover:text-slate-950/60">{{ \Carbon\Carbon::parse($event->end_time)->format('H:i') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        {{-- Event Content --}}
                                                        <div class="flex-grow">
                                                            <div class="flex flex-wrap items-center gap-4 mb-4">
                                                                @php
                                                                    $catColor = match ($event->category) {
                                                                        'auction' => 'purple',
                                                                        'clearing' => 'blue',
                                                                        'holiday' => 'red',
                                                                        default => 'emerald'
                                                                    };
                                                                @endphp
                                     <span
                                                                    class="px-4 py-1.5 rounded-xl text-[10px] font-black uppercase tracking-widest border
                                                                                {{ $catColor === 'purple' ? 'bg-purple-500/10 text-purple-400 border-purple-500/20' : '' }}
                                                                                {{ $catColor === 'blue' ? 'bg-blue-500/10 text-blue-400 border-blue-500/20' : '' }}
                                                                                {{ $catColor === 'red' ? 'bg-red-500/10 text-red-400 border-red-500/20' : '' }}
                                                                                {{ $catColor === 'emerald' ? 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20' : '' }}">
                                                                    {{ $event->category ?? t('common.session', 'Сессия') }}
                                                                </span>
                                                            </div>
                                                            <h3
                                                                class="text-2xl font-black text-white group-hover:text-emerald-400 transition-colors mb-2 tracking-tight">
                                                                {{ $event->getTranslation('title', app()->getLocale()) }}
                                                            </h3>
                                                            <p class="text-slate-500 text-sm font-medium tracking-tight">
                                                                {{ t('common.trading_platform', 'Торговая площадка') }}: <span
                                                                    class="text-slate-400">{{ t('footer.company_name') }}</span>
                                                            </p>
                                                        </div>

                                                        {{-- Action --}}
                                                        <div class="md:self-center shrink-0">
                                                            <button
                                                                class="w-full md:w-auto px-10 py-4 bg-white/5 border border-white/10 text-white text-[10px] font-black uppercase tracking-widest rounded-2xl hover:bg-emerald-500 hover:text-slate-950 hover:border-emerald-500 transition-all duration-300 transform active:scale-[0.98]">
                                                                {{ t('home.learn_more') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</x-app>