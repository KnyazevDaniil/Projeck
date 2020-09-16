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

Auth::routes();

//Route::get('/', function () {
//    return view('main');
//});
// Личный кабинет
Route::get('/home', 'HomeController@index')->name('home');

// Получить все новости
Route::get('/', 'NewsController@getNews')->name('main');

// Изменение новости
Route::post('/edit', 'NewsController@editNews')->name('edit');
Route::post('/edit/submit', 'CreateController@editNews')->name('edit-form');

// Удаление новости
Route::post('/delete', 'NewsController@deleteNews')->name('deleteNews');

// Удаление комментария
Route::post('/deleteComment', 'CommentController@deleteComment')->name('deleteComment');

// Создание новости
Route::get('/create', 'TagController@getTag')->name('create');

// Создание комментария
Route::post('/submit', 'CommentController@submit')->name('create-comment');

// Создание новости
Route::post('/create/submit', 'CreateController@submit')->name('create-form');

// Переход на новость
Route::get('/{news}', 'NewsController@getItemOfNews');

// Редактировать профиль
Route::post('/edit-profile', 'UserController@editUser')->name('editUser');

// Сохранить профиль
Route::post('/saveProfile', 'UserController@saveProfile')->name('saveProfile');

// Фильтр новостей
Route::post('/filter', 'NewsController@filter')->name('filter');

