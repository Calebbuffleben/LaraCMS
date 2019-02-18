@extends('dashboard.templates.template')

@section('content')
	<div class="container">
		<h1 class="title">
			Listagem de usuários
		</h1>
		<a href="{{url('/user/create')}}" class="edit" style="background: #F0E222;">
			<i class="fa fa-plus-square"></i>
		</a>
		<br/><br/>
		<table class="table table-hover">
		<tr>
			<th>Nome</th>
			<th>E-mail</th>
			<th width="250px">Ações</th>
		</tr>
			@forelse($users as $user)
				@can('view_posts', $user)
					<tr>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td>
							<a href="{{url('/user/roles', $user->id)}}" class="edit" style="background: #579491;">
								<i class="fa fa-unlock"></i>
							</a>
							<a href="{{url('/user/edit', $user->id)}}" class="edit">
								<i class="fa fa-pencil-square-o"></i>
							</a>
							<form action="{{url('/user/delete', $user->id)}}" method="POST" style= "width: 40px; display: inline-block;" method="post" class="delete">
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