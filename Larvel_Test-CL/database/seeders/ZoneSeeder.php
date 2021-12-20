<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('zones')->insert([
            [
                'zonecode' => 'Z00001',
                'zoneldesc' => 'ZONE 1',
                'zonesdesc' => 'Z01',
                'status' => 'active',
            ],
            [
                'zonecode' => 'Z00002',
                'zoneldesc' => 'ZONE 2',
                'zonesdesc' => 'Z02',
                'status' => 'active',
            ],
            [
                'zonecode' => 'Z00003',
                'zoneldesc' => 'ZONE 3',
                'zonesdesc' => 'Z03',
                'status' => 'active',
            ]
        ]);
    }
}
