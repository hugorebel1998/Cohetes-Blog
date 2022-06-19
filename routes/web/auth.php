<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Auth::routes();
Auth::routes(['register' => false]);
// Route::match(['get', 'post'], 'register', function () {
//     return redirect('welcome');
// });