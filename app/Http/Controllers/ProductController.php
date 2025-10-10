<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index($angka)
    // {
    //     // $hasil = $angka + 10;       // gunakan $angka dari route
    //     // return view('view', compact('hasil'));
    // }
    public function index(){
        return view('utama');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master-data.product-master.create-product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  Validasi input data
    $validatedData = $request->validate([
        'product_name' => 'required|string|max:255',
        'unit'         => 'required|string|max:50',
        'type'         => 'required|string|max:50',
        'information'  => 'nullable|string',
        'qty'          => 'required|integer',
        'producer'     => 'required|string|max:255',
    ]);

    //  Simpan data ke tabel 'product' dan Redirect kembali dengan pesan sukses
    Product::create($validatedData);
    return redirect()->back()->with('success', 'Product selesai dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('barang', ['isi_data' => $id]);
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
