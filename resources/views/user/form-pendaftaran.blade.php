@extends('layouts.app')

@section('title', 'Form Pendaftaran Siswa')

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

<!-- ====== FORM PENDAFTARAN SISWA ====== -->
<section class="min-h-screen bg-gradient-to-br from-[#F3F0FF] to-[#F5F3FF] py-12">
  <div class="container mx-auto px-6 flex items-center justify-center">
    <div class="bg-white rounded-2xl shadow-lg w-full max-w-3xl p-8">

      <h2 class="text-2xl font-semibold text-gray-800 mb-1">Profil Calon Siswa</h2>
      <p class="text-gray-500 mb-6">Masukkan data lengkap calon siswa</p>

      <form id="formCalonSiswa" method="POST" class="space-y-6">
        @csrf

        {{-- Nama & Tempat Lahir --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-gray-700 font-medium mb-1">
              Nama Lengkap Siswa <span class="text-red-500">*</span>
            </label>
            <input type="text" name="nama" placeholder="Masukkan nama lengkap"
              class="w-full border border-gray-300 rounded-lg px-3 py-3 focus:ring-blue-500 focus:border-blue-500">
          </div>
          <div>
            <label class="block text-gray-700 font-medium mb-1">
              Tempat Lahir <span class="text-red-500">*</span>
            </label>
            <input type="text" name="tempat_lahir" placeholder="Kota tempat lahir"
              class="w-full border border-gray-300 rounded-lg px-3 py-3 focus:ring-blue-500 focus:border-blue-500">
          </div>
        </div>

        {{-- Jenis Kelamin & Anak ke --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-gray-700 font-medium mb-1">
              Jenis Kelamin <span class="text-red-500">*</span>
            </label>
            <select name="jenis_kelamin"
              class="w-full border border-gray-300 rounded-lg px-3 py-3 focus:ring-blue-500 focus:border-blue-500">
              <option value="">Pilih jenis kelamin</option>
              <option value="Laki-laki">Laki-laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
          <div>
            <label class="block text-gray-700 font-medium mb-1">
              Anak ke- <span class="text-red-500">*</span>
            </label>
            <input type="number" name="anak_ke" placeholder="Masukkan urutan anak"
              class="w-full border border-gray-300 rounded-lg px-3 py-3 focus:ring-blue-500 focus:border-blue-500">
          </div>
        </div>

        {{-- Alamat --}}
        <div>
          <label class="block text-gray-700 font-medium mb-1">
            Alamat Lengkap <span class="text-red-500">*</span>
          </label>
          <textarea name="alamat" rows="2" placeholder="Masukkan alamat lengkap"
            class="w-full border border-gray-300 rounded-lg px-3 py-3 focus:ring-blue-500 focus:border-blue-500"></textarea>
        </div>

        {{-- NIK & Tanggal Lahir --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-gray-700 font-medium mb-1">
              NIK (Nomor Induk Kependudukan) <span class="text-red-500">*</span>
            </label>
            <input type="text" name="nik" placeholder="16 digit NIK"
              class="w-full border border-gray-300 rounded-lg px-3 py-3 focus:ring-blue-500 focus:border-blue-500">
          </div>
          <div>
            <label class="block text-gray-700 font-medium mb-1">
              Tanggal Lahir <span class="text-red-500">*</span>
            </label>
            <input type="date" name="tanggal_lahir"
              class="w-full border border-gray-300 rounded-lg px-3 py-3 focus:ring-blue-500 focus:border-blue-500">
          </div>
        </div>

        {{-- Agama & Jumlah Saudara --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-gray-700 font-medium mb-1">
              Agama <span class="text-red-500">*</span>
            </label>
            <select name="agama"
              class="w-full border border-gray-300 rounded-lg px-3 py-3 focus:ring-blue-500 focus:border-blue-500">
              <option value="">Pilih agama</option>
              <option value="Islam">Islam</option>
              <option value="Kristen">Kristen</option>
              <option value="Katolik">Katolik</option>
              <option value="Hindu">Hindu</option>
              <option value="Buddha">Buddha</option>
              <option value="Konghucu">Konghucu</option>
            </select>
          </div>
          <div>
            <label class="block text-gray-700 font-medium mb-1">Jumlah Saudara</label>
            <input type="number" name="jumlah_saudara" min="0" value="0"
              class="w-full border border-gray-300 rounded-lg px-3 py-3 focus:ring-blue-500 focus:border-blue-500">
          </div>
        </div>

        {{-- Tombol Navigasi --}}
        <div class="flex justify-between items-center pt-4">
          <a href="{{ route('user.dashboard') }}"
            class="px-5 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition">
            Kembali
          </a>
          <button type="button" id="btnLanjut"
            class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            Lanjut
          </button>
        </div>
      </form>

      {{-- Script Simpan Otomatis & Validasi --}}
      <script>
        const fields = [
          'nama', 'tempat_lahir', 'jenis_kelamin', 'anak_ke',
          'alamat', 'nik', 'tanggal_lahir', 'agama', 'jumlah_saudara'
        ];

        // Saat halaman dimuat, isi ulang data dari localStorage
        window.addEventListener('DOMContentLoaded', () => {
          fields.forEach(f => {
            const el = document.querySelector(`[name="${f}"]`);
            const saved = localStorage.getItem(`calon_${f}`);
            if (el && saved) el.value = saved;
          });
        });

        // Saat input berubah, simpan otomatis ke localStorage
        fields.forEach(f => {
          const el = document.querySelector(`[name="${f}"]`);
          if (!el) return;
          el.addEventListener('input', () => {
            localStorage.setItem(`calon_${f}`, el.value);
          });
        });

        // Tombol lanjut dengan validasi
        document.getElementById('btnLanjut').addEventListener('click', function() {
          let isValid = true;
          let firstEmpty = null;

          fields.forEach(f => {
            const el = document.querySelector(`[name="${f}"]`);
            if (!el || el.value.trim() === '') {
              isValid = false;
              el.classList.add('border-red-500', 'focus:ring-red-500');
              if (!firstEmpty) firstEmpty = el;
            } else {
              el.classList.remove('border-red-500', 'focus:ring-red-500');
              localStorage.setItem(`calon_${f}`, el.value);
            }
          });

          if (!isValid) {
            alert('⚠️ Harap isi semua kolom wajib sebelum melanjutkan.');
            firstEmpty?.focus();
            return;
          }

          window.location.href = "{{ route('user.formOrangtua') }}";
        });
      </script>

    </div>
  </div>
</section>
@endsection