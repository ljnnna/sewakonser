@extends('layout.app')

@section('title', 'Home')
@section('page_title', 'Selamat datang di Berita Batam')

@section('content')
<h1 class="text2-xl font-bold mb-4">Selamat Pagi</h1>
<p class="mb-4">Berikut adalah berita update di hari ini</p>

@include('components.card', [
    'imgsrc' => 'images/kucingnangis.jpg',
    'title' => 'Kucing lucu yang frustasi',
    'description' => 'Kuliner unik satu ini wajib dicoba untuk menguji ketahanan gigi.'
    ])
@endsection