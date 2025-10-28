<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'SD Ceria Belajar')</title>

  <!-- Tailwind (CDN) -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- AOS CSS (cukup SEKALI, wajib di dalam <head>) -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <style>
    body { font-family: 'Inter', sans-serif; }
    html { scroll-behavior: smooth; }
  </style>

  @stack('head')
</head>
<body class="bg-gray-50">
  @yield('content')

  <!-- AOS JS (letakkan sebelum </body>) -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      AOS.init({
        duration: 800,        // durasi animasi (ms)
        once: true,           // animasi sekali saja
        offset: 120,          // jarak sebelum trigger
        easing: 'ease-out-cubic'
      });
    });
  </script>

  @stack('scripts')
</body>
</html>