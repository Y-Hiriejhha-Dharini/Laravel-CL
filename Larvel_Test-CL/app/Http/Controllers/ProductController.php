<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Terriotory;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    function viewForm()
    {
        $data = Product::all()->where('status', 'active');
        return view('master.product.addproduct', ['data' => $data]);
    }

    function add(Request $request)
    {
        $data = new Product();
        $id = Product::max('id') + 1;
        $padding = Str::padLeft($id, 5, '0');
        $data->skuid = "SKU" . $padding;
        $data->skucode = $request->skucode;
        $data->skuname = $request->skuname;
        $data->mrp = $request->mrp;
        $data->distributorprice = $request->distributorprice;
        $data->weightvolumn = $request->weightvolumn;
        $data->uom = $request->uom;
        $data->status = "active";
        $data->save();
        return redirect('productform')->with('status', 'Created Successfully');
    }
    function view()
    {
        $data = Product::all();
        return view('master.product.viewproduct', ['data' => $data]);
    }
    function edit($id)
    {
        $data = Product::find($id);
        return view('master.product.editproduct', ['data' => $data]);
    }
    function update(Request $request)
    {
        $data = Product::find($request->id);
        $data->skuid = $request->skuid;
        $data->skucode = $request->skucode;
        $data->skuname = $request->skuname;
        $data->mrp = $request->mrp;
        $data->distributorprice = $request->distributorprice;
        $data->weightvolumn = $request->weightvolumn;
        $data->uom = $request->uom;
        $data->save();
        return redirect('viewproduct')->with('status', 'Updated Successfully');
    }
    function delete($id)
    {
        Product::find($id)->delete();
        Session()->flash('status', 'Deleted Successfully');
        return redirect('viewproduct');
    }
}
