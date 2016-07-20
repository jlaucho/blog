@extends('admin.template.main');

@section('title')
	Categoria
@stop

@section('header')
	
@stop

@section('cabeceraArticle')
	<h4>Seccion de listados de categoria</h4>
@stop

@section('cuerpoArticle')
	
	<div class="continer">
    	<a href="{{ route('admin.category.create') }}" class="btn btn-info">AGREGAR CATEGORIA</a>
    	
        <hr>
       	<table class="table table-hover table-striped">
    		<thead>
	    		<tr>
	    			<th>ID</th>
	    			<th>TITULO</th>
	    			<th>BORRAR</th>
                    <th>ACTUALIZAR</th>
	    		</tr>
    		</thead>
    		<tbody>
    			@foreach ($cat as $cate)
    				<tr>
    					<td>{{ $cate->id }}</td>
    					<td>{{ $cate->name }}</td>    					
    					<td>
    						<a class="btn btn-danger" href="{{ route('admin.category.destroy', $cate->id) }}" onclick="return confirm('Le vais a echar bolas ?')"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
    					</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('admin.category.edit', $cate->id) }}"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
    				    </td>
                    </tr>
					
    			@endforeach
    		</tbody>    		
    	</table>    
	<div class="pull-right">{!! $cat->render() !!}</div>

@stop