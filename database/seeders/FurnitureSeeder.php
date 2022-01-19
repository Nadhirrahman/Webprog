<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FurnitureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('furniture')->insert([
            [
                'name' => 'Melltrop',
                'price' => '225000',
                'type' => 'table',
                'color' => 'white',
                'image' => 'product-1.jpg',
                'updated_at' => now(),
                'created_at' => now()
            ],
            [
                'name' => 'Lack',
                'price' => '145000',
                'type' => 'table',
                'color' => 'black',
                'image' => 'product-2.jpg',
                'updated_at' => now(),
                'created_at' => now()
            ],
            [
                'name' => 'Knarrevik',
                'price' => '185000',
                'type' => 'table',
                'color' => 'black',
                'image' => 'product-3.jpg',
                'updated_at' => now(),
                'created_at' => now()
            ],
            [
                'name' => 'Hemlingby',
                'price' => '1850000',
                'type' => 'couch',
                'color' => 'black',
                'image' => 'product-4.jpg',
                'updated_at' => now(),
                'created_at' => now()
            ],
            [
                'name' => 'Grimsbu',
                'price' => '1850000',
                'type' => 'bed',
                'color' => 'white',
                'image' => 'product-5.jpg',
                'updated_at' => now(),
                'created_at' => now()
            ],
            [
                'name' => 'Jessheim',
                'price' => '850000',
                'type' => 'mattress',
                'color' => 'blue',
                'image' => 'product-6.jpg',
                'updated_at' => now(),
                'created_at' => now()
            ],
            [
                'name' => 'Nesttun',
                'price' => '2150000',
                'type' => 'bed',
                'color' => 'white',
                'image' => 'product-7.jpg',
                'updated_at' => now(),
                'created_at' => now()
            ],
            [
                'name' => 'Teodores',
                'price' => '125000',
                'type' => 'chair',
                'color' => 'white',
                'image' => 'product-8.jpg',
                'updated_at' => now(),
                'created_at' => now()
            ],
            [
                'name' => 'Mammut',
                'price' => '85000',
                'type' => 'chair',
                'color' => 'white',
                'image' => 'product-9.jpg',
                'updated_at' => now(),
                'created_at' => now()
            ],
            [
                'name' => 'Antilop',
                'price' => '200000',
                'type' => 'chair',
                'color' => 'white',
                'image' => 'product-10.jpg',
                'updated_at' => now(),
                'created_at' => now()
            ],
            [
                'name' => 'Vuku',
                'price' => '450000',
                'type' => 'bag',
                'color' => 'white',
                'image' => 'product-11.jpg',
                'updated_at' => now(),
                'created_at' => now()
            ],
        ]);
    }
}
