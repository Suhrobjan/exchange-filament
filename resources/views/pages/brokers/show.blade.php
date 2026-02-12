<x-app :title="$broker->name . ' — ' . t('footer.company_name')">
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
                <a href="{{ route('brokers') }}"
                    class="text-slate-500 hover:text-emerald-400 transition-colors">{{ t('header.brokers') }}</a>
                <svg class="w-3 h-3 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
                </svg>
                <span class="text-emerald-400">{{ $broker->name }}</span>
            </nav>

            <div class="flex flex-col md:flex-row gap-12 items-start">
                {{-- Broker Logo --}}
                <div class="relative group">
                    <div
                        class="absolute inset-0 bg-emerald-500 blur-2xl opacity-10 group-hover:opacity-20 transition-opacity">
                    </div>
                    <div
                        class="relative w-40 h-40 lg:w-48 lg:h-48 rounded-[3rem] bg-white p-8 flex items-center justify-center shrink-0 shadow-2xl shadow-black/50 border border-white/10 group-hover:scale-105 transition-transform duration-500">
                        @if($broker->logo)
                            <img src="{{ Storage::url($broker->logo) }}" alt="{{ $broker->name }}"
                                class="w-full h-full object-contain">
                        @else
                            <svg class="w-20 h-20 text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        @endif
                    </div>
                </div>

                <div class="flex-grow pt-4">
                    <div class="flex flex-wrap items-center gap-4 mb-6">
                        @if($broker->is_top)
                            <span
                                class="bg-gradient-to-r from-emerald-500 to-emerald-400 text-slate-950 text-[10px] font-black px-4 py-1.5 rounded-full uppercase tracking-widest shadow-lg shadow-emerald-500/20">
                                ТОП Брокер
                            </span>
                        @endif
                        @if($broker->is_verified)
                            <div
                                class="flex items-center gap-2 text-blue-400 bg-blue-500/10 px-4 py-1.5 rounded-full border border-blue-500/20">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span
                                    class="text-[10px] font-black uppercase tracking-widest">{{ t('common.verified') }}</span>
                            </div>
                        @endif
                        @if($broker->rating)
                            <div
                                class="flex items-center gap-1.5 text-emerald-400 bg-white/5 py-1.5 px-4 rounded-full border border-white/5">
                                @for($i = 0; $i < 5; $i++)
                                    <svg class="w-4 h-4 {{ $i < $broker->rating ? 'fill-current' : 'text-slate-700/50' }}"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                                <span class="text-xs font-black ml-1">{{ $broker->rating }}.0</span>
                            </div>
                        @endif
                    </div>

                    <h1 class="text-4xl lg:text-5xl font-black text-white mb-6 leading-tight tracking-tight">
                        {{ $broker->name }}
                    </h1>

                    @if($broker->tags && count($broker->tags) > 0)
                        <div class="flex flex-wrap gap-2">
                            @foreach($broker->tags as $tag)
                                <span
                                    class="px-4 py-2 bg-white/5 border border-white/5 rounded-2xl text-slate-400 text-xs font-bold uppercase tracking-wider hover:border-emerald-500/30 transition-colors">
                                    {{ $tag }}
                                </span>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- Content Section --}}
    <section class="relative z-10 pb-24">
        <div class="container-exchange">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                {{-- Main Info --}}
                <div class="lg:col-span-8">
                    <div class="bg-white/5 border border-white/5 rounded-[3rem] p-10 lg:p-14 backdrop-blur-xl">
                        <div class="flex items-center gap-4 mb-10">
                            <h2 class="text-3xl font-black text-white tracking-tight">{{ t('common.about_company') }}
                            </h2>
                            <div class="flex-1 h-px bg-white/10"></div>
                        </div>
                        <div class="prose prose-invert prose-emerald max-w-none text-slate-200
                            prose-headings:text-white prose-headings:font-black prose-headings:tracking-tight
                            prose-p:text-slate-200 prose-p:leading-relaxed prose-p:text-lg
                            prose-strong:text-white">
                            @if($broker->description)
                                {!! nl2br(e($broker->description)) !!}
                            @else
                                <p class="italic text-slate-500">{{ t('common.no_description') }}</p>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Sidebar Info --}}
                <div class="lg:col-span-4 space-y-8">
                    <div
                        class="bg-white/5 border border-white/5 rounded-[2.5rem] p-8 lg:p-10 backdrop-blur-xl group hover:border-emerald-500/30 transition-all">
                        <h3 class="text-2xl font-black text-white mb-10 tracking-tight">{{ t('common.contact_info') }}
                        </h3>

                        <div class="space-y-8">
                            {{-- Address --}}
                            <div class="flex gap-5 group/item">
                                <div
                                    class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center text-slate-500 group-hover/item:bg-emerald-500/10 group-hover/item:text-emerald-400 transition-all flex-shrink-0">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div class="flex-grow">
                                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-500 mb-2">
                                        {{ t('common.address') }}</p>
                                    <p class="text-sm font-bold text-slate-300 leading-relaxed">{{ $broker->address }}
                                    </p>
                                </div>
                            </div>

                            {{-- Phone --}}
                            <div class="flex gap-5 group/item">
                                <div
                                    class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center text-slate-500 group-hover/item:bg-blue-500/10 group-hover/item:text-blue-400 transition-all flex-shrink-0">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <div class="flex-grow">
                                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-500 mb-2">
                                        {{ t('common.phone') }}</p>
                                    <a href="tel:{{ $broker->phone }}"
                                        class="text-sm font-bold text-slate-300 group-hover/item:text-white transition-colors">{{ $broker->phone }}</a>
                                </div>
                            </div>

                            {{-- Email --}}
                            @if($broker->email)
                                <div class="flex gap-5 group/item">
                                    <div
                                        class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center text-slate-500 group-hover/item:bg-purple-500/10 group-hover/item:text-purple-400 transition-all flex-shrink-0">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div class="flex-grow">
                                        <p class="text-[10px] font-black uppercase tracking-widest text-slate-500 mb-2">
                                            {{ t('common.email') }}</p>
                                        <a href="mailto:{{ $broker->email }}"
                                            class="text-sm font-bold text-slate-300 group-hover/item:text-white transition-colors">{{ $broker->email }}</a>
                                    </div>
                                </div>
                            @endif

                            {{-- Website --}}
                            @if($broker->website)
                                <div class="flex gap-5 group/item">
                                    <div
                                        class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center text-slate-500 group-hover/item:bg-accent-500/10 group-hover/item:text-accent-400 transition-all flex-shrink-0">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                        </svg>
                                    </div>
                                    <div class="flex-grow">
                                        <p class="text-[10px] font-black uppercase tracking-widest text-slate-500 mb-2">
                                            {{ t('common.website') }}</p>
                                        <a href="{{ $broker->website }}" target="_blank" rel="nofollow"
                                            class="text-sm font-bold text-slate-300 group-hover/item:text-white transition-colors">{{ t('common.visit_website') }}</a>
                                    </div>
                                </div>
                            @endif
                        </div>

                        {{-- License --}}
                        <div class="mt-12 p-6 bg-white/5 rounded-3xl border border-white/5 relative group/license">
                            <div class="relative z-10 text-center">
                                <p class="text-[10px] font-black uppercase tracking-widest text-slate-500 mb-2">
                                    {{ t('common.license') }}</p>
                                <p
                                    class="font-mono text-base font-black text-white group-hover/license:text-emerald-400 transition-colors">
                                    {{ $broker->license_number }}
                                </p>
                            </div>
                        </div>

                        {{-- Action Button --}}
                        <a href="tel:{{ $broker->phone }}"
                            class="w-full bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-black uppercase tracking-widest py-5 rounded-2xl shadow-xl transition-all hover:scale-[1.02] active:scale-[0.98] mt-8 flex items-center justify-center gap-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            {{ t('common.contact_broker') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app>