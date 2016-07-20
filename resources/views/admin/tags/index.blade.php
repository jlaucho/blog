@extends('admin.template.main')

@section('title')
	Listado Tags
@stop
@section('cabeceraArticle')
	Listado de Tags registrados
@stop
@section('cuerpoArticle')
	<a href="{{ route('admin.tags.create')}}" class="btn btn-warning">Nuevo Tags</a>
	
	<div class="pull-right col-md-4">
			{!! Form::open(['route'=>'admin.tags.index', 'method'=>'GET']) !!}
			<div class="input-group">
				{!! Form::text('name', null, ['placeholder'=>"Ingrese su busqueda", 'class'=>'form-control', 'aria-describedby'=>'buscar']) !!}
			    <span class="input-group-addon glyphicon glyphicon-search" id="buscar"></span>
			</div>
		{!! Form::close() !!}
	</div>
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>NOMBRE</th>
				<th>ACCION</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($tag as $tags)

				<tr>
					<td>{{$tags->id}}</td>
					<td>{{$tags->name}}</td>
					<td>
						<a href="{{ route('admin.tags.destroy', $tags->id) }}" onclick="return confirm('Seguro de eliminarlo ?')" class="btn btn-danger">X</a>
						 <a href="{{ route('admin.tags.edit', $tags->id) }}" class="btn btn-success">O</a></a>
					</td>
				</tr>
				
			@endforeach
			
		</tbody>
	</table>
	<div class="text-center">
		{!!$tag->render();!!}
	</div>
@stop
