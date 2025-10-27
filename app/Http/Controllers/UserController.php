<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pendaftar; // pastikan model ini ada dan sesuai nama tabel

class UserController extends Controller
{
    /**
     * Tampilkan halaman dashboard user.
     */
    public function index()
    {
        // Pastikan user sudah login
        if (!Auth::check()) {
            return redirect()->route('login.form')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }

        // Ambil data user yang sedang login
        $user = Auth::user();

        // Cari data pendaftaran berdasarkan email user
        $pendaftaran = Pendaftar::where('email', $user->email)->latest()->first();

        // Kirim data user + status pendaftaran ke view
        return view('user.dashboard', compact('user', 'pendaftaran'));
    }

    /**
     * Form data siswa
     */
    public function formPendaftaran()
    {
        return view('user.form-pendaftaran');
    }

    /**
     * Form data orang tua
     */
    public function formOrangtua()
    {
        return view('user.form-orangtua');
    }

    /**
     * Form pemilihan jalur pendaftaran
     */
    public function formJalur()
    {
        return view('user.form-jalur');
    }
}