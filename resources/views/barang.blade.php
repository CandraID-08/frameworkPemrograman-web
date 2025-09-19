@extends('utama')

@section('judul_menu')
    <h1>Halaman Barang</h1>
@endsection

ini ditampilkan dari section judul_menu, data: {{ $isi_data }}

@section('isi_menu')
    <p>Ini adalah halaman untuk mengelola barang.</p>

    ini isi dari section isi menu
@endsection