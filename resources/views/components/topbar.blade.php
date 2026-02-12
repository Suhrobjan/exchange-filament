{{-- Top Bar - GOST Accessibility Panel, Phone, Social, Languages --}}
<div
    class="{{ request()->routeIs('home') ? 'bg-slate-950' : 'bg-[#0a1628]' }} text-white text-sm py-2 border-b border-white/5 transition-all duration-300">
    <div class="container-exchange">
        <div class="flex items-center justify-between">
            {{-- Left: GOST Accessibility Dropdown --}}
            <div x-data="{ 
                open: false,
                fontSize: localStorage.getItem('a11y_fontSize') || 'normal',
                colorScheme: localStorage.getItem('a11y_colorScheme') || 'normal',
                letterSpacing: localStorage.getItem('a11y_letterSpacing') === 'true',
                lineHeight: localStorage.getItem('a11y_lineHeight') === 'true',
                noImages: localStorage.getItem('a11y_noImages') === 'true',
                
                applySettings() {
                    // Remove all classes first
                    document.body.classList.remove(
                        'a11y-font-normal', 'a11y-font-large', 'a11y-font-xlarge',
                        'a11y-scheme-normal', 'a11y-scheme-bw', 'a11y-scheme-wb', 'a11y-scheme-yb', 'a11y-scheme-by',
                        'a11y-letter-spacing', 'a11y-line-height', 'a11y-no-images'
                    );
                    
                    // Apply font size
                    document.body.classList.add('a11y-font-' + this.fontSize);
                    
                    // Apply color scheme
                    document.body.classList.add('a11y-scheme-' + this.colorScheme);
                    
                    // Apply other settings
                    if (this.letterSpacing) document.body.classList.add('a11y-letter-spacing');
                    if (this.lineHeight) document.body.classList.add('a11y-line-height');
                    if (this.noImages) document.body.classList.add('a11y-no-images');
                },
                
                setFontSize(size) {
                    this.fontSize = size;
                    localStorage.setItem('a11y_fontSize', size);
                    this.applySettings();
                },
                
                setColorScheme(scheme) {
                    this.colorScheme = scheme;
                    localStorage.setItem('a11y_colorScheme', scheme);
                    this.applySettings();
                },
                
                toggleLetterSpacing() {
                    this.letterSpacing = !this.letterSpacing;
                    localStorage.setItem('a11y_letterSpacing', this.letterSpacing);
                    this.applySettings();
                },
                
                toggleLineHeight() {
                    this.lineHeight = !this.lineHeight;
                    localStorage.setItem('a11y_lineHeight', this.lineHeight);
                    this.applySettings();
                },
                
                toggleNoImages() {
                    this.noImages = !this.noImages;
                    localStorage.setItem('a11y_noImages', this.noImages);
                    this.applySettings();
                },
                
                resetAll() {
                    this.fontSize = 'normal';
                    this.colorScheme = 'normal';
                    this.letterSpacing = false;
                    this.lineHeight = false;
                    this.noImages = false;
                    localStorage.removeItem('a11y_fontSize');
                    localStorage.removeItem('a11y_colorScheme');
                    localStorage.removeItem('a11y_letterSpacing');
                    localStorage.removeItem('a11y_lineHeight');
                    localStorage.removeItem('a11y_noImages');
                    this.applySettings();
                },
                
                init() {
                    this.applySettings();
                }
            }" class="relative">
                <button @click="open = !open" @click.away="open = false"
                    class="flex items-center gap-2 px-4 py-1.5 rounded-full border border-emerald-500/50 text-emerald-400 hover:bg-emerald-500/10 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <span class="text-xs font-medium hidden sm:inline">{{ t('topbar.accessibility') }}</span>
                    <svg class="w-3 h-3 transition-transform" :class="{ 'rotate-180': open }" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                {{-- GOST Accessibility Panel --}}
                <div x-show="open" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 translate-y-1"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 translate-y-1"
                    class="absolute left-0 mt-2 bg-white rounded-xl shadow-2xl border border-slate-200 p-4 min-w-[320px] z-[9999]">
                    <div class="text-sm font-bold text-slate-800 mb-4 pb-2 border-b border-slate-200">
                        {{ t('topbar.accessibility_settings') }}
                    </div>

                    {{-- Font Size --}}
                    <div class="mb-4">
                        <div class="text-xs text-slate-500 uppercase tracking-wider mb-2">{{ t('topbar.font_size') }}
                        </div>
                        <div class="flex gap-2">
                            <button @click="setFontSize('normal')"
                                class="flex-1 px-3 py-2 rounded-lg text-sm font-medium transition-colors"
                                :class="fontSize === 'normal' ? 'bg-emerald-500 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200'">A</button>
                            <button @click="setFontSize('large')"
                                class="flex-1 px-3 py-2 rounded-lg text-base font-medium transition-colors"
                                :class="fontSize === 'large' ? 'bg-emerald-500 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200'">A+</button>
                            <button @click="setFontSize('xlarge')"
                                class="flex-1 px-3 py-2 rounded-lg text-lg font-medium transition-colors"
                                :class="fontSize === 'xlarge' ? 'bg-emerald-500 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200'">A++</button>
                        </div>
                    </div>

                    {{-- Color Scheme --}}
                    <div class="mb-4">
                        <div class="text-xs text-slate-500 uppercase tracking-wider mb-2">{{ t('topbar.color_scheme') }}
                        </div>
                        <div class="grid grid-cols-5 gap-2">
                            <button @click="setColorScheme('normal')"
                                class="w-full aspect-square rounded-lg border-2 transition-all flex items-center justify-center text-xs font-bold"
                                :class="colorScheme === 'normal' ? 'border-emerald-500 ring-2 ring-emerald-200' : 'border-slate-300'"
                                style="background: linear-gradient(135deg, #0a1628, #10b981);"
                                title="{{ t('topbar.scheme_normal') }}">
                                <span class="text-white">Ц</span>
                            </button>
                            <button @click="setColorScheme('bw')"
                                class="w-full aspect-square rounded-lg border-2 transition-all flex items-center justify-center text-xs font-bold bg-white"
                                :class="colorScheme === 'bw' ? 'border-emerald-500 ring-2 ring-emerald-200' : 'border-slate-300'"
                                title="{{ t('topbar.scheme_bw') }}">
                                <span class="text-black">Ц</span>
                            </button>
                            <button @click="setColorScheme('wb')"
                                class="w-full aspect-square rounded-lg border-2 transition-all flex items-center justify-center text-xs font-bold bg-black"
                                :class="colorScheme === 'wb' ? 'border-emerald-500 ring-2 ring-emerald-200' : 'border-slate-300'"
                                title="{{ t('topbar.scheme_wb') }}">
                                <span class="text-white">Ц</span>
                            </button>
                            <button @click="setColorScheme('yb')"
                                class="w-full aspect-square rounded-lg border-2 transition-all flex items-center justify-center text-xs font-bold bg-[#1a1a1a]"
                                :class="colorScheme === 'yb' ? 'border-emerald-500 ring-2 ring-emerald-200' : 'border-slate-300'"
                                title="{{ t('topbar.scheme_yb') }}">
                                <span class="text-yellow-400">Ц</span>
                            </button>
                            <button @click="setColorScheme('by')"
                                class="w-full aspect-square rounded-lg border-2 transition-all flex items-center justify-center text-xs font-bold bg-yellow-400"
                                :class="colorScheme === 'by' ? 'border-emerald-500 ring-2 ring-emerald-200' : 'border-slate-300'"
                                title="{{ t('topbar.scheme_by') }}">
                                <span class="text-black">Ц</span>
                            </button>
                        </div>
                    </div>

                    {{-- Additional Settings --}}
                    <div class="space-y-2 mb-4">
                        <label
                            class="flex items-center justify-between py-2 px-3 rounded-lg cursor-pointer hover:bg-slate-50 transition-colors">
                            <span class="text-slate-700 text-sm">{{ t('topbar.letter_spacing') }}</span>
                            <button @click="toggleLetterSpacing()"
                                class="w-10 h-6 rounded-full transition-colors relative"
                                :class="letterSpacing ? 'bg-emerald-500' : 'bg-slate-300'">
                                <span class="absolute top-1 w-4 h-4 bg-white rounded-full shadow transition-transform"
                                    :class="letterSpacing ? 'left-5' : 'left-1'"></span>
                            </button>
                        </label>

                        <label
                            class="flex items-center justify-between py-2 px-3 rounded-lg cursor-pointer hover:bg-slate-50 transition-colors">
                            <span class="text-slate-700 text-sm">{{ t('topbar.line_height') }}</span>
                            <button @click="toggleLineHeight()" class="w-10 h-6 rounded-full transition-colors relative"
                                :class="lineHeight ? 'bg-emerald-500' : 'bg-slate-300'">
                                <span class="absolute top-1 w-4 h-4 bg-white rounded-full shadow transition-transform"
                                    :class="lineHeight ? 'left-5' : 'left-1'"></span>
                            </button>
                        </label>

                        <label
                            class="flex items-center justify-between py-2 px-3 rounded-lg cursor-pointer hover:bg-slate-50 transition-colors">
                            <span class="text-slate-700 text-sm">{{ t('topbar.hide_images') }}</span>
                            <button @click="toggleNoImages()" class="w-10 h-6 rounded-full transition-colors relative"
                                :class="noImages ? 'bg-emerald-500' : 'bg-slate-300'">
                                <span class="absolute top-1 w-4 h-4 bg-white rounded-full shadow transition-transform"
                                    :class="noImages ? 'left-5' : 'left-1'"></span>
                            </button>
                        </label>
                    </div>

                    {{-- Reset Button --}}
                    <button @click="resetAll()"
                        class="w-full py-2 px-4 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg text-sm font-medium transition-colors">
                        {{ t('topbar.reset_settings') }}
                    </button>
                </div>
            </div>

            {{-- Center: Phone + Social --}}
            <div class="flex items-center gap-4">
                <a href="tel:+998711234567"
                    class="flex items-center gap-2 text-slate-300 hover:text-emerald-400 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    <span class="hidden sm:inline">+998 71 123-45-67</span>
                </a>

                <div class="flex items-center gap-2">
                    <a href="#"
                        class="w-8 h-8 rounded-full bg-slate-800 flex items-center justify-center hover:bg-[#0088cc] transition-colors"
                        aria-label="Telegram">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z" />
                        </svg>
                    </a>
                    <a href="#"
                        class="w-8 h-8 rounded-full bg-slate-800 flex items-center justify-center hover:bg-gradient-to-tr hover:from-[#f9ce34] hover:via-[#ee2a7b] hover:to-[#6228d7] transition-colors"
                        aria-label="Instagram">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z" />
                        </svg>
                    </a>
                    <a href="#"
                        class="w-8 h-8 rounded-full bg-slate-800 flex items-center justify-center hover:bg-[#1877f2] transition-colors"
                        aria-label="Facebook">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Right: Languages Dropdown --}}
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" @click.away="open = false"
                    class="flex items-center gap-2 px-4 py-1.5 rounded-lg bg-slate-800/50 hover:bg-slate-700/50 transition-colors">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                    </svg>
                    <span class="uppercase font-semibold">{{ app()->getLocale() }}</span>
                    <svg class="w-3 h-3 text-slate-400 transition-transform" :class="{ 'rotate-180': open }" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="open" x-transition
                    class="absolute right-0 mt-2 bg-slate-800 rounded-xl shadow-2xl border border-slate-700 py-2 min-w-[160px] z-[9999]">
                    <a href="{{ route('locale.switch', 'uz') }}"
                        class="flex items-center gap-3 px-4 py-2.5 hover:bg-slate-700 transition-colors {{ app()->getLocale() === 'uz' ? 'text-emerald-400 bg-slate-700/50' : 'text-white' }}">
                        <span class="text-lg">🇺🇿</span>
                        <span class="font-medium">O'zbekcha</span>
                    </a>
                    <a href="{{ route('locale.switch', 'ru') }}"
                        class="flex items-center gap-3 px-4 py-2.5 hover:bg-slate-700 transition-colors {{ app()->getLocale() === 'ru' ? 'text-emerald-400 bg-slate-700/50' : 'text-white' }}">
                        <span class="text-lg">🇷🇺</span>
                        <span class="font-medium">Русский</span>
                    </a>
                    <a href="{{ route('locale.switch', 'en') }}"
                        class="flex items-center gap-3 px-4 py-2.5 hover:bg-slate-700 transition-colors {{ app()->getLocale() === 'en' ? 'text-emerald-400 bg-slate-700/50' : 'text-white' }}">
                        <span class="text-lg">🇬🇧</span>
                        <span class="font-medium">English</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>