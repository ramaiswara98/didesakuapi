<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\AdminDesaController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\PerangkatDesaController;
Use App\Http\Controllers\ProfileDesaController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/tesdoangkok',[SuperAdminController::class,'index']);

Route::prefix('v1')->group(function(){
    //AdminDesa
    Route::prefix('admindesa')->group(function(){
        Route::get('all',[AdminDesaController::class,'index']);
        Route::post('/',[AdminDesaController::class,'store']);
        Route::put('/',[AdminDesaController::class,'store']);
        Route::get('/select/{id_desa}',[AdminDesaController::class,'select']);
        Route::delete('/delete/{id_desa}',[AdminDesaController::class,'delete']);
        Route::post('/login',[AdminDesaController::class,'login']);
    });

    //Warga
    Route::prefix('warga')->group(function(){

        Route::get('/all',[WargaController::class,'index']);
        Route::post('/',[WargaController::class,'store']);
        Route::put('/',[WargaController::class,'store']);
        Route::get('/select/{id_warga}',[WargaController::class,'select']);
        Route::delete('/delete/{id_warga}',[WargaController::class,'delete']);
        Route::post('/login',[WargaController::class,'login']);
    });

    //Perangkat Desa
    Route::prefix('perangkatdesa')->group(function(){
        Route::get('/all',[PerangkatDesaController::class,'all']);
        Route::post('/',[PerangkatDesaController::class,'store']);
        Route::put('/',[PerangkatDesaController::class,'store']);
        Route::get('/select/{id_perangkat_desa}',[PerangkatDesaController::class,'select']);
        Route::delete('/delete/{id_perangkat_desa}',[PerangkatDesaController::class,'delete']);
        Route::post('/login',[PerangkatDesaController::class,'login']);
    });
    
    //Profile Desa
    Route::prefix('profiledesa')->group(function(){
        Route::get('/all',[ProfileDesaController::class,'index']);
        Route::post('/',[ProfileDesaController::class,'store']);
        Route::put('/',[ProfileDesaController::class,'store']);
        Route::get('/select/{id_profile_desa}',[ProfileDesaController::class,'select']);
        Route::get('/selectbydesa/{id_desa}',[ProfileDesaController::class,'selectByDesa']);
        Route::delete('delete/{id_profile_desa}',[ProfileDesaController::class,'delete']);
        Route::delete('deletebydesa/{id_desa}',[ProfileDesaController::class,'deleteByDesa']);
    });
});
