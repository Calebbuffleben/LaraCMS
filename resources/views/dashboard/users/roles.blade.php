@extends('dashboard.templates.template')

@section('content')
	<div class="container">
		<h1 class="title">
			Permissões do usuário <b>{{$user->name}}</b>
		</h1>

		<table class="table table-hover">
		<tr>
			<th>Nome</th>
			<th>E-mail</th>
			<th width="100px">Ações</th>
		</tr>
			@forelse($roles as $role)
				@can('view_posts', $role)
					<tr>
						<td>{{$role->name}}</td>
						<td>{{$role->label}}</td>
						<td>
							<a href="{{url('/role/delete', $role->id)}}" class="delete">
								<i class="fa fa-trash"></i>
							</a>
						</td>
					</tr>
					@endcan
				@empty
					<tr>
						<td colspan="90">
							<p>Nenhum Post Cadastrado</p>
						</td>
					</tr>
			@endforelse
		</table>
	<nav>
		  <ul class="pagination">
		    <li>
		      <a href="#" aria-label="Previous">
		        <span aria-hidden="true">&laquo;</span>
		      </a>
		    </li>
		    <li><a href="#">1</a></li>
		    <li><a href="#">2</a></li>
		    <li><a href="#">3</a></li>
		    <li><a href="#">4</a></li>
		    <li><a href="#">5</a></li>
		    <li>
		      <a href="#" aria-label="Next">
		        <span aria-hidden="true">&raquo;</span>
		      </a>
		    </li>
		  </ul>
		</nav>
	</div>
@endsection