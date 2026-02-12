{{-- Accessibility Panel - Версия для слабовидящих (ПКМ 176/355/81) --}}
<div 
    x-data="{ open: false }"
    class="fixed top-20 right-0 z-[9999]"
>
    {{-- Toggle Button --}}
    <button 
        @click="open = !open"
        class="absolute right-0 top-0 bg-primary-800 hover:bg-primary-700 text-white px-3 py-2 rounded-l-lg shadow-lg transition-colors flex items-center gap-2"
        :class="{ 'translate-x-0': !open, '-translate-x-[280px]': open }"
        aria-label="Версия для слабовидящих"
        title="Версия для слабовидящих"
    >
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
        </svg>
        <span class="text-sm font-medium hidden lg:inline">Для слабовидящих</span>
    </button>
    
    {{-- Panel --}}
    <div 
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="w-72 bg-white shadow-2xl rounded-l-xl border-l border-t border-b border-slate-200 overflow-hidden"
    >
        {{-- Panel Header --}}
        <div class="bg-primary-800 text-white px-4 py-3">
            <h3 class="font-bold text-base">Настройки доступности</h3>
            <p class="text-primary-200 text-xs mt-1">Версия для слабовидящих</p>
        </div>
        
        {{-- Panel Content --}}
        <div class="p-4 space-y-4">
            {{-- High Contrast Toggle --}}
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center">
                        <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-medium text-sm text-slate-900">Контрастность</p>
                        <p class="text-xs text-slate-500">Высокий контраст</p>
                    </div>
                </div>
                <button 
                    @click="toggleHighContrast()"
                    :class="highContrast ? 'bg-primary-600' : 'bg-slate-300'"
                    class="relative w-12 h-6 rounded-full transition-colors focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2"
                    role="switch"
                    :aria-checked="highContrast"
                >
                    <span 
                        :class="highContrast ? 'translate-x-6' : 'translate-x-1'"
                        class="absolute top-1 left-0 w-4 h-4 bg-white rounded-full shadow transition-transform"
                    ></span>
                </button>
            </div>
            
            {{-- Large Font Toggle --}}
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center">
                        <span class="text-slate-600 font-bold text-lg">Aa</span>
                    </div>
                    <div>
                        <p class="font-medium text-sm text-slate-900">Размер шрифта</p>
                        <p class="text-xs text-slate-500">Увеличенный текст</p>
                    </div>
                </div>
                <button 
                    @click="toggleLargeFont()"
                    :class="largeFont ? 'bg-primary-600' : 'bg-slate-300'"
                    class="relative w-12 h-6 rounded-full transition-colors focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2"
                    role="switch"
                    :aria-checked="largeFont"
                >
                    <span 
                        :class="largeFont ? 'translate-x-6' : 'translate-x-1'"
                        class="absolute top-1 left-0 w-4 h-4 bg-white rounded-full shadow transition-transform"
                    ></span>
                </button>
            </div>
            
            {{-- No Images Toggle --}}
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center">
                        <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-medium text-sm text-slate-900">Изображения</p>
                        <p class="text-xs text-slate-500">Скрыть картинки</p>
                    </div>
                </div>
                <button 
                    @click="toggleNoImages()"
                    :class="noImages ? 'bg-primary-600' : 'bg-slate-300'"
                    class="relative w-12 h-6 rounded-full transition-colors focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2"
                    role="switch"
                    :aria-checked="noImages"
                >
                    <span 
                        :class="noImages ? 'translate-x-6' : 'translate-x-1'"
                        class="absolute top-1 left-0 w-4 h-4 bg-white rounded-full shadow transition-transform"
                    ></span>
                </button>
            </div>
            
            {{-- Divider --}}
            <hr class="border-slate-200">
            
            {{-- Reset Button --}}
            <button 
                @click="highContrast = false; largeFont = false; noImages = false; localStorage.clear();"
                class="w-full py-2 px-4 bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium text-sm rounded-lg transition-colors"
            >
                Сбросить настройки
            </button>
        </div>
        
        {{-- Panel Footer --}}
        <div class="bg-slate-50 px-4 py-3 border-t border-slate-200">
            <p class="text-xs text-slate-500 text-center">
                Согласно ПКМ № 355
            </p>
        </div>
    </div>
</div>
