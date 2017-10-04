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

Route::resource('user', 'Api\UserController', [
    'only' => ['store', 'destroy']
]);

Route::post('user/{user_id}/group/{group_id}', 'Api\UserController@toggleGroupMembership');

Route::resource('group', 'Api\GroupController', [
    'only' => ['store', 'destroy']
]);