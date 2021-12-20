<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TerriotorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('terriotories')->insert([
            [
                'zonecode' => 'Z00001',
                'regioncode' => 'R00001',
                'territorycode' => 'T00001',
                'territoryname' => 'TERRITORY 1',
                'status' => 'active',

            ],
            [
                'zonecode' => 'Z00002',
                'regioncode' => 'R00002',
                'territorycode' => 'T00002',
                'territoryname' => 'TERRITORY 2',
                'status' => 'active',

            ],
            [
                'zonecode' => 'Z00003',
                'regioncode' => 'R00003',
                'territorycode' => 'T00002',
                'territoryname' => 'TERRITORY 3',
                'status' => 'active',

            ],

        ]);
    }
}
