@php
$hour = now('America/Belem')->hour;
$isOpen = $hour >= 17 && $hour < 23; @endphp <div
    class="inline-flex items-center gap-2 rounded-full border px-4 py-2 text-xs font-bold uppercase tracking-wide {{ $isOpen ? 'border-brand-green/50 bg-brand-green/15 text-brand-green' : 'border-brand-red/45 bg-brand-red/10 text-brand-red' }}">
    <span class="inline-flex h-2 w-2 rounded-full {{ $isOpen ? 'bg-brand-green' : 'bg-brand-red' }}"></span>
    {{ $isOpen ? 'Aberto agora' : 'Fechado no momento' }}
    </div>