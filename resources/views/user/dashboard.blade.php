@extends('layouts.app')

@section('title', 'Dashboard User')

@section('content')
<!-- NAVBAR -->
<header class="bg-white border-b border-gray-200">
  <div class="container mx-auto px-6 py-4">
    <div class="flex items-center justify-between">
      <!-- Brand -->
      <div class="text-xl font-semibold text-gray-900">
        TK Ceria Belajar
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

    <!-- Kartu Informasi Akun -->
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

    <!-- 🟡 Kartu Status Pendaftaran (TAMBAHAN BARU) -->
    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
      <h2 class="text-xl font-semibold text-gray-800 mb-6">Status Pendaftaran</h2>

      @if(isset($pendaftaran) && $pendaftaran)
        <div class="flex items-center justify-between">
          <p class="text-gray-700 font-medium">Status Saat Ini:</p>

          @php
            $status = $pendaftaran->status ?? 'Menunggu Review';
            $color = match($status) {
                'Diterima' => 'bg-green-100 text-green-700',
                'Ditolak' => 'bg-red-100 text-red-700',
                default => 'bg-yellow-100 text-yellow-700',
            };
          @endphp

          <span class="px-4 py-2 rounded-full text-sm font-semibold {{ $color }}">
            {{ $status }}
          </span>
        </div>
      @else
        <p class="text-gray-500 italic">Anda belum melakukan pendaftaran.</p>
      @endif
    </div>

    <!-- Menu Cepat -->
    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl p-6 md:p-8">
      <h2 class="text-xl font-semibold text-gray-800 mb-6">Menu Cepat</h2>
      <div class="grid md:grid-cols-2 gap-6">

        <!-- Form PPDB -->
        <a href="{{ route('user.pendaftaran') }}"
           class="rounded-xl border border-blue-200 bg-blue-50 hover:bg-blue-100 transition shadow-sm p-6 flex items-center justify-center text-center">
          <div>
            <div class="flex justify-center mb-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12h6m-6 4h6M7 8h10m-9 8h8a2 2 0 002-2V6a2 2 0 00-2-2H9l-2 2v12z"/>
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
              <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
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