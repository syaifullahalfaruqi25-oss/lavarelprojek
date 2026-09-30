<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        {{ $property['name'] }} - Detail Lokasi
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>


<body class="bg-[#F5F5EF] text-gray-800">


    {{-- NAVBAR --}}

    <x-navbar />


    {{-- KEMBALI --}}

    <div class="max-w-7xl mx-auto px-6 pt-8">

        <a
            href="{{ url('/properti') }}"
            class="text-[#20456A] font-semibold hover:text-[#34847E]"
        >

            ← Kembali ke daftar perumahan

        </a>

    </div>



    {{-- HERO DETAIL --}}

    <section class="max-w-7xl mx-auto px-6 mt-6">

        <div
            class="relative overflow-hidden rounded-3xl min-h-[500px]"
        >


            {{-- BACKGROUND FOTO --}}

            <img
                src="{{ asset($property['image']) }}"
                alt="{{ $property['name'] }}"
                class="absolute inset-0 w-full h-full object-cover"
            >


            {{-- OVERLAY --}}

            <div
                class="absolute inset-0 bg-[#20456A]/85"
            ></div>



            <div
                class="relative z-10 p-8 md:p-14 text-white"
            >


                <div
                    class="grid grid-cols-1 lg:grid-cols-2 gap-12"
                >


                    {{-- INFORMASI KIRI --}}

                    <div>


                        <span
                            class="inline-block bg-[#34847E] px-4 py-2 rounded-full text-sm font-semibold"
                        >
                            Detail Lokasi
                        </span>


                        <h1
                            class="text-4xl md:text-6xl font-bold uppercase mt-6"
                        >

                            {{ $property['name'] }}

                        </h1>


                        <div
                            class="w-24 h-1 bg-[#D77D2F] my-6"
                        ></div>


                        <div class="space-y-4 text-blue-100">


                            <p>

                                <strong class="text-white">
                                    ID Lokasi:
                                </strong>

                                {{ $property['location_id'] }}

                            </p>


                            <p>

                                <strong class="text-white">
                                    Lokasi:
                                </strong>

                                {{ $property['province'] }},
                                {{ $property['city'] }},
                                {{ $property['district'] }}

                            </p>


                            <p>

                                <strong class="text-white">
                                    Developer:
                                </strong>

                                {{ $property['developer'] }}

                            </p>


                            <p class="leading-relaxed">

                                {{ $property['description'] }}

                            </p>


                        </div>


                    </div>



                    {{-- STATUS KANAN --}}

                    <div
                        class="bg-white rounded-3xl p-7 text-gray-800 self-center shadow-2xl"
                    >


                        <h2
                            class="text-2xl font-bold text-[#20456A]"
                        >
                            Status Rumah
                        </h2>


                        <div class="mt-6 space-y-4">


                            <div
                                class="flex justify-between border-b pb-3"
                            >

                                <span>
                                    Subsidi
                                </span>

                                <strong class="text-[#20456A]">

                                    {{ $property['subsidy'] }} Unit

                                </strong>

                            </div>


                            <div
                                class="flex justify-between border-b pb-3"
                            >

                                <span>
                                    Terjual Subsidi
                                </span>

                                <strong class="text-[#D77D2F]">

                                    {{ $property['sold_subsidy'] }} Unit

                                </strong>

                            </div>


                            <div
                                class="flex justify-between border-b pb-3"
                            >

                                <span>
                                    Komersil
                                </span>

                                <strong class="text-[#20456A]">

                                    {{ $property['commercial'] }} Unit

                                </strong>

                            </div>


                            <div
                                class="flex justify-between"
                            >

                                <span>
                                    Terjual Komersil
                                </span>

                                <strong class="text-[#D77D2F]">

                                    {{ $property['sold_commercial'] }} Unit

                                </strong>

                            </div>


                        </div>



                        {{-- BUTTON SITEPLAN --}}

                        <a
                            href="{{ url('/properti/' . $property['id'] . '/siteplan') }}"
                            class="block text-center mt-7 bg-[#34847E] hover:bg-[#2C706B] text-white font-semibold py-3 rounded-xl transition"
                        >

                            Lihat Siteplan

                        </a>


                    </div>


                </div>

            </div>

        </div>

    </section>



    {{-- PETA + FOTO --}}

    <section class="max-w-7xl mx-auto px-6 py-12">


        <div
            class="grid grid-cols-1 lg:grid-cols-5 gap-8"
        >


            {{-- PETA --}}

            <div class="lg:col-span-2">


                <div
                    class="bg-white rounded-3xl p-6 shadow-sm"
                >


                    <h2
                        class="text-2xl font-bold text-[#20456A]"
                    >
                        Peta Lokasi
                    </h2>


                    <div
                        class="h-1 bg-gray-200 mt-4 mb-5"
                    ></div>


                    <div
                        class="h-[400px] bg-gray-200 rounded-2xl flex items-center justify-center"
                    >

                        <div class="text-center">

                            <div class="text-5xl">
                                📍
                            </div>

                            <p
                                class="font-bold text-[#20456A] mt-3"
                            >
                                {{ $property['name'] }}
                            </p>

                            <p class="text-gray-500 text-sm mt-1">

                                {{ $property['district'] }},
                                {{ $property['city'] }}

                            </p>

                        </div>

                    </div>


                </div>

            </div>



            {{-- FOTO --}}

            <div class="lg:col-span-3">


                <div
                    class="bg-white rounded-3xl p-6 shadow-sm"
                >


                    <h2
                        class="text-2xl font-bold text-[#20456A]"
                    >
                        Foto Lokasi
                    </h2>


                    <div
                        class="h-1 bg-gray-200 mt-4 mb-5"
                    ></div>


                    <div
                        class="grid grid-cols-1 md:grid-cols-2 gap-5"
                    >


                        @foreach ($property['photos'] as $photo)


                            <div
                                class="rounded-2xl overflow-hidden"
                            >

                                <img
                                    src="{{ asset($photo) }}"
                                    alt="Foto {{ $property['name'] }}"
                                    class="w-full h-60 object-cover hover:scale-105 transition duration-500"
                                >

                            </div>


                        @endforeach


                    </div>


                </div>

            </div>


        </div>

    </section>



    {{-- SITEPLAN PREVIEW --}}

    <section
        class="max-w-7xl mx-auto px-6 pb-16"
    >


        <div
            class="bg-white rounded-3xl p-6 md:p-8 shadow-sm"
        >


            <div
                class="flex flex-col md:flex-row md:items-center md:justify-between gap-5"
            >


                <div>

                    <p
                        class="text-[#34847E] font-semibold"
                    >
                        MASTER PLAN
                    </p>

                    <h2
                        class="text-3xl font-bold text-[#20456A]"
                    >
                        Siteplan Perumahan
                    </h2>

                </div>


                <a
                    href="{{ url('/properti/' . $property['id'] . '/siteplan') }}"
                    class="bg-[#20456A] hover:bg-[#163653] text-white font-semibold px-6 py-3 rounded-xl"
                >

                    Buka Siteplan

                </a>


            </div>


            <div
                class="mt-7 bg-gray-100 rounded-2xl p-4"
            >

                <img
                    src="{{ asset($property['siteplan']) }}"
                    alt="Siteplan {{ $property['name'] }}"
                    class="w-full max-h-[600px] object-contain rounded-xl"
                >

            </div>


        </div>

    </section>


</body>

</html>