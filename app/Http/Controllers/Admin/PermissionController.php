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

class PermissionController extends BaseController {

    public function index(){
        $permissions = Permission::all();
        return view("admin.permission.index")->with(array("permissions" =>$permissions, "page_title"=>"Permission List"));
    }

    public function create(){
        return view("admin.permission.create")->with("page_title","Add Permission");
    }

    public function edit($id){
        $permission = Permission::find($id);
        return view("admin.permission.edit")->with(array("permission" => $permission, "page_title"=>"Edit Permission"));
    }


    public function store(){
        $validator = Validator::make(Input::all(), array(
            "name"          => "required|unique:permissions|max:120|min:3",
            "display_name"  => "required|max:120|min:3",
            "description"   =>"max:500",
        ));

        if($validator->fails()){
            return Redirect::route("admin.permission.create")
                ->withErrors($validator)
                ->withInput();
        }else{
            /*STORE INPUT IN VARIABLES */
            $name = Input::get("name");
            $display_name = Input::get("display_name");
            $description = Input::get("description");

            //            $lastID = Permission::orderBy('id','desc')->take(1)->get()[0]->id;

            $permission = Permission::create(array(
                "name"  => $name,
                "display_name"  => $display_name,
                "description"  => $description
            ));

            if($permission){
                return Redirect::route("admin.permission.index")
                    ->with("global", "Permission successfully added!");
            }
        }
    }

    public function update($id){
        $permission = Permission::find($id);
        $validator = Validator::make(Input::all(), array(
            "display_name"  => "required|max:120|min:3",
            "description"   =>"max:500",
        ));
        if($validator->fails()){
            return Redirect::route("admin.permission.edit", $permission->id)
                ->withErrors($validator)
                ->withInput();
        }else{
            $updated = $permission->update([
                "display_name" => Input::get("display_name"),
                "description" => Input::get("description")
            ]);

            if($updated){
                return Redirect::route("admin.permission.index")->with("global", "Pemission ".Input::get("name")." successfully updated!");
            }else{
                return Redirect::route("admin.permission.index")->with("global", "Something went wrong during the update!");
            }
        }
    }

    public function destroy($id){
        $deleted = Permission::find($id)->delete();
        if($deleted){
            return Redirect::route("admin.permission.index")->with("global", "Permission was successfully deleted");
        }else{
            return Redirect::route("admin.permission.index")->with("global", "Something went wrong, try later!");
        }
    }
}
