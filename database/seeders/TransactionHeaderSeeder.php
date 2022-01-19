<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction_header')->insert([
            [
                'method' => 'credit',
                'card_number' => '1234567812345678',
                'user_id' => '1',
                'total_payment' => '4575000',
                'created_at' => now(),
                'updated_at' => now(),
            ],


            [
                'method' => 'debit',
                'card_number' => '1234567812345678',
                'user_id' => '2',
                'total_payment' => '4850000',
                'created_at' => now(),
                'updated_at' => now(),
            ],


            [
                'method' => 'debit',
                'card_number' => '1234567812345678',
                'user_id' => '2',
                'total_payment' => '860000',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
