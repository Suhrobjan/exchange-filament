<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        $page = \App\Models\Page::where('slug', 'about')->published()->firstOrFail();
        return view('pages.about', compact('page'));
    }

    public function management()
    {
        return view('pages.management');
    }

    public function shareholders()
    {
        return view('pages.shareholders');
    }

    public function disclosure()
    {
        return view('pages.disclosure');
    }

    public function regions()
    {
        return view('pages.regions');
    }

    public function tradingCalendar()
    {
        $events = \App\Models\TradeEvent::where('event_date', '>=', now()->startOfDay())
            ->orderBy('event_date')
            ->orderBy('start_time')
            ->get()
            ->groupBy(function ($event) {
                return $event->event_date->format('Y-m-d');
            });

        return view('pages.trading-calendar', compact('events'));
    }

    public function tradingResults()
    {
        $results = \App\Models\DailyTradeResult::orderBy('date', 'desc')
            ->paginate(20);

        // Data for charts (last 30 days)
        $chartData = \App\Models\DailyTradeResult::orderBy('date', 'asc')
            ->take(30)
            ->get();

        return view('pages.trading-results', compact('results', 'chartData'));
    }

    public function regulations()
    {
        return view('pages.regulations');
    }

    public function accreditation()
    {
        $page = \App\Models\Page::where('slug', 'accreditation')->published()->firstOrFail();
        return view('pages.accreditation', compact('page'));
    }

    public function brokers()
    {
        $brokers = \App\Models\Broker::active()
            ->orderByDesc('is_top')
            ->orderByDesc('rating')
            ->orderBy('sort_order')
            ->get();

        return view('pages.brokers', compact('brokers'));
    }

    public function brokerShow($slug)
    {
        $broker = \App\Models\Broker::active()
            ->where('slug', $slug)
            ->firstOrFail();

        return view('pages.brokers.show', compact('broker'));
    }

    public function documents()
    {
        return view('pages.documents');
    }

    public function faq()
    {
        $faqs = \App\Models\Faq::where('is_published', true)
            ->orderBy('sort_order')
            ->get();

        return view('pages.faq', compact('faqs'));
    }

    public function contacts()
    {
        $page = \App\Models\Page::where('slug', 'contacts')->published()->first() ?? new \App\Models\Page([
            'title' => ['ru' => 'Контакты', 'uz' => 'Kontaktlar', 'en' => 'Contacts'],
            'content' => ['ru' => '', 'uz' => '', 'en' => '']
        ]);
        return view('pages.contacts', compact('page'));
    }

    public function announcements()
    {
        $announcements = \App\Models\Announcement::active()
            ->latest('published_at')
            ->paginate(10);

        return view('pages.announcements', compact('announcements'));
    }

    public function announcementShow($slug)
    {
        $announcement = \App\Models\Announcement::published()
            ->where('slug', $slug)
            ->firstOrFail();

        return view('pages.announcement-show', compact('announcement'));
    }

    public function search(Request $request)
    {
        $query = $request->get('q', '');
        return view('pages.search', compact('query'));
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function sitemap()
    {
        return view('pages.sitemap');
    }
}
