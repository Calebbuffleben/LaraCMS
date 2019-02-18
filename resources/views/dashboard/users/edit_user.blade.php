@extends('dashboard.templates.template')

@section('content')
<div class="container">
	<h1 class="title">
		Editar Usuário	
	</h1>
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

	<form class="form" method="POST" action="{{url('user/update', $user->id)}}">
		@csrf
		<div class="form-group">
			<input type="text" name="name" placeholder="Insira o Nome" class="form-control" value="{{$user->name}}" autofocus>
		</div>
		<div class="form-group">
			<input type="text" name="email" placeholder="Insira o email" class="form-control" value="{{$user->email}}">
		</div>
		<div class="form-group">
			<select class="form-control" type="" name="role">
				@foreach($roles as $role)
					<option value="{{$role->id}}">{{$role->name}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<input type="password" name="password" placeholder="Insira a senha" class="form-control">
		</div>
		<div class="form-group">
			<input type="password" name="mine" placeholder="Confirme a senha" class="form-control">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-success">Registrar</button>
		</div>
	</form>
</div>
@endsection