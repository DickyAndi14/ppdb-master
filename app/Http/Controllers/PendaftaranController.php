<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    public function store(Request $request)
    {
        // Ambil semua ID yang ada
        $existingIds = Pendaftar::orderBy('id')->pluck('id')->toArray();

        // Cari ID terkecil yang kosong (biar tetap berurutan)
        $newId = 1;
        foreach ($existingIds as $id) {
            if ($id == $newId) {
                $newId++;
            } else {
                break;
            }
        }

        // 🟢 Gunakan email dari user yang sedang login
        // (tidak lagi ambil dari input form)
        $email = Auth::check() ? Auth::user()->email : $request->email;

        // Simpan ke database
        $pendaftar = Pendaftar::create([
            'id' => $newId,
            'nama_siswa' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'anak_ke' => $request->anak_ke,
            'alamat' => $request->alamat,
            'nik' => $request->nik,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'jumlah_saudara' => $request->jumlah_saudara,
            'nama_ayah' => $request->nama_ayah,
            'nik_ayah' => $request->nik_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'penghasilan_ayah' => $request->penghasilan_ayah,
            'nama_ibu' => $request->nama_ibu,
            'nik_ibu' => $request->nik_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'penghasilan_ibu' => $request->penghasilan_ibu,
            'telepon' => $request->telepon,
            'email' => $email, // 🟢 diisi otomatis dari akun login
            'alamat_orangtua' => $request->alamat_orangtua,
            'jalur' => $request->jalur,
            'kelas' => $request->kelas,
            'status' => 'Menunggu Review', // 🟢 tambahkan default status
        ]);

        // Hapus localStorage (front-end nanti)
        return view('user.bukti', compact('pendaftar'));
    }
}