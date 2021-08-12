<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

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

 Route::get('/vue', function () {
     return view('vue_test');
 });
// Route::get('/testmail', function(){
    // Mail::to('test@example.com')->send(new TestMail);
    // return 'メール送信完了';
// });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

# 入力画面
Route::get('request/', [
  'uses' => 'InsertDemoController@getIndex',
  'as' => 'insert.index'
]);
 

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

  Route::get('/job_offer_registration','CorporationController@form')->name('job_offer_registration');
  Route::post('/update/{id}','CorporationController@update');
  Route::get('/job_offer_registration/{id}','CorporationController@edit');
  Route::post('/posts','CorporationController@create');
  Route::post('/corp_cre','CorporationController@create_corp');
  Route::post('/corp_edit','CorporationController@edit_corp');
   Route::get('/remaking','CorporationController@get_content'); //確認

   Route::get('/job_detail/{id}','CorporationController@show_offer_detail')->name('job_detail'); 
  Route::post('/job_detail/{id}', 'OpenOfferController@sendMailJob');

   Route::get('/lead_offer_detail/{id}','CorporationController@show_lead_offer_detail')->name('lead_offer_detail');
  Route::post('/lead_offer_detail/{id}', 'OpenOfferController@sendMailLead');
   
   

  Route::get('/project_registration','ProjectRegisterController@form')->name('project_registration');
  Route::post('/project_registration/posts','ProjectRegisterController@create');
