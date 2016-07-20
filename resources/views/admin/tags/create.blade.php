@extends('admin.template.main')

@section('title')
	Agregar Tag
@stop

@section('cabeceraArticle')
	<h4>Seccion Para agregar Tags</h4>
@stop

@section('cuerpoArticle')
	{!! Form::open(['route'=>'admin.tags.store', 'method'=>'POST']) !!}

		<div class="form-group">
			{!! Form::label('name', 'Nombre', []) !!}
			{!! Form::text('name', '', ['class'=>'form-control', 'placeholder'=>'Ingrese el Nombre del Tags']) !!}			
		</div>
		<div class="form-group">
			{!! Form::submit('Registrar', ['class'=>'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}
@stop