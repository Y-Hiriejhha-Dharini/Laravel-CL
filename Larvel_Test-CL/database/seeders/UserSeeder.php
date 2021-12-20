<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            //admin
            [
                'name' => 'Admin 2',
                'nic' => '855489654V',
                'address' => 'Galle',
                'mobile' => '0787895478',
                'email' => 'admin2@test.com',
                'gender' => 'male',
                'territorycode' => 'T00002',
                'username' => 'Admin 02',
                'password' => Hash::make('12345'),
                'role' => 'admin',
                'status' => 'active',
            ],
            //user
            [
                'name' => 'User 2',
                'nic' => '887458125V',
                'address' => 'Rathnapura',
                'mobile' => '0779854126',
                'email' => 'user2@test.com',
                'gender' => 'female',
                'territorycode' => 'T00001',
                'username' => 'User 02',
                'password' => Hash::make('12345'),
                'role' => 'user',
                'status' => 'active',
            ],
            //distributor
            [
                'name' => 'Distributor 2',
                'nic' => '227845879V',
                'address' => 'Bandarawela',
                'mobile' => '07768974581',
                'email' => 'distributor2@test.com',
                'gender' => 'female',
                'territorycode' => 'T00001',
                'username' => 'Distributor 02',
                'password' => Hash::make('12345'),
                'role' => 'distributor',
                'status' => 'active',
            ],
        ]);
    }
}
