<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Terriotory;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function viewForm()
    {
        $data = Terriotory::all()->where('status', 'active');
        return view('master.user.adduser', ['data' => $data]);
    }

    function add(Request $request)
    {
        $request->validate([
            'name' => 'required|max:256',
            'nic' => 'min:10',
        ]);
        $data = new User();
        $data->name = $request->name;
        $data->nic = $request->nic;
        $data->address = $request->address;
        $data->mobile = $request->mobile;
        $data->email = $request->email;
        $data->gender = $request->gender;
        $data->territorycode = $request->territorycode;
        $data->username = $request->username;
        $data->password = Hash::make($request->password);
        $data->status = "active";
        $data->save();
        return redirect('userform')->with('status', 'Created Successfully');
    }
    function view()
    {
        $data = User::all();
        return view('master.user.viewuser', ['data' => $data]);
    }
    function edit($id)
    {
        $territory = Terriotory::all()->where('status', 'active');
        $data = User::find($id);
        return view('master.user.edituser', ['data' => $data, 'territory' => $territory]);
    }
    function update(Request $request)
    {
        $data = User::find($request->id);
        $data->name = $request->name;
        $data->nic = $request->nic;
        $data->address = $request->address;
        $data->mobile = $request->mobile;
        $data->email = $request->email;
        $data->gender = $request->gender;
        $data->territorycode = $request->territorycode;
        $data->username = $request->username;
        $data->password = Hash::make($request->password);
        $data->save();
        return redirect('viewuser')->with('status', 'Updated Successfully');
    }
    function delete($id)
    {
        User::find($id)->delete();
        Session()->flash('status', 'Deleted Successfully');
        return redirect('viewuser');
    }
}
