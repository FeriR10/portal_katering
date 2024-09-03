<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;

class BackofficeController extends Controller
{

    public function dashboard()
    {
        return view('backoffice.page');
    }
    public function profile()
    {
        $profile = Profile::where('users_id', auth()->user()->id)->first();
        return view('backoffice.profile', compact('profile'));
    }
    
    public function updateprofile(Request $request)
    {
        $request->validate([
            'nama_prusahaan' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
            'deskripsi' => 'required',
        ]);
    
        // Get the authenticated user's ID
        $userId = auth()->user()->id;
        
        // Find the profile using the user ID
        $profile = Profile::where('users_id', $userId)->first();
        
        // If the profile is not found, create a new one
        if ($profile === null) {
            $profile = new Profile();
            $profile->users_id = $userId; // Make sure to set the user ID
        }
        
        // Update the profile fields
        $profile->nama_prusahaan = $request->nama_prusahaan;
        $profile->alamat = $request->alamat;
        $profile->kontak = $request->kontak;
        $profile->deskripsi = $request->deskripsi;
        
        // Save the profile (use save() instead of update() for both create and update)
        $profile->save();
        
        // Redirect to the homepage
        return redirect('/backoffice')->with('success', 'Profile updated successfully!');
    }
    //detailorder   
    public function detailorder()
    {
        return view('backoffice.detailorder.page');
    }
}
