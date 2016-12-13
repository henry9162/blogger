<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['middleware' => ['web']], function(){

	/*** Newsletter section ***/
	Route::post('/subscribers', [
		'uses' => 'subscribersController@store',
		'as' => 'subscribersLog'
	]);

	/**  Login section ***/

	Route::post('auth/signin', [
		'uses' => 'AuthController@postSignin',
		'as' => 'auth.signin'
	]);

	Route::get('auth/signout', [
		'uses' => 'AuthController@getSignout',
		'as' => 'signout'
		]);

	//Registrations Routes
	Route::post('auth/signup', [
		'uses' => 'AuthController@postSignup',
		'as' => 'auth.signup'
	]);

	/**  Serach  route ***/

	Route::get('/search', [
		'uses' => 'SearchController@getResults',
		'as' => 'search.results'
	]);

	/**  Like  route ***/

	Route::post('/postLikes', [
		'uses' => 'PostController@postLikes',
		'as' => 'postLikes'
	]);

	Route::post('/replyLikes', [
		'uses' => 'RepliesController@replyLikes',
		'as' => 'replyLikes'
	]);

	Route::post('/commentLikes', [
		'uses' => 'CommentsController@commentLikes',
		'as' => 'commentLikes'
	]);

	/*Reply route*/

	Route::post('/replies', [
		'uses' => 'RepliesController@store',
		'as' => 'replies'
	]);

	/*Comment Route*/

	Route::post('/comments', [
		'uses' => 'CommentsController@store',
		'as' => 'comments'
	]);

	Route::get('comment/{id}/show', [
		'uses' => 'CommentsController@show',
		'as' => 'comments.show'
	]);

	Route::get('comment/{id}/edit', [
		'uses' => 'CommentsController@edit',
		'as' => 'comments.edit'
	]);

	Route::put('comment/{id}', [
		'uses' => 'CommentsController@update',
		'as' => 'comments.update'
	]);

	Route::delete('comment/{id}', [
		'uses' => 'CommentsController@destroy',
		'as' => 'comments.destroy'
	]);


	/*Tags route*/

	Route::get('tag/{id}', [
		'uses' => 'TagController@getTag',
		'as' => 'tag.page'
	]);

	Route::resource('tags', 'TagController', ['except' => ['create']]);

	/*Categories route*/

	Route::get('category/{id}', [
		'uses' => 'CategoryController@getCategory',
		'as' => 'category.page'
	]);

	Route::resource('categories', 'CategoryController', ['except' => ['create']]);

	/*Slug single post*/

	Route::get('blog/{slug}', [
		'uses' => 'BlogController@getSingle',
		'as' => 'blog.single'
	])->where('slug', '[\w\d\-\_]+');	

	/*Posts route*/

	Route::resource('/posts', 'PostController');

	/*Pages route*/

	Route::get('/', [
		'uses' => 'PagesController@getIndex',
		'as' => 'home'
	]);

	Route::get('/about', 'PagesController@getAbout');

	Route::get('/blog', 'PagesController@getBlog');

	//Route::get('/web-development', 'PagesController@getWebDevelopment');

	Route::get('/contact', 'PagesController@getContact');

	Route::post('/contact', [
		'uses' => 'PagesController@postContact',
		'as' => 'post.contact'
	]);
});

Route::get('/redis', function(){
	$app = LRedis::connection();
	$app->set("key2", "value2");
	print_r($app->get("key2"));
});

Route::get('/mail/queue', 'subscribersController@queuedMessage'); 





