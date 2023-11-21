<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\UserController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware(['auth:admin'])->group(function(){
// });
Route::apiResource('/category', CategoryController::class);
Route::apiResource('/produk', ProdukController::class);
Route::apiResource('/jenis', JenisController::class);
Route::apiResource('/menu', MenuController::class);
Route::apiResource('/pelanggan', PelangganController::class);
Route::apiResource('/meja', MejaController::class);
Route::apiResource('/stok', StokController::class);
Route::apiResource('/user', UserController::class);

Route::post('/login', [AdminAuthController::class,'login']);