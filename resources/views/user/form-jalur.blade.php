@extends('layouts.app')

@section('title', 'Form Jalur Pendaftaran')

@section('content')
<!-- ====== NAVBAR ====== -->
<header class="bg-white border-b border-gray-200 shadow-sm">
  <div class="container mx-auto px-6 py-4 flex justify-between items-center">
    <h1 class="text-lg font-bold text-gray-900">TK Ceria Belajar</h1>
    <nav class="hidden md:flex items-center space-x-6 text-sm font-medium">
      <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600">Beranda</a>
      <a href="#" class="text-gray-700 hover:text-blue-600">Profil</a>
      <a href="#" class="text-gray-700 hover:text-blue-600">Program</a>
      <a href="#" class="text-gray-700 hover:text-blue-600">Galeri</a>
      <a href="{{ route('user.pendaftaran') }}" class="text-blue-600 font-semibold">PPDB</a>
      <a href="#" class="text-gray-700 hover:text-blue-600">Kontak</a>

      <span class="text-gray-300">|</span>
      <span class="text-gray-800">Halo, {{ Auth::user()->name ?? 'User' }}</span>

      <form action="{{ route('logout') }}" method="POST" class="inline">
        @csrf
        <button type="submit"
          class="bg-red-500 hover:bg-red-600 text-white px-4 py-1.5 rounded-lg font-semibold transition">
          Logout
        </button>
      </form>
    </nav>
  </div>
</header>

<!-- ====== FORM JALUR PENDAFTARAN ====== -->
<section class="min-h-screen bg-gradient-to-br from-[#F3F0FF] to-[#F5F3FF] py-12">
  <div class="container mx-auto px-6">
    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-lg p-10">

      <h2 class="text-2xl font-semibold text-gray-800 mb-2 flex items-center gap-2">
        🏫 Pilih Jalur Pendaftaran
      </h2>
      <p class="text-gray-500 mb-6">Pilih jalur dan kelas yang sesuai</p>

      <!-- FORM -->
      <form id="formJalur" method="POST" action="{{ route('pendaftaran.submit') }}" class="space-y-10">
        @csrf

        <!-- Jalur -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div onclick="pilihJalur('Reguler')" id="cardReguler"
               class="cursor-pointer p-5 border rounded-xl text-center hover:border-blue-500 hover:bg-blue-50 transition">
            <div class="text-3xl mb-2">📘</div>
            <h3 class="font-semibold text-gray-800">Jalur Reguler</h3>
            <p class="text-gray-500 text-sm">Pendaftaran umum untuk semua calon siswa</p>
          </div>
          <div onclick="pilihJalur('Prestasi')" id="cardPrestasi"
               class="cursor-pointer p-5 border rounded-xl text-center hover:border-purple-500 hover:bg-purple-50 transition">
            <div class="text-3xl mb-2">🏆</div>
            <h3 class="font-semibold text-gray-800">Jalur Prestasi</h3>
            <p class="text-gray-500 text-sm">Untuk anak dengan prestasi akademik/non-akademik</p>
          </div>
          <div onclick="pilihJalur('Afirmasi')" id="cardAfirmasi"
               class="cursor-pointer p-5 border rounded-xl text-center hover:border-green-500 hover:bg-green-50 transition">
            <div class="text-3xl mb-2">💚</div>
            <h3 class="font-semibold text-gray-800">Jalur Afirmasi</h3>
            <p class="text-gray-500 text-sm">Untuk keluarga tidak mampu atau kebutuhan khusus</p>
          </div>
        </div>

        <!-- Kelas -->
        <div>
          <label class="block text-gray-700 text-sm font-medium mb-1">Pilih Kelas *</label>
          <select name="kelas_select" id="kelas_select"
                  class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-blue-500 focus:border-blue-500">
            <option value="">Pilih kelas yang dituju</option>
            <option value="TK A">TK A</option>
            <option value="TK B">TK B</option>
          </select>
        </div>

        <!-- Ringkasan -->
        <div class="border border-yellow-300 bg-yellow-50 rounded-xl p-6">
          <h3 class="font-semibold text-yellow-700 mb-4 flex items-center gap-2">📋 Ringkasan Pendaftaran</h3>
          <p><strong>Nama Siswa:</strong> <span id="summaryNama">-</span></p>
          <p><strong>Nama Orang Tua:</strong> <span id="summaryOrtu">-</span></p>
          <p><strong>Jalur:</strong> <span id="summaryJalur">-</span></p>
          <p><strong>Kelas:</strong> <span id="summaryKelas">-</span></p>
        </div>

        <!-- Hidden Input -->
        @foreach([
          'nama','tempat_lahir','jenis_kelamin','anak_ke','alamat','nik','tanggal_lahir','agama','jumlah_saudara',
          'nama_ayah','nik_ayah','pekerjaan_ayah','penghasilan_ayah',
          'nama_ibu','nik_ibu','pekerjaan_ibu','penghasilan_ibu',
          'telepon','email','alamat_orangtua','jalur','kelas'
        ] as $field)
          <input type="hidden" name="{{ $field }}" id="hidden_{{ $field }}">
        @endforeach

        <!-- Tombol -->
        <div class="flex justify-between items-center pt-4">
          <a href="{{ route('user.formOrangtua') }}"
             class="px-5 py-2.5 border border-gray-300 rounded-lg hover:bg-gray-100 transition">
            ⬅ Kembali
          </a>
          <button type="submit" id="btnSubmit"
            class="px-6 py-2.5 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
            Submit Pendaftaran
          </button>
        </div>
      </form>

      <!-- Script -->
      <script>
        // === ISI OTOMATIS RINGKASAN ===
        window.addEventListener('DOMContentLoaded', () => {
          document.getElementById('summaryNama').textContent = localStorage.getItem('calon_nama') || '-';
          document.getElementById('summaryOrtu').textContent = localStorage.getItem('orangtua_nama_ayah') || '-';
          document.getElementById('summaryJalur').textContent = localStorage.getItem('jalur_pilihan') || '-';
          document.getElementById('summaryKelas').textContent = localStorage.getItem('jalur_kelas') || '-';

          const kelasValue = localStorage.getItem('jalur_kelas');
          if (kelasValue) document.getElementById('kelas_select').value = kelasValue;

          const jalur = localStorage.getItem('jalur_pilihan');
          if (jalur) pilihJalur(jalur);
        });

        // === PILIH JALUR ===
        function pilihJalur(namaJalur) {
          localStorage.setItem('jalur_pilihan', namaJalur);
          document.getElementById('summaryJalur').textContent = namaJalur;

          ['Reguler', 'Prestasi', 'Afirmasi'].forEach(jalur => {
            const el = document.getElementById(`card${jalur}`);
            el.classList.remove('border-blue-500', 'border-purple-500', 'border-green-500', 'bg-blue-50', 'bg-purple-50', 'bg-green-50');
          });

          document.getElementById(`card${namaJalur}`).classList.add(
            namaJalur === 'Reguler' ? 'border-blue-500 bg-blue-50' :
            namaJalur === 'Prestasi' ? 'border-purple-500 bg-purple-50' :
            'border-green-500 bg-green-50'
          );
        }

        // === SIMPAN KELAS OTOMATIS ===
        document.getElementById('kelas_select').addEventListener('change', function() {
          localStorage.setItem('jalur_kelas', this.value);
          document.getElementById('summaryKelas').textContent = this.value || '-';
        });

        // === VALIDASI DAN ISI SEMUA INPUT HIDDEN SEBELUM SUBMIT ===
        document.getElementById('formJalur').addEventListener('submit', function(e) {
          const kelas = localStorage.getItem('jalur_kelas');
          const jalur = localStorage.getItem('jalur_pilihan');
          if (!jalur || !kelas) {
            e.preventDefault();
            alert('⚠️ Harap pilih jalur dan kelas sebelum submit.');
            return;
          }

          const fields = [
            'nama','tempat_lahir','jenis_kelamin','anak_ke','alamat','nik','tanggal_lahir',
            'agama','jumlah_saudara','nama_ayah','nik_ayah','pekerjaan_ayah','penghasilan_ayah',
            'nama_ibu','nik_ibu','pekerjaan_ibu','penghasilan_ibu','telepon','email','alamat_orangtua'
          ];

          fields.forEach(field => {
            document.getElementById('hidden_' + field).value =
              localStorage.getItem('calon_' + field) ||
              localStorage.getItem('orangtua_' + field) || '';
          });

          document.getElementById('hidden_jalur').value = localStorage.getItem('jalur_pilihan') || '';
          document.getElementById('hidden_kelas').value = localStorage.getItem('jalur_kelas') || '';

          localStorage.clear();
        });
      </script>
    </div>
  </div>
</section>
@endsection