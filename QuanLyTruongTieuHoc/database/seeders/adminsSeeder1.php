<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class adminsSeeder1 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            "name" => "THÁI",
            "email" => "hmt30@gmail.com",
            "password" => bcrypt('1234512345')
        ];
        DB::table('admins')->insert($data);
    }
}
