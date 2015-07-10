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

//Route::get('/', array( "as" => "home", "uses" => "DashboardController@index" ));

/*BACKEND ROUTES*/
Route::group(['prefix' => 'admin', "namespace"=>"Admin"], function(){
    Route::get('/',  "DashboardController@index");
    Route::get("dashboard", array("as"=>"admin-dashboard", "uses"=>"DashboardController@index"));

    Route::resource('role', 'RoleController');
    Route::resource('permission', 'PermissionController');
    Route::resource('user', 'UserController');
    Route::resource('auth', 'AuthController');

    Route::get("login", array("as"=>"admin-login", "uses"=>"AuthController@create"));


    Route::group(array("before"=>"csrf"), function(){
        Route::post('role/updatePermissions/{role_id}', array("as" => "update-role-permissions", "uses" => 'RoleController@updatePermissions'));
    });
});
