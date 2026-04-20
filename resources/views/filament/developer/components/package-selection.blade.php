@php
    $pakets = \App\Models\Paket::all();
    $selectedId = $get('id_paket');
@endphp

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-1">
    @foreach($pakets as $paket)
        @php
            $isSelected = $selectedId == $paket->id;
        @endphp
        <div x-on:click="$wire.set('data.id_paket', {{ $paket->id }})"
            class="group relative cursor-pointer rounded-2xl border-2 p-6 transition-all duration-300 transform hover:-translate-y-1
                    {{ $isSelected
            ? 'border-violet-600 bg-violet-50/30 dark:bg-violet-900/20 shadow-lg shadow-violet-200/50 dark:shadow-none'
            : 'border-gray-100 bg-white hover:border-violet-300 hover:shadow-md dark:border-gray-800 dark:bg-gray-900' }}">
            {{-- Badge Most Popular --}}
            @if($paket->most_popular)
                <div class="absolute -top-3 left-6">
                    <span
                        class="inline-flex items-center gap-1.5 bg-gradient-to-r from-amber-400 to-orange-500 text-white text-[10px] font-black px-3 py-1 rounded-full uppercase tracking-wider shadow-sm ring-2 ring-white dark:ring-gray-900">
                        <x-heroicon-m-fire class="w-3 h-3" />
                        Most Popular
                    </span>
                </div>
            @endif

            {{-- Selection Indicator --}}
            <div class="absolute top-4 right-4">
                <div
                    class="w-6 h-6 rounded-full border-2 flex items-center justify-center transition-colors duration-200
                        {{ $isSelected ? 'border-violet-600 bg-violet-600 text-white' : 'border-gray-200 bg-gray-50 dark:bg-gray-800 group-hover:border-violet-300' }}">
                    @if($isSelected)
                        <x-heroicon-m-check class="w-4 h-4 stroke-[3]" />
                    @endif
                </div>
            </div>

            {{-- Icon/Avatar placeholder --}}
            <div class="mb-5">
                <div class="w-12 h-12 rounded-xl bg-violet-100 dark:bg-violet-900/40 flex items-center justify-center">
                    <x-heroicon-o-cube-transparent class="w-7 h-7 text-violet-600 dark:text-violet-400" />
                </div>
            </div>

            {{-- Title & Price --}}
            <div class="space-y-1">
                <h3
                    class="text-lg font-black text-slate-900 dark:text-white group-hover:text-violet-700 dark:group-hover:text-violet-400 transition-colors">
                    {{ $paket->name ?? $paket->desc ?? "Paket #{$paket->id}" }}
                </h3>
                <div class="flex items-baseline gap-1">
                    <span class="text-2xl font-black text-slate-950 dark:text-white">
                        Rp {{ number_format($paket->price, 0, ',', '.') }}
                    </span>
                </div>
            </div>

            {{-- Description --}}
            <p class="mt-3 text-sm text-gray-500 dark:text-gray-400 leading-relaxed line-clamp-3 font-medium">
                {{ $paket->desc ?? 'Ideal untuk testing aplikasi standar dengan hasil maksimal dan feedback terperinci.' }}
            </p>

            {{-- Footer info --}}
            <div class="mt-6 pt-5 border-t border-gray-100 dark:border-gray-800 flex items-center justify-between">
                <div class="flex items-center gap-1.5">
                    <div class="p-1 rounded-md bg-emerald-50 dark:bg-emerald-950/30">
                        <x-heroicon-m-bolt class="w-3.5 h-3.5 text-emerald-600 dark:text-emerald-400" />
                    </div>
                    <span class="text-[11px] font-black text-emerald-700 dark:text-emerald-400 uppercase tracking-tight">
                        +{{ $paket->point }} Reward Points
                    </span>
                </div>
                <div class="flex items-center gap-1 text-gray-400 group-hover:text-violet-500 transition-colors">
                    <x-heroicon-m-chevron-right class="w-4 h-4" />
                </div>
            </div>
        </div>
    @endforeach
</div>