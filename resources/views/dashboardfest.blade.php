<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="bg-white">

    <!-- Navbar -->
    <nav class="bg-[#EAE1F9] p-4 fixed top-0 w-full z-50 shadow-md">
        <div class="flex justify-between items-center max-w-7xl mx-auto">
            <div class="flex items-center gap-4">
                <img src="{{ asset('images/logofestify.png') }}" class="w-10">
                <h3 class="text-lg font-bold text-green-900">Halo Admin 1</h3>
            </div>
            <div class="flex items-center gap-4">
                <form action="{{ route('dashboardfest') }}" method="GET" class="flex">
                    <input name="query" type="text" placeholder="Cari produk..." class="rounded-l px-3 py-1">
                    <button type="submit" class="bg-white px-3 py-1 rounded-r border-l">Search</button>
                </form>
                <div class="relative group">
                    <i class="fas fa-user-circle fa-2x text-green-900 cursor-pointer"></i>
                    <div class="absolute right-0 mt-2 bg-white rounded shadow-lg hidden group-hover:block w-48">
                        <div class="px-4 py-2 border-b">
                            <p class="font-semibold">admin1nania</p>
                            <p class="text-sm text-gray-600">test@gmail.com</p>
                        </div>
                        <a href="{{ route('dashboardfest') }}" class="block px-4 py-2 hover:bg-green-700 hover:text-white">Profil Saya</a>
                        <a href="{{ route('dashboardfest') }}" class="block px-4 py-2 hover:bg-green-700 hover:text-white">Perbarui Password</a>
                        <form method="POST" action="{{ route('dashboardfest') }}">
                            @csrf
                            <button class="w-full text-left px-4 py-2 hover:bg-red-500 hover:text-white">Keluar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative pt-20">
        <img src="{{ asset('images/purplebg.jpg') }}" alt="Background" class="w-full h-[80vh] object-cover">
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-4xl font-bold text-center">
            <img src="{{ asset('images/logofestify.png') }}" class="mx-auto w-1/2 mb-4">
            FESTIFY
        </div>
    </div>

    <!-- Produk -->
    <div class="max-w-6xl mx-auto py-12 px-4">
        <h2 class="text-2xl font-bold text-center mb-8">Browse by Category</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($products as $product)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('images/'.$product['gambar']) }}" alt="{{ $product['nama'] }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-lg text-[#493862]">{{ $product['nama'] }}</h3>
                        <p class="text-[#493862] font-bold">{{ $product['harga'] }}</p>
                        <p class="text-sm text-[#493862]">Stok: {{ $product['stok'] }}</p>
                        <button class="mt-3 bg-[#C3C7F4] text-white px-4 py-2 rounded-md hover:bg-[#E3AADD] w-full">Sewa Sekarang</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-[#EBE1F9] py-6">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-col md:flex-row md:justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <img src="{{ asset('images/logofestify.png') }}" class="w-16 mx-auto md:mx-0">
                    <p class="text-center md:text-left mt-2">© 2025 Festify. All rights reserved.</p>
                </div>
                <div class="flex space-x-4">
                    <a href="#" class="text-green-900 hover:text-green-700"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-green-900 hover:text-green-700"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-green-900 hover:text-green-700"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>