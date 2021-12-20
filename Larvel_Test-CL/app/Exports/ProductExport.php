<?php

namespace App\Exports;

use App\Models\PurchaseOrderProducts;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'poid',
            'skucode',
            'skuname',
            'unitprice',
            'avbqty',
            'enterqty',
            'units',
            'totalprice',
            'totalamount'
        ];
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //return PurchaseOrderProducts::all();
        return collect(PurchaseOrderProducts::getPurchaseOrderProducts());
    }
}
