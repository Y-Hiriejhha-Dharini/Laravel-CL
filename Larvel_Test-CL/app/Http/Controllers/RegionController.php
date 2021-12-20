<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Region;
use App\Models\zone;
use Illuminate\Support\Str;

class RegionController extends Controller
{
    function viewForm()
    {
        $data = zone::all()->where('status', 'active');
        return view('master.region.addregion', ['data' => $data]);
    }

    function add(Request $request)
    {
        $data = new Region();
        $id = Region::max('id') + 1;
        $padding = Str::padLeft($id, 5, '0');
        $data->regioncode = "R" . $padding;
        $data->zonecode = $request->zonecode;
        //$data->regioncode = $request->regioncode;
        $data->regionname = $request->regionname;
        $data->status = "active";
        $data->save();
        return redirect('regionform')->with('status', 'Created Successfully');
    }
    function view()
    {
        $data = Region::all();
        return view('master.region.viewregion', ['data' => $data]);
    }
    function edit($id)
    {
        $zone = zone::all()->where('status', 'active');
        $data = Region::find($id);
        return view('master.region.editregion', ['data' => $data, 'zone' => $zone,]);
    }
    function update(Request $request)
    {
        $data = Region::find($request->id);
        $data->zonecode = $request->zonecode;
        $data->regioncode = $request->regioncode;
        $data->regionname = $request->regionname;
        $data->save();
        return redirect('viewregion')->with('status', 'Updated Successfully');
    }
    function delete($id)
    {
        Region::find($id)->delete();
        Session()->flash('status', 'Deleted Successfully');
        return redirect('viewregion');
    }
}
