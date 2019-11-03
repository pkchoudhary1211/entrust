<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\Permission;
use DB;
use Auth;

use Illuminate\Http\Request;

class commonController extends Controller
{
    public function newRole(Request $req){
		$per=$req->permission;
		// dd($per);
    	$req->validate(['name'=>'required','Display_Name'=>'required','Details' =>'required','permission'=>'required']);
    	$role=new Role;
    	$role->name=$req->name;
    	$role->display_name=$req->Display_Name;
    	$role->description=$req->Details;
    	$role->save();
    	$data=Role::select('id')->orderBy('id','desc')->first();
    	foreach ($per as $value) {
    		DB::table('permission_role')->insert(['role_id'=>$data->id,'permission_id'=>$value]);
        }
        return redirect()->route('home');
        // Session::flash('message', 'Role Saved Sucessfully'); 
        // $data['role']=Role::select('id','name','display_name','description')->get();
    	// return redirect()->route('rolelist');
    }
    public function newPermission(Request $req){
    	$req->validate(['name'=>'required','Display_Name'=>'required','Details' =>'required']);
    	$permissions = new Permission;
    	$permissions->name=$req->name;
    	$permissions->display_name=$req->Display_Name;
    	$permissions->description=$req->Details;
        $permissions->save();
        return redirect()->route('home');
        // Session::flash('message', 'Permission Saved Sucessfully'); 
        // $data['permissions']=permission::select('id','name','display_name','description')->get();
        // return redirect()->route('permission_list');
	}
	public function userRole(Request $request){
		$data=DB::table('role_user')->where('user_id',Auth::user()->id)->update(['role_id'=>$request->id]);
		return redirect()->route('home');
	}
}
