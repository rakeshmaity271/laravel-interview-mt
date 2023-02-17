<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['web']], function () {
    Auth::routes();

    Route::group(['middleware' => ['auth', 'admin']], function () {
        Route::get('/admin-dashboard', [App\Http\Controllers\AdminDashboardController::class, 'index'])->name('admin-dashboard');

        Route::any('/admin-dashboard/category/add', [App\Http\Controllers\AdminDashboardController::class, 'addCategory'])->name('add-category');

        Route::any('/admin-dashboard/category/edit/{id}', [App\Http\Controllers\AdminDashboardController::class, 'editCategory'])->name('edit-category');

        Route::any('/admin-dashboard/category/delete/{id}', [App\Http\Controllers\AdminDashboardController::class, 'deleteCategory'])->name('delete-category');


    });


    Route::get('/user-dashboard', [App\Http\Controllers\UserDashboardController::class, 'index'])->name('user-dashboard')->middleware(['auth', 'user']);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});





// Route::get('protected', ['middleware' => ['auth', 'role'], function() {
//     return "this page requires that you be logged in and an Admin";
// }]);

