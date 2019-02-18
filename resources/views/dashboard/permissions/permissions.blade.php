@extends('dashboard.templates.template')

@section('content')
	<div class="container">
		<h1 class="title">
			Listagem de permissões
		</h1>

		<table class="table table-hover">
		<tr>
			<th>Nome</th>
			<th>Label</th>
			<th width="100px">Ações</th>
		</tr>
			@forelse($permissions as $permission)
				@can('view_posts', $permission)
					<tr>
						<td>{{$permission->name}}</td>
						<td>{{$permission->label}}</td>
						<td>
							<a href="{{url('/permission/roles', $permission->id)}}" class="edit" style="background: #579491;">
								<i class="fa fa-unlock"></i>
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