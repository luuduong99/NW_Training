<?php

use App\Http\Controllers\FacultyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'prefix' => 'edu',
    'as' => 'edu.',
], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::group([
        'prefix' => 'faculties',
        'as' => 'faculties.',
    ],
        function () {
            Route::get('list_faculties', [FacultyController::class, 'index'])->name('list_faculties');
            Route::get('create_faculty', [FacultyController::class, 'create'])->name('create_faculty');
            Route::post('store_faculty', [FacultyController::class, 'store'])->name('store_faculty');
            Route::get('edit_faculty/{id}', [FacultyController::class, 'edit'])->name('edit_faculty');
            Route::put('update_faculty/{id}', [FacultyController::class,'update'])->name('update_faculty');
            Route::delete('delete_faculty/{id}', [FacultyController::class, 'destroy'])->name('delete_faculty');
        }
    );

    Route::group(
        [
            'prefix' => 'students',
            'as' => 'students.',
        ],
        function () {
            Route::get('list_students', [StudentController::class, 'index'])->name('list_students');
            Route::get('create_student', [StudentController::class, 'create'])->name('create_student');
            Route::post('store_student', [StudentController::class, 'store'])->name('store_student');
            Route::get('edit_student/{id}', [StudentController::class, 'edit'])->name('edit_student');
        }
    );
});