<x-app :title="$page->title . ' — ' . t('footer.company_name')">
    {{-- Decorative Background --}}
    <div class="fixed inset-0 bg-[#0a1628] pointer-events-none z-0">
        <div class="absolute top-0 right-1/4 w-1/2 h-1/2 bg-emerald-500/5 blur-[120px] rounded-full"></div>
        <div class="absolute bottom-1/4 left-1/4 w-1/2 h-1/2 bg-blue-500/5 blur-[120px] rounded-full"></div>
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
                    {{ t('footer.company_description') }}
                </p>
            </div>
        </div>
    </section>

    {{-- Contact Content --}}
    <section class="relative z-10 pb-24">
        <div class="container-exchange">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                {{-- Contact Info Cards --}}
                <div class="lg:col-span-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Address --}}
                        <div
                            class="bg-white/5 border border-white/5 rounded-[2rem] p-8 backdrop-blur-xl group hover:border-emerald-500/30 transition-all">
                            <div
                                class="w-12 h-12 rounded-2xl bg-emerald-500/10 flex items-center justify-center text-emerald-400 mb-6 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-black text-white mb-3 tracking-tight">
                                {{ t('footer.address_label', 'Адрес') }}
                            </h3>
                            <p class="text-slate-300 leading-relaxed mb-6">
                                {!! nl2br(e(t('footer.address'))) !!}
                            </p>
                            <a href="https://maps.google.com" target="_blank"
                                class="inline-flex items-center gap-2 text-emerald-400 text-xs font-black uppercase tracking-widest hover:gap-3 transition-all">
                                {{ t('common.show_on_map', 'Показать на карте') }}
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                            </a>
                        </div>

                        {{-- Phone --}}
                        <div
                            class="bg-white/5 border border-white/5 rounded-[2rem] p-8 backdrop-blur-xl group hover:border-blue-500/30 transition-all">
                            <div
                                class="w-12 h-12 rounded-2xl bg-blue-500/10 flex items-center justify-center text-blue-400 mb-6 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-black text-white mb-4 tracking-tight">{{ t('footer.contacts') }}
                            </h3>
                            <div class="space-y-4">
                                <div class="flex flex-col">
                                    <span
                                        class="text-[10px] font-black uppercase tracking-widest text-slate-500 mb-1">{{ t('footer.phone_label', 'Телефон') }}</span>
                                    <a href="tel:+998712000000"
                                        class="text-lg font-bold text-white hover:text-blue-400 transition-colors">+998
                                        71 200-00-00</a>
                                </div>
                                <div class="flex flex-col">
                                    <span
                                        class="text-[10px] font-black uppercase tracking-widest text-slate-500 mb-1">{{ t('footer.helpline_label', 'Горячая линия') }}</span>
                                    <a href="tel:+998712000001"
                                        class="text-lg font-bold text-white hover:text-blue-400 transition-colors">+998
                                        71 200-00-01</a>
                                </div>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div
                            class="bg-white/5 border border-white/5 rounded-[2rem] p-8 backdrop-blur-xl group hover:border-purple-500/30 transition-all">
                            <div
                                class="w-12 h-12 rounded-2xl bg-purple-500/10 flex items-center justify-center text-purple-400 mb-6 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-black text-white mb-4 tracking-tight">Email</h3>
                            <div class="space-y-4">
                                <div class="flex flex-col">
                                    <span
                                        class="text-[10px] font-black uppercase tracking-widest text-slate-500 mb-1">{{ t('common.general_questions', 'Общие вопросы') }}</span>
                                    <a href="mailto:info@uzex.uz"
                                        class="text-lg font-bold text-white hover:text-purple-400 transition-colors">info@uzex.uz</a>
                                </div>
                                <div class="flex flex-col">
                                    <span
                                        class="text-[10px] font-black uppercase tracking-widest text-slate-500 mb-1">{{ t('common.tech_support', 'Техподдержка') }}</span>
                                    <a href="mailto:support@uzex.uz"
                                        class="text-lg font-bold text-white hover:text-purple-400 transition-colors">support@uzex.uz</a>
                                </div>
                            </div>
                        </div>

                        {{-- Working Hours --}}
                        <div
                            class="bg-white/5 border border-white/5 rounded-[2rem] p-8 backdrop-blur-xl group hover:border-orange-500/30 transition-all">
                            <div
                                class="w-12 h-12 rounded-2xl bg-orange-500/10 flex items-center justify-center text-orange-400 mb-6 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-black text-white mb-4 tracking-tight">
                                {{ t('footer.working_hours_label') }}
                            </h3>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center">
                                    <span
                                        class="text-sm text-slate-500 font-bold uppercase tracking-wider">{{ t('common.mon_fri', 'Пн - Пт') }}</span>
                                    <span class="text-sm font-black text-white">09:00 - 18:00</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span
                                        class="text-sm text-slate-500 font-bold uppercase tracking-wider">{{ t('common.sat_sun', 'Сб - Вс') }}</span>
                                    <span
                                        class="text-sm font-black text-rose-500">{{ t('common.holiday', 'Выходной') }}</span>
                                </div>
                                <div class="mt-4 p-3 bg-white/5 rounded-xl border border-white/5 text-center">
                                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-300">
                                        {{ t('footer.working_hours') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Contact Form --}}
                <div class="lg:col-span-4">
                    <div
                        class="bg-white/5 border border-white/5 rounded-[2.5rem] p-8 lg:p-10 backdrop-blur-xl sticky top-8">
                        <h3 class="text-2xl font-black text-white mb-6 tracking-tight">
                            {{ t('common.write_to_us', 'Напишите нам') }}
                        </h3>
                        <livewire:contacts.contact-form />
                    </div>
                </div>
            </div>

            {{-- Regional offices Section --}}
            <div class="mt-20">
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 mb-12">
                    <div>
                        <div class="h-1.5 w-24 bg-gradient-to-r from-emerald-500 to-blue-500 rounded-full mb-6"></div>
                        <h2 class="text-3xl lg:text-4xl font-black text-white tracking-tight">
                            {{ t('pages.regional_offices', "Mintaqaviy ofislar") }}
                        </h2>
                    </div>
                    <a href="{{ route('regions') }}"
                        class="inline-flex items-center gap-2 bg-white/5 border border-white/10 hover:border-emerald-500/50 px-8 py-4 rounded-2xl text-white font-bold transition-all">
                        {{ t('common.view_all_offices', 'Все офисы') }}
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>

                {{-- Map Placeholder / Component --}}
                <div
                    class="bg-white/5 border border-white/5 rounded-[3rem] overflow-hidden backdrop-blur-xl relative aspect-video lg:aspect-[21/9]">
                    <livewire:contacts.interactive-map />
                </div>
            </div>
        </div>
    </section>
</x-app>