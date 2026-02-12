<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Statamic\Facades\Entry;

class QuotesApiController extends Controller
{
    /**
     * Get all quotes with optional filtering
     */
    public function index(Request $request)
    {
        $query = Entry::query()
            ->where('collection', 'quotes')
            ->where('status', 'active');

        // Filter by category
        if ($request->has('category')) {
            $query->where('commodity_category', $request->category);
        }

        // Filter by contract type
        if ($request->has('contract_type')) {
            $query->where('contract_type', $request->contract_type);
        }

        // Filter by session date
        if ($request->has('date')) {
            $query->where('session_date', $request->date);
        }

        // Sort
        $sortField = $request->get('sort', 'commodity_name');
        $sortDir = $request->get('dir', 'asc');
        $query->orderBy($sortField, $sortDir);

        // Limit
        $limit = min((int) $request->get('limit', 50), 100);

        $entries = $query->limit($limit)->get();

        $data = $entries->map(function ($entry) {
            return [
                'id' => $entry->id(),
                'title' => $entry->get('title'),
                'commodity_name' => $entry->get('commodity_name'),
                'commodity_code' => $entry->get('commodity_code'),
                'commodity_category' => $entry->get('commodity_category'),
                'contract_type' => $entry->get('contract_type'),
                'delivery_basis' => $entry->get('delivery_basis'),
                'delivery_region' => $entry->get('delivery_region'),
                'price' => $entry->get('price'),
                'price_usd' => $entry->get('price_usd'),
                'currency' => $entry->get('currency'),
                'unit' => $entry->get('unit'),
                'change_percent' => $entry->get('change_percent'),
                'change_absolute' => $entry->get('change_absolute'),
                'min_price' => $entry->get('min_price'),
                'max_price' => $entry->get('max_price'),
                'trade_volume' => $entry->get('trade_volume'),
                'session_date' => $entry->get('session_date'),
                'status' => $entry->get('status'),
            ];
        });

        return response()->json([
            'success' => true,
            'count' => $data->count(),
            'data' => $data,
        ]);
    }

    /**
     * Get latest quotes for ticker
     */
    public function ticker(Request $request)
    {
        $limit = min((int) $request->get('limit', 10), 20);

        $entries = Entry::query()
            ->where('collection', 'quotes')
            ->where('status', 'active')
            ->orderBy('trade_volume', 'desc')
            ->limit($limit)
            ->get();

        $data = $entries->map(function ($entry) {
            return [
                'name' => $entry->get('commodity_name'),
                'code' => $entry->get('commodity_code'),
                'price' => $entry->get('price'),
                'currency' => $entry->get('currency'),
                'change' => $entry->get('change_percent'),
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $data,
        ]);
    }

    /**
     * Get single quote by code
     */
    public function show(string $code)
    {
        $entry = Entry::query()
            ->where('collection', 'quotes')
            ->where('commodity_code', strtoupper($code))
            ->first();

        if (!$entry) {
            return response()->json([
                'success' => false,
                'message' => 'Quote not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $entry->id(),
                'title' => $entry->get('title'),
                'commodity_name' => $entry->get('commodity_name'),
                'commodity_code' => $entry->get('commodity_code'),
                'commodity_category' => $entry->get('commodity_category'),
                'contract_type' => $entry->get('contract_type'),
                'delivery_basis' => $entry->get('delivery_basis'),
                'delivery_region' => $entry->get('delivery_region'),
                'price' => $entry->get('price'),
                'price_usd' => $entry->get('price_usd'),
                'currency' => $entry->get('currency'),
                'unit' => $entry->get('unit'),
                'change_percent' => $entry->get('change_percent'),
                'change_absolute' => $entry->get('change_absolute'),
                'min_price' => $entry->get('min_price'),
                'max_price' => $entry->get('max_price'),
                'trade_volume' => $entry->get('trade_volume'),
                'session_date' => $entry->get('session_date'),
                'status' => $entry->get('status'),
            ],
        ]);
    }
}
