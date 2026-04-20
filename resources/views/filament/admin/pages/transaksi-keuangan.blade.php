<x-filament-panels::page>  
  
@push('styles')  
<link rel="preconnect" href="https://fonts.googleapis.com">  
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;600&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">  
<style>  
/* ══════════════════════════════════════════════  
   FONT  
══════════════════════════════════════════════ */  
body, .fi-main, .fi-simple-main { font-family: 'Inter', sans-serif !important; }  
.tk-sora  { font-family: 'Sora', sans-serif !important; }  
.tk-mono  { font-family: 'JetBrains Mono', monospace !important; }  
  

  
/* ══════════════════════════════════════════════  
   PAGE BACKGROUND  
══════════════════════════════════════════════ */  
.fi-main { background-color: #f8fafc !important; }  
  
/* ══════════════════════════════════════════════  
   X-CLOAK  
══════════════════════════════════════════════ */  
[x-cloak] { display: none !important; }  
  
/* ══════════════════════════════════════════════  
   STAT CARDS  
══════════════════════════════════════════════ */  
.tk-stat {  
    background: #fff;  
    border-radius: 14px;  
    padding: 18px 20px;  
    border: 1px solid #e2e8f0;  
    position: relative;  
    overflow: hidden;  
    transition: box-shadow .2s;  
}  
.tk-stat:hover { box-shadow: 0 4px 20px rgba(0,0,0,.08); }  
.tk-stat-accent {  
    position: absolute;  
    top: 0; left: 0; right: 0;  
    height: 3px;  
}  
.tk-stat-icon {  
    width: 40px; height: 40px;  
    border-radius: 10px;  
    display: flex; align-items: center; justify-content: center;  
    font-size: 1.1rem;  
    flex-shrink: 0;  
}  
.tk-stat-label { font-size: .72rem; color: #64748b; font-weight: 500; text-transform: uppercase; letter-spacing: .06em; }  
.tk-stat-value { font-size: 1.4rem; font-weight: 800; color: #0f172a; line-height: 1.1; }  
.tk-stat-sub   { font-size: .72rem; color: #94a3b8; margin-top: 2px; }  
.tk-growth     { font-size: .7rem; font-weight: 600; padding: 2px 7px; border-radius: 20px; }  
  
/* ══════════════════════════════════════════════  
   CHART  
══════════════════════════════════════════════ */  
.tk-chart-bar-wrap {  
    display: flex;  
    flex-direction: column;  
    align-items: center;  
    flex: 1;  
    gap: 4px;  
}  
.tk-chart-bar-outer {  
    width: 100%;  
    height: 120px;  
    display: flex;  
    align-items: flex-end;  
    justify-content: center;  
}  
.tk-chart-bar {  
    width: 80%;  
    border-radius: 6px 6px 0 0;  
    background: linear-gradient(to top, #1d4ed8, #60a5fa);  
    height: 0;  
    transition: height 1s cubic-bezier(.4,0,.2,1);  
    position: relative;  
    cursor: pointer;  
}  
.tk-chart-bar:hover { opacity: .8; }  
.tk-chart-bar-tooltip {  
    position: absolute;  
    top: -32px;  
    left: 50%;  
    transform: translateX(-50%);  
    background: #0f172a;  
    color: #fff;  
    font-size: .65rem;  
    padding: 3px 7px;  
    border-radius: 6px;  
    white-space: nowrap;  
    opacity: 0;  
    pointer-events: none;  
    transition: opacity .15s;  
}  
.tk-chart-bar:hover .tk-chart-bar-tooltip { opacity: 1; }  
.tk-chart-label { font-size: .7rem; color: #94a3b8; font-weight: 500; }  
.tk-chart-active .tk-chart-bar { background: linear-gradient(to top, #f59e0b, #fcd34d) !important; }  
  
/* ══════════════════════════════════════════════  
   FILTER BAR  
══════════════════════════════════════════════ */  
.tk-filter-bar {  
    background: #fff;  
    border: 1px solid #e2e8f0;  
    border-radius: 12px;  
    padding: 14px 18px;  
    display: flex;  
    flex-wrap: wrap;  
    gap: 10px;  
    align-items: center;  
}  
.tk-input, .tk-select {  
    border: 1px solid #e2e8f0;  
    border-radius: 8px;  
    padding: 7px 12px;  
    font-size: .82rem;  
    color: #334155;  
    background: #f8fafc;  
    outline: none;  
    transition: border-color .15s;  
    font-family: 'Inter', sans-serif;  
}  
.tk-input:focus, .tk-select:focus { border-color: #2563eb; background: #fff; }  
.tk-btn {  
    padding: 7px 16px;  
    border-radius: 8px;  
    font-size: .82rem;  
    font-weight: 600;  
    cursor: pointer;  
    border: none;  
    transition: all .15s;  
    font-family: 'Inter', sans-serif;  
}  
.tk-btn-primary { background: #2563eb; color: #fff; }  
.tk-btn-primary:hover { background: #1d4ed8; }  
.tk-btn-ghost { background: #f1f5f9; color: #475569; border: 1px solid #e2e8f0; }  
.tk-btn-ghost:hover { background: #e2e8f0; }  
.tk-btn-export { background: #0f172a; color: #fff; }  
.tk-btn-export:hover { background: #1e293b; }  
  
/* ══════════════════════════════════════════════  
   TABLE  
══════════════════════════════════════════════ */  
.tk-table-wrap {  
    background: #fff;  
    border: 1px solid #e2e8f0;  
    border-radius: 14px;  
    overflow: hidden;  
}  
.tk-table { width: 100%; border-collapse: collapse; }  
.tk-table thead tr {  
    background: #f8fafc;  
    border-bottom: 1px solid #e2e8f0;  
}  
.tk-table th {  
    padding: 11px 16px;  
    font-size: .72rem;  
    font-weight: 600;  
    color: #64748b;  
    text-transform: uppercase;  
    letter-spacing: .07em;  
    text-align: left;  
    white-space: nowrap;  
}  
.tk-table td {  
    padding: 13px 16px;  
    font-size: .83rem;  
    color: #334155;  
    border-bottom: 1px solid #f1f5f9;  
    vertical-align: middle;  
}  
.tk-table tbody tr { transition: background .12s; }  
.tk-table tbody tr:hover { background: #f8fafc; }  
.tk-table tbody tr:last-child td { border-bottom: none; }  
  
/* ══════════════════════════════════════════════  
   AVATAR  
══════════════════════════════════════════════ */  
.tk-avatar {  
    width: 34px; height: 34px;  
    border-radius: 9px;  
    display: flex; align-items: center; justify-content: center;  
    font-size: .72rem;  
    font-weight: 700;  
    color: #fff;  
    flex-shrink: 0;  
}  
  
/* ══════════════════════════════════════════════  
   STATUS BADGE  
══════════════════════════════════════════════ */  
.tk-badge {  
    display: inline-flex; align-items: center; gap: 5px;  
    padding: 3px 10px;  
    border-radius: 20px;  
    font-size: .72rem;  
    font-weight: 600;  
    white-space: nowrap;  
}  
.tk-badge-berhasil { background: #dcfce7; color: #15803d; }  
.tk-badge-pending  { background: #fef9c3; color: #a16207; }  
.tk-badge-refund   { background: #dbeafe; color: #1d4ed8; }  
.tk-badge-gagal    { background: #fee2e2; color: #b91c1c; }  
.tk-dot { width: 6px; height: 6px; border-radius: 50%; }  
.tk-dot-berhasil { background: #22c55e; }  
.tk-dot-pending  { background: #eab308; }  
.tk-dot-refund   { background: #3b82f6; }  
.tk-dot-gagal    { background: #ef4444; }  
  
/* ══════════════════════════════════════════════  
   PAKET PILL  
══════════════════════════════════════════════ */  
.tk-paket {  
    display: inline-block;  
    padding: 2px 9px;  
    border-radius: 20px;  
    font-size: .7rem;  
    font-weight: 600;  
}  
.tk-paket-starter  { background: #f1f5f9; color: #475569; }  
.tk-paket-pro      { background: #eff6ff; color: #1d4ed8; }  
.tk-paket-business { background: #fdf4ff; color: #7e22ce; }  
  
/* ══════════════════════════════════════════════  
   ACTION BUTTONS  
══════════════════════════════════════════════ */  
.tk-action {  
    padding: 4px 10px;  
    border-radius: 7px;  
    font-size: .75rem;  
    font-weight: 600;  
    cursor: pointer;  
    border: none;  
    transition: all .15s;  
    font-family: 'Inter', sans-serif;  
}  
.tk-action-detail  { background: #eff6ff; color: #2563eb; }  
.tk-action-detail:hover  { background: #dbeafe; }  
.tk-action-refund  { background: #fffbeb; color: #d97706; border: 1px solid #fde68a; }  
.tk-action-refund:hover  { background: #fef3c7; }  
  
/* ══════════════════════════════════════════════  
   EMPTY STATE  
══════════════════════════════════════════════ */  
.tk-empty {  
    text-align: center;  
    padding: 50px 20px;  
    color: #94a3b8;  
}  
  
/* ══════════════════════════════════════════════  
   PAGINATION  
══════════════════════════════════════════════ */  
.tk-pagi {  
    display: flex; align-items: center; justify-content: space-between;  
    padding: 12px 20px;  
    border-top: 1px solid #f1f5f9;  
    font-size: .78rem;  
    color: #64748b;  
    background: #fff;  
    border-radius: 0 0 14px 14px;  
}  
.tk-pagi-btn {  
    width: 30px; height: 30px;  
    border-radius: 7px;  
    border: 1px solid #e2e8f0;  
    background: #fff;  
    cursor: pointer;  
    display: flex; align-items: center; justify-content: center;  
    font-size: .85rem;  
    color: #475569;  
    transition: all .15s;  
}  
.tk-pagi-btn:hover  { background: #eff6ff; border-color: #2563eb; color: #2563eb; }  
.tk-pagi-btn.active { background: #2563eb; border-color: #2563eb; color: #fff; }  
  
/* ══════════════════════════════════════════════  
   MODAL  
══════════════════════════════════════════════ */  
.tk-modal-bg {  
    position: fixed; inset: 0;  
    background: rgba(15,23,42,.45);  
    backdrop-filter: blur(3px);  
    z-index: 9998;  
    display: flex; align-items: flex-start; justify-content: flex-end;  
}  
.tk-modal-panel {  
    width: 420px;  
    max-width: 95vw;  
    height: 100vh;  
    background: #fff;  
    overflow-y: auto;  
    box-shadow: -8px 0 40px rgba(0,0,0,.15);  
}  
.tk-modal-header {  
    padding: 22px 24px 18px;  
    border-bottom: 1px solid #e2e8f0;  
    background: #f8fafc;  
    position: sticky; top: 0; z-index: 1;  
}  
.tk-modal-body { padding: 22px 24px; }  
.tk-detail-row {  
    display: flex; justify-content: space-between; align-items: flex-start;  
    padding: 10px 0;  
    border-bottom: 1px solid #f1f5f9;  
    font-size: .83rem;  
}  
.tk-detail-row:last-child { border-bottom: none; }  
.tk-detail-label { color: #64748b; font-weight: 500; flex-shrink: 0; margin-right: 16px; }  
.tk-detail-val   { color: #0f172a; font-weight: 600; text-align: right; }  
.tk-modal-section {  
    font-size: .7rem;  
    font-weight: 700;  
    text-transform: uppercase;  
    letter-spacing: .1em;  
    color: #94a3b8;  
    margin: 18px 0 8px;  
}  
.tk-modal-footer {  
    padding: 16px 24px;  
    border-top: 1px solid #e2e8f0;  
    display: flex; gap: 10px;  
    background: #f8fafc;  
    position: sticky; bottom: 0;  
}  
.tk-summary-box {  
    background: linear-gradient(135deg, #1e3a5f, #0f172a);  
    border-radius: 12px;  
    padding: 18px 20px;  
    color: #fff;  
    margin-bottom: 6px;  
}  
</style>  
@endpush  
  
<div  
    class="space-y-5"  
    x-data="transaksiKeuangan()"  
    x-init="initChart()"  
>  
  
{{-- ══ HEADER ══ --}}  
<div class="flex items-center justify-between">  
    <div>  
        <h1 class="tk-sora text-xl font-bold text-slate-900">Transaksi &amp; Keuangan</h1>  
        <p class="text-sm text-slate-500 mt-0.5">Rekap seluruh transaksi pembayaran paket kampanye</p>  
    </div>  
    <button class="tk-btn tk-btn-export flex items-center gap-2">  
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">  
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>  
        </svg>  
        Export CSV  
    </button>  
</div>  
  
{{-- ══ STAT CARDS ══ --}}  
<div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-4">  
  
    <div class="tk-stat xl:col-span-2">  
        <div class="tk-stat-accent" style="background:linear-gradient(90deg,#2563eb,#60a5fa)"></div>  
        <div class="flex items-start gap-3 mt-1">  
            <div class="tk-stat-icon" style="background:#eff6ff">
                <svg class="w-5 h-5" style="color:#2563eb" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>  
            <div class="flex-1 min-w-0">  
                <div class="tk-stat-label">Total Pendapatan</div>  
                <div class="tk-stat-value tk-mono">{{ $statTotalPendapatan }}</div>  
                <div class="flex items-center gap-2 mt-1">  
                    <span class="tk-growth" style="background:#dcfce7;color:#15803d">{{ $growthPendapatan }}</span>  
                    <span class="tk-stat-sub">vs bulan lalu</span>  
                </div>  
            </div>  
        </div>  
    </div>  
  
    <div class="tk-stat">  
        <div class="tk-stat-accent" style="background:linear-gradient(90deg,#10b981,#34d399)"></div>  
        <div class="flex items-start gap-3 mt-1">  
            <div class="tk-stat-icon" style="background:#d1fae5">
                <svg class="w-5 h-5" style="color:#10b981" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>  
            <div>  
                <div class="tk-stat-label">Bulan Ini</div>  
                <div class="tk-stat-value tk-mono" style="font-size:1.1rem">{{ $statBulanIni }}</div>  
                <span class="tk-growth" style="background:#dcfce7;color:#15803d;margin-top:4px;display:inline-block">{{ $growthBulanIni }}</span>  
            </div>  
        </div>  
    </div>  
  
    <div class="tk-stat">  
        <div class="tk-stat-accent" style="background:linear-gradient(90deg,#22c55e,#86efac)"></div>  
        <div class="flex items-start gap-3 mt-1">  
            <div class="tk-stat-icon" style="background:#dcfce7">
                <svg class="w-5 h-5" style="color:#16a34a" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>  
            <div>  
                <div class="tk-stat-label">Berhasil</div>  
                <div class="tk-stat-value">{{ $statBerhasil }}</div>  
                <div class="tk-stat-sub">transaksi</div>  
            </div>  
        </div>  
    </div>  
  
    <div class="tk-stat">  
        <div class="tk-stat-accent" style="background:linear-gradient(90deg,#f59e0b,#fcd34d)"></div>  
        <div class="flex items-start gap-3 mt-1">  
            <div class="tk-stat-icon" style="background:#fef9c3">
                <svg class="w-5 h-5" style="color:#f59e0b" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>  
            <div>  
                <div class="tk-stat-label">Pending</div>  
                <div class="tk-stat-value" style="color:#d97706">{{ $statPending }}</div>  
                <div class="tk-stat-sub">menunggu konfirmasi</div>  
            </div>  
        </div>  
    </div>  
  
</div>  
  
{{-- ══ CHART + RINGKASAN ══ --}}  
<div class="grid grid-cols-1 xl:grid-cols-3 gap-4">  
  
    <div class="xl:col-span-2 bg-white border border-slate-200 rounded-2xl p-6">  
        <div class="flex items-center justify-between mb-6">  
            <div>  
                <div class="tk-sora font-bold text-slate-900 text-base">Pendapatan 6 Bulan Terakhir</div>  
                <div class="text-xs text-slate-400 mt-0.5">Berdasarkan transaksi yang berhasil dikonfirmasi</div>  
            </div>  
            <div class="flex items-center gap-2 text-xs text-slate-500">  
                <span class="inline-block w-3 h-3 rounded-sm" style="background:linear-gradient(to top,#1d4ed8,#60a5fa)"></span> Pendapatan  
            </div>  
        </div>  
        <div class="flex items-end gap-3" style="height:140px">  
            @php $maxNilai = max($chartNilai); @endphp  
            @foreach($chartBulan as $i => $bulan)  
            @php  
                $pct   = round(($chartNilai[$i] / $maxNilai) * 120);  
                $val   = $chartNilai[$i];  
                $valF  = 'Rp ' . number_format($val, 0, ',', '.');  
                $isLast = $i === count($chartBulan) - 1;  
            @endphp  
            <div class="tk-chart-bar-wrap">  
                <div class="tk-chart-bar-outer">  
                    <div  
                        class="tk-chart-bar {{ $isLast ? 'tk-chart-active' : '' }}"  
                        data-target="{{ $pct }}"  
                        style="{{ $isLast ? 'background:linear-gradient(to top,#f59e0b,#fcd34d)' : '' }}"  
                    >  
                        <div class="tk-chart-bar-tooltip">{{ $valF }}</div>  
                    </div>  
                </div>  
                <div class="tk-chart-label">{{ $bulan }}</div>  
                <div class="tk-mono text-slate-500" style="font-size:.62rem">{{ number_format($val/1000000,1) }}jt</div>  
            </div>  
            @endforeach  
        </div>  
    </div>  
  
    <div class="flex flex-col gap-4">  
  
        <div class="bg-white border border-slate-200 rounded-2xl p-5 flex-1">  
            <div class="tk-sora font-bold text-slate-800 text-sm mb-4">Ringkasan Status</div>  
            <div class="space-y-3">  
                @php  
                $total = $statBerhasil + $statPending + $statRefund;  
                $ringkasan = [  
                    ['label'=>'Berhasil','val'=>$statBerhasil,'pct'=>round($statBerhasil/$total*100),'color'=>'#22c55e'],  
                    ['label'=>'Pending', 'val'=>$statPending, 'pct'=>round($statPending/$total*100), 'color'=>'#f59e0b'],  
                    ['label'=>'Refund',  'val'=>$statRefund,  'pct'=>round($statRefund/$total*100),  'color'=>'#3b82f6'],  
                ];  
                @endphp  
                @foreach($ringkasan as $r)  
                <div>  
                    <div class="flex justify-between items-center mb-1">  
                        <span class="text-xs font-semibold text-slate-600">{{ $r['label'] }}</span>  
                        <span class="text-xs font-bold text-slate-800">{{ $r['val'] }} <span class="font-normal text-slate-400">({{ $r['pct'] }}%)</span></span>  
                    </div>  
                    <div class="w-full rounded-full h-2" style="background:#f1f5f9">  
                        <div class="h-2 rounded-full" style="width:{{ $r['pct'] }}%;background:{{ $r['color'] }}"></div>  
                    </div>  
                </div>  
                @endforeach  
            </div>  
        </div>  
  
        <div class="bg-white border border-slate-200 rounded-2xl p-5 flex-1">  
            <div class="tk-sora font-bold text-slate-800 text-sm mb-4">Metode Pembayaran</div>  
            <div class="space-y-2">  
                @php  
                $metodes = [  
                    ['label'=>'Transfer Bank',  'pct'=>48,'icon'=>'<svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>'],  
                    ['label'=>'QRIS',           'pct'=>33,'icon'=>'<svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>'],  
                    ['label'=>'Virtual Account','pct'=>19,'icon'=>'<svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>'],  
                ];  
                @endphp  
                @foreach($metodes as $m)  
                <div class="flex items-center gap-3">  
                    <div class="w-8 h-8 rounded-lg bg-slate-50 flex items-center justify-center border border-slate-100">{!! $m['icon'] !!}</div>  
                    <div class="flex-1">  
                        <div class="flex justify-between text-xs mb-1">  
                            <span class="text-slate-600 font-medium">{{ $m['label'] }}</span>  
                            <span class="text-slate-800 font-bold">{{ $m['pct'] }}%</span>  
                        </div>  
                        <div class="w-full rounded-full h-1.5" style="background:#f1f5f9">  
                            <div class="h-1.5 rounded-full" style="width:{{ $m['pct'] }}%;background:#2563eb"></div>  
                        </div>  
                    </div>  
                </div>  
                @endforeach  
            </div>  
        </div>  
  
    </div>  
</div>  
  
{{-- ══ FILTER BAR ══ --}}  
<div class="tk-filter-bar">  
    <div class="relative flex-1 min-w-48">  
        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">  
            <circle cx="11" cy="11" r="8"/><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35"/>  
        </svg>  
        <input type="text" placeholder="Cari nama, ID transaksi, kampanye…" class="tk-input w-full pl-9" x-model="cariTeks">  
    </div>  
    <select class="tk-select" x-model="filterStatus">  
        <option value="">Semua Status</option>  
        <option value="Berhasil">Berhasil</option>  
        <option value="Pending">Pending</option>  
        <option value="Refund">Refund</option>  
        <option value="Gagal">Gagal</option>  
    </select>  
    <select class="tk-select" x-model="filterPaket">  
        <option value="">Semua Paket</option>  
        <option value="Starter">Starter</option>  
        <option value="Pro">Pro</option>  
        <option value="Business">Business</option>  
    </select>  
    <select class="tk-select" x-model="filterMetode">  
        <option value="">Semua Metode</option>  
        <option value="Transfer Bank">Transfer Bank</option>  
        <option value="QRIS">QRIS</option>  
        <option value="Virtual Account">Virtual Account</option>  
    </select>  
    <button class="tk-btn tk-btn-ghost" @click="resetFilter()">Reset</button>  
</div>  
  
{{-- ══ TABEL ══ --}}  
<div class="tk-table-wrap">  
    <table class="tk-table">  
        <thead>  
            <tr>  
                <th>ID Transaksi</th>  
                <th>Developer</th>  
                <th>Kampanye</th>  
                <th>Paket</th>  
                <th>Jumlah</th>  
                <th>Metode</th>  
                <th>Status</th>  
                <th>Tanggal</th>  
                <th>Aksi</th>  
            </tr>  
        </thead>  
        <tbody>  
            @foreach($transaksiList as $idx => $t)  
            @php  
                $statusLower = strtolower($t['status']);  
                $paketLower  = strtolower($t['paket']);  
                $jumlahF     = 'Rp ' . number_format($t['jumlah'], 0, ',', '.');  
            @endphp  
            <tr  
                data-status="{{ $t['status'] }}"  
                data-paket="{{ $t['paket'] }}"  
                data-metode="{{ $t['metode'] }}"  
                data-nama="{{ strtolower($t['namaUser']) }}"  
                data-id="{{ strtolower($t['id']) }}"  
                data-kampanye="{{ strtolower($t['kampanye']) }}"  
                x-show="tampilRow($el)"  
            >  
                <td>  
                    <div class="tk-mono text-slate-700 font-semibold" style="font-size:.75rem">{{ $t['id'] }}</div>  
                    <div class="text-slate-400" style="font-size:.67rem">{{ $t['invoice'] }}</div>  
                </td>  
                <td>  
                    <div class="flex items-center gap-2">  
                        <div class="tk-avatar bg-gradient-to-br {{ $t['avatarColor'] }}">{{ $t['inisial'] }}</div>  
                        <div class="font-semibold text-slate-800" style="font-size:.82rem">{{ $t['namaUser'] }}</div>  
                    </div>  
                </td>  
                <td>  
                    <div class="text-slate-700 font-medium" style="max-width:180px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">  
                        {{ $t['kampanye'] }}  
                    </div>  
                </td>  
                <td><span class="tk-paket tk-paket-{{ $paketLower }}">{{ $t['paket'] }}</span></td>  
                <td><div class="tk-mono font-bold text-slate-900" style="font-size:.85rem">{{ $jumlahF }}</div></td>  
                <td>  
                    <div class="text-slate-600" style="font-size:.8rem">{{ $t['metode'] }}</div>  
                    @if($t['bank'] !== '-')  
                    <div class="text-slate-400" style="font-size:.7rem">{{ $t['bank'] }}</div>  
                    @endif  
                </td>  
                <td>  
                    <span class="tk-badge tk-badge-{{ $statusLower }}">  
                        <span class="tk-dot tk-dot-{{ $statusLower }}"></span>  
                        {{ $t['status'] }}  
                    </span>  
                </td>  
                <td>  
                    <div class="text-slate-700" style="font-size:.8rem">{{ $t['tanggal'] }}</div>  
                    <div class="text-slate-400 tk-mono" style="font-size:.7rem">{{ $t['waktu'] }}</div>  
                </td>  
                <td>  
                    <div class="flex items-center gap-2">  
                        <button class="tk-action tk-action-detail" @click="bukaModal({{ $idx }})">Detail</button>  
                        @if($t['status'] === 'Pending')  
                        <button class="tk-action tk-action-refund" wire:click="approvePembayaran('{{ $t['db_id'] }}')">Konfirmasi</button>  
                        @endif  
                    </div>  
                </td>  
            </tr>  
            @endforeach  
  
            <tr x-show="!adaHasil()" x-cloak>  
                <td colspan="9">  
                    <div class="tk-empty">  
                        <div class="w-14 h-14 mx-auto rounded-2xl flex items-center justify-center mb-3" style="background:#f1f5f9;">
                            <svg class="w-7 h-7" style="color:#94a3b8;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </div>   
                        <div class="font-semibold text-slate-500">Tidak ada transaksi ditemukan</div>  
                        <div class="text-sm text-slate-400 mt-1">Coba ubah filter atau kata kunci pencarian</div>  
                    </div>  
                </td>  
            </tr>  
        </tbody>  
    </table>  
  
    <div class="tk-pagi">  
        <span>Menampilkan <strong>{{ count($transaksiList) }}</strong> dari <strong>186</strong> transaksi</span>  
        <div class="flex items-center gap-1.5">  
            <button class="tk-pagi-btn">‹</button>  
            <button class="tk-pagi-btn active">1</button>  
            <button class="tk-pagi-btn">2</button>  
            <button class="tk-pagi-btn">3</button>  
            <span class="text-slate-400 text-xs px-1">…</span>  
            <button class="tk-pagi-btn">16</button>  
            <button class="tk-pagi-btn">›</button>  
        </div>  
    </div>  
</div>  
  
{{-- ══ MODAL DETAIL ══ --}}  
<div  
    class="tk-modal-bg"  
    x-show="modalTerbuka"  
    x-cloak  
    style="display:none"  
    x-transition:enter="transition ease-out duration-250"  
    x-transition:enter-start="opacity-0"  
    x-transition:enter-end="opacity-100"  
    x-transition:leave="transition ease-in duration-150"  
    x-transition:leave-start="opacity-100"  
    x-transition:leave-end="opacity-0"  
    @click.self="tutupModal()"  
    @keydown.escape.window="tutupModal()"  
>  
    <div  
        class="tk-modal-panel"  
        x-show="modalTerbuka"  
        x-transition:enter="transition ease-out duration-250"  
        x-transition:enter-start="opacity-0 translate-x-8"  
        x-transition:enter-end="opacity-100 translate-x-0"  
        x-transition:leave="transition ease-in duration-150"  
        x-transition:leave-start="opacity-100 translate-x-0"  
        x-transition:leave-end="opacity-0 translate-x-8"  
    >  
        <div class="tk-modal-header">  
            <div class="flex items-center justify-between">  
                <div>  
                    <div class="tk-sora font-bold text-slate-900 text-base">Detail Transaksi</div>  
                    <div class="text-xs text-slate-400 mt-0.5" x-text="transaksi ? transaksi.id : ''"></div>  
                </div>  
                <button @click="tutupModal()" class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-400 hover:bg-slate-200 transition">  
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">  
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>  
                    </svg>  
                </button>  
            </div>  
        </div>  
  
        <template x-if="transaksi">  
            <div class="tk-modal-body">  
  
                <div class="tk-summary-box">  
                    <div class="flex items-center gap-3 mb-3">  
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center text-sm font-bold text-white" style="background:rgba(255,255,255,.15)" x-text="transaksi.inisial"></div>  
                        <div>  
                            <div class="font-bold text-white text-sm" x-text="transaksi.namaUser"></div>  
                            <div class="text-blue-300 text-xs" x-text="transaksi.kampanye"></div>  
                        </div>  
                    </div>  
                    <div class="tk-mono text-white font-bold text-2xl" x-text="'Rp ' + transaksi.jumlah.toLocaleString('id-ID')"></div>  
                    <div class="flex items-center gap-2 mt-2">  
                        <template x-if="transaksi.status === 'Berhasil'">  
                            <span class="text-xs font-semibold px-2 py-0.5 rounded-full" style="background:#22c55e;color:#fff">✓ Berhasil</span>  
                        </template>  
                        <template x-if="transaksi.status === 'Pending'">  
                            <span class="text-xs font-semibold px-2 py-0.5 rounded-full" style="background:#f59e0b;color:#fff">⏳ Pending</span>  
                        </template>  
                        <template x-if="transaksi.status === 'Refund'">  
                            <span class="text-xs font-semibold px-2 py-0.5 rounded-full" style="background:#3b82f6;color:#fff">↩ Refund</span>  
                        </template>  
                        <template x-if="transaksi.status === 'Gagal'">  
                            <span class="text-xs font-semibold px-2 py-0.5 rounded-full" style="background:#ef4444;color:#fff">✗ Gagal</span>  
                        </template>  
                        <span class="text-blue-300 text-xs" x-text="transaksi.tanggal + ' · ' + transaksi.waktu"></span>  
                    </div>  
                </div>  
  
                <div class="tk-modal-section">Informasi Transaksi</div>  
                <div>  
                    <div class="tk-detail-row">  
                        <span class="tk-detail-label">ID Transaksi</span>  
                        <span class="tk-detail-val tk-mono text-xs" x-text="transaksi.id"></span>  
                    </div>  
                    <div class="tk-detail-row">  
                        <span class="tk-detail-label">No. Invoice</span>  
                        <span class="tk-detail-val tk-mono text-xs" x-text="transaksi.invoice"></span>  
                    </div>  
                    <div class="tk-detail-row">  
                        <span class="tk-detail-label">Tanggal</span>  
                        <span class="tk-detail-val" x-text="transaksi.tanggal + ' · ' + transaksi.waktu"></span>  
                    </div>  
                    <div class="tk-detail-row">  
                        <span class="tk-detail-label">Metode</span>  
                        <span class="tk-detail-val" x-text="transaksi.metode + (transaksi.bank !== '-' ? ' · ' + transaksi.bank : '')"></span>  
                    </div>  
                    <div class="tk-detail-row">  
                        <span class="tk-detail-label">Status</span>  
                        <span class="tk-detail-val" x-text="transaksi.status"></span>  
                    </div>  
                </div>  
  
                <div class="tk-modal-section">Paket &amp; Kampanye</div>  
                <div>  
                    <div class="tk-detail-row">  
                        <span class="tk-detail-label">Developer</span>  
                        <span class="tk-detail-val" x-text="transaksi.namaUser"></span>  
                    </div>  
                    <div class="tk-detail-row">  
                        <span class="tk-detail-label">Kampanye</span>  
                        <span class="tk-detail-val" style="max-width:200px;text-align:right" x-text="transaksi.kampanye"></span>  
                    </div>  
                    <div class="tk-detail-row">  
                        <span class="tk-detail-label">Paket</span>  
                        <span class="tk-detail-val" x-text="transaksi.paket"></span>  
                    </div>  
                </div>  
  
                <div class="tk-modal-section">Rincian Pembayaran</div>  
                <div>  
                    <div class="tk-detail-row">  
                        <span class="tk-detail-label">Harga Paket</span>  
                        <span class="tk-detail-val tk-mono text-xs" x-text="'Rp ' + transaksi.jumlah.toLocaleString('id-ID')"></span>  
                    </div>  
                    <div class="tk-detail-row">  
                        <span class="tk-detail-label">Biaya Layanan</span>  
                        <span class="tk-detail-val tk-mono text-xs">Rp 0</span>  
                    </div>  
                    <div class="tk-detail-row" style="background:#f8fafc;margin:0 -4px;padding:10px 4px;border-radius:8px">  
                        <span class="tk-detail-label font-bold text-slate-800">Total Dibayar</span>  
                        <span class="tk-detail-val tk-mono font-bold text-blue-700 text-sm" x-text="'Rp ' + transaksi.jumlah.toLocaleString('id-ID')"></span>  
                    </div>  
                </div>  
  
            </div>  
        </template>  
  
        <div class="tk-modal-footer">  
            <template x-if="transaksi && transaksi.status === 'Pending'">  
                <div class="flex gap-2 w-full">  
                    <button class="tk-btn flex-1" style="background:#22c55e;color:#fff" @click="$wire.approvePembayaran(transaksi.db_id); tutupModal()">✓ Konfirmasi</button>  
                    <button class="tk-btn flex-1 tk-btn-ghost" style="color:#b91c1c" @click="$wire.rejectPembayaran(transaksi.db_id); tutupModal()">✗ Tolak</button>  
                </div>  
            </template>  
            <template x-if="transaksi && transaksi.status === 'Berhasil'">  
                <div class="flex gap-2 w-full">  
                    <button class="tk-btn flex-1 tk-btn-ghost">📄 Unduh Invoice</button>  
                    <button class="tk-btn flex-1 tk-btn-ghost" style="color:#d97706">↩ Proses Refund</button>  
                </div>  
            </template>  
            <template x-if="transaksi && transaksi.status === 'Refund'">  
                <button class="tk-btn w-full tk-btn-ghost">📄 Lihat Bukti Refund</button>  
            </template>  
            <template x-if="transaksi && transaksi.status === 'Gagal'">  
                <button class="tk-btn w-full tk-btn-ghost">🔄 Cek Status Payment</button>  
            </template>  
        </div>  
  
    </div>  
</div>  
  
</div>{{-- end x-data --}}  
  
@push('scripts')  
<script>  
const TRANSAKSI_DATA = @json($transaksiList);  
  
function transaksiKeuangan() {  
    return {  
        cariTeks:     '',  
        filterStatus: '',  
        filterPaket:  '',  
        filterMetode: '',  
        modalTerbuka: false,  
        transaksi:    null,  
  
        initChart() {  
            this.$nextTick(() => {  
                document.querySelectorAll('.tk-chart-bar').forEach(bar => {  
                    const target = parseInt(bar.dataset.target || 0);  
                    bar.style.height = '0px';  
                    setTimeout(() => { bar.style.height = target + 'px'; }, 200);  
                });  
            });  
        },  
  
        tampilRow($el) {  
            const status   = $el.dataset.status   || '';  
            const paket    = $el.dataset.paket    || '';  
            const metode   = $el.dataset.metode   || '';  
            const nama     = $el.dataset.nama     || '';  
            const id       = $el.dataset.id       || '';  
            const kampanye = $el.dataset.kampanye || '';  
            const q        = this.cariTeks.toLowerCase().trim();  
  
            if (this.filterStatus && status !== this.filterStatus) return false;  
            if (this.filterPaket  && paket  !== this.filterPaket)  return false;  
            if (this.filterMetode && metode !== this.filterMetode)  return false;  
            if (q && !nama.includes(q) && !id.includes(q) && !kampanye.includes(q)) return false;  
  
            return true;  
        },  
  
        adaHasil() {  
            const rows = document.querySelectorAll('tbody tr[data-status]');  
            for (const r of rows) {  
                if (this.tampilRow(r)) return true;  
            }  
            return false;  
        },  
  
        bukaModal(idx) {  
            this.transaksi    = TRANSAKSI_DATA[idx];  
            this.modalTerbuka = true;  
        },  
  
        tutupModal() {  
            this.modalTerbuka = false;  
            setTimeout(() => { this.transaksi = null; }, 200);  
        },  
  
        resetFilter() {  
            this.cariTeks     = '';  
            this.filterStatus = '';  
            this.filterPaket  = '';  
            this.filterMetode = '';  
        },  
    };  
}  
</script>  
@endpush  
  
</x-filament-panels::page>  