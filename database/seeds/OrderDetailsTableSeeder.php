<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderDetailsTableSeeder extends Seeder
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
                'order_id'      => 1,
                'product_id'  => 2,
                'quantity'      => 2,
                'note'          => 'Lunas',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'order_id'      => 2,
                'product_id'  => 1,
                'quantity'      => 5,
                'note'          => 'Utang',
                'created_at'    => now(),
                'updated_at'    => now(),
            ]
        ];
        DB::table('order_details')->truncate();
        DB::table('order_details')->insert($data);
    }
}
