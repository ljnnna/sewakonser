<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>
  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white font-sans">

  <!-- Navbar -->
  <nav class="fixed top-0 w-full bg-[#EAE1F9] text-white shadow z-50">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-4 py-3">
      <div class="flex items-center space-x-4">
        <img src="/images/logofestify.png" alt="Logo" class="w-12 h-10" />
        <h3 class="font-bold text-[#493862] text-lg">Halo Customer</h3>
      </div>
      <!-- Profil -->
      <div class="relative">
        <button id="profileDropdown" class="text-[#493862] focus:outline-none">
          <i class="fas fa-user-circle text-2xl"></i>
        </button>
        <!-- Profile dropdown (optional JS toggle later) -->
        <div class="absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg hidden" id="profileMenu">
          <div class="px-4 py-2 text-sm text-black">
            <strong>ljnnna</strong>
            <p class="text-xs">test@gmail.com</p>
          </div>
          <hr />
          <a href="/profil" class="block px-4 py-2 hover:bg-gray-100 text-sm">Profil Saya</a>
          <a href="/perbarui_password" class="block px-4 py-2 hover:bg-gray-100 text-sm">Perbarui Password</a>
          <a href="/keluar" class="block px-4 py-2 hover:bg-gray-100 text-sm">Keluar</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Background image -->
  <div class="mt-24 mx-5 rounded-2xl overflow-hidden shadow-lg">
    <img src="/images/purplebg.jpg" class="w-full h-auto object-cover" />
  </div>

  <!-- Produk Cards -->
  <div class="max-w-7xl mx-auto px-4 py-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    @foreach ($produk as $item)
      <div class="bg-white rounded-lg shadow-lg p-4 flex flex-col justify-between">
        <img src="/images/{{ $item['foto_produk'] }}" alt="{{ $item['nama_produk'] }}" class="w-full h-48 object-cover rounded-t-lg">
        <div class="mt-4">
          <h3 class="font-semibold text-lg text-[#493862] pl-2">{{ $item['nama_produk'] }}</h3>
          <p class="text-sm text-center mt-2">{{ $item['deskripsi_produk'] }}</p>
          <p class="text-center font-bold mt-2 text-green-700">Rp{{ number_format($item['sewa_produk'], 0, ',', '.') }}/day</p>
        </div>
        <div class="flex justify-between items-center mt-4">
          <button onclick="toggleDetail('detail-{{ $item['id_produk'] }}')" class="bg-gray-700 text-white text-sm px-4 py-2 rounded hover:bg-gray-800 w-full">More Detail</button>
          <a href="/keranjang?id_produk={{ $item['id_produk'] }}" class="text-xl ml-2 text-gray-600 hover:text-black">
            <i class="bx bxs-cart-alt"></i>
          </a>
        </div>
      </div>

      <!-- Detail Modal -->
      <div id="detail-{{ $item['id_produk'] }}" class="fixed inset-0 hidden items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white rounded-lg max-w-md w-full p-6">
          <div class="flex justify-end">
            <button onclick="toggleDetail('detail-{{ $item['id_produk'] }}')" class="text-xl">&times;</button>
          </div>
          <img src="/images/{{ $item['foto_produk'] }}" class="w-full h-48 object-cover rounded-lg mb-4">
          <h4 class="text-xl font-semibold">{{ $item['nama_produk'] }}</h4>
          <p class="mt-2"><strong>Ukuran:</strong> {{ $item['ukuran_produk'] }}</p>
          <p><strong>Stok:</strong> {{ $item['stok_produk'] }}</p>
          <p class="mt-2">{{ $item['deskripsi_produk'] }}</p>
        </div>
      </div>
    @endforeach
  </div>

  <script>
    function toggleDetail(id) {
      const el = document.getElementById(id);
      el.classList.toggle('hidden');
      el.classList.toggle('flex');
    }

    // Optional: Toggle profile menu
    document.getElementById('profileDropdown')?.addEventListener('click', () => {
      document.getElementById('profileMenu')?.classList.toggle('hidden');
    });
  </script>

<div class="max-w-7xl mx-auto px-4 w-full md:w-auto">
    <form method="GET" class="mb-6 flex flex-wrap md:flex-nowrap gap-4 items-end">
        <div>
            <label class="block mb-1 font-semibold">Kategori</label>
            <select name="kategori" class="border rounded p-2">
                <option value="">-- Semua --</option>
                <option value="merchandise" {{ request('kategori') == 'merchandise' ? 'selected' : '' }}>Merchandise</option>
                <option value="electronics" {{ request('kategori') == 'electronics' ? 'selected' : '' }}>Electronics</option>
                <option value="accessories" {{ request('kategori') == 'accessories' ? 'selected' : '' }}>Accessories</option>
            </select>
        </div>
        <div>
            <label class="block mb-1 font-semibold">Harga Maksimum</label>
            <input type="number" name="max" value="{{ request('max') }}" class="border rounded p-2" placeholder="Contoh: 50000">
        </div>
        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Filter</button>
        </div>
    </form>
</div>

<div class="max-w-7xl mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse($produk as $item)
            <div class="border rounded-xl p-4 shadow-lg mb-6">
                <img src="{{ asset('images/' . $item['foto_produk']) }}" alt="{{ $item['nama_produk'] }}" class="w-full h-48 object-cover rounded mb-2">
                <h2 class="text-lg font-bold">{{ $item['nama_produk'] }}</h2>
                <p class="text-sm text-gray-600">{{ $item['deskripsi_produk'] }}</p>
                <p class="mt-2 font-semibold text-green-600">Rp {{ number_format($item['sewa_produk'], 0, ',', '.') }}</p>
                <p class="text-sm text-gray-500">Kategori: {{ ucfirst($item['kategori']) }}</p>
            </div>
        @empty
            <p>Tidak ada produk yang sesuai filter.</p>
        @endforelse
    </div>
</div>


</body>
</html>
