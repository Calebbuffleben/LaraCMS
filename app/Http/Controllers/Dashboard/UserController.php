<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use Validator;
use Gate;

class UserController extends Controller
{
    protected $user;
    protected $role;

    public function __construct(User $user, Role $role){
    	$this->user = $user;
        $this->role = $role;
        $this->middleware('auth');
    }

    public function index(){
    	$users = $this->user->get();

        if(Gate::denies('user'))
            return redirect()->back();

    	return view('dashboard.users.users')->with('users', $users);
    }

    public function roles($id){
		$user = $this->user->find($id);    	

		//recover permissions
		$roles = $user->roles()->get();

		return view('dashboard.users.roles', compact('user', 'roles'));
    }

    public function create(){
        $roles = $this->role->get();
        return view('dashboard.users.add_user', compact('roles'));
    }

    public function store (Request $request){
        /* validator = Validator::make($request->all(), [
            'passwd' => 'required',
            'passwdSame' => 'required|same:passwd',
        ]);

        if ($validator->fails()) {
            return redirect('rota/qualquer')
                        ->withErrors($validator)
                        ->withInput();
        } */
        

        if($request->password == $request->mine){
            $this->user->name = $request->name;
            $this->user->email = $request->email;
            $this->user->password = Hash::make($request->password);

            $this->user->save(); 
            $this->user->roles()->sync($request->role);
        }
        else{
            echo "A validação falhou";
        }
    }

    public function edit($id){
        $user = $this->user->find($id);
        $roles = $this->role->get();

        return view('dashboard.users.edit_user', compact('user', 'roles'));
    }

    public function update($id, Request $request){
        $user = $this->user->find($id);

        $data['name'] = $request->name;
        $data['email'] = $request->email;

        if($request->password != null){
            if($request->password == $request->mine){
                $data['password'] = Hash::make($data['password']);
            }
            else{
                echo "A validação falhou";
            }
        }
        else 
            unset($data['password']);

        $user->roles()->sync($request->role);

        $update = $user->update($data);

        if ($update) {
            echo "Atualizado com sucesso";
        }
        else{
            echo "Erro ao atualizar";
        }
    }

    public function destroy($id){
        if ($id != null) {
            $user = $this->user->find($id);

            $detach = $user->roles()->detach();
            $delete = $user->delete();

            if($delete && $detach){
                echo 'Deletado com sucesso';
            }        
            else{
                echo "Faiô";
            }
        } 
    }
}
