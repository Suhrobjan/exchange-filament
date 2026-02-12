{{-- Hero Section with Animated SVG Background --}}
<section class="relative min-h-[600px] bg-gradient-to-b from-[#0a1628] via-[#0f2847] to-[#0a1628] overflow-hidden">
    {{-- Animated SVG Background --}}
    <div class="absolute inset-0 overflow-hidden">
        {{-- Grid Pattern --}}
        <div class="absolute inset-0 opacity-20">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid" width="50" height="50" patternUnits="userSpaceOnUse">
                        <path d="M 50 0 L 0 0 0 50" fill="none" stroke="#10b981" stroke-width="0.5" opacity="0.3" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)" />
            </svg>
        </div>

        {{-- Animated Floating Circles --}}
        <div class="absolute top-20 left-10 w-64 h-64 bg-emerald-500/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl animate-pulse"
            style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/3 w-48 h-48 bg-emerald-400/5 rounded-full blur-2xl animate-float"></div>

        {{-- Animated Wave Lines --}}
        <svg class="absolute bottom-0 left-0 w-full h-32 opacity-20" viewBox="0 0 1440 100" preserveAspectRatio="none">
            <path class="animate-wave" fill="none" stroke="#10b981" stroke-width="1"
                d="M0,50 Q360,100 720,50 T1440,50" />
            <path class="animate-wave" style="animation-delay: 0.5s;" fill="none" stroke="#10b981" stroke-width="0.5"
                d="M0,60 Q360,10 720,60 T1440,60" />
        </svg>

        {{-- Floating Data Points --}}
        <div class="absolute inset-0">
            <div class="absolute top-[15%] left-[10%] w-2 h-2 bg-emerald-400 rounded-full animate-ping opacity-50">
            </div>
            <div class="absolute top-[25%] right-[20%] w-2 h-2 bg-emerald-400 rounded-full animate-ping opacity-50"
                style="animation-delay: 0.5s;"></div>
            <div class="absolute top-[60%] left-[30%] w-2 h-2 bg-blue-400 rounded-full animate-ping opacity-50"
                style="animation-delay: 1s;"></div>
            <div class="absolute bottom-[20%] right-[35%] w-2 h-2 bg-emerald-400 rounded-full animate-ping opacity-50"
                style="animation-delay: 1.5s;"></div>
        </div>
    </div>

    <div class="container-exchange relative z-10 pt-40 pb-10 lg:pt-52 lg:pb-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            {{-- Left Content --}}
            <div class="space-y-8">
                <h1 class="text-4xl lg:text-5xl font-black text-white leading-tight tracking-tight">
                    {!! str_replace(' ', '<br>', e(t('home.hero_title'))) !!}
                </h1>

                <p class="text-slate-300 text-lg max-w-xl leading-relaxed">
                    {{ t('home.hero_subtitle') }}
                </p>

                <div class="flex flex-wrap gap-4 pt-2">
                    <a href="{{ route('accreditation') }}"
                        class="inline-flex items-center gap-2.5 px-6 py-3 bg-[#10b981] hover:bg-[#0da371] text-white font-bold rounded-full transition-all shadow-[0_10px_30px_rgba(16,185,129,0.3)] group text-base">
                        <span>{{ t('home.start_trading') }}</span>
                        <svg class="w-4 h-4 group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M7 17L17 7M17 7H7M17 7V17" />
                        </svg>
                    </a>
                    <a href="{{ route('brokers') }}"
                        class="inline-flex items-center gap-2 px-6 py-3 border-2 border-slate-700 hover:border-[#10b981] text-white font-bold rounded-full transition-all hover:bg-white/5 text-base">
                        <span>{{ t('home.find_broker') }}</span>
                    </a>
                </div>
            </div>

            {{-- Right: Candlestick Chart with Floating Tickers --}}
            <div class="relative h-[450px] lg:h-[500px]">
                {{-- Floating Price Tickers as per Image --}}
                <div class="absolute top-0 right-0 z-20 animate-float">
                    <div
                        class="bg-slate-900/60 backdrop-blur-xl rounded-2xl p-5 border border-white/10 shadow-2xl min-w-[200px]">
                        <div class="flex justify-between items-start mb-1">
                            <span class="text-slate-400 text-sm font-medium">{{ t('commodities.wheat') }}</span>
                            <div class="bg-emerald-500/20 text-emerald-400 p-1 rounded-lg">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M7 17L17 7M17 7H7M17 7V17" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex items-end gap-3">
                            <span class="text-2xl font-bold text-white tracking-tight">340.00</span>
                            <span class="text-emerald-400 font-bold mb-1">+1.3%</span>
                        </div>
                    </div>
                </div>

                <div class="absolute top-28 right-0 z-20 animate-float" style="animation-delay: 1.2s;">
                    <div
                        class="bg-slate-900/60 backdrop-blur-xl rounded-2xl p-5 border border-white/10 shadow-2xl min-w-[200px]">
                        <div class="flex justify-between items-start mb-1">
                            <span class="text-slate-400 text-sm font-medium">{{ t('commodities.cotton') }}</span>
                            <div class="bg-emerald-500/20 text-emerald-400 p-1 rounded-lg">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M7 17L17 7M17 7H7M17 7V17" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex items-end gap-3">
                            <span class="text-2xl font-bold text-white tracking-tight">1,250</span>
                            <span class="text-emerald-400 font-bold mb-1">+2.5%</span>
                        </div>
                    </div>
                </div>

                <div class="absolute top-56 right-0 z-20 animate-float" style="animation-delay: 2.4s;">
                    <div
                        class="bg-slate-900/60 backdrop-blur-xl rounded-2xl p-5 border border-white/10 shadow-2xl min-w-[200px]">
                        <div class="flex justify-between items-start mb-1">
                            <span class="text-slate-400 text-sm font-medium">{{ t('commodities.oil') }}</span>
                            <div class="bg-red-500/20 text-red-400 p-1 rounded-lg">
                                <svg class="w-4 h-4 rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M7 17L17 7M17 7H7M17 7V17" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex items-end gap-3">
                            <span class="text-2xl font-bold text-white tracking-tight">78.50</span>
                            <span class="text-red-400 font-bold mb-1">-1.2%</span>
                        </div>
                    </div>
                </div>

                <div class="absolute top-84 right-0 z-20 animate-float" style="animation-delay: 0.6s;">
                    <div
                        class="bg-slate-900/60 backdrop-blur-xl rounded-2xl p-5 border border-white/10 shadow-2xl min-w-[200px]">
                        <div class="flex justify-between items-start mb-1">
                            <span class="text-slate-400 text-sm font-medium">{{ t('commodities.gold') }}</span>
                            <div class="bg-slate-500/20 text-white p-1 rounded-lg">
                                <span class="text-[10px] font-black">---</span>
                            </div>
                        </div>
                        <div class="flex items-end gap-3">
                            <span class="text-2xl font-bold text-white tracking-tight">1,945</span>
                        </div>
                    </div>
                </div>

                {{-- Candlestick Chart SVG --}}
                <div class="absolute top-0 bottom-0 left-0 right-32 flex items-center justify-center">
                    <svg viewBox="0 0 400 300" class="w-full h-full">
                        <defs>
                            <linearGradient id="chartGlow" x1="0%" y1="0%" x2="0%" y2="100%">
                                <stop offset="0%" style="stop-color:#10b981;stop-opacity:0.3" />
                                <stop offset="100%" style="stop-color:#10b981;stop-opacity:0" />
                            </linearGradient>
                            <filter id="glow">
                                <feGaussianBlur stdDeviation="3" result="coloredBlur" />
                                <feMerge>
                                    <feMergeNode in="coloredBlur" />
                                    <feMergeNode in="SourceGraphic" />
                                </feMerge>
                            </filter>
                        </defs>

                        {{-- Horizontal grid lines --}}
                        <g stroke="#ffffff" stroke-width="0.5" opacity="0.1">
                            @for($i = 50; $i <= 250; $i += 50)
                                <line x1="0" y1="{{ $i }}" x2="400" y2="{{ $i }}" />
                            @endfor
                        </g>

                        {{-- Vertical grid lines --}}
                        <g stroke="#ffffff" stroke-width="0.5" opacity="0.1">
                            @for($i = 50; $i <= 350; $i += 50)
                                <line x1="{{ $i }}" y1="0" x2="{{ $i }}" y2="300" />
                            @endfor
                        </g>

                        {{-- Trend Line --}}
                        <path d="M0 250 Q120 230, 160 180 T240 140 T320 100 T400 80" fill="none" stroke="#10b981"
                            stroke-width="3" opacity="0.8" filter="url(#glow)" class="chart-line" />

                        {{-- Area under trend --}}
                        <path d="M0 250 Q120 230, 160 180 T240 140 T320 100 T400 80 L400 300 L0 300 Z"
                            fill="url(#chartGlow)" />

                        {{-- Candlesticks --}}
                        <g class="candlesticks">
                            @php
                                $candles = [
                                    ['x' => 50, 'y' => 220, 'h' => 40, 'up' => false],
                                    ['x' => 80, 'y' => 180, 'h' => 50, 'up' => true],
                                    ['x' => 110, 'y' => 210, 'h' => 30, 'up' => false],
                                    ['x' => 140, 'y' => 170, 'h' => 60, 'up' => true],
                                    ['x' => 170, 'y' => 150, 'h' => 40, 'up' => true],
                                    ['x' => 200, 'y' => 190, 'h' => 30, 'up' => false],
                                    ['x' => 230, 'y' => 140, 'h' => 70, 'up' => true],
                                    ['x' => 260, 'y' => 120, 'h' => 40, 'up' => true],
                                    ['x' => 290, 'y' => 150, 'h' => 20, 'up' => false],
                                    ['x' => 320, 'y' => 90, 'h' => 80, 'up' => true],
                                    ['x' => 350, 'y' => 110, 'h' => 30, 'up' => false],
                                    ['x' => 380, 'y' => 70, 'h' => 60, 'up' => true],
                                ];
                            @endphp
                            @foreach($candles as $index => $c)
                                <g class="candle animate-fadeInUp" style="animation-delay: {{ $index * 0.1 }}s">
                                    <line x1="{{ $c['x'] }}" y1="{{ $c['y'] - 10 }}" x2="{{ $c['x'] }}"
                                        y2="{{ $c['y'] + $c['h'] + 10 }}" stroke="{{ $c['up'] ? '#10b981' : '#ef4444' }}"
                                        stroke-width="2" />
                                    <rect x="{{ $c['x'] - 5 }}" y="{{ $c['y'] }}" width="10" height="{{ $c['h'] }}"
                                        fill="{{ $c['up'] ? '#10b981' : '#ef4444' }}" rx="1" />
                                </g>
                            @endforeach
                        </g>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    {{-- Compact Stats Bar --}}
    <div class="relative z-10 -mt-16 pb-16">
        <div class="container-exchange">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                {{-- Participants --}}
                <div
                    class="bg-white/5 backdrop-blur-xl rounded-2xl p-5 border border-white/5 flex items-center gap-4 group hover:bg-white/10 transition-all">
                    <div
                        class="w-12 h-12 rounded-xl bg-emerald-500/10 flex items-center justify-center group-hover:bg-emerald-500/20 transition-all flex-shrink-0">
                        <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-2xl font-black text-white leading-none">1,200+</div>
                        <div class="text-slate-300 text-xs font-medium mt-1">{{ t('home.participants_label') }}</div>
                    </div>
                </div>

                {{-- Turnover --}}
                <div
                    class="bg-white/5 backdrop-blur-xl rounded-2xl p-5 border border-white/5 flex items-center gap-4 group hover:bg-white/10 transition-all">
                    <div
                        class="w-12 h-12 rounded-xl bg-[#10b981]/10 flex items-center justify-center group-hover:bg-[#10b981]/20 transition-all flex-shrink-0">
                        <svg class="w-6 h-6 text-[#10b981]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-2xl font-black text-white leading-none">50 <span
                                class="text-sm text-slate-500">{{ t('home.billion_short') }}</span></div>
                        <div class="text-slate-300 text-xs font-medium mt-1">{{ t('home.turnover_label') }}</div>
                    </div>
                </div>

                {{-- Regions --}}
                <div
                    class="bg-white/5 backdrop-blur-xl rounded-2xl p-5 border border-white/5 flex items-center gap-4 group hover:bg-white/10 transition-all">
                    <div
                        class="w-12 h-12 rounded-xl bg-[#10b981]/10 flex items-center justify-center group-hover:bg-[#10b981]/20 transition-all flex-shrink-0">
                        <svg class="w-6 h-6 text-[#10b981]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-2xl font-black text-white leading-none">14</div>
                        <div class="text-slate-300 text-xs font-medium mt-1">{{ t('home.regions_label') }}</div>
                    </div>
                </div>

                {{-- Experience --}}
                <div
                    class="bg-white/5 backdrop-blur-xl rounded-2xl p-5 border border-white/5 flex items-center gap-4 group hover:bg-white/10 transition-all">
                    <div
                        class="w-12 h-12 rounded-xl bg-[#10b981]/10 flex items-center justify-center group-hover:bg-[#10b981]/20 transition-all flex-shrink-0">
                        <svg class="w-6 h-6 text-[#10b981]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-2xl font-black text-white leading-none">30+</div>
                        <div class="text-slate-300 text-xs font-medium mt-1">{{ t('home.years_experience') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>