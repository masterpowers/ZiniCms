<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator;
use Input;
use Redirect;
//use Hash;
//use Auth;
use App\Role;
use App\User;
use App\Permission;

class RoleController extends Controller {

    public function index(){
        $roles = Role::all();
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
        $validator = Validator::make(Input::all(), array(
            "name"          => "required|unique:roles|max:120|min:3",
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

    public function update($id){
        $role = Role::find($id);
        $validator = Validator::make(Input::all(), array(
            "display_name"  => "required|max:120|min:3",
            "description"   =>"max:500",
        ));
        if($validator->fails()){
            return Redirect::route("admin.role.edit", $role->id)
                ->withErrors($validator)
                ->withInput();
        }else{
            $updated = $role->update([
                "display_name" => Input::get("display_name"),
                "description" => Input::get("description")
            ]);

            if($updated){
                return Redirect::route("admin.role.index")->with("global", "Pemission ".Input::get("name")." successfully updated!");
            }else{
                return Redirect::route("admin.role.index")->with("global", "Something went wrong during the update!");
            }
        }
    }

    public function show($id){
        $role = Role::find($id);
        $allPerms    = Permission::all();
        return view("admin.role.show", array("id"=>$id))->with(array("role" => $role, "allPerms"=>$allPerms));
    }

    public function destroy($id){
        $deleted = Role::find($id)->delete();
        if($deleted){
            return Redirect::route("admin.role.index")->with("global", "Role was successfully deleted");
        }else{
            return Redirect::route("admin.role.index")->with("global", "Something went wrong, try later!");
        }
    }

    public function updatePermissions($role_id){
        $role = Role::find($role_id);
        $synced = $role->perms()->sync(Input::get("permissionsCheckBox"));
        if($synced){
            return Redirect::route("admin.role.show", $role_id)->with("global", "User concepts successfully updated");
        }
    }
}
