<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Post;

class PainelController extends Controller
{
	protected $user;
	protected $post;
	protected $role;
	protected $permission; 

	public function __construct(Post $post){
		$this->post = $post;
		$this->user = app('user');
		$this->role = app('role');
		$this->permission = app('permission');;

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
