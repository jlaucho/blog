@extends('admin.template.main');

@section('title')
	Categoria Actualizar
@stop

@section('header')
	
@stop

@section('cabeceraArticle')
	<h4>Seccion de actializacion de categorias</h4>
@stop

@section('cuerpoArticle')
	
	{!! Form::open(['route'=>['admin.category.update', $cat], 'method'=>'PUT']) !!}

		<div class="form-group">
			{!! Form::label('title', 'Titulo', []) !!}
			{!! Form::text('title', $cat->name, ['class'=>'form-control', 'placeholder'=>'Ingrese el titulo', 'required'=>'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Actualizar', ['class'=>'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}

@stop