@extends('uts')

@section('title', 'Dashboard UTS')

@section('header')
    <h1>Selamat Datang di UTS Laravel</h1>
@endsection

@section('navigation')
        <a href="{{ route('uts.show', 'pemrograman_web') }}">Menu Pemrograman Web</a> |
        <a href="{{ route('uts.show', 'database') }}">Menu Database</a>
@endsection

@section('content')
    <p>Silakan pilih menu di atas.</p>
@endsection

@section('footer')
    <p>© 2025 UTS Laravel</p>
@endsection