<!-- We have created this new file for admin routes. -->
<!-- In file bootstrap/app.php we declared the new file to be recognized -->
<?php

use Illuminate\Support\Facades\Route;

Route::get('/',function(){ // All routes have the prefix 'admin' as declared in bootstrap/app.php
    return "Hello Admin";
})->name('home'); // We can access this route using the name 'admin.home'