<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Gate;

class PostController extends Controller
{
	protected $post;
   
    public function __construct(Post $post){
    	$this->post = $post;
        $this->middleware('auth');
    }

    public function index(){
    	$posts = $this->post->get();

        if(Gate::denies('view_posts'))
            return redirect()->back();
            //abort(403, 'Esse usuário não tem autorização para visualizar os posts');

    	return view('dashboard.posts.posts')->with('posts', $posts);
    }

    public function add(){
    	return view('dashboard.posts.add_post');
    }

    public function store(Request $request){
    	$data = $request->except(['_token']);
        //$data = $request->all();
        $data['user_id'] = Auth::user()->id;
    	$insert = $this->post->insert($data);

        if ($insert) {
            return 'Inserido com sucesso';
        } else {
            return 'Falha ao inserir';
        }
    }

    public function edit($id){
        $post = $this->post->find($id);

        //$this->authorize('update-post', $post);
        //if(Gate::denies('update-post', $post))
        if(Gate::denies('edit_post', $post))
            abort(403, 'Unauthorized');

        return view('dashboard.posts.edit_post', compact('post'));
    }

    public function update(Request $request, $id){
        $data = $request->except(['_token']);;
        //$data = $request->all();
        $post = $this->post->find($id);

        $update = $post->update($data);

        if ($update) {
            return "Editado com sucesso";
        } else {
            return "Falha ao editar";
        }
    }

    public function destroy($id){
        if ($id != null) {
            $post = $this->post->find($id);
            $delete = $post->delete();
            if ($delete) {
                return "Deletado com sucesso";
            } else {
                return "Não foi possível deletar";
            }
        } else {
            return "Id nulo";
        }
    }
}
