@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center min-h-[60vh] text-center pt-20">
    <h1 class="text-4xl font-extrabold text-navy mb-4">Selamat Datang di Nusantara Property</h1>
    <p class="text-lg text-gray-600 mb-8">Temukan hunian impian Anda dengan mudah dan aman.</p>
    
    <a href="/perumahan" class="bg-teal hover:bg-darkteal text-white font-bold py-3 px-8 rounded-lg transition-colors shadow-md">
        Lihat Katalog Perumahan
    </a>
</div>
@endsection