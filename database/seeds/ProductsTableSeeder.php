<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
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
                'category_id'       => 1,
                'name'       => 'Mie Ayam',
                'price'       => 15000,
                'status'       => 1,
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'category_id'       => 2,
                'name'       => 'Es Teh',
                'price'       => 2000,
                'status'       => 0,
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
        ];
        DB::table('products')->truncate();
        DB::table('products')->insert($data);
    }
}
