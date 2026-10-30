<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $products = [
            [
                'name' => 'Samsung Galaxy S25',
                'description' => 'Viedtālrunis ar augstas izšķirtspējas kameru un 256 GB atmiņu.',
            ],
            [
                'name' => 'Apple MacBook Air M4',
                'description' => 'Viegls portatīvais dators darbam un ikdienas lietošanai.',
            ],
            [
                'name' => 'Sony WH-1000XM5',
                'description' => 'Bezvadu austiņas ar aktīvo trokšņu slāpēšanu.',
            ],
            [
                'name' => 'Logitech MX Master 3S',
                'description' => 'Ergonomiska bezvadu pele darbam pie datora.',
            ],
            [
                'name' => 'Dell UltraSharp Monitor',
                'description' => 'Augstas izšķirtspējas monitors profesionālam darbam.',
            ],
            [
                'name' => 'Apple iPad Air',
                'description' => 'Universāls planšetdators darbam un izklaidei.',
            ],
            [
                'name' => 'Samsung 55 inch Smart TV',
                'description' => 'Viedais televizors ar 4K izšķirtspēju.',
            ],
            [
                'name' => 'Kingston 1TB SSD',
                'description' => 'Ātrs ārējais SSD datu glabāšanai.',
            ],
            [
                'name' => 'Nike Air Max',
                'description' => 'Ikdienas sporta apavi ar ērtu zoli.',
            ],
            [
                'name' => 'Adidas Hoodie',
                'description' => 'Ērts kokvilnas sporta džemperis.',
            ],
            [
                'name' => 'Levis Denim Jeans',
                'description' => 'Klasiski džinsi ikdienas valkāšanai.',
            ],
            [
                'name' => 'North Face Backpack',
                'description' => 'Izturīga mugursoma ceļojumiem un ikdienai.',
            ],
            [
                'name' => 'Philips Air Fryer',
                'description' => 'Karstā gaisa fritieris veselīgākai ēdiena pagatavošanai.',
            ],
            [
                'name' => 'Bosch Coffee Machine',
                'description' => 'Automātisks kafijas automāts kafijas pagatavošanai.',
            ],
            [
                'name' => 'Dyson Vacuum Cleaner',
                'description' => 'Jaudīgs putekļsūcējs mājas uzkopšanai.',
            ],
            [
                'name' => 'IKEA Desk Lamp',
                'description' => 'LED galda lampa ar regulējamu apgaismojumu.',
            ],
            [
                'name' => 'Xiaomi Power Bank',
                'description' => 'Pārnēsājams ārējais akumulators mobilajām ierīcēm.',
            ],
            [
                'name' => 'JBL Bluetooth Speaker',
                'description' => 'Pārnēsājams bezvadu skaļrunis ar kvalitatīvu skaņu.',
            ],
            [
                'name' => 'Canon EOS Camera',
                'description' => 'Digitālā kamera fotografēšanai un video uzņemšanai.',
            ],
            [
                'name' => 'Garmin Smart Watch',
                'description' => 'Viedpulkstenis sporta aktivitāšu un veselības datu uzraudzībai.',
            ],
        ];

        $product = fake()->randomElement($products);

return [
    'name' => $product['name'],
    'quantity' => fake()->numberBetween(0, 150),
    'description' => $product['description'],
    'expiration_date' => fake()
        ->dateTimeBetween('now', '+2 years')
        ->format('Y-m-d'),
    'status' => fake()->randomElement([
        'active',
        'inactive',
    ]),
        'price' => fake()->randomFloat(2, 5, 2000),
        ];
    }
}
