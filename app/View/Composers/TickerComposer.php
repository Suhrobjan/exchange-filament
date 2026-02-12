<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Quote;

class TickerComposer
{
    public function compose(View $view): void
    {
        $tickerQuotes = Quote::query()
            ->where('status', 'active')
            ->orderBy('commodity_code')
            ->limit(8)
            ->get();

        $view->with('tickerQuotes', $tickerQuotes);
    }
}
