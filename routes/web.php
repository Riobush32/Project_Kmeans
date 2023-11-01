<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DbiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\KmeansController;
use App\Http\Controllers\IndustriController;

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

Route::get('/', function () {
    return view('pages.home');
});
Route::get('/test', function (){
   
});

//user routes

Route::get('/user', [UserController::class, 'index']);
Route::get('/user/{id}/info', [UserController::class, 'detail']);
Route::get('/user/{id}/edit', [UserController::class, 'edit']);
Route::patch('/user/{id}', [UserController::class, 'update']);
Route::delete('/user/{id}', [UserController::class, 'destroy']);

//data Industri routes
Route::get('/data/industri', [IndustriController::class, 'index']);
Route::get('/dataIndustri/{tahun}/filter', [IndustriController::class, 'filterTahun']);
Route::get('/dataIndustri/{tahun}/truncate', [IndustriController::class, 'truncate']);
Route::get('/dataIndustri/{tahun}/dataPilihan', [IndustriController::class, 'dataPilihan']);

//excel routes
Route::post('/import/industri', [ExcelController::class, 'storeIndustri'])->name('industri.store');

//Kmeans Routes
Route::get('/kmeans', [KmeansController::class, 'index'])->name('kmeans');
Route::get('/kmeans/truncate', [KmeansController::class, 'truncate'])->name('truncate.selected');
Route::get('/kmeans/kvalue', [KmeansController::class, 'kvalue']);

Route::get('/kmeans/proses', [KmeansController::class, 'kmeans']);

//Hasil Routes
Route::get('/hasil', [HasilController::class, 'index']);
Route::get('/hasil/iterasi', [HasilController::class, 'iterasi']);
Route::get('hasil/akhir', [HasilController::class, 'hasilAkhir']);
Route::get('hasil/chart', [HasilController::class, 'chart']);

//print Routes
Route::get('print/hasil', [PrintController::class, 'index']);

//dbi Routes
Route::get('dbi/s', [DbiController::class, 'nilaiS']);
Route::get('dbi/m', [DbiController::class, 'nilaiM']);
Route::get('dbi/r', [DbiController::class, 'nilaiR']);
Route::get('dbi', [DbiController::class, 'dbi']);


Route::get('dbi/ssw', [DbiController::class, 'ssw']);



