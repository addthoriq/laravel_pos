<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $data   = [
        //     [
        //         'name'  => 'Thoriq',
        //         'email'  => 'thoriq@email.com',
        //         'password'  => bcrypt('123'),
        //         'created_at'  => now(),
        //         'updated_at'  => now(),
        //     ],
        //     [
        //         'name'  => 'Rahma',
        //         'email'  => 'rahma@email.com',
        //         'password'  => bcrypt('123'),
        //         'created_at'  => now(),
        //         'updated_at'  => now(),
        //     ]
        // ];
        // DB::table('users')->truncate();
        // DB::table('users')->insert($data);
    }
}
