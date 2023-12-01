<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;


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
    return view('top_page');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function() {
    Route::get('/top_page', [DisplayController::class, 'index']);
    Route::get('/mypage', [DisplayController::class, 'mypage'])->name('mypage');
    //ユーザー情報変更
    Route::get('/user_edit', [RegistrationController::class, 'userEditForm'])->name('user.edit');
    Route::post('/user_edit', [RegistrationController::class, 'userEdit']);

});