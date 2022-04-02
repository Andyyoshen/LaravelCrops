<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\CropsModelController;
// use App\Http\Controllers\DropDownList;
use App\Http\Controllers\DropDownListController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\CropsImportController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
   
    return $request->user();
});
Route::get('/test', [AnimalController::class, 'index']);
Route::post('/insert', [AnimalController::class, 'store']);
Route::post('/GetCropsList',[CropsModelController::class,'GetCropsList']);
Route::post('/PostInsertCrops',[CropsModelController::class,'InsertCrops']);
Route::post('/PostUpdateCrops',[CropsModelController::class,'UpdateCrops']);
Route::post('/PostDeleteCrops',[CropsModelController::class,'DeleteCrops']);
Route::post('/GetCropsRowTatle',[CropsModelController::class,'CropsRowTatle']);
Route::post('/PostExcelExport',[ExcelController::class, 'ExportCrops']);
Route::post('/PostCropsImpor',[CropsImportController::class, 'import']);


Route::get('/test2', [DropDownListController::class, 'index']);

Route::post('/GetDropdownList', [DropDownListController::class, 'GetDropdownList']);
Route::post('/InsertIetmList', [DropDownListController::class, 'SaveIetmList']);

