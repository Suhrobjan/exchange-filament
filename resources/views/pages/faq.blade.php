<x-app :title="t('header.faq') . ' — ' . t('footer.company_name')">
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
                <span class="text-emerald-400">{{ t('header.faq') }}</span>
            </nav>

            <div class="max-w-3xl">
                <h1 class="text-4xl lg:text-6xl font-black text-white mb-6 leading-tight tracking-tight">
                    {{ t('header.faq') }}
                </h1>
                <div class="h-1.5 w-24 bg-gradient-to-r from-emerald-500 to-blue-500 rounded-full mb-8"></div>
                <p class="text-slate-300 text-lg lg:text-xl font-medium leading-relaxed">
                    {{ t('pages.faq_subtitle') }}
                </p>
            </div>
        </div>
    </section>

    {{-- FAQ Accordion --}}
    <section class="relative z-10 pb-24">
        <div class="container-exchange max-w-4xl">
            <div class="space-y-6" x-data="{ openItem: null }">
                @foreach($faqs as $index => $faq)
                    <div class="group bg-white/5 border border-white/5 rounded-[2.5rem] overflow-hidden transition-all duration-300 hover:bg-white/10 hover:border-emerald-500/30"
                        :class="openItem === {{ $index }} ? 'bg-white/10 border-emerald-500/20' : ''">
                        <button @click="openItem = openItem === {{ $index }} ? null : {{ $index }}"
                            class="w-full px-8 py-6 text-left flex items-center justify-between gap-6 transition-colors">
                            <span class="text-lg font-bold text-white group-hover:text-emerald-400 transition-colors"
                                :class="openItem === {{ $index }} ? 'text-emerald-400' : ''">
                                {{ $faq->getTranslation('question', app()->getLocale()) }}
                            </span>
                            <div class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center text-slate-500 group-hover:text-emerald-400 transition-all shrink-0"
                                :class="openItem === {{ $index }} ? 'rotate-180 bg-emerald-500/20 text-emerald-400' : ''">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </button>
                        <div x-show="openItem === {{ $index }}" x-collapse>
                            <div class="px-8 pb-8">
                                <div class="h-px w-12 bg-emerald-500/30 mb-6"></div>
                                <p class="text-slate-300 text-lg leading-relaxed font-medium">
                                    {{ $faq->getTranslation('answer', app()->getLocale()) }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- CTA --}}
            <div
                class="mt-16 bg-gradient-to-br from-emerald-600/20 to-blue-600/20 rounded-[2.5rem] p-12 lg:p-16 border border-white/5 backdrop-blur-xl text-center relative overflow-hidden group">
                <div
                    class="absolute inset-0 bg-emerald-500/5 opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none">
                </div>
                <h3 class="text-2xl lg:text-3xl font-black text-white mb-4 tracking-tight relative z-10">
                    {{ t('pages.faq_no_answer') }}
                </h3>
                <p class="text-slate-300 mb-10 relative z-10 max-w-xl mx-auto">
                    {{ t('pages.faq_cta_desc', 'Наша служба поддержки готова помочь вам в любое время.') }}
                </p>
                <a href="{{ route('contacts') }}"
                    class="inline-flex items-center justify-center px-10 py-5 bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-black uppercase tracking-widest rounded-2xl transition-all hover:scale-105 active:scale-95 shadow-xl relative z-10">
                    {{ t('common.contact_us') }}
                </a>
            </div>
        </div>
    </section>
</x-app>