<header class="bg-white border-b border-gray-200">
  <div class="container mx-auto px-6 py-4">
    <div class="flex justify-between items-center">
      <!-- Logo -->
      <div class="flex items-center">
        <h1 class="text-xl font-bold text-gray-900">SD Ceria Belajar</h1>
      </div>

      <!-- Navigation -->
      <nav class="hidden md:flex items-center space-x-6">
        <a href="{{ url('/') }}" class="text-gray-700 hover:text-blue-600 font-medium text-sm">Beranda</a>
        <a href="#profil" class="text-gray-700 hover:text-blue-600 font-medium text-sm">Profil</a>
        <a href="#program" class="text-gray-700 hover:text-blue-600 font-medium text-sm">Program</a>
        <a href="#galeri" class="text-gray-700 hover:text-blue-600 font-medium text-sm">Galeri</a>
        <a href="#ppdb" class="text-blue-600 font-medium text-sm">PPDB</a>
        <a href="#kontak" class="text-gray-700 hover:text-blue-600 font-medium text-sm">Kontak</a>
        <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 font-medium text-sm">Login</a>

        <!-- Tombol Daftar -->
        <a href="{{ route('register.form') }}" class="bg-[#FF2FA1] text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-[#e62991] transition duration-200">
          Daftar
        </a>
      </nav>
    </div>
  </div>
</header>