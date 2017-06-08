<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->group(['namespace' => 'App\Api\Controllers'], function ($api) {
        $api->get('user/login','AuthController@authenticate');
        $api->group(['middleware'=>'jwt.auth'],function($api){
            $api->get('lessons', 'LessonController@index');
            $api->get('lessons/{id}', 'LessonController@show');
        });
    });
});
