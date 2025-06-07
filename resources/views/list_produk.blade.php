<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="mt-20 flex items-center justify-center">
        <table class="w-full max-w-6xl border border-black rounded-lg overflow-hidden shadow-lg">
            <thead class="bg-green-100 rounded-lg shadow-lg border border-black">
                <tr>
                    <th class="border border-black px-2 py-1 text-center font-medium w-8">No</th>
                    <th class="border border-black px-2 py-1 text-center font-medium w-48">Nama Produk</th>
                    <th class="border border-black px-2 py-1 text-center font-medium w-80">Deskripsi Produk</th>
                    <th class="border border-black px-2 py-1 text-center font-medium w-32">Harga Produk</th>
                    <th class="border border-black px-2 py-1 text-center font-medium w-16">Action</th>
                </tr>
            </thead>
            <tbody class="bg-gray-100 rounded-lg shadow-lg border border-black">
                @foreach ($nama as $index => $item)
                <tr>
                    <td class="border border-black px-2 py-1 text-center text-sm">{{ $index + 1 }}</td>
                    <td class="border border-black px-2 py-1 text-center text-sm">{{ $item }}</td>
                    <td class="border border-black px-2 py-1 text-center text-sm">{{ $desc[$index] }}</td>
                    <td class="border border-black px-2 py-1 text-sm text-center">{{ $harga[$index] }}</td>
                    <td class="border border-black text-sm">
                        <div class="">
                            <div class="flex gap-1 items-center justify-center" x-data="{ showModal: false, formData: { id: null, nama: '', deskripsi: '', harga: '' } }"> 
                                <button
                                    type="button"
                                    class="p-2 text-center bg-blue-100 text-blue-600 hover:text-blue-800 hover:bg-blue-100 rounded transition-colors"
                                    data-modal-target="crud-modal-{{ $id[$index] }}"
                                    data-modal-toggle="crud-modal-{{ $id[$index] }}"
                                    data-id="{{ $id[$index] }}"
                                    data-nama="{{ $item }}"
                                    data-deskripsi="{{ $desc[$index] }}"
                                    data-harga="{{ $harga[$index] }}"
                                    onclick="openEditModal(this)">
                                    <i class="fas fa-solid fa-pen"></i>
                                </button>
                                @include('_update', ['produk' => $id[$index]])
                    
                                <form class="m-0" action="{{ route('produk.delete', $id[$index]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="" onclick="return confirm('Are you sure you want to delete {{ $item }}?')">
                                        <i class="fas fa-trash-alt text-center p-2 bg-red-100 text-red-600 hover:text-red-800 hover:bg-red-100 rounded transition-colors"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
                <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

            </tbody>
        </table>    
    </div>
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