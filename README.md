# Warehouse Dispatch System

Sistem monitoring pengiriman gudang berbasis Laravel dan Livewire.

## Menjalankan project lokal

```powershell
composer run dev
```

Aplikasi dapat dibuka melalui `http://localhost:8000`.

## Membagikan public preview

Project menyediakan perintah khusus Windows untuk membuat URL publik sementara menggunakan Cloudflare Quick Tunnel.

Sebelum menjalankan public preview, hentikan `composer run dev` apabila masih aktif agar port Laravel dan Vite development server tidak bentrok.

```powershell
composer run preview:public
```

Perintah tersebut akan:

1. memastikan dependency Composer dan frontend tersedia;
2. menghapus penanda Vite development server (`public/hot`) agar CSS dan JavaScript tidak mengarah ke `localhost:5173`;
3. membangun asset terbaru menggunakan Vite;
4. memverifikasi bahwa `public/build/manifest.json` tersedia;
5. mengunduh `cloudflared.exe` resmi ke folder lokal `.tools` jika belum tersedia;
6. menjalankan Laravel pada `127.0.0.1:8000` dengan debug dinonaktifkan;
7. menampilkan URL sementara berbentuk `https://...trycloudflare.com`.

Laravel dikonfigurasi untuk mempercayai forwarded host dan protocol dari reverse proxy. Konfigurasi ini diperlukan agar URL CSS, JavaScript, route, dan redirect menggunakan hostname tunnel dan protokol HTTPS, bukan alamat origin lokal.

Salin URL yang muncul di terminal dan kirimkan kepada pihak yang akan melihat demo. Terminal harus tetap terbuka selama URL digunakan. Tekan `Ctrl+C` untuk menghentikan preview.

Port dapat diganti dengan menjalankan script secara langsung:

```powershell
powershell -NoProfile -ExecutionPolicy Bypass -File scripts/share-preview.ps1 -Port 8080
```

### Batasan public preview

- URL berubah setiap kali tunnel dijalankan kembali.
- Preview berhenti ketika terminal atau komputer dimatikan.
- Fitur ini hanya untuk demo dan pengujian, bukan deployment production.
- Jangan membagikan preview ketika aplikasi telah berisi data rahasia atau akun production.
- Untuk alamat tetap dan penggunaan berkelanjutan, gunakan server/VPS atau Cloudflare Named Tunnel dengan domain milik Customer.
