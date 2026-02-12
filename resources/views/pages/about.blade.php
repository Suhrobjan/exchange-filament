<x-app :title="$page->title . ' — ' . t('footer.company_name')">
    {{-- Decorative Background --}}
    <div class="fixed inset-0 bg-[#0a1628] pointer-events-none z-0">
        <div class="absolute top-0 left-1/4 w-1/2 h-1/2 bg-emerald-500/5 blur-[120px] rounded-full"></div>
        <div class="absolute bottom-0 right-1/4 w-1/2 h-1/2 bg-blue-500/5 blur-[120px] rounded-full"></div>
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
                <span class="text-emerald-400">{{ $page->title }}</span>
            </nav>

            <div class="max-w-3xl">
                <h1 class="text-4xl lg:text-6xl font-black text-white mb-6 leading-tight tracking-tight">
                    {{ $page->title }}
                </h1>
                <div class="h-1.5 w-24 bg-gradient-to-r from-emerald-500 to-blue-500 rounded-full mb-8"></div>
                <p class="text-slate-300 text-lg lg:text-xl font-medium leading-relaxed">
                    {{ t('footer.company_name') }} — {{ t('footer.commodity_exchange') }}
                </p>
            </div>
        </div>
    </section>

    {{-- Main Content Section --}}
    <section class="relative z-10 pb-24">
        <div class="container-exchange">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                {{-- Content Area --}}
                <div class="lg:col-span-8">
                    <div class="bg-white/5 border border-white/5 rounded-[2.5rem] p-8 lg:p-12 backdrop-blur-xl">
                        <div class="prose prose-invert prose-emerald max-w-none text-slate-200
                            prose-headings:text-white prose-headings:font-black prose-headings:tracking-tight
                            prose-p:text-slate-200 prose-p:leading-relaxed prose-p:text-lg
                            prose-a:text-emerald-400 prose-a:no-underline hover:prose-a:text-emerald-300
                            prose-strong:text-white prose-ul:text-slate-200 prose-li:my-2
                            prose-img:rounded-3xl">
                            {!! $page->content !!}
                        </div>
                    </div>
                </div>

                {{-- Sidebar --}}
                <div class="lg:col-span-4 space-y-8">
                    {{-- Navigation Card --}}
                    <div class="bg-white/5 border border-white/5 rounded-[2rem] p-8 backdrop-blur-xl">
                        <h3 class="text-xl font-black text-white mb-6 tracking-tight">{{ t('footer.about_exchange') }}
                        </h3>
                        <nav class="space-y-4">
                            @php
                                $aboutLinks = [
                                    ['route' => 'management', 'label' => t('footer.management'), 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'],
                                    ['route' => 'shareholders', 'label' => t('footer.shareholders'), 'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
                                    ['route' => 'disclosure', 'label' => t('footer.disclosure'), 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
                                    ['route' => 'regions', 'label' => t('footer.regional_offices'), 'icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z'],
                                ];
                            @endphp

                            @foreach($aboutLinks as $link)
                                <a href="{{ route($link['route']) }}"
                                    class="group flex items-center gap-4 p-4 rounded-2xl bg-white/5 border border-transparent hover:border-emerald-500/30 hover:bg-emerald-500/5 transition-all">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-emerald-500/10 flex items-center justify-center text-emerald-400 group-hover:scale-110 transition-transform">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="{{ $link['icon'] }}" />
                                        </svg>
                                    </div>
                                    <span
                                        class="text-sm font-bold text-slate-300 group-hover:text-emerald-400 transition-colors">{{ $link['label'] }}</span>
                                </a>
                            @endforeach
                        </nav>
                    </div>

                    {{-- Stats Card --}}
                    <div
                        class="bg-gradient-to-br from-emerald-600 to-blue-600 rounded-[2rem] p-8 relative overflow-hidden group">
                        <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition-colors"></div>
                        <div class="relative z-10">
                            <h3 class="text-xl font-black text-white mb-6 tracking-tight">Биржа в цифрах</h3>
                            <div class="space-y-6">
                                <div>
                                    <div class="text-3xl font-black text-white">30+</div>
                                    <div class="text-xs font-bold text-emerald-100 uppercase tracking-widest mt-1">лет
                                        на рынке</div>
                                </div>
                                <div>
                                    <div class="text-3xl font-black text-white">1,200+</div>
                                    <div class="text-xs font-bold text-emerald-100 uppercase tracking-widest mt-1">
                                        участников торгов</div>
                                </div>
                                <div>
                                    <div class="text-3xl font-black text-white">14</div>
                                    <div class="text-xs font-bold text-emerald-100 uppercase tracking-widest mt-1">
                                        региональных офисов</div>
                                </div>
                            </div>
                        </div>
                        {{-- Decorative Icon --}}
                        <div class="absolute -bottom-6 -right-6 text-white/10 rotate-12">
                            <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app>