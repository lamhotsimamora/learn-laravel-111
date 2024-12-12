<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Admins;

function _md5($string){
    return md5(strlen($string).$string.strlen($string));
}


Route::get('/md5',function(){
    return _md5('admin');
});

Route::get('/', function () {
    return redirect('login');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/users',function(){
    return view('users');
})->middleware(AdminMiddleware::class);

Route::post('/users', [UserController::class, 'loadUsers'])->middleware(AdminMiddleware::class);
Route::post('/search-users', [UserController::class, 'searchUser'])->middleware(AdminMiddleware::class);
Route::post('/delete-user', [UserController::class, 'deleteUser'])->middleware(AdminMiddleware::class);
Route::post('/add-user', [UserController::class, 'addUser'])->middleware(AdminMiddleware::class);
Route::post('/update-user', [UserController::class, 'updateUser'])->middleware(AdminMiddleware::class);

Route::post('/admin-login',function(Request $request){
    $username = $request->username;
    $password = _md5($request->password);

    $count = Admins::where('username', $username)->where('password', $password)->count();

    $result['result'] = false;
    if ($count > 0) {
        session(['admins' => true]);
        $result['result'] = true;
    }
    return json_encode($result);
});