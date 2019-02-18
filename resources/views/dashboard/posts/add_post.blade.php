@extends('dashboard.templates.template')

@section('content')


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
@endif
<div class="container">
	<h1>Cadastrar posts</h1>
	<form class="form" action="{{url('post/store')}}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<input class="form-control" type="text" name="title" placeholder="Título">
		</div>
		<div class="form-group">
			<input class="form-control" type="file" name="image">
		</div>
		<div class="form-group">
			<textarea class="form-control" name="body" cols="30" rows="5" placeholder="Conteúdo"></textarea>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-success">Cadastrar Post</button>
		</div>
	</form>
</div>

@endsection