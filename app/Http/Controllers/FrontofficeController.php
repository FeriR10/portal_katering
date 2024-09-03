<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Keranjang;

class FrontofficeController extends Controller
{

    public function index(Request $request)
{
    $query = $request->input('search');

    if ($query) {
        $menus = Menu::whereHas('merchant', function ($queryBuilder) use ($query) {
            $queryBuilder->where('nama_merchant', 'LIKE', "%$query%");
        })->get();
    } else {
        $menus = Menu::with('merchant')->get();
    }

    return view('frontoffice.page' , compact('menus'));
}
public function store(Request $request)
    {
        foreach ($request->keranjang as $key => $value) {
            $menu = Menu::find($key);
            $keranjang = new Keranjang();
            $keranjang->menu_id = $key;
            $keranjang->users_id = auth()->user()->id;
            $keranjang->qty = 1;
            $keranjang->harga_satuan = $menu->harga;
            $keranjang->total_harga = $keranjang->qty * $keranjang->harga_satuan;
            $keranjang->save(); 
        }
        return redirect('/keranjang');
    }

    //keranjang
    public function keranjang()
    {
        $keranjang = Keranjang::with('menu')->where('users_id', auth()->user()->id)->get();
        return view('frontoffice.keranjang', compact('keranjang'));
    }
}
