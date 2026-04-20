{{--  
    Manajemen Kampanye — PlayTest ID Admin Panel  
    Page   : ManajemenKampanye.php  
    Panel  : Admin (/admin)  
    Fonts  : Sora (heading), JetBrains Mono (angka), Inter (body)  
--}}  
  
<x-filament-panels::page>  
  
@push('styles')  
<link rel="preconnect" href="https://fonts.googleapis.com">  
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">  
  
<style>  
/* ══════════════════ FONTS ═══════════════════ */  
.mk-page, .mk-page * { font-family: 'Inter', sans-serif; }  
.font-sora     { font-family: 'Sora', sans-serif !important; }  
.font-mono-num { font-family: 'JetBrains Mono', monospace !important; }  
  
  
  
/* ══════════════════ STAT PILLS ══════════════ */  
.mk-stat-pill {  
    display: flex; align-items: center; gap: 10px;  
    background: #ffffff; padding: 10px 16px; border-radius: 1rem;  
    box-shadow: 0 1px 3px rgba(0,0,0,0.06); border: 1px solid #f1f5f9;  
}  
.mk-stat-pill-icon {  
    width: 28px; height: 28px; border-radius: 0.5rem;  
    display: flex; align-items: center; justify-content: center; flex-shrink: 0;  
}  
  
/* ══════════════════ FILTER BAR ══════════════ */  
.mk-filter-bar {  
    background: #ffffff; padding: 1rem; border-radius: 1rem;  
    box-shadow: 0 1px 3px rgba(0,0,0,0.06); border: 1px solid #f1f5f9;  
    display: flex; flex-wrap: wrap; align-items: center; gap: 0.75rem;  
}  
.mk-filter-bar select,  
.mk-filter-bar input {  
    background: #f1f5f9 !important; border: none !important;  
    border-radius: 0.75rem !important; padding: 6px 12px;  
    font-size: 0.875rem; color: #1e293b; font-weight: 500;  
    cursor: pointer; outline: none;  
}  
.mk-filter-divider { width: 1px; height: 20px; background: #e2e8f0; flex-shrink: 0; }  
  
/* ══════════════════ VIEW TOGGLE ═════════════ */  
.mk-view-toggle { display: flex; align-items: center; padding: 4px; border-radius: 0.75rem; background: #f1f5f9; }  
.mk-view-btn { display: flex; align-items: center; gap: 6px; padding: 6px 12px; border-radius: 0.5rem; font-size: 0.75rem; font-weight: 600; cursor: pointer; transition: all 0.15s ease; border: none; }  
.mk-view-active { background: #2563eb; color: #ffffff; box-shadow: 0 2px 8px rgba(37,99,235,0.25); }  
.mk-view-inactive { background: transparent; color: #64748b; }  
  
/* ══════════════════ CAMPAIGN CARD ═══════════ */  
.mk-card {  
    background: #ffffff; border-radius: 1rem;  
    box-shadow: 0 1px 3px rgba(0,0,0,0.06); border: 1px solid #f1f5f9;  
    overflow: hidden; transition: transform 0.2s ease, box-shadow 0.2s ease;  
}  
.mk-card:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(0,0,0,0.1); }  
  
/* Timeline dots */  
.mk-dot { width: 7px; height: 7px; border-radius: 9999px; flex-shrink: 0; }  
.mk-dot-filled-blue  { background: #2563eb; }  
.mk-dot-filled-green { background: #16a34a; }  
.mk-dot-filled-amber { background: #f59e0b; }  
.mk-dot-empty        { background: #e2e8f0; }  
  
/* Progress track */  
.mk-progress-track { background: #e2e8f0; border-radius: 9999px; overflow: hidden; }  
.mk-progress-fill { height: 100%; border-radius: 9999px; }  
  
/* Badges */  
.mk-badge { display: inline-flex; align-items: center; gap: 5px; padding: 4px 10px; border-radius: 0.5rem; font-size: 0.7rem; font-weight: 600; white-space: nowrap; }  
.mk-badge-aktif    { background: #eff6ff; color: #1d4ed8; }  
.mk-badge-selesai  { background: #f0fdf4; color: #15803d; }  
.mk-badge-ditinjau { background: #fffbeb; color: #b45309; }  
.mk-badge-ditolak  { background: #fff1f2; color: #be123c; }  
.mk-badge-pro      { background: #fffbeb; color: #b45309; }  
.mk-badge-starter  { background: #eff6ff; color: #1d4ed8; }  
  
/* Action buttons */  
.mk-action-btn {  
    width: 32px; height: 32px; border-radius: 0.5rem;  
    display: inline-flex; align-items: center; justify-content: center;  
    cursor: pointer; transition: all 0.15s ease; border: 1px solid transparent;  
}  
.mk-btn-detail   { background: #eff6ff; border-color: #bfdbfe; }  
.mk-btn-detail:hover { background: #dbeafe; }  
.mk-btn-review   { background: #fffbeb; border-color: #fde68a; }  
.mk-btn-review:hover { background: #fef3c7; }  
.mk-btn-approve  { background: #f0fdf4; border-color: #bbf7d0; }  
.mk-btn-approve:hover { background: #dcfce7; }  
.mk-btn-reject   { background: #fff1f2; border-color: #fecdd3; }  
.mk-btn-reject:hover { background: #ffe4e6; }  
.mk-btn-pause    { background: #fff1f2; border-color: #fecdd3; }  
.mk-btn-pause:hover { background: #ffe4e6; }  
.mk-btn-more     { background: #f8fafc; border-color: #e2e8f0; }  
.mk-btn-more:hover { background: #f1f5f9; }  
  
/* ══════════════════ LIST VIEW ROWS ══════════ */  
.mk-list-row {  
    display: flex; align-items: center; gap: 1rem;  
    padding: 1rem 1.25rem; border-bottom: 1px solid #f8fafc;  
    transition: background 0.15s ease;  
}  
.mk-list-row:hover { background: #f8fafc; }  
.mk-list-row:last-child { border-bottom: none; }  
  
/* ══════════════════ MODAL ═══════════════════ */  
.mk-modal-overlay { position: fixed; inset: 0; z-index: 9999; display: flex; align-items: center; justify-content: center; padding: 1rem; }  
.mk-modal-backdrop { position: absolute; inset: 0; background: rgba(15,23,42,0.6); backdrop-filter: blur(4px); }  
.mk-modal-box { position: relative; z-index: 1; background: #ffffff; border-radius: 1.25rem; box-shadow: 0 25px 60px rgba(0,0,0,0.2); width: 100%; max-width: 560px; overflow: hidden; }  
.mk-modal-header { display: flex; align-items: center; justify-content: space-between; padding: 1.25rem 1.5rem; border-bottom: 1px solid #f1f5f9; }  
.mk-modal-body { padding: 1.5rem; }  
.mk-modal-footer { display: flex; align-items: center; justify-content: flex-end; gap: 0.75rem; padding: 1rem 1.5rem; border-top: 1px solid #f1f5f9; background: #f8fafc; }  
.mk-detail-row { display: flex; align-items: flex-start; gap: 0.75rem; padding: 0.625rem 0; border-bottom: 1px solid #f8fafc; }  
.mk-detail-row:last-child { border-bottom: none; }  
.mk-detail-label { font-size: 0.75rem; color: #94a3b8; font-weight: 500; width: 130px; flex-shrink: 0; padding-top: 1px; }  
.mk-detail-value { font-size: 0.8125rem; color: #1e293b; font-weight: 500; flex: 1; }  
  
/* Empty state */  
.mk-empty { display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 4rem 1rem; text-align: center; }  
  
[x-cloak] { display: none !important; }  
</style>  
@endpush  
  
  
{{-- ══════════════════════════════════════════════════  
     ALPINE ROOT  
══════════════════════════════════════════════════ --}}  
<div class="mk-page" x-data="manajemenKampanye()" @keydown.escape.window="tutupModal()">  
  
<div class="px-6 py-6">  
  
    {{-- ── PAGE HEADER ──────────────────────────────── --}}  
    <div data-design-id="page-header" class="flex items-start justify-between mb-6">  
        <div>  
            <h1 class="text-xl font-bold font-sora" style="color:#1e293b;">Manajemen Kampanye</h1>  
            <p class="text-sm mt-0.5" style="color:#64748b;">  
                Pantau dan kelola semua kampanye pengujian aplikasi yang aktif di platform.  
            </p>  
        </div>  
        <div class="flex items-center gap-3">  
            {{-- View Toggle Grid/List --}}  
            <div class="mk-view-toggle">  
                <button class="mk-view-btn"  
                        :class="viewMode === 'grid' ? 'mk-view-active' : 'mk-view-inactive'"  
                        @click="viewMode = 'grid'">  
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                        <path d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>  
                    </svg>  
                    Grid  
                </button>  
                <button class="mk-view-btn"  
                        :class="viewMode === 'list' ? 'mk-view-active' : 'mk-view-inactive'"  
                        @click="viewMode = 'list'">  
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                        <path d="M4 6h16M4 10h16M4 14h16M4 18h16"/>  
                    </svg>  
                    List  
                </button>  
            </div>  
            {{-- Export --}}  
            <button class="flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-semibold text-white"  
                    style="background:#2563eb;box-shadow:0 4px 14px rgba(37,99,235,0.25);">  
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>  
                </svg>  
                Export CSV  
            </button>  
        </div>  
    </div>  
  
    {{-- ── SUMMARY STAT PILLS ──────────────────────── --}}  
    <div data-design-id="stats-row" class="flex flex-wrap items-center gap-3 mb-6">  
  
        <div class="mk-stat-pill">  
            <div class="mk-stat-pill-icon" style="background:#eff6ff;">  
                <svg class="w-3.5 h-3.5" style="color:#2563eb;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                    <path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>  
                </svg>  
            </div>  
            <div>  
                <p class="text-xs" style="color:#94a3b8;">Total</p>  
                <p class="text-sm font-bold font-mono-num leading-none" style="color:#1e293b;">{{ $statTotal }}</p>  
            </div>  
        </div>  
  
        <div class="mk-stat-pill">  
            <div class="mk-stat-pill-icon" style="background:#eff6ff;">  
                <span class="w-2.5 h-2.5 rounded-full" style="background:#2563eb;"></span>  
            </div>  
            <div>  
                <p class="text-xs" style="color:#94a3b8;">Aktif</p>  
                <p class="text-sm font-bold font-mono-num leading-none" style="color:#2563eb;">{{ $statAktif }}</p>  
            </div>  
        </div>  
  
        <div class="mk-stat-pill">  
            <div class="mk-stat-pill-icon" style="background:#f0fdf4;">  
                <span class="w-2.5 h-2.5 rounded-full" style="background:#16a34a;"></span>  
            </div>  
            <div>  
                <p class="text-xs" style="color:#94a3b8;">Selesai</p>  
                <p class="text-sm font-bold font-mono-num leading-none" style="color:#16a34a;">{{ $statSelesai }}</p>  
            </div>  
        </div>  
  
        <div class="mk-stat-pill">  
            <div class="mk-stat-pill-icon" style="background:#fffbeb;">  
                <span class="w-2.5 h-2.5 rounded-full" style="background:#f59e0b;"></span>  
            </div>  
            <div>  
                <p class="text-xs" style="color:#94a3b8;">Ditinjau</p>  
                <p class="text-sm font-bold font-mono-num leading-none" style="color:#b45309;">{{ $statDitinjau }}</p>  
            </div>  
        </div>  
  
        <div class="mk-stat-pill">  
            <div class="mk-stat-pill-icon" style="background:#fff1f2;">  
                <span class="w-2.5 h-2.5 rounded-full" style="background:#ef4444;"></span>  
            </div>  
            <div>  
                <p class="text-xs" style="color:#94a3b8;">Ditolak</p>  
                <p class="text-sm font-bold font-mono-num leading-none" style="color:#be123c;">{{ $statDitolak }}</p>  
            </div>  
        </div>  
  
        <div class="ml-auto flex items-center gap-1.5 text-xs" style="color:#94a3b8;">  
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                <path d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>  
            </svg>  
            Update: {{ now()->format('H:i') }} WIB  
        </div>  
    </div>  
  
    {{-- ── FILTER BAR ────────────────────────────────── --}}  
    <div data-design-id="filter-bar" class="mk-filter-bar mb-6">  
  
        {{-- Filter Status --}}  
        <div class="flex items-center gap-2">  
            <label class="text-xs font-semibold" style="color:#64748b;">Status:</label>  
            <select x-model="filterStatus" class="text-sm">  
                <option value="">Semua Status</option>  
                <option value="Aktif">Aktif</option>  
                <option value="Selesai">Selesai</option>  
                <option value="Ditinjau">Ditinjau</option>  
                <option value="Ditolak">Ditolak</option>  
            </select>  
        </div>  
  
        <div class="mk-filter-divider"></div>  
  
        {{-- Urutkan --}}  
        <div class="flex items-center gap-2">  
            <label class="text-xs font-semibold" style="color:#64748b;">Urutkan:</label>  
            <select x-model="sortBy" class="text-sm">  
                <option value="terbaru">Terbaru</option>  
                <option value="terlama">Terlama</option>  
                <option value="tester">Tester Terbanyak</option>  
                <option value="progress">Progress Tertinggi</option>  
                <option value="nama">Nama A-Z</option>  
            </select>  
        </div>  
  
        <div class="mk-filter-divider"></div>  
  
        {{-- Cari --}}  
        <div class="relative flex items-center gap-2">  
            <svg class="absolute left-3 w-3.5 h-3.5 pointer-events-none" style="color:#9ca3af;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                <circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/>  
            </svg>  
            <input type="text" placeholder="Cari nama kampanye..."  
                   x-model="cariTeks"  
                   class="pl-9 pr-3 text-sm rounded-xl focus:outline-none w-48"  
                   style="background:#f1f5f9;padding-top:6px;padding-bottom:6px;color:#475569;">  
        </div>  
  
        <div class="mk-filter-divider"></div>  
  
        {{-- Reset --}}  
        <button @click="resetFilter()"  
                class="flex items-center gap-1.5 text-xs font-medium px-3 py-1.5 rounded-xl"  
                style="color:#64748b;background:#f8fafc;border:1px solid #e2e8f0;">  
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                <path d="M6 18L18 6M6 6l12 12"/>  
            </svg>  
            Reset  
        </button>  
  
        {{-- Hasil count --}}  
        <div class="ml-auto text-xs font-medium" style="color:#94a3b8;">  
            Menampilkan  
            <span class="font-mono-num font-bold" style="color:#1e293b;" x-text="filteredCount()"></span>  
            kampanye  
        </div>  
    </div>  
  
    {{-- ── SECTION HEADER ───────────────────────────── --}}  
    <div class="flex items-center justify-between mb-4">  
        <h2 class="text-sm font-semibold" style="color:#1e293b;">  
            <span x-text="filterStatus || 'Semua Kampanye'"></span>  
        </h2>  
        <span class="text-xs font-mono-num px-2.5 py-1 rounded-lg font-semibold"  
              style="background:#eff6ff;color:#2563eb;"  
              x-text="filteredCount() + ' kampanye'">  
        </span>  
    </div>  
  
    {{-- ══════════════════════════════════════════════  
         GRID VIEW  
    ══════════════════════════════════════════════ --}}  
    <div x-show="viewMode === 'grid'"  
         data-design-id="campaign-grid"  
         class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">  
  
        @foreach($kampanyeList as $idx => $k)  
        @php  
            /* Border & warna berdasarkan status */  
            $borderColor = [  
                'Aktif'    => '#2563eb',  
                'Selesai'  => '#16a34a',  
                'Ditinjau' => '#f59e0b',  
                'Ditolak'  => '#ef4444',  
            ][$k['status']] ?? '#94a3b8';  
  
            $dotClass = [  
                'Aktif'    => 'mk-dot-filled-blue',  
                'Selesai'  => 'mk-dot-filled-green',  
                'Ditinjau' => 'mk-dot-filled-amber',  
                'Ditolak'  => 'mk-dot-empty',  
            ][$k['status']] ?? 'mk-dot-empty';  
  
            $progColor = [  
                'Aktif'    => '#2563eb',  
                'Selesai'  => '#16a34a',  
                'Ditinjau' => '#f59e0b',  
                'Ditolak'  => '#ef4444',  
            ][$k['status']] ?? '#94a3b8';  
  
            $pctTester = $k['maxTester'] > 0 ? round($k['tester'] / $k['maxTester'] * 100) : 0;  
        @endphp  
  
        <div data-design-id="card-{{ $idx + 1 }}"  
             class="mk-card"  
             style="border-left: 4px solid {{ $borderColor }};"  
             x-show="tampilKard('{{ $k['status'] }}', '{{ strtolower($k['nama']) }}', '{{ strtolower($k['developer']) }}')">  
            <div class="p-5">  
  
                {{-- App info row --}}  
                <div class="flex items-start justify-between mb-3">  
                    <div class="flex items-center gap-3">  
                        <div class="w-11 h-11 rounded-xl flex items-center justify-center flex-shrink-0 text-lg font-bold text-white"  
                             style="background:{{ $k['ikonGrad'] }};">  
                            {{ $k['ikonHuruf'] }}  
                        </div>  
                        <div>  
                            <p class="text-sm font-semibold font-sora leading-tight" style="color:#1e293b;">{{ $k['nama'] }}</p>  
                            <p class="text-xs mt-0.5" style="color:#64748b;">{{ $k['developer'] }}</p>  
                        </div>  
                    </div>  
                    <span class="mk-badge mk-badge-{{ strtolower($k['status']) }} flex-shrink-0">  
                        <span class="w-1.5 h-1.5 rounded-full" style="background:{{ $borderColor }};"></span>  
                        {{ $k['status'] }}  
                    </span>  
                </div>  
  
                {{-- Tester progress --}}  
                <div class="mb-3">  
                    <div class="flex items-center justify-between mb-1.5">  
                        <span class="text-xs font-medium" style="color:#64748b;">Tester Bergabung</span>  
                        <span class="text-xs font-bold font-mono-num" style="color:#1e293b;">  
                            {{ $k['tester'] }}  
                            <span style="color:#94a3b8;font-weight:400;">/ {{ $k['maxTester'] }}</span>  
                        </span>  
                    </div>  
                    <div class="mk-progress-track h-2 w-full">  
                        <div class="mk-progress-fill h-2"  
                             style="width:{{ $pctTester }}%;background:{{ $progColor }};"></div>  
                    </div>  
                </div>  
  
                {{-- Timeline 14 hari --}}  
                <div class="mb-3">  
                    <div class="flex items-center justify-between mb-2">  
                        <span class="text-xs font-medium" style="color:#64748b;">Timeline 14 Hari</span>  
                        @if($k['hariKe'] > 0)  
                            <span class="text-xs font-mono-num font-semibold" style="color:{{ $progColor }};">  
                                Hari {{ $k['hariKe'] }}  
                            </span>  
                        @elseif($k['status'] === 'Ditinjau')  
                            <span class="text-xs font-mono-num font-semibold" style="color:#b45309;">Menunggu</span>  
                        @else  
                            <span class="text-xs font-mono-num font-semibold" style="color:#94a3b8;">-</span>  
                        @endif  
                    </div>  
                    <div class="flex items-center gap-1">  
                        @for($d = 1; $d <= 14; $d++)  
                            @if($d <= $k['hariKe'])  
                                <div class="mk-dot {{ $dotClass }}"></div>  
                            @else  
                                <div class="mk-dot mk-dot-empty"></div>  
                            @endif  
                        @endfor  
                    </div>  
                </div>  
  
                {{-- Tanggal --}}  
                <div class="flex items-center gap-1.5 mb-4 text-xs font-mono-num" style="color:#94a3b8;">  
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                        <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>  
                    </svg>  
                    {{ $k['mulai'] }} → {{ $k['selesai'] }}  
                </div>  
  
                {{-- Action Buttons --}}  
                <div class="flex items-center gap-2">  
  
                    {{-- Detail (selalu ada) --}}  
                    <button class="flex-1 flex items-center justify-center gap-1.5 py-2 rounded-xl text-xs font-semibold"  
                            style="background:#eff6ff;color:#2563eb;border:1px solid #bfdbfe;"  
                            @click="bukaModal({{ $idx }})">  
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                            <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>  
                            <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>  
                        </svg>  
                        Detail  
                    </button>  
  
                    @if($k['status'] === 'Aktif')  
                    {{-- Pause --}}  
                    <button class="mk-action-btn mk-btn-pause" title="Hentikan Sementara" wire:click="pauseKampanye('{{ $k['id'] }}')" @click.prevent="">  
                        <svg class="w-3.5 h-3.5" style="color:#ef4444;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                            <path d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"/>  
                        </svg>  
                    </button>  
                    {{-- More --}}  
                    <button class="mk-action-btn mk-btn-more" title="Lainnya">  
                        <svg class="w-3.5 h-3.5" style="color:#64748b;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                            <path d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"/>  
                        </svg>  
                    </button>  
  
                    @elseif($k['status'] === 'Ditinjau')  
                    {{-- Approve --}}  
                    <button class="mk-action-btn mk-btn-approve" title="Setujui" wire:click="approveKampanye('{{ $k['id'] }}')" @click.prevent="">  
                        <svg class="w-3.5 h-3.5" style="color:#16a34a;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                            <path d="M5 13l4 4L19 7"/>  
                        </svg>  
                    </button>  
                    {{-- Tolak --}}  
                    <button class="mk-action-btn mk-btn-reject" title="Tolak" wire:click="rejectKampanye('{{ $k['id'] }}')" @click.prevent="">  
                        <svg class="w-3.5 h-3.5" style="color:#ef4444;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                            <path d="M6 18L18 6M6 6l12 12"/>  
                        </svg>  
                    </button>  
  
                    @elseif($k['status'] === 'Selesai')  
                    {{-- Lihat Laporan --}}  
                    <button class="mk-action-btn" style="background:#f0fdf4;border-color:#bbf7d0;" title="Laporan">  
                        <svg class="w-3.5 h-3.5" style="color:#16a34a;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                            <path d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>  
                        </svg>  
                    </button>  
                    @endif  
  
                </div>  
            </div>  
        </div>  
        @endforeach  
  
        {{-- Empty State Grid --}}  
        <div x-show="filteredCount() === 0" x-cloak class="col-span-3">  
            <div class="mk-empty">  
                <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-3" style="background:#f1f5f9;">  
                    <svg class="w-7 h-7" style="color:#94a3b8;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">  
                        <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>  
                    </svg>  
                </div>  
                <p class="text-sm font-semibold" style="color:#475569;">Tidak ada kampanye ditemukan</p>  
                <p class="text-xs mt-1" style="color:#94a3b8;">Coba ubah filter atau kata kunci pencarian</p>  
            </div>  
        </div>  
  
    </div>{{-- end grid --}}  
  
  
    {{-- ══════════════════════════════════════════════  
         LIST VIEW  
    ══════════════════════════════════════════════ --}}  
    <div x-show="viewMode === 'list'"  
         x-cloak  
         class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden mb-6">  
  
        {{-- List Header --}}  
        <div class="flex items-center gap-4 px-5 py-3" style="background:#f8fafc;border-bottom:1px solid #f1f5f9;">  
            <div class="w-56 text-xs font-semibold uppercase tracking-wider" style="color:#94a3b8;letter-spacing:0.06em;">Kampanye</div>  
            <div class="w-24 text-xs font-semibold uppercase tracking-wider" style="color:#94a3b8;">Status</div>  
            <div class="flex-1 text-xs font-semibold uppercase tracking-wider" style="color:#94a3b8;">Tester</div>  
            <div class="w-32 text-xs font-semibold uppercase tracking-wider" style="color:#94a3b8;">Timeline</div>  
            <div class="w-24 text-xs font-semibold uppercase tracking-wider" style="color:#94a3b8;">Paket</div>  
            <div class="w-28 text-xs font-semibold uppercase tracking-wider text-center" style="color:#94a3b8;">Aksi</div>  
        </div>  
  
        @foreach($kampanyeList as $idx => $k)  
        @php  
            $borderColor = ['Aktif'=>'#2563eb','Selesai'=>'#16a34a','Ditinjau'=>'#f59e0b','Ditolak'=>'#ef4444'][$k['status']] ?? '#94a3b8';  
            $pctTester = $k['maxTester'] > 0 ? round($k['tester']/$k['maxTester']*100) : 0;  
            $pctHari   = $k['maxHari']   > 0 ? round($k['hariKe']/$k['maxHari']*100)   : 0;  
        @endphp  
        <div class="mk-list-row"  
             x-show="tampilKard('{{ $k['status'] }}', '{{ strtolower($k['nama']) }}', '{{ strtolower($k['developer']) }}')">  
  
            {{-- App info --}}  
            <div class="flex items-center gap-3 w-56 flex-shrink-0">  
                <div class="w-9 h-9 rounded-xl flex items-center justify-center text-sm font-bold text-white flex-shrink-0"  
                     style="background:{{ $k['ikonGrad'] }};">{{ $k['ikonHuruf'] }}</div>  
                <div class="min-w-0">  
                    <p class="text-sm font-semibold font-sora truncate" style="color:#1e293b;">{{ $k['nama'] }}</p>  
                    <p class="text-xs truncate" style="color:#64748b;">{{ $k['developer'] }}</p>  
                </div>  
            </div>  
  
            {{-- Status --}}  
            <div class="w-24 flex-shrink-0">  
                <span class="mk-badge mk-badge-{{ strtolower($k['status']) }}">{{ $k['status'] }}</span>  
            </div>  
  
            {{-- Tester progress --}}  
            <div class="flex-1">  
                <div class="flex items-center justify-between mb-1">  
                    <span class="text-xs font-mono-num font-semibold" style="color:#1e293b;">  
                        {{ $k['tester'] }}/{{ $k['maxTester'] }}  
                    </span>  
                    <span class="text-xs font-mono-num" style="color:#94a3b8;">{{ $pctTester }}%</span>  
                </div>  
                <div class="mk-progress-track h-1.5 w-full">  
                    <div class="mk-progress-fill h-1.5" style="width:{{ $pctTester }}%;background:{{ $borderColor }};"></div>  
                </div>  
            </div>  
  
            {{-- Timeline --}}  
            <div class="w-32 flex-shrink-0">  
                <div class="flex items-center justify-between mb-1">  
                    <span class="text-xs font-mono-num font-semibold" style="color:#1e293b;">  
                        {{ $k['hariKe'] }}/{{ $k['maxHari'] }}  
                    </span>  
                    <span class="text-xs font-mono-num" style="color:#94a3b8;">{{ $pctHari }}%</span>  
                </div>  
                <div class="mk-progress-track h-1.5 w-full">  
                    <div class="mk-progress-fill h-1.5" style="width:{{ $pctHari }}%;background:{{ $borderColor }};"></div>  
                </div>  
            </div>  
  
            {{-- Paket --}}  
            <div class="w-24 flex-shrink-0">  
                <span class="mk-badge mk-badge-{{ strtolower($k['paket']) }}">{{ $k['paket'] }}</span>  
            </div>  
  
            {{-- Aksi --}}  
            <div class="w-28 flex-shrink-0 flex items-center justify-center gap-1.5">  
                <button class="mk-action-btn mk-btn-detail" @click="bukaModal({{ $idx }})" title="Detail">  
                    <svg class="w-3.5 h-3.5" style="color:#2563eb;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                        <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>  
                        <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>  
                    </svg>  
                </button>  
                @if($k['status'] === 'Ditinjau')  
                <button class="mk-action-btn mk-btn-approve" title="Approve" wire:click="approveKampanye('{{ $k['id'] }}')">  
                    <svg class="w-3.5 h-3.5" style="color:#16a34a;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                        <path d="M5 13l4 4L19 7"/>  
                    </svg>  
                </button>  
                <button class="mk-action-btn mk-btn-reject" title="Tolak" wire:click="rejectKampanye('{{ $k['id'] }}')">  
                    <svg class="w-3.5 h-3.5" style="color:#ef4444;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                        <path d="M6 18L18 6M6 6l12 12"/>  
                    </svg>  
                </button>  
                @elseif($k['status'] === 'Aktif')  
                <button class="mk-action-btn mk-btn-pause" title="Pause" wire:click="pauseKampanye('{{ $k['id'] }}')">  
                    <svg class="w-3.5 h-3.5" style="color:#ef4444;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                        <path d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"/>  
                    </svg>  
                </button>  
                @endif  
            </div>  
  
        </div>  
        @endforeach  
  
    </div>{{-- end list view --}}  
  
</div>{{-- end px-6 py-6 --}}  
  
  
{{-- ══════════════════════════════════════════════════════  
     MODAL DETAIL KAMPANYE — tersembunyi by default  
══════════════════════════════════════════════════════ --}}  
<div class="mk-modal-overlay"  
     x-show="modalTerbuka"  
     x-cloak  
     style="display:none;"  
     x-transition:enter="transition ease-out duration-200"  
     x-transition:enter-start="opacity-0"  
     x-transition:enter-end="opacity-100"  
     x-transition:leave="transition ease-in duration-150"  
     x-transition:leave-start="opacity-100"  
     x-transition:leave-end="opacity-0">  
  
    <div class="mk-modal-backdrop" @click="tutupModal()"></div>  
  
    <div class="mk-modal-box"  
         @click.stop  
         x-show="modalTerbuka"  
         x-transition:enter="transition ease-out duration-200"  
         x-transition:enter-start="opacity-0 scale-95 -translate-y-2"  
         x-transition:enter-end="opacity-100 scale-100 translate-y-0"  
         x-transition:leave="transition ease-in duration-150"  
         x-transition:leave-start="opacity-100 scale-100 translate-y-0"  
         x-transition:leave-end="opacity-0 scale-95 -translate-y-2">  
  
        {{-- Header --}}  
        <div class="mk-modal-header">  
            <div class="flex items-center gap-3">  
                <div class="w-11 h-11 rounded-xl flex items-center justify-center text-lg font-bold text-white flex-shrink-0"  
                     :style="'background:' + (kampanye?.ikonGrad ?? '#94a3b8')">  
                    <span x-text="kampanye?.ikonHuruf ?? ''"></span>  
                </div>  
                <div>  
                    <p class="text-sm font-bold font-sora" style="color:#1e293b;" x-text="kampanye?.nama ?? ''"></p>  
                    <p class="text-xs" style="color:#64748b;" x-text="kampanye?.developer ?? ''"></p>  
                </div>  
            </div>  
            <div class="flex items-center gap-2">  
                <span class="mk-badge"  
                      :class="{  
                          'mk-badge-aktif':    kampanye?.status === 'Aktif',  
                          'mk-badge-selesai':  kampanye?.status === 'Selesai',  
                          'mk-badge-ditinjau': kampanye?.status === 'Ditinjau',  
                          'mk-badge-ditolak':  kampanye?.status === 'Ditolak',  
                      }"  
                      x-text="kampanye?.status ?? ''">  
                </span>  
                <button @click="tutupModal()"  
                        class="w-8 h-8 rounded-lg flex items-center justify-center"  
                        style="background:#f8fafc;border:1px solid #e2e8f0;">  
                    <svg class="w-4 h-4" style="color:#64748b;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                        <path d="M6 18L18 6M6 6l12 12"/>  
                    </svg>  
                </button>  
            </div>  
        </div>  
  
        {{-- Body --}}  
        <div class="mk-modal-body">  
  
            {{-- Progress bars --}}  
            <div class="grid grid-cols-2 gap-4 mb-5 p-4 rounded-xl" style="background:#f8fafc;">  
                <div>  
                    <div class="flex items-center justify-between mb-1.5">  
                        <span class="text-xs font-medium" style="color:#64748b;">Tester</span>  
                        <span class="text-xs font-bold font-mono-num" style="color:#1e293b;"  
                              x-text="(kampanye?.tester ?? 0) + '/' + (kampanye?.maxTester ?? 20)">  
                        </span>  
                    </div>  
                    <div class="mk-progress-track h-2">  
                        <div class="mk-progress-fill h-2" style="background:#2563eb;"  
                             :style="'width:' + Math.round(((kampanye?.tester??0)/(kampanye?.maxTester??20))*100) + '%'">  
                        </div>  
                    </div>  
                </div>  
                <div>  
                    <div class="flex items-center justify-between mb-1.5">  
                        <span class="text-xs font-medium" style="color:#64748b;">Hari</span>  
                        <span class="text-xs font-bold font-mono-num" style="color:#1e293b;"  
                              x-text="(kampanye?.hariKe ?? 0) + '/' + (kampanye?.maxHari ?? 14)">  
                        </span>  
                    </div>  
                    <div class="mk-progress-track h-2">  
                        <div class="mk-progress-fill h-2" style="background:#f59e0b;"  
                             :style="'width:' + Math.round(((kampanye?.hariKe??0)/(kampanye?.maxHari??14))*100) + '%'">  
                        </div>  
                    </div>  
                </div>  
            </div>  
  
            {{-- Detail rows --}}  
            <div class="mk-detail-row">  
                <span class="mk-detail-label">Paket</span>  
                <span class="mk-detail-value">  
                    <span class="mk-badge"  
                          :class="kampanye?.paket === 'Pro' ? 'mk-badge-pro' : 'mk-badge-starter'"  
                          x-text="kampanye?.paket ?? '-'">  
                    </span>  
                </span>  
            </div>  
            <div class="mk-detail-row">  
                <span class="mk-detail-label">Tanggal Mulai</span>  
                <span class="mk-detail-value font-mono-num" x-text="kampanye?.mulai ?? '-'"></span>  
            </div>  
            <div class="mk-detail-row">  
                <span class="mk-detail-label">Tanggal Selesai</span>  
                <span class="mk-detail-value font-mono-num" x-text="kampanye?.selesai ?? '-'"></span>  
            </div>  
            <div class="mk-detail-row">  
                <span class="mk-detail-label">Developer</span>  
                <span class="mk-detail-value" x-text="kampanye?.developer ?? '-'"></span>  
            </div>  
        </div>  
  
        {{-- Footer --}}  
        <div class="mk-modal-footer">  
            <button @click="tutupModal()"  
                    class="px-4 py-2 rounded-xl text-sm font-semibold"  
                    style="background:#f1f5f9;color:#475569;border:1px solid #e2e8f0;">  
                Tutup  
            </button>  
            <template x-if="kampanye?.status === 'Ditinjau'">  
                <div class="flex gap-2">  
                    <button @click="$wire.rejectKampanye(kampanye.id); tutupModal()" class="flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-semibold"  
                            style="background:#fff1f2;color:#ef4444;border:1px solid #fecdd3;">  
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                            <path d="M6 18L18 6M6 6l12 12"/>  
                        </svg>  
                        Tolak  
                    </button>  
                    <button @click="$wire.approveKampanye(kampanye.id); tutupModal()" class="flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-semibold text-white"  
                            style="background:#16a34a;box-shadow:0 4px 12px rgba(22,163,74,0.25);">  
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                            <path d="M5 13l4 4L19 7"/>  
                        </svg>  
                        Setujui  
                    </button>  
                </div>  
            </template>  
            <template x-if="kampanye?.status === 'Aktif'">  
                <button @click="$wire.pauseKampanye(kampanye.id); tutupModal()" class="flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-semibold"  
                        style="background:#fff1f2;color:#ef4444;border:1px solid #fecdd3;">  
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                        <path d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"/>  
                    </svg>  
                    Hentikan Sementara  
                </button>  
            </template>  
        </div>  
  
    </div>  
</div>{{-- end modal --}}  
  
</div>{{-- end Alpine root --}}  
  
  
@push('scripts')  
<script>  
const KAMPANYE_DATA = @json($kampanyeList);  
  
function manajemenKampanye() {  
    return {  
        viewMode     : 'grid',  
        filterStatus : '',  
        sortBy       : 'terbaru',  
        cariTeks     : '',  
        modalTerbuka : false,  
        kampanye     : null,  
  
        /* ── Filter Logic ─────────────── */  
        tampilKard(status, nama, developer) {  
            if (this.filterStatus && status !== this.filterStatus) return false;  
            if (this.cariTeks) {  
                const q = this.cariTeks.toLowerCase();  
                if (!nama.includes(q) && !developer.includes(q)) return false;  
            }  
            return true;  
        },  
  
        filteredCount() {  
            return KAMPANYE_DATA.filter(k =>  
                (!this.filterStatus || k.status === this.filterStatus) &&  
                (!this.cariTeks || k.nama.toLowerCase().includes(this.cariTeks.toLowerCase()) ||  
                 k.developer.toLowerCase().includes(this.cariTeks.toLowerCase()))  
            ).length;  
        },  
  
        resetFilter() {  
            this.filterStatus = '';  
            this.sortBy       = 'terbaru';  
            this.cariTeks     = '';  
        },  
  
        /* ── Modal ────────────────────── */  
        bukaModal(idx) {  
            this.kampanye    = KAMPANYE_DATA[idx] ?? null;  
            this.modalTerbuka = true;  
            document.body.style.overflow = 'hidden';  
        },  
  
        tutupModal() {  
            this.modalTerbuka = false;  
            document.body.style.overflow = '';  
            setTimeout(() => { this.kampanye = null; }, 200);  
        },  
    };  
}  
</script>  
@endpush  
  
</x-filament-panels::page>  