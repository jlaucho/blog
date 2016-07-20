@extends('admin.template.main')

@section('title')
	listado de articulos
@stop

@section('cabeceraArticle')
	<h4>Listado de articulos registrados</h4>
@stop

@section('cuerpoArticle')

<a href="{{ route('admin.article.create')}}" class="btn btn-warning">Nuevo Articulo</a>
<!-- INICIO DEL SCOPE -->
		<div class="pull-right col-md-4">
			{!! Form::open(['route'=>'admin.article.index', 'method'=>'GET']) !!}
				<div class="input-group">
					{!! Form::text('article', null, ['placeholder'=>"Ingrese su busqueda", 'class'=>'form-control', 'aria-describedby'=>'buscar']) !!}
				    <span class="input-group-addon glyphicon glyphicon-search" id="buscar"></span>
				</div>
			{!! Form::close() !!}
		</div>
<!-- FIN DEL SCOPE -->
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>TITULO</th>
				<th>USUARIO</th>
				<th>CATEGORIA</th>
				<th>ACCION</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($art as $article)
				<tr>
					<td>{{ $article->id}}</td>
					<td>{{ $article->title}}</td>
					<td>{{ $article->user->name}}</td>
					<td>{{ $article->category->name}}</td>
					<td>
						<a href="{{ route('admin.article.destroy', $article->id) }}" onclick="return confirm('Seguro de eliminarlo ?')" class="btn btn-danger">X</a>
						 <a href="{{ route('admin.article.edit', $article->id) }}" class="btn btn-success">O</a></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop

	