<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\seller;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('sellers')->insert([
            'name' => "AAA",
            'point' => 9.2,
        ]);
        DB::table('sellers')->insert([
            'name' => "BBB",
            'point' => 7.6,
        ]);
        DB::table('sellers')->insert([
            'name' => "CCC",
            'point' => 8.3,
        ]);
        DB::table('sellers')->insert([
            'name' => "DDD",
            'point' => 9.5,
        ]);
        DB::table('sellers')->insert([
            'name' => "EEE",
            'point' => 6.8,
        ]);
        DB::table('products')->insert([
            'name' => "jacket",
            'description' => "M",
            'image' => "img/jacket.jpg"
        ]);
        DB::table('products')->insert([
            'name' => "sweatshirt",
            'description' => "M",
            'image' => "img/sweatshirt.jpg"
        ]);
        DB::table('products')->insert([
            'name' => "tshirt",
            'description' => "S",
            'image' => "img/tshirt.jpg"
        ]);
        DB::table('products')->insert([
            'name' => "sweatshirt",
            'description' => "L",
            'image' => "img/sweatshirt2.jpg"
        ]);
        DB::table('products')->insert([
            'name' => "short",
            'description' => "XS",
            'image' => "img/short.jpg"
        ]);
        DB::table('product_sellers')->insert([
            'sellerId' => "1",
            'productId' => "1",
            'price' => "110",
            'stock' => "700"
        ]);
        DB::table('product_sellers')->insert([
            'sellerId' => "1",
            'productId' => "2",
            'price' => "230",
            'stock' => "1000"
        ]);
        DB::table('product_sellers')->insert([
            'sellerId' => "1",
            'productId' => "3",
            'price' => "340",
            'stock' => "500"
        ]);
        DB::table('product_sellers')->insert([
            'sellerId' => "2",
            'productId' => "2",
            'price' => "400",
            'stock' => "230"
        ]);
        DB::table('product_sellers')->insert([
            'sellerId' => "2",
            'productId' => "3",
            'price' => "190",
            'stock' => "250"
        ]);
        DB::table('product_sellers')->insert([
            'sellerId' => "2",
            'productId' => "4",
            'price' => "170",
            'stock' => "1000"
        ]);
        DB::table('product_sellers')->insert([
            'sellerId' => "2",
            'productId' => "5",
            'price' => "250",
            'stock' => "1500"
        ]);
        DB::table('product_sellers')->insert([
            'sellerId' => "3",
            'productId' => "1",
            'price' => "300",
            'stock' => "120"
        ]);
        DB::table('product_sellers')->insert([
            'sellerId' => "3",
            'productId' => "3",
            'price' => "100",
            'stock' => "360"
        ]);
        DB::table('product_sellers')->insert([
            'sellerId' => "3",
            'productId' => "5",
            'price' => "160",
            'stock' => "880"
        ]);
        DB::table('product_sellers')->insert([
            'sellerId' => "4",
            'productId' => "2",
            'price' => "140",
            'stock' => "700"
        ]);
        DB::table('product_sellers')->insert([
            'sellerId' => "4",
            'productId' => "4",
            'price' => "300",
            'stock' => "590"
        ]);
        DB::table('product_sellers')->insert([
            'sellerId' => "5",
            'productId' => "1",
            'price' => "200",
            'stock' => "230"
        ]);
        DB::table('product_sellers')->insert([
            'sellerId' => "5",
            'productId' => "2",
            'price' => "150",
            'stock' => "760"
        ]);
        DB::table('product_sellers')->insert([
            'sellerId' => "5",
            'productId' => "3",
            'price' => "140",
            'stock' => "720"
        ]);
    }
}
