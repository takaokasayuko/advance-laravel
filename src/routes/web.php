<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SessionController;

/*
Route::getまたはpost('/アクセスURL', [コントローラーのファイル名::class,'コントローラーファイルのpublic function メソッド名']);
*/

//AuthorController.phpのindexアクションを呼び出し実行
Route::get('/', [AuthorController::class, 'index']);
//AuthorController.phpのaddアクションを呼び出し実行
Route::get('/add', [AuthorController::class, 'add']);
//postメソッドでアクセスされたとき、AuthorController.phpのcreateアクションを呼び出し実行
Route::post('/add', [AuthorController::class, 'create']);
//getメソッドでアクセスした時、editアクションを実行
Route::get('/edit', [AuthorController::class, 'edit']);
//postメソッドでアクセスした時、updateアクションを実行
Route::post('/edit', [AuthorController::class, 'update']);
//getメソッドでアクセスした時、deleteアクションを実行
Route::get('/delete', [AuthorController::class, 'delete']);
//postメソッドでアクセスした時、removeアクションを実行
Route::post('/delete', [AuthorController::class, 'remove']);
//getメソッドでアクセスした時、findアクションを実行
Route::get('/find', [AuthorController::class, 'find']);
//postメソッドでアクセスした時、searchアクションを実行
Route::post('/find', [AuthorController::class, 'search']);
//
//コントローラーの(Author $author)により{author}の数値がAuthorのIDとなる
//Route::get('/author/{author}', [AuthorController::class, 'bind']);
//
Route::get('verror', [AuthorController::class, 'verror']);
//
Route::prefix('book')->group(function () {
    Route::get('/', [BookController::class, 'index']);
    Route::get('/add', [BookController::class, 'add']);
    Route::post('/add', [BookController::class, 'create']);
});

Route::get('/relation', [AuthorController::class, 'relate']);

Route::get('/session', [SessionController::class, 'getSes']);
Route::post('/session', [SessionController::class, 'postSes']);