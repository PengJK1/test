<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get('hello/:name', 'index/hello');

Route::rule('index', 'index/index/index');
Route::rule('article', 'index/article/index');
Route::rule('page/:id', 'index/page/index');



Route::rule('admin/login', 'admin/Login/index');
Route::get('admin/login/code', 'admin/Login/CodeConfig');


Route::group(['name'=>'admin','prefix'=>'admin/'],function(){
	Route::get('index', 'Index/index');
	Route::get('login/quit', 'Login/quit');
	Route::resource('cate','Category');
	Route::resource('art','Article');
	Route::resource('navs','Navs');
	Route::resource('links','Links');
	Route::get('user/edit', 'User/edit');
})->middleware('Login');





//Route::resource('admin/user','admin/User');

//在这个分组里没有使用上面的路由就会使用下面的miss路由
//Route::miss('index/index/index');


return [
    
];
