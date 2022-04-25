<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\management\FeeCategoryController;
use App\Http\Controllers\backend\management\StudentClassController;
use App\Http\Controllers\backend\management\StudentGroupController;
use App\Http\Controllers\backend\management\StudentYearController;
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
    //class
    Route::get('class/view',[StudentClassController::class,'index'])->name('class.index');
    Route::get('class/add',[StudentClassController::class,'add'])->name('class.add');
    Route::post('class/add',[StudentClassController::class,'store'])->name('class.store');
    //year
    Route::get('year/view',[StudentYearController::class,'index'])->name('year.index');
    Route::get('year/add',[StudentYearController::class,'add'])->name('year.add');
    Route::post('year/add',[StudentYearController::class,'store'])->name('year.store');
    //group
    Route::get('group/view',[StudentGroupController::class,'index'])->name('group.index');
    Route::get('group/add',[StudentGroupController::class,'add'])->name('group.add');
    Route::post('group/add',[StudentGroupController::class,'store'])->name('group.store');
    // fee category
    Route::get('fee_category/view',[FeeCategoryController::class,'index'])->name('fee_category.index');
    Route::get('fee_category/add',[FeeCategoryController::class,'create'])->name('fee_category.create');
    Route::post('fee_category/add',[FeeCategoryController::class,'store'])->name('fee_category.store');
});





