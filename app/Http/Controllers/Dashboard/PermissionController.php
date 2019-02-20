<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gate;

class PermissionController extends Controller
{
    protected $permission;
    protected $role;
   
    public function __construct(){
    	$this->permission = app('permission');
        $this->role = app('role');

        if(Gate::denies('adm'))
            return redirect()->back();

        $this->middleware('auth');
    }

    public function index(){
    	$permissions = $this->permission->get();

    	return view('dashboard.permissions.permissions')->with('permissions', $permissions);
    }

    public function roles($id){
		$permissions = $this->permission->find($id);    	

		//recover permissions
		$roles = $permissions->roles()->get();

		return view('dashboard.permissions.roles', compact('permissions', 'roles'));
    }

    public function detach($id){
        $permission = $this->permission->find($id);
    
        $detach = $permission->roles()->detach();
        
        if ($detach) {
            return redirect('/permissions');
        }
        else{
            echo "C@r@*&0, não apagou!!";
        }
    }
}
