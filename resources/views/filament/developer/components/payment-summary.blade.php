@php
    // Ambil paket yang sedang dipilih di step 2
    $paketId = $this->data['id_paket'] ?? null;
    $paket = $paketId ? \App\Models\Paket::find($paketId) : null;
    $harga = $paket?->price ?? 0;
@endphp

<div class="space-y-4">

    {{-- Paket terpilih --}}
    @if ($paket)
        <div class="rounded-xl bg-violet-100 dark:bg-violet-950/80 border-2 border-violet-300 dark:border-violet-700 p-4">
            <div class="flex items-center gap-2 mb-1">
                <x-heroicon-m-check-badge class="w-5 h-5 text-violet-800 dark:text-violet-400" />
                <span class="text-xs font-black uppercase tracking-widest text-violet-800 dark:text-violet-400">Paket
                    Terpilih</span>
            </div>
            <p class="text-lg font-black text-slate-950 dark:text-white mt-1">
                {{ $paket->name ?? $paket->desc ?? "Paket #{$paket->id}" }}
            </p>
        </div>
    @else
        <div class="rounded-xl border border-dashed border-gray-300 dark:border-gray-600 p-4 text-center">
            <x-heroicon-o-cube class="w-6 h-6 text-gray-300 mx-auto mb-1" />
            <p class="text-xs text-gray-400">Belum ada paket dipilih</p>
        </div>
    @endif

    {{-- Rincian biaya --}}
    <div class="space-y-3 py-2">
        <div class="flex justify-between items-center text-sm">
            <span class="font-bold text-slate-950 dark:text-white">Harga Paket</span>
            <span class="font-black text-slate-950 dark:text-white text-base">Rp
                {{ number_format($harga, 0, ',', '.') }}</span>
        </div>

        <div class="border-t-2 border-slate-200 dark:border-slate-700 pt-3 flex justify-between items-center">
            <span class="font-black text-slate-950 dark:text-white text-base uppercase tracking-tight">Total
                Transfer</span>
            <span class="text-xl font-black text-violet-800 dark:text-violet-400">
                Rp {{ number_format($harga, 0, ',', '.') }}
            </span>
        </div>
    </div>

    {{-- Catatan --}}
    <div class="rounded-lg bg-amber-100 dark:bg-amber-950/40 border border-amber-200 dark:border-amber-800 p-3">
        <div class="flex gap-2">
            <x-heroicon-o-exclamation-triangle class="w-4 h-4 text-amber-600 flex-shrink-0 mt-0.5" />
            <p class="text-xs text-amber-900 dark:text-amber-200 leading-relaxed">
                Misi akan aktif setelah admin memverifikasi bukti pembayaranmu. Proses verifikasi maksimal <strong>1×24
                    jam</strong>.
            </p>
        </div>
    </div>

    {{-- Security --}}
    <div class="flex items-center gap-1.5 justify-center">
        <x-heroicon-o-lock-closed class="w-3 h-3 text-gray-400" />
        <span class="text-xs text-gray-400">Data kamu aman & terenkripsi</span>
    </div>

</div>