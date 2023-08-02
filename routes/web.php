<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PointController;

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

Route::post('signIn', [LoginController::class, 'signIn'])->name('signIn');

Route::group([
    'prefix' => 'edu',
    'as' => 'edu.',
    'middleware' => ['auth.login', 'auth.admin']
], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::group(
        [
            'prefix' => 'faculties',
            'as' => 'faculties.',
        ],
        function () {
            Route::get('list_faculties', [FacultyController::class, 'index'])->name('list_faculties');
            Route::get('create_faculty', [FacultyController::class, 'create'])->name('create_faculty');
            Route::post('store_faculty', [FacultyController::class, 'store'])->name('store_faculty');
            Route::get('edit_faculty/{id}', [FacultyController::class, 'edit'])->name('edit_faculty');
            Route::put('update_faculty/{id}', [FacultyController::class, 'update'])->name('update_faculty');
            Route::delete('delete_faculty/{id}', [FacultyController::class, 'destroy'])
                ->name('delete_faculty');
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
            Route::put('update_student/{id}', [StudentController::class, 'update'])->name('update_student');
            Route::delete('delete_student/{id}', [StudentController::class, 'destroy'])
                ->name('delete_student');
            Route::get('profile_student/{id}', [StudentController::class, 'show'])->name('profile_student')
                ->withoutMiddleware('auth.admin');
            Route::post('register_multiple_subject', [StudentController::class, 'registerMultipleSubject'])
                ->name('register_multiple_subject')->withoutMiddleware('auth.admin');
            Route::post('notification/{id}', [StudentController::class, 'sendNotification'])->name('notification');
        }
    );

    Route::group(
        [
            'prefix' => 'subjects',
            'as' => 'subjects.',
        ],
        function () {
            Route::get('list_subjects', [SubjectController::class, 'index'])->name('list_subjects')
                ->withoutMiddleware('auth.admin');
            Route::get('create_subject', [SubjectController::class, 'create'])->name('create_subject');
            Route::post('store_subject', [SubjectController::class, 'store'])->name('store_subject');
            Route::get('edit_subject/{id}', [SubjectController::class, 'edit'])->name('edit_subject');
            Route::put('update_subject/{id}', [SubjectController::class, 'update'])->name('update_subject');
            Route::delete('delete_subject/{id}', [SubjectController::class, 'destroy'])
                ->name('delete_subject');
        }
    );

    Route::group(
        [
            'prefix' => 'points',
            'as' => 'points.',
        ],
        function () {
            Route::get('list_points_all', [PointController::class, 'index'])->name('list_point_all');
            Route::get('list_point_students/{id}', [PointController::class, 'studentPoints'])
                ->name('list_point_students');
            Route::post('add_point', [PointController::class, 'point'])->name('add_point');
            Route::post('add_point_student/{id}', [PointController::class, 'pointStudent'])
                ->name('add_point_student');
        }
    );
});
