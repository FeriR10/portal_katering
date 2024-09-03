<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\Models\Merchant;

class MenuController extends Controller
{
    //view menu
    public function menu()
    {
        $menus = Menu::get();
        //dd($menu);
        return view('backoffice.menu.menu', compact('menus'));
    }

    //tambah menu
    public function tambahmenu()
    {
        return view('backoffice.menu.tambahmenu');
    }

    //tambah menu process
    public function tambahmenuProcess(Request $request)
{
    $request->validate([
        'nama_menu' => 'required',
        'deskripsi' => 'required',
        'harga' => 'required',
        'thumbnail' => 'required|image',
    ]);

    $user = auth()->user();

    // Temukan merchant yang terkait dengan user yang sedang login
    $merchant = \App\Models\Merchant::where('users_id', $user->id)->first();

    if (!$merchant) {
        return back()->withErrors(['merchant_id' => 'Merchant not found or does not belong to the current user.'])->withInput();
    }

    // Validasi berhasil, lanjutkan dengan pembuatan menu
    $menu = new Menu();
    $menu->merchant_id = $merchant->id; // Gunakan merchant_id yang ditemukan
    $menu->nama_menu = $request->nama_menu;
    $menu->deskripsi = $request->deskripsi;
    $menu->harga = $request->harga;

    if ($request->hasFile('thumbnail')) {
        $file = $request->file('thumbnail');
        $path = Storage::disk('public')->put('menu', $file);
        $menu->thumbnail = $path;
    }

    $menu->save();

    Session::flash('status', 'success');
    Session::flash('message', 'Tambah Barang sukses');
    return redirect('/backoffice/menu');
}



    //update menu
    public function updatemenu($id)
    {
        $menu = Menu::find($id);
        return view('backoffice.menu.updatemenu', [
            'menu' => $menu
        ]);
    }

    //update menu process
    public function updatemenuProcess(Request $request, $id)
{
    $request->validate([
        'nama_menu' => 'required',
        'deskripsi' => 'required',
        'harga' => 'required',
        'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $menu = Menu::find($id);

    // Cek apakah record ditemukan
    if (!$menu) {
        Session::flash('status', 'error');
        Session::flash('message', 'Menu tidak ditemukan');
        return redirect('/backoffice/menu');
    }

    $menu->nama_menu = $request->nama_menu;
    $menu->deskripsi = $request->deskripsi;
    $menu->harga = $request->harga;

    if($request->hasFile('thumbnail')) {
        // Hapus file thumbnail lama jika ada
        if($menu->thumbnail && Storage::disk('public')->exists($menu->thumbnail)) {
            Storage::disk('public')->delete($menu->thumbnail);
        }

        // Simpan file thumbnail baru
        $file = $request->file('thumbnail');
        $path = Storage::disk('public')->put('menu', $file);
        $menu->thumbnail = $path;
    }

    $menu->save();

    Session::flash('status', 'success');
    Session::flash('message', 'Menu sukses di update');
    return redirect('/backoffice/menu');
}



    //delete menu
    public function deletemenu($id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        Session::flash('status', 'success');
        Session::flash('message', 'Menu sukses di hapus');
        return redirect('/backoffice/menu');
    }

}
