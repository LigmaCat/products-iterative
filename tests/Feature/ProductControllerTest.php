<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_products_index_page_is_accessible(): void
    {
        Product::factory()->count(3)->create();

        $response = $this->get(route('products.index'));

        $response->assertOk();
        $response->assertViewIs('products.index');
    }

    public function test_create_product_page_is_accessible(): void
    {
        $response = $this->get(route('products.create'));

        $response->assertOk();
        $response->assertViewIs('products.create');
    }

    public function test_product_can_be_created(): void
    {
        $productData = [
            'name' => 'Test Product',
            'quantity' => 10,
            'description' => 'Test description',
            'expiration_date' => '2027-12-31',
            'status' => 'active',
            'price' => '10.15',
        ];

        $response = $this->post(
            route('products.store'),
            $productData
        );


        $this->assertDatabaseHas('products', [
            'name' => 'Test Product',
            'quantity' => 10,
        ]);

        $product = Product::where('name', 'Test Product')->firstOrFail();

        $response->assertRedirect(route('products.show', $product));
    }

    public function test_product_show_page_is_accessible(): void
    {
        $product = Product::factory()->create();

        $response = $this->get(
            route('products.show', $product)
        );

        $response->assertOk();
        $response->assertViewIs('products.show');
    }

    public function test_edit_product_page_is_accessible(): void
    {
        $product = Product::factory()->create();

        $response = $this->get(
            route('products.edit', $product)
        );

        $response->assertOk();
        $response->assertViewIs('products.edit');
    }

public function test_product_can_be_updated(): void
{
    $product = Product::factory()->create();

    $updatedData = [
        'name' => 'Updated Product',
        'quantity' => 25,
        'description' => 'Updated description',
        'expiration_date' => '2028-06-30',
        'status' => 'active',
    ];

    $response = $this->put(
        route('products.update', $product),
        $updatedData
    );

    $response->assertRedirect(route('products.show', $product));

    $this->assertDatabaseHas('products', [
        'id' => $product->id,
        'name' => 'Updated Product',
        'quantity' => 25,
    ]);
}

    public function test_product_can_be_deleted(): void
    {
        $product = Product::factory()->create();

        $response = $this->delete(
            route('products.destroy', $product)
        );

        $response->assertRedirect(route('products.index'));

        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
        ]);
    }

    public function test_product_creation_requires_valid_data(): void
    {
        $response = $this->post(
            route('products.store'),
            [
                'name' => '',
                'quantity' => -5,
                'description' => '',
                'expiration_date' => 'invalid-date',
                'status' => '',
            ]
        );

        $response->assertSessionHasErrors([
            'name',
            'quantity',
            'expiration_date',
            'status',
        ]);

        $this->assertDatabaseCount('products', 0);
    }

    public function test_product_update_requires_valid_data(): void
    {
        $product = Product::factory()->create();

        $response = $this->put(
            route('products.update', $product),
            [
                'name' => '',
                'quantity' => -1,
                'expiration_date' => 'invalid-date',
                'status' => '',
            ]
        );

        $response->assertSessionHasErrors([
            'name',
            'quantity',
            'expiration_date',
            'status',
        ]);
    }

    public function test_non_existing_product_returns_404(): void
    {
        $response = $this->get(
            route('products.show', 99999)
        );

        $response->assertNotFound();
    }
}
