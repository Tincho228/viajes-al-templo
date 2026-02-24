<div class="text-center mb-12 md:mb-16">
    <h2 class="text-3xl md:text-4xl font-bold text-slate-800 tracking-tight">{{ $slot }}</h2>
    @isset($subtitle)
        <p class="mt-4 text-lg text-slate-500 max-w-2xl mx-auto leading-relaxed">{{ $subtitle }}</p>
    @endisset
    <div class="mt-5 mx-auto w-16 h-1 rounded-full bg-gradient-to-r from-amber-400 to-amber-500"></div>
</div>
