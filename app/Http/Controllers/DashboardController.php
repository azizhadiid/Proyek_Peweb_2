<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Barang;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tanggal = $request->input('tanggal') ?? Carbon::now()->toDateString();

        // Distribusi awal untuk hari ini
        $distribusiOlahan = DB::table('order_items')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->join('barangs', 'order_items.barang_id', '=', 'barangs.id')
            ->whereDate('orders.created_at', $tanggal)
            ->where('orders.status', 'paid')
            ->select('barangs.jenis_olahan', DB::raw('SUM(order_items.quantity) as total'))
            ->groupBy('barangs.jenis_olahan')
            ->get();

        // Ambil jumlah order dengan status 'pending'
        $pendingOrdersCount = Order::where('status', 'pending')->count();

        // Total pendapatan dari order yang sudah paid
        $totalPendapatan = Order::where('status', 'paid')->sum('total');

        // Produk terlaris berdasarkan quantity dan order status = paid
        $produkTerlaris = DB::table('order_items')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->join('barangs', 'order_items.barang_id', '=', 'barangs.id')
            ->select('barangs.id', 'barangs.nama_produk', 'barangs.gambar', DB::raw('SUM(order_items.quantity) as total_terjual'))
            ->where('orders.status', 'paid')
            ->groupBy('barangs.id', 'barangs.nama_produk', 'barangs.gambar')
            ->orderByDesc('total_terjual')
            ->first(); // ambil 1 paling laris

        $produkKritisTerendah = Barang::whereBetween('stok', [1, 5])
            ->orderBy('stok', 'asc')
            ->first(); // BUKAN get()

        return view('admin.dashboard', compact(
            'pendingOrdersCount',
            'totalPendapatan',
            'produkTerlaris',
            'produkKritisTerendah',
            'distribusiOlahan',
            'tanggal'
        ));
    }

    public function getDistribusiOlahan(Request $request)
    {
        $tanggal = $request->input('tanggal');

        $data = DB::table('order_items')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->join('barangs', 'order_items.barang_id', '=', 'barangs.id')
            ->whereDate('orders.created_at', $tanggal)
            ->where('orders.status', 'paid')
            ->select('barangs.jenis_olahan', DB::raw('SUM(order_items.quantity) as total'))
            ->groupBy('barangs.jenis_olahan')
            ->get();

        return response()->json($data);
    }

    public function getMonthlySales(Request $request)
    {
        $year = $request->year ?? now()->year;

        $data = DB::table('orders')
            ->selectRaw('
            MONTH(created_at) as month,
            SUM(total) as pemasukan,
            SUM(total) * 0.1 as pajak,
            SUM(total) - SUM(total) * 0.1 as laba
        ')
            ->where('status', 'paid')
            ->whereYear('created_at', $year)
            ->groupByRaw('MONTH(created_at)')
            ->get();

        // Siapkan default 12 bulan
        $result = [];
        for ($i = 1; $i <= 12; $i++) {
            $result[$i] = [
                'month' => $i,
                'pemasukan' => 0,
                'pajak' => 0,
                'laba' => 0,
            ];
        }

        foreach ($data as $item) {
            $result[$item->month] = [
                'month' => $item->month,
                'pemasukan' => round($item->pemasukan),
                'pajak' => round($item->pajak),
                'laba' => round($item->laba),
            ];
        }

        return response()->json(array_values($result));
    }
}
