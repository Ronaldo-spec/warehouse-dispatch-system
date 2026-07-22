<?php

use Illuminate\Support\Facades\Route;

test('forwarded https headers are trusted for generated urls', function () {
    Route::get('/_proxy-url-test', fn () => url('/build/example.css'));

    $response = $this
        ->withServerVariables([
            'REMOTE_ADDR' => '127.0.0.1',
            'HTTP_HOST' => '127.0.0.1:8000',
            'HTTP_X_FORWARDED_HOST' => 'preview.example.test',
            'HTTP_X_FORWARDED_PROTO' => 'https',
            'HTTP_X_FORWARDED_PORT' => '443',
        ])
        ->get('/_proxy-url-test');

    $response
        ->assertOk()
        ->assertSeeText('https://preview.example.test/build/example.css');
});
