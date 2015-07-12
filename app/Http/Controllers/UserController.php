<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
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
        if(Auth::check()){
            return view("user.index")->with(array("id"=> Auth::user()->id));
        }
    }

    public function create(){
        return view("user.register");
    }

    public function store($id){

    }

    public function show($id){
        return User::find($id);
    }

    public function edit($id){
        return User::find($id);
    }

    public function destroy($id){
        $deleted = User::find($id)->delete();
        if($deleted){
            return Redirect::route("user.index")->with("global", "User deleted");
        }else{
            return Redirect::route("user.index")->with("global", "Something went wrong, try again later!");
        }
    }

}
