@extends('dashboard.templates.template')

@section('content')
	<div class="container">
		<h1 class="title">
			Listagem <b>{{$permissions->name}}</b>
		</h1>

		<table class="table table-hover">
		<tr>
			<th>Nome</th>
			<th>Label</th>
			<th width="100px">Ações</th>
		</tr>
			@forelse($roles as $role)
				@can('view_posts', $role)
					<tr>
						<td>{{$role->name}}</td>
						<td>{{$role->label}}</td>
						<td>
							
							<form action="{{url('/permission/detach', $role->id)}}" method="POST" style= "width: 32px; height: 32px; display: inline-block;" method="post" class="delete">
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
							<p>Nenhuma Função Cadastrada</p>
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