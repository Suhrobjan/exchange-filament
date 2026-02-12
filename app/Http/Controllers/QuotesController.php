<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;

class QuotesController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->get('category');

        $query = Quote::query();

        if ($category && $category !== 'all') {
            $query->where('commodity_category', $category);
        }

        $quotes = $query->orderBy('commodity_code')->get();

        $categories = [
            'all' => 'Все товары',
            'cotton' => 'Хлопок',
            'grain' => 'Зерновые',
            'metals' => 'Металлы',
            'oil' => 'Нефтепродукты',
            'textile' => 'Текстиль',
            'construction' => 'Строительство',
            'chemistry' => 'Химия',
        ];

        return view('pages.quotes.index', [
            'quotes' => $quotes,
            'categories' => $categories,
            'currentCategory' => $category,
        ]);
    }

    public function show($slug)
    {
        // Детальная страница котировки
        return view('pages.quotes.show', [
            'slug' => $slug,
        ]);
    }
}
