<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\ManagementController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});
Route::get('/logout',[AdminController::class,'logout'])->name('logout');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});
//users
Route::prefix('user')->group(function (){
    Route::get('/view',[UserController::class,'index'])->name('user.index');
});
//classes
Route::prefix('management')->group(function (){
    Route::get('class/view',[ManagementController::class,'index'])->name('class.index');
    Route::get('class/add',[ManagementController::class,'add'])->name('class.add');
    Route::post('class/add',[ManagementController::class,'store'])->name('class.store');
    Route::get('year/view',[ManagementController::class,'yindex'])->name('year.index');
    Route::get('year/add',[ManagementController::class,'yadd'])->name('year.add');
    Route::post('year/add',[ManagementController::class,'ystore'])->name('year.store');
});





