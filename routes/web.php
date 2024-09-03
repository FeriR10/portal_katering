<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BackofficeController;
use App\Http\Controllers\FrontofficeController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\MenuController;


Route::group(['middleware' => 'guest'], function(){
    
    // Auth
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/login-process', [AuthController::class, 'loginProcess']);
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register-process', [AuthController::class, 'registerProcess']);
    // Route::get('/merchant-form', [AuthController::class, 'showForm'])->name('merchant.form');
    // Route::post('/merchant-form-process', [AuthController::class, 'merchantFormProcess']);
    
    
});
Route::group(['middleware' => 'auth'], function(){

    // Auth
    Route::get('/logout', [AuthController::class, 'logout']);

    // Backoffice
    Route::get('/backoffice', [BackofficeController::class, 'dashboard']);
    Route::get('/profile', [BackofficeController::class, 'profile']);
    Route::put('/updateprofile/{id}', [BackofficeController::class, 'updateprofile']);

    // backoffice menu
    Route::get('/backoffice/menu', [MenuController::class, 'menu']);
    //tambah menu
    Route::get('/backoffice/tambahmenu', [MenuController::class, 'tambahmenu']);
    Route::post('/backoffice/tambahmenu-process', [MenuController::class, 'tambahmenuProcess']);
    //update menu
    Route::get('/backoffice/updatemenu/{id}', [MenuController::class, 'updatemenu']);
    Route::put('/backoffice/updatemenu-process/{id}', [MenuController::class, 'updatemenuProcess']);
    //delete menu
    Route::get('/backoffice/deletemenu/{id}', [MenuController::class, 'deletemenu']);

    //backoffice dtailorder
    Route::get('/backoffice/detailorder/', [BackofficeController::class, 'detailorder']);




    // Frontoffice
    Route::get('/frontoffice', [FrontofficeController::class, 'index']);
    Route::get('/keranjang', [FrontofficeController::class, 'keranjang']);
    Route::post('/keranjang/store', [FrontofficeController::class, 'store']);
    Route::get('/keranjang/kurang/{id}', [FrontofficeController::class, 'kurang']);
    Route::get('/keranjang/tambah/{id}', [FrontofficeController::class, 'tambah']);
    Route::get('/keranjang/hapus/{id}', [FrontofficeController::class, 'destroy']);
    Route::get('/keranjang/riwayat', [FrontofficeController::class, 'riwayat']);
    Route::post('/cekout/store', [FrontofficeController::class, 'cekoutstore']);



    Route::get('/superadmin', [BackofficeController::class, 'dashboard']);
});