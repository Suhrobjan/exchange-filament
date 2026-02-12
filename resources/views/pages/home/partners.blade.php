{{-- Partners & Associations Section --}}
<section class="py-20 bg-[#0a1628] relative overflow-hidden text-left">
    {{-- Background Pattern --}}
    <div class="absolute inset-0 opacity-10 pointer-events-none">
        <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
            <defs>
                <pattern id="partners-grid-dark" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                    <path d="M 20 0 L 0 0 0 20" fill="none" stroke="#10b981" stroke-width="0.1" />
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#partners-grid-dark)" />
        </svg>
    </div>

    <div class="container-exchange relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            {{-- Associations --}}
            <div>
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-1 h-8 bg-emerald-500 rounded-full"></div>
                    <h2 class="text-3xl font-black text-white tracking-tight">{{ t('home.associations') }}</h2>
                </div>
                <div class="grid grid-cols-2 gap-4 text-left">
                    @php
                        $associations = [
                            ['name' => t('assoc.atb'), 'logo' => 'atb.png'],
                            ['name' => t('assoc.tpp'), 'logo' => 'tpp.png'],
                            ['name' => t('assoc.sp'), 'logo' => 'sp.png'],
                            ['name' => t('assoc.aps'), 'logo' => 'aps.png'],
                        ];
                    @endphp
                    @foreach($associations as $assoc)
                        <div
                            class="bg-white/5 backdrop-blur-md border border-white/5 rounded-2xl p-6 flex flex-col items-start justify-center text-left h-36 hover:bg-white/10 hover:border-emerald-500/30 transition-all group">
                            <div class="h-14 flex items-center justify-start mb-3">
                                <img src="/logo_universal_exchange.svg" alt="logo"
                                    class="h-8 w-auto opacity-50 group-hover:opacity-100 transition-opacity">
                            </div>
                            <p
                                class="text-[10px] text-slate-500 font-black uppercase tracking-widest line-clamp-2 group-hover:text-emerald-400 transition-colors">
                                {{ $assoc['name'] }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Strategic Partners --}}
            <div>
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-1 h-8 bg-[#10b981] rounded-full"></div>
                    <h2 class="text-3xl font-black text-white tracking-tight">{{ t('home.our_partners') }}</h2>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                    @php
                        $partners = [
                            ['name' => t('partner.me'), 'initials' => 'МЭ'],
                            ['name' => t('partner.mf'), 'initials' => 'МФ'],
                            ['name' => t('partner.cb'), 'initials' => 'ЦБ'],
                            ['name' => t('partner.psb'), 'initials' => 'ПСБ'],
                            ['name' => t('partner.ngmk'), 'initials' => 'НГМК'],
                            ['name' => t('partner.agmk'), 'initials' => 'АГМК'],
                        ];
                    @endphp
                    @foreach($partners as $partner)
                        <div
                            class="bg-white/5 backdrop-blur-md border border-white/5 rounded-2xl p-6 flex flex-col items-start justify-center text-left h-32 hover:bg-white/10 hover:border-emerald-500/30 transition-all group">
                            <div class="h-10 flex items-center justify-start mb-2">
                                <div
                                    class="w-10 h-10 rounded-lg bg-emerald-500/10 flex items-center justify-center font-black text-emerald-400 group-hover:scale-110 transition-transform text-xs">
                                    {{ $partner['initials'] }}
                                </div>
                            </div>
                            <p
                                class="text-[10px] text-slate-500 font-black uppercase tracking-widest line-clamp-2 group-hover:text-emerald-400 transition-colors">
                                {{ $partner['name'] }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>