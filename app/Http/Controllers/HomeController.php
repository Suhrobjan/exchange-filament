<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $news = \App\Models\News::published()
            ->latest('published_at')
            ->take(5)
            ->get();

        $announcements = \App\Models\Announcement::published()
            ->latest('published_at')
            ->take(3)
            ->get();

        $brokers = \App\Models\Broker::active()
            ->featured()
            ->orderBy('sort_order')
            ->take(5)
            ->get();

        $tradingSessions = \App\Models\TradingSession::where('is_active', true)
            ->orderBy('sort_order')
            ->take(4)
            ->get();

        $data = [
            'news' => $news,
            'announcements' => $announcements,
            'brokers' => $brokers,
            'tradingSessions' => $tradingSessions,
            'stats' => [
                'participants' => $stats['participants'] ?? 1200,
                'volume' => $stats['volume'] ?? '1.2',
                'active_lots' => $stats['active_lots'] ?? 4500,
                'daily_trades' => $stats['daily_trades'] ?? 850,
            ],
        ];

        return view('pages.home', $data);
    }
}
