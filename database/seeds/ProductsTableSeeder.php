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
                'name'       => 'Nasi',
                'price'       => 3000,
                'status'       => 1,
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'category_id'       => 1,
                'name'       => 'Ayam Goreng',
                'price'       => 10000,
                'status'       => 1,
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'category_id'       => 1,
                'name'       => 'Soto Banjar',
                'price'       => 8000,
                'status'       => 1,
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'category_id'       => 1,
                'name'       => 'Mie Sedap',
                'price'       => 5000,
                'status'       => 0,
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'category_id'       => 2,
                'name'       => 'Teh',
                'price'       => 2000,
                'status'       => 1,
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'category_id'       => 2,
                'name'       => 'Air Putih',
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
