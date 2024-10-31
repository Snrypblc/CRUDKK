<?php

use App\Http\Controllers\KartuKeluaragaController;
use App\Http\Controllers\KartuTandaPendudukController;
use App\Models\KartuTandaPenduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get("kk/paginate", [KartuKeluaragaController::class, "getPagenate"]);
Route::get("kk/{id}", [KartuKeluaragaController::class, "get"]);
Route::post("kk", [KartuKeluaragaController::class, "create"]);
Route::put("kk/{id}", [KartuKeluaragaController::class, "update"]);
Route::delete("kk/{id}", [KartuKeluaragaController::class, "delete"]);

Route::get("ktp/paginate", [KartuTandaPendudukController::class, "getPagenate"]);
Route::get("ktp/{id}", [KartuTandaPendudukController::class, "get"]);
Route::post("ktp", [KartuTandaPendudukController::class, "create"]);
Route::put("ktp/{id}", [KartuTandaPendudukController::class, "update"]);
Route::delete("ktp/{id}", [KartuTandaPendudukController::class, "delete"]);


