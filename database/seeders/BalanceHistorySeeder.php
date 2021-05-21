<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BalanceHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            DB::table('balance_histories')->insert([
                    'value'      => rand(-2000, 2000),
                    'balance'    => rand(-2000, 2000),
                    'user_id'    => rand(1, 5),
                    'created_at' => new DateTime(),
                ]
            );
        }
    }
}