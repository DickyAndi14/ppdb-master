@extends('layouts.app')

@section('title', 'TK Ceria Belajar')

@section('content')

    <!-- Header/Navigation -->
    <header class="sticky top-0 z-50 bg-white/90 backdrop-blur border-b border-gray-200 shadow-sm">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <div class="flex items-center">
                    <h1 class="text-xl font-bold text-gray-900">TK Ceria Belajar</h1>
                </div>

                <!-- Navigation Menu -->
                    <!-- Navigation Menu -->
<nav class="hidden md:flex items-center space-x-6">
    <a href="#" class="text-gray-700 hover:text-blue-600 font-medium text-sm">Beranda</a>
    <a href="#profil" class="text-gray-700 hover:text-blue-600 font-medium text-sm">Profil</a>
    <a href="#program" class="text-gray-700 hover:text-blue-600 font-medium text-sm">Program</a>
    <a href="#galeri" class="text-gray-700 hover:text-blue-600 font-medium text-sm">Galeri</a>
    <a href="#" class="text-blue-600 font-medium text-sm">PPDB</a>
    <a href="#kontak" class="text-gray-700 hover:text-blue-600 font-medium text-sm">Kontak</a>

    {{-- 🔒 Cek apakah user sudah login --}}
    @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-gray-700 hover:text-red-600 font-medium text-sm">
                Logout
            </button>
        </form>
    @else
        <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 font-medium text-sm">Login</a>
        <a href="{{ route('register.form') }}"
           class="bg-[#FF2FA1] text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-[#e62991] transition duration-200">
           Daftar
        </a>
    @endauth
</nav>

                <!-- Mobile Menu Button -->
                <button class="md:hidden text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="py-16 bg-gradient-to-br from-[#FFFBEA] via-[#F3E8FF] to-[#FFFFFF]">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center py-2">
                <!-- Left Content -->
                <div>
                    <div class="flex items-center">

                        <h2 class="text-3xl md:text-xl text-gray-900 mb-6 bg-white rounded-full p-3 shadow-lg w-fit">
                            ✨ PPDB Tahun Ajaran 2025/2026 <span class="text-blue-600">Dibuka!</span>
                        </h2>
                    </div>
                    <div class="mb-8">
                        <h3
                            class="text-4xl md:text-7xl leading-tight mb-4 bg-gradient-to-r from-pink-500 to-blue-500 bg-clip-text text-transparent">
                            Taman Belajar<br>
                            Penuh Ceria<br>
                            untuk Buah Hati<br>
                            Anda
                        </h3>

                        <p class="text-gray-600 text-lg leading-relaxed mb-8">
                            TK Ceria Belajar adalah tempat di mana anak-anak berkembang dengan gembira melalui pembelajaran
                            yang kreatif, inovatif, dan penuh kasih sayang.
                        </p>
                    </div>

                    <!-- Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4">
                        <button
                            class="bg-gradient-to-r from-pink-500 to-purple-500 text-white px-8 py-3 rounded-lg font-medium hover:bg-blue-700 transition duration-200">
                            Daftar Sekarang
                        </button>
                        <button
                            class="border-4 bg-white border-gray-300 text-black px-8 py-3 rounded-lg font-medium hover:bg-blue-500 transition duration-200">
                            Pelajari Lebih Lanjut
                        </button>
                    </div>

                    <!-- Stats Section -->
                    <div class="bg-gray-50 rounded-2xl p-8 mt-8 max-w-2xl">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <!-- Alumni -->
                            <div class="text-center md:text-left">
                                <div class="text-5xl font-bold text-blue-600 mb-2">500+</div>
                                <div class="text-gray-600 text-lg">Alumni</div>
                            </div>
                            <!-- Tahun Pengalaman -->
                            <div class="text-center md:text-left">
                                <div class="text-5xl font-bold text-blue-600 mb-2">15</div>
                                <div class="text-gray-600 text-lg">Tahun Pengalaman</div>
                            </div>
                            <!-- Akreditasi -->
                            <div class="text-center md:text-left">
                                <div class="text-5xl font-bold text-blue-600 mb-2">A</div>
                                <div class="text-gray-600 text-lg">Akreditasi</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Content (Hero Image) -->
                <div class="hidden lg:block aspect-square">
                    <img src="https://plus.unsplash.com/premium_photo-1684173662116-0e66b542774b?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1171 "
                        alt="Anak-anak belajar di TK Ceria Belajar" class="rounded-2xl shadow-lg w-full h-full">
                </div>
            </div>
        </div>
    </section>

    {{-- Visi & Misi Section  --}}
    <section id="visi-misi" class="py-16 bg-gradient-to-b from-[#F7FBEA] via-[#F2F6FF] to-transparent" data-aos="fade-up">
        <div class="container mx-auto px-6">
            <div class="text-center mb-10">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Visi & Misi Kami</h2>
                <p class="text-gray-600 mt-2">
                    Komitmen kami untuk menciptakan generasi cerdas, kreatif, dan berakhlak mulia
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Kartu Visi -->
                <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/40 p-6 md:p-8" data-aos="fade-up">
                    <div class="flex items-center gap-3 mb-6">
                        <span
                            class="inline-flex h-10 w-10 items-center justify-center rounded-xl
                       bg-gradient-to-br from-yellow-400 to-orange-500 text-white">
                            <!-- target/goal icon -->
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M11 17a1 1 0 11-2 0v-2.07a6.002 6.002 0 114.95-9.39l1.48-1.48a1 1 0 011.41 1.42l-1.48 1.48A6 6 0 0111 14.93V17z" />
                            </svg>
                        </span>
                        <h3 class="text-2xl font-semibold text-orange-600">Visi</h3>
                    </div>
                    <p class="text-gray-600 leading-relaxed">
                        Menjadi lembaga pendidikan anak usia dini terkemuka yang menghasilkan generasi cerdas,
                        kreatif, mandiri, dan berakhlak mulia, serta siap menghadapi tantangan masa depan
                        dengan pondasi karakter yang kuat.
                    </p>
                </div>

                <!-- Kartu Misi -->
                <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/40 p-6 md:p-8" data-aos="fade-up">
                    <div class="flex items-center gap-3 mb-6">
                        <span
                            class="inline-flex h-10 w-10 items-center justify-center rounded-xl
                       bg-gradient-to-br from-teal-400 to-blue-500 text-white">
                            <!-- bulb icon -->
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M11 3a6 6 0 00-4.98 9.09c.3.47.48 1.02.48 1.59V15a1 1 0 001 1h5a1 1 0 001-1v-1.32c0-.57.18-1.12.48-1.59A6 6 0 0011 3zM7 17h8a1 1 0 010 2H7a1 1 0 110-2z" />
                            </svg>
                        </span>
                        <h3 class="text-2xl font-semibold text-emerald-600">Misi</h3>
                    </div>
                    <ul class="space-y-3 text-gray-700">
                        <li class="flex gap-2">
                            <svg class="mt-1 h-5 w-5 text-emerald-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-7.5 7.5a1 1 0 01-1.414 0l-3-3a1 1 0 011.414-1.414L8.5 12.086l6.793-6.793a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            Menyelenggarakan pembelajaran yang kreatif, inovatif, dan menyenangkan
                        </li>
                        <li class="flex gap-2">
                            <svg class="mt-1 h-5 w-5 text-emerald-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-7.5 7.5a1 1 0 01-1.414 0l-3-3a1 1 0 011.414-1.414L8.5 12.086l6.793-6.793a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            Mengembangkan potensi anak secara optimal melalui kurikulum berbasis karakter
                        </li>
                        <li class="flex gap-2">
                            <svg class="mt-1 h-5 w-5 text-emerald-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-7.5 7.5a1 1 0 01-1.414 0l-3-3a1 1 0 011.414-1.414L8.5 12.086l6.793-6.793a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            Menciptakan lingkungan belajar yang aman, nyaman, dan kondusif
                        </li>
                        <li class="flex gap-2">
                            <svg class="mt-1 h-5 w-5 text-emerald-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-7.5 7.5a1 1 0 01-1.414 0l-3-3a1 1 0 011.414-1.414L8.5 12.086l6.793-6.793a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            Membangun kerjasama dengan orang tua dalam mendidik anak
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- Profil Sekolah Section --}}
    <section id="profil-sekolah" class="py-20 bg-gradient-to-b from-[#FFF9E9] via-[#F4ECFF] to-[#FFFFFF]">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Profil Sekolah</h2>
                <p class="text-gray-600 mt-2">Lebih dari 15 tahun mendidik dan membimbing generasi penerus bangsa</p>
            </div>

            <!-- Sejarah Kami -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center mb-16">
                <img src="https://images.unsplash.com/photo-1600880292089-90a7e086ee0c?auto=format&fit=crop&w=800&q=80"
                    alt="Kegiatan Belajar" class="rounded-2xl shadow-lg w-full h-64 object-cover">

                <div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-4">Sejarah Kami</h3>
                    <p class="text-gray-600 leading-relaxed">
                        TK Ceria Belajar didirikan pada tahun 2010 dengan visi menciptakan lingkungan pembelajaran yang
                        menyenangkan dan mendukung perkembangan optimal anak usia dini.
                    </p>
                    <p class="text-gray-600 mt-4 leading-relaxed">
                        Kami percaya bahwa setiap anak adalah individu yang unik dengan potensi luar biasa. Dengan
                        pendekatan pembelajaran yang holistik, kami membantu anak-anak mengembangkan kecerdasan moral,
                        sosial, emosional, dan intelektualnya.
                    </p>
                    <p class="text-gray-600 mt-4 leading-relaxed">
                        Dengan pengalaman lebih dari 15 tahun, kami telah meluluskan lebih dari 500 alumni yang melanjutkan
                        sekolah dasar dengan bekal pendidikan karakter yang kuat.
                    </p>
                </div>
            </div>

            <!-- Kurikulum Kami -->
            <div class="text-center mb-12">
                <h3 class="text-3xl font-semibold text-gray-900">Kurikulum Kami</h3>
                <p class="text-gray-600 mt-2">Pembelajaran terpadu untuk perkembangan optimal anak</p>
            </div>

            <!-- 3 Cards Kurikulum -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                <div
                    class="bg-white rounded-2xl shadow-lg shadow-gray-200/40 p-8 text-center transform transition-transform duration-500 ease-in-out hover:scale-105 hover:shadow-xl">
                    <div
                        class="bg-gradient-to-br from-green-400 to-emerald-500 text-white w-12 h-12 mx-auto rounded-xl flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v8m4-4H8" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">Kurikulum Merdeka</h4>
                    <p class="text-gray-600 text-sm">Mendorong kemandirian dengan fokus pada pengembangan karakter dan
                        kreativitas anak.</p>
                </div>

                <div
                    class="bg-white rounded-2xl shadow-lg shadow-gray-200/40 p-8 text-center 
      transform transition-transform duration-500 ease-in-out hover:scale-105 hover:shadow-xl">
                    <div
                        class="bg-gradient-to-br from-blue-400 to-indigo-500 text-white w-12 h-12 mx-auto rounded-xl flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.75 17L3 10.5m0 0L9.75 4M3 10.5h18" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">Pembelajaran Berbasis Bermain</h4>
                    <p class="text-gray-600 text-sm">Belajar sambil bermain untuk stimulasi otak anak dan pengembangan
                        motorik halus.</p>
                </div>

                <div
                    class="bg-white rounded-2xl shadow-lg shadow-gray-200/40 p-8 text-center 
            transform transition-transform duration-500 ease-in-out hover:scale-105 hover:shadow-xl">
                    <div
                        class="bg-gradient-to-br from-pink-400 to-purple-500 text-white w-12 h-12 mx-auto rounded-xl flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">Pendidikan Karakter</h4>
                    <p class="text-gray-600 text-sm">Membentuk anak yang mandiri, disiplin, dan berempati sejak dini.</p>
                </div>
            </div>

            <!-- Statistik Bawah -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                <div
                    class="bg-white rounded-2xl shadow-lg shadow-gray-200/40 p-8 text-center 
            transform transition-transform duration-500 ease-in-out hover:scale-105 hover:shadow-xl">
                    <div class="text-pink-500 text-4xl font-bold mb-1">A</div>
                    <p class="text-gray-700 font-medium">Terakreditasi</p>
                </div>
                <div
                    class="bg-white rounded-2xl shadow-lg shadow-gray-200/40 p-8 text-center 
            transform transition-transform duration-500 ease-in-out hover:scale-105 hover:shadow-xl">
                    <div class="text-blue-500 text-4xl font-bold mb-1">500+</div>
                    <p class="text-gray-700 font-medium">Alumni</p>
                </div>
                <div
                    class="bg-white rounded-2xl shadow-lg shadow-gray-200/40 p-8 text-center 
            transform transition-transform duration-500 ease-in-out hover:scale-105 hover:shadow-xl">
                    <div class="text-green-500 text-4xl font-bold mb-1">Guru</div>
                    <p class="text-gray-700 font-medium">Bersertifikat</p>
                </div>
                <div
                    class="bg-white rounded-2xl shadow-lg shadow-gray-200/40 p-8 text-center 
            transform transition-transform duration-500 ease-in-out hover:scale-105 hover:shadow-xl">
                    <div class="text-orange-500 text-4xl font-bold mb-1">15</div>
                    <p class="text-gray-700 font-medium">Tahun</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Program Pembelajaran --}}
    <section id="program" class="py-20 bg-gradient-to-b from-[#F3FBEF] via-[#EEF0FF] to-[#FFFFFF]">
        <div class="container mx-auto px-6">
            <!-- Judul -->
            <div class="text-center mb-10">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900">
                    🧠✨ Program Pembelajaran
                </h2>
                <p class="text-gray-600 mt-2">
                    Kurikulum yang dirancang khusus untuk mengoptimalkan tumbuh kembang anak
                    dengan cara yang menyenangkan
                </p>
            </div>

            <!-- Grid 4 Kartu Program -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                <!-- Literasi & Numerasi -->
                <div
                    class="bg-white rounded-2xl p-6 shadow-lg shadow-gray-200/50 ring-1 ring-gray-100
                  transform transition-transform duration-300 hover:scale-[1.03]">
                    <div
                        class="w-11 h-11 rounded-xl bg-gradient-to-br from-pink-400 to-rose-500
                    text-white flex items-center justify-center mb-4">
                        <!-- book icon -->
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M3 5a2 2 0 012-2h13a2 2 0 012 2v14a1 1 0 01-1.447.894L17 18.618l-1.553 1.276A1 1 0 0114 19V5H5a2 2 0 00-2 2V5z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-1">Literasi & Numerasi</h3>
                    <p class="text-gray-600 text-sm">
                        Pengenalan huruf, angka, dan membaca dasar dengan metode menyenangkan.
                    </p>
                </div>

                <!-- Seni & Kreativitas -->
                <div
                    class="bg-white rounded-2xl p-6 shadow-lg shadow-gray-200/50 ring-1 ring-gray-100
                  transform transition-transform duration-300 hover:scale-[1.03]">
                    <div
                        class="w-11 h-11 rounded-xl bg-gradient-to-br from-fuchsia-500 to-purple-500
                    text-white flex items-center justify-center mb-4">
                        <!-- palette icon -->
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M12 3a9 9 0 00-9 9 5 5 0 005 5h1a2 2 0 110 4 9 9 0 102-18zM7 10a1 1 0 110-2 1 1 0 010 2zm4-1a1 1 0 110-2 1 1 0 010 2zm3 3a1 1 0 110-2 1 1 0 010 2z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-1">Seni & Kreativitas</h3>
                    <p class="text-gray-600 text-sm">
                        Mengembangkan kreativitas melalui menggambar, mewarnai, musik, dan kegiatan tangan.
                    </p>
                </div>

                <!-- Musik & Gerak -->
                <div
                    class="bg-white rounded-2xl p-6 shadow-lg shadow-gray-200/50 ring-1 ring-gray-100
                  transform transition-transform duration-300 hover:scale-[1.03]">
                    <div
                        class="w-11 h-11 rounded-xl bg-gradient-to-br from-sky-500 to-blue-600
                    text-white flex items-center justify-center mb-4">
                        <!-- music icon -->
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M9 19a3 3 0 100-6 3 3 0 000 6zm10-12V5l-8 2v9.17A3.001 3.001 0 0011 19a3 3 0 103-3V9l5-2z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-1">Musik & Gerak</h3>
                    <p class="text-gray-600 text-sm">
                        Belajar ritme, lagu, dan aktivitas motorik yang menyenangkan.
                    </p>
                </div>

                <!-- Pengenalan Bahasa Inggris -->
                <div
                    class="bg-white rounded-2xl p-6 shadow-lg shadow-gray-200/50 ring-1 ring-gray-100
                  transform transition-transform duration-300 hover:scale-[1.03]">
                    <div
                        class="w-11 h-11 rounded-xl bg-gradient-to-br from-amber-400 to-orange-500
                    text-white flex items-center justify-center mb-4">
                        <!-- chat bubble icon -->
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M4 5h16a2 2 0 012 2v6a2 2 0 01-2 2H8l-4 4V7a2 2 0 012-2z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-1">Pengenalan Bahasa Inggris</h3>
                    <p class="text-gray-600 text-sm">
                        Kosakata dasar & percakapan ringan dengan metode interaktif.
                    </p>
                </div>
            </div>

            <!-- Kartu Besar: Keunggulan Program Kami -->
            <div class="bg-white rounded-3xl p-8 md:p-10 shadow-2xl shadow-indigo-100/40 ring-1 ring-gray-100">
                <h3 class="text-xl md:text-3xl font-semibold text-gray-900 text-center">
                    ✨ Keunggulan Program Kami
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
                    <!-- Feature 1 -->
                    <div class="flex items-start gap-3">
                        <div
                            class="w-9 h-9 rounded-lg bg-gradient-to-br from-rose-400 to-pink-500
                      text-white flex items-center justify-center shrink-0">
                            <!-- gamepad / play icon -->
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M8 5v14l11-7L8 5z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900">Pembelajaran Berbasis Bermain</p>
                            <p class="text-gray-600 text-sm">Metode belajar yang menyenangkan dengan aktivitas eksploratif.
                            </p>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="flex items-start gap-3">
                        <div
                            class="w-9 h-9 rounded-lg bg-gradient-to-br from-sky-400 to-blue-600
                      text-white flex items-center justify-center shrink-0">
                            <!-- users icon -->
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M16 11c1.66 0 3-1.57 3-3.5S17.66 4 16 4s-3 1.57-3 3.5S14.34 11 16 11zM8 11c1.66 0 3-1.57 3-3.5S9.66 4 8 4 5 5.57 5 7.5 6.34 11 8 11zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900">Kelas Kecil</p>
                            <p class="text-gray-600 text-sm">Maksimal 15 siswa per kelas untuk perhatian guru lebih
                                personal.</p>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="flex items-start gap-3">
                        <div
                            class="w-9 h-9 rounded-lg bg-gradient-to-br from-emerald-400 to-teal-500
                      text-white flex items-center justify-center shrink-0">
                            <!-- chart/analytics icon -->
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M4 19h16v2H4v-2zm2-8h2v6H6v-6zm5-4h2v10h-2V7zm5 6h2v4h-2v-4z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900">Laporan Perkembangan</p>
                            <p class="text-gray-600 text-sm">Orang tua mendapat laporan rutin terkait perkembangan anak.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fasilitas Lengkap & Modern Section -->
    <section class="py-12 md:py-20 bg-gradient-to-b from-[#fdf6b869] to-[#fdf6b869]">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="text-center mb-10 md:mb-14">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-semibold mb-3 text-gray-900">Fasilitas Lengkap & Modern
                </h2>
                <p class="text-base sm:text-lg text-gray-600 max-w-2xl mx-auto px-4">
                    Lingkungan belajar yang aman, nyaman, dan mendukung perkembangan optimal anak
                </p>
            </div>

            <!-- Fasilitas List -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8 mb-12 md:mb-16">
                <!-- Card 1 -->
                <div
                    class="bg-white rounded-2xl p-4 sm:p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div
                        class="aspect-square border-4 sm:border-6 md:border-8 border-white rounded-2xl md:rounded-3xl mb-4 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1747110604852-8f3edc2451ea?ixlib=rb-4.1.0&auto=format&fit=crop&w=500&q=80"
                            alt="Ruang Kelas Nyaman" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-lg sm:text-xl font-bold text-gray-900 mb-2">Ruang Kelas Nyaman</h3>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed">Ruang kelas ber-AC dengan furniture ramah
                        anak</p>
                </div>

                <!-- Card 2 -->
                <div
                    class="bg-white rounded-2xl p-4 sm:p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div
                        class="aspect-square border-4 sm:border-6 md:border-8 border-white rounded-2xl md:rounded-3xl mb-4 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1541692641319-981cc79ee10a?auto=format&fit=crop&w=500&q=80"
                            alt="Area Bermain Outdoor" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-lg sm:text-xl font-bold text-gray-900 mb-2">Area Bermain Outdoor</h3>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed">Playground aman dengan permainan edukatif
                    </p>
                </div>

                <!-- Card 3 -->
                <div
                    class="bg-white rounded-2xl p-4 sm:p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div
                        class="aspect-square border-4 sm:border-6 md:border-8 border-white rounded-2xl md:rounded-3xl mb-4 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1494314671902-399b18174975?auto=format&fit=crop&w=500&q=80"
                            alt="Perpustakaan" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-lg sm:text-xl font-bold text-gray-900 mb-2">Perpustakaan</h3>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed">Koleksi buku cerita dan pembelajaran yang
                        lengkap</p>
                </div>

                <!-- Card 4 -->
                <div
                    class="bg-white rounded-2xl p-4 sm:p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div
                        class="aspect-square border-4 sm:border-6 md:border-8 border-white rounded-2xl md:rounded-3xl mb-4 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1519452635265-7b1fbfd1e4e0?auto=format&fit=crop&w=500&q=80"
                            alt="Ruang Kreativitas" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-lg sm:text-xl font-bold text-gray-900 mb-2">Ruang Kreativitas</h3>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed">Ruang khusus untuk aktivitas seni dan
                        kerajinan</p>
                </div>
            </div>

            <!-- Keamanan Section -->
            <div
                class="bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 rounded-xl md:rounded-2xl p-6 sm:p-8 md:p-12 lg:p-20 shadow-lg">
                <div class="text-center">
                    <h3
                        class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-semibold text-white mb-4 md:mb-6 leading-tight">
                        Keamanan & Kenyamanan Anak adalah Prioritas Kami
                    </h3>
                    <p class="text-white text-sm sm:text-base md:text-lg max-w-4xl mx-auto leading-relaxed">
                        Semua fasilitas dirancang dengan standar keamanan tinggi, CCTV 24 jam, dan pengawasan guru yang
                        profesional. Kami berkomitmen memberikan lingkungan belajar yang aman dan kondusif untuk tumbuh
                        kembang optimal anak.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Galeri Kegiatan Section -->
    <section id="galeri" class="py-12 md:py-20 bg-gradient-to-b from-[#FFF9F0] to-[#F0F9FF]">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="text-center mb-8 md:mb-12">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-semibold text-gray-900 mb-3">Galeri Kegiatan</h2>
                <p class="text-base sm:text-lg text-gray-600 max-w-2xl mx-auto">
                    Dokumentasi momen berharga anak-anak di TK Ceria Belajar
                </p>
            </div>

            <div class="grid grid-cols-1 xs:grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4 sm:gap-6">
                <!-- Image 1 -->
                <div
                    class="group rounded-xl md:rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1541692641319-981cc79ee10a?auto=format&fit=crop&w=500&q=80"
                            alt="Kegiatan Belajar"
                            class="w-full h-48 sm:h-56 md:h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div
                            class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                </div>

                <!-- Image 2 -->
                <div
                    class="group rounded-xl md:rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1519452635265-7b1fbfd1e4e0?auto=format&fit=crop&w=500&q=80"
                            alt="Kegiatan Bermain"
                            class="w-full h-48 sm:h-56 md:h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div
                            class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                </div>

                <!-- Image 3 -->
                <div
                    class="group rounded-xl md:rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1494314671902-399b18174975?auto=format&fit=crop&w=500&q=80"
                            alt="Kegiatan Seni"
                            class="w-full h-48 sm:h-56 md:h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div
                            class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                </div>

                <!-- Image 4 -->
                <div
                    class="group rounded-xl md:rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1541692641319-981cc79ee10a?auto=format&fit=crop&w=500&q=80"
                            alt="Kegiatan Belajar"
                            class="w-full h-48 sm:h-56 md:h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div
                            class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                </div>

                <!-- Image 5 -->
                <div
                    class="group rounded-xl md:rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1519452635265-7b1fbfd1e4e0?auto=format&fit=crop&w=500&q=80"
                            alt="Kegiatan Bermain"
                            class="w-full h-48 sm:h-56 md:h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div
                            class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                </div>

                <!-- Image 6 -->
                <div
                    class="group rounded-xl md:rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1494314671902-399b18174975?auto=format&fit=crop&w=500&q=80"
                            alt="Kegiatan Seni"
                            class="w-full h-48 sm:h-56 md:h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div
                            class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimoni Orang Tua Section -->
    <section class="py-20 bg-gradient-to-b from-[#F7FBFF] to-[#FFF7F7]">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="section-title text-4xl font-semibold">Testimoni Orang Tua</h2>
                <p class="section-subtitle mt-3">Dengarkan pengalaman orang tua murid yang telah mempercayakan pendidikan
                    anak
                    mereka kepada kami</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Testimoni 1 -->
                <div class="bg-white rounded-2xl p-6 shadow-lg shadow-gray-200/40 relative">
                    <!-- Simbol kutip di pojok kanan atas -->
                    <div class="absolute -top-3 right-6 text-7xl text-gray-200 font-serif rotate-180">❝</div>
                    <div class="flex flex-row items-center mb-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-user text-blue-600"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Ibu Sarah Wijaya</h3>
                            <p class="text-gray-600 text-sm">Zahra (TK B)</p>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">
                        "Anak saya sangat senang belajar di TK Ceria Belajar. Guru-gurunya sabar dan metode pembelajaran
                        sangat kreatif. Zahra sekarang lebih percaya diri dan mandiri!"
                    </p>
                </div>

                <!-- Testimoni 2 -->
                <div class="bg-white rounded-2xl p-6 shadow-lg shadow-gray-200/40 relative">
                    <!-- Simbol kutip di pojok kanan atas -->
                    <div class="absolute -top-3 right-6 text-7xl text-gray-200 font-serif rotate-180">❝</div>
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-pink-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-user text-pink-600"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Ibu Diana Putri</h3>
                            <p class="text-gray-600 text-sm">Keisha (TK B)</p>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">
                        "TK terbaik! Keisha yang tadinya pemalu sekarang jadi aktif dan suka bercerita tentang kegiatan di
                        sekolah. Terima kasih TK Ceria Belajar!"
                    </p>
                </div>

                <!-- Testimoni 3 -->
                <div class="bg-white rounded-2xl p-6 shadow-lg shadow-gray-200/40 relative">
                    <!-- Simbol kutip di pojok kanan atas -->
                    <div class="absolute -top-3 right-6 text-7xl text-gray-200 font-serif rotate-180">❝</div>
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-user text-green-600"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Bapak Ahmad Rizki</h3>
                            <p class="text-gray-600 text-sm">Farhan (TK A)</p>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">
                        "Fasilitas lengkap dan lingkungan yang aman membuat saya tenang menitipkan Farhan di sini. Program
                        pembelajarannya juga sangat baik untuk perkembangan anak."
                    </p>
                </div>

                <!-- Testimoni 4 -->
                <div class="bg-white rounded-2xl p-6 shadow-lg shadow-gray-200/40 relative">
                    <!-- Simbol kutip di pojok kanan atas -->
                    <div class="absolute -top-3 right-6 text-7xl text-gray-200 font-serif rotate-180">❝</div>
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-user text-purple-600"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Bapak Rudi Hartono</h3>
                            <p class="text-gray-600 text-sm">Raffi (TK A)</p>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">
                        "Komunikasi dengan pihak sekolah sangat baik. Kami selalu mendapat update tentang perkembangan
                        Raffi. Sangat profesional dan peduli dengan anak-anak."
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Hubungi Kami Section -->
    <section id="kontak" class="py-20 bg-gradient-to-b from-[#F0F7FF] to-[#FFF0F5]">
        <div class="container mx-auto px-6">
            <div class="text-center pb-16">
                <h2 class="text-4xl font-semibold mb-3">Hubungi Kami</h2>
                <p class="text-base text-gray-700">Ada pertanyaan? Jangan ragu untuk menghubungi kami. Tim kami siap
                    membantu
                    Anda!</p>
            </div>

            <div class="grid grid-rows-1 md:grid-rows-2 gap-5 mx-auto">
                <!-- Contact Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Alamat -->
                    <div
                        class="bg-white rounded-2xl p-6 shadow-lg shadow-gray-200/40 border border-gray-100 hover:shadow-xl hover:border-blue-200 transition-all duration-300">
                        <div class="text-center">
                            <div class="flex justify-center mb-4">
                                <div
                                    class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center group-hover:bg-blue-200 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32"
                                        height="32" class="text-blue-600" fill="currentColor">
                                        <path
                                            d="M12 20.8995L16.9497 15.9497C19.6834 13.2161 19.6834 8.78392 16.9497 6.05025C14.2161 3.31658 9.78392 3.31658 7.05025 6.05025C4.31658 8.78392 4.31658 13.2161 7.05025 15.9497L12 20.8995ZM12 23.7279L5.63604 17.364C2.12132 13.8492 2.12132 8.15076 5.63604 4.63604C9.15076 1.12132 14.8492 1.12132 18.364 4.63604C21.8787 8.15076 21.8787 13.8492 18.364 17.364L12 23.7279ZM12 13C13.1046 13 14 12.1046 14 11C14 9.89543 13.1046 9 12 9C10.8954 9 10 9.89543 10 11C10 12.1046 10.8954 13 12 13Z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <h3 class="font-bold text-gray-900 text-lg mb-3">Alamat</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Jl. Pendidikan Raya No. 123, Kelurahan Ceria, Kecamatan Belajar, Jakarta Selatan 12345
                            </p>
                        </div>
                    </div>

                    <!-- Telepon -->
                    <div
                        class="bg-white rounded-2xl p-6 shadow-lg shadow-gray-200/40 border border-gray-100 hover:shadow-xl hover:border-green-200 transition-all duration-300">
                        <div class="text-center">
                            <div class="flex justify-center mb-4">
                                <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32"
                                        height="32" class="text-green-600" fill="currentColor">
                                        <path
                                            d="M9.36556 10.6821C10.302 12.3288 11.6712 13.698 13.3179 14.6344L14.2024 13.3961C14.4965 12.9845 15.0516 12.8573 15.4956 13.0998C16.9024 13.8683 18.4571 14.3353 20.0789 14.4637C20.599 14.5049 21 14.9389 21 15.4606V19.9234C21 20.4361 20.6122 20.8657 20.1022 20.9181C19.5723 20.9726 19.0377 21 18.5 21C9.93959 21 3 14.0604 3 5.5C3 4.96227 3.02742 4.42771 3.08189 3.89776C3.1343 3.38775 3.56394 3 4.07665 3H8.53942C9.0611 3 9.49513 3.40104 9.5363 3.92109C9.66467 5.54288 10.1317 7.09764 10.9002 8.50444C11.1427 8.9484 11.0155 9.50354 10.6039 9.79757L9.36556 10.6821Z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <h3 class="font-bold text-gray-900 text-lg mb-3">Telepon</h3>
                            <p class="text-gray-600 leading-relaxed">
                                (021) 1234-5678<br>0812-3456-7890
                            </p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div
                        class="bg-white rounded-2xl p-6 shadow-lg shadow-gray-200/40 border border-gray-100 hover:shadow-xl hover:border-purple-200 transition-all duration-300">
                        <div class="text-center">
                            <div class="flex justify-center mb-4">
                                <div class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32"
                                        height="32" class="text-purple-600" fill="currentColor">
                                        <path
                                            d="M3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3ZM20 7.23792L12.0718 14.338L4 7.21594V19H20V7.23792ZM4.51146 5L12.0619 11.662L19.501 5H4.51146Z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <h3 class="font-bold text-gray-900 text-lg mb-3">Email</h3>
                            <p class="text-gray-600 leading-relaxed">
                                info@tkcerabelajar.sch.id
                            </p>
                        </div>
                    </div>

                    <!-- Jam Operasional -->
                    <div
                        class="bg-white rounded-2xl p-6 shadow-lg shadow-gray-200/40 border border-gray-100 hover:shadow-xl hover:border-orange-200 transition-all duration-300">
                        <div class="text-center">
                            <div class="flex justify-center mb-4">
                                <div class="w-16 h-16 bg-orange-100 rounded-2xl flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32"
                                        height="32" class="text-orange-600" fill="currentColor">
                                        <path
                                            d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM13 12H17V14H11V7H13V12Z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <h3 class="font-bold text-gray-900 text-lg mb-3">Jam Operasional</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Senin - Jumat: 07.00 - 16.00 WIB<br>
                                Sabtu: 07.00 - 12.00 WIB
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                {{-- <div class="bg-white rounded-2xl p-8 shadow-lg shadow-gray-200/40">
                    <h3 class="text-xl font-semibold text-gray-900 mb-6">Kirim Pesan</h3>
                    <form class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama
                                Lengkap</label>
                            <input type="text" id="name"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="email"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Nomor
                                Telepon</label>
                            <input type="tel" id="phone"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Pesan</label>
                            <textarea id="message" rows="4"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-blue-600 text-white py-3 rounded-lg font-medium hover:bg-blue-700 transition duration-200">
                            Kirim Pesan
                        </button>
                    </form>
                </div> --}}
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gradient-to-br from-purple-900 via-red-900 to-purple-900 text-white py-12"style="background: linear-gradient(45deg, #256eb, #dc2626, #2563eb);">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- About -->
                <div>
                    <h3 class="text-xl font-bold mb-4">TK Ceria Belajar</h3>
                    <p class="text-gray-300 mb-4">
                        Mendidik generasi cerdas dan berakhlak mulia sejak usia dini. Berdiri sejak 2010.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-white">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>

                <!-- Kontak -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Kontak Kami</h3>
                    <div class="space-y-4 text-gray-300">
                        <!--alamat-->
                        <div class="flex items-start space-x-3">
                            <div class="w-6 h-6 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16"
                                    height="16" fill="currentColor">
                                    <path
                                        d="M12 20.8995L16.9497 15.9497C19.6834 13.2161 19.6834 8.78392 16.9497 6.05025C14.2161 3.31658 9.78392 3.31658 7.05025 6.05025C4.31658 8.78392 4.31658 13.2161 7.05025 15.9497L12 20.8995ZM12 23.7279L5.63604 17.364C2.12132 13.8492 2.12132 8.15076 5.63604 4.63604C9.15076 1.12132 14.8492 1.12132 18.364 4.63604C21.8787 8.15076 21.8787 13.8492 18.364 17.364L12 23.7279ZM12 13C13.1046 13 14 12.1046 14 11C14 9.89543 13.1046 9 12 9C10.8954 9 10 9.89543 10 11C10 12.1046 10.8954 13 12 13ZM12 15C9.79086 15 8 13.2091 8 11C8 8.79086 9.79086 7 12 7C14.2091 7 16 8.79086 16 11C16 13.2091 14.2091 15 12 15Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <p>Jl. Pendidikan Raya No. 123<br>Jakarta Selatan, 12345</p>
                            </div>
                        </div>

                        <!-- Telepon -->
                        <div class="flex items-start space-x-3">
                            <div class="w-6 h-6 flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16"
                                    height="16" fill="currentColor">
                                    <path
                                        d="M9.36556 10.6821C10.302 12.3288 11.6712 13.698 13.3179 14.6344L14.2024 13.3961C14.4965 12.9845 15.0516 12.8573 15.4956 13.0998C16.9024 13.8683 18.4571 14.3353 20.0789 14.4637C20.599 14.5049 21 14.9389 21 15.4606V19.9234C21 20.4361 20.6122 20.8657 20.1022 20.9181C19.5723 20.9726 19.0377 21 18.5 21C9.93959 21 3 14.0604 3 5.5C3 4.96227 3.02742 4.42771 3.08189 3.89776C3.1343 3.38775 3.56394 3 4.07665 3H8.53942C9.0611 3 9.49513 3.40104 9.5363 3.92109C9.66467 5.54288 10.1317 7.09764 10.9002 8.50444C11.1427 8.9484 11.0155 9.50354 10.6039 9.79757L9.36556 10.6821ZM6.84425 10.0252L8.7442 8.66809C8.20547 7.50514 7.83628 6.27183 7.64727 5H5.00907C5.00303 5.16632 5 5.333 5 5.5C5 12.9558 11.0442 19 18.5 19C18.667 19 18.8337 18.997 19 18.9909V16.3527C17.7282 16.1637 16.4949 15.7945 15.3319 15.2558L13.9748 17.1558C13.4258 16.9425 12.8956 16.6915 12.3874 16.4061L12.3293 16.373C10.3697 15.2587 8.74134 13.6303 7.627 11.6707L7.59394 11.6126C7.30849 11.1044 7.05754 10.5742 6.84425 10.0252Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <p>(021) 1234-5678</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3">
                            <div class="w-6 h-6 flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16"
                                    height="16" fill="currentColor">
                                    <path
                                        d="M3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3ZM20 7.23792L12.0718 14.338L4 7.21594V19H20V7.23792ZM4.51146 5L12.0619 11.662L19.501 5H4.51146Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <p>info@tkcerabelajar.sch.id</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Jam Operasional -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Jam Operasional</h3>
                    <div class="space-y-2 text-gray-300">
                        <p>Senin - Jumat<br><span class="text-yellow-300">07:30 - 16:00 WIB</span></p>
                        <p>Sabtu<br><span class="text-yellow-300">08:00 - 12:00 WIB</span></p>
                        <p>Minggu: Libur</p>
                    </div>
                </div>

                <!-- Media Sosial -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Media Sosial</h3>
                    <p class="text-gray-300 mb-4">Ikuti kami untuk update kegiatan</p>
                    <div class="flex space-x-4">
                        <!-- Facebook -->
                        <a href="#"
                            class="w-12 h-12 bg-[#1877F2] rounded-xl flex items-center justify-center shadow-md hover:shadow-lg hover:scale-105 transition-all duration-300 group">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                fill="currentColor">
                                <path
                                    d="M12.001 2C6.47813 2 2.00098 6.47715 2.00098 12C2.00098 16.9913 5.65783 21.1283 10.4385 21.8785V14.8906H7.89941V12H10.4385V9.79688C10.4385 7.29063 11.9314 5.90625 14.2156 5.90625C15.3097 5.90625 16.4541 6.10156 16.4541 6.10156V8.5625H15.1931C13.9509 8.5625 13.5635 9.33334 13.5635 10.1242V12H16.3369L15.8936 14.8906H13.5635V21.8785C18.3441 21.1283 22.001 16.9913 22.001 12C22.001 6.47715 17.5238 2 12.001 2Z">
                                </path>
                            </svg>
                        </a>
                        <a href="#"
                            class="w-12 h-12 bg-gradient-to-br from-[#833AB4] via-[#C13584] to-[#E1306C] rounded-xl flex items-center justify-center shadow-md hover:shadow-lg hover:scale-105 transition-all duration-300 group">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                fill="currentColor">
                                <path
                                    d="M12.001 9C10.3436 9 9.00098 10.3431 9.00098 12C9.00098 13.6573 10.3441 15 12.001 15C13.6583 15 15.001 13.6569 15.001 12C15.001 10.3427 13.6579 9 12.001 9ZM12.001 7C14.7614 7 17.001 9.2371 17.001 12C17.001 14.7605 14.7639 17 12.001 17C9.24051 17 7.00098 14.7629 7.00098 12C7.00098 9.23953 9.23808 7 12.001 7ZM18.501 6.74915C18.501 7.43926 17.9402 7.99917 17.251 7.99917C16.5609 7.99917 16.001 7.4384 16.001 6.74915C16.001 6.0599 16.5617 5.5 17.251 5.5C17.9393 5.49913 18.501 6.0599 18.501 6.74915ZM12.001 4C9.5265 4 9.12318 4.00655 7.97227 4.0578C7.18815 4.09461 6.66253 4.20007 6.17416 4.38967C5.74016 4.55799 5.42709 4.75898 5.09352 5.09255C4.75867 5.4274 4.55804 5.73963 4.3904 6.17383C4.20036 6.66332 4.09493 7.18811 4.05878 7.97115C4.00703 9.0752 4.00098 9.46105 4.00098 12C4.00098 14.4745 4.00753 14.8778 4.05877 16.0286C4.0956 16.8124 4.2012 17.3388 4.39034 17.826C4.5591 18.2606 4.7605 18.5744 5.09246 18.9064C5.42863 19.2421 5.74179 19.4434 6.17187 19.6094C6.66619 19.8005 7.19148 19.9061 7.97212 19.9422C9.07618 19.9939 9.46203 20 12.001 20C14.4755 20 14.8788 19.9934 16.0296 19.9422C16.8117 19.9055 17.3385 19.7996 17.827 19.6106C18.2604 19.4423 18.5752 19.2402 18.9074 18.9085C19.2436 18.5718 19.4445 18.2594 19.6107 17.8283C19.8013 17.3358 19.9071 16.8098 19.9432 16.0289C19.9949 14.9248 20.001 14.5389 20.001 12C20.001 9.52552 19.9944 9.12221 19.9432 7.97137C19.9064 7.18906 19.8005 6.66149 19.6113 6.17318C19.4434 5.74038 19.2417 5.42635 18.9084 5.09255C18.573 4.75715 18.2616 4.55693 17.8271 4.38942C17.338 4.19954 16.8124 4.09396 16.0298 4.05781C14.9258 4.00605 14.5399 4 12.001 4ZM12.001 2C14.7176 2 15.0568 2.01 16.1235 2.06C17.1876 2.10917 17.9135 2.2775 18.551 2.525C19.2101 2.77917 19.7668 3.1225 20.3226 3.67833C20.8776 4.23417 21.221 4.7925 21.476 5.45C21.7226 6.08667 21.891 6.81333 21.941 7.8775C21.9885 8.94417 22.001 9.28333 22.001 12C22.001 14.7167 21.991 15.0558 21.941 16.1225C21.8918 17.1867 21.7226 17.9125 21.476 18.55C21.2218 19.2092 20.8776 19.7658 20.3226 20.3217C19.7668 20.8767 19.2076 21.22 18.551 21.475C17.9135 21.7217 17.1876 21.89 16.1235 21.94C15.0568 21.9875 14.7176 22 12.001 22C9.28431 22 8.94514 21.99 7.87848 21.94C6.81431 21.8908 6.08931 21.7217 5.45098 21.475C4.79264 21.2208 4.23514 20.8767 3.67931 20.3217C3.12348 19.7658 2.78098 19.2067 2.52598 18.55C2.27848 17.9125 2.11098 17.1867 2.06098 16.1225C2.01348 15.0558 2.00098 14.7167 2.00098 12C2.00098 9.28333 2.01098 8.94417 2.06098 7.8775C2.11014 6.8125 2.27848 6.0875 2.52598 5.45C2.78014 4.79167 3.12348 4.23417 3.67931 3.67833C4.23514 3.1225 4.79348 2.78 5.45098 2.525C6.08848 2.2775 6.81348 2.11 7.87848 2.06C8.94514 2.0125 9.28431 2 12.001 2Z">
                                </path>
                            </svg>
                        </a>
                        <a href="#"
                            class="w-12 h-12 bg-[#FF0000] rounded-xl flex items-center justify-center shadow-md hover:shadow-lg hover:scale-105 transition-all duration-300 group">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                fill="currentColor">
                                <path
                                    d="M19.6069 6.99482C19.5307 6.69695 19.3152 6.47221 19.0684 6.40288C18.6299 6.28062 16.501 6 12.001 6C7.50098 6 5.37252 6.28073 4.93225 6.40323C4.68776 6.47123 4.4723 6.69593 4.3951 6.99482C4.2863 7.41923 4.00098 9.19595 4.00098 12C4.00098 14.804 4.2863 16.5808 4.3954 17.0064C4.47126 17.3031 4.68676 17.5278 4.93251 17.5968C5.37252 17.7193 7.50098 18 12.001 18C16.501 18 18.6299 17.7194 19.0697 17.5968C19.3142 17.5288 19.5297 17.3041 19.6069 17.0052C19.7157 16.5808 20.001 14.8 20.001 12C20.001 9.2 19.7157 7.41923 19.6069 6.99482ZM21.5442 6.49818C22.001 8.28 22.001 12 22.001 12C22.001 12 22.001 15.72 21.5442 17.5018C21.2897 18.4873 20.547 19.2618 19.6056 19.5236C17.8971 20 12.001 20 12.001 20C12.001 20 6.10837 20 4.39637 19.5236C3.45146 19.2582 2.70879 18.4836 2.45774 17.5018C2.00098 15.72 2.00098 12 2.00098 12C2.00098 12 2.00098 8.28 2.45774 6.49818C2.71227 5.51273 3.45495 4.73818 4.39637 4.47636C6.10837 4 12.001 4 12.001 4C12.001 4 17.8971 4 19.6056 4.47636C20.5505 4.74182 21.2932 5.51636 21.5442 6.49818ZM10.001 15.5V8.5L16.001 12L10.001 15.5Z">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 TK Ceria Belajar. Dibuat dengan ❤️ untuk anak-anak Indonesia.</p>
            </div>
        </div>
    </footer>
@endsection