<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\PurchaseOrder;
use  App\Models\PurchaseOrderProducts;
use Illuminate\Support\Facades\DB;
use App\Models\Region;
use App\Models\zone;
use App\Models\Terriotory;
use App\Models\distributor;
use Illuminate\Support\Str;
use App\Exports\ProductExport;
use Excel;

class TransactionController extends Controller
{
    function viewform()
    {
        $zone = zone::all()->where('status', 'active');
        $region = Region::all()->where('status', 'active');
        $territory = Terriotory::all()->where('status', 'active');
        $distributor = distributor::all()->where('status', 'active');
        return view('purchaseorder', ['zone' => $zone, 'region' => $region, 'territory' => $territory, 'distributor' => $distributor]);
    }
    function addpo(Request $request)
    {
        $id = PurchaseOrder::max('id') + 1;
        $padding = Str::padLeft($id, 5, '0');
        $data = new PurchaseOrder();
        $data->zone = $request->zone;
        $data->region = $request->region;
        $data->territory = $request->territory;
        $data->distributor = $request->distributor;
        $data->date = date('Y-m-d');
        $data->time = date("H:i:s");
        $data->ponumber = "PO" . $padding;
        $data->remark = $request->remark;
        $data->save();

        $pop = new PurchaseOrderProducts();
        // $pojoin = DB::table('purchase_orders')
        //     ->join('purchase_order_products', 'purchase_orders.id', '=', 'purchase_order_products.poid')
        //     ->select('purchase_orders.id')
        //     ->get();
        $pop->poid = $data->id;
        $pop->skucode = $request->skucode;
        $pop->skuname = $request->skuname;
        $pop->unitprice = $request->unitprice;
        $pop->avbqty = $request->avbqty;
        $pop->enterqty = $request->enterqty;
        $pop->units = $request->avbqty - $request->enterqty;
        $pop->totalprice = $request->avbqty * $request->unitprice;
        $pop->totalamount = collect($request->avbqty * $request->unitprice)->sum();

        $pop->save();

        if (session('user')['role'] == 'admin') {
            return redirect('/home')->with('status', 'Product Successfully Inserted');
        } else {
            return redirect('/home_dist')->with('status', 'Product Successfully Inserted');
        }
    }
    function poviewform()
    {
        $zone = zone::all()->where('status', 'active');
        $region = Region::all()->where('status', 'active');
        $territory = Terriotory::all()->where('status', 'active');
        $distributor = distributor::all()->where('status', 'active');

        $po = DB::table('purchase_orders')
            ->join('purchase_order_products', 'purchase_orders.id', '=', 'purchase_order_products.poid')
            ->select('purchase_orders.region', 'purchase_orders.territory', 'purchase_orders.distributor', 'purchase_orders.date', 'purchase_orders.time', 'purchase_orders.ponumber', 'purchase_order_products.totalamount')
            ->first();
        //dd($region);
        return view('poview', ['po' => $po, 'zone' => $zone, 'region' => $region, 'territory' => $territory, 'distributor' => $distributor]);
    }
    function exportExcel(Request $request)
    {
        $fileName = 'tasks.csv';
        $tasks = DB::table('purchase_orders')
            ->join('purchase_order_products', 'purchase_orders.id', '=', 'purchase_order_products.poid')
            ->select('purchase_orders.region', 'purchase_orders.territory', 'purchase_orders.distributor', 'purchase_orders.ponumber', 'purchase_orders.date', 'purchase_orders.time', 'purchase_order_products.totalamount')
            ->get();
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        //$columns = array('Region', 'Territory', 'Distributor', 'Po Number', 'Date', 'Time', 'Total Amount');

        /*$callback = function () use ($tasks, $columns) {
            $file = fopen('php://output', 'w');*/
        //fputcsv($file, $columns);
        $column = '';
        $column .= "Region, Territory, Distributor, Po Number, Date, Time, Total Amount\r\n";
        foreach ($tasks as $task) {
            $row['Region']  = $task->region;
            $row['Territory']    = $task->territory;
            $row['Distributor']    = $task->distributor;
            $row['Po Number']  = $task->ponumber;
            $row['Date']  = $task->date;
            $row['Time']  = $task->time;
            $row['Total Amount']  = $task->totalamount;

            $column .=  $task->region . "," . $task->territory . "," . $task->distributor . "," . $task->ponumber . "," . $task->date . "," . $task->time . "," . $task->totalamount . "/r/n";

            //fputcsv($file, array($row['Region'], $row['Territory'], $row['Distributor'], $row['Po Number'], $row['Date'], $row['Time'], $row['Total Amount']));
        }
        echo $column;
        exit;

        //fclose($file);
        //};

        //return response()->stream($callback, 200, $headers);
    }
    function search(Request $request)
    {
        $r = $request->region = Region::where('regioncode', 'like', '%' . $request->input('region') . '%')
            ->get();
        $t = $request->territory = Terriotory::where('territorycode', 'like', '%' . $request->input('territory') . '%')
            ->get();
        $p = $request->pono = PurchaseOrder::where('ponumber', 'like', '%' . $request->input('pono') . '%')
            ->get();
        $f = $request->from;
        $t = $request->to;
        $posearch = DB::table('purchase_orders')->join('purchase_order_products', 'purchase_orders.id', '=', 'purchase_order_products.poid')
            ->where([
                ['purchase_orders.region', 'like', '%' . '$r'],
                ['purchase_orders.territory', 'like', '%' . '$t'],
                ['purchase_orders.ponumber', 'like', '%' . '$p'],
                ['between', 'date', '$f', '$e'],
            ])->select('purchase_orders.region', 'purchase_orders.territory', 'purchase_orders.distributor', 'purchase_orders.ponumber', 'purchase_orders.date', 'purchase_orders.time', 'purchase_order_products.totalamount')
            ->first();
        return view('poview', ['posearch', $posearch]);
    }
}
