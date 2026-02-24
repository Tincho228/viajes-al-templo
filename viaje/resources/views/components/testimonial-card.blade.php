@props(['name', 'quote'])

<div class="bg-white rounded-2xl border border-slate-100 p-8 flex flex-col shadow-sm hover:shadow-lg transition-all duration-300">
    {{-- Quote icon --}}
    <svg class="w-8 h-8 text-amber-300 mb-4 shrink-0" fill="currentColor" viewBox="0 0 24 24">
        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
    </svg>
    <blockquote class="text-slate-600 leading-relaxed mb-5 flex-1 italic">
        "{{ $quote }}"
    </blockquote>
    <div class="flex items-center gap-3 pt-4 border-t border-slate-100">
        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-amber-400 to-amber-500 flex items-center justify-center text-white font-bold text-sm">
            {{ strtoupper(substr($name, 0, 1)) }}
        </div>
        <span class="font-semibold text-sm text-slate-700">{{ $name }}</span>
    </div>
</div>
