<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Portfolio') }} - @yield('title', 'Home')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/toastify-js@1.12.0/src/toastify.min.css" rel="stylesheet">
    @stack('styles')
</head>
<body class="bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 text-white overflow-x-hidden">
    <!-- Loading Screen -->
    <div id="loading" class="fixed inset-0 bg-gradient-to-r from-purple-600 to-indigo-600 z-50 flex items-center justify-center">
        <div class="animate-spin rounded-full h-32 w-32 border-b-2 border-white"></div>
    </div>

    <!-- Navigation -->
    @include('partials.navbar')

    <!-- Main Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('partials.footer')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js@1.12.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    
    @stack('scripts')
    
    <script>
        // Initialize AOS
        AOS.init({ duration: 1000, once: true });

        // Loading screen
        window.addEventListener('load', () => {
            document.getElementById('loading').style.display = 'none';
        });

        // Toast notifications
        @if(session('success'))
            Toastify({
                text: "{{ session('success') }}",
                duration: 4000,
                gravity: "top",
                position: "right",
                backgroundColor: "#10b981",
                className: "font-semibold"
            }).showToast();
        @endif

        @if(session('error'))
            Toastify({
                text: "{{ session('error') }}",
                duration: 4000,
                gravity: "top",
                position: "right",
                backgroundColor: "#ef4444",
                className: "font-semibold"
            }).showToast();
        @endif
    </script>
</body>
</html>