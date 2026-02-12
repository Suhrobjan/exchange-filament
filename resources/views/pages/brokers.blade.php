<x-app :title="t('header.brokers') . ' — ' . t('footer.company_name')">
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
                <span class="text-emerald-400">{{ t('header.brokers') }}</span>
            </nav>

            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-12">
                <div class="max-w-3xl">
                    <h1 class="text-4xl lg:text-6xl font-black text-white mb-6 leading-tight tracking-tight">
                        {{ t('pages.brokers_title') }}
                    </h1>
                    <div class="h-1.5 w-24 bg-gradient-to-r from-emerald-500 to-blue-500 rounded-full mb-8"></div>
                    <p class="text-slate-300 text-lg lg:text-xl font-medium leading-relaxed">
                        {{ t('pages.brokers_subtitle') }}
                    </p>
                </div>

                {{-- Quick Filters --}}
                <div
                    class="flex flex-col sm:flex-row items-center gap-4 bg-white/5 border border-white/5 p-2 rounded-3xl backdrop-blur-xl">
                    <div class="relative w-full sm:w-64">
                        <input type="text"
                            class="w-full bg-transparent border-none focus:ring-0 text-white placeholder-slate-500 text-sm py-3 px-10 rounded-2xl"
                            placeholder="{{ t('common.search_brokers') }}">
                        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-500" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <select
                        class="w-full sm:w-auto bg-white/5 border-none focus:ring-0 text-white text-sm py-3 px-8 rounded-2xl cursor-pointer hover:bg-white/10 transition-colors">
                        <option value="" class="bg-[#0a1628]">{{ t('common.all_regions') }}</option>
                        <option value="tashkent" class="bg-[#0a1628]">Ташкент</option>
                        <option value="samarkand" class="bg-[#0a1628]">Самарканд</option>
                    </select>
                </div>
            </div>
        </div>
    </section>

    {{-- Brokers Grid Section --}}
    <section class="relative z-10 pb-24">
        <div class="container-exchange">
            @if($brokers->isEmpty())
                <div class="bg-white/5 border border-white/5 rounded-[3rem] p-20 text-center backdrop-blur-xl">
                    <div
                        class="w-24 h-24 bg-white/5 rounded-3xl flex items-center justify-center mx-auto mb-8 text-slate-700">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <p class="text-slate-300 text-lg font-medium">{{ t('common.no_brokers') }}</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($brokers as $broker)
                        <div
                            class="group relative bg-white/5 border border-white/5 rounded-[2.5rem] p-8 backdrop-blur-xl hover:bg-white/10 hover:border-emerald-500/30 transition-all duration-500 overflow-hidden flex flex-col {{ $broker->is_top ? 'ring-2 ring-emerald-500/30 ring-offset-4 ring-offset-[#0a1628]' : '' }}">

                            @if($broker->is_top)
                                <div
                                    class="absolute top-0 right-0 bg-gradient-to-l from-emerald-500 to-emerald-400 text-slate-950 text-[10px] font-black px-6 py-2 rounded-bl-3xl shadow-lg z-10 uppercase tracking-widest">
                                    {{ t('home.top_label') }}
                                </div>
                            @endif

                            <div class="flex items-start justify-between mb-8">
                                <div
                                    class="w-20 h-20 rounded-3xl bg-white border border-white/10 flex items-center justify-center p-3 overflow-hidden shadow-xl group-hover:scale-105 transition-transform duration-500">
                                    @if($broker->logo)
                                        <img src="{{ Storage::url($broker->logo) }}" alt="{{ $broker->name }}"
                                            class="w-full h-full object-contain">
                                    @else
                                        <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                    @endif
                                </div>

                                <div class="flex flex-col items-end gap-2">
                                    @if($broker->is_verified)
                                        <div
                                            class="flex items-center gap-2 text-emerald-400 bg-emerald-500/5 px-3 py-1 rounded-full border border-emerald-500/20">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span
                                                class="text-[10px] font-black uppercase tracking-widest">{{ t('common.verified') }}</span>
                                        </div>
                                    @endif

                                    @if($broker->rating)
                                        <div class="flex items-center gap-1 text-emerald-400">
                                            @for($i = 0; $i < 5; $i++)
                                                <svg class="w-3.5 h-3.5 {{ $i < $broker->rating ? 'fill-current' : 'text-slate-700/50' }}"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            @endfor
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="flex-grow">
                                <h3
                                    class="text-2xl font-black text-white mb-6 leading-tight min-h-[4rem] group-hover:text-emerald-400 transition-colors">
                                    {{ $broker->name }}
                                </h3>

                                <div class="space-y-4 mb-8">
                                    <div class="flex items-center gap-4 text-slate-400 group/item">
                                        <div
                                            class="w-8 h-8 rounded-xl bg-white/5 flex items-center justify-center flex-shrink-0 group-hover/item:bg-emerald-500/10 group-hover/item:text-emerald-400 transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                            </svg>
                                        </div>
                                        <div class="flex flex-col">
                                            <span
                                                class="text-[10px] font-black uppercase tracking-widest text-slate-500">{{ t('common.license') }}</span>
                                            <span class="text-sm font-bold text-slate-300">{{ $broker->license_number }}</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-4 text-slate-400 group/item">
                                        <div
                                            class="w-8 h-8 rounded-xl bg-white/5 flex items-center justify-center flex-shrink-0 group-hover/item:bg-blue-500/10 group-hover/item:text-blue-400 transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                        </div>
                                        <div class="flex flex-col">
                                            <span
                                                class="text-[10px] font-black uppercase tracking-widest text-slate-500">{{ t('common.phone') }}</span>
                                            <a href="tel:{{ $broker->phone }}"
                                                class="text-sm font-bold text-slate-300 group-hover/item:text-white transition-colors">{{ $broker->phone }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if($broker->tags && count($broker->tags) > 0)
                                <div class="flex flex-wrap gap-2 mb-8">
                                    @foreach($broker->tags as $tag)
                                        <span
                                            class="px-3 py-1 bg-white/5 border border-white/5 rounded-lg text-slate-500 text-[10px] font-black uppercase tracking-widest transition-colors hover:border-emerald-500/30">
                                            {{ $tag }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif

                            <a href="{{ route('brokers.show', $broker->slug) }}"
                                class="w-full bg-white/5 border border-white/10 text-white font-black uppercase tracking-widest py-4 rounded-2xl text-xs text-center group-hover:bg-emerald-500 group-hover:text-slate-950 group-hover:border-emerald-500 transition-all duration-300">
                                {{ t('home.learn_more') }}
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    {{-- CTA --}}
    <section class="relative z-10 py-24 bg-white/5 backdrop-blur-md">
        <div class="container-exchange text-center max-w-2xl">
            <h2 class="text-3xl font-black text-white mb-6 uppercase tracking-tight">{{ t('pages.become_broker') }}</h2>
            <p class="text-slate-400 mb-10 text-lg leading-relaxed">
                {{ t('pages.submit_accreditation_desc', 'Пройдите процедуру аккредитации и получите статус профессионального участника биржевого рынка.') }}
            </p>
            <a href="{{ route('accreditation') }}"
                class="inline-block bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-black uppercase tracking-widest px-12 py-5 rounded-2xl shadow-xl transition-all hover:scale-105 active:scale-[0.98]">
                {{ t('pages.submit_accreditation') }}
            </a>
        </div>
    </section>
</x-app>