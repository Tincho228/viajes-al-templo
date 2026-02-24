@extends('layouts.public')

@section('content')
    <!-- ============================================= -->
    <!-- HERO SECTION — Full viewport, image carousel  -->
    <!-- ============================================= -->
    <section x-data="{ current: $persist(0).as('hero_slide') }"
             x-init="setInterval(() => current = (current + 1) % 3, 7000)"
             class="relative flex items-center justify-center min-h-screen w-full overflow-hidden">

        {{-- Background images — static HTML, Alpine only toggles opacity --}}
        <div class="absolute inset-0 w-full h-full">
            <div class="absolute inset-0 w-full h-full transition-opacity duration-[2000ms] ease-in-out"
                 :class="current === 0 ? 'opacity-100' : 'opacity-0'">
                <img src="/images/hero-bg1.jpg"
                     class="absolute inset-0 w-full h-full object-cover object-center animate-hero-drift"
                     alt="Templo paisaje 1">
            </div>
            <div class="absolute inset-0 w-full h-full transition-opacity duration-[2000ms] ease-in-out"
                 :class="current === 1 ? 'opacity-100' : 'opacity-0'">
                <img src="/images/hero-bg2.jpg"
                     class="absolute inset-0 w-full h-full object-cover object-center animate-hero-drift"
                     alt="Templo paisaje 2">
            </div>
            <div class="absolute inset-0 w-full h-full transition-opacity duration-[2000ms] ease-in-out"
                 :class="current === 2 ? 'opacity-100' : 'opacity-0'">
                <img src="/images/hero-bg3.jpg"
                     class="absolute inset-0 w-full h-full object-cover object-center animate-hero-drift"
                     alt="Templo paisaje 3">
            </div>
            {{-- Dark overlay for readability --}}
            <div class="absolute inset-0 bg-gradient-to-b from-slate-900/40 via-slate-900/50 to-slate-900/80"></div>
        </div>

        {{-- Hero content --}}
        <div class="relative z-10 max-w-3xl mx-auto px-5 text-center py-32">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white leading-tight tracking-tight mb-6 drop-shadow-lg">
                Viajes al Templo <br class="hidden md:block">con propósito y paz
            </h1>
            <p class="text-lg md:text-xl text-slate-200 leading-relaxed mb-10 max-w-2xl mx-auto">
                Organiza viajes espirituales al templo de forma sencilla, segura y colaborativa. Menos trabajo, más servicio.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#contacto" class="px-8 py-3.5 bg-gradient-to-r from-amber-500 to-amber-600 text-white font-semibold rounded-xl shadow-lg shadow-amber-500/30 hover:shadow-xl hover:shadow-amber-500/40 hover:from-amber-600 hover:to-amber-700 transition-all duration-300 text-base">
                    Organizar un viaje
                </a>
                <a href="#como-funciona" class="px-8 py-3.5 bg-white/10 backdrop-blur-sm border border-white/30 text-white font-semibold rounded-xl hover:bg-white/20 transition-all duration-300 text-base">
                    Saber más
                </a>
            </div>
        </div>

        {{-- Scroll indicator --}}
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10 animate-float">
            <svg class="w-6 h-6 text-white/60" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
            </svg>
        </div>
    </section>

    <!-- ============================================= -->
    <!-- FEATURES SECTION                              -->
    <!-- ============================================= -->
    <section class="space-section bg-white">
        <div class="max-w-7xl mx-auto">
            <x-section-title>
                ¿Por qué usar Viajes Al Templo?
                <x-slot name="subtitle">Simplificamos la organización para que te enfoques en lo que más importa.</x-slot>
            </x-section-title>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
                <x-feature-card icon="calendar" title="Organiza viajes fácilmente" desc="Planifica y gestiona cada detalle del viaje al templo desde un solo lugar." />
                <x-feature-card icon="users" title="Gestiona pasajeros y asientos" desc="Registra miembros, asigna asientos y reduce el trabajo manual de los voluntarios." />
                <x-feature-card icon="credit-card" title="Controla pagos y participación" desc="Lleva un seguimiento claro y transparente de pagos y asistencia." />
            </div>
        </div>
    </section>

    <!-- ============================================= -->
    <!-- HOW IT WORKS SECTION                          -->
    <!-- ============================================= -->
    <section id="como-funciona" class="space-section bg-stone-50">
        <div class="max-w-7xl mx-auto">
            <x-section-title>
                Cómo funciona
                <x-slot name="subtitle">Tres simples pasos para organizar tu próximo viaje al templo.</x-slot>
            </x-section-title>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-12 relative">
                {{-- Connector line (desktop) --}}
                <div class="hidden md:block absolute top-10 left-[20%] right-[20%] h-px bg-gradient-to-r from-amber-200 via-amber-300 to-amber-200"></div>

                {{-- Step 1 --}}
                <div class="flex flex-col items-center text-center relative">
                    <div class="w-16 h-16 mb-5 bg-gradient-to-br from-amber-400 to-amber-500 text-white rounded-2xl flex items-center justify-center font-bold text-2xl shadow-lg shadow-amber-200/50 relative z-10">
                        1
                    </div>
                    <h3 class="font-semibold text-lg text-slate-800 mb-2">Crea un viaje</h3>
                    <p class="text-sm text-slate-500 leading-relaxed max-w-xs">Define fechas, destino, capacidad y todos los detalles necesarios.</p>
                </div>

                {{-- Step 2 --}}
                <div class="flex flex-col items-center text-center relative">
                    <div class="w-16 h-16 mb-5 bg-gradient-to-br from-amber-400 to-amber-500 text-white rounded-2xl flex items-center justify-center font-bold text-2xl shadow-lg shadow-amber-200/50 relative z-10">
                        2
                    </div>
                    <h3 class="font-semibold text-lg text-slate-800 mb-2">Invita miembros</h3>
                    <p class="text-sm text-slate-500 leading-relaxed max-w-xs">Comparte la invitación y registra pasajeros fácilmente.</p>
                </div>

                {{-- Step 3 --}}
                <div class="flex flex-col items-center text-center relative">
                    <div class="w-16 h-16 mb-5 bg-gradient-to-br from-amber-400 to-amber-500 text-white rounded-2xl flex items-center justify-center font-bold text-2xl shadow-lg shadow-amber-200/50 relative z-10">
                        3
                    </div>
                    <h3 class="font-semibold text-lg text-slate-800 mb-2">Gestiona y viaja</h3>
                    <p class="text-sm text-slate-500 leading-relaxed max-w-xs">Administra pagos, asientos y disfruta del viaje en paz.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================= -->
    <!-- TESTIMONIALS SECTION                          -->
    <!-- ============================================= -->
    <section class="space-section bg-white">
        <div class="max-w-7xl mx-auto">
            <x-section-title>
                Lo que dicen quienes lo usan
                <x-slot name="subtitle">Experiencias de organizadores y miembros que ya viajaron con nosotros.</x-slot>
            </x-section-title>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
                <x-testimonial-card name="Ana, organizadora" quote="Nunca fue tan fácil coordinar un viaje al templo. Todo el grupo estuvo informado y los pagos fueron claros." />
                <x-testimonial-card name="Carlos, pasajero" quote="Me sentí acompañado y seguro. La plataforma nos ayudó a estar organizados y tranquilos." />
                <x-testimonial-card name="Marta, voluntaria" quote="La gestión de asientos y pasajeros ahorró mucho tiempo. Recomiendo Viajes Al Templo a todos los líderes." />
            </div>
        </div>
    </section>

    <!-- ============================================= -->
    <!-- FAQ SECTION                                   -->
    <!-- ============================================= -->
    <section id="faq" class="space-section bg-stone-50">
        <div class="max-w-2xl mx-auto">
            <x-section-title>
                Preguntas frecuentes
            </x-section-title>
            <div class="space-y-3">
                <x-public.faq-item question="¿Quién puede organizar un viaje?" answer="Cualquier líder de Estaca o Barrio puede crear y gestionar viajes desde la plataforma." />
                <x-public.faq-item question="¿Cómo se registran los pasajeros?" answer="Los miembros pueden inscribirse fácilmente desde un enlace compartido o desde la plataforma." />
                <x-public.faq-item question="¿Se puede llevar control de pagos?" answer="Sí, la plataforma permite registrar y visualizar el estado de pago de cada pasajero." />
                <x-public.faq-item question="¿Es gratuita la plataforma?" answer="Sí, Viajes Al Templo es una herramienta gratuita al servicio de la comunidad." />
                <x-public.faq-item question="¿Puedo gestionar múltiples viajes?" answer="Por supuesto. Puedes crear y administrar tantos viajes como necesites simultáneamente." />
            </div>
        </div>
    </section>

    <!-- ============================================= -->
    <!-- CONTACT SECTION                               -->
    <!-- ============================================= -->
    <section id="contacto" class="space-section bg-white">
        <div class="max-w-7xl mx-auto">
            <x-section-title>
                Contacto
                <x-slot name="subtitle">¿Tienes preguntas o sugerencias? Estamos para ayudarte.</x-slot>
            </x-section-title>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
                {{-- Left: Contact info card --}}
                <div class="bg-slate-900 text-white rounded-2xl p-8 md:p-10 flex flex-col justify-between">
                    <div>
                        <h3 class="text-2xl font-bold mb-3">Hablemos</h3>
                        <p class="text-slate-300 text-sm leading-relaxed mb-8">Si quieres organizar un viaje al templo o tienes consultas sobre la plataforma, no dudes en contactarnos.</p>
                    </div>
                    <div class="space-y-5">
                        <div class="flex items-start gap-4">
                            <div class="w-11 h-11 rounded-xl bg-white/10 flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-slate-400 uppercase tracking-wider mb-1">Correo electrónico</p>
                                <p class="text-sm font-medium">info@viajesaltemplo.com</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-11 h-11 rounded-xl bg-white/10 flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-slate-400 uppercase tracking-wider mb-1">Teléfono</p>
                                <p class="text-sm font-medium">+54 9 000 000 0000</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-11 h-11 rounded-xl bg-white/10 flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-slate-400 uppercase tracking-wider mb-1">Ubicación</p>
                                <p class="text-sm font-medium">Argentina</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right: Contact form --}}
                <form class="bg-stone-50 border border-slate-200 rounded-2xl p-8 md:p-10 space-y-5 shadow-sm">
                    <div>
                        <label for="contact-name" class="block text-sm font-medium text-slate-700 mb-1.5">Nombre</label>
                        <input type="text" id="contact-name" name="nombre" placeholder="Tu nombre"
                               class="w-full border border-slate-200 rounded-xl px-4 py-3 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition-all placeholder:text-slate-400" required>
                    </div>
                    <div>
                        <label for="contact-email" class="block text-sm font-medium text-slate-700 mb-1.5">Correo electrónico</label>
                        <input type="email" id="contact-email" name="email" placeholder="tu@email.com"
                               class="w-full border border-slate-200 rounded-xl px-4 py-3 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition-all placeholder:text-slate-400" required>
                    </div>
                    <div>
                        <label for="contact-message" class="block text-sm font-medium text-slate-700 mb-1.5">Mensaje</label>
                        <textarea id="contact-message" name="mensaje" placeholder="¿En qué podemos ayudarte?"
                                  class="w-full border border-slate-200 rounded-xl px-4 py-3 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition-all placeholder:text-slate-400 resize-none" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="w-full bg-gradient-to-r from-amber-500 to-amber-600 text-white font-semibold py-3.5 rounded-xl shadow-md shadow-amber-200/50 hover:shadow-lg hover:from-amber-600 hover:to-amber-700 transition-all duration-300 text-sm">
                        Enviar mensaje
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection
