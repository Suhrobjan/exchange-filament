{{-- Quotes Ticker Bar - Бегущая строка котировок --}}
<div class="quotes-ticker" wire:poll.30s>
    <div class="container-exchange relative">
        {{-- Gradient Edges --}}
        <div class="absolute left-0 top-0 bottom-0 w-16 bg-gradient-to-r from-primary-900 to-transparent z-10"></div>
        <div class="absolute right-0 top-0 bottom-0 w-16 bg-gradient-to-l from-primary-900 to-transparent z-10"></div>
        
        {{-- Ticker Track --}}
        <div class="overflow-hidden">
            <div class="ticker-track">
                @foreach($quotes as $quote)
                    <div class="ticker-item">
                        <span class="ticker-code">{{ $quote['code'] }}</span>
                        <span class="ticker-price font-mono">
                            {{ number_format($quote['price'], 0, ',', ' ') }} 
                            <span class="text-xs text-primary-400">{{ $quote['currency'] }}</span>
                        </span>
                        <span class="ticker-change {{ $quote['change'] > 0 ? 'up' : ($quote['change'] < 0 ? 'down' : '') }}">
                            @if($quote['change'] > 0)
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                                </svg>
                                +{{ $quote['change'] }}%
                            @elseif($quote['change'] < 0)
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                {{ $quote['change'] }}%
                            @else
                                <span class="text-primary-400">0%</span>
                            @endif
                        </span>
                    </div>
                @endforeach
                
                {{-- Duplicate for seamless loop --}}
                @foreach($quotes as $quote)
                    <div class="ticker-item">
                        <span class="ticker-code">{{ $quote['code'] }}</span>
                        <span class="ticker-price font-mono">
                            {{ number_format($quote['price'], 0, ',', ' ') }} 
                            <span class="text-xs text-primary-400">{{ $quote['currency'] }}</span>
                        </span>
                        <span class="ticker-change {{ $quote['change'] > 0 ? 'up' : ($quote['change'] < 0 ? 'down' : '') }}">
                            @if($quote['change'] > 0)
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                                </svg>
                                +{{ $quote['change'] }}%
                            @elseif($quote['change'] < 0)
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                {{ $quote['change'] }}%
                            @else
                                <span class="text-primary-400">0%</span>
                            @endif
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
