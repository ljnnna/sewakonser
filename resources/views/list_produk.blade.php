<script src="https://cdn.tailwindcss.com"></script>

<div class="mt-20 flex items-center justify-center">
    <table>
        <thead class="bg-green-100 rounded-lg shadow-lg border border-black">
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Deskripsi Produk</th>
                <th>Harga Produk</th>
            </tr>
        </thead>
        <tbody class="bg-gray-100 rounded-lg shadow-lg border border-black">
            @foreach ($nama as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item }}</td>
                <td>{{ $desc[$index] }}</td>
                <td>{{ $harga[$index] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>    
</div>


<div class="my-12 flex items-center justify-center p-4">
<div class="bg-blue-200 rounded-lg shadow-lg border border-black w-full max-w-md p-8">

<div class="text-center mb-6">
    <h1 class="font-bold text-2xl text-black">Input Produk</h1>
</div>


<form method="POST" action="{{ route('produk.simpan') }}">
    @csrf

    <div class="mb-4">
        <label for="nama" class="block text-sm font-medium text-grey-700 mb-2">Nama:</label>
        <input type="text" class="w-full px-3 py-2 border border-gray-500 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" name="nama" id="nama" placeholder="Masukkan nama produk...">
    </div>

    <div class="mb-4">
        <label for="deskripsi" class="block text-sm font-medium text-grey-700 mb-2">Deskripsi:</label>
        <textarea type="text" class="w-full px-3 py-2 border border-gray-500 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" name="deskripsi" id="deskripsi" placeholder="Masukkan deskripsi produk..."></textarea>
    </div>

    <div class="mb-4">
        <label for="harga" class="block text-sm font-medium text-grey-700 mb-2">Harga:</label>
        <input type="number" class="w-full px-3 py-2 border border-gray-500 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" name="harga" id="harga" placeholder="Masukkan harga produk...">
    </div>
    
    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md transition duration-200 transform hover:scale-105 active:scale-95">Simpan</button>
</form>
</div>
</div>

<!-- <table class="table">
        <tr>
            <td>Nama:</td>
            <td colspan="3"><input type="text" class="form-control" name="nama" id="nama"></td>
        </tr>
        <tr>
            <td>Deskripsi:</td>
            <td colspan="3"><textarea class="form-control" name="deskripsi" id="deskripsi"></textarea></td>
        </tr>
        <tr>
            <td>Harga:</td>
            <td><input type="number" class="form-control" id="harga" name="harga"></td>
            <td></td>
            <td></td>
        </tr>
    </table> -->