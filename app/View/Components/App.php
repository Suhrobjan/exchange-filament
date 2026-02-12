<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class App extends Component
{
    public string $title;
    public string $description;

    public function __construct(
        string $title = 'Республиканская универсальная агропромышленная биржа',
        string $description = 'Официальный сайт Республиканской универсальной агропромышленной биржи Узбекистана.'
    ) {
        $this->title = $title;
        $this->description = $description;
    }

    public function render(): View
    {
        return view('layouts.app');
    }
}
