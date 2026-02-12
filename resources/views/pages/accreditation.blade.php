<x-app :title="$page->title . ' — ' . t('footer.company_name')">
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
                <span class="text-emerald-400">{{ $page->title }}</span>
            </nav>

            <div class="max-w-3xl">
                <h1 class="text-4xl lg:text-6xl font-black text-white mb-6 leading-tight tracking-tight">
                    {{ $page->title }}
                </h1>
                <div class="h-1.5 w-24 bg-gradient-to-r from-emerald-500 to-blue-500 rounded-full mb-8"></div>
                <p class="text-slate-300 text-lg lg:text-xl font-medium leading-relaxed">
                    {{ t('pages.accreditation_subtitle', 'Станьте полноправным участником биржевых торгов за несколько простых шагов.') }}
                </p>
            </div>
        </div>
    </section>

    {{-- Steps Section --}}
    <section class="relative z-10 pb-24">
        <div class="container-exchange">
            <div class="flex items-center gap-4 mb-12">
                <h2 class="text-3xl lg:text-4xl font-black text-white tracking-tight">{{ t('common.accreditation_steps', 'Этапы аккредитации') }}</h2>
                <div class="flex-1 h-px bg-white/10"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @php
                    $steps = [
                        ['num' => 1, 'title' => t('common.step_1_title', 'Подача заявки'), 'desc' => t('common.step_1_desc', 'Заполните заявку онлайн через персональный кабинет')],
                        ['num' => 2, 'title' => t('common.step_2_title', 'Документы'), 'desc' => t('common.step_2_desc', 'Прикрепите необходимые скан-копии документов в систему')],
                        ['num' => 3, 'title' => t('common.step_3_title', 'Рассмотрение'), 'desc' => t('common.step_3_desc', 'Проверка данных занимает от 1 до 3 рабочих дней')],
                        ['num' => 4, 'title' => t('common.step_4_title', 'Готово'), 'desc' => t('common.step_4_desc', 'Получите статус участника и доступ к торгам')],
                    ];
                @endphp

                @foreach($steps as $step)
                    <div class="group relative bg-white/5 border border-white/5 rounded-[2.5rem] p-8 backdrop-blur-xl hover:bg-white/10 hover:border-emerald-500/30 transition-all text-center">
                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-emerald-500 to-blue-500 flex items-center justify-center text-slate-950 font-black text-2xl mx-auto mb-8 shadow-lg group-hover:scale-110 transition-transform">
                            {{ $step['num'] }}
                        </div>
                        <h3 class="text-xl font-black text-white mb-4 tracking-tight group-hover:text-emerald-400 transition-colors">
                            {{ $step['title'] }}
                        </h3>
                        <p class="text-slate-300 text-sm leading-relaxed">
                            {{ $step['desc'] }}
                        </p>
                        
                        @if($step['num'] < 4)
                            <div class="hidden lg:block absolute top-[20%] -right-10 z-20">
                                <svg class="w-12 h-12 text-white/5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7" />
                                </svg>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Content Area --}}
    <section class="relative z-10 py-24 bg-white/5 backdrop-blur-md">
        <div class="container-exchange">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                {{-- Main Info --}}
                <div class="lg:col-span-8">
                    <div class="bg-white/5 border border-white/5 rounded-[3rem] p-10 lg:p-14 backdrop-blur-xl">
                        <div class="prose prose-invert prose-emerald max-w-none text-slate-200
                            prose-headings:text-white prose-headings:font-black prose-headings:tracking-tight
                            prose-p:text-slate-200 prose-p:leading-relaxed prose-p:text-lg
                            prose-strong:text-white prose-ul:text-slate-200 prose-li:my-2">
                            {!! $page->content !!}
                        </div>
                    </div>
                </div>

                {{-- Requirements / Sidebar --}}
                <div class="lg:col-span-4 space-y-8">
                    {{-- Legal Entities Card --}}
                    <div class="bg-white/5 border border-white/5 rounded-[2.5rem] p-8 backdrop-blur-xl group hover:border-blue-500/30 transition-all">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="w-12 h-12 rounded-2xl bg-blue-500/10 flex items-center justify-center text-blue-400 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-black text-white tracking-tight">{{ t('common.for_legal_entities', 'Юридическим лицам') }}</h3>
                        </div>
                        <ul class="space-y-4">
                            @foreach([
                                t('common.req_statement', 'Заявление установленного образца'),
                                t('common.req_registration', 'Копия регистрационного свидетельства'),
                                t('common.req_charter', 'Копия Устава организации'),
                                t('common.req_bank_cert', 'Справка из банка об открытии счета'),
                                t('common.req_director_id', 'Паспортные данные руководителя')
                            ] as $req)
                                <li class="flex items-start gap-4 text-sm text-slate-400 group-hover:text-slate-300 transition-colors">
                                    <svg class="w-5 h-5 text-emerald-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                    {{ $req }}
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Individual Card --}}
                    <div class="bg-white/5 border border-white/5 rounded-[2.5rem] p-8 backdrop-blur-xl group hover:border-purple-500/30 transition-all">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="w-12 h-12 rounded-2xl bg-purple-500/10 flex items-center justify-center text-purple-400 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-black text-white tracking-tight">{{ t('common.for_individuals', 'Физическим лицам') }}</h3>
                        </div>
                        <ul class="space-y-4">
                            @foreach([
                                t('common.req_passport', 'Копия паспорта (ID-карты)'),
                                t('common.req_pinfl', 'ПИНФЛ и ИНН'),
                                t('common.req_bank_details', 'Реквизиты банковской карты (UZCARD/HUMO)'),
                                t('common.req_mobile', 'Зарегистрированный номер телефона')
                            ] as $req)
                                <li class="flex items-start gap-4 text-sm text-slate-400 group-hover:text-slate-300 transition-colors">
                                    <svg class="w-5 h-5 text-emerald-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                    {{ $req }}
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Help Banner --}}
                    <div class="bg-gradient-to-br from-emerald-600 to-emerald-400 rounded-3xl p-8 text-center shadow-lg transform hover:-translate-y-1 transition-all">
                        <h4 class="text-slate-950 font-black mb-4 uppercase tracking-widest text-sm">{{ t('common.need_help', 'Нужна помощь?') }}</h4>
                        <p class="text-emerald-900 text-xs font-bold leading-relaxed mb-6">
                            {{ t('pages.accreditation_help_text', 'Наши специалисты бесплатно проконсультируют вас по всем вопросам аккредитации.') }}
                        </p>
                        <a href="{{ route('contacts') }}" class="inline-block bg-slate-950 text-white px-8 py-3 rounded-xl text-xs font-black uppercase tracking-widest hover:bg-slate-800 transition-all">
                            {{ t('common.contact_us', 'Связаться') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Final CTA --}}
    <section class="relative z-10 py-24 overflow-hidden">
        <div class="container-exchange">
            <div class="bg-gradient-to-r from-blue-600 to-blue-400 rounded-[3rem] p-12 lg:p-16 text-center relative overflow-hidden group shadow-[0_20px_60px_rgba(0,0,0,0.3)]">
                <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition-colors"></div>
                <div class="relative z-10 max-w-2xl mx-auto">
                    <h2 class="text-3xl lg:text-4xl font-black text-white mb-6 tracking-tight">{{ t('common.apply_online', 'Подайте заявку онлайн') }}</h2>
                    <p class="text-blue-100 mb-10 text-lg font-medium">
                        {{ t('pages.accreditation_cta_desc', 'Зарегистрируйтесь в системе и начните торги прямо сейчас через персональный кабинет участника.') }}
                    </p>
                    <a href="#" class="inline-block bg-white text-blue-600 px-12 py-5 rounded-2xl text-base font-black uppercase tracking-widest shadow-xl hover:scale-105 transition-transform active:scale-[0.98]">
                        {{ t('common.personal_cabinet', 'Личный кабинет') }}
                    </a>
                </div>
                {{-- Decorative Icon --}}
                <div class="absolute -bottom-10 -right-10 text-white/10 rotate-12 pointer-events-none">
                    <svg class="w-64 h-64" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14h-2V9h-2V7h4v10z"/>
                    </svg>
                </div>
            </div>
        </div>
    </section>
</x-app>