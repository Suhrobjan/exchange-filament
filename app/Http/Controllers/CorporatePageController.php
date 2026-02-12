<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\RegionalOffice;
use App\Models\Document;
use Illuminate\Http\Request;

class CorporatePageController extends Controller
{
    public function management()
    {
        $supervisoryBoard = Staff::active()->supervisoryBoard()->orderBy('sort_order')->get();
        $boardOfDirectors = Staff::active()->boardOfDirectors()->orderBy('sort_order')->get();

        return view('pages.management', compact('supervisoryBoard', 'boardOfDirectors'));
    }

    public function regions()
    {
        $offices = RegionalOffice::active()->orderBy('sort_order')->get();
        return view('pages.regions', compact('offices'));
    }

    public function disclosure()
    {
        $recentDocuments = Document::published()->orderBy('updated_at', 'desc')->take(5)->get();
        return view('pages.disclosure', compact('recentDocuments'));
    }

    public function documentsAll()
    {
        $documents = Document::published()->orderBy('sort_order')->orderBy('updated_at', 'desc')->get();
        return view('pages.documents.all', compact('documents'));
    }

    public function documentsRegulatory(Request $request)
    {
        $query = \App\Models\LegalDocument::where('is_active', true);

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        $documents = $query->orderBy('sort_order')
            ->orderBy('adopted_at', 'desc')
            ->get();

        return view('pages.documents.regulatory', compact('documents'));
    }
}
