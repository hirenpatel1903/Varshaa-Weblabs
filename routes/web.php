<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [LoginController::class, 'index']);
Route::get('/client-register', [RegisterController::class, 'index'])->name('client-register');
Route::post('/client-register', [RegisterController::class, 'store'])->name('clientRegister');

Auth::routes();

Route::post('resetpasswordemail', [ResetPasswordController::class, 'resetPasswordSendEmail'])->name('resetpasswordemail');
Route::get('forgot-password/{token}', [ResetPasswordController::class, 'showPasswordResetForm']);
Route::post('reset-password/{token}', [ResetPasswordController::class, 'resetPassword'])->name('passwordreset');

Route::post('checkEmail', [HomeController::class, 'checkEmail'])->name('checkEmail');
Route::get('404notfound', [HomeController::class, 'notFound'])->name('404notfound');
Route::get('500error', [HomeController::class, 'exceptions'])->name('500error');
Route::get('401unauthorized', [HomeController::class, 'unauthorized'])->name('401unauthorized');
Route::post('settimezone', [HomeController::class, 'settimezone'])->name('settimezone');

Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');
Route::get('clear-cache', [HomeController::class,'clearCache'])->middleware(['auth']);

Route::middleware(['auth'])->group(function (){

    /* my-profile */
    Route::get('myprofile', [App\Http\Controllers\admin\UserController::class,'getMyProfile'])->name('myprofile');
    Route::post('updatemyprofile', [App\Http\Controllers\admin\UserController::class,'updateMyProfile'])->name('updatemyprofile');

    /* change-password */
    Route::get('changepassword', [ResetPasswordController::class,'changepassword'])->name('changepassword');
    Route::post('change-password', [ResetPasswordController::class,'storeChangePassword'])->name('change.password');

    /* Admin */
    Route::group(['prefix' => 'admin','namespace' => 'admin'], function()
    {

        Route::group(['middleware' => ['isadmin']], function () {

            /* dashboard */
            Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class,'index'])->name('dashboard');

            /* technology */
            Route::get('technology', [App\Http\Controllers\Admin\TechnologyController::class,'index'])->name('technology');
            Route::get('technology/create', [App\Http\Controllers\Admin\TechnologyController::class,'create'])->name('technology.create');
            Route::post('technology/store', [App\Http\Controllers\Admin\TechnologyController::class,'store'])->name('technology.store');
            Route::get('technology/{id}/edit', [App\Http\Controllers\Admin\TechnologyController::class,'edit'])->name('technology.edit');
            Route::patch('technology/update/{id}', [App\Http\Controllers\Admin\TechnologyController::class,'update'])->name('technology.update');
            Route::delete('technology/{id}', [App\Http\Controllers\Admin\TechnologyController::class,'destroy'])->name('technology.delete');
            Route::post('gettechnology', [App\Http\Controllers\Admin\TechnologyController::class,'getTechnologyList'])->name('gettechnology');


        });
    });

    /* Client */
    Route::group(['prefix' => 'client','namespace' => 'client'], function()
    {
        Route::group(['middleware' => ['isclient']], function () {

            /* dashboard */
            Route::get('dashboard', [App\Http\Controllers\Client\DashboardController::class,'index'])->name('client.dashboard');
        });

    });
});
