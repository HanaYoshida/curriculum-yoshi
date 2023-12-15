<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TestMailController;
use App\Http\Controllers\LikeController;




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
Route::get('/sauna/{id}', [DisplayController::class, 'sauna'])->name('sauna');
Route::get('/like/{id}', [LikeController::class, 'like'])->name('like');
Route::get('/unlike/{id}', [LikeController::class, 'unlike'])->name('unlike');


//一般ユーザー
Auth::routes();
Route::group(['middleware' => ['auth', 'can:user']], function() {
    Route::get('/mypage', [DisplayController::class, 'mypage'])->name('mypage');
    //ユーザー情報変更
    Route::get('/user_edit', [RegistrationController::class, 'userEditForm'])->name('user.edit');
    Route::post('/user_edit', [RegistrationController::class, 'userEdit']);
    //ユーザー物理削除
    Route::get('/user_delete_conf', [DisplayController::class, 'DeleteConf'])->name('delete.conf');
    Route::delete('/user_delete_comp', [RegistrationController::class, 'DeleteComp'])->name('delete.comp');
    //サウナリクエスト
    Route::get('/request_form', [RegistrationController::class, 'UserRequest'])->name('request.form');
    Route::post('/request_form', [RegistrationController::class, 'UserRequestForm']);

});
//管理者ユーザー
Route::group(['middleware' =>['auth', 'can:admin']], function() {
    Route::get('/admin_page', [AdminController::class, 'admin'])->name('admin.page');
    //ユーザーリスト
    Route::get('/user_list', [AdminController::class, 'userList'])->name('user.list');
    Route::delete('/user_destroy/{id}', [AdminController::class, 'userDestroy'])->name('user.destroy');
    //リクエストリスト
    Route::get('/request_list', [AdminController::class, 'requestList'])->name('request.list');
    Route::delete('/request_destroy/{id}', [AdminController::class, 'requestDestroy'])->name('request.destroy');
    //サウナページ作成
    Route::get('/sauna_post', [AdminController::class, 'saunaPost'])->name('sauna.post');
    Route::post('/sauna_post', [AdminController::class, 'saunaPostForm']);
    //サウナ施設一覧
    Route::get('/sauna_list', [AdminController::class, 'saunaList'])->name('sauna.list');
    Route::get('/sauna_edit/{id}', [AdminController::class, 'saunaEditForm'])->name('sauna.edit');
    Route::post('/sauna_edit/{id}', [AdminController::class, 'saunaEdit']);

    Route::delete('/sauna_destroy/{id}', [AdminController::class, 'saunaDestroy'])->name('sauna.destroy');
    //サウナページ表示
    Route::get('/sauna_page/{id}', [AdminController::class, 'saunaPage'])->name('sauna.page');





});


