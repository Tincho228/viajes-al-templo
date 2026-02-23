<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Viajes Al Templo — Organiza viajes espirituales al templo de forma sencilla, segura y colaborativa.">
    <title>Viajes Al Templo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- Alpine.js Plugins --}}
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-stone-50 text-gray-800 font-sans antialiased" x-data="{ loading: true }" x-init="setTimeout(() => loading = false, 600)">

    {{-- SPLASH SCREEN — Pantalla de carga premium --}}
    <div x-show="loading"
         x-transition:leave="transition ease-in duration-500"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-[100] flex items-center justify-center bg-slate-900">
        <div class="flex flex-col items-center">
            <div class="relative">
                {{-- Logo pulsante --}}
                <div class="w-20 h-20 rounded-3xl bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center animate-pulse shadow-2xl shadow-amber-500/40">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3L2 12h3v8h14v-8h3L12 3z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 21v-6h6v6"/>
                    </svg>
                </div>
                {{-- Anillo de carga circular --}}
                <div class="absolute -inset-4 border-2 border-amber-500/20 rounded-full border-t-amber-500 animate-spin transition-opacity duration-1000"></div>
            </div>
            <p class="mt-8 text-amber-500/80 font-medium tracking-widest uppercase text-xs animate-pulse">
                Cargando Experiencia
            </p>
        </div>
    </div>

    <div class="min-h-screen flex flex-col">
        <x-public.navbar />
        {{-- Main sin container para que el hero pueda ser full-width --}}
        <main class="flex-1">
            @yield('content')
        </main>
        <x-public.footer />
    </div>
</body>
</html>
