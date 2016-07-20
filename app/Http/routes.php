<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('inicio', function () {
    return view('welcome');
});
Route::group(['prefix' => 'admin', 'middleware'=>'auth'], function() {
    Route::resource('user', 'UserController');
    Route::get('user/{id}/destroy',
    	[
    		"uses"	=>	"UserController@destroy",
    		"as"	=>	"admin.user.destroy"
    	]);

    Route::resource('category', 'CategoryController');
    Route::get('category/{id}/destroy',[
    		'uses'	=>	'CategoryController@destroy',
    		'as'	=>	'admin.category.destroy'
    	]);
    Route::resource('tags', 'TagsController');
    Route::get('tags/{id}/destroy',[
            'uses'  =>  'TagsController@destroy',
            'as'    =>  'admin.tags.destroy'
        ]);
    Route::resource('article', 'ArticleController');
    Route::get('article/{id}/destroy',[
            'uses'  =>  'ArticleController@destroy',
            'as'    =>  'admin.article.destroy'
        ]);

});

Route::auth();

Route::get('/', 'HomeController@index');
