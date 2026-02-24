@props(['icon', 'title', 'desc'])

<div class="bg-white rounded-2xl border border-slate-200 p-8 md:p-10 flex flex-col items-center text-center shadow-sm hover:shadow-md transition-shadow duration-300">
    {{-- Icon --}}
    <div class="w-16 h-16 mb-6 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center">
        @if($icon === 'calendar')
            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <rect x="3" y="4" width="18" height="18" rx="2"/>
                <path d="M16 2v4M8 2v4M3 10h18"/>
                <path d="M8 14h.01M12 14h.01M16 14h.01M8 18h.01M12 18h.01"/>
            </svg>
        @elseif($icon === 'users')
            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path d="M17 20v-2a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4v2"/>
                <circle cx="9" cy="7" r="4"/>
                <path d="M23 20v-2a4 4 0 0 0-3-3.87"/>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
            </svg>
        @elseif($icon === 'credit-card')
            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <rect x="2" y="5" width="20" height="14" rx="2"/>
                <path d="M2 10h20"/>
            </svg>
        @endif
    </div>

    {{-- Content --}}
    <h3 class="font-bold text-lg text-slate-800 mb-3">{{ $title }}</h3>
    <p class="text-sm text-slate-500 leading-relaxed">{{ $desc }}</p>
</div>
