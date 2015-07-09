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

Route::get('/', array( "as" => "home", "uses" => "UserController@index" ));

Route::group(['prefix' => 'admin', "namespace"=>"Admin"], function(){
    Route::get('/',  "UserController@index");
    Route::resource('role', 'RoleController');
    Route::get('role/editPermissions/{role_id}', array( "as"=>"edit-role-permissions", "uses" => 'RoleController@editPermissions') );
    Route::resource('permission', 'PermissionController');
    Route::resource('user', 'UserController');

    Route::group(array("before"=>"csrf"), function(){
        Route::post('role/updatePermissions/{role_id}', 'RoleController@updatePermissions');
    });
});
