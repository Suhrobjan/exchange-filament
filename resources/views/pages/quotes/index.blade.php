<x-app :title="t('header.quotes') . ' — ' . t('footer.company_name')">
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
                <span class="text-emerald-400">{{ t('header.quotes') }}</span>
            </nav>

            <div class="max-w-3xl">
                <h1 class="text-4xl lg:text-6xl font-black text-white mb-6 leading-tight tracking-tight">
                    {{ t('header.quotes') }}
                </h1>
                <div class="h-1.5 w-24 bg-gradient-to-r from-emerald-500 to-blue-500 rounded-full mb-8"></div>
                <p class="text-slate-300 text-lg lg:text-xl font-medium leading-relaxed">
                    {{ t('pages.quotes_subtitle') }}
                </p>
            </div>
        </div>
    </section>

    {{-- Filters & Content --}}
    <section class="relative z-10 pb-24">
        <div class="container-exchange">
            {{-- Category Tabs --}}
            <div
                class="flex flex-wrap items-center gap-3 mb-10 bg-white/5 border border-white/5 p-2 rounded-[2rem] backdrop-blur-xl">
                @foreach($categories as $key => $label)
                    <a href="{{ $key === 'all' ? route('quotes') : route('quotes', ['category' => $key]) }}"
                        class="px-8 py-3 rounded-2xl text-xs font-black uppercase tracking-widest transition-all duration-300 {{ $currentCategory === $key || ($key === 'all' && !$currentCategory) ? 'bg-emerald-500 text-slate-950 shadow-lg shadow-emerald-500/20' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                        {{ $label }}
                    </a>
                @endforeach
            </div>

            {{-- Quotes Table Container --}}
            <div class="bg-white/5 border border-white/5 rounded-[3rem] overflow-hidden backdrop-blur-xl shadow-2xl">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-white/5 border-b border-white/5">
                                <th class="px-8 py-6 text-[10px] font-black uppercase tracking-widest text-slate-500">
                                    {{ t('common.code') }}
                                </th>
                                <th class="px-8 py-6 text-[10px] font-black uppercase tracking-widest text-slate-500">
                                    {{ t('common.name') }}
                                </th>
                                <th
                                    class="px-8 py-6 text-[10px] font-black uppercase tracking-widest text-slate-500 text-right">
                                    {{ t('common.price') }} (UZS)
                                </th>
                                <th
                                    class="px-8 py-6 text-[10px] font-black uppercase tracking-widest text-slate-500 text-right">
                                    {{ t('common.change') }}
                                </th>
                                <th
                                    class="px-8 py-6 text-[10px] font-black uppercase tracking-widest text-slate-500 text-right">
                                    {{ t('common.volume') }}
                                </th>
                                <th
                                    class="px-8 py-6 text-[10px] font-black uppercase tracking-widest text-slate-500 text-center">
                                    {{ t('common.actions') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5 text-slate-300">
                            @forelse($quotes as $quote)
                                <tr class="hover:bg-white/5 transition-colors group">
                                    <td class="px-8 py-6">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-2 h-2 rounded-full bg-emerald-500/50 group-hover:bg-emerald-500 transition-colors">
                                            </div>
                                            <span
                                                class="font-mono font-black text-emerald-400 group-hover:text-emerald-300">{{ $quote->commodity_code }}</span>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6">
                                        <span
                                            class="font-bold text-white group-hover:text-emerald-200 transition-colors">{{ $quote->commodity_name }}</span>
                                    </td>
                                    <td class="px-8 py-6 text-right">
                                        <span
                                            class="font-mono font-black text-white bg-white/5 px-4 py-2 rounded-xl border border-white/5">
                                            {{ number_format($quote->price, 0, ',', ' ') }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-6 text-right">
                                        @if($quote->change_percent > 0)
                                            <span
                                                class="inline-flex items-center gap-2 text-emerald-400 font-black px-4 py-2 bg-emerald-500/10 border border-emerald-500/20 rounded-xl">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                                        d="M5 15l7-7 7 7" />
                                                </svg>
                                                +{{ $quote->change_percent }}%
                                            </span>
                                        @elseif($quote->change_percent < 0)
                                            <span
                                                class="inline-flex items-center gap-2 text-red-400 font-black px-4 py-2 bg-red-500/10 border border-red-500/20 rounded-xl">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                                        d="M19 9l-7 7-7-7" />
                                                </svg>
                                                {{ $quote->change_percent }}%
                                            </span>
                                        @else
                                            <span class="text-slate-500 font-bold bg-white/5 px-4 py-2 rounded-xl">0%</span>
                                        @endif
                                    </td>
                                    <td class="px-8 py-6 text-right">
                                        <span
                                            class="text-slate-300 font-medium group-hover:text-slate-200 transition-colors">{{ number_format($quote->trade_volume, 0, ',', ' ') }}</span>
                                    </td>
                                    <td class="px-8 py-6 text-center">
                                        <div class="flex items-center justify-center">
                                            <div
                                                class="w-8 h-8 rounded-xl bg-white/5 flex items-center justify-center text-slate-500 group-hover:bg-blue-500/20 group-hover:text-blue-400 transition-all">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 5l7 7-7 7" />
                                                </svg>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-8 py-20 text-center text-slate-500 font-medium">
                                        <div class="flex flex-col items-center gap-4">
                                            <div class="w-16 h-16 bg-white/5 rounded-3xl flex items-center justify-center">
                                                <svg class="w-8 h-8 text-slate-700" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                                </svg>
                                            </div>
                                            {{ t('common.no_quotes') }}
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Footer Info --}}
                <div
                    class="p-8 bg-white/5 border-t border-white/5 flex flex-col sm:flex-row items-center justify-between gap-6">
                    <div class="flex items-center gap-4 text-slate-500 font-medium text-sm">
                        <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center text-emerald-500/50">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        {{ t('common.data_updated') }}: <span class="text-white">{{ now()->format('d.m.Y H:i') }}</span>
                    </div>

                    <div class="flex items-center gap-6">
                        <button
                            class="flex items-center gap-3 text-xs font-black uppercase tracking-widest text-slate-300 hover:text-white transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                            </svg>
                            {{ t('common.export_excel', 'Экспорт в Excel') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app>