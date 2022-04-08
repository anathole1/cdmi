<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AppointmentController;
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
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// client management
Route::get('/clients/all',[ClientController::class,'index'])->name('all.client');
Route::post('/clients/add',[ClientController::class, 'AddClient'])->name('add.client');
Route::get('/clients/clientAppointment/{id}',[ClientController::class,'FindAppoints']);
Route::post('/clients/appointments',[ClientController::class, 'AddAppoints'])->name('add.appoints');
Route::get('/appointments/all',[AppointmentController::class,'index'])->name('all.appointments');
