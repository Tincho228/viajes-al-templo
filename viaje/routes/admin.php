<?php

use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\OrdinanceController;
use App\Http\Controllers\Admin\PassengerController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\SeatController;
use App\Http\Controllers\Admin\StakeController;
use App\Http\Controllers\Admin\TripController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WardController;
use Illuminate\Support\Facades\Route;


// All routes have the prefix 'admin' as declared in bootstrap/app.php
// We can access this route using the name 'admin.home'
Route::resource('stakes', StakeController::class); 
Route::resource('wards', WardController::class);
Route::resource('passengers', PassengerController::class);
Route::resource('ordinances', OrdinanceController::class);
Route::resource('appointments', AppointmentController::class);
Route::resource('users', UserController::class);
Route::resource('trips', TripController::class);
Route::resource('seats', SeatController::class);
Route::resource('payments', PaymentController::class);

