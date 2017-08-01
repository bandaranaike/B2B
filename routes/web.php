<?php

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
    return view('home');
});

Route::group(['prefix' => 'author'], function () {
    Route::match(['get', 'post'], 'create', 'AuthorController@create')->name('author.create');
});

Route::group(['prefix' => 'article'], function () {
    Route::match(['get', 'post'], 'create', 'ArticleController@create')->name('article.create');
    Route::match(['get', 'put'], 'update/{article_id}', 'ArticleController@update')->name('article.update');

    Route::get('show-list', function () {
        return view('article.list');
    })->name('article.list.show');
    Route::get('get-list', 'ArticleController@getList')->name('article.list.get');

    Route::get('{article_id}', function ($id) {
        return view('article.view', ['id' => $id]);
    });
    Route::get('get/{article_id}', 'ArticleController@getArticle')->name('article.get');
    Route::delete('delete', 'ArticleController@delete')->name('article.delete');
});
