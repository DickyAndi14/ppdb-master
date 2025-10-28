@extends('layouts.app')

@section('title', 'Review Pendaftaran')

@section('content')
<div class="min-h-screen bg-gray-50 flex">

  {{-- SIDEBAR --}}
  <aside class="w-64 bg-white border-r border-gray-200 flex flex-col justify-between">
    <div>
      <div class="flex items-center gap-2 px-6 py-4 border-b border-gray-200">
        <div class="w-8 h-8 bg-blue-600 text-white rounded-lg grid place-items-center font-bold">TK</div>
        <h1 class="text-gray-900 font-semibold">SD Ceria</h1>
      </div>

      <nav class="p-4 space-y-1 text-gray-700">
        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-700 font-medium' : 'hover:bg-gray-100' }}">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6"/>
          </svg>
          Dashboard
        </a>

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

    {{-- Notif --}}
    @if(session('success'))
      <div class="bg-green-100 text-green-800 px-4 py-2 rounded-lg mb-4">
        {{ session('success') }}
      </div>
    @endif

    <div class="bg-white rounded-2xl shadow">
      <table class="min-w-full text-left border-t">
        <thead>
          <tr class="text-xs uppercase tracking-wider text-gray-500 bg-gray-50">
            <th class="px-6 py-3">No</th>
            <th class="px-6 py-3">Nama Siswa</th>
            <th class="px-6 py-3">Orang Tua</th>
            <th class="px-6 py-3">Kelas</th>
            <th class="px-6 py-3">Jalur</th>
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

            {{-- Jalur --}}
            <td class="px-6 py-4">
              @php
                $jalur = strtolower($p->jalur);
                $badgeClass = match($jalur) {
                  'reguler' => 'bg-blue-100 text-blue-700',
                  'prestasi' => 'bg-purple-100 text-purple-700',
                  'afirmasi' => 'bg-emerald-50 text-emerald-700',
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
                {{ $p->status }}
              </span>
            </td>

            {{-- Aksi --}}
            <td class="px-6 py-4 text-center">
              {{-- Tombol Info --}}
              <button 
              onclick='openModal({{ $p->id }})'
              class="px-3 py-1 bg-blue-500 text-white text-xs rounded hover:bg-blue-600">
              Info
            </button>            
              {{-- Tombol Terima --}}
              <form action="{{ route('admin.updateStatus', $p->id) }}" method="POST" class="inline-block ml-2">
                @csrf
                <input type="hidden" name="status" value="Diterima">
                <button type="submit" class="px-3 py-1 bg-green-500 text-white text-xs rounded hover:bg-green-600">
                  Terima
                </button>
              </form>

              {{-- Tombol Tolak --}}
              <form action="{{ route('admin.updateStatus', $p->id) }}" method="POST" class="inline-block ml-2">
                @csrf
                <input type="hidden" name="status" value="Ditolak">
                <button type="submit" class="px-3 py-1 bg-red-500 text-white text-xs rounded hover:bg-red-600">
                  Tolak
                </button>
              </form>

              {{-- Modal Detail --}}
              <div id="modal-{{ $p->id }}" class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
                <div class="bg-white w-full max-w-2xl rounded-2xl shadow-2xl p-6 relative animate-fadeIn">
                  {{-- Tombol Close --}}
                  <button onclick="closeModal({{ $p->id }})"
                    class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 text-2xl font-bold">&times;</button>

                  {{-- Judul --}}
                  <h2 class="text-2xl font-semibold text-center text-gray-900 mb-6 border-b pb-3">Detail Pendaftaran</h2>

                  {{-- Isi Modal --}}
                  <div class="grid md:grid-cols-2 gap-8 text-gray-700 text-sm">
                    {{-- Kolom Siswa --}}
                    <div>
                      <h3 class="font-semibold text-gray-800 mb-2 text-base">📘 Data Calon Siswa</h3>
                      <div class="space-y-1">
                        <p><strong>Nama:</strong> {{ $p->nama_siswa }}</p>
                        <p><strong>NIK:</strong> {{ $p->nik }}</p>
                        <p><strong>Jenis Kelamin:</strong> {{ $p->jenis_kelamin }}</p>
                        <p><strong>Tempat, Tanggal Lahir:</strong> {{ $p->tempat_lahir }}, {{ $p->tanggal_lahir }}</p>
                        <p><strong>Agama:</strong> {{ $p->agama }}</p>
                        <p><strong>Alamat:</strong> {{ $p->alamat }}</p>
                      </div>
                    </div>

                    {{-- Kolom Orang Tua --}}
                    <div>
                      <h3 class="font-semibold text-gray-800 mb-2 text-base">👨‍👩‍👧 Data Orang Tua</h3>
                      <div class="space-y-1">
                        <p><strong>Nama Ayah:</strong> {{ $p->nama_ayah }}</p>
                        <p><strong>Pekerjaan Ayah:</strong> {{ $p->pekerjaan_ayah }}</p>
                        <p><strong>Nama Ibu:</strong> {{ $p->nama_ibu }}</p>
                        <p><strong>Pekerjaan Ibu:</strong> {{ $p->pekerjaan_ibu }}</p>
                        <p><strong>Alamat Orang Tua:</strong> {{ $p->alamat_orangtua }}</p>
                        <p><strong>No. Telepon:</strong> {{ $p->telepon }}</p>
                      </div>
                    </div>
                  </div>

                  {{-- Divider --}}
                  <hr class="my-6 border-gray-200">

                  {{-- Data Tambahan --}}
                  <div class="flex flex-col md:flex-row md:justify-around text-center gap-3">
                    <div>
                      <span class="text-gray-500 text-xs uppercase tracking-wide">Jalur</span>
                      <div class="mt-1 px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-sm font-medium inline-block">
                        {{ $p->jalur }}
                      </div>
                    </div>
                    <div>
                      <span class="text-gray-500 text-xs uppercase tracking-wide">Kelas</span>
                      <div class="mt-1 px-3 py-1 bg-gray-50 text-gray-700 rounded-full text-sm font-medium inline-block">
                        {{ $p->kelas }}
                      </div>
                    </div>
                    <div>
                      <span class="text-gray-500 text-xs uppercase tracking-wide">Status</span>
                      <div class="mt-1 px-3 py-1 rounded-full text-sm font-medium inline-block
                        {{ $p->status == 'Diterima' ? 'bg-green-100 text-green-700' :
                           ($p->status == 'Ditolak' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') }}">
                        {{ $p->status }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="7" class="text-center py-10 text-gray-400">Tidak ada data menunggu review</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </main>
</div>

{{-- JS Modal --}}
<script>
  function openModal(id) {
    document.getElementById(`modal-${id}`).classList.remove('hidden');
  }
  function closeModal(id) {
    document.getElementById(`modal-${id}`).classList.add('hidden');
  }
</script>

<style>
@keyframes fadeIn {
  from { opacity: 0; transform: scale(0.95); }
  to { opacity: 1; transform: scale(1); }
}
.animate-fadeIn {
  animation: fadeIn 0.2s ease-out;
}
</style>
@endsection