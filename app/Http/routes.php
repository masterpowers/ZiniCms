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

Route::group(array('prefix' => 'admin', "namespace"=>"Admin"), function(){

    Route::get('role', array( "as" => "role-index", "uses" => "RoleController@index" ));

    Route::group(array("before"=>"csrf"), function(){

    });
});
