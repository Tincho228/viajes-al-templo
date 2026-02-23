<footer class="bg-slate-900 text-slate-300">
    {{-- Main footer content --}}
    <div class="max-w-7xl mx-auto px-5 py-14 grid grid-cols-1 md:grid-cols-3 gap-10">

        {{-- About --}}
        <div class="flex flex-col items-center md:items-start text-center md:text-left">
            <div class="flex items-center gap-2.5 mb-4">
                <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-amber-500 to-amber-600 flex items-center justify-center">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3L2 12h3v8h14v-8h3L12 3z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 21v-6h6v6"/>
                    </svg>
                </div>
                <span class="text-white font-bold text-lg tracking-tight">Viajes Al Templo</span>
            </div>
            <p class="text-sm leading-relaxed text-slate-400 max-w-xs">
                Plataforma para organizar viajes espirituales al templo, facilitando la gestión de pasajeros, asientos y pagos para Estacas y Barrios.
            </p>
        </div>

        {{-- Quick links --}}
        <div class="flex flex-col items-center md:items-start text-center md:text-left">
            <h3 class="text-white font-semibold text-sm uppercase tracking-wider mb-4">Enlaces rápidos</h3>
            <ul class="space-y-2.5">
                <li>
                    <a href="/" class="text-sm text-slate-400 hover:text-amber-400 transition-colors duration-200 inline-flex items-center gap-2">
                        <svg class="w-3.5 h-3.5 opacity-50" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="#como-funciona" class="text-sm text-slate-400 hover:text-amber-400 transition-colors duration-200 inline-flex items-center gap-2">
                        <svg class="w-3.5 h-3.5 opacity-50" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                        Cómo funciona
                    </a>
                </li>
                <li>
                    <a href="#faq" class="text-sm text-slate-400 hover:text-amber-400 transition-colors duration-200 inline-flex items-center gap-2">
                        <svg class="w-3.5 h-3.5 opacity-50" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                        Preguntas frecuentes
                    </a>
                </li>
                <li>
                    <a href="#contacto" class="text-sm text-slate-400 hover:text-amber-400 transition-colors duration-200 inline-flex items-center gap-2">
                        <svg class="w-3.5 h-3.5 opacity-50" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                        Contacto
                    </a>
                </li>
            </ul>
        </div>

        {{-- Contact --}}
        <div class="flex flex-col items-center md:items-start text-center md:text-left">
            <h3 class="text-white font-semibold text-sm uppercase tracking-wider mb-4">Contacto</h3>
            <ul class="space-y-3">
                <li class="flex items-center gap-3 text-sm text-slate-400">
                    <svg class="w-4 h-4 text-amber-500 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    info@viajesaltemplo.com
                </li>
                <li class="flex items-center gap-3 text-sm text-slate-400">
                    <svg class="w-4 h-4 text-amber-500 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    +54 9 000 000 0000
                </li>
            </ul>
        </div>
    </div>

    {{-- Bottom bar --}}
    <div class="border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-5 py-5 flex items-center justify-center">
            <p class="text-xs text-slate-500 text-center">&copy; {{ date('Y') }} Viajes Al Templo. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>
