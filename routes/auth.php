<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Blade\Permisson\PermissonController;
use App\Http\Controllers\Blade\Role\RoleController;
use App\Http\Controllers\Blade\User\UserController;
use App\Http\Controllers\Blade\User\UserProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
   return redirect()->route('home');
});

Route::middleware('guest')->group(function (){

    Route::get('login',[LoginController::class,'login'])->name('login');
    Route::post('login',[LoginController::class,'login_store'])->name('login_store');
    Route::get('reset',[LoginController::class,'reset'])->name('reset');
    Route::get('register',[RegisterController::class,'create'])->name('register');
    Route::post('register',[RegisterController::class,'store'])->name('store');
    Route::get('reset',[LoginController::class,'reset'])->name('reset');
});

Route::group(['middleware' => 'auth'],function (){
    Route::get('/home',[HomeController::class,'index'])->name('home');

    //user profile
    Route::get('/profile',[UserProfileController::class,'index'])->name('profile');
    // Users
    Route::get('/users',[UserController::class,'index'])->name('userIndex');
    Route::get('/user/add',[UserController::class,'add'])->name('userAdd');
    Route::post('/user/create',[UserController::class,'create'])->name('userCreate');
    Route::get('/user/{id}/edit',[UserController::class,'edit'])->name('userEdit');
    Route::post('/user/update/{id}',[UserController::class,'update'])->name('userUpdate');
    Route::delete('/user/delete/{id}',[UserController::class,'destroy'])->name('userDestroy');
    Route::post('/profile',[UserProfileController::class,'store'])->name('profile_store');
    //logout
    Route::post('logout', [RegisterController::class, 'destroy'])->name('logout');
    // Permissions
    Route::get('/permission',[PermissonController::class,'index'])->name('permissionIndex');
    Route::get('/permission/add',[PermissonController::class,'add'])->name('permissionAdd');
    Route::post('/permission/create',[PermissonController::class,'create'])->name('permissionCreate');
    Route::get('/permission/{id}/edit',[PermissonController::class,'edit'])->name('permissionEdit');
    Route::post('/permission/update/{id}',[PermissonController::class,'update'])->name('permissionUpdate');
    Route::delete('/permission/delete/{id}',[PermissonController::class,'destroy'])->name('permissionDestroy');
    // Roles
    Route::get('/roles',[RoleController::class,'index'])->name('roleIndex');
    Route::get('/role/add',[RoleController::class,'add'])->name('roleAdd');
    Route::post('/role/create',[RoleController::class,'create'])->name('roleCreate');
    Route::get('/role/{role_id}/edit',[RoleController::class,'edit'])->name('roleEdit');
    Route::post('/role/update/{role_id}',[RoleController::class,'update'])->name('roleUpdate');
    Route::delete('/role/delete/{id}',[RoleController::class,'destroy'])->name('roleDestroy');
});

