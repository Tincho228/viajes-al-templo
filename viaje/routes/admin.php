<!-- We have created this new file for admin routes. -->
<!-- In file bootstrap/app.php we declared the new file to be recognized -->
<?php

use App\Http\Controllers\Admin\StakeController;
use Illuminate\Support\Facades\Route;


// All routes have the prefix 'admin' as declared in bootstrap/app.php
// We can access this route using the name 'admin.home'
Route::resource('stakes', StakeController::class); 
