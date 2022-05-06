<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\management\AssignSubjectController;
use App\Http\Controllers\backend\management\ExamTypeController;
use App\Http\Controllers\backend\management\FeeAmoutController;
use App\Http\Controllers\backend\management\FeeCategoryController;
use App\Http\Controllers\backend\management\StudentClassController;
use App\Http\Controllers\backend\management\StudentGroupController;
use App\Http\Controllers\backend\management\StudentYearController;
use App\Http\Controllers\backend\management\SubjectsController;
use App\Http\Controllers\backend\studentManagement\RegistrationController;
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
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
    //users
    Route::prefix('user')->group(function () {
        Route::resource('user',UserController::class);
    });
    //setup management
    Route::prefix('management')->group(function () {
        //class
        Route::get('class/view', [StudentClassController::class, 'index'])->name('class.index');
        Route::get('class/add', [StudentClassController::class, 'add'])->name('class.add');
        Route::post('class/add', [StudentClassController::class, 'store'])->name('class.store');
        //year
        Route::get('year/view', [StudentYearController::class, 'index'])->name('year.index');
        Route::get('year/add', [StudentYearController::class, 'add'])->name('year.add');
        Route::post('year/add', [StudentYearController::class, 'store'])->name('year.store');
        //group
        Route::get('group/view', [StudentGroupController::class, 'index'])->name('group.index');
        Route::get('group/add', [StudentGroupController::class, 'add'])->name('group.add');
        Route::post('group/add', [StudentGroupController::class, 'store'])->name('group.store');
        // fee category
        Route::get('fee_category/view', [FeeCategoryController::class, 'index'])->name('fee_category.index');
        Route::get('fee_category/create', [FeeCategoryController::class, 'create'])->name('fee_category.create');
        Route::post('fee_category/add', [FeeCategoryController::class, 'store'])->name('fee_category.store');
        // fee amount
        Route::get('fee_amount/view', [FeeAmoutController::class, 'index'])->name('fee_amount.index');
        Route::get('fee_amount/create', [FeeAmoutController::class, 'create'])->name('fee_amount.create');
        Route::get('fee_amount/view/{id}', [FeeAmoutController::class, 'view'])->name('fee_amount.view');
        Route::post('fee_amount/add', [FeeAmoutController::class, 'store'])->name('fee_amount.store');
        // exam type
        Route::resource('exam_type', ExamTypeController::class);
        Route::resource('subjects', SubjectsController::class);
        Route::resource('assign_subject', AssignSubjectController::class);
    });
    // student management
    Route::prefix('/student')->group(function () {
        Route::resource('registration', RegistrationController::class);
    });
});
