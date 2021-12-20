<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'skuid' => 'SKU00001',
                'skucode' => 'SKU_00001',
                'skuname' => 'Product 01',
                'mrp' => '10',
                'distributorprice' => '100.00',
                'weightvolumn' => '3',
                'uom' => 'Kg',

            ],
            [
                'skuid' => 'SKU00002',
                'skucode' => 'SKU_00002',
                'skuname' => 'Product 02',
                'mrp' => '20',
                'distributorprice' => '50.00',
                'weightvolumn' => '1',
                'uom' => 'Kg',

            ],
            [
                'skuid' => 'SKU00003',
                'skucode' => 'SKU_00003',
                'skuname' => 'Product 03',
                'mrp' => '50',
                'distributorprice' => '10.00',
                'weightvolumn' => '10',
                'uom' => 'Kg',

            ],
        ]);
    }
}
