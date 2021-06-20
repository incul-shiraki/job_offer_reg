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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

# 入力画面
Route::get('request/', [
  'uses' => 'InsertDemoController@getIndex',
  'as' => 'insert.index'
]);
 
# 確認画面
// Route::post('request/confirm', [
//   'uses' => 'InsertDemoController@confirm',
//   'as' => 'insert.confirm'
// ]);


// Route::post('request/finish', [
//   'uses' => 'InsertDemoController@finish',
//   'as' => 'insert.finish'
// ]);

Route::get('student/list','StudentController@getIndex');

Route::get('/', 'PagesController@getHome');
Route::get('/about', 'PagesController@getAbout');
Route::get('/contact', 'PagesController@getContact');

	Route::group(['prefix' => 'student'], function () {
 		Route::get('list', 'StudentController@getIndex'); //一覧
 		Route::get('new', 'StudentController@new_index'); //入力
 		Route::patch('new','StudentController@new_confirm'); //確認
 		Route::post('new', 'StudentController@new_finish'); //完了
    Route::get('edit/{id}', 'StudentController@edit_index'); //編集
    Route::patch('edit/{id}','StudentController@edit_confirm'); //確認
    Route::post('edit/{id}', 'StudentController@edit_finish'); //完了
  	Route::get('delete/{id}/', 'StudentController@us_delete'); //削除
  	Route::post('delete/{id}/', 'StudentController@us_delete'); //削除
    Route::get('show/{id}', 'StudentController@show'); //編集

	});
	Route::get('/job_offer_registration','CorporationController@new');
	Route::post('/update/{id}','CorporationController@update');
	Route::get('/job_offer_registration/{id}','CorporationController@edit');
	// Route::get('/job_offer_registration','CorporationController@test_end');
 	// Route::patch('/posts','CorporationController@new_confirm'); //確認
 	// Route::get('/posts','CorporationController@new_confirm'); //確認
	// Route::post('/posts','CorporationController@create');
	Route::post('/posts','CorporationController@create');
	Route::post('/corp_cre','CorporationController@create_corp');
	Route::post('/corp_edit','CorporationController@edit_corp');
 	Route::get('/remaking','CorporationController@get_content'); //確認

