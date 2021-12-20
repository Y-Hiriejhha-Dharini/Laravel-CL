<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistributorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('distributors')->insert([
            [
                'name' => 'Distributor 1',
                'status' => 'active',
            ],
            [
                'name' => 'Distributor 2',
                'status' => 'active',
            ],
            [
                'name' => 'Distributor 3',
                'status' => 'active',
            ],
        ]);
    }
}
