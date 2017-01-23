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

$app->get('/', function() use ($app) {
    return "PHP Lumen JSON-REST CRUD API";
});

$app->group(['prefix' => 'api/v1','namespace' => 'App\Http\Controllers'], function($app)
{
    $app->get('post','PostController@index');

	$app->get('post/{key_type}/{id}','PostController@countPost');
 
	$app->get('post/{key_type}/{id}','PostController@getPost');
	 
	$app->post('post','PostController@createPost');
	 
	$app->put('post/{post_id}','PostController@updatePost');
	 
	$app->delete('post/{post_id}','PostController@deletePost');

});
