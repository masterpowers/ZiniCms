<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Validator;
use Input;
use Redirect;

class AuthController extends Controller {

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function index(){
        //
    }

    /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
    public function create(){
        if(!Auth::check()){
            return view('admin.user.login');
        }else{
            return Redirect::route("admin-dashboard")
                ->with("global", "Your are already logged in!");
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
                return Redirect::intended("admin/dashboard");
            }else{
                return Redirect::route("admin-login")
                    ->with("global", "Your Email/Password combination is wrong");
            }
        }

    }

    /**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function show($id){
        //
    }

    /**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function edit($id)
    {
        //
    }

    /**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function update($id)
    {
        //
    }

    /**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function destroy(){
        Auth::logout();
        return Redirect::route("admin-dashboard");
    }

}
