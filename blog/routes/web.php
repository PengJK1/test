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
//前台

Route::get('/','Home\IndexController@index');
Route::get('/cate','Home\IndexController@cate');
Route::get('/art/{art_id}','Home\IndexController@article');



//后台

Route::any('admin/login','Admin\LoginContorller@login');
Route::get('admin/code','Admin\LoginContorller@code');
Route::get('admin/en','Admin\LoginContorller@en');

Route::group(['middleware'=>['admin.login'],'prefix'=>'admin','namespace'=>'Admin'],function (){
    Route::get('/','IndexController@index');
    Route::get('info','IndexController@info');
    Route::get('quit','LoginContorller@quit');
    Route::any('pass','IndexController@pass');

    Route::any('upload','CommonController@upload');

    Route::resource('category','CategoryController');
    Route::post('cate/changeorder','CategoryController@changeOrder');

    Route::resource('article','ArticleController');

    Route::resource('links','LinksController');
    Route::post('links/changeorder','LinksController@changeOrder');

    Route::resource('navs','NavsController');
    Route::post('navs/changeorder','NavsController@changeOrder');

    Route::get('config/putfile','ConfigController@putFile');
    Route::post('config/changeorder','ConfigController@changeOrder');
    Route::post('config/changecontent','ConfigController@changeContent');
    Route::resource('config','ConfigController');

});
