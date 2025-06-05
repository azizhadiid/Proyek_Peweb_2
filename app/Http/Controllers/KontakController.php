<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class KontakController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('kontak', compact('user'));
    }

    public function kirim(Request $request)
    {
        $request->validate([
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        $data = [
            'name' => Auth::user()->nama,
            'email' => Auth::user()->email,
            'subject' => $request->subject,
            'body' => $request->message,
        ];

        Mail::to('info@rasatangkit.id')->send(new \App\Mail\KontakMail($data));

        return back()->with('success', 'Pesan berhasil dikirim.');
    }
}
