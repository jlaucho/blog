@extends('admin.template.main')

@section('title')
	Creacion
@stop

@section('header')
	&nbsp;
@stop

@section('cabeceraArticle')
	<h4>Seccion de Creacion de Usuario</h4>
@stop
@section('cuerpoArticle')


	{!! Form::open(['route'=> 'admin.user.store', 'method'=>'POST']) !!}

		<div class="form-group">
			{!! Form::label('name', 'Nombre', []) !!}
			{!! Form::text('name', '', ['class'=>'form-control','placeholder'=>'Ingrese su Nombre', 'required'=>'required']) !!}

			{!! Form::label('email', 'Correo Electronico', []) !!}
			{!! Form::email('email', '', ['class'=>'form-control', 'placeholder'=>'ejemplo@ejemplo.com', 'required'=>'required']) !!}

			{!! Form::label('password', 'Ingrese la Clave', []) !!}
			{!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'************', 'required'=>'required']) !!}

			{!! Form::label('type', 'Tipo', []) !!}
			{!! Form::select('type', [''=>'Seleccione', 'admin'=>'Administrador', 'member'=>'Miembro'], '', ['class'=>'form-control', 'required'=>'required']) !!}

		</div>
		<div class="form-group">
			{!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}
@stop
@section('footer')
	Realizado Por Ing. Jesus Laucho
@stop