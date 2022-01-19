<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction_detail')->insert([
            [
                'header_id' => '1',
                'furniture_id' => '1',
                'quantity' => '1',
                'subtotal' => '2250000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'header_id' => '1',
                'furniture_id' => '2',
                'quantity' => '2',
                'subtotal' => '290000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'header_id' => '1',
                'furniture_id' => '3',
                'quantity' => '1',
                'subtotal' => '185000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'header_id' => '1',
                'furniture_id' => '4',
                'quantity' => '1',
                'subtotal' => '1850000',
                'created_at' => now(),
                'updated_at' => now(),
            ],


            [
                'header_id' => '2',
                'furniture_id' => '5',
                'quantity' => '1',
                'subtotal' => '1850000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'header_id' => '2',
                'furniture_id' => '6',
                'quantity' => '1',
                'subtotal' => '850000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'header_id' => '2',
                'furniture_id' => '7',
                'quantity' => '1',
                'subtotal' => '2150000',
                'created_at' => now(),
                'updated_at' => now(),
            ],


            [
                'header_id' => '3',
                'furniture_id' => '8',
                'quantity' => '1',
                'subtotal' => '125000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'header_id' => '3',
                'furniture_id' => '9',
                'quantity' => '2',
                'subtotal' => '85000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'header_id' => '3',
                'furniture_id' => '10',
                'quantity' => '1',
                'subtotal' => '200000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'header_id' => '3',
                'furniture_id' => '11',
                'quantity' => '1',
                'subtotal' => '450000',
                'created_at' => now(),
                'updated_at' => now(),
            ],


        ]);
    }
}
