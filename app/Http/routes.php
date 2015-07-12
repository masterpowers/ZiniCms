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
    Route::get("login", array("as"=>"admin-login", "uses"=>"AuthController@create"));
    Route::resource('role', 'RoleController');
    Route::resource('permission', 'PermissionController');
    Route::resource('user', 'UserController');
    Route::resource('auth', 'AuthController', ['only' => ['create', 'store', 'destroy']]);

    Route::group(array("before"=>"csrf"), function(){
        Route::post('role/updatePermissions/{role_id}', array("as" => "update-role-permissions", "uses" => 'RoleController@updatePermissions'));
    });


});

/*Public Routes*/
Route::get('user/register', array("as"=>"register", "uses"=> "UserController@create"));
Route::resource('user', 'UserController');

/*Can I Access*/
Route::filter('backend_access', function($request){
  // check the current user
    $segment = Request::segment(2);
    if (!Entrust::can('access-dashboard') && $segment !="login") {
      return Redirect::to('admin/login');
    }
});
Route::when('admin/*', 'backend_access');
