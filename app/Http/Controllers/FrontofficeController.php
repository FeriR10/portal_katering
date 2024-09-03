<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Keranjang;
use App\Models\Cekout;
use App\Models\Merchant;
use App\Models\User;


class FrontofficeController extends Controller
{

    public function index(Request $request)
{
    $query = $request->input('search');

if ($query) {
    $menus = Menu::where(function ($queryBuilder) use ($query) {
        $queryBuilder->whereHas('merchant', function ($merchantQuery) use ($query) {
            $merchantQuery->where('nama_merchant', 'LIKE', "%$query%")
                          ->orWhere('lokasi', 'LIKE', "%$query%");
        })->orWhere('nama_menu', 'LIKE', "%$query%");
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
        return view('frontoffice.keranjang', [
            'keranjang' => $keranjang,
            'cekout' => $keranjang,
        ]);
    }
    public function kurang($id)
    {
        $keranjang = Keranjang::find($id);

        if ($keranjang->qty == 1) {
            $keranjang->delete();
            return redirect('/keranjang');
        } else {
            $keranjang->qty = $keranjang->qty - 1;
            $keranjang->total_harga = $keranjang->total_harga - $keranjang->menu->harga;
            $keranjang->save();
            return redirect('/keranjang');
        }

    }

    public function tambah($id)
    {
        $keranjang = Keranjang::find($id);
        $keranjang->qty = $keranjang->qty + 1;
        $keranjang->total_harga = $keranjang->total_harga + $keranjang->menu->harga;
        $keranjang->save();
        return redirect('/keranjang');
    }
    public function destroy($id)
    {
        $keranjang = Keranjang::find($id);
        $keranjang->delete();
        return redirect('/keranjang');
    }
    public function riwayat()
    {
        $cekout = Cekout::with('menu')->where('users_id', auth()->user()->id)->get();
        return view('frontoffice.riwayat', [
            'cekout' => $cekout,
        ]);
    }
    //cekoutstore
    public function cekoutstore(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required',
        ]);

        // keranjang where users_id = auth()->user()->id
        $keranjang = Keranjang::where('users_id', auth()->user()->id)->get();


        // cekout foreach keranjang
        foreach ($keranjang as $key => $value) {
            $cekout = new Cekout();
            $cekout->users_id = Auth()->user()->id;
            $cekout->menu_id = $value->menu_id;
            $cekout->qty = $value->qty;
            $cekout->total_harga = $value->total_harga;
            $cekout->date = $request->date;
            $cekout->save();
        }

        // delete keranjang where users_id = auth()->user()->id
        $keranjang = Keranjang::where('users_id', auth()->user()->id)->delete();
      
    // Loop through each item in the checkout
    
        return redirect('/keranjang/riwayat');
    }

}
