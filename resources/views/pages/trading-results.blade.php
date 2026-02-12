<x-app :title="t('header.results') . ' — ' . t('footer.company_name')">
    {{-- Decorative Background --}}
    <div class="fixed inset-0 bg-[#0a1628] pointer-events-none z-0">
        <div class="absolute top-0 right-1/4 w-1/2 h-1/2 bg-blue-500/5 blur-[120px] rounded-full"></div>
        <div class="absolute bottom-0 left-1/4 w-1/2 h-1/2 bg-emerald-500/5 blur-[120px] rounded-full"></div>
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
                <span class="text-emerald-400">{{ t('header.results') }}</span>
            </nav>

            <div class="max-w-3xl">
                <h1 class="text-4xl lg:text-6xl font-black text-white mb-6 leading-tight tracking-tight">
                    {{ t('header.results') }}
                </h1>
                <div class="h-1.5 w-24 bg-gradient-to-r from-emerald-500 to-blue-500 rounded-full mb-8"></div>
                <p class="text-slate-300 text-lg lg:text-xl font-medium leading-relaxed">
                    {{ t('pages.results_subtitle', 'Ежедневная статистика биржевых торгов: объемы, количество сделок и ключевые показатели.') }}
                </p>
            </div>
        </div>
    </section>

    {{-- Chart & Latest Stats --}}
    <section class="relative z-10 pb-24">
        <div class="container-exchange">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mb-16">
                {{-- Chart --}}
                <div
                    class="lg:col-span-8 bg-white/5 border border-white/5 rounded-[3rem] p-8 lg:p-12 backdrop-blur-xl group">
                    <div class="flex items-center justify-between mb-10">
                        <h3
                            class="text-xl font-black text-white tracking-tight group-hover:text-emerald-400 transition-colors">
                            {{ t('common.trading_volume_dynamics', 'Динамика объема торгов') }} (30
                            {{ t('common.days_suffix', 'дней') }})</h3>
                        <div class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center text-emerald-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                            </svg>
                        </div>
                    </div>
                    <div id="volumeChart" class="w-full h-[350px]"></div>
                </div>

                {{-- Latest Stats Card --}}
                @if ($results->first())
                    <div class="lg:col-span-4 lg:aspect-square flex">
                        <div
                            class="w-full bg-gradient-to-br from-emerald-600 to-blue-700 rounded-[3rem] p-10 text-white flex flex-col justify-between shadow-2xl relative overflow-hidden group">
                            <div
                                class="absolute top-0 right-0 w-80 h-80 bg-white/10 rounded-full blur-[80px] -mr-32 -mt-32 pointer-events-none group-hover:bg-white/20 transition-all duration-700">
                            </div>

                            <div class="relative z-10">
                                <div class="flex items-center justify-between mb-10">
                                    <span
                                        class="text-white/60 text-[10px] font-black uppercase tracking-widest">{{ t('common.latest_trades', 'Последние торги') }}</span>
                                    <div
                                        class="px-4 py-1.5 bg-black/20 rounded-xl border border-white/20 text-xs font-black font-mono text-emerald-200">
                                        {{ $results->first()->date->format('d.m.Y') }}
                                    </div>
                                </div>

                                <div class="space-y-10">
                                    <div>
                                        <p class="text-white/60 text-xs font-bold uppercase tracking-widest mb-3">
                                            {{ t('common.total_volume', 'Общий объем') }}</p>
                                        <p class="text-4xl lg:text-5xl font-black tracking-tight leading-none">
                                            {{ number_format($results->first()->total_volume, 0, ',', ' ') }}
                                            <span
                                                class="text-xl text-white/40 block mt-2 font-black uppercase tracking-widest">UZS</span>
                                        </p>
                                    </div>

                                    <div class="grid grid-cols-2 gap-8 border-t border-white/10 pt-8">
                                        <div>
                                            <p class="text-white/60 text-[10px] font-black uppercase tracking-widest mb-2">
                                                {{ t('common.deals_count', 'Сделок') }}</p>
                                            <p class="text-2xl font-black">{{ $results->first()->total_deals }}</p>
                                        </div>
                                        <div>
                                            <p class="text-white/60 text-[10px] font-black uppercase tracking-widest mb-2">
                                                {{ t('common.participants_count', 'Участников') }}</p>
                                            <p class="text-2xl font-black">{{ $results->first()->total_participants }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="relative z-10 border-t border-white/20 pt-8 mt-auto">
                                <p class="text-white/60 text-[10px] font-black uppercase tracking-widest mb-2">
                                    {{ t('common.top_commodity_label', 'Лидер продаж') }}</p>
                                <p
                                    class="text-lg font-black text-emerald-200 truncate group-hover:text-white transition-colors">
                                    {{ $results->first()->top_commodity }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            {{-- Table Section --}}
            <div class="bg-white/5 border border-white/5 rounded-[3rem] overflow-hidden backdrop-blur-xl shadow-2xl">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-white/5 border-b border-white/5">
                                <th class="px-8 py-6 text-[10px] font-black uppercase tracking-widest text-slate-500">
                                    {{ t('common.date') }}</th>
                                <th class="px-8 py-6 text-[10px] font-black uppercase tracking-widest text-slate-500">
                                    {{ t('common.volume') }} (UZS)</th>
                                <th class="px-8 py-6 text-[10px] font-black uppercase tracking-widest text-slate-500">
                                    {{ t('common.deals') }}</th>
                                <th class="px-8 py-6 text-[10px] font-black uppercase tracking-widest text-slate-500">
                                    {{ t('common.participants') }}</th>
                                <th class="px-8 py-6 text-[10px] font-black uppercase tracking-widest text-slate-500">
                                    {{ t('common.top_commodity') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5 text-slate-300">
                            @forelse($results as $result)
                                <tr class="hover:bg-white/5 transition-colors group">
                                    <td class="px-8 py-6">
                                        <span
                                            class="font-black text-white group-hover:text-emerald-400 transition-colors">{{ $result->date->format('d.m.Y') }}</span>
                                    </td>
                                    <td class="px-8 py-6">
                                        <span class="font-mono font-black text-emerald-400">
                                            {{ number_format($result->total_volume, 0, ',', ' ') }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-6">
                                        <span
                                            class="font-bold text-slate-300 group-hover:text-white transition-colors">{{ $result->total_deals }}</span>
                                    </td>
                                    <td class="px-8 py-6">
                                        <span
                                            class="font-bold text-slate-300 group-hover:text-white transition-colors">{{ $result->total_participants }}</span>
                                    </td>
                                    <td class="px-8 py-6">
                                        <span
                                            class="text-sm font-medium text-slate-300 group-hover:text-emerald-200 transition-colors">{{ $result->top_commodity }}</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-8 py-20 text-center text-slate-500 font-medium">
                                        {{ t('common.no_results_yet', 'Данных пока нет.') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($results->hasPages())
                    <div class="px-8 py-8 border-t border-white/5 bg-white/5">
                        {{ $results->links('pagination::tailwind') }}
                    </div>
                @endif
            </div>
        </div>
    </section>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const chartData = @json($chartData);

                const options = {
                    series: [{
                        name: "{{ t('common.trading_volume', 'Объем торгов') }}",
                        data: chartData.map(item => item.total_volume)
                    }],
                    chart: {
                        type: 'area',
                        height: 350,
                        toolbar: { show: false },
                        fontFamily: 'Outfit, sans-serif',
                        background: 'transparent'
                    },
                    theme: { mode: 'dark' },
                    dataLabels: { enabled: false },
                    stroke: { curve: 'smooth', width: 4, colors: ['#10b981'] },
                    xaxis: {
                        categories: chartData.map(item => new Date(item.date).toLocaleDateString()),
                        labels: { style: { colors: '#64748b', fontWeight: 600 } },
                        axisBorder: { show: false },
                        axisTicks: { show: false }
                    },
                    yaxis: {
                        labels: {
                            style: { colors: '#64748b', fontWeight: 600 },
                            formatter: (value) => {
                                if (value >= 1000000000) return (value / 1000000000).toFixed(1) + ' млрд';
                                if (value >= 1000000) return (value / 1000000).toFixed(1) + ' млн';
                                return value;
                            }
                        }
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.4,
                            opacityTo: 0.05,
                            stops: [0, 90, 100]
                        }
                    },
                    colors: ['#10b981'],
                    grid: { borderColor: 'rgba(255,255,255,0.05)', strokeDashArray: 8 },
                    tooltip: {
                        theme: 'dark',
                        y: {
                            formatter: function (val) {
                                return new Intl.NumberFormat('ru-RU').format(val) + " UZS"
                            }
                        }
                    }
                };

                const chart = new ApexCharts(document.querySelector("#volumeChart"), options);
                chart.render();
            });
        </script>
    @endpush
</x-app>