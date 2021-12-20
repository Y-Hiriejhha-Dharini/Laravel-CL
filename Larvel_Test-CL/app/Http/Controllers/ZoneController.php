<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\zone;
use Illuminate\Support\Str;

class ZoneController extends Controller
{
    function viewForm()
    {
        return view('master.zone.addzone');
    }

    function add(Request $request)
    {
        $data = new zone();
        $id = zone::max('id') + 1;
        $padding = Str::padLeft($id, 5, '0');
        $data->zonecode = "Z" . $padding;
        //$data->zonecode = $request->zonecode;
        $data->zoneldesc = $request->zoneldesc;
        $data->zonesdesc = $request->zonesdesc;
        $data->status = "active";
        $data->save();
        return redirect('zoneform')->with('status', 'Created Successfully');
    }
    function view()
    {
        $data = zone::all();
        return view('master.zone.viewzone', ['data' => $data]);
    }
    function edit($id)
    {
        $data = zone::find($id);
        return view('master.zone.editzone', ['data' => $data]);
    }
    function update(Request $request)
    {
        $data = zone::find($request->id);
        $data->zonecode = $request->zonecode;
        $data->zoneldesc = $request->zoneldesc;
        $data->zonesdesc = $request->zonesdesc;
        $data->save();
        return redirect('viewzone')->with('status', 'Updated Successfully');
    }
    function delete($id)
    {
        zone::find($id)->delete();
        Session()->flash('status', 'Deleted Successfully');
        return redirect('viewregion');
    }
}
