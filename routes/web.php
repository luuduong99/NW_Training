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
    'middleware' => ['auth.login', 'auth.admin', 'locale']
], function () {
    //-----------------------------------
    //----Home----------------
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('change_language/{language}', [HomeController::class, 'language'])->name('change_language')
        ->withoutMiddleware('auth.admin');
    //-----------------------------------
    //----Route Faculties----------------
    Route::resource('faculties', FacultyController::class);
    //-----------------------------------
    //----Route Students-----------------
    Route::resource('students', StudentController::class);
    Route::group(
        [
            'prefix' => 'students',
            'as' => 'students.',
        ],
        function () {
            Route::get('profile/{id}', [StudentController::class, 'show'])->name('profile')
                ->withoutMiddleware('auth.admin');
            Route::post('register_multiple_subject', [StudentController::class, 'registerMultipleSubject'])
                ->name('register_multiple_subject')->withoutMiddleware('auth.admin');
            Route::post('notification/{id}', [StudentController::class, 'sendNotification'])
                ->name('notification');
            Route::post('import', [StudentController::class, 'import'])->name('import');
        }
    );
    //-----------------------------------
    //----Route Subjects-----------------
    Route::resource('subjects', SubjectController::class)->except(['index']);
    Route::group(
        [
            'prefix' => 'subjects',
            'as' => 'subjects.',
        ],
        function () {
            Route::get('', [SubjectController::class, 'index'])->name('index')
                ->withoutMiddleware('auth.admin');
        }
    );
    //-----------------------------------
    //----Route Points-----------------
    Route::group(
        [
            'prefix' => 'points',
            'as' => 'points.',
        ],
        function () {
            Route::get('list', [PointController::class, 'index'])->name('list');
            Route::get('list_point_student/{id}', [PointController::class, 'studentPoints'])
                ->name('list_point_student');
            Route::post('add_point', [PointController::class, 'point'])->name('add_point');
            Route::post('add_point_student/{id}', [PointController::class, 'pointStudent'])
                ->name('add_point_student');
            Route::post('multiple_add_point/{id}', [PointController::class, 'multipleAddPoint'])
                ->name('multiple_add_point');
        }
    );
});
