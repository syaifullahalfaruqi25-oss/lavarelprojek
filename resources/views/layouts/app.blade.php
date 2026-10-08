<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SolusiProperti')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">

    <!-- Konfigurasi Warna Khusus -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy: '#20456A',
                        darknavy: '#163653',
                        teal: '#34847E',
                        darkteal: '#2C6579',
                        orange: '#D77D2F',
                        cream: '#F5F5EF',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-[#F8F9FA] text-gray-800 font-sans antialiased flex flex-col min-h-screen">
    
    <!-- Memanggil Navbar -->
    @include('components.navbar')

    <!-- Konten Utama -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Memanggil Footer -->
    @include('components.footer')

</body>
</html>