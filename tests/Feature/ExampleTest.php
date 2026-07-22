<?php

test('landing page can be displayed', function () {
    $this->withoutVite();

    $response = $this->get(route('home'));

    $response
        ->assertOk()
        ->assertSee('Sistem Monitoring Pengiriman Gudang')
        ->assertSee('Pantau distribusi dengan data yang lebih jelas.')
        ->assertSee('Menunggu Antrian')
        ->assertSee('Sedang Diproses')
        ->assertSee('Sudah Dikirim')
        ->assertSee('5 Tujuan dengan Pengiriman Terbanyak')
        ->assertSee('Semua Gudang')
        ->assertSee('7 Hari Terakhir')
        ->assertSee('Masuk ke Sistem');
});
