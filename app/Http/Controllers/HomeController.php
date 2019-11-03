<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['role']=Role::get();
        $data['userRole']=DB::table('role_user')
        ->leftjoin('users','users.id','role_user.user_id')
        ->leftjoin('roles','roles.id','role_user.role_id')
        ->leftjoin('permission_role','permission_role.role_id','roles.id')
        ->leftjoin('permissions','permissions.id','permission_role.permission_id')
        ->select('roles.name as role_name','permissions.name')->get();
        $data['permission']=Permission::get();
        return view('home',$data);
    }
}
