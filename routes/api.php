<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//user
Route::get('/getuser',[usercontroller::class,'getuser']);
Route::post('/adduser',[usercontroller::class,'adduser']);
Route::put('/updateuser/{id}',[usercontroller::class,'updateuser']);
Route::delete('/deleteuser/{id}',[usercontroller::class,'deleteuser']);
Route::get('/getuserid/{id}',[usercontroller::class,'getuserid']);
