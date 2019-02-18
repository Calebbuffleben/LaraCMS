<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Role;
use App\Permission;

class PainelController extends Controller
{
	protected $user;
	protected $post;
	protected $role;
	protected $permission; 

	public function __construct(User $user, Post $post, Role $role, Permission $permission){
		$this->user = $user;
		$this->post = $post;
		$this->role = $role;
		$this->permission = $permission;

		$this->middleware('auth');
	}

    public function index(){
    	$users = $this->user->count();
    	$posts = $this->post->count();
    	$roles = $this->role->count();
    	$permissions = $this->permission->count();

    	return view('dashboard.home.index', compact('users', 'posts', 'roles', 'permissions'));
    }
}
