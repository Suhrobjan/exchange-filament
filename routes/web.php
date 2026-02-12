<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\QuotesController;
use App\Http\Controllers\LocaleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Главная
Route::get('/', [HomeController::class, 'index'])->name('home');

// Переключение языка
Route::get('/locale/{locale}', [LocaleController::class, 'switch'])->name('locale.switch');

// Котировки
Route::get('/quotes', [QuotesController::class, 'index'])->name('quotes');
Route::get('/quotes/{slug}', [QuotesController::class, 'show'])->name('quotes.show');

// Новости
Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

// Объявления
Route::get('/announcements', [PageController::class, 'announcements'])->name('announcements');
Route::get('/announcements/{slug}', [PageController::class, 'announcementShow'])->name('announcements.show');

use App\Http\Controllers\CorporatePageController;

// О бирже
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/management', [CorporatePageController::class, 'management'])->name('management');
Route::get('/shareholders', [PageController::class, 'shareholders'])->name('shareholders');
Route::get('/disclosure', [CorporatePageController::class, 'disclosure'])->name('disclosure');
Route::get('/regions', [CorporatePageController::class, 'regions'])->name('regions');

// Торги
Route::get('/trading-calendar', [PageController::class, 'tradingCalendar'])->name('trading.calendar');
Route::get('/trading-results', [PageController::class, 'tradingResults'])->name('trading.results');

// Документы
Route::get('/documents', [CorporatePageController::class, 'documentsAll'])->name('documents');
Route::get('/documents/regulatory', [CorporatePageController::class, 'documentsRegulatory'])->name('documents.regulatory');

// Участникам
Route::get('/accreditation', [PageController::class, 'accreditation'])->name('accreditation');
Route::get('/brokers', [PageController::class, 'brokers'])->name('brokers');
Route::get('/brokers/{slug}', [PageController::class, 'brokerShow'])->name('brokers.show');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');

// Контакты
Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');

// Поиск
Route::get('/search', [PageController::class, 'search'])->name('search');

// Статические страницы
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/sitemap', [PageController::class, 'sitemap'])->name('sitemap');
