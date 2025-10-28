@extends('layouts.app')

@section('title', 'Login')

@section('content')
@include('components.navbar')
<section class="min-h-screen flex items-center justify-center bg-gradient-to-br from-pink-50 to-purple-100 py-12 px-6">
  <!-- CARD LOGIN -->
  <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-12 w-full max-w-md text-center">
    
    <!-- Icon Bulat -->
    <div class="flex justify-center mb-6">
      <div class="bg-gradient-to-br from-pink-500 to-purple-500 p-3 rounded-full">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
      </div>
    </div>

    <!-- Judul -->
    <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">Selamat Datang Kembali</h2>
    <p class="text-gray-500 mb-6">Login untuk mengakses akun Anda</p>

    <!-- Form -->
    <form method="POST" action="{{ route('login') }}" class="space-y-5">
  @csrf
      <!-- Email -->
      <!-- Email -->
<div class="text-left">
  <label class="block text-gray-700 font-medium mb-1">Email</label>
  <div class="relative">
    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
        <path d="M2.94 6.34L10 10.88l7.06-4.54A2 2 0 0016.82 4H3.18a2 2 0 00-.24 2.34z"/>
        <path d="M18 8.12l-8 5.14-8-5.14V14a2 2 0 002 2h12a2 2 0 002-2V8.12z"/>
      </svg>
    </span>
    <input type="email" name="email" placeholder="email@example.com" 
           class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-400 focus:outline-none" required>
  </div>
</div>

<!-- Password -->
<div class="text-left">
  <label class="block text-gray-700 font-medium mb-1">Password</label>
  <div class="relative">
    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
        <path d="M5 8V6a5 5 0 0110 0v2h1a1 1 0 011 1v8a1 1 0 01-1 1H4a1 1 0 01-1-1V9a1 1 0 011-1h1zm2 0h6V6a3 3 0 00-6 0v2z"/>
      </svg>
    </span>
    <input type="password" name="password" placeholder="••••••••"
           class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-400 focus:outline-none" required>
  </div>
</div>
      <!-- Tombol Login -->
      <button type="submit"
              class="w-full bg-[#FF2FA1] text-white py-3 rounded-lg font-semibold hover:bg-[#e62991] transition">
        Login
      </button>
    </form>

    <!-- Link ke Register -->
    <p class="text-gray-600 text-sm mt-6">
      Belum punya akun?
      <a href="{{ route('register.form') }}" class="text-pink-500 font-semibold hover:underline">Daftar di sini</a>
    </p>

    <!-- Demo Account -->
  </div>
</section>
@endsection