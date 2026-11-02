<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('the products page is accessible from homepage', function () {
    $response = $this->get('/');

    $response->assertRedirect(route('products.index'));

    $this->get(route('products.index'))
        ->assertOk();
});
