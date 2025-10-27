@extends('layouts.app')

@section('title', 'Registrasi Akun')

@section('content')
@include('components.navbar')

<section class="min-h-screen flex items-center justify-center bg-gradient-to-br from-pink-50 to-purple-100 py-12 px-6">
  <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-12 w-full max-w-md text-center">
    <div class="flex justify-center mb-6">
      <div class="bg-gradient-to-br from-pink-500 to-purple-500 p-3 rounded-full">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
      </div>
    </div>

    <h2 class="text-2xl font-bold text-gray-800 mb-2">Buat Akun Baru</h2>
    <p class="text-gray-500 mb-6">Daftar untuk memulai pendaftaran siswa</p>

    {{-- ✅ FORM PENDAFTARAN --}}
    <form action="{{ route('register.submit') }}" method="POST">
      @csrf

      {{-- Nama Lengkap --}}
      <div class="text-left mb-4">
        <label class="block text-gray-700 mb-1">Nama Lengkap</label>
        <input 
          type="text" 
          name="name" 
          placeholder="Nama Lengkap"
          value="{{ old('name') }}"
          required
          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-400 focus:outline-none">
      </div>

      {{-- Email --}}
      <div class="text-left mb-4">
        <label class="block text-gray-700 mb-1">Email</label>
        <input 
          type="email" 
          name="email" 
          placeholder="email@example.com"
          value="{{ old('email') }}"
          required
          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-400 focus:outline-none">
      </div>

      {{-- Password --}}
      <div class="text-left mb-4">
        <label class="block text-gray-700 mb-1">Password</label>
        <input 
          type="password" 
          name="password" 
          placeholder="••••••••" 
          required
          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-400 focus:outline-none">
      </div>

      {{-- Konfirmasi Password --}}
      <div class="text-left mb-6">
        <label class="block text-gray-700 mb-1">Konfirmasi Password</label>
        <input 
          type="password" 
          name="password_confirmation" 
          placeholder="••••••••" 
          required
          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-400 focus:outline-none">
      </div>

      {{-- Tombol Daftar --}}
      <button 
        type="submit"
        class="w-full bg-[#FF2FA1] text-white py-2 rounded-lg font-semibold hover:bg-[#e62991] transition duration-200">
        Daftar
      </button>
    </form>

    {{-- Link ke Login --}}
    <p class="text-gray-600 text-sm mt-6">
      Sudah punya akun?
      <a href="{{ url('/login') }}" class="text-pink-500 font-medium hover:underline">Login di sini</a>
    </p>

    {{-- ✅ Pesan Error --}}
    @if ($errors->any())
      <div class="mt-4 text-left bg-red-50 border border-red-300 text-red-600 rounded-lg p-3">
        <ul class="list-disc list-inside text-sm">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
  </div>
</section>
@endsection