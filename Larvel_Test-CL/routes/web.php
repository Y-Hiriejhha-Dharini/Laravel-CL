<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\TerriotoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

// Route::get('login', function () {
//     if (session()->has('user')) {
//         return redirect('/home_dist');
//     }
//     return view('login');
// });
Route::get('login', [LoginController::class, 'login']);
Route::post('userlogin', [LoginController::class, 'userlogin']);

Route::get('/home_dist', [LoginController::class, 'homedistributor']);
Route::get('/home', [LoginController::class, 'home']);

//Route::view('/home_dist', 'home-distributor');
//Route::view('/home', 'home');


Route::get('zoneform', [zoneController::class, 'viewForm']);
Route::post('addzone', [zoneController::class, 'add']);
Route::get('viewzone', [zoneController::class, 'view']);
Route::post('editzone', [zoneController::class, 'update']);
Route::get('editzone/{id}', [zoneController::class, 'edit']);
Route::get('deletezone/{id}', [zoneController::class, 'delete']);

Route::get('regionform', [RegionController::class, 'viewForm']);
Route::post('addregion', [RegionController::class, 'add']);
Route::get('viewregion', [RegionController::class, 'view']);
Route::post('editregion', [RegionController::class, 'update']);
Route::get('editregion/{id}', [RegionController::class, 'edit']);
Route::get('deleteregion/{id}', [RegionController::class, 'delete']);

Route::get('territoryform', [TerriotoryController::class, 'viewForm']);
Route::post('addterritory', [TerriotoryController::class, 'add']);
Route::get('viewterritory', [TerriotoryController::class, 'view']);
Route::post('editterritory', [TerriotoryController::class, 'update']);
Route::get('editterritory/{id}', [TerriotoryController::class, 'edit']);
Route::get('deleteterritory/{id}', [TerriotoryController::class, 'delete']);

Route::get('userform', [UserController::class, 'viewForm']);
Route::post('adduser', [UserController::class, 'add']);
Route::get('viewuser', [UserController::class, 'view']);
Route::post('edituser', [UserController::class, 'update']);
Route::get('edituser/{id}', [UserController::class, 'edit']);
Route::get('deleteuser/{id}', [UserController::class, 'delete']);

Route::get('productform', [ProductController::class, 'viewForm']);
Route::post('addproduct', [ProductController::class, 'add']);
Route::get('viewproduct', [ProductController::class, 'view']);
Route::post('editproduct', [ProductController::class, 'update']);
Route::get('editproduct/{id}', [ProductController::class, 'edit']);
Route::get('deleteproduct/{id}', [ProductController::class, 'delete']);

Route::get('poform', [TransactionController::class, 'viewform']);
Route::post('addpo', [TransactionController::class, 'addpo']);
Route::get('poviewform', [TransactionController::class, 'poviewform']);
Route::post('poview', [TransactionController::class, 'poview']);
Route::get('search', [TransactionController::class, 'search']);


Route::get('logout', function () {
    if (session()->has('user')) {
        session()->pull('user');
        return view('login');
    }
});

Route::get('toexcel', [TransactionController::class, 'exportExcel']);
