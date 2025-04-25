<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            [
                'id' => 1,
                'produk' => 'Iphone 15 Pro Max',
            ],
            [
                'id' => 2,
                'produk' => 'Carat Bong ver.3',
            ],
            [
                'id' => 3,
                'produk' => 'Kpop Keychain',
            ],
            // Tambah produk lainnya...
        ];

        return view('list_product', ['data' => $data]);
    }
}
