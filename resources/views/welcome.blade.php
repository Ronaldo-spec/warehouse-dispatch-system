<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistem Monitoring Pengiriman Gudang</title>
        <meta
            name="description"
            content="Sistem internal untuk memantau antrean, proses, penyelesaian, dan intensitas pengiriman gudang."
        >

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="min-h-screen bg-[#f7f8fc] font-sans text-slate-800 antialiased">
        <header class="sticky top-0 z-50 border-b border-slate-200/80 bg-white/90 backdrop-blur-xl">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4 lg:px-8">
                <a href="{{ route('home') }}" class="flex items-center gap-3" aria-label="Halaman utama">
                    <span class="flex size-11 items-center justify-center rounded-2xl bg-brand-600 text-white shadow-lg shadow-brand-600/20">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="size-6" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 7.5 12 3l8.25 4.5L12 12 3.75 7.5Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12 12 16.5 20.25 12M3.75 16.5 12 21l8.25-4.5" />
                        </svg>
                    </span>
                    <span>
                        <span class="block text-sm font-bold tracking-tight text-slate-900">Warehouse Dispatch</span>
                        <span class="block text-xs text-slate-500">Monitor Distribusi</span>
                    </span>
                </a>

                <nav class="hidden items-center gap-7 text-sm font-medium text-slate-600 md:flex" aria-label="Navigasi utama">
                    <a href="#alur" class="transition hover:text-brand-700">Alur</a>
                    <a href="#analitik" class="transition hover:text-brand-700">Analitik</a>
                    <a href="#fitur" class="transition hover:text-brand-700">Fitur</a>
                </nav>

                @auth
                    <a href="{{ route('dashboard') }}" class="app-button-primary">Buka Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="app-button-primary">Masuk</a>
                @endauth
            </div>
        </header>

        <main>
            <section class="relative overflow-hidden">
                <div class="absolute inset-x-0 top-0 -z-10 h-[680px] bg-[radial-gradient(circle_at_15%_5%,rgba(91,92,226,0.16),transparent_34%),radial-gradient(circle_at_85%_15%,rgba(167,139,250,0.16),transparent_32%)]"></div>

                <div class="mx-auto grid max-w-7xl gap-14 px-6 pb-24 pt-16 lg:grid-cols-[0.92fr_1.08fr] lg:items-center lg:px-8 lg:pb-28 lg:pt-24">
                    <div>
                        <div class="mb-7 inline-flex items-center gap-2 rounded-full border border-brand-200 bg-brand-50 px-4 py-2 text-sm font-semibold text-brand-700">
                            <span class="size-2 rounded-full bg-brand-500"></span>
                            Pengiriman gudang dalam satu alur
                        </div>

                        <h1 class="max-w-3xl text-4xl font-bold tracking-tight text-slate-950 sm:text-5xl lg:text-6xl lg:leading-[1.08]">
                            Pantau distribusi dengan data yang lebih jelas.
                        </h1>

                        <p class="mt-7 max-w-2xl text-lg leading-8 text-slate-600">
                            Mulai dari input order, proses picking dan packing, sampai pengiriman diselesaikan.
                            Status, petugas, jumlah crew, lampiran, dan laporan tersimpan dalam satu sistem.
                        </p>

                        <div class="mt-9 flex flex-wrap items-center gap-3">
                            @auth
                                <a href="{{ route('dashboard') }}" class="app-button-primary">
                                    Masuk ke Dashboard
                                    <svg viewBox="0 0 20 20" fill="currentColor" class="ml-2 size-4" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M3.75 10a.75.75 0 0 1 .75-.75h9.19L10.47 6.03a.75.75 0 0 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 1 1-1.06-1.06l3.22-3.22H4.5a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="app-button-primary">
                                    Masuk ke Sistem
                                    <svg viewBox="0 0 20 20" fill="currentColor" class="ml-2 size-4" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M3.75 10a.75.75 0 0 1 .75-.75h9.19L10.47 6.03a.75.75 0 0 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 1 1-1.06-1.06l3.22-3.22H4.5a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            @endauth
                            <a href="#analitik" class="app-button-secondary">Lihat tampilan dashboard</a>
                        </div>

                        <dl class="mt-12 grid max-w-2xl grid-cols-3 gap-4 border-t border-slate-200 pt-7">
                            <div>
                                <dt class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-400">Input</dt>
                                <dd class="mt-2 text-sm font-bold text-slate-800">Manual & Excel</dd>
                            </div>
                            <div>
                                <dt class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-400">Kontrol</dt>
                                <dd class="mt-2 text-sm font-bold text-slate-800">Status & Riwayat</dd>
                            </div>
                            <div>
                                <dt class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-400">Output</dt>
                                <dd class="mt-2 text-sm font-bold text-slate-800">Dashboard & Laporan</dd>
                            </div>
                        </dl>
                    </div>

                    <div class="relative">
                        <div class="absolute -inset-8 -z-10 rounded-[2.5rem] bg-brand-300/20 blur-3xl"></div>
                        <div class="app-surface overflow-hidden">
                            <div class="flex items-center justify-between border-b border-slate-200 px-6 py-5">
                                <div class="flex items-center gap-3">
                                    <span class="flex size-10 items-center justify-center rounded-xl bg-brand-600 text-white">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="size-5" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 17h18M5 14l4-4 3 3 6-7" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 6h3v3" />
                                        </svg>
                                    </span>
                                    <div>
                                        <p class="text-sm font-bold text-slate-900">Ringkasan Pengiriman</p>
                                        <p class="mt-0.5 text-xs text-slate-500">Aktivitas operasional hari ini</p>
                                    </div>
                                </div>
                                <span class="rounded-xl bg-slate-100 px-3 py-2 text-xs font-semibold text-slate-600">21 Jul 2026</span>
                            </div>

                            <div class="grid gap-4 p-6 sm:grid-cols-2 xl:grid-cols-4">
                                @php
                                    $summaryCards = [
                                        ['label' => 'Total Pengiriman', 'value' => '43', 'class' => 'bg-brand-50 text-brand-700', 'dot' => 'bg-brand-500'],
                                        ['label' => 'Menunggu Antrian', 'value' => '12', 'class' => 'bg-slate-100 text-slate-700', 'dot' => 'bg-slate-400'],
                                        ['label' => 'Sedang Diproses', 'value' => '7', 'class' => 'bg-amber-50 text-amber-700', 'dot' => 'bg-amber-400'],
                                        ['label' => 'Sudah Dikirim', 'value' => '24', 'class' => 'bg-emerald-50 text-emerald-700', 'dot' => 'bg-emerald-400'],
                                    ];
                                @endphp

                                @foreach ($summaryCards as $card)
                                    <article class="rounded-2xl border border-slate-200 bg-white p-4">
                                        <div class="flex items-start justify-between gap-3">
                                            <span class="rounded-lg px-2.5 py-1 text-[11px] font-bold {{ $card['class'] }}">Status</span>
                                            <span class="mt-1 size-2 rounded-full {{ $card['dot'] }}"></span>
                                        </div>
                                        <p class="mt-5 text-3xl font-bold tracking-tight text-slate-950">{{ $card['value'] }}</p>
                                        <p class="mt-1 text-xs font-medium leading-5 text-slate-500">{{ $card['label'] }}</p>
                                    </article>
                                @endforeach
                            </div>

                            <div class="mx-6 mb-6 rounded-2xl bg-gradient-to-r from-brand-600 to-violet-500 p-5 text-white shadow-lg shadow-brand-600/20">
                                <div class="flex items-end justify-between gap-6">
                                    <div>
                                        <p class="text-xs font-semibold uppercase tracking-[0.14em] text-white/70">Total Tonase Hari Ini</p>
                                        <p class="mt-2 text-3xl font-bold">5.770 <span class="text-base font-semibold text-white/70">kg</span></p>
                                    </div>
                                    <span class="flex size-11 items-center justify-center rounded-xl bg-white/15">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="size-6" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m5 16 4.5-4.5 3 3L19 8" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 8h4v4" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="alur" class="border-y border-slate-200 bg-white">
                <div class="mx-auto max-w-7xl px-6 py-24 lg:px-8">
                    <div class="max-w-2xl">
                        <p class="text-sm font-bold uppercase tracking-[0.18em] text-brand-600">Alur Operasional</p>
                        <h2 class="mt-4 text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">
                            Tiga tahap utama yang mudah dipantau.
                        </h2>
                        <p class="mt-5 text-base leading-7 text-slate-600">
                            Setiap order bergerak melalui status berurutan agar proses pengiriman dapat ditelusuri dengan jelas.
                        </p>
                    </div>

                    <div class="mt-14 grid gap-6 lg:grid-cols-3">
                        @php
                            $steps = [
                                ['number' => '01', 'role' => 'Admin', 'title' => 'Input order pengiriman', 'description' => 'Data dibuat melalui form atau diimpor dari Excel. Status awal otomatis menjadi Menunggu Antrian.', 'tone' => 'bg-brand-50 text-brand-700'],
                                ['number' => '02', 'role' => 'Staff Gudang', 'title' => 'Mulai proses order', 'description' => 'Staff memulai picking dan packing. Sistem merekam petugas serta waktu proses secara otomatis.', 'tone' => 'bg-amber-50 text-amber-700'],
                                ['number' => '03', 'role' => 'Staff Gudang', 'title' => 'Selesaikan pengiriman', 'description' => 'Staff mengisi jumlah crew, keterangan, dan lampiran sebelum status berubah menjadi Sudah Dikirim.', 'tone' => 'bg-emerald-50 text-emerald-700'],
                            ];
                        @endphp

                        @foreach ($steps as $step)
                            <article class="app-card p-7 transition hover:-translate-y-1 hover:shadow-lg">
                                <div class="flex items-center justify-between">
                                    <span class="flex size-12 items-center justify-center rounded-2xl text-sm font-bold {{ $step['tone'] }}">{{ $step['number'] }}</span>
                                    <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">{{ $step['role'] }}</span>
                                </div>
                                <h3 class="mt-7 text-xl font-bold text-slate-950">{{ $step['title'] }}</h3>
                                <p class="mt-3 leading-7 text-slate-600">{{ $step['description'] }}</p>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>

            <section id="analitik" class="mx-auto max-w-7xl px-6 py-24 lg:px-8">
                <div class="grid gap-12 lg:grid-cols-[0.72fr_1.28fr] lg:items-start">
                    <div class="lg:sticky lg:top-28">
                        <p class="text-sm font-bold uppercase tracking-[0.18em] text-brand-600">Analitik Dashboard</p>
                        <h2 class="mt-4 text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">
                            Lihat gudang dan tujuan dengan pengiriman terbanyak.
                        </h2>
                        <p class="mt-5 leading-7 text-slate-600">
                            Bar chart menampilkan lima tujuan dengan jumlah pengiriman tertinggi berdasarkan gudang dan rentang tanggal yang dipilih.
                        </p>

                        <div class="mt-8 rounded-2xl border border-brand-100 bg-brand-50 p-5">
                            <p class="text-sm font-bold text-brand-800">Tampilan demonstrasi</p>
                            <p class="mt-2 text-sm leading-6 text-brand-700/80">
                                Filter pada landing page hanya mengubah data contoh di sisi tampilan. Data operasional dan aksi CRUD tetap berada di area login.
                            </p>
                        </div>
                    </div>

                    <div id="shipment-demo" class="app-surface p-5 sm:p-7">
                        <div class="flex flex-col gap-4 border-b border-slate-200 pb-6 sm:flex-row sm:items-start sm:justify-between">
                            <div>
                                <div class="flex items-center gap-3">
                                    <span class="flex size-10 items-center justify-center rounded-xl bg-brand-600 text-white">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="size-5" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 19V9m5 10V5m5 14v-7m5 7V3" />
                                        </svg>
                                    </span>
                                    <div>
                                        <h3 class="text-xl font-bold text-slate-950">5 Tujuan dengan Pengiriman Terbanyak</h3>
                                        <p class="mt-1 text-sm text-slate-500">Top 5 outlet berdasarkan jumlah pengiriman pada rentang tanggal.</p>
                                    </div>
                                </div>
                            </div>
                            <span class="inline-flex w-fit rounded-full bg-brand-50 px-3 py-1 text-xs font-bold text-brand-700">Preview Dashboard</span>
                        </div>

                        <div class="mt-6 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                            <label class="block">
                                <span class="mb-2 block text-xs font-bold uppercase tracking-[0.12em] text-slate-500">Gudang</span>
                                <select id="demo-warehouse" class="app-filter">
                                    <option value="all">Semua Gudang</option>
                                    <option value="jakarta">Gudang Jakarta</option>
                                    <option value="surabaya">Gudang Surabaya</option>
                                    <option value="bandung">Gudang Bandung</option>
                                </select>
                            </label>

                            <label class="block">
                                <span class="mb-2 block text-xs font-bold uppercase tracking-[0.12em] text-slate-500">Dari</span>
                                <input id="demo-date-from" type="date" value="2026-07-15" class="app-filter">
                            </label>

                            <label class="block">
                                <span class="mb-2 block text-xs font-bold uppercase tracking-[0.12em] text-slate-500">Sampai</span>
                                <input id="demo-date-to" type="date" value="2026-07-21" class="app-filter">
                            </label>

                            <div class="flex items-end">
                                <button id="demo-last-seven-days" type="button" class="app-button-secondary h-11 w-full px-3 py-0">
                                    7 Hari Terakhir
                                </button>
                            </div>
                        </div>

                        <div class="mt-7 rounded-2xl border border-slate-200 bg-slate-50/70 p-4 sm:p-6">
                            <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
                                <div>
                                    <p class="text-sm font-bold text-slate-900" id="demo-chart-title">Semua Gudang</p>
                                    <p class="mt-1 text-xs text-slate-500" id="demo-chart-range">15 Jul 2026 – 21 Jul 2026</p>
                                </div>
                                <div class="flex items-center gap-2 text-xs font-semibold text-slate-500">
                                    <span class="size-2.5 rounded-sm bg-brand-600"></span>
                                    Jumlah Pengiriman
                                </div>
                            </div>

                            <div class="relative h-[360px] overflow-hidden rounded-xl bg-white px-3 pb-4 pt-7 sm:px-6">
                                <div class="pointer-events-none absolute inset-x-6 bottom-16 top-7 flex flex-col justify-between sm:inset-x-10">
                                    @foreach ([200, 150, 100, 50, 0] as $tick)
                                        <div class="relative border-t border-dashed border-slate-200">
                                            <span class="absolute -left-1 -translate-x-full -translate-y-1/2 pr-2 text-[10px] font-medium text-slate-400">{{ $tick }}</span>
                                        </div>
                                    @endforeach
                                </div>

                                <div id="demo-chart-bars" class="absolute inset-x-6 bottom-14 top-7 grid grid-cols-5 items-end gap-3 border-b border-slate-300 pl-2 sm:inset-x-10 sm:gap-5">
                                    @foreach ([178, 154, 141, 137, 126] as $index => $value)
                                        <div class="flex h-full flex-col justify-end">
                                            <span class="mb-2 text-center text-xs font-bold text-brand-700" data-chart-value>{{ $value }}</span>
                                            <div class="w-full rounded-t-xl bg-gradient-to-t from-brand-600 to-violet-400 shadow-[0_12px_30px_rgba(91,92,226,0.18)] transition-all duration-500" data-chart-bar style="height: {{ ($value / 200) * 100 }}%"></div>
                                        </div>
                                    @endforeach
                                </div>

                                <div id="demo-chart-labels" class="absolute inset-x-6 bottom-0 grid h-14 grid-cols-5 gap-3 pl-2 sm:inset-x-10 sm:gap-5">
                                    @foreach (['Toko Bantu', 'Outlet Kemang', 'Outlet Sleman', 'Mitra Denpasar', 'Mitra Bandung'] as $label)
                                        <div class="flex items-start justify-center pt-2 text-center text-[10px] font-medium leading-4 text-slate-500 sm:text-xs" data-chart-label>{{ $label }}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="fitur" class="border-y border-slate-200 bg-white">
                <div class="mx-auto max-w-7xl px-6 py-24 lg:px-8">
                    <div class="grid gap-12 lg:grid-cols-[0.78fr_1.22fr] lg:items-start">
                        <div>
                            <p class="text-sm font-bold uppercase tracking-[0.18em] text-brand-600">Fitur Utama</p>
                            <h2 class="mt-4 text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">
                                Informasi operasional tersusun dan dapat ditelusuri.
                            </h2>
                            <p class="mt-5 leading-7 text-slate-600">
                                Sistem mendukung pekerjaan harian gudang sekaligus menyediakan dasar data untuk laporan dan evaluasi proses.
                            </p>
                        </div>

                        <div class="grid gap-5 sm:grid-cols-2">
                            @php
                                $features = [
                                    ['title' => 'Input & Import Excel', 'description' => 'Masukkan data pengiriman secara manual atau melalui file Excel dengan validasi.'],
                                    ['title' => 'Monitoring Status', 'description' => 'Pantau Menunggu Antrian, Sedang Diproses, dan Sudah Dikirim dalam satu alur.'],
                                    ['title' => 'Analitik Intensitas', 'description' => 'Lihat tujuan dengan jumlah pengiriman terbanyak berdasarkan gudang dan periode.'],
                                    ['title' => 'Lampiran Pengiriman', 'description' => 'Simpan lebih dari satu foto atau dokumen sebagai bukti penyelesaian pengiriman.'],
                                    ['title' => 'Crew & Checker', 'description' => 'Catat jumlah crew serta identitas petugas berdasarkan akun yang digunakan.'],
                                    ['title' => 'Laporan Excel', 'description' => 'Filter dan unduh laporan berdasarkan tanggal, status, gudang, dan petugas.'],
                                ];
                            @endphp

                            @foreach ($features as $feature)
                                <article class="app-card p-6 transition hover:-translate-y-1 hover:border-brand-200 hover:shadow-lg">
                                    <span class="mb-5 flex size-10 items-center justify-center rounded-xl bg-brand-50 text-brand-700">
                                        <svg viewBox="0 0 20 20" fill="currentColor" class="size-4" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.05l-7.5 10a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 6.98-9.306a.75.75 0 0 1 1.05-.152Z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                    <h3 class="text-base font-bold text-slate-950">{{ $feature['title'] }}</h3>
                                    <p class="mt-2 text-sm leading-6 text-slate-600">{{ $feature['description'] }}</p>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>

            <section class="px-6 py-24 lg:px-8">
                <div class="mx-auto max-w-7xl overflow-hidden rounded-[2rem] bg-gradient-to-br from-brand-700 via-brand-600 to-violet-500 px-8 py-12 text-white shadow-2xl shadow-brand-600/20 sm:px-12 lg:flex lg:items-center lg:justify-between lg:px-16">
                    <div class="max-w-2xl">
                        <h2 class="text-3xl font-bold tracking-tight">Siap masuk ke sistem pengiriman?</h2>
                        <p class="mt-4 leading-7 text-white/75">
                            Akses aplikasi diberikan kepada user internal sesuai role dan gudang yang telah ditentukan.
                        </p>
                    </div>

                    <div class="mt-8 lg:mt-0">
                        @auth
                            <a href="{{ route('dashboard') }}" class="inline-flex rounded-xl bg-white px-6 py-3.5 text-sm font-bold text-brand-700 transition hover:-translate-y-0.5 hover:bg-brand-50">
                                Buka Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="inline-flex rounded-xl bg-white px-6 py-3.5 text-sm font-bold text-brand-700 transition hover:-translate-y-0.5 hover:bg-brand-50">
                                Masuk ke Sistem
                            </a>
                        @endauth
                    </div>
                </div>
            </section>
        </main>

        <footer class="border-t border-slate-200 bg-white">
            <div class="mx-auto flex max-w-7xl flex-col gap-3 px-6 py-8 text-sm text-slate-500 sm:flex-row sm:items-center sm:justify-between lg:px-8">
                <p>&copy; {{ now()->year }} Warehouse Dispatch System.</p>
                <p>Sistem Monitoring Pengiriman Gudang</p>
            </div>
        </footer>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const datasets = {
                    all: {
                        title: 'Semua Gudang',
                        labels: ['Toko Bantu', 'Outlet Kemang', 'Outlet Sleman', 'Mitra Denpasar', 'Mitra Bandung'],
                        values: [178, 154, 141, 137, 126],
                    },
                    jakarta: {
                        title: 'Gudang Jakarta',
                        labels: ['Outlet Kemang', 'Toko Bantu', 'Mitra Bekasi', 'Outlet Depok', 'Mitra Bogor'],
                        values: [94, 86, 73, 65, 54],
                    },
                    surabaya: {
                        title: 'Gudang Surabaya',
                        labels: ['Outlet Darmo', 'Mitra Sidoarjo', 'Outlet Gresik', 'Toko Rungkut', 'Mitra Mojokerto'],
                        values: [88, 79, 71, 63, 52],
                    },
                    bandung: {
                        title: 'Gudang Bandung',
                        labels: ['Mitra Bandung', 'Outlet Cimahi', 'Toko Dago', 'Outlet Lembang', 'Mitra Sumedang'],
                        values: [82, 74, 66, 57, 48],
                    },
                };

                const warehouse = document.getElementById('demo-warehouse');
                const dateFrom = document.getElementById('demo-date-from');
                const dateTo = document.getElementById('demo-date-to');
                const lastSevenDays = document.getElementById('demo-last-seven-days');
                const title = document.getElementById('demo-chart-title');
                const range = document.getElementById('demo-chart-range');
                const bars = [...document.querySelectorAll('[data-chart-bar]')];
                const labels = [...document.querySelectorAll('[data-chart-label]')];
                const values = [...document.querySelectorAll('[data-chart-value]')];

                if (!warehouse || !dateFrom || !dateTo || bars.length === 0) {
                    return;
                }

                const formatDate = (value) => {
                    if (!value) return '-';
                    return new Intl.DateTimeFormat('id-ID', {
                        day: '2-digit',
                        month: 'short',
                        year: 'numeric',
                    }).format(new Date(`${value}T00:00:00`));
                };

                const dayCount = () => {
                    const start = new Date(`${dateFrom.value}T00:00:00`);
                    const end = new Date(`${dateTo.value}T00:00:00`);
                    const difference = Math.round((end - start) / 86400000) + 1;
                    return Number.isFinite(difference) && difference > 0 ? difference : 7;
                };

                const renderChart = () => {
                    const data = datasets[warehouse.value] ?? datasets.all;
                    const scale = Math.min(Math.max(dayCount() / 7, 0.35), 2);
                    const scaledValues = data.values.map((value) => Math.max(1, Math.round(value * scale)));
                    const maxValue = Math.max(...scaledValues, 200);

                    title.textContent = data.title;
                    range.textContent = `${formatDate(dateFrom.value)} – ${formatDate(dateTo.value)}`;

                    bars.forEach((bar, index) => {
                        const value = scaledValues[index];
                        bar.style.height = `${Math.max((value / maxValue) * 100, 8)}%`;
                        labels[index].textContent = data.labels[index];
                        values[index].textContent = new Intl.NumberFormat('id-ID').format(value);
                    });
                };

                warehouse.addEventListener('change', renderChart);
                dateFrom.addEventListener('change', renderChart);
                dateTo.addEventListener('change', renderChart);

                lastSevenDays.addEventListener('click', () => {
                    dateFrom.value = '2026-07-15';
                    dateTo.value = '2026-07-21';
                    renderChart();
                });

                renderChart();
            });
        </script>
    </body>
</html>
