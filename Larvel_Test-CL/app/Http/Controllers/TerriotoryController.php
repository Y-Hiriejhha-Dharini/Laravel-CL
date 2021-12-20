<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Region;
use App\Models\zone;
use App\Models\Terriotory;
use Illuminate\Support\Str;

class TerriotoryController extends Controller
{
    function viewForm()
    {
        $zone = zone::all()->where('status', 'active');
        $data = Region::all()->where('status', 'active');
        return view('master.terriotory.addterriotory', ['data' => $data, 'zone' => $zone]);
    }

    function add(Request $request)
    {
        $data = new Terriotory();
        $id = Terriotory::max('id') + 1;
        $padding = Str::padLeft($id, 5, '0');
        $data->territorycode = "T" . $padding;
        $data->zonecode = $request->zonecode;
        $data->regioncode = $request->regioncode;
        //$data->territorycode = $request->territorycode;
        $data->territoryname = $request->territoryname;
        $data->status = "active";
        $data->save();
        return redirect('territoryform')->with('status', 'Created Successfully');
    }
    function view()
    {
        $data = Terriotory::all();
        return view('master.terriotory.viewterriotory', ['data' => $data]);
    }
    function edit($id)
    {
        $zone = zone::all()->where('status', 'active');
        $region = Region::all()->where('status', 'active');
        $data = Terriotory::find($id);
        return view('master.terriotory.editterriotory', ['data' => $data, 'zone' => $zone, 'region' => $region]);
    }
    function update(Request $request)
    {
        $data = Terriotory::find($request->id);
        $data->zonecode = $request->zonecode;
        $data->regioncode = $request->regioncode;
        $data->territorycode = $request->territorycode;
        $data->territoryname = $request->territoryname;
        $data->save();
        return redirect('viewterritory')->with('status', 'Updated Successfully');
    }
    function delete($id)
    {
        Terriotory::find($id)->delete();
        Session()->flash('status', 'Deleted Successfully');
        return redirect('viewterritory');
    }
}
