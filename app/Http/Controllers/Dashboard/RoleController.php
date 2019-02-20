<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gate;

class RoleController extends Controller
{
    protected $role;
    protected $permission;
   
    public function __construct(){
    	$this->role = app('role');
        $this->permission = app('permission');
    }

    public function index(){
    	$roles = $this->role->get();

        if(Gate::denies('adm'))
            return redirect()->back();

    	return view('dashboard.roles.roles')->with('roles', $roles);
    }

    public function permissions($id){
		$role = $this->role->find($id);    	

		//recover permissions
		$permissions = $role->permissions()->get();

		return view('dashboard.roles.permissions', compact('role', 'permissions'));
    }

    public function create(){
        $permissions = $this->permission->get();
        $roles = $this->role->get();

        return view('dashboard.roles.add_roles', compact('permissions', 'roles'));
    }

    public function store(Request $request){
        $this->role->name = $request->name;
        $this->role->label = $request->label;

        $this->role->save();

        //$insert = $this->role->insert($requestRoles);
        
        $insert = $this->role->permissions()->sync($request->permission);
        if ($insert) {
            return redirect('/roles');
        }
        else{
            echo "Faiô";
        }   
    }

    public function edit($id){
        $roles = $this->role->find($id);
        $permissions = $this->permission->get();

        return view('dashboard.roles.edit_roles', ['roles' => $roles, 'permissions' => $permissions]);
    }

    public function update($id, Request $request){
        $role = $this->role->find($id);

        $role->name = $request->name;
        $role->label = $request->label;

        $role->save();

        $insert = $role->permissions()->sync($request->permission);
        if ($insert) {
            return redirect('/roles');
        }
        else{
            echo "Faiô";
        }
    }

    public function destroy($id){
        $role = $this->role->find($id);
    
        $delete = $role->permissions()->detach();
        $role->delete();

        if ($delete) {
            return redirect('/roles');
        }
        else{
            echo "C@r@*&0, não apagou!!";
        }
    }

    public function detach($id){
        $role = $this->role->find($id);
    
        $detach = $role->permissions()->detach();
        
        if ($detach) {
            return redirect('/roles');
        }
        else{
            echo "C@r@*&0, não apagou!!";
        }
    }
}
