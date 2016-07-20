@extends('admin.template.main')

@section('title')
	Editar Tag
@stop

@section('cabeceraArticle')
	<h4>Seccion de Edicion de Tags</h4>
@stop

@section('cuerpoArticle')
	{!! Form::open(['route'=>['admin.tags.update', $tag], 'method'=>'PUT']) !!}

		<div class="form-group">
			{!! Form::label('name', 'Nombre', []) !!}
			{!! Form::text('name', $tag->name, ['class'=>'form-control', 'placeholder'=>'Ingrese el Nombre del Tags']) !!}			
		</div>
		<div class="form-group">
			{!! Form::submit('Modificar', ['class'=>'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}
@stop