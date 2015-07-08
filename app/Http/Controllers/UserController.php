<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//use Validator;
//use Input;
//use Redirect;
//use Hash;
use App\User;
use App\Role;
use App\Permission;

class UserController extends Controller {

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function index(){
//        $data['message'] = "TESTING THE ENTRUST MODULE";
        $user = User::find(1);
        $data['user'] = $user;
        $data['roles'] = $user->roles;
        $data['permissions'] = $user->permissions;
            return $data ;
    }

}
