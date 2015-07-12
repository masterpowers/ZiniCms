<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\User;
use App\Role;
use App\Permission;
use Redirect;

class HomeController extends Controller {

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function index(){
        if(Auth::check()){
            return view("user.index")->with(array("id"=> Auth::user()->id));
        }
    }

}
