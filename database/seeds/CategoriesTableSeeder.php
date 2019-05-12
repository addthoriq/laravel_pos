<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
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
                'name'  => 'Makanan',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'name'  => 'Minuman',
                'created_at'  => now(),
                'updated_at'  => now(),
            ]
        ];
        DB::table('categories')->truncate();
        DB::table('categories')->insert($data);
    }
}
