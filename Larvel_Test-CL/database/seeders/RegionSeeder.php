<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            [
                'zonecode' => 'Z00001',
                'regioncode' => 'R00001',
                'regionname' => 'REGION 1',
                'status' => 'active',
            ],
            [
                'zonecode' => 'Z00002',
                'regioncode' => 'R00002',
                'regionname' => 'REGION 2',
                'status' => 'active',
            ],
            [
                'zonecode' => 'Z00003',
                'regioncode' => 'R00003',
                'regionname' => 'REGION 3',
                'status' => 'active',
            ],
        ]);
    }
}
