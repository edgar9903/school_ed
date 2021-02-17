<?php

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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::group(['prefix' => 'admin','as' => 'admin.','middleware' => ['auth','verified','admin']],function () {

    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    /**
     *  Teacher crud.
     */
    Route::resources([
        'teacher' => App\Http\Controllers\Admin\TeacherController::class,
        'classroom' => App\Http\Controllers\Admin\ClassroomController::class,
        'lesson' => App\Http\Controllers\Admin\LessonController::class,
        'schedule' => App\Http\Controllers\Admin\ScheduleController::class,
    ]);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
