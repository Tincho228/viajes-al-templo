<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        @include('partials.head')
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        {{-- Alpine.js Plugins --}}
        <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="min-h-screen font-sans antialiased bg-stone-50 text-slate-900">

        <div class="min-h-screen flex flex-col">
            {{-- Navbar --}}
            <x-public.navbar />

            {{-- Main Content con Split Layout --}}
            <main class="flex-1 flex flex-col lg:flex-row">

                {{-- PANEL IZQUIERDO — Brand (solo desktop) --}}
                <div class="hidden lg:flex lg:w-5/12 xl:w-1/2 flex-col items-center justify-center
                            bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 relative overflow-hidden p-12">

                    {{-- Decoración sutil --}}
                    <div class="absolute top-0 left-0 w-72 h-72 bg-amber-500/10 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
                    <div class="absolute bottom-0 right-0 w-96 h-96 bg-amber-600/8 rounded-full blur-3xl translate-x-1/3 translate-y-1/3"></div>

                    <div class="relative z-10 text-center max-w-sm">
                        <div class="flex items-center justify-center gap-3 mb-8">
                            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center shadow-xl shadow-amber-500/30">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3L2 12h3v8h14v-8h3L12 3z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 21v-6h6v6"/>
                                </svg>
                            </div>
                        </div>
                        <h1 class="text-3xl font-extrabold text-white tracking-tight mb-3">Viajes Al Templo</h1>
                        <p class="text-slate-400 text-sm leading-relaxed mb-8">
                            La plataforma que une fe y organización. Registrate para gestionar tus viajes de forma profesional.
                        </p>
                        <ul class="space-y-4 text-left inline-block">
                            <li class="flex items-center gap-3">
                                <span class="w-6 h-6 rounded-full bg-amber-500/20 flex items-center justify-center text-amber-400">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                </span>
                                <span class="text-sm text-slate-300 font-medium">Gestión de asientos en tiempo real</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <span class="w-6 h-6 rounded-full bg-amber-500/20 flex items-center justify-center text-amber-400">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                </span>
                                <span class="text-sm text-slate-300 font-medium">Seguimiento de pagos integrado</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- PANEL DERECHO — Formulario --}}
                <div class="flex-1 flex flex-col items-center justify-center px-5 py-16">
                    <div class="w-full max-w-sm">
                        {{-- Logo móvil (solo si el nav es transparente o querés reforzarlo) --}}
                        <div class="bg-white border border-slate-200 rounded-2xl p-8 md:p-10 shadow-sm">
                            {{ $slot }}
                        </div>

                        <div class="mt-8 text-center">
                            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-amber-600 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                                Volver a la página principal
                            </a>
                        </div>
                    </div>
                </div>
            </main>

            {{-- Footer --}}
            <x-public.footer />
        </div>

        @fluxScripts
    </body>
</html>
