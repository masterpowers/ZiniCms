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

//Route::get('/', array( "as" => "home", "uses" => "BaseController@index" ));

/*BACKEND ROUTES*/
Route::group(['prefix' => 'admin', "namespace"=>"Admin"], function(){

    Route::get('/',  "BaseController@index");

    Route::get("dashboard", array("as"=>"admin-dashboard", "uses"=>"BaseController@index"));
    Route::resource('role', 'RoleController');
    Route::resource('permission', 'PermissionController');
    Route::resource('user', 'UserController');

    Route::group(array("before"=>"csrf"), function(){
        Route::post('role/updatePermissions/{role_id}', array("as" => "update-role-permissions", "uses" => 'RoleController@updatePermissions'));
    });

});

Route::get("/", array("as"=>"home", "uses"=>"HomeController@index"));
Route::get("login", array("as"=>"login", "uses"=>"AuthController@create"));
Route::get('register', array("as"=>"register", "uses"=> "UserController@create"));
Route::resource('auth', 'AuthController', ['only' => ['create', 'store', 'destroy']]);

Route::get('user/show/{id}', array("as" => "show-user", "uses" => 'UserController@show'));

Route::group(array("before"=>"auth"), function(){
    Route::resource('user', 'UserController', ['only' => ['create', 'store', 'edit', 'destroy']]);
});


/*Can I Access? */
Entrust::routeNeedsPermission('admin*', 'access-dashboard', Redirect::to('login'));

