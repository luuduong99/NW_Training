<?php

use App\Http\Controllers\FacultyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
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
Route::group(['middleware' => ['locale', 'route', 'method']], function () {
    Route::get('change_language/{language}', [HomeController::class, 'language'])
        ->name('change_language');
    Auth::routes();
    Route::group([
        'middleware' => ['auth', 'auth.admin']
    ], function () {
        Route::get('home', [HomeController::class, 'index'])->name('home');
        Route::resource('faculties', FacultyController::class);
        Route::resource('students', StudentController::class)->except(['show']);
        Route::group(
            [
                'prefix' => 'students',
                'as' => 'students.',
            ],
            function () {
                Route::get('profile/{id}', [StudentController::class, 'show'])->name('profile')
                    ->withoutMiddleware('auth.admin');
                Route::put('profile-update/{id}', [StudentController::class, 'updateProfile'])
                    ->name('profile_update')->withoutMiddleware('auth.admin');
                Route::post('register-multiple-subject', [StudentController::class, 'registerMultipleSubject'])
                    ->name('register-multiple-subject')->withoutMiddleware('auth.admin');
                Route::post('notification/{id}', [StudentController::class, 'sendNotification'])
                    ->name('notification');
                Route::post('import', [StudentController::class, 'import'])->name('import');

                Route::get('list-subject-of-student/{id}', [StudentController::class, 'subjectOfStudent'])
                    ->name('subject');
                Route::post('add-point/{id}', [StudentController::class, 'addPoint'])
                    ->name('add_point');

                Route::get('list-point-of-student/{id}', [StudentController::class, 'listPoint'])
                    ->name('point');
                Route::post('get-point', [StudentController::class, 'getPoint'])->name('get_point');
                Route::post('add-point-multiple/{id}', [StudentController::class, 'addPointMultiple'])
                    ->name('add_point_multiple');
            }
        );
        Route::resource('subjects', SubjectController::class)->except(['index']);
        Route::get('', [SubjectController::class, 'index'])->name('subjects.index')
            ->withoutMiddleware('auth.admin');
    });
});
