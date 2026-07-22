<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistem Monitoring Pengiriman Gudang</title>
        <meta
            name="description"
            content="Sistem internal untuk memantau antrean, proses, dan penyelesaian pengiriman gudang."
        >

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="min-h-screen bg-slate-950 font-sans text-slate-100 antialiased">
        <div class="relative isolate overflow-hidden">
            <div class="absolute inset-x-0 top-0 -z-10 h-[720px] bg-[radial-gradient(circle_at_top_left,_rgba(20,184,166,0.18),_transparent_40%),radial-gradient(circle_at_top_right,_rgba(59,130,246,0.18),_transparent_38%)]"></div>
            <div class="absolute inset-x-0 top-0 -z-20 h-[720px] bg-slate-950"></div>

            <header class="border-b border-white/10 bg-slate-950/80 backdrop-blur-xl">
                <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-5 lg:px-8">
                    <a href="{{ route('home') }}" class="flex items-center gap-3" aria-label="Halaman utama">
                        <span class="flex size-11 items-center justify-center rounded-2xl bg-teal-500 text-slate-950 shadow-lg shadow-teal-500/20">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="size-6" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 7.5 12 3l8.25 4.5L12 12 3.75 7.5Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12 12 16.5 20.25 12M3.75 16.5 12 21l8.25-4.5" />
                            </svg>
                        </span>
                        <span>
                            <span class="block text-sm font-semibold tracking-wide text-white">Warehouse Dispatch</span>
                            <span class="block text-xs text-slate-400">Monitoring Pengiriman Gudang</span>
                        </span>
                    </a>

                    <nav class="flex items-center gap-3" aria-label="Navigasi utama">
                        @auth
                            <a
                                href="{{ route('dashboard') }}"
                                class="inline-flex items-center justify-center rounded-xl bg-teal-400 px-5 py-2.5 text-sm font-semibold text-slate-950 transition hover:bg-teal-300 focus:outline-none focus:ring-2 focus:ring-teal-300 focus:ring-offset-2 focus:ring-offset-slate-950"
                            >
                                Buka Dashboard
                            </a>
                        @else
                            <a
                                href="{{ route('login') }}"
                                class="inline-flex items-center justify-center rounded-xl border border-white/15 bg-white/5 px-5 py-2.5 text-sm font-semibold text-white transition hover:border-teal-300/50 hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-teal-300 focus:ring-offset-2 focus:ring-offset-slate-950"
                            >
                                Masuk
                            </a>
                        @endauth
                    </nav>
                </div>
            </header>

            <main>
                <section class="mx-auto grid max-w-7xl gap-16 px-6 pb-24 pt-20 lg:grid-cols-[1.05fr_0.95fr] lg:items-center lg:px-8 lg:pb-32 lg:pt-28">
                    <div>
                        <div class="mb-7 inline-flex items-center gap-2 rounded-full border border-teal-300/20 bg-teal-300/10 px-4 py-2 text-sm font-medium text-teal-200">
                            <span class="size-2 rounded-full bg-teal-300"></span>
                            Pengelolaan pengiriman dalam satu sistem
                        </div>

                        <h1 class="max-w-3xl text-4xl font-semibold tracking-tight text-white sm:text-5xl lg:text-6xl lg:leading-[1.08]">
                            Pantau proses pengiriman gudang dengan lebih terukur.
                        </h1>

                        <p class="mt-7 max-w-2xl text-lg leading-8 text-slate-300">
                            Mulai dari input order, proses picking dan packing, hingga pengiriman selesai.
                            Setiap perubahan status, petugas, waktu proses, crew, dan lampiran tercatat secara konsisten.
                        </p>

                        <div class="mt-10 flex flex-wrap items-center gap-4">
                            @auth
                                <a
                                    href="{{ route('dashboard') }}"
                                    class="inline-flex items-center gap-2 rounded-xl bg-teal-400 px-6 py-3.5 text-sm font-semibold text-slate-950 shadow-lg shadow-teal-500/20 transition hover:-translate-y-0.5 hover:bg-teal-300"
                                >
                                    Masuk ke Dashboard
                                    <svg viewBox="0 0 20 20" fill="currentColor" class="size-4" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M3.75 10a.75.75 0 0 1 .75-.75h9.19L10.47 6.03a.75.75 0 0 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 1 1-1.06-1.06l3.22-3.22H4.5a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            @else
                                <a
                                    href="{{ route('login') }}"
                                    class="inline-flex items-center gap-2 rounded-xl bg-teal-400 px-6 py-3.5 text-sm font-semibold text-slate-950 shadow-lg shadow-teal-500/20 transition hover:-translate-y-0.5 hover:bg-teal-300"
                                >
                                    Masuk ke Sistem
                                    <svg viewBox="0 0 20 20" fill="currentColor" class="size-4" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M3.75 10a.75.75 0 0 1 .75-.75h9.19L10.47 6.03a.75.75 0 0 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 1 1-1.06-1.06l3.22-3.22H4.5a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            @endauth

                            <a href="#alur" class="px-2 py-3 text-sm font-semibold text-slate-300 transition hover:text-white">
                                Lihat alur operasional
                            </a>
                        </div>

                        <dl class="mt-14 grid max-w-2xl grid-cols-3 gap-5 border-t border-white/10 pt-7">
                            <div>
                                <dt class="text-xs font-medium uppercase tracking-[0.16em] text-slate-500">Input</dt>
                                <dd class="mt-2 text-sm font-semibold text-slate-200">Manual & Excel</dd>
                            </div>
                            <div>
                                <dt class="text-xs font-medium uppercase tracking-[0.16em] text-slate-500">Kontrol</dt>
                                <dd class="mt-2 text-sm font-semibold text-slate-200">Status & Riwayat</dd>
                            </div>
                            <div>
                                <dt class="text-xs font-medium uppercase tracking-[0.16em] text-slate-500">Output</dt>
                                <dd class="mt-2 text-sm font-semibold text-slate-200">Dashboard & Laporan</dd>
                            </div>
                        </dl>
                    </div>

                    <div class="relative">
                        <div class="absolute -inset-8 -z-10 rounded-[2rem] bg-teal-400/10 blur-3xl"></div>

                        <div class="overflow-hidden rounded-[1.75rem] border border-white/10 bg-slate-900/90 shadow-2xl shadow-black/30">
                            <div class="flex items-center justify-between border-b border-white/10 px-6 py-5">
                                <div>
                                    <p class="text-sm font-semibold text-white">Ringkasan Pengiriman</p>
                                    <p class="mt-1 text-xs text-slate-500">Aktivitas operasional hari ini</p>
                                </div>
                                <div class="rounded-xl border border-white/10 bg-white/5 px-3 py-2 text-xs font-medium text-slate-300">
                                    Hari ini
                                </div>
                            </div>

                            <div class="grid gap-4 p-6 sm:grid-cols-3 lg:grid-cols-1 xl:grid-cols-3">
                                <div class="rounded-2xl border border-slate-700/80 bg-slate-950/60 p-5">
                                    <div class="flex items-center justify-between">
                                        <span class="flex size-10 items-center justify-center rounded-xl bg-slate-700/60 text-slate-200">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="size-5" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2" />
                                                <circle cx="12" cy="12" r="8.5" />
                                            </svg>
                                        </span>
                                        <span class="text-xs font-medium text-slate-500">01</span>
                                    </div>
                                    <p class="mt-5 text-3xl font-semibold text-white">12</p>
                                    <p class="mt-1 text-sm text-slate-400">Menunggu Antrian</p>
                                </div>

                                <div class="rounded-2xl border border-amber-400/20 bg-amber-400/5 p-5">
                                    <div class="flex items-center justify-between">
                                        <span class="flex size-10 items-center justify-center rounded-xl bg-amber-400/10 text-amber-300">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="size-5" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 15.5V8.75A1.75 1.75 0 0 1 5.75 7h8.5A1.75 1.75 0 0 1 16 8.75v6.75M7 18h10M9 4h6" />
                                            </svg>
                                        </span>
                                        <span class="text-xs font-medium text-amber-300/70">02</span>
                                    </div>
                                    <p class="mt-5 text-3xl font-semibold text-white">7</p>
                                    <p class="mt-1 text-sm text-slate-400">Sedang Diproses</p>
                                </div>

                                <div class="rounded-2xl border border-teal-400/20 bg-teal-400/5 p-5">
                                    <div class="flex items-center justify-between">
                                        <span class="flex size-10 items-center justify-center rounded-xl bg-teal-400/10 text-teal-300">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="size-5" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m7.5 12 3 3 6-7" />
                                                <circle cx="12" cy="12" r="8.5" />
                                            </svg>
                                        </span>
                                        <span class="text-xs font-medium text-teal-300/70">03</span>
                                    </div>
                                    <p class="mt-5 text-3xl font-semibold text-white">24</p>
                                    <p class="mt-1 text-sm text-slate-400">Sudah Dikirim</p>
                                </div>
                            </div>

                            <div class="mx-6 mb-6 rounded-2xl border border-white/10 bg-gradient-to-r from-teal-400/10 to-blue-400/10 p-5">
                                <div class="flex items-end justify-between gap-6">
                                    <div>
                                        <p class="text-xs font-medium uppercase tracking-[0.14em] text-slate-400">Total Tonase Hari Ini</p>
                                        <p class="mt-2 text-3xl font-semibold text-white">5.770 <span class="text-base font-medium text-slate-400">kg</span></p>
                                    </div>
                                    <span class="flex size-11 items-center justify-center rounded-xl bg-white/10 text-teal-200">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="size-6" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m5 16 4.5-4.5 3 3L19 8" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 8h4v4" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="alur" class="border-y border-white/10 bg-slate-900/60">
                    <div class="mx-auto max-w-7xl px-6 py-24 lg:px-8">
                        <div class="max-w-2xl">
                            <p class="text-sm font-semibold uppercase tracking-[0.18em] text-teal-300">Alur Operasional</p>
                            <h2 class="mt-4 text-3xl font-semibold tracking-tight text-white sm:text-4xl">
                                Tiga tahap utama yang mudah dipantau.
                            </h2>
                            <p class="mt-5 text-base leading-7 text-slate-400">
                                Setiap order bergerak melalui status yang terstruktur agar tidak ada proses yang terlewat.
                            </p>
                        </div>

                        <div class="mt-14 grid gap-6 lg:grid-cols-3">
                            <article class="rounded-3xl border border-white/10 bg-slate-950/70 p-7">
                                <div class="flex items-center justify-between">
                                    <span class="flex size-12 items-center justify-center rounded-2xl bg-slate-800 text-lg font-semibold text-white">1</span>
                                    <span class="rounded-full bg-slate-800 px-3 py-1 text-xs font-medium text-slate-300">Admin</span>
                                </div>
                                <h3 class="mt-7 text-xl font-semibold text-white">Input order pengiriman</h3>
                                <p class="mt-3 leading-7 text-slate-400">
                                    Data dibuat melalui form atau diimpor dari Excel. Status awal otomatis menjadi Menunggu Antrian.
                                </p>
                            </article>

                            <article class="rounded-3xl border border-amber-300/15 bg-slate-950/70 p-7">
                                <div class="flex items-center justify-between">
                                    <span class="flex size-12 items-center justify-center rounded-2xl bg-amber-400/10 text-lg font-semibold text-amber-300">2</span>
                                    <span class="rounded-full bg-amber-400/10 px-3 py-1 text-xs font-medium text-amber-200">Staff Gudang</span>
                                </div>
                                <h3 class="mt-7 text-xl font-semibold text-white">Mulai proses order</h3>
                                <p class="mt-3 leading-7 text-slate-400">
                                    Staff memulai picking dan packing. Sistem merekam petugas serta waktu proses secara otomatis.
                                </p>
                            </article>

                            <article class="rounded-3xl border border-teal-300/15 bg-slate-950/70 p-7">
                                <div class="flex items-center justify-between">
                                    <span class="flex size-12 items-center justify-center rounded-2xl bg-teal-400/10 text-lg font-semibold text-teal-300">3</span>
                                    <span class="rounded-full bg-teal-400/10 px-3 py-1 text-xs font-medium text-teal-200">Staff Gudang</span>
                                </div>
                                <h3 class="mt-7 text-xl font-semibold text-white">Selesaikan pengiriman</h3>
                                <p class="mt-3 leading-7 text-slate-400">
                                    Staff melengkapi jumlah crew, keterangan, dan lampiran sebelum status berubah menjadi Sudah Dikirim.
                                </p>
                            </article>
                        </div>
                    </div>
                </section>

                <section class="mx-auto max-w-7xl px-6 py-24 lg:px-8">
                    <div class="grid gap-12 lg:grid-cols-[0.8fr_1.2fr] lg:items-start">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.18em] text-teal-300">Fitur Utama</p>
                            <h2 class="mt-4 text-3xl font-semibold tracking-tight text-white sm:text-4xl">
                                Informasi operasional tersusun dan dapat ditelusuri.
                            </h2>
                            <p class="mt-5 leading-7 text-slate-400">
                                Sistem dirancang untuk mendukung pekerjaan harian gudang sekaligus menyediakan data laporan yang konsisten.
                            </p>
                        </div>

                        <div class="grid gap-5 sm:grid-cols-2">
                            @php
                                $features = [
                                    ['title' => 'Import Excel', 'description' => 'Validasi dan masukkan data pengiriman dalam jumlah banyak.'],
                                    ['title' => 'Monitoring Status', 'description' => 'Pantau antrean, proses, dan pengiriman selesai dalam satu tampilan.'],
                                    ['title' => 'Lampiran Pengiriman', 'description' => 'Simpan lebih dari satu foto atau dokumen sebagai bukti.'],
                                    ['title' => 'Data Crew & Checker', 'description' => 'Catat crew dan identitas petugas berdasarkan akun sistem.'],
                                    ['title' => 'Riwayat Aktivitas', 'description' => 'Telusuri perubahan status, waktu, dan user yang melakukan aksi.'],
                                    ['title' => 'Laporan Excel', 'description' => 'Filter dan unduh laporan berdasarkan tanggal, status, dan gudang.'],
                                ];
                            @endphp

                            @foreach ($features as $feature)
                                <article class="rounded-2xl border border-white/10 bg-white/[0.035] p-6 transition hover:-translate-y-0.5 hover:border-teal-300/30 hover:bg-white/[0.055]">
                                    <span class="mb-5 block size-2 rounded-full bg-teal-300"></span>
                                    <h3 class="text-base font-semibold text-white">{{ $feature['title'] }}</h3>
                                    <p class="mt-2 text-sm leading-6 text-slate-400">{{ $feature['description'] }}</p>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </section>

                <section class="px-6 pb-24 lg:px-8">
                    <div class="mx-auto max-w-7xl overflow-hidden rounded-[2rem] border border-teal-300/15 bg-gradient-to-br from-teal-400/15 via-slate-900 to-blue-400/10 px-8 py-12 sm:px-12 lg:flex lg:items-center lg:justify-between lg:px-16">
                        <div class="max-w-2xl">
                            <h2 class="text-3xl font-semibold tracking-tight text-white">Siap masuk ke sistem pengiriman?</h2>
                            <p class="mt-4 leading-7 text-slate-300">
                                Akses diberikan kepada user internal sesuai role dan gudang yang telah ditentukan.
                            </p>
                        </div>

                        <div class="mt-8 lg:mt-0">
                            @auth
                                <a href="{{ route('dashboard') }}" class="inline-flex rounded-xl bg-white px-6 py-3.5 text-sm font-semibold text-slate-950 transition hover:bg-teal-50">
                                    Buka Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="inline-flex rounded-xl bg-white px-6 py-3.5 text-sm font-semibold text-slate-950 transition hover:bg-teal-50">
                                    Masuk ke Sistem
                                </a>
                            @endauth
                        </div>
                    </div>
                </section>
            </main>

            <footer class="border-t border-white/10">
                <div class="mx-auto flex max-w-7xl flex-col gap-3 px-6 py-8 text-sm text-slate-500 sm:flex-row sm:items-center sm:justify-between lg:px-8">
                    <p>&copy; {{ now()->year }} Warehouse Dispatch System.</p>
                    <p>Sistem Monitoring Pengiriman Gudang</p>
                </div>
            </footer>
        </div>
    </body>
</html>
