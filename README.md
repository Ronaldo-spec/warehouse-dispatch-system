# Warehouse Dispatch System

Aplikasi web internal untuk memusatkan pencatatan dan pemantauan proses pengiriman gudang, mulai dari order masuk sampai pengiriman dinyatakan selesai.

## Latar Belakang

Proses pengiriman gudang membutuhkan informasi yang mudah ditelusuri mengenai order yang menunggu, sedang diproses, dan sudah dikirim. Ketika pencatatan masih tersebar pada file Excel atau komunikasi manual, pemantauan status, petugas, jumlah crew, lampiran, dan laporan menjadi lebih sulit dilakukan secara konsisten.

Warehouse Dispatch System dirancang sebagai pusat data operasional agar setiap tahapan pengiriman memiliki status, waktu, dan penanggung jawab yang jelas.

## Tujuan

- Menyatukan data pengiriman gudang dalam satu sistem.
- Memantau progres pengiriman berdasarkan status operasional.
- Mencatat petugas, waktu proses, jumlah crew, dan lampiran pengiriman.
- Menyediakan dashboard untuk melihat kondisi pengiriman secara ringkas.
- Menyediakan laporan yang dapat difilter dan digunakan untuk evaluasi operasional.
- Menjaga riwayat perubahan status agar proses dapat ditelusuri kembali.

## Alur Utama

1. Admin membuat data pengiriman melalui input manual atau import Excel.
2. Data baru masuk dengan status **Menunggu Antrian**.
3. Staff Gudang mengambil order dan mengubah status menjadi **Sedang Diproses**.
4. Staff melengkapi data pengiriman, jumlah crew, keterangan, dan lampiran.
5. Setelah disubmit, status berubah menjadi **Sudah Dikirim**.

## Ruang Lingkup Pengembangan

- Autentikasi dan pembagian hak akses pengguna.
- Master user, gudang, dan tujuan pengiriman.
- Input pengiriman secara manual.
- Import data pengiriman dari Excel.
- Pengelolaan status pengiriman.
- Upload lebih dari satu lampiran pengiriman.
- Dashboard ringkasan status dan intensitas pengiriman.
- Filter berdasarkan gudang dan rentang tanggal.
- Export laporan pengiriman.
- Riwayat perubahan status dan aktivitas pengguna.

## Teknologi

- PHP 8.3+
- Laravel 13
- Livewire 4
- Tailwind CSS
- Flux UI
- MySQL atau MariaDB
- Vite

## Status Pengembangan

Project masih berada dalam tahap pengembangan. Tampilan dashboard dan data pada landing page saat ini digunakan sebagai gambaran alur dan konsep aplikasi sebelum modul transaksi terhubung sepenuhnya dengan database.
