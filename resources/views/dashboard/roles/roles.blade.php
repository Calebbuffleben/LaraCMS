@extends('dashboard.templates.template')

@section('content')
	<div class="container">
		<h1 class="title">
			Listagem de funções
		</h1>
		<a href="{{url('/role/create')}}" class="edit" style="background: #F0E222;">
			<i class="fa fa-plus-square"></i>
		</a>
		<br/><br/>
		<table class="table table-hover">
		<tr>
			<th>Nome</th>
			<th>Label</th>
			<th width="150px">Ações</th>
		</tr>
			@forelse($roles as $role)
				@can('view_posts', $role)
					<tr>
						<td>{{$role->name}}</td>
						<td>{{$role->label}}</td>
						<td>
							<a href="{{url('/role/permissions', $role->id)}}" class="edit" style="background: #579491;">
								<i class="fa fa-lock"></i>
							</a>
							<a href="{{url('/role/edit', $role->id)}}" class="edit">
								<i class="fa fa-pencil-square-o"></i>
							</a>
							<form action="{{url('/role/delete', $role->id)}}" method="POST" style= "width: 32px; height: 32px; display: inline-block;" method="post" class="delete">
								<input type="hidden" name="_method" value="DELETE">
                				{{ csrf_field() }}
								<button style="background: transparent; border: none;" type="submit" onclick="return confirm('Tem certeza que deseja excluir?')"><i class="fa fa-trash"></i></button>
							</form>
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