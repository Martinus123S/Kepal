<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "admin",
            'email' => "admin@gmail.com",
            'password' => bcrypt("admin123"),
            'admin' => 1,
            'alamat' => "jalan admin",
            'jenis_kelamin' => "L",
            'no_telepon' => "0812",
            'isVerified' => true,
            'tgl_lahir' => "2000-12-31"
        ]);
    }
}
