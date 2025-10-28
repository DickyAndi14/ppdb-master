@extends('layouts.app')

@section('title', 'Dashboard User')

@section('content')
<!-- NAVBAR -->
<header class="bg-white border-b border-gray-200">
  <div class="container mx-auto px-6 py-4">
    <div class="flex items-center justify-between">
      <!-- Brand -->
      <div class="text-xl font-semibold text-gray-900">
        SD Ceria Belajar
      </div>

      <!-- Menu -->
      <nav class="hidden md:flex items-center space-x-6 text-sm">
        <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600">Beranda</a>
        <a href="#" class="text-gray-700 hover:text-blue-600">Profil</a>
        <a href="#" class="text-gray-700 hover:text-blue-600">Program</a>
        <a href="#" class="text-gray-700 hover:text-blue-600">Galeri</a>
        <a href="#" class="text-blue-600 font-semibold">PPDB</a>
        <a href="#" class="text-gray-700 hover:text-blue-600">Kontak</a>

        <span class="text-gray-300">|</span>

        <!-- Nama user -->
        <span class="text-gray-800">
          Halo, {{ Auth::user()->name ?? 'User Demo' }}
        </span>

        <!-- Tombol Logout -->
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit"
            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg font-semibold">
            Logout
          </button>
        </form>
      </nav>
    </div>
  </div>
</header>

<!-- BODY -->
<section class="min-h-screen bg-gradient-to-br from-[#F3F0FF] to-[#F5F3FF] py-12">
  <div class="container mx-auto px-6">
    <!-- Heading -->
    <div class="text-center mb-8">
      <h1 class="text-3xl font-extrabold text-gray-800">Dashboard User</h1>
      <p class="text-gray-600 mt-2">
        Selamat datang, {{ Auth::user()->name ?? 'User Demo' }}!<br>
        Email: {{ Auth::user()->email ?? 'user@example.com' }}
      </p>
    </div>

    <!-- Informasi Akun -->
    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
      <h2 class="text-xl font-semibold text-gray-800 mb-6">Informasi Akun</h2>
      <div class="grid md:grid-cols-2 gap-6 text-gray-800">
        <div>
          <p class="text-sm text-gray-500">Nama Lengkap</p>
          <p class="font-semibold mt-1">{{ Auth::user()->name ?? 'User Demo' }}</p>

          <p class="text-sm text-gray-500 mt-4">Status</p>
          <p class="mt-1 font-medium text-green-600">Aktif</p>
        </div>
        <div>
          <p class="text-sm text-gray-500">Email</p>
          <p class="font-semibold mt-1">{{ Auth::user()->email ?? 'user@example.com' }}</p>

          <p class="text-sm text-gray-500 mt-4">Tanggal Bergabung</p>
          <p class="mt-1 font-semibold">
            {{ optional(Auth::user()->created_at)->format('d M Y') ?? '25 Oct 2025' }}
          </p>
        </div>
      </div>
    </div>

    <!-- 🟡 STATUS PENDAFTARAN -->
    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
      <h2 class="text-xl font-semibold text-gray-800 mb-6">Status Pendaftaran Anda</h2>

      @if(isset($pendaftaran) && $pendaftaran)
      <div class="border border-gray-200 rounded-xl p-6 bg-gradient-to-b from-[#f9f9ff] to-white relative">
        <div class="flex items-center gap-3 mb-4">
          
          <!-- ✅ Ikon Dinamis -->
          <div class="
            rounded-full p-3
            @if($pendaftaran->status == 'Diterima')
              bg-green-100 text-green-600
            @elseif($pendaftaran->status == 'Ditolak')
              bg-red-100 text-red-600
            @else
              bg-yellow-100 text-yellow-600
            @endif
          ">
            @if($pendaftaran->status == 'Diterima')
              <!-- Centang -->
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M5 13l4 4L19 7" />
              </svg>
            @elseif($pendaftaran->status == 'Ditolak')
              <!-- Silang -->
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M6 18L18 6M6 6l12 12" />
              </svg>
            @else
              <!-- Jam -->
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                <path
                  d="M12 22a10 10 0 100-20 10 10 0 000 20zm0-18a8 8 0 11-8 8 8 8 0 018-8zm0 3a1 1 0 011 1v4.586l2.293 2.293a1 1 0 01-1.414 1.414l-2.586-2.586A1 1 0 0111 12V8a1 1 0 011-1z" />
              </svg>
            @endif
          </div>

          <!-- Data Siswa -->
          <div>
            <h3 class="font-semibold text-gray-900 text-lg">{{ $pendaftaran->nama_siswa ?? 'Nama Siswa' }}</h3>
            <p class="text-gray-500 text-sm">
              No. {{ $pendaftaran->no_pendaftaran ?? '-' }}<br>
              {{ $pendaftaran->kelas ?? 'A' }} • Jalur {{ $pendaftaran->jalur ?? 'Reguler' }} •
              {{ \Carbon\Carbon::parse($pendaftaran->created_at ?? now())->format('d/m/Y') }}
            </p>
          </div>

          <!-- Status Label -->
          <div class="absolute top-5 right-5">
            @if($pendaftaran->status == 'Diterima')
              <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium border border-green-300">Diterima</span>
            @elseif($pendaftaran->status == 'Ditolak')
              <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-medium border border-red-300">Ditolak</span>
            @else
              <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-medium border border-yellow-300">Menunggu Verifikasi</span>
            @endif
          </div>
        </div>

        <hr class="my-4 border-gray-200">

        <div class="grid grid-cols-2 md:grid-cols-2 gap-y-4 gap-x-12 text-sm">
          <div class="space-y-2">
            <p><strong class="text-gray-800">NIK:</strong> <span class="text-gray-700">{{ $pendaftaran->nik ?? '-' }}</span></p>
            <p><strong class="text-gray-800">Nama Ayah:</strong> <span class="text-gray-700">{{ $pendaftaran->nama_ayah ?? '-' }}</span></p>
            <p><strong class="text-gray-800">Jenis Kelamin:</strong> <span class="text-gray-700">{{ $pendaftaran->jenis_kelamin ?? '-' }}</span></p>
          </div>
          <div class="space-y-2">
            <p><strong class="text-gray-800">Tanggal Lahir:</strong>
              <span class="text-gray-700">
                {{ $pendaftaran->tanggal_lahir ? \Carbon\Carbon::parse($pendaftaran->tanggal_lahir)->format('d/m/Y') : '-' }}
              </span>
            </p>
            <p><strong class="text-gray-800">Nama Ibu:</strong> <span class="text-gray-700">{{ $pendaftaran->nama_ibu ?? '-' }}</span></p>
            <p><strong class="text-gray-800">No. Telepon:</strong> <span class="text-gray-700">{{ $pendaftaran->telepon ?? '-' }}</span></p>
          </div>
        </div>

        <!-- Pesan Status Dinamis -->
        <div class="mt-5">
          @if($pendaftaran->status == 'Menunggu Verifikasi')
            <div class="bg-yellow-50 border border-yellow-200 text-yellow-800 p-4 rounded-lg flex items-start gap-2">
              <span class="text-xl">⏳</span>
              <p class="text-sm leading-relaxed">
                <strong>Menunggu Verifikasi</strong> — Pendaftaran Anda sedang diproses.
                Mohon menunggu <strong>3–5 hari kerja</strong> untuk verifikasi.
              </p>
            </div>
          @elseif($pendaftaran->status == 'Diterima')
            <div class="bg-green-50 border border-green-200 text-green-800 p-4 rounded-lg flex items-start gap-2">
              <span class="text-xl">✅</span>
              <p class="text-sm leading-relaxed">
                <strong>Selamat!</strong> Pendaftaran Anda telah <strong>diterima</strong>.
                Silakan tunggu informasi selanjutnya dari pihak sekolah.
              </p>
            </div>
          @elseif($pendaftaran->status == 'Ditolak')
            <div class="bg-red-50 border border-red-200 text-red-800 p-4 rounded-lg flex items-start gap-2">
              <span class="text-xl">❌</span>
              <p class="text-sm leading-relaxed">
                <strong>Maaf,</strong> pendaftaran Anda <strong>tidak diterima</strong>.
                Anda dapat menghubungi pihak sekolah untuk informasi lebih lanjut.
              </p>
            </div>
          @endif
        </div>
      </div>
      @else
      <p class="text-gray-500 italic">Anda belum melakukan pendaftaran.</p>
      @endif
    </div>

    <!-- MENU CEPAT -->
    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl p-6 md:p-8">
      <h2 class="text-xl font-semibold text-gray-800 mb-6">Menu Cepat</h2>
      <div class="grid md:grid-cols-2 gap-6">
        <!-- Form PPDB -->
        <a href="{{ route('user.pendaftaran') }}"
          class="rounded-xl border border-blue-200 bg-blue-50 hover:bg-blue-100 transition shadow-sm p-6 flex items-center justify-center text-center">
          <div>
            <div class="flex justify-center mb-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-blue-500" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12h6m-6 4h6M7 8h10m-9 8h8a2 2 0 002-2V6a2 2 0 00-2-2H9l-2 2v12z" />
              </svg>
            </div>
            <p class="font-semibold text-gray-800">Form PPDB</p>
            <p class="text-gray-500 text-sm">Daftar sebagai siswa baru</p>
          </div>
        </a>

        <!-- Pendaftaran -->
        <a href="{{ route('user.pendaftaran') }}"
          class="rounded-xl border border-green-200 bg-green-50 hover:bg-green-100 transition shadow-sm p-6 flex items-center justify-center text-center">
          <div>
            <div class="flex justify-center mb-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-600" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
              </svg>
            </div>
            <p class="font-semibold text-gray-800">Pendaftaran</p>
            <p class="text-gray-500 text-sm">Isi formulir pendaftaran</p>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>
@endsection