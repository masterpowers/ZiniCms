<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Validator;
use Input;
use Redirect;

class AuthController extends Controller {

    /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
    public function create(){
        if(!Auth::check()){
            return view('user.login');
        }else{
            if(Auth::user()->can("access-dashboard")){
                return Redirect::intended("admin/dashboard");
            }else{
                return Redirect::intended("/");
            }
        }
    }

    /**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
    public function store(){
        $input = Input::all();
        $validator = Validator::make($input, array(
            "email" => "required|email",
            "password"=>"required"
        ));

        /*Validation*/
        if($validator->fails()){
            return Redirect::route("login")
                ->withErrors($validator)
                ->withInput();
        }else{
            /*IF input has remember me checked*/
            $remember = (Input::has("remember")) ? true : false;

            $auth = Auth::attempt(array(
                "email"     =>  Input::get("email"),
                "password"  =>  Input::get("password"),
            ), $remember);

            if($auth){
                if(Auth::user()->can("access-dashboard")){
                    return Redirect::intended("admin/dashboard");
                }else{
                    return Redirect::intended("/");
                }
            }else{
                return Redirect::route("login")
                    ->with("failedAuthMsg", "The Email/Password combination is wrong, please try again.");
            }
        }
    }

    /**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function destroy(){
        Auth::logout();
        return Redirect::route("login");
    }

}
