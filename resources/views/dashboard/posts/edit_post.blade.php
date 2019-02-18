@extends('dashboard.templates.template')

@section('content')

<h1>Editar posts</h1>

@if ($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
	</ul>
</div>
@endif

@if (session('success'))
<div class="alert alert-success">
	{{ session('success')}}
</div>
@endif;
<div class="container">
	<form class="form" action="{{url('posts/update', $post->id)}}" method="post">
		@csrf

		<input type="hidden" name="_method" value="PUT">

		<div class="form-group">
			<input class="form-control" type="text" name="title" placeholder="Título" value="{{$post->title}}">
		</div>
		<div class="form-group">
			<textarea class="form-control" name="body" cols="30" rows="5" placeholder="Conteúdo" value="{{$post->body}}"></textarea>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-success">Enviar</button>
		</div>
	</form>
</div>


@endsection