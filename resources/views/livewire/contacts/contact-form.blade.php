<div>
    @if ($successMessage)
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            class="bg-emerald-500/10 border border-emerald-500/20 rounded-3xl p-10 text-center backdrop-blur-xl relative overflow-hidden group">
            <div class="absolute -top-12 -right-12 w-32 h-32 bg-emerald-500/10 rounded-full blur-3xl"></div>

            <div
                class="w-20 h-20 bg-emerald-500 rounded-full flex items-center justify-center mx-auto mb-6 shadow-[0_0_30px_rgba(16,185,129,0.4)]">
                <svg class="w-10 h-10 text-slate-950" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                </svg>
            </div>

            <h3 class="text-2xl font-black text-white mb-2 tracking-tight">
                {{ t('common.message_sent', 'Сообщение отправлено!') }}</h3>
            <p class="text-slate-300">
                {{ t('common.message_sent_desc', 'Спасибо за обращение. Мы свяжемся с вами в ближайшее время.') }}</p>

            <button @click="show = false; $wire.set('successMessage', false)"
                class="mt-8 text-xs font-black uppercase tracking-widest text-emerald-400 hover:text-emerald-300 transition-colors">
                {{ t('common.send_another', 'Отправить еще одно') }}
            </button>
        </div>
    @else
        <form wire:submit.prevent="submit" class="space-y-6">
            <div>
                <label for="name"
                    class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2 px-1">{{ t('common.name', 'Имя') }}</label>
                <input type="text" id="name" wire:model="name"
                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white placeholder-slate-600 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all @error('name') border-rose-500/50 @enderror"
                    placeholder="{{ t('common.your_name_placeholder', 'Ваше имя') }}">
                @error('name') <span
                    class="text-[9px] font-bold text-rose-500 uppercase mt-1 px-1 tracking-wider">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="email"
                    class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2 px-1">{{ t('common.email', 'Email') }}</label>
                <input type="email" id="email" wire:model="email"
                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white placeholder-slate-600 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all @error('email') border-rose-500/50 @enderror"
                    placeholder="email@example.com">
                @error('email') <span
                    class="text-[9px] font-bold text-rose-500 uppercase mt-1 px-1 tracking-wider">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="message"
                    class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2 px-1">{{ t('common.message', 'Сообщение') }}</label>
                <textarea id="message" wire:model="message" rows="4"
                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white placeholder-slate-600 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all resize-none @error('message') border-rose-500/50 @enderror"
                    placeholder="{{ t('common.message_placeholder', 'Ваше сообщение...') }}"></textarea>
                @error('message') <span
                    class="text-[9px] font-bold text-rose-500 uppercase mt-1 px-1 tracking-wider">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" wire:loading.attr="disabled"
                class="w-full bg-gradient-to-r from-emerald-500 to-emerald-400 hover:from-emerald-400 hover:to-emerald-500 text-slate-950 font-black uppercase tracking-widest py-5 rounded-2xl shadow-[0_0_30px_rgba(16,185,129,0.3)] hover:shadow-[0_0_40px_rgba(16,185,129,0.5)] transition-all transform active:scale-[0.98] disabled:opacity-50 disabled:scale-100 flex items-center justify-center gap-3">
                <span wire:loading.remove>{{ t('common.send', 'Отправить') }}</span>
                <span wire:loading
                    class="w-6 h-6 border-2 border-slate-950/20 border-t-slate-950 rounded-full animate-spin"></span>
            </button>
        </form>
    @endif
</div>