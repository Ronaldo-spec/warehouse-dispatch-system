<?php

test('landing page can be displayed', function () {
    $this->withoutVite();

    $response = $this->get(route('home'));

    $response
        ->assertOk()
        ->assertSee('Sistem Monitoring Pengiriman Gudang')
        ->assertSee('Pantau proses pengiriman gudang dengan lebih terukur.')
        ->assertSee('Menunggu Antrian')
        ->assertSee('Sedang Diproses')
        ->assertSee('Sudah Dikirim')
        ->assertSee('Masuk ke Sistem');
});
