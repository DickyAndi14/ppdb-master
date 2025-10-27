<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;

class AdminController extends Controller
{
    public function dashboard()
    {
        $pendaftaran = \App\Models\Pendaftar::orderBy('id', 'asc')->take(5)->get();
    
        $total = \App\Models\Pendaftar::count();
    
        // gunakan lowercase agar lebih fleksibel
        $review = \App\Models\Pendaftar::whereRaw("LOWER(status) = 'menunggu review'")->count();
        $diterima = \App\Models\Pendaftar::whereRaw("LOWER(status) = 'diterima'")->count();
        $ditolak = \App\Models\Pendaftar::whereRaw("LOWER(status) = 'ditolak'")->count();
    
        return view('admin.dashboard', compact('pendaftaran', 'total', 'review', 'diterima', 'ditolak'));
    }    

    public function review()
    {
        $pendaftarMenunggu = \App\Models\Pendaftar::where('status', 'Menunggu Review')->get();
    
        return view('admin.review', compact('pendaftarMenunggu'));
    }
    
    public function updateStatus($id)
    {
        $pendaftar = \App\Models\Pendaftar::findOrFail($id);
        $statusBaru = request('status'); // 'Diterima' atau 'Ditolak'
    
        $pendaftar->update(['status' => $statusBaru]);
    
        return redirect()->route('admin.review')->with('success', 'Status berhasil diperbarui!');
    }    
}