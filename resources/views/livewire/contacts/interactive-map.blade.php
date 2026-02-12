<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start" x-data="{ activeRegion: @entangle('selectedRegionCode') }">
    {{-- Map Column --}}
    <div class="lg:col-span-7 xl:col-span-8 bg-white/5 border border-white/5 rounded-[2.5rem] p-8 lg:p-12 backdrop-blur-xl relative group">
        <div class="absolute top-6 left-6 z-20">
            <span class="text-[10px] font-black uppercase tracking-[0.3em] text-emerald-500/50 block mb-2">{{ t('pages.map_instruction', 'Выберите регион') }}</span>
        </div>
        
        <div class="relative z-10"
             @click="if ($event.target.tagName === 'path' && $event.target.id && $event.target.id !== 'UZ-ARAL') $wire.selectRegion($event.target.id)"
             x-init="
                $watch('activeRegion', value => {
                    $el.querySelectorAll('path').forEach(p => p.classList.toggle('active', p.id === value));
                });
                $el.querySelectorAll('path').forEach(p => p.classList.toggle('active', p.id === activeRegion));
             ">
            <x-uz-map 
                class="w-full h-auto drop-shadow-[0_20px_50px_rgba(16,185,129,0.1)] map-interactive"
            />
        </div>

        <style>
            .map-interactive path {
                fill: rgba(30, 41, 59, 0.5); /* slate-800/50 */
                stroke: rgba(255, 255, 255, 0.1); /* white/10 */
                transition: all 500ms ease-in-out;
                cursor: pointer;
                stroke-width: 1.5;
                vector-effect: non-scaling-stroke;
            }
            .map-interactive path:hover {
                fill: rgba(16, 185, 129, 0.2); /* emerald-500/20 */
                stroke: rgba(16, 185, 129, 0.5); /* emerald-500/50 */
            }
            .map-interactive path.active {
                fill: #10b981; /* emerald-500 */
                stroke: #0f172a; /* slate-950 */
                stroke-width: 2.5;
                filter: drop-shadow(0 0 15px rgba(16, 185, 129, 0.4));
            }
        </style>

    </div>

    {{-- Info Column --}}
    <div class="lg:col-span-5 xl:col-span-4 sticky top-8">
        @if ($regionalOffice)
            <div class="space-y-6" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0">
                
                {{-- Office Card --}}
                <div class="bg-gradient-to-br from-emerald-500/10 to-blue-500/10 border border-emerald-500/20 rounded-[2.5rem] p-8 backdrop-blur-xl relative overflow-hidden group">
                    <div class="absolute -top-12 -right-12 w-32 h-32 bg-emerald-500/10 rounded-full blur-3xl group-hover:bg-emerald-500/20 transition-colors duration-700"></div>
                    
                    <div class="mb-8 relative z-10">
                        <h3 class="text-2xl font-black text-white leading-tight mb-2">{{ $regionalOffice->getTranslation('name', app()->getLocale()) }}</h3>
                        <div class="flex items-center gap-2">
                             <div class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></div>
                             <span class="text-[10px] font-black uppercase tracking-widest text-emerald-400">Филиал активен</span>
                        </div>
                    </div>

                    {{-- Manager Info (if present) --}}
                    @if($regionalOffice->manager_name)
                        <div class="p-6 my-6 bg-white/5 border border-white/5 rounded-3xl flex items-center gap-4 group/manager transition-all hover:bg-white/10 relative z-10">
                            @if($regionalOffice->manager_photo)
                                <img src="{{ asset('storage/' . $regionalOffice->manager_photo) }}" alt="Manager" class="w-14 h-14 rounded-2xl object-cover border border-white/10 group-hover/manager:border-emerald-500/50 transition-all">
                            @else
                                <div class="w-14 h-14 rounded-2xl bg-emerald-500/10 flex items-center justify-center text-emerald-400 border border-emerald-500/20">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                            @endif
                            <div>
                                <h4 class="font-bold text-white text-sm tracking-tight group-hover/manager:text-emerald-400 transition-colors">{{ is_array($regionalOffice->manager_name) ? $regionalOffice->getTranslation('manager_name', app()->getLocale()) : $regionalOffice->manager_name }}</h4>
                                <p class="text-xs text-slate-500 font-medium">{{ is_array($regionalOffice->manager_position) ? $regionalOffice->getTranslation('manager_position', app()->getLocale()) : $regionalOffice->manager_position }}</p>
                            </div>
                        </div>
                    @endif

                    <div class="space-y-4 relative z-10 pt-6 border-t border-white/5">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center flex-shrink-0 text-slate-400 group-hover:bg-emerald-500 group-hover:text-slate-950 transition-all duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <p class="text-slate-300 text-sm leading-relaxed">{{ $regionalOffice->getTranslation('address', app()->getLocale()) }}</p>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <a href="tel:{{ $regionalOffice->phone }}" class="bg-white/5 hover:bg-white/10 border border-white/5 p-4 rounded-2xl flex flex-col gap-1 transition-all">
                                <span class="text-[9px] font-black uppercase tracking-widest text-slate-500">{{ t('common.phone', 'Телефон') }}</span>
                                <span class="text-sm font-bold text-white">{{ $regionalOffice->phone }}</span>
                            </a>
                            @if($regionalOffice->email)
                                <a href="mailto:{{ $regionalOffice->email }}" class="bg-white/5 hover:bg-white/10 border border-white/5 p-4 rounded-2xl flex flex-col gap-1 transition-all">
                                    <span class="text-[9px] font-black uppercase tracking-widest text-slate-500">{{ t('common.email', 'Email') }}</span>
                                    <span class="text-sm font-bold text-white truncate">{{ $regionalOffice->email }}</span>
                                </a>
                            @endif
                        </div>

                        @if($regionalOffice->working_hours)
                        <div class="bg-white/5 border border-white/5 p-4 rounded-2xl flex items-center gap-4">
                            <div class="w-8 h-8 rounded-lg bg-emerald-500/10 flex items-center justify-center text-emerald-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <span class="text-xs font-medium text-slate-400">{{ is_array($regionalOffice->working_hours) ? $regionalOffice->getTranslation('working_hours', app()->getLocale()) : $regionalOffice->working_hours }}</span>
                        </div>
                        @endif
                    </div>

                    @if($regionalOffice->latitude && $regionalOffice->longitude)
                        <a href="https://www.google.com/maps/search/?api=1&query={{ $regionalOffice->latitude }},{{ $regionalOffice->longitude }}"
                           target="_blank"
                           class="mt-8 flex items-center justify-center gap-3 py-4 px-6 bg-white text-slate-950 rounded-2xl text-xs font-black uppercase tracking-widest hover:bg-emerald-400 transition-all duration-300 shadow-xl shadow-emerald-500/10">
                            <span>{{ t('common.show_on_map', 'Открыть в Картах') }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                    @endif
                </div>
            </div>
        @else
            <div class="h-full min-h-[400px] flex flex-col items-center justify-center text-center p-8 bg-white/5 border border-white/5 rounded-[2.5rem] backdrop-blur-xl">
                <div class="w-20 h-20 bg-emerald-500/10 rounded-3xl flex items-center justify-center text-emerald-400 mb-6 animate-pulse">
                     <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <h3 class="text-xl font-black text-white mb-3">{{ t('pages.map_instruction', 'Выберите регион') }}</h3>
                <p class="text-slate-400 text-sm leading-relaxed">{{ t('pages.map_instruction_desc', 'Нажмите на область на карте, чтобы увидеть контакты филиала.') }}</p>
            </div>
        @endif
        
        {{-- Loading State --}}
        <div wire:loading class="absolute inset-0 bg-slate-950/40 backdrop-blur-[2px] z-20 flex items-center justify-center rounded-[2.5rem]">
             <div class="w-12 h-12 border-4 border-emerald-500/20 border-t-emerald-500 rounded-full animate-spin"></div>
        </div>
    </div>
</div>
