{{--  
    Manajemen Pengguna — PlayTest ID Admin Panel  
    Page   : ManajemenPengguna.php  
    Panel  : Admin (/admin)  
    Fonts  : Sora (heading), JetBrains Mono (angka), Inter (body)  
--}}  
  
<x-filament-panels::page>  
  
@push('styles')  
<link rel="preconnect" href="https://fonts.googleapis.com">  
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">  
  
<style>  
/* ═══════════════════ FONTS ═══════════════════ */  
.mp-page, .mp-page * { font-family: 'Inter', sans-serif; }  
.font-sora     { font-family: 'Sora', sans-serif !important; }  
.font-mono-num { font-family: 'JetBrains Mono', monospace !important; }  
  
/* ═══════════════════ SIDEBAR — Dark #0f172a ═══ */  
.fi-sidebar { background-color: #0f172a !important; border-right: none !important; }  
.fi-sidebar-nav   { background-color: #0f172a !important; }  
.fi-sidebar-header { background-color: #0f172a !important; border-bottom: 1px solid #1e293b !important; }  
.fi-sidebar-group-label {  
    color: #475569 !important; font-size: 0.65rem !important;  
    font-weight: 600 !important; letter-spacing: 0.08em !important; text-transform: uppercase !important;  
}  
.fi-sidebar-item-button { color: #94a3b8 !important; border-radius: 0.75rem !important; transition: all 0.15s ease !important; }  
.fi-sidebar-item-button:hover { background-color: #1e293b !important; color: #cbd5e1 !important; }  
.fi-sidebar-item-icon { color: #94a3b8 !important; }  
.fi-sidebar-item-button:hover .fi-sidebar-item-icon { color: #cbd5e1 !important; }  
.fi-sidebar-item-button.fi-active,  
.fi-sidebar-item-button[aria-current="page"] {  
    background-color: #1e3a5f !important; color: #60a5fa !important;  
    border-left: 3px solid #2563eb !important; border-radius: 0.75rem !important;  
}  
.fi-sidebar-item-button.fi-active .fi-sidebar-item-icon,  
.fi-sidebar-item-button[aria-current="page"] .fi-sidebar-item-icon { color: #60a5fa !important; }  
.fi-sidebar-item-badge {  
    background-color: #1e293b !important; color: #f59e0b !important;  
    font-family: 'JetBrains Mono', monospace !important; font-size: 0.65rem !important; font-weight: 600 !important;  
}  
.fi-sidebar-group { border-color: #1e293b !important; }  
.fi-sidebar-footer { background-color: #0f172a !important; border-top: 1px solid #1e293b !important; }  
.fi-user-menu-trigger {  
    background-color: #1e293b !important; border-radius: 0.75rem !important;  
    padding: 8px 12px !important; border: none !important; width: 100% !important;  
}  
.fi-user-menu-trigger:hover { background-color: #334155 !important; }  
.fi-user-menu-trigger-name  { color: #f1f5f9 !important; font-weight: 600 !important; }  
.fi-user-menu-trigger-email { color: #64748b !important; font-size: 0.7rem !important; }  
.fi-avatar { background-color: #2563eb !important; color: #ffffff !important; font-weight: 700 !important; font-size: 0.7rem !important; }  
  
/* ═══════════════════ TOPBAR ═══════════════════ */  
.fi-topbar { background-color: #ffffff !important; border-bottom: 1px solid #f1f5f9 !important; box-shadow: none !important; }  
.fi-breadcrumbs-item-label { color: #94a3b8 !important; }  
.fi-breadcrumbs li:last-child .fi-breadcrumbs-item-label { color: #1e293b !important; font-weight: 600 !important; }  
.fi-main { background-color: #f8fafc !important; }  
.fi-page { padding: 0 !important; }  
.fi-page-header-heading { display: none !important; }  
  
/* ═══════════════════ STAT CARDS ═══════════════ */  
.mp-stat-card {  
    background: #ffffff; border-radius: 1rem; padding: 1rem;  
    box-shadow: 0 1px 3px rgba(0,0,0,0.06); border: 1px solid #f1f5f9;  
    display: flex; align-items: center; gap: 0.75rem;  
    transition: box-shadow 0.2s ease, transform 0.2s ease;  
}  
.mp-stat-card:hover { box-shadow: 0 4px 12px rgba(0,0,0,0.08); transform: translateY(-1px); }  
.mp-stat-icon {  
    width: 40px; height: 40px; border-radius: 0.75rem;  
    display: flex; align-items: center; justify-content: center; flex-shrink: 0;  
}  
  
/* ═══════════════════ TABLE CARD ══════════════ */  
.mp-table-card {  
    background: #ffffff; border-radius: 1rem;  
    box-shadow: 0 1px 3px rgba(0,0,0,0.06); border: 1px solid #f1f5f9; overflow: hidden;  
}  
  
/* ═══════════════════ FILTER TABS ══════════════ */  
.mp-filter-tab {  
    display: inline-flex; align-items: center; gap: 6px;  
    padding: 14px 16px; font-size: 0.875rem; font-weight: 500;  
    cursor: pointer; transition: all 0.15s ease; border-bottom: 2px solid transparent;  
    white-space: nowrap; background: transparent; border-top: none; border-left: none; border-right: none;  
}  
.mp-filter-tab.active { color: #1e293b; border-bottom-color: #1e293b; font-weight: 600; }  
.mp-filter-tab.inactive { color: #64748b; }  
.mp-filter-tab.inactive:hover { color: #475569; }  
.mp-count-badge {  
    font-size: 0.65rem; font-weight: 600; padding: 2px 7px;  
    border-radius: 9999px; font-family: 'JetBrains Mono', monospace;  
}  
  
/* ═══════════════════ TABLE ═══════════════════ */  
.mp-table { width: 100%; border-collapse: collapse; }  
.mp-table th {  
    background: #f8fafc; padding: 0.75rem 1.25rem; font-size: 0.7rem;  
    font-weight: 600; color: #94a3b8; text-transform: uppercase;  
    letter-spacing: 0.06em; text-align: left; border-bottom: 1px solid #f1f5f9;  
}  
.mp-table th.text-center { text-align: center; }  
.mp-table td { padding: 0.875rem 1.25rem; border-bottom: 1px solid #f8fafc; vertical-align: middle; }  
.mp-table tr:hover td { background-color: #f8fafc; }  
.mp-table tr:last-child td { border-bottom: none; }  
  
/* ═══════════════════ BADGES ══════════════════ */  
.mp-badge {  
    display: inline-flex; align-items: center; gap: 5px;  
    padding: 4px 10px; border-radius: 0.5rem;  
    font-size: 0.7rem; font-weight: 600; white-space: nowrap;  
}  
.mp-badge-developer { background: #dbeafe; color: #1d4ed8; }  
.mp-badge-tester    { background: #dcfce7; color: #16a34a; }  
.mp-badge-aktif     { background: #f0fdf4; color: #15803d; }  
.mp-badge-pending   { background: #fffbeb; color: #b45309; }  
.mp-badge-suspend   { background: #fff1f2; color: #be123c; }  
  
/* ═══════════════════ ACTION BUTTONS ═══════════ */  
.mp-action-btn {  
    position: relative; width: 32px; height: 32px; border-radius: 0.5rem;  
    display: inline-flex; align-items: center; justify-content: center;  
    cursor: pointer; transition: all 0.15s ease; border: 1px solid transparent;  
}  
.mp-action-btn .mp-tooltip {  
    display: none; position: absolute; bottom: calc(100% + 6px); left: 50%;  
    transform: translateX(-50%); background: #1e293b; color: #fff;  
    font-size: 0.65rem; padding: 3px 8px; border-radius: 6px;  
    white-space: nowrap; pointer-events: none; z-index: 50;  
}  
.mp-action-btn:hover .mp-tooltip { display: block; }  
.mp-action-detail   { background: #f8fafc; border-color: #e2e8f0; }  
.mp-action-detail:hover { background: #f1f5f9; }  
.mp-action-approve  { background: #f0fdf4; border-color: #bbf7d0; }  
.mp-action-approve:hover { background: #dcfce7; }  
.mp-action-danger   { background: #fff1f2; border-color: #fecdd3; }  
.mp-action-danger:hover { background: #ffe4e6; }  
.mp-action-reactive { background: #f0fdf4; border-color: #bbf7d0; }  
.mp-action-reactive:hover { background: #dcfce7; }  
  
/* ═══════════════════ PAGINATION ══════════════ */  
.mp-pagination-btn {  
    width: 32px; height: 32px; border-radius: 0.5rem; display: inline-flex;  
    align-items: center; justify-content: center; font-size: 0.8125rem; font-weight: 500;  
    cursor: pointer; transition: all 0.15s ease; border: 1px solid #e2e8f0;  
}  
.mp-pagination-btn.active { background: #2563eb; color: #ffffff; border-color: #2563eb; }  
.mp-pagination-btn.inactive { background: #ffffff; color: #64748b; }  
.mp-pagination-btn.inactive:hover { background: #f1f5f9; color: #1e293b; }  
  
/* ═══════════════════ MODAL ═══════════════════ */  
.mp-modal-overlay {  
    position: fixed; inset: 0; z-index: 9999;  
    display: flex; align-items: center; justify-content: center;  
    padding: 1rem;  
}  
.mp-modal-backdrop {  
    position: absolute; inset: 0;  
    background: rgba(15, 23, 42, 0.6); backdrop-filter: blur(4px);  
}  
.mp-modal-box {  
    position: relative; z-index: 1;  
    background: #ffffff; border-radius: 1.25rem;  
    box-shadow: 0 25px 60px rgba(0,0,0,0.2);  
    width: 100%; max-width: 520px; overflow: hidden;  
}  
.mp-modal-header {  
    display: flex; align-items: center; justify-content: space-between;  
    padding: 1.25rem 1.5rem; border-bottom: 1px solid #f1f5f9;  
}  
.mp-modal-body   { padding: 1.5rem; }  
.mp-modal-footer {  
    display: flex; align-items: center; justify-content: flex-end; gap: 0.75rem;  
    padding: 1rem 1.5rem; border-top: 1px solid #f1f5f9; background: #f8fafc;  
}  
.mp-detail-row {  
    display: flex; align-items: flex-start; gap: 0.75rem;  
    padding: 0.625rem 0; border-bottom: 1px solid #f8fafc;  
}  
.mp-detail-row:last-child { border-bottom: none; }  
.mp-detail-label { font-size: 0.75rem; color: #94a3b8; font-weight: 500; width: 120px; flex-shrink: 0; padding-top: 1px; }  
.mp-detail-value { font-size: 0.8125rem; color: #1e293b; font-weight: 500; flex: 1; }  
</style>  
@endpush  
  
{{-- ══════════════════════════════════════════════════════  
     ALPINE ROOT — seluruh halaman  
══════════════════════════════════════════════════════ --}}  
<div class="mp-page"  
     x-data="manajemenPengguna()"  
     x-init="init()"  
     @keydown.escape.window="tutupModal()">  
  
    <div class="px-6 py-6">  
  
        {{-- ── PAGE HEADER ─────────────────────────────────────── --}}  
        <div data-design-id="page-header" class="flex items-center justify-between mb-6">  
            <div>  
                <h1 class="text-xl font-bold font-sora" style="color:#1e293b;">Manajemen Pengguna</h1>  
                <p class="text-sm mt-0.5" style="color:#64748b;">  
                    Kelola semua Developer dan Tester yang terdaftar di platform  
                </p>  
            </div>  
            <button class="flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-semibold text-white"  
                    style="background:#2563eb;box-shadow:0 4px 14px rgba(37,99,235,0.25);">  
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">  
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17v3a2 2 0 002 2h14a2 2 0 002-2v-3"/>  
                </svg>  
                Export CSV  
            </button>  
        </div>  
  
        {{-- ── STAT CARDS — 4 kolom ────────────────────────────── --}}  
        <div data-design-id="stats-row" class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">  
  
            {{-- Total Pengguna --}}  
            <div class="mp-stat-card">  
                <div class="mp-stat-icon" style="background:#eff6ff;">  
                    <svg class="w-5 h-5" style="color:#2563eb;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/>  
                        <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>  
                    </svg>  
                </div>  
                <div>  
                    <p class="text-xs font-medium" style="color:#94a3b8;">Total Pengguna</p>  
                    <p class="text-2xl font-bold font-mono-num leading-none mt-0.5" style="color:#1e293b;">{{ $statTotal }}</p>  
                </div>  
            </div>  
  
            {{-- Developer --}}  
            <div class="mp-stat-card">  
                <div class="mp-stat-icon" style="background:#eff6ff;">  
                    <svg class="w-5 h-5" style="color:#2563eb;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                        <path d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>  
                    </svg>  
                </div>  
                <div>  
                    <p class="text-xs font-medium" style="color:#94a3b8;">Developer</p>  
                    <p class="text-2xl font-bold font-mono-num leading-none mt-0.5" style="color:#1e293b;">{{ $statDeveloper }}</p>  
                </div>  
            </div>  
  
            {{-- Tester --}}  
            <div class="mp-stat-card">  
                <div class="mp-stat-icon" style="background:#f0fdf4;">  
                    <svg class="w-5 h-5" style="color:#10b981;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                        <path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>  
                    </svg>  
                </div>  
                <div>  
                    <p class="text-xs font-medium" style="color:#94a3b8;">Tester</p>  
                    <p class="text-2xl font-bold font-mono-num leading-none mt-0.5" style="color:#1e293b;">{{ $statTester }}</p>  
                </div>  
            </div>  
  
            {{-- Pending Approval --}}  
            <div class="mp-stat-card">  
                <div class="mp-stat-icon" style="background:#fffbeb;">  
                    <svg class="w-5 h-5" style="color:#f59e0b;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                        <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>  
                    </svg>  
                </div>  
                <div>  
                    <p class="text-xs font-medium" style="color:#94a3b8;">Menunggu Approval</p>  
                    <p class="text-2xl font-bold font-mono-num leading-none mt-0.5" style="color:#f59e0b;">{{ $statPending }}</p>  
                </div>  
            </div>  
  
        </div>{{-- end stats --}}  
  
  
        {{-- ══════════════════════════════════════  
             TABLE CARD  
        ══════════════════════════════════════ --}}  
        <div data-design-id="table-card" class="mp-table-card">  
  
            {{-- Filter Tabs + Search ─────────────────────── --}}  
            <div style="border-bottom:1px solid #f1f5f9;">  
                <div class="flex items-center px-5 flex-wrap gap-0">  
  
                    {{-- Filter Tabs --}}  
                    <button class="mp-filter-tab" :class="filterAktif === 'semua' ? 'active' : 'inactive'"  
                            @click="setFilter('semua')">  
                        Semua  
                        <span class="mp-count-badge" style="background:#f1f5f9;color:#64748b;">{{ $statTotal }}</span>  
                    </button>  
                    <button class="mp-filter-tab" :class="filterAktif === 'developer' ? 'active' : 'inactive'"  
                            @click="setFilter('developer')">  
                        Developer  
                        <span class="mp-count-badge" style="background:#eff6ff;color:#2563eb;">{{ $statDeveloper }}</span>  
                    </button>  
                    <button class="mp-filter-tab" :class="filterAktif === 'tester' ? 'active' : 'inactive'"  
                            @click="setFilter('tester')">  
                        Tester  
                        <span class="mp-count-badge" style="background:#f0fdf4;color:#16a34a;">{{ $statTester }}</span>  
                    </button>  
                    <button class="mp-filter-tab" :class="filterAktif === 'pending' ? 'active' : 'inactive'"  
                            @click="setFilter('pending')">  
                        Pending  
                        <span class="mp-count-badge" style="background:#fffbeb;color:#b45309;">{{ $statPending }}</span>  
                    </button>  
  
                    {{-- Spacer + Search/Filter Controls --}}  
                    <div class="ml-auto flex items-center gap-2 py-2 flex-wrap">  
                        {{-- Search --}}  
                        <div class="relative">  
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-3.5 h-3.5"  
                                 style="color:#9ca3af;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                                <circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/>  
                            </svg>  
                            <input type="text" placeholder="Cari nama atau email..."  
                                   x-model="cariTeks"  
                                   class="pl-9 pr-4 py-2 text-sm rounded-xl focus:outline-none w-52"  
                                   style="background:#f8fafc;border:1px solid #f1f5f9;color:#475569;">  
                        </div>  
  
                        {{-- Filter Status --}}  
                        <select x-model="filterStatus"  
                                class="px-3 py-2 text-sm rounded-xl focus:outline-none"  
                                style="background:#f8fafc;border:1px solid #f1f5f9;color:#64748b;cursor:pointer;">  
                            <option value="">Semua Status</option>  
                            <option value="Aktif">Aktif</option>  
                            <option value="Pending">Pending</option>  
                            <option value="Suspend">Suspend</option>  
                        </select>  
  
                        {{-- Reset --}}  
                        <button @click="resetFilter()"  
                                class="flex items-center gap-1.5 text-xs font-medium px-3 py-2 rounded-xl transition-colors"  
                                style="color:#64748b;background:#f8fafc;border:1px solid #e2e8f0;">  
                            Reset  
                        </button>  
                    </div>  
                </div>  
            </div>  
  
            {{-- Table ───────────────────────────────────── --}}  
            <div class="overflow-x-auto">  
                <table class="mp-table">  
                    <thead>  
                        <tr>  
                            <th style="width:35%;">Pengguna</th>  
                            <th>Role</th>  
                            <th>Tanggal Daftar</th>  
                            <th>Status</th>  
                            <th class="text-center">Kampanye</th>  
                            <th class="text-center">Aksi</th>  
                        </tr>  
                    </thead>  
                    <tbody>  
                        @foreach($penggunaList as $idx => $user)  
                        {{-- x-show filter berdasarkan filterAktif, cariTeks, filterStatus --}}  
                        <tr data-design-id="table-row-{{ $idx + 1 }}"  
                            data-role="{{ strtolower($user['role']) }}"  
                            data-status="{{ strtolower($user['status']) }}"  
                            data-nama="{{ strtolower($user['nama']) }}"  
                            data-email="{{ strtolower($user['email']) }}"  
                            x-show="tampilRow($el)"  
                            style="border-bottom:1px solid #f1f5f9;">  
  
                            {{-- Avatar + Nama + Email --}}  
                            <td>  
                                <div class="flex items-center gap-3">  
                                    <div class="w-9 h-9 rounded-full flex items-center justify-center text-sm font-bold text-white flex-shrink-0"  
                                         style="background:{{ $user['avatarColor'] }};">  
                                        {{ $user['inisial'] }}  
                                    </div>  
                                    <div>  
                                        <p class="text-sm font-semibold" style="color:{{ $user['status'] === 'Suspend' ? '#94a3b8' : '#1e293b' }};">  
                                            {{ $user['nama'] }}  
                                        </p>  
                                        <p class="text-xs" style="color:#94a3b8;">{{ $user['email'] }}</p>  
                                    </div>  
                                </div>  
                            </td>  
  
                            {{-- Role Badge --}}  
                            <td>  
                                <span class="mp-badge mp-badge-{{ strtolower($user['role']) }}">  
                                    {{ $user['role'] }}  
                                </span>  
                            </td>  
  
                            {{-- Tanggal --}}  
                            <td>  
                                <span class="text-sm font-mono-num" style="color:{{ $user['status'] === 'Suspend' ? '#94a3b8' : '#64748b' }};">  
                                    {{ $user['tanggal'] }}  
                                </span>  
                            </td>  
  
                            {{-- Status Badge --}}  
                            <td>  
                                @php  
                                    $dotColor = ['Aktif' => '#10b981', 'Pending' => '#f59e0b', 'Suspend' => '#ef4444'][$user['status']] ?? '#94a3b8';  
                                @endphp  
                                <span class="mp-badge mp-badge-{{ strtolower($user['status']) }}">  
                                    <span class="w-1.5 h-1.5 rounded-full flex-shrink-0" style="background:{{ $dotColor }};"></span>  
                                    {{ $user['status'] }}  
                                </span>  
                            </td>  
  
                            {{-- Kampanye Count --}}  
                            <td class="text-center">  
                                <span class="text-sm font-semibold font-mono-num"  
                                      style="color:{{ $user['status'] === 'Suspend' ? '#94a3b8' : '#1e293b' }};">  
                                    {{ $user['kampanye'] }}  
                                </span>  
                            </td>  
  
                            {{-- Aksi --}}  
                            <td>  
                                <div class="flex items-center justify-center gap-1.5">  
  
                                    {{-- Detail (selalu ada) --}}  
                                    <button class="mp-action-btn mp-action-detail"  
                                            @click="bukaModal({{ $idx }})">  
                                        <svg class="w-4 h-4" style="color:#64748b;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                                            <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>  
                                            <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>  
                                        </svg>  
                                        <span class="mp-tooltip">Lihat Detail</span>  
                                    </button>  
  
                                    @if($user['status'] === 'Aktif')  
                                    {{-- Suspend --}}  
                                    <button class="mp-action-btn mp-action-danger">  
                                        <svg class="w-4 h-4" style="color:#ef4444;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                                            <path d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>  
                                        </svg>  
                                        <span class="mp-tooltip">Suspend</span>  
                                    </button>  
  
                                    @elseif($user['status'] === 'Pending')  
                                    {{-- Approve --}}  
                                    <button class="mp-action-btn mp-action-approve">  
                                        <svg class="w-4 h-4" style="color:#16a34a;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                                            <path d="M5 13l4 4L19 7"/>  
                                        </svg>  
                                        <span class="mp-tooltip">Approve</span>  
                                    </button>  
                                    {{-- Tolak --}}  
                                    <button class="mp-action-btn mp-action-danger">  
                                        <svg class="w-4 h-4" style="color:#ef4444;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                                            <path d="M6 18L18 6M6 6l12 12"/>  
                                        </svg>  
                                        <span class="mp-tooltip">Tolak</span>  
                                    </button>  
  
                                    @elseif($user['status'] === 'Suspend')  
                                    {{-- Aktifkan Kembali --}}  
                                    <button class="mp-action-btn mp-action-reactive">  
                                        <svg class="w-4 h-4" style="color:#16a34a;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                                            <path d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>  
                                        </svg>  
                                        <span class="mp-tooltip">Aktifkan Kembali</span>  
                                    </button>  
                                    @endif  
  
                                </div>  
                            </td>  
                        </tr>  
                        @endforeach  
                    </tbody>  
                </table>  
  
                {{-- Empty State --}}  
                <div x-show="!adaHasil()"  
                     x-cloak  
                     class="flex flex-col items-center justify-center py-16 text-center">  
                    <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-3" style="background:#f1f5f9;">  
                        <svg class="w-7 h-7" style="color:#94a3b8;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">  
                            <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/>  
                        </svg>  
                    </div>  
                    <p class="text-sm font-semibold" style="color:#475569;">Tidak ada pengguna ditemukan</p>  
                    <p class="text-xs mt-1" style="color:#94a3b8;">Coba ubah filter atau kata kunci pencarian</p>  
                </div>  
            </div>  
  
            {{-- Pagination Footer ────────────────────── --}}  
            <div class="flex items-center justify-between px-5 py-3.5" style="border-top:1px solid #f1f5f9;">  
                <p class="text-xs" style="color:#64748b;">  
                    Menampilkan <span class="font-semibold font-mono-num" style="color:#1e293b;">1–{{ count($penggunaList) }}</span>  
                    dari <span class="font-semibold font-mono-num" style="color:#1e293b;">{{ $statTotal }}</span> pengguna  
                </p>  
                <div class="flex items-center gap-1.5">  
                    <button class="mp-pagination-btn inactive">  
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                            <path d="M15 18l-6-6 6-6"/>  
                        </svg>  
                    </button>  
                    <button class="mp-pagination-btn active">1</button>  
                    <button class="mp-pagination-btn inactive">2</button>  
                    <button class="mp-pagination-btn inactive">3</button>  
                    <span class="text-xs" style="color:#94a3b8;">...</span>  
                    <button class="mp-pagination-btn inactive">8</button>  
                    <button class="mp-pagination-btn inactive">  
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                            <path d="M9 18l6-6-6-6"/>  
                        </svg>  
                    </button>  
                </div>  
            </div>  
  
        </div>{{-- end table card --}}  
  
    </div>{{-- end px-6 py-6 --}}  
  
  
    {{-- ══════════════════════════════════════════════════════  
         MODAL DETAIL PENGGUNA — tersembunyi by default  
    ══════════════════════════════════════════════════════ --}}  
    <div class="mp-modal-overlay"  
         x-show="modalTerbuka"  
         x-cloak  
         style="display:none;"  
         @keydown.escape.window="tutupModal()"  
         x-transition:enter="transition ease-out duration-200"  
         x-transition:enter-start="opacity-0"  
         x-transition:enter-end="opacity-100"  
         x-transition:leave="transition ease-in duration-150"  
         x-transition:leave-start="opacity-100"  
         x-transition:leave-end="opacity-0">  
  
        {{-- Backdrop --}}  
        <div class="mp-modal-backdrop" @click="tutupModal()"></div>  
  
        {{-- Modal Box --}}  
        <div class="mp-modal-box"  
             @click.stop  
             x-show="modalTerbuka"  
             x-transition:enter="transition ease-out duration-200"  
             x-transition:enter-start="opacity-0 scale-95 -translate-y-2"  
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"  
             x-transition:leave="transition ease-in duration-150"  
             x-transition:leave-start="opacity-100 scale-100 translate-y-0"  
             x-transition:leave-end="opacity-0 scale-95 -translate-y-2">  
  
            {{-- Header --}}  
            <div class="mp-modal-header">  
                <div class="flex items-center gap-3">  
                    <div class="w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold text-white flex-shrink-0"  
                         :style="'background:' + (pengguna?.avatarColor ?? '#94a3b8')">  
                        <span x-text="pengguna?.inisial ?? ''"></span>  
                    </div>  
                    <div>  
                        <p class="text-sm font-bold font-sora" style="color:#1e293b;" x-text="pengguna?.nama ?? ''"></p>  
                        <p class="text-xs" style="color:#64748b;" x-text="pengguna?.email ?? ''"></p>  
                    </div>  
                </div>  
                <button @click="tutupModal()"  
                        class="w-8 h-8 rounded-lg flex items-center justify-center transition-colors"  
                        style="background:#f8fafc;border:1px solid #e2e8f0;">  
                    <svg class="w-4 h-4" style="color:#64748b;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                        <path d="M6 18L18 6M6 6l12 12"/>  
                    </svg>  
                </button>  
            </div>  
  
            {{-- Body --}}  
            <div class="mp-modal-body">  
                <div class="mp-detail-row">  
                    <span class="mp-detail-label">Role</span>  
                    <span class="mp-detail-value">  
                        <span class="mp-badge"  
                              :class="pengguna?.role === 'Developer' ? 'mp-badge-developer' : 'mp-badge-tester'"  
                              x-text="pengguna?.role ?? ''">  
                        </span>  
                    </span>  
                </div>  
                <div class="mp-detail-row">  
                    <span class="mp-detail-label">Status</span>  
                    <span class="mp-detail-value">  
                        <span class="mp-badge"  
                              :class="{  
                                  'mp-badge-aktif':   pengguna?.status === 'Aktif',  
                                  'mp-badge-pending': pengguna?.status === 'Pending',  
                                  'mp-badge-suspend': pengguna?.status === 'Suspend'  
                              }"  
                              x-text="pengguna?.status ?? ''">  
                        </span>  
                    </span>  
                </div>  
                <div class="mp-detail-row">  
                    <span class="mp-detail-label">Tanggal Daftar</span>  
                    <span class="mp-detail-value font-mono-num" x-text="pengguna?.tanggal ?? ''"></span>  
                </div>  
                <div class="mp-detail-row">  
                    <span class="mp-detail-label">Nomor HP</span>  
                    <span class="mp-detail-value font-mono-num" x-text="pengguna?.phone ?? '-'"></span>  
                </div>  
                <div class="mp-detail-row">  
                    <span class="mp-detail-label">Kota</span>  
                    <span class="mp-detail-value" x-text="pengguna?.kota ?? '-'"></span>  
                </div>  
                <div class="mp-detail-row">  
                    <span class="mp-detail-label">Total Kampanye</span>  
                    <span class="mp-detail-value font-mono-num font-bold" style="color:#1e293b;" x-text="pengguna?.kampanye ?? 0"></span>  
                </div>  
            </div>  
  
            {{-- Footer Actions --}}  
            <div class="mp-modal-footer">  
                <button @click="tutupModal()"  
                        class="px-4 py-2 rounded-xl text-sm font-semibold transition-colors"  
                        style="background:#f1f5f9;color:#475569;border:1px solid #e2e8f0;">  
                    Tutup  
                </button>  
  
                <template x-if="pengguna?.status === 'Pending'">  
                    <div class="flex gap-2">  
                        <button class="flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-semibold"  
                                style="background:#fff1f2;color:#ef4444;border:1px solid #fecdd3;">  
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                                <path d="M6 18L18 6M6 6l12 12"/>  
                            </svg>  
                            Tolak  
                        </button>  
                        <button class="flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-semibold text-white"  
                                style="background:#16a34a;box-shadow:0 4px 12px rgba(22,163,74,0.25);">  
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                                <path d="M5 13l4 4L19 7"/>  
                            </svg>  
                            Approve  
                        </button>  
                    </div>  
                </template>  
  
                <template x-if="pengguna?.status === 'Aktif'">  
                    <button class="flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-semibold"  
                            style="background:#fff1f2;color:#ef4444;border:1px solid #fecdd3;">  
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                            <path d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>  
                        </svg>  
                        Suspend Akun  
                    </button>  
                </template>  
  
                <template x-if="pengguna?.status === 'Suspend'">  
                    <button class="flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-semibold text-white"  
                            style="background:#2563eb;box-shadow:0 4px 12px rgba(37,99,235,0.25);">  
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">  
                            <path d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>  
                        </svg>  
                        Aktifkan Kembali  
                    </button>  
                </template>  
            </div>  
  
        </div>{{-- end modal-box --}}  
    </div>{{-- end modal-overlay --}}  
  
</div>{{-- end Alpine root --}}  
  
  
@push('scripts')  
<script>  
/* ──────────────────────────────────────────────  
   Data pengguna dari PHP → JavaScript  
──────────────────────────────────────────────── */  
const PENGGUNA_DATA = @json($penggunaList);  
  
function manajemenPengguna() {  
    return {  
        /* State filter */  
        filterAktif  : 'semua',  
        cariTeks     : '',  
        filterStatus : '',  
  
        /* State modal */  
        modalTerbuka : false,  
        pengguna     : null,  /* data pengguna yang sedang dibuka */  
  
        /* ── Init ─────────────────────────── */  
        init() {  
            /* prevent modal flash on load */  
            document.body.style.overflow = '';  
        },  
  
        /* ── Filter Tabs ──────────────────── */  
        setFilter(val) {  
            this.filterAktif = val;  
            /* Sync filterStatus ke dropdown jika perlu */  
            if (val === 'pending') this.filterStatus = 'Pending';  
            else this.filterStatus = '';  
        },  
  
        resetFilter() {  
            this.filterAktif  = 'semua';  
            this.cariTeks     = '';  
            this.filterStatus = '';  
        },  
  
        /* ── Tampilkan row berdasarkan filter ─ */  
        tampilRow(el) {  
            const role   = el.dataset.role   ?? '';  
            const status = el.dataset.status ?? '';  
            const nama   = el.dataset.nama   ?? '';  
            const email  = el.dataset.email  ?? '';  
  
            /* filter tab */  
            if (this.filterAktif === 'developer' && role !== 'developer') return false;  
            if (this.filterAktif === 'tester'    && role !== 'tester')    return false;  
            if (this.filterAktif === 'pending'   && status !== 'pending') return false;  
  
            /* filter dropdown status */  
            if (this.filterStatus && status !== this.filterStatus.toLowerCase()) return false;  
  
            /* cari teks */  
            if (this.cariTeks) {  
                const q = this.cariTeks.toLowerCase();  
                if (!nama.includes(q) && !email.includes(q)) return false;  
            }  
  
            return true;  
        },  
  
        /* ── Cek apakah ada hasil ─────────── */  
        adaHasil() {  
            return document.querySelectorAll(  
                'tbody tr[data-role][style*="display: none"]'  
            ).length < document.querySelectorAll('tbody tr[data-role]').length;  
        },  
  
        /* ── Modal ────────────────────────── */  
        bukaModal(idx) {  
            this.pengguna    = PENGGUNA_DATA[idx] ?? null;  
            this.modalTerbuka = true;  
            document.body.style.overflow = 'hidden';  
        },  
  
        tutupModal() {  
            this.modalTerbuka = false;  
            document.body.style.overflow = '';  
            /* delay reset data supaya animasi close selesai */  
            setTimeout(() => { this.pengguna = null; }, 200);  
        },  
    };  
}  
</script>  
@endpush  
  
</x-filament-panels::page>  