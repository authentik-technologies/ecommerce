<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class UsersTableSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            //Admin
            [ 
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => hash::make('Test123'),
                'role' => 'admin',
                'status' => 'active',
            ],

            //Vendor
            [
                'name' => 'Vendor',
                'email' => 'vendor@gmail.com',
                'password' => hash::make('Test123'),
                'role' => 'vendor',
                'status' => 'active',
            ],

             //Standard User
             [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => hash::make('Test123'),
                'role' => 'client',
                'status' => 'active',
             ],
        ]);
    }
}
