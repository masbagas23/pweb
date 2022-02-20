<?php

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
    return view('welcome');
});

Auth::routes();

Route::prefix('verify')->group(function(){
    Route::get('/user', function () {
        return view('auth.verify');
    });
    Route::post('/', [App\Http\Controllers\HomeController::class, 'verify'])->name('verify.send');
});
Route::middleware(['auth', 'verif'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::group(['middleware'=>['verif', 'auth']], function(){
    //Projects route
    Route::resource('/projects', 'App\Http\Controllers\ProjectController');
    Route::get('/projects/{project}/campaign', [App\Http\Controllers\ProjectController::class, 'campaign']);

    //Jobs route
    Route::resource('/jobs', 'App\Http\Controllers\JobController');
    Route::get('/jobs/{job}/apply', [App\Http\Controllers\JobController::class, 'apply']);

    //User route
    Route::get('/users/jobs', [App\Http\Controllers\UserController::class, 'job']);
});