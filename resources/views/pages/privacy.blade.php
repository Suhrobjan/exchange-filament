<x-app :title="t('common.privacy_policy', 'Политика конфиденциальности') . ' — ' . t('footer.company_name')">
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
                <span class="text-emerald-400">{{ t('common.privacy_policy', 'Политика конфиденциальности') }}</span>
            </nav>

            <div class="max-w-3xl">
                <h1 class="text-4xl lg:text-6xl font-black text-white mb-6 leading-tight tracking-tight">
                    {{ t('common.privacy_policy', 'Политика конфиденциальности') }}
                </h1>
                <div class="h-1.5 w-24 bg-gradient-to-r from-emerald-500 to-blue-500 rounded-full mb-8"></div>
            </div>
        </div>
    </section>

    {{-- Main Content --}}
    <section class="relative z-10 pb-24">
        <div class="container-exchange">
            <div class="bg-white/5 border border-white/5 rounded-[2.5rem] p-8 lg:p-16 backdrop-blur-xl">
                <div
                    class="prose prose-invert prose-emerald max-w-none text-slate-200 prose-p:text-slate-200 prose-headings:text-white prose-headings:font-black prose-li:text-slate-200">
                    <p>
                        {{ t('pages.privacy_intro', 'Настоящая Политика конфиденциальности регулирует порядок обработки и защиты персональной информации пользователей АО «УзРТСБ» при использовании услуг и сервисов биржи.') }}
                    </p>

                    <h2>1. {{ t('pages.privacy_section1_title', 'Общие положения') }}</h2>
                    <p>
                        {{ t('pages.privacy_section1_text', 'Использование сервисов биржи означает безоговорочное согласие пользователя с настоящей Политикой и указанными в ней условиями обработки его персональной информации.') }}
                    </p>

                    <h2>2. {{ t('pages.privacy_section2_title', 'Персональная информация') }}</h2>
                    <p>
                        {{ t('pages.privacy_section2_text', 'В рамках настоящей Политики под персональной информацией понимается персональная информация, которую пользователь предоставляет о себе самостоятельно при регистрации или в процессе использования сервисов.') }}
                    </p>

                    <h2>3. {{ t('pages.privacy_section3_title', 'Цели обработки') }}</h2>
                    <ul>
                        <li>{{ t('pages.privacy_goal1', 'Идентификация стороны в рамках соглашений и договоров с биржей;') }}
                        </li>
                        <li>{{ t('pages.privacy_goal2', 'Предоставление пользователю персонализированных сервисов;') }}
                        </li>
                        <li>{{ t('pages.privacy_goal3', 'Связь с пользователем, включая направление уведомлений, запросов и информации;') }}
                        </li>
                        <li>{{ t('pages.privacy_goal4', 'Улучшение качества работы сервисов и разработка новых.') }}
                        </li>
                    </ul>

                    <h2>4. {{ t('pages.privacy_section4_title', 'Защита информации') }}</h2>
                    <p>
                        {{ t('pages.privacy_section4_text', 'Биржа принимает необходимые и достаточные организационные и технические меры для защиты персональной информации пользователя от неправомерного или случайного доступа, уничтожения, изменения, блокирования, копирования, распространения.') }}
                    </p>

                    <div class="mt-12 p-8 bg-white/5 rounded-3xl border border-white/5">
                        <p class="text-sm italic m-0">
                            {{ t('pages.privacy_update_notice', 'Биржа имеет право вносить изменения в настоящую Политику конфиденциальности. При внесении изменений в актуальной редакции указывается дата последнего обновления.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app>