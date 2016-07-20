@extends('admin.template.main');

@section('title')
	Categorias Crear
@stop
@section('header')
	
@stop
@section('cabeceraArticle')
	<h4>Crear categoria</h4>
@stop
@section('cuerpoArticle')
	
	{!! Form::open(['route'=>'admin.category.store', 'method'=>'POST']) !!}
		<div class="form-group">
			{!! Form::label('name', 'Nombre:', []) !!}
			{!! Form::text('name', null, ['placeholder'=>'INGRESE EL NOMBRE', 'class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
			{!! Form::reset('Limpiar', ['class'=>'btn btn-warning pull-right']) !!}
		</div>

	{!! Form::close() !!}

@stop
@section('content')

@stop
@section('content')

@stop