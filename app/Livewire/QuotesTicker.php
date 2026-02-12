<?php

namespace App\Livewire;

use Livewire\Component;

class QuotesTicker extends Component
{
    public array $quotes = [];
    
    public function mount()
    {
        // Демо-данные для тикера (будут заменены реальными из БД)
        $this->quotes = [
            ['code' => 'COTTON', 'name' => 'Хлопок', 'price' => 85420, 'change' => 1.2, 'currency' => 'UZS'],
            ['code' => 'WHEAT', 'name' => 'Пшеница', 'price' => 6240, 'change' => 0.5, 'currency' => 'UZS'],
            ['code' => 'GOLD', 'name' => 'Золото', 'price' => 2045800, 'change' => 0.8, 'currency' => 'UZS'],
            ['code' => 'OIL', 'name' => 'Нефть', 'price' => 78950, 'change' => -0.3, 'currency' => 'UZS'],
            ['code' => 'CORN', 'name' => 'Кукуруза', 'price' => 4850, 'change' => 1.5, 'currency' => 'UZS'],
            ['code' => 'RICE', 'name' => 'Рис', 'price' => 12300, 'change' => -0.2, 'currency' => 'UZS'],
            ['code' => 'COPPER', 'name' => 'Медь', 'price' => 8540, 'change' => 2.1, 'currency' => 'UZS'],
            ['code' => 'SILK', 'name' => 'Шёлк', 'price' => 45000, 'change' => 0.0, 'currency' => 'UZS'],
        ];
    }
    
    public function render()
    {
        return view('livewire.quotes-ticker');
    }
}
