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
//        return $roles;
        return view("admin.role.index")->with(array("roles" =>$roles));
    }

    public function create(){
        return view("admin.role.create");
    }

    public function edit($id){
        $role = Role::find($id);
        return view("admin.role.edit")->with(array("role" => $role));
    }


    public function store(){
//        dd(Input::all());

        $validator = Validator::make(Input::all(), array(
//            "name"          => "required|max:120|min:3",
            "display_name"  => "required|max:120|min:3",
            "description"   =>"max:500",
        ));

        if($validator->fails()){
            return Redirect::route("admin.role.create")
                ->withErrors($validator)
                ->withInput();
        }else{
            /*STORE INPUT IN VARIABLES */
            $name = Input::get("name");
            $display_name = Input::get("display_name");
            $description = Input::get("description");

//            $lastID = Role::orderBy('id','desc')->take(1)->get()[0]->id;

            $role = Role::create(array(
                "name"  => $name,
                "display_name"  => $display_name,
                "description"  => $description
            ));

            if($role){
                return Redirect::route("admin.role.index")
                    ->with("global", "Role successfully added!");
            }
        }
    }

    public function destroy($id){
        $deleted = Role::find($id)->delete();
        if($deleted){
            return "Role deleted";
        }else{
            return "Something went wrong, try again later!";
        }
    }
}
