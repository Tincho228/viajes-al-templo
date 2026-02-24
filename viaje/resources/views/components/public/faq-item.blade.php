@props(['question', 'answer'])

<div x-data="{ open: false }" class="border border-slate-200 rounded-xl overflow-hidden transition-colors duration-200" :class="open ? 'bg-amber-50/40 border-amber-200' : 'bg-white'">
    <button @click="open = !open"
            class="w-full flex items-center justify-between px-6 py-4.5 text-left focus:outline-none group">
        <span class="font-medium text-slate-800 pr-4" x-bind:class="open && 'text-amber-700'">{{ $question }}</span>
        <svg class="w-5 h-5 text-slate-400 shrink-0 transition-transform duration-300 group-hover:text-amber-500"
             :class="open && 'rotate-180 text-amber-500'"
             fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>
    <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-1"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-1"
         x-cloak
         class="px-6 pb-5 text-slate-600 text-sm leading-relaxed">
        {{ $answer }}
    </div>
</div>
