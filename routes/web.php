<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users',function(){
    return view('users');
});

Route::post('/users', [UserController::class, 'loadUsers']);
Route::post('/search-users', [UserController::class, 'searchUser']);
Route::post('/delete-user', [UserController::class, 'deleteUser']);
Route::post('/add-user', [UserController::class, 'addUser']);