<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();

        $products = [
            [
                'sku' => 'KS93528TUT',
                'name' => 'Mouse, model no.1',
                'quantity' => 10,
                'price' => 15.4,
                'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc mattis, augue ut egestas mollis, nisi leo vestibulum lacus, non rhoncus velit lectus non odio. Etiam urna risus, cursus sed enim consectetur, porta semper magna.',
                'user_id' => 1
            ],
            [
                'sku' => 'KS93528ABC',
                'name' => 'Mouse, model no.2',
                'quantity' => 8,
                'price' => 20.04,
                'description' => 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc vulputate velit id odio volutpat facilisis vitae in leo. ',
                'user_id' => 1
            ],
            [
                'sku' => 'KS93528RST',
                'name' => 'Mouse, model no.3',
                'quantity' => 25,
                'price' => 5.4,
                'description' => 'Nulla in nisi mi. Integer non faucibus ligula. Mauris elit purus, congue eget suscipit a, hendrerit vitae ligula. Vestibulum tempor ullamcorper convallis.',
                'user_id' => 1
            ]
        ];

        foreach ($products as $product){
            Product::create($product);
        }
    }
}
