<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;



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
        //return view('utama');
        $data = Product::all();
        return view('master-data.product-master.index-product', compact('data'));
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
        $product = Product::findOrFail($id);
        return view('master-data.product-master.edit-product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'product_name' => 'required|string|max:255',
        'unit' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'information' => 'nullable|string',
        'qty' => 'required|integer|min:1',
        'producer' => 'required|string|max:255',
    ]);

    $product = Product::findOrFail($id);
    $product->update([
        'product_name' => $request->product_name,
        'unit' => $request->unit,
        'type' => $request->type,
        'information' => $request->information,
        'qty' => $request->qty,
        'producer' => $request->producer,
    ]);

    return redirect()->back()->with('success', 'Product update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $data = Product::findOFail($id);
        // $data->delete();
        DB::table('product')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Product deleted successfully!');
    }

    public function exportExcel() 
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }
}
