<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Transaction::with('product')->get();
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
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($product->stok < $request->jumlah) {
            return response()->json(['message' => 'Stok produk tidak mencukupi!'], 400);
        }

        $total = $product->harga * $request->jumlah;

        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'jumlah' => $request->jumlah,
            'total_harga' => $total,
        ]);

        $product->stok -= $request->jumlah;
        $product->save();

        return response()->json([
            'message' => 'Transaksi berhasil',
            'transaction' => $transaction,
        ]);
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
