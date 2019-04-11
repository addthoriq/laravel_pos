<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data   = [
            [
                'table_number'  => 12,
                'total'         => 200000,
                'payment_id'    => 1,
                'created_by'    => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'table_number'  => 5,
                'total'         => 350000,
                'payment_id'    => 2,
                'created_by'    => 2,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ];
        DB::table('orders')->truncate();
        DB::table('orders')->insert($data);
    }
}
