@extends('dashboard.templates.template')

@section('content')
<div class="container">
	<h1 class="title">
		Adicionar Usuário	
	</h1>

	<form class="form" method="POST" action="{{ url('/user/store') }}">
		@csrf
		<div class="form-group">
			<input type="text" name="name" placeholder="Insira o Nome" class="form-control" required autofocus>
		</div>
		<div class="form-group">
			<input type="text" name="email" placeholder="Insira o email" class="form-control" required>
		</div>
		<div class="form-group">
			<select class="form-control" type="" name="role">
				@foreach($roles as $role)
					<option value="{{$role->id}}">{{$role->name}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<input type="password" name="password" placeholder="Insira a senha" class="form-control" required>
		</div>
		<div class="form-group">
			<input type="password" name="mine" placeholder="Confirme a senha" class="form-control" required>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-success">Registrar</button>
		</div>
	</form>
</div>
@endsection