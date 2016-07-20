@extends('admin.template.main')

@section('title', 'Listado')

@section('header')
	&nbsp;
@stop

@section('cabeceraArticle')
    <h4>Listados de Usuarios registrados en el sistema</h4>
@stop

@section('cuerpoArticle')
    <div class="continer">
    	<a href="{{ route('admin.user.create') }}" class="btn btn-info">AGREGAR USUARIO</a>
    	
        <hr>
        
    	<table class="table table-hover table-striped">
    		<thead>
	    		<tr>
	    			<th>ID</th>
	    			<th>NOMBRE</th>
	    			<th>EMAIL</th>
	    			<th>TIPO</th>
	    			<th>ACCION</th>
	    		</tr>
    		</thead>
    		<tbody>
    			@foreach ($user as $registro)
    				<tr>
    					<td>{{ $registro->id }}</td>
    					<td>{{ $registro->name }}</td>
    					<td>{{ $registro->email }}</td>
    					@if ($registro->type=='admin')
    						<td> <span class="label label-primary">{{ $registro->type }}</span></td>
    						@else
    						<td><span class="label label-success">{{ $registro->type }}</span></td>
    					@endif
    					
    					<td><a href="{{ route('admin.user.destroy', $registro->id) }}" onclick="return confirm('Seguro de eliminarlo ?')" class="btn btn-danger">X</a> <a href="{{ route('admin.user.edit', $registro->id) }}" class="btn btn-success">O</a></a></td>
    				</tr>
    			@endforeach
    		</tbody>
    	</table>
    	<div class="pull-right">{!! $user->render() !!}</div>
    </div>
@stop

