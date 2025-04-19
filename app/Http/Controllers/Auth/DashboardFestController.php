<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class DashboardFestController extends Controller
{
    public function index()
    {
        // contoh dummy data produk
        $products = [
            [
                'nama' => 'Electronics',
                'harga' => 'Rp 40.000',
                'stok' => 5,
                'gambar' => 'electronics.jpg',
            ],
            [
                'nama' => 'Merchandise Kpop',
                'harga' => 'Rp 20.000',
                'stok' => 5,
                'gambar' => 'merchkpop.jpg',
            ],
            [
                'nama' => 'Accecories',
                'harga' => 'Rp 10.000',
                'stok' => 5,
                'gambar' => 'accecoriescute.jpg',
            ],
        ];

        $user = (object)[
            'username' => 'Test User',
            'email' => 'test@example.com'
        ];
        
        return view('dashboardfest', [
            'user' => $user,
            'products' => $products
        ]);

        // return view('dashboardfest', [
        //     'user' => Auth::user(),
        //     'products' => $products
        // ]);
    }
}
