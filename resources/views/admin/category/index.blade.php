@extends('admin.template.main');

@section('title')
	Categorias Lista
@stop
@section('header')
	
@stop
@section('cabeceraArticle')
	<h4>Listado de categorias</h4>
@stop
@section('cuerpoArticle')
	<div class="continer">
    	<a href="{{ route('admin.category.create') }}" class="btn btn-info">AGREGAR CATEGORIA</a>
    	
        <hr>
    	<table class="table table-hover table-striped">
    		<thead>
	    		<tr>
	    			<th>ID</th>
	    			<th>NOMBRE</th>
	    		</tr>
    		</thead>
    		<tbody>
    			@foreach ($cat as $registro)
    				<tr>
    					<td>{{ $registro->id }}</td>
    					<td>{{ $registro->name }}</td>
    					<td><a href="{{ route('admin.category.destroy', $registro->id) }}" onclick="return confirm('Seguro de eliminarlo ?')" class="btn btn-danger">X</a> <a href="{{ route('admin.category.edit', $registro->id) }}" class="btn btn-success">O</a></a></td>
    				</tr>
    			@endforeach
    		</tbody>
    	</table>
    	{!! $cat->render() !!}
    </div>
@stop
@section('content')

@stop
@section('content')

@stop