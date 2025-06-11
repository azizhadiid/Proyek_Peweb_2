<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('filter'); // ambil query dari URL, contoh: ?filter=Selai

        $query = Barang::withAvg('reviews', 'rating')->withCount('reviews');

        if ($filter) {
            $query->where('jenis_olahan', $filter); // filter berdasarkan jenis olahan
        }

        $barangs = $query->get();

        $bestProducts = Barang::withAvg('reviews', 'rating')
            ->having('reviews_avg_rating', '>=', 4)
            ->orderByDesc('reviews_avg_rating')
            ->take(8)
            ->get();

        return view('welcome', compact('barangs', 'bestProducts', 'filter'));
    }
}
