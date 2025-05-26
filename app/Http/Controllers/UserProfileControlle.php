<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileControlle extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $userProfile = $user->profile;
        $alamats = $user->alamats;

        return view('account', compact('user', 'userProfile', 'alamats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $userProfile = Auth::user()->profile;

        $request->validate([
            'nama_panjang' => 'nullable|string|max:255',
            'jenis_kelamin' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'noHp' => 'nullable|string|max:20',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:3500',
        ]);

        if (!$userProfile) {
            $userProfile = new UserProfile();
            $userProfile->user_id = Auth::id();
        }

        $userProfile->fill($request->except('foto_profil'));

        if ($request->hasFile('foto_profil')) {
            $file = $request->file('foto_profil');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            // Hapus gambar lama
            if (!empty($userProfile->foto_profil) && file_exists(public_path('img/user/profile/' . $userProfile->foto_profil))) {
                unlink(public_path('img/user/profile/' . $userProfile->foto_profil));
            }

            $file->move(public_path('img/user/profile'), $filename);
            $userProfile->foto_profil = $filename;
        }

        $userProfile->save();

        return redirect()->route('account.index')->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
