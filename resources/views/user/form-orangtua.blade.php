@extends('layouts.app')

@section('title', 'Form Data Orang Tua')

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

<!-- ====== FORM DATA ORANG TUA ====== -->
<section class="min-h-screen bg-gradient-to-br from-[#F3F0FF] to-[#F5F3FF] py-12">
  <div class="container mx-auto px-6">
    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-lg p-10">

      <h2 class="text-2xl font-semibold text-gray-800 mb-2 flex items-center gap-2">
        👨‍👩‍👧‍👦 Identitas Orang Tua
      </h2>
      <p class="text-gray-500 mb-6">Masukkan data lengkap orang tua/wali</p>

      <form id="formOrangtua" method="POST" class="space-y-10">
        @csrf

        <!-- === DATA AYAH === -->
        <div class="border rounded-2xl p-6 bg-blue-50 border-blue-200">
          <h3 class="text-lg font-semibold text-blue-700 mb-5 flex items-center gap-2">🧔‍♂️ Data Ayah</h3>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-gray-700 text-sm font-medium mb-1">Nama Lengkap Ayah *</label>
              <input type="text" name="nama_ayah" placeholder="Masukkan nama ayah"
                     class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
              <label class="block text-gray-700 text-sm font-medium mb-1">NIK Ayah *</label>
              <input type="text" name="nik_ayah" placeholder="16 digit NIK"
                     class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
              <label class="block text-gray-700 text-sm font-medium mb-1">Pekerjaan Ayah *</label>
              <input type="text" name="pekerjaan_ayah" placeholder="Contoh: PNS, Wiraswasta"
                     class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
              <label class="block text-gray-700 text-sm font-medium mb-1">Penghasilan Ayah *</label>
              <select name="penghasilan_ayah"
                      class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-blue-500 focus:border-blue-500">
                <option value="">Pilih range penghasilan</option>
                <option value="< 1 juta">< 1 juta</option>
                <option value="1-3 juta">1–3 juta</option>
                <option value="3-5 juta">3–5 juta</option>
                <option value="> 5 juta">> 5 juta</option>
              </select>
            </div>
          </div>
        </div>

        <!-- === DATA IBU === -->
        <div class="border rounded-2xl p-6 bg-purple-50 border-purple-200">
          <h3 class="text-lg font-semibold text-purple-700 mb-5 flex items-center gap-2">👩‍🦰 Data Ibu</h3>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-gray-700 text-sm font-medium mb-1">Nama Lengkap Ibu *</label>
              <input type="text" name="nama_ibu" placeholder="Masukkan nama ibu"
                     class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-purple-500 focus:border-purple-500">
            </div>
            <div>
              <label class="block text-gray-700 text-sm font-medium mb-1">NIK Ibu *</label>
              <input type="text" name="nik_ibu" placeholder="16 digit NIK"
                     class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-purple-500 focus:border-purple-500">
            </div>
            <div>
              <label class="block text-gray-700 text-sm font-medium mb-1">Pekerjaan Ibu *</label>
              <input type="text" name="pekerjaan_ibu" placeholder="Contoh: Ibu Rumah Tangga"
                     class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-purple-500 focus:border-purple-500">
            </div>
            <div>
              <label class="block text-gray-700 text-sm font-medium mb-1">Penghasilan Ibu *</label>
              <select name="penghasilan_ibu"
                      class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-purple-500 focus:border-purple-500">
                <option value="">Pilih range penghasilan</option>
                <option value="< 1 juta">< 1 juta</option>
                <option value="1-3 juta">1–3 juta</option>
                <option value="3-5 juta">3–5 juta</option>
                <option value="> 5 juta">> 5 juta</option>
              </select>
            </div>
          </div>
        </div>

        <!-- === KONTAK ORANG TUA === -->
        <div class="border rounded-2xl p-6 bg-green-50 border-green-200">
          <h3 class="text-lg font-semibold text-green-700 mb-5 flex items-center gap-2">📞 Kontak Orang Tua</h3>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-gray-700 text-sm font-medium mb-1">Nomor Telepon *</label>
              <input type="text" name="telepon" placeholder="08xxxx"
                     class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-green-500 focus:border-green-500">
            </div>
            <div>
              <label class="block text-gray-700 text-sm font-medium mb-1">Email *</label>
              <input type="email" name="email" placeholder="admin@tkceria.com"
                     class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-green-500 focus:border-green-500">
            </div>
          </div>

          <div class="mt-5">
            <label class="block text-gray-700 text-sm font-medium mb-1">Alamat Orang Tua *</label>
            <textarea name="alamat_orangtua" rows="3" placeholder="Masukkan alamat lengkap"
                      class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-green-500 focus:border-green-500"></textarea>
          </div>
        </div>

        <!-- === TOMBOL === -->
        <div class="flex justify-between items-center pt-4">
          <a href="{{ route('user.pendaftaran') }}"
             class="px-5 py-2.5 border border-gray-300 rounded-lg hover:bg-gray-100 transition">
            ⬅ Kembali
          </a>
          <button type="button" id="btnLanjutOrangtua"
            class="px-6 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            Lanjut ➜
          </button>
        </div>
      </form>

      {{-- Script Simpan Otomatis & Validasi --}}
      <script>
        const orangtuaFields = [
          'nama_ayah', 'nik_ayah', 'pekerjaan_ayah', 'penghasilan_ayah',
          'nama_ibu', 'nik_ibu', 'pekerjaan_ibu', 'penghasilan_ibu',
          'telepon', 'email', 'alamat_orangtua'
        ];

        // Isi ulang data dari localStorage
        window.addEventListener('DOMContentLoaded', () => {
          orangtuaFields.forEach(f => {
            const el = document.querySelector(`[name="${f}"]`);
            const saved = localStorage.getItem(`orangtua_${f}`);
            if (el && saved) el.value = saved;
          });
        });

        // Simpan otomatis saat user mengetik
        orangtuaFields.forEach(f => {
          const el = document.querySelector(`[name="${f}"]`);
          if (!el) return;
          el.addEventListener('input', () => {
            localStorage.setItem(`orangtua_${f}`, el.value);
          });
        });

        // Validasi tombol lanjut
        document.getElementById('btnLanjutOrangtua').addEventListener('click', function() {
          let isValid = true;
          let firstEmpty = null;

          orangtuaFields.forEach(f => {
            const el = document.querySelector(`[name="${f}"]`);
            if (!el || el.value.trim() === '') {
              isValid = false;
              el.classList.add('border-red-500', 'focus:ring-red-500');
              if (!firstEmpty) firstEmpty = el;
            } else {
              el.classList.remove('border-red-500', 'focus:ring-red-500');
              localStorage.setItem(`orangtua_${f}`, el.value);
            }
          });

          if (!isValid) {
            alert('⚠️ Harap isi semua kolom wajib sebelum melanjutkan.');
            firstEmpty?.focus();
            return;
          }

          window.location.href = "{{ route('user.formJalur') }}";
        });
      </script>

    </div>
  </div>
</section>
@endsection