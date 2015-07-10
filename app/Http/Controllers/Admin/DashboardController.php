<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator;
use Input;
use Redirect;
use Auth;
use App\User;
use App\Permission;
use App\Role;

class DashboardController extends Controller {

    public function index(){
        if(Auth::check() && Auth::user()->can('access-dashboard')){
            $roles = Role::all();
            $permissions = Permission::all();
            return view("admin.dashboard.index")->with(array("roles"=>$roles, "permissions" => $permissions));
        }else{
            return Redirect::route("admin-login");
        }
    }

}
