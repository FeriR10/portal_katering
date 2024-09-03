<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\Merchant;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }

    public function loginProcess(Request $request)
{
    // Validasi input login
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    // Percobaan otentikasi
    if (Auth::attempt($credentials)) {
        // Regenerasi sesi
        $request->session()->regenerate();

        // Cek role pengguna
        if (Auth::user()->role->role === 'backoffice') {
            // Redirect ke halaman /homepage jika role adalah dealer
            return redirect('/backoffice');
        }
        elseif (Auth::user()->role->role === 'superadmin') {
            // Redirect ke halaman /admin jika role adalah admin
            return redirect('/superadmin');
        }
        
        // Redirect ke halaman yang diinginkan jika role bukan dealer
        return redirect()->intended('/frontoffice');
    }

    // Flash pesan jika login gagal
    Session::flash('status', 'failed');
    Session::flash('message', 'Login gagal, pastikan email dan password anda benar!');

    // Redirect ke halaman login jika otentikasi gagal
    return redirect('/login');
}


public function registerProcess(Request $request)
{
    $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|unique:users',
        'password' => 'required',
        'role_id' => 'required',
        'nama_merchant' => 'nullable|required_if:role_id,2', // Required if role is Merchant
        'lokasi' => 'nullable|required_if:role_id,2', // Required if role is Merchant
        'jenis_makanan' => 'nullable|required_if:role_id,2', // Required if role is Merchant
    ]);

    // Create new user
    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->role_id = $request->role_id;
    $user->save();

    // Login the user
   

    // If role is Merchant, create a new Merchant record
    if ($request->role_id == 2) {
        $merchant = new Merchant;
        $merchant->users_id = $user->id; // Link user with merchant
        $merchant->nama_merchant = $request->nama_merchant;
        $merchant->lokasi = $request->lokasi;
        $merchant->jenis_makanan = $request->jenis_makanan;
        $merchant->save();

        // Redirect to merchant form if needed
        return redirect('/');
    }

    // Flash message and redirect if role is not Merchant
    Session::flash('status', 'success');
    Session::flash('message', 'Register sukses, silakan loginkan akun anda');
    return redirect('/register');
}

  

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
