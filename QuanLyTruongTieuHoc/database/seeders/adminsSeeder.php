<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Supports\Facades\DB;

class adminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
           

            'name' => 'Thái',
            'email' => 'hmt20@gmail.com',
            'password' => '123456@tH'
            
            

        ];
        DB::table('admins')->insert($data);
    }
}
