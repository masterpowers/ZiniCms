<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator;
use Input;
use Redirect;
use Hash;
use Auth;
use App\User;
use App\Role;

class RoleController extends Controller {

    public function index(){
        $roles = Role::all();
        return $roles;
//        return view("admin.user.index")->with(array("users" =>$users));
    }
}
