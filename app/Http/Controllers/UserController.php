<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Role;
use App\Permission;

class UserController extends Controller {

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function index( ){

    }

    public function create(){
        return view("user.register");
    }

    public function store($id){

    }

    public function edit($id){

    }

    public function destroy($id){

    }

}
