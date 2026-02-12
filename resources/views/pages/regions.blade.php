<x-app :title="t('footer.regional_offices') . ' — ' . t('footer.company_name')">
    {{-- Decorative Background --}}
    <div class="fixed inset-0 bg-[#0a1628] pointer-events-none z-0">
        <div class="absolute top-0 left-1/4 w-1/2 h-1/2 bg-blue-500/5 blur-[120px] rounded-full"></div>
        <div class="absolute bottom-0 right-1/4 w-1/2 h-1/2 bg-emerald-500/5 blur-[120px] rounded-full"></div>
    </div>

    {{-- Page Header --}}
    <section class="relative z-10 pt-16 pb-12 overflow-hidden">
        <div class="container-exchange">
            {{-- Breadcrumbs --}}
            <nav class="flex items-center gap-3 text-xs font-bold uppercase tracking-widest mb-10">
                <a href="/" class="text-slate-500 hover:text-emerald-400 transition-colors">{{ t('common.home') }}</a>
                <svg class="w-3 h-3 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
                </svg>
                <span class="text-emerald-400">{{ t('footer.regional_offices') }}</span>
            </nav>

            <div class="max-w-3xl">
                <h1 class="text-4xl lg:text-6xl font-black text-white mb-6 leading-tight tracking-tight">
                    {{ t('footer.regional_offices') }}
                </h1>
                <div class="h-1.5 w-24 bg-gradient-to-r from-emerald-500 to-blue-500 rounded-full mb-8"></div>
                <p class="text-slate-300 text-lg lg:text-xl font-medium leading-relaxed">
                    {{ t('pages.regions_subtitle', 'Мы работаем во всех регионах Узбекистана, обеспечивая доступность биржевых торгов.') }}
                </p>
            </div>
        </div>
    </section>

    {{-- Content Area with Map and Details --}}
    <section class="relative z-10 pb-24" x-data="{ 
        selectedRegion: 'UZ-TK', 
        offices: {{ $offices->keyBy('region_code')->toJson() }},
        get activeOffice() { return this.offices[this.selectedRegion] || null }
    }">
        <div class="container-exchange">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">

                {{-- Left: Interactive Map --}}
                <div
                    class="lg:col-span-7 xl:col-span-8 bg-white/5 border border-white/5 rounded-[3rem] p-8 lg:p-12 backdrop-blur-xl relative group">
                    <div class="absolute top-8 left-8 z-20">
                        <span
                            class="text-[10px] font-black uppercase tracking-[0.3em] text-emerald-500/50 block mb-2">{{ t('pages.map_instruction', 'Выберите регион') }}</span>
                        <h2 class="text-2xl font-black text-white"
                            x-text="activeOffice ? activeOffice.name : 'Узбекистан'"></h2>
                    </div>

                    <div class="relative z-10 pt-12"
                         @click="if ($event.target.tagName === 'path' && $event.target.id && $event.target.id !== 'UZ-ARAL') selectedRegion = $event.target.id"
                         x-init="
                            $watch('selectedRegion', value => {
                                $el.querySelectorAll('path').forEach(p => p.classList.toggle('active', p.id === value));
                            });
                            $el.querySelectorAll('path').forEach(p => p.classList.toggle('active', p.id === selectedRegion));
                         ">
                        <x-uz-map
                            class="w-full h-auto drop-shadow-[0_20px_50px_rgba(16,185,129,0.1)] map-interactive" />
                    </div>

                    {{-- Map Styling (Inline for specific interactive logic) --}}
                    <style>
                        .map-interactive path {
                            fill: rgba(30, 41, 59, 0.5);
                            /* slate-800/50 */
                            stroke: rgba(255, 255, 255, 0.1);
                            /* white/10 */
                            transition: all 500ms ease-in-out;
                            cursor: pointer;
                            stroke-width: 1.5;
                            vector-effect: non-scaling-stroke;
                        }

                        .map-interactive path:hover {
                            fill: rgba(16, 185, 129, 0.2);
                            /* emerald-500/20 */
                            stroke: rgba(16, 185, 129, 0.5);
                            /* emerald-500/50 */
                        }

                        .map-interactive path.active {
                            fill: #10b981;
                            /* emerald-500 */
                            stroke: #0f172a;
                            /* slate-950 */
                            stroke-width: 2.5;
                            filter: drop-shadow(0 0 15px rgba(16, 185, 129, 0.4));
                        }
                    </style>

                </div>

                {{-- Right: Detailed Panel --}}
                <div class="lg:col-span-5 xl:col-span-4 sticky top-24">
                    <template x-if="activeOffice">
                        <div class="space-y-6" x-transition:enter="transition ease-out duration-500"
                            x-transition:enter-start="opacity-0 translate-y-8"
                            x-transition:enter-end="opacity-100 translate-y-0">

                            {{-- Manager Card --}}
                            <div
                                class="bg-gradient-to-br from-emerald-500/10 to-blue-500/10 border border-emerald-500/20 rounded-[2.5rem] p-8 backdrop-blur-xl relative overflow-hidden group">
                                <div
                                    class="absolute -top-12 -right-12 w-32 h-32 bg-emerald-500/10 rounded-full blur-3xl group-hover:bg-emerald-500/20 transition-colors duration-700">
                                </div>

                                <div class="flex items-center gap-6 mb-8 relative z-10">
                                    <div
                                        class="w-24 h-24 rounded-2xl overflow-hidden bg-slate-800 border-2 border-emerald-500/20 relative group-hover:border-emerald-500/50 transition-colors">
                                        {{-- Placeholder if no photo --}}
                                        <div class="absolute inset-0 flex items-center justify-center text-slate-600">
                                            <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                                            </svg>
                                        </div>
                                        {{-- We can add logic for actual photo later --}}
                                    </div>
                                    <div>
                                        <p class="text-[10px] font-black uppercase tracking-[0.2em] text-emerald-400 mb-1"
                                            x-text="activeOffice.manager_position"></p>
                                        <h3 class="text-xl font-black text-white leading-tight"
                                            x-text="activeOffice.manager_name"></h3>
                                    </div>
                                </div>

                                <div class="space-y-4 relative z-10 pt-6 border-t border-white/5">
                                    <div class="flex items-start gap-4">
                                        <div
                                            class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center flex-shrink-0 text-slate-400 group-hover:bg-emerald-500 group-hover:text-slate-950 transition-all duration-300">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </div>
                                        <p class="text-slate-300 text-sm leading-relaxed" x-text="activeOffice.address">
                                        </p>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4">
                                        <a :href="'tel:' + activeOffice.phone"
                                            class="bg-white/5 hover:bg-white/10 border border-white/5 p-4 rounded-2xl flex flex-col gap-1 transition-all">
                                            <span
                                                class="text-[9px] font-black uppercase tracking-widest text-slate-500">{{ t('common.phone', 'Телефон') }}</span>
                                            <span class="text-sm font-bold text-white"
                                                x-text="activeOffice.phone"></span>
                                        </a>
                                        <template x-if="activeOffice.email">
                                            <a :href="'mailto:' + activeOffice.email"
                                                class="bg-white/5 hover:bg-white/10 border border-white/5 p-4 rounded-2xl flex flex-col gap-1 transition-all">
                                                <span
                                                    class="text-[9px] font-black uppercase tracking-widest text-slate-500">{{ t('common.email', 'Email') }}</span>
                                                <span class="text-sm font-bold text-white truncate"
                                                    x-text="activeOffice.email"></span>
                                            </a>
                                        </template>
                                    </div>

                                    <div
                                        class="bg-white/5 border border-white/5 p-4 rounded-2xl flex items-center gap-4">
                                        <div
                                            class="w-8 h-8 rounded-lg bg-emerald-500/10 flex items-center justify-center text-emerald-400">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <span class="text-xs font-medium text-slate-400"
                                            x-text="activeOffice.working_hours"></span>
                                    </div>
                                </div>

                                <template x-if="activeOffice.latitude && activeOffice.longitude">
                                    <a :href="'https://www.google.com/maps/search/?api=1&query=' + activeOffice.latitude + ',' + activeOffice.longitude"
                                        target="_blank"
                                        class="mt-8 flex items-center justify-center gap-3 py-4 px-6 bg-white text-slate-950 rounded-2xl text-xs font-black uppercase tracking-widest hover:bg-emerald-400 transition-all duration-300 shadow-xl shadow-emerald-500/10">
                                        <span>{{ t('common.show_on_map', 'Открыть в Google Картах') }}</span>
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                        </svg>
                                    </a>
                                </template>
                            </div>

                        </div>
                    </template>
                </div>
            </div>
        </div>
    </section>

    {{-- Full List (Desktop Searchable / Mobile Alternative) --}}
    <section class="relative z-10 pb-24 border-t border-white/5 pt-24">
        <div class="container-exchange">
            <div class="flex items-end justify-between mb-16 gap-8">
                <div class="max-w-2xl">
                    <h2 class="text-3xl lg:text-5xl font-black text-white mb-6">
                        {{ t('pages.all_branches', 'Все представительства') }}
                    </h2>
                    <p class="text-slate-400 text-lg font-medium lg:max-w-xl">
                        {{ t('pages.all_branches_subtitle', 'Список всех региональных филиалов Узбекской республиканской товарно-сырьевой биржи с актуальными контактами.') }}
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($offices as $office)
                    <div @click="selectedRegion = '{{ $office->region_code }}'; window.scrollTo({top: document.querySelector('.grid').offsetTop - 100, behavior: 'smooth'})"
                        class="group bg-white/5 border border-white/5 rounded-3xl p-6 backdrop-blur-xl hover:bg-white/10 hover:border-emerald-500/30 transition-all cursor-pointer flex items-center gap-6"
                        :class="selectedRegion === '{{ $office->region_code }}' ? 'border-emerald-500/50 bg-emerald-500/5' : ''">
                        <div
                            class="w-12 h-12 rounded-xl bg-emerald-500/10 text-emerald-400 flex items-center justify-center flex-shrink-0 group-hover:bg-emerald-500 group-hover:text-slate-950 transition-all">
                            <span class="text-xs font-black">{{ $office->region_code }}</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-white group-hover:text-emerald-400 transition-colors">
                                {{ $office->name }}
                            </h4>
                            <p class="text-slate-500 text-xs mt-1" x-text="'{{ $office->phone }}'"></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="relative z-10 py-24 overflow-hidden border-t border-white/5">
        <div class="container-exchange">
            <div
                class="bg-gradient-to-r from-emerald-600 to-blue-600 rounded-[3rem] p-12 lg:p-16 text-center relative overflow-hidden group shadow-[0_20px_60px_rgba(0,0,0,0.3)]">
                <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition-colors"></div>
                <div class="relative z-10 max-w-3xl mx-auto">
                    <h2 class="text-3xl lg:text-4xl font-black text-white mb-6 tracking-tight">
                        {{ t('common.need_consultation', 'Нужна консультация?') }}
                    </h2>
                    <p class="text-emerald-500 mb-12 text-lg font-medium leading-relaxed">
                        {{ t('pages.regions_cta_subtitle', 'Наши специалисты в региональных представительствах всегда готовы помочь вам с аккредитацией и участием в торгах.') }}
                    </p>
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
                        <a href="{{ route('contacts') }}"
                            class="w-full sm:w-auto bg-white text-slate-900 px-10 py-5 rounded-2xl text-base font-black uppercase tracking-widest shadow-xl hover:scale-105 transition-transform active:scale-[0.98]">
                            {{ t('common.contact_us', 'Связаться с нами') }}
                        </a>
                        <a href="tel:+998712000001"
                            class="text-lg font-black text-white hover:text-emerald-200 transition-colors flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            +998 71 200-00-01
                        </a>
                    </div>
                </div>
                {{-- Decorative Icon --}}
                <div class="absolute -bottom-10 -left-10 text-white/10 -rotate-12 pointer-events-none">
                    <svg class="w-64 h-64" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z" />
                    </svg>
                </div>
            </div>
        </div>
    </section>
</x-app>