<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    function login()
    {
        return view('login');
    }
    function userlogin(Request $request)
    {
        $user = User::where(['username' => $request->username])->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect('login');
        } else {
            $request->session()->put('user', $user);
            if (session('user')['role'] == 'admin') {
                return view("home");
            } else {
                return view("home-distributor");
            }
        }
    }
    function homedistributor()
    {
        return view('home-distributor');
    }
    function home()
    {
        return view('home');
    }
}
