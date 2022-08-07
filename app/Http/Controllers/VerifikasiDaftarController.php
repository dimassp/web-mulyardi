<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerifikasiDaftarController extends Controller
{
    public function verif()
    {
        return view('verifikasi.verifikasiDaftar')->with('success', 'Berhasil mengirimkan email ke user!');
    }
}
