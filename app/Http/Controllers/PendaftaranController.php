<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
        $email = Auth::check() ? Auth::user()->email : $request->email;

        // Simpan data utama pendaftar terlebih dahulu
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
            'email' => $email,
            'alamat_orangtua' => $request->alamat_orangtua,
            'jalur' => $request->jalur,
            'kelas' => $request->kelas,
            'status' => 'Menunggu Review',
        ]);

        // 🆕 Tambahkan nomor pendaftaran otomatis
        $tanggal = Carbon::now()->format('Ymd'); // contoh: 20251028
        $no_pendaftaran = 'PPDB' . $tanggal . str_pad($pendaftar->id, 4, '0', STR_PAD_LEFT); 
        // hasil: PPDB202510280001

        // Update field no_pendaftaran setelah data tersimpan
        $pendaftar->update(['no_pendaftaran' => $no_pendaftaran]);

        // Kirim ke view bukti pendaftaran
        return view('user.bukti', compact('pendaftar'));
    }
}