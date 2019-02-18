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
	<h1>Cadastrar Funções</h1>
	<form class="form" action="{{url('role/store')}}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<input class="form-control" type="text" name="name" placeholder="Nome da função">
		<!--	<input class="form-control" type="hidden" name="id" value=""> -->
		</div>
		<div class="form-group">
			<select class="form-control" type="" name="permission">
				@foreach($permissions as $permission)
					<option value="{{$permission->id}}">{{$permission->name}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<input class="form-control" type="text" name="label" placeholder="Descrição da função">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-success">Cadastrar Função</button>
		</div>
	</form>
</div>

@endsection