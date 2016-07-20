@extends('admin.template.main')

@section('title', 'Registros de Articulos')

@section('cabeceraArticle')
	<h4>Seccion de creacion de Articulos</h4>
@stop
	
@section('cuerpoArticle')
	{!! Form::open(['route'=>'admin.article.store', 'method'=>'POST', 'files'=>true]) !!}

		<div class="form-group">
			{!! Form::label('title', 'Titulo', []) !!}
				{!! Form::text('title', null, ['placeholder'=>'Introduzca el titulo del articulo...', 'class'=>'form-control', 'required'=>'requires']) !!}

			{!! Form::label('category_id', 'Categorias', []) !!}
				{!! Form::select('category_id', $cat, null, ['class'=>'form-control select_simple']) !!}

			{!! Form::label('content', 'Contenido', []) !!}
				{!! Form::textarea('content', null, ['placeholder'=>'Introduzca el contenido del articulo...', 'class'=>'form-control areaStyle', 'required'=>'required', 'rows'=>'5', 'style'=>'resize:none']) !!}

		<div class="form-group">
			{!! Form::label('tags', 'Tag', []) !!}
				{!! Form::select('tags[]', $tag, null, ['class'=>'form-control select-tag', 'multiple']) !!}
		</div>

			{!! Form::label('imagen', 'Imagen', []) !!}
				{!! Form::file('imagen', []) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}
@stop

@section('script')
	<script>		
		$('.select-tag').chosen({
			placeholder_text_multiple:'Seleccione sus Opciones...',
			max_selected_options:2,
			no_results_text:'No hay resultados...'
		});
		$('.select_simple').chosen({
			disable_search:false
		});
		$('.areaStyle').trumbowyg({});
	</script>

@stop
	