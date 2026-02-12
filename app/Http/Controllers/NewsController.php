<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = News::published()->latest('published_at');

        if ($request->has('category')) {
            $category = \App\Models\Category::where('slug', $request->category)->firstOrFail();
            $query->where('category_id', $category->id);
        }

        $news = $query->paginate(9);
        $categories = \App\Models\Category::withCount('news')->get();
        $latestAnnouncements = \App\Models\Announcement::published()->latest('published_at')->take(5)->get();

        return view('pages.news.index', [
            'news' => $news,
            'categories' => $categories,
            'latestAnnouncements' => $latestAnnouncements,
            'currentCategory' => $request->category ? \App\Models\Category::where('slug', $request->category)->first() : null,
        ]);
    }

    public function show($slug)
    {
        $article = News::published()
            ->where('slug', $slug)
            ->firstOrFail();

        return view('pages.news.show', [
            'article' => $article,
        ]);
    }
}
