<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    public function index(Request $request)
    {
        $produk = [
            [
                'id_produk' => 1,
                'nama_produk' => 'Iphone 15 Pro Max',
                'foto_produk' => 'iphone15promax.png',
                'deskripsi_produk' => 'High spec phone for your best experience.',
                'sewa_produk' => 115000,
                'ukuran_produk' => '128 Gb',
                'stok_produk' => 5,
                'kategori' => 'electronics',
            ],
            [
                'id_produk' => 2,
                'nama_produk' => 'Carat Bong ver.3',
                'foto_produk' => 'caratbongv3.png',
                'deskripsi_produk' => 'Caratbong for caratdeul~.',
                'sewa_produk' => 50000,
                'ukuran_produk' => '-',
                'stok_produk' => 2,
                'kategori' => 'merchandise',
            ],
            [
                'id_produk' => 3,
                'nama_produk' => 'Kpop Keychain',
                'foto_produk' => 'accecoriescute.jpg',
                'deskripsi_produk' => 'Keychain lucu bergambar chibi kpop idol.',
                'sewa_produk' => 5000,
                'ukuran_produk' => 'Small',
                'stok_produk' => 10,
                'kategori' => 'accessories',
            ],
            // Tambah produk lainnya...
        ];

        $kategori = $request->query('kategori');
        $maxHarga = $request->query('max');

        if ($kategori) {
            $produk = array_filter($produk, fn($item) => $item['kategori'] === $kategori);
        }

        if ($maxHarga) {
            $produk = array_filter($produk, fn($item) => $item['sewa_produk'] <= $maxHarga);
        }

        return view('catalogue', [
            'produk' => $produk,
            'kategoriDipilih' => $kategori,
            'maxDipilih' => $maxHarga
        ]);
    }
}
