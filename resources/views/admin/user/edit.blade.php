@extends('admin.template.main')

@section('title')
	Edicion {{ $user->name }}
@stop

@section('header')
	&nbsp;
@stop

@section('cabeceraArticle')
	<h4>Seccion de edicion de Usuario {{ $user->name}}</h4>
@stop
@section('cuerpoArticle')
	{!! Form::open(['route'=> ['admin.user.update', $user], 'method'=>'PUT']) !!}

		<div class="form-group">
			{!! Form::label('name', 'Nombre', []) !!}
			{!! Form::text('name', $user->name, ['class'=>'form-control', 'required'=>'required']) !!}

			{!! Form::label('email', 'Correo Electronico', []) !!}
			{!! Form::email('email', $user->email, ['class'=>'form-control', 'placeholder'=>'ejemplo@ejemplo.com', 'required'=>'required']) !!}

		
			{!! Form::label('type', 'Tipo', []) !!}
			{!! Form::select('type', [''=>'Seleccione', 'admin'=>'Administrador', 'member'=>'Miembro'], $user->type, ['class'=>'form-control', 'required'=>'required']) !!}

		</div>
		<div class="form-group">
			{!! Form::submit('Actualizar', ['class'=>'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}
@stop
@section('footer')
	Realizado Por Ing. Jesus Laucho
@stop