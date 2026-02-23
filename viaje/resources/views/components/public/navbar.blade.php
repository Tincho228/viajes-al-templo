<nav x-data="{ open: false }"
     class="sticky top-0 z-50 bg-white/95 backdrop-blur-md shadow-sm">
    <div class="max-w-7xl mx-auto flex items-center justify-between py-4 px-5">

        {{-- Logo --}}
        <a href="/" class="flex items-center gap-2.5 group">
            <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-amber-500 to-amber-600 flex items-center justify-center shadow-md group-hover:shadow-lg transition-shadow duration-300">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3L2 12h3v8h14v-8h3L12 3z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 21v-6h6v6"/>
                </svg>
            </div>
            <span class="text-lg font-bold text-slate-800 tracking-tight">Viajes Al Templo</span>
        </a>

        {{-- Desktop nav links --}}
        <div class="hidden md:flex items-center gap-1">
            <a href="/"              class="px-3.5 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-amber-700 hover:bg-amber-50/60 transition-all duration-200">Inicio</a>
            <a href="#como-funciona" class="px-3.5 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-amber-700 hover:bg-amber-50/60 transition-all duration-200">Cómo funciona</a>
            <a href="#faq"           class="px-3.5 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-amber-700 hover:bg-amber-50/60 transition-all duration-200">FAQ</a>
            <a href="#contacto"      class="px-3.5 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-amber-700 hover:bg-amber-50/60 transition-all duration-200">Contacto</a>
        </div>

        {{-- Desktop auth buttons --}}
        <div class="hidden md:flex items-center gap-2.5">
            <a href="/login"    class="px-5 py-2 rounded-xl text-sm font-semibold text-amber-700 border border-amber-200 hover:bg-amber-50 hover:border-amber-300 transition-all duration-200">Iniciar sesión</a>
            <a href="/register" class="px-5 py-2 rounded-xl text-sm font-semibold bg-gradient-to-r from-amber-500 to-amber-600 text-white shadow-md shadow-amber-200/50 hover:shadow-lg hover:shadow-amber-300/50 hover:from-amber-600 hover:to-amber-700 transition-all duration-200">Registrarse</a>
        </div>

        {{-- Mobile hamburger --}}
        <button @click="open = !open"
                class="md:hidden relative w-10 h-10 flex items-center justify-center rounded-xl hover:bg-amber-50 transition-colors duration-200"
                aria-label="Menú">
            {{-- Líneas del hamburger → X animado --}}
            <span class="absolute block w-5 h-0.5 bg-slate-700 transition-all duration-300"
                  :class="open ? 'rotate-45 translate-y-0' : '-translate-y-1.5'"></span>
            <span class="absolute block w-5 h-0.5 bg-slate-700 transition-all duration-300"
                  :class="open ? 'opacity-0 scale-x-0' : 'opacity-100 scale-x-100'"></span>
            <span class="absolute block w-5 h-0.5 bg-slate-700 transition-all duration-300"
                  :class="open ? '-rotate-45 translate-y-0' : 'translate-y-1.5'"></span>
        </button>
    </div>

    {{-- ===== MOBILE MENU — Full-screen drawer ===== --}}
    {{-- Backdrop --}}
    <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="open = false"
         x-cloak
         class="md:hidden fixed inset-0 top-[65px] bg-slate-900/40 backdrop-blur-sm z-40">
    </div>

    {{-- Drawer panel --}}
    <div x-show="open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         x-cloak
         class="md:hidden absolute top-full left-0 right-0 z-50 bg-slate-900 shadow-2xl shadow-slate-900/50 border-t border-slate-800">

        {{-- Nav links --}}
        <div class="px-5 pt-6 pb-4 space-y-1">
            <a href="/"              @click="open = false"
               class="flex items-center gap-3 px-4 py-3.5 rounded-xl text-base font-medium text-slate-200 hover:text-amber-400 hover:bg-white/5 transition-all duration-200">
                <svg class="w-4 h-4 opacity-50" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l9-9 9 9M5 10v9h5v-5h4v5h5V10"/></svg>
                Inicio
            </a>
            <a href="#como-funciona" @click="open = false"
               class="flex items-center gap-3 px-4 py-3.5 rounded-xl text-base font-medium text-slate-200 hover:text-amber-400 hover:bg-white/5 transition-all duration-200">
                <svg class="w-4 h-4 opacity-50" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                Cómo funciona
            </a>
            <a href="#faq"           @click="open = false"
               class="flex items-center gap-3 px-4 py-3.5 rounded-xl text-base font-medium text-slate-200 hover:text-amber-400 hover:bg-white/5 transition-all duration-200">
                <svg class="w-4 h-4 opacity-50" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Preguntas frecuentes
            </a>
            <a href="#contacto"      @click="open = false"
               class="flex items-center gap-3 px-4 py-3.5 rounded-xl text-base font-medium text-slate-200 hover:text-amber-400 hover:bg-white/5 transition-all duration-200">
                <svg class="w-4 h-4 opacity-50" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                Contacto
            </a>
        </div>

        {{-- Divider --}}
        <div class="mx-5 h-px bg-gradient-to-r from-transparent via-slate-700 to-transparent"></div>

        {{-- Auth buttons --}}
        <div class="px-5 py-5 flex flex-col gap-3">
            <a href="/login"
               class="flex items-center justify-center gap-2 w-full py-3.5 rounded-xl text-sm font-semibold text-amber-400 border border-amber-400/40 hover:bg-amber-400/10 hover:border-amber-400/70 transition-all duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                Iniciar sesión
            </a>
            <a href="/register"
               class="flex items-center justify-center gap-2 w-full py-3.5 rounded-xl text-sm font-semibold bg-gradient-to-r from-amber-500 to-amber-600 text-white shadow-lg shadow-amber-500/30 hover:from-amber-600 hover:to-amber-700 hover:shadow-amber-500/50 transition-all duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                Crear cuenta
            </a>
        </div>
    </div>
</nav>
