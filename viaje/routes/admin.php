<?php

use App\Http\Controllers\Admin\StakeController;
use App\Http\Controllers\Admin\WardController;
use Illuminate\Support\Facades\Route;


// All routes have the prefix 'admin' as declared in bootstrap/app.php
// We can access this route using the name 'admin.home'
Route::resource('stakes', StakeController::class); 
Route::resource('wards', WardController::class);
