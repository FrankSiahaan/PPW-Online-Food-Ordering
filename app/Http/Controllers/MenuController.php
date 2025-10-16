<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        return view('menu', ['menus' => Menu::all()]);
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function submitOrder(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'metode' => 'required|string',
            'cart' => 'nullable|string',
        ]);

        $cart = json_decode($data['cart'] ?? '[]', true);

        return view('summary', [
            'order' => [
                'nama' => $data['nama'],
                'alamat' => $data['alamat'],
                'metode' => $data['metode'],
                'cart' => $cart,
            ]
        ]);
    }

    public function keranjang(Request $request)
    {
        $menu = Menu::findOrFail($request->id);
        $cart = session()->get('cart', []);
        $cart[$request->id] = [
            'nama' => $menu->nama,
            'harga' => $menu->harga
        ];
        session(['cart' => $cart]);
        return redirect()->back()->with('success', 'Ditambahkan ke keranjang!');
    }
}
