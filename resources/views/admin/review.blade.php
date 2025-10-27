@extends('layouts.app')

@section('title', 'Review Pendaftaran')

@section('content')
<div class="min-h-screen bg-gray-50 flex">

  {{-- SIDEBAR --}}
  <aside class="w-64 bg-white border-r border-gray-200 flex flex-col justify-between">
    <div>
      {{-- Logo --}}
      <div class="flex items-center gap-2 px-6 py-4 border-b border-gray-200">
        <div class="w-8 h-8 bg-blue-600 text-white rounded-lg grid place-items-center font-bold">TK</div>
        <h1 class="text-gray-900 font-semibold">TK Ceria</h1>
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
      <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Review Pendaftaran</h1>
      <p class="text-gray-500">Daftar calon siswa yang menunggu review</p>
    </div>

    {{-- NOTIF --}}
    @if(session('success'))
      <div class="bg-green-100 text-green-800 px-4 py-2 rounded-lg mb-4">
        {{ session('success') }}
      </div>
    @endif

    {{-- TABEL --}}
    <div class="bg-white rounded-2xl shadow">
      <table class="min-w-full text-left border-t">
        <thead>
          <tr class="text-xs uppercase tracking-wider text-gray-500 bg-gray-50">
            <th class="px-6 py-3">No</th>
            <th class="px-6 py-3">Nama Siswa</th>
            <th class="px-6 py-3">Orang Tua</th>
            <th class="px-6 py-3">Kelas</th>
            <th class="px-6 py-3">Status</th>
            <th class="px-6 py-3 text-center">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y">
          @forelse ($pendaftarMenunggu as $p)
          <tr class="text-sm text-gray-700">
            <td class="px-6 py-4">{{ $loop->iteration }}</td>
            <td class="px-6 py-4">{{ $p->nama_siswa }}</td>
            <td class="px-6 py-4">{{ $p->nama_ayah ?? '-' }}</td>
            <td class="px-6 py-4">{{ $p->kelas ?? '-' }}</td>
            <td class="px-6 py-4">
              <span class="px-2.5 py-1 rounded-full text-xs bg-yellow-100 text-yellow-700">
                {{ $p->status }}
              </span>
            </td>
            <td class="px-6 py-4 text-center">
              <form action="{{ route('admin.updateStatus', $p->id) }}" method="POST" class="inline-block">
                @csrf
                <input type="hidden" name="status" value="Diterima">
                <button type="submit" class="px-3 py-1 bg-green-500 text-white text-xs rounded hover:bg-green-600">
                  Terima
                </button>
              </form>
              <form action="{{ route('admin.updateStatus', $p->id) }}" method="POST" class="inline-block ml-2">
                @csrf
                <input type="hidden" name="status" value="Ditolak">
                <button type="submit" class="px-3 py-1 bg-red-500 text-white text-xs rounded hover:bg-red-600">
                  Tolak
                </button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="6" class="text-center py-10 text-gray-400">Tidak ada data menunggu review</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </main>
</div>
@endsection