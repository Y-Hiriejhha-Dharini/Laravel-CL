<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PurchaseOrderProducts extends Model
{
    use HasFactory;
    protected $tabel = 'purchase_order_products';

    public static function getproducts()
    {
        $records = DB::table('purchase_order_products')->select('poid', 'skucode', 'skuname', 'unitprice', 'avbqty', 'enterqty', 'units', 'totalprice', 'totalamount')->get()->toArray();
        return $records;
    }
}
