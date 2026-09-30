<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Siteplan {{ $property['name'] }}
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>


<body class="bg-[#F5F5EF]">


    {{-- NAVBAR --}}

    <x-navbar />


    <main class="max-w-7xl mx-auto px-6 py-10">


        {{-- HEADER --}}

        <div
            class="flex flex-col md:flex-row md:items-end md:justify-between gap-5"
        >


            <div>

                <a
                    href="{{ url('/properti/' . $property['id']) }}"
                    class="text-[#34847E] font-semibold"
                >

                    ← Kembali ke detail lokasi

                </a>


                <p
                    class="text-[#34847E] font-semibold uppercase mt-6"
                >
                    Master Plan
                </p>


                <h1
                    class="text-4xl font-bold text-[#20456A] mt-1"
                >

                    Siteplan {{ $property['name'] }}

                </h1>


                <p class="text-gray-500 mt-2">

                    {{ $property['district'] }},
                    {{ $property['city'] }}

                </p>


            </div>


            <a
                href="{{ asset($property['siteplan']) }}"
                target="_blank"
                class="bg-[#34847E] hover:bg-[#2C706B] text-white font-semibold px-6 py-3 rounded-xl text-center"
            >

                Buka Gambar Siteplan

            </a>


        </div>



        {{-- GAMBAR SITEPLAN --}}

        <div
            class="bg-white rounded-3xl shadow-sm p-4 md:p-8 mt-8"
        >


            <div
                class="bg-gray-100 rounded-2xl p-4 overflow-auto"
            >

                <img
                    src="{{ asset($property['siteplan']) }}"
                    alt="Siteplan {{ $property['name'] }}"
                    class="w-full min-w-[900px] object-contain"
                >

            </div>


        </div>



        {{-- INFORMASI --}}

        <div
            class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-8"
        >


            <div
                class="bg-white rounded-2xl p-5"
            >

                <p class="text-sm text-gray-500">
                    ID Lokasi
                </p>

                <p
                    class="font-bold text-[#20456A] mt-1"
                >

                    {{ $property['location_id'] }}

                </p>

            </div>



            <div
                class="bg-white rounded-2xl p-5"
            >

                <p class="text-sm text-gray-500">
                    Lokasi
                </p>

                <p
                    class="font-bold text-[#20456A] mt-1"
                >

                    {{ $property['district'] }},
                    {{ $property['city'] }}

                </p>

            </div>



            <div
                class="bg-white rounded-2xl p-5"
            >

                <p class="text-sm text-gray-500">
                    Developer
                </p>

                <p
                    class="font-bold text-[#20456A] mt-1"
                >

                    {{ $property['developer'] }}

                </p>

            </div>


        </div>


    </main>


</body>

</html>