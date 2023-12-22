<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TestMailController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SaunaController;






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


Route::get('/', [DisplayController::class, 'index']);
Route::get('/mail', [TestMailController::class, 'mail']);
//サウナページ表示
Route::get('/saunapage/{sauna}', [DisplayController::class, 'saunapage'])->name('saunapage');
//イイネ機能
Route::get('/like/{sauna}', [LikeController::class, 'like'])->name('like');
Route::get('/unlike/{sauna}', [LikeController::class, 'unlike'])->name('unlike');
//口コミ機能
Route::post('/review/{sauna}', [ReviewController::class, 'review'])->name('review');


//一般ユーザー
Auth::routes();
Route::group(['middleware' => ['auth', 'can:user']], function() {
    //ユーザー情報変更
    Route::get('/user_edit', [RegistrationController::class, 'userEditForm'])->name('user.edit');
    Route::post('/user_edit', [RegistrationController::class, 'userEdit']);
    //ユーザー物理削除
    Route::get('/user_delete_conf', [DisplayController::class, 'DeleteConf'])->name('delete.conf');
    Route::delete('/user_delete_comp', [RegistrationController::class, 'DeleteComp'])->name('delete.comp');
    //サウナリクエスト
    Route::get('/request_form', [RegistrationController::class, 'UserRequest'])->name('request.form');
    Route::post('/request_form', [RegistrationController::class, 'UserRequestForm']);
    //イイネ一覧
    Route::get('/like_list', [DisplayController::class, 'LikeList'])->name('like.list');
});
//管理者ユーザー
Route::group(['middleware' =>['auth', 'can:admin']], function() {
    //ユーザーリスト
    Route::get('/user_list', [AdminController::class, 'userList'])->name('user.list');
    Route::delete('/user_destroy/{user}', [AdminController::class, 'userDestroy'])->name('user.destroy');
    //リクエストリスト
    Route::get('/request_list', [AdminController::class, 'requestList'])->name('request.list');
    Route::delete('/request_destroy/{userrequest}', [AdminController::class, 'requestDestroy'])->name('request.destroy');
    //サウナページ関連
    Route::resource('/sauna', 'SaunaController');
});


