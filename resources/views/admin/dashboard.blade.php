@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="min-h-screen bg-gray-50 flex">

  {{-- SIDEBAR --}}
  <aside class="w-64 bg-white border-r border-gray-200 flex flex-col justify-between">
    <div>
      {{-- Logo --}}
      <div class="flex items-center gap-2 px-6 py-4 border-b border-gray-200">
        <div class="w-8 h-8 bg-blue-600 text-white rounded-lg grid place-items-center font-bold">SD</div>
        <h1 class="text-gray-900 font-semibold">SD Ceria</h1>
      </div>

      {{-- Menu --}}
      <nav class="p-4 space-y-1 text-gray-700">

        {{-- Dashboard --}}
        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-700 font-medium' : 'hover:bg-gray-100' }}">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6"/>
          </svg>
          Dashboard
        </a>

        {{-- Review Pendaftaran --}}
        <a href="{{ route('admin.review') }}"
           class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('admin.review') ? 'bg-yellow-50 text-yellow-700 font-medium' : 'hover:bg-gray-100' }}">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12l2 2 4-4m5 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
          Review Pendaftaran
        </a>

      </nav>
    </div>

    {{-- LOGOUT --}}
    <div class="p-4 border-t border-gray-200">
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit"
                class="w-full flex items-center gap-3 px-3 py-2 rounded-lg text-red-600 hover:bg-red-50 font-medium transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 11-4 0v-1m0-12V3a2 2 0 114 0v1"/>
          </svg>
          Logout
        </button>
      </form>
    </div>
  </aside>

  {{-- MAIN CONTENT --}}
  <main class="flex-1 p-6 md:p-8">
    <div class="mb-6">
      <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Dashboard Admin</h1>
      <p class="text-gray-500">SD Ceria</p>
    </div>

    {{-- STATISTIK --}}
    <div class="grid lg:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-6">
      <div class="bg-white rounded-xl shadow p-5 border-l-4 border-blue-500">
        <p class="text-gray-500 text-sm">Total Pendaftar</p>
        <p class="text-3xl font-bold mt-1">{{ $total ?? 0 }}</p>
        <p class="text-gray-400 text-sm mt-1">Semua pendaftar</p>
      </div>

      <div class="bg-white rounded-xl shadow p-5 border-l-4 border-yellow-400">
        <p class="text-gray-500 text-sm">Menunggu Review</p>
        <p class="text-3xl font-bold mt-1">{{ $review ?? 0 }}</p>
        <p class="text-gray-400 text-sm mt-1">Perlu ditinjau</p>
      </div>

      <div class="bg-white rounded-xl shadow p-5 border-l-4 border-green-500">
        <p class="text-gray-500 text-sm">Diterima</p>
        <p class="text-3xl font-bold mt-1">{{ $diterima ?? 0 }}</p>
        <p class="text-gray-400 text-sm mt-1">Sudah diterima</p>
      </div>

      <div class="bg-white rounded-xl shadow p-5 border-l-4 border-red-500">
        <p class="text-gray-500 text-sm">Ditolak</p>
        <p class="text-3xl font-bold mt-1">{{ $ditolak ?? 0 }}</p>
        <p class="text-gray-400 text-sm mt-1">Tidak diterima</p>
      </div>
    </div>

    {{-- PENDAFTARAN TERBARU --}}
    <div class="bg-white rounded-2xl shadow mt-8">
      <div class="flex items-center justify-between px-6 py-4 border-b">
        <h3 class="text-lg font-semibold text-gray-800">Pendaftaran Terbaru</h3>
        <a href="{{ route('admin.review') }}" class="text-sm text-blue-600 hover:underline">Lihat Semua →</a>
      </div>

      <div class="overflow-x-auto">
        <table class="min-w-full text-left">
          <thead>
            <tr class="text-xs uppercase tracking-wider text-gray-500">
              <th class="px-6 py-3">No</th>
              <th class="px-6 py-3">Nama Siswa</th>
              <th class="px-6 py-3">Orang Tua</th>
              <th class="px-6 py-3">Kelas</th>
              <th class="px-6 py-3">Jalur</th>
              <th class="px-6 py-3">Status</th>
            </tr>
          </thead>
          <tbody class="divide-y">
            @forelse ($pendaftaran as $p)
              <tr class="text-sm text-gray-700">
                <td class="px-6 py-4">{{ $p->id }}</td>
                <td class="px-6 py-4">{{ $p->nama_siswa }}</td>
                <td class="px-6 py-4">{{ $p->nama_ayah ?? '-' }}</td>
                <td class="px-6 py-4">{{ $p->kelas ?? '-' }}</td>

                {{-- 🌈 Jalur dengan warna unik (mint green untuk afirmasi) --}}
                <td class="px-6 py-4">
                  @php
                    $jalur = strtolower($p->jalur);
                    $badgeClass = match($jalur) {
                      'reguler' => 'bg-blue-100 text-blue-700',
                      'prestasi' => 'bg-purple-100 text-purple-700',
                      'afirmasi' => 'bg-emerald-50 text-emerald-700', // lebih lembut, beda dari hijau status
                      default => 'bg-gray-100 text-gray-600',
                    };
                  @endphp
                  <span class="px-2.5 py-1 rounded-full text-xs font-medium {{ $badgeClass }}">
                    {{ $p->jalur ?? '-' }}
                  </span>
                </td>

                {{-- Status --}}
                <td class="px-6 py-4">
                  <span class="px-2.5 py-1 rounded-full text-xs 
                    {{ $p->status == 'Diterima' ? 'bg-green-100 text-green-700' :
                       ($p->status == 'Ditolak' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') }}">
                    {{ $p->status ?? 'Menunggu Review' }}
                  </span>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="6" class="px-6 py-12 text-center text-gray-400">
                  Belum ada data pendaftaran
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </main>
</div>
@endsection