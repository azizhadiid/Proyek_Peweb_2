<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

        return view('home', compact('barangs', 'bestProducts', 'filter'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
