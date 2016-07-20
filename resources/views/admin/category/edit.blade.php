@extends('admin.template.main');

@section('title')
	Categorias Editar
@stop
@section('header')
	
@stop
@section('cabeceraArticle')
	<h4>Edicion de categoria</h4>
@stop
@section('cuerpoArticle')
	
	{!! Form::open(['route'=>['admin.category.update', $cat], 'method'=>'PUT']) !!}
		<div class="form-group">
			{!! Form::label('name', 'Nombre:', []) !!}
			{!! Form::text('name', $cat->name, ['placeholder'=>'INGRESE EL NOMBRE', 'class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Actualizar', ['class'=>'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
@stop