<x-layouts::app :title="__('Dashboard')">
    <div class="flex w-full flex-1 flex-col gap-6 bg-[#f7f8fc] p-1 sm:p-2">
        <section class="flex flex-col gap-4 rounded-3xl border border-slate-200/80 bg-white p-6 shadow-sm sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold text-brand-600">Dashboard Operasional</p>
                <h1 class="mt-1 text-2xl font-bold tracking-tight text-slate-950">Monitoring Pengiriman Gudang</h1>
                <p class="mt-2 text-sm text-slate-500">Ringkasan aktivitas pengiriman dan intensitas tujuan pada periode terpilih.</p>
            </div>

            <div class="flex flex-wrap items-center gap-3">
                <span class="rounded-full bg-brand-50 px-3 py-1.5 text-xs font-bold text-brand-700">Rancangan Dashboard</span>
                <button type="button" class="app-button-secondary px-4 py-2.5">21 Juli 2026</button>
            </div>
        </section>

        <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
            @php
                $cards = [
                    ['label' => 'Total Pengiriman', 'value' => '43', 'meta' => 'Semua status', 'tone' => 'bg-brand-50 text-brand-700', 'dot' => 'bg-brand-500'],
                    ['label' => 'Menunggu Antrian', 'value' => '12', 'meta' => 'Belum diproses', 'tone' => 'bg-slate-100 text-slate-700', 'dot' => 'bg-slate-400'],
                    ['label' => 'Sedang Diproses', 'value' => '7', 'meta' => 'Picking & packing', 'tone' => 'bg-amber-50 text-amber-700', 'dot' => 'bg-amber-400'],
                    ['label' => 'Sudah Dikirim', 'value' => '24', 'meta' => 'Selesai dikirim', 'tone' => 'bg-emerald-50 text-emerald-700', 'dot' => 'bg-emerald-400'],
                ];
            @endphp

            @foreach ($cards as $card)
                <article class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm">
                    <div class="flex items-start justify-between">
                        <span class="rounded-lg px-2.5 py-1 text-[11px] font-bold {{ $card['tone'] }}">Status</span>
                        <span class="mt-1 size-2.5 rounded-full {{ $card['dot'] }}"></span>
                    </div>
                    <p class="mt-5 text-3xl font-bold tracking-tight text-slate-950">{{ $card['value'] }}</p>
                    <p class="mt-1 text-sm font-semibold text-slate-700">{{ $card['label'] }}</p>
                    <p class="mt-1 text-xs text-slate-400">{{ $card['meta'] }}</p>
                </article>
            @endforeach
        </section>

        <section class="grid gap-6 xl:grid-cols-[1.35fr_0.65fr]">
            <article class="rounded-3xl border border-slate-200/80 bg-white p-5 shadow-sm sm:p-6">
                <div class="flex flex-col gap-4 border-b border-slate-200 pb-5 sm:flex-row sm:items-start sm:justify-between">
                    <div>
                        <h2 class="text-lg font-bold text-slate-950">5 Tujuan dengan Pengiriman Terbanyak</h2>
                        <p class="mt-1 text-sm text-slate-500">Top 5 outlet berdasarkan jumlah pengiriman pada rentang tanggal.</p>
                    </div>
                    <span class="w-fit rounded-full bg-brand-50 px-3 py-1 text-xs font-bold text-brand-700">Data contoh</span>
                </div>

                <div class="mt-5 grid gap-3 sm:grid-cols-2 xl:grid-cols-4">
                    <label>
                        <span class="mb-2 block text-xs font-bold uppercase tracking-[0.12em] text-slate-500">Gudang</span>
                        <select class="app-filter">
                            <option>Semua Gudang</option>
                            <option>Gudang Jakarta</option>
                            <option>Gudang Surabaya</option>
                            <option>Gudang Bandung</option>
                        </select>
                    </label>
                    <label>
                        <span class="mb-2 block text-xs font-bold uppercase tracking-[0.12em] text-slate-500">Dari</span>
                        <input type="date" value="2026-07-15" class="app-filter">
                    </label>
                    <label>
                        <span class="mb-2 block text-xs font-bold uppercase tracking-[0.12em] text-slate-500">Sampai</span>
                        <input type="date" value="2026-07-21" class="app-filter">
                    </label>
                    <div class="flex items-end">
                        <button type="button" class="app-button-secondary h-11 w-full px-3 py-0">7 Hari Terakhir</button>
                    </div>
                </div>

                <div class="mt-6 rounded-2xl border border-slate-200 bg-slate-50/70 p-4 sm:p-5">
                    <div class="relative h-80 overflow-hidden rounded-xl bg-white px-5 pb-4 pt-7">
                        <div class="pointer-events-none absolute inset-x-9 bottom-16 top-7 flex flex-col justify-between">
                            @foreach ([200, 150, 100, 50, 0] as $tick)
                                <div class="relative border-t border-dashed border-slate-200">
                                    <span class="absolute -left-1 -translate-x-full -translate-y-1/2 pr-2 text-[10px] font-medium text-slate-400">{{ $tick }}</span>
                                </div>
                            @endforeach
                        </div>

                        <div class="absolute inset-x-9 bottom-14 top-7 grid grid-cols-5 items-end gap-4 border-b border-slate-300 pl-2">
                            @foreach ([178, 154, 141, 137, 126] as $value)
                                <div class="flex h-full flex-col justify-end">
                                    <span class="mb-2 text-center text-xs font-bold text-brand-700">{{ $value }}</span>
                                    <div class="w-full rounded-t-xl bg-gradient-to-t from-brand-600 to-violet-400 shadow-[0_12px_30px_rgba(91,92,226,0.18)]" style="height: {{ ($value / 200) * 100 }}%"></div>
                                </div>
                            @endforeach
                        </div>

                        <div class="absolute inset-x-9 bottom-0 grid h-14 grid-cols-5 gap-4 pl-2">
                            @foreach (['Toko Bantu', 'Outlet Kemang', 'Outlet Sleman', 'Mitra Denpasar', 'Mitra Bandung'] as $label)
                                <div class="flex items-start justify-center pt-2 text-center text-[10px] font-medium leading-4 text-slate-500">{{ $label }}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </article>

            <aside class="flex flex-col gap-6">
                <article class="rounded-3xl bg-gradient-to-br from-brand-700 via-brand-600 to-violet-500 p-6 text-white shadow-xl shadow-brand-600/20">
                    <p class="text-xs font-bold uppercase tracking-[0.14em] text-white/70">Total Tonase Hari Ini</p>
                    <p class="mt-3 text-4xl font-bold">5.770 <span class="text-lg font-semibold text-white/70">kg</span></p>
                    <div class="mt-8 flex items-center justify-between border-t border-white/15 pt-5 text-sm">
                        <span class="text-white/70">Dari 43 pengiriman</span>
                        <span class="rounded-lg bg-white/15 px-2.5 py-1 font-bold">+8,4%</span>
                    </div>
                </article>

                <article class="rounded-3xl border border-slate-200/80 bg-white p-6 shadow-sm">
                    <h2 class="text-lg font-bold text-slate-950">Aktivitas Terbaru</h2>
                    <div class="mt-5 space-y-5">
                        @foreach ([
                            ['title' => 'DSP-20260721-043', 'text' => 'Status berubah menjadi Sudah Dikirim', 'time' => '13:42', 'dot' => 'bg-emerald-400'],
                            ['title' => 'DSP-20260721-041', 'text' => 'Picking dan packing mulai diproses', 'time' => '13:18', 'dot' => 'bg-amber-400'],
                            ['title' => 'DSP-20260721-040', 'text' => 'Order baru diimpor oleh Admin', 'time' => '12:55', 'dot' => 'bg-brand-500'],
                        ] as $activity)
                            <div class="flex gap-3">
                                <span class="mt-1.5 size-2.5 shrink-0 rounded-full {{ $activity['dot'] }}"></span>
                                <div class="min-w-0 flex-1">
                                    <div class="flex items-center justify-between gap-3">
                                        <p class="truncate text-sm font-bold text-slate-800">{{ $activity['title'] }}</p>
                                        <span class="text-xs text-slate-400">{{ $activity['time'] }}</span>
                                    </div>
                                    <p class="mt-1 text-xs leading-5 text-slate-500">{{ $activity['text'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </article>
            </aside>
        </section>
    </div>
</x-layouts::app>
