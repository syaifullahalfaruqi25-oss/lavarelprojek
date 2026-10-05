@extends('layouts.app')

@section('content')
<div class="bg-[#F8F9FA] min-h-screen pt-28 pb-20">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-10">
            <h1 class="text-4xl font-extrabold text-navy mb-3">Tentang Kami</h1>
            <p class="text-gray-500 text-lg">
                Mengenal lebih dekat SolusiProperti dan tujuan kami dalam membantu Anda menemukan hunian impian.
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 lg:p-10">
            <h2 class="text-2xl font-extrabold text-navy mb-4">SolusiProperti</h2>

            <p class="text-gray-600 leading-relaxed mb-4">
                SolusiProperti merupakan platform informasi properti yang dirancang untuk memudahkan
                masyarakat dalam mencari dan memperoleh informasi mengenai hunian.
            </p>
            <p class="text-gray-600 leading-relaxed mb-4">
                Kami menyediakan informasi mengenai berbagai perumahan, tipe rumah, lokasi, developer,
                serta detail hunian secara mudah dan terstruktur, sehingga calon pembeli dapat menemukan
                pilihan yang sesuai dengan kebutuhan mereka.
            </p>
            <p class="text-gray-600 leading-relaxed mb-8">
                SolusiProperti hadir untuk memberikan pengalaman mencari hunian yang lebih mudah,
                informatif, dan nyaman.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div class="bg-[#F5F8FB] rounded-xl p-6 text-center">
                    <div class="text-3xl mb-3">🏠</div>
                    <h3 class="font-bold text-navy mb-2">Pilihan Hunian</h3>
                    <p class="text-sm text-gray-600">Temukan berbagai pilihan perumahan dan tipe rumah sesuai kebutuhan Anda.</p>
                </div>
                <div class="bg-[#F5F8FB] rounded-xl p-6 text-center">
                    <div class="text-3xl mb-3">📍</div>
                    <h3 class="font-bold text-navy mb-2">Informasi Lokasi</h3>
                    <p class="text-sm text-gray-600">Dapatkan informasi lokasi perumahan berdasarkan wilayah yang Anda inginkan.</p>
                </div>
                <div class="bg-[#F5F8FB] rounded-xl p-6 text-center">
                    <div class="text-3xl mb-3">🤝</div>
                    <h3 class="font-bold text-navy mb-2">Mudah & Terstruktur</h3>
                    <p class="text-sm text-gray-600">Informasi properti disajikan secara terstruktur agar lebih mudah dipahami.</p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection