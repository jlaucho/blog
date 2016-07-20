@extends('admin.template.main')

@section('title', 'Edicion de Articulos')

@section('cabeceraArticle')
	<h4>Seccion de edicion de Articulo {{$art->title}}</h4>
@stop
	
@section('cuerpoArticle')
	{!! Form::open(['route'=>['admin.article.update', $art], 'method'=>'PUT']) !!}

		<div class="form-group">
			{!! Form::label('title', 'Titulo', []) !!}
				{!! Form::text('title',$art->title, ['placeholder'=>'Introduzca el titulo del articulo...', 'class'=>'form-control', 'required'=>'requires']) !!}

			{!! Form::label('category_id', 'Categorias', []) !!}
				{!! Form::select('category_id', $cat, $art->category_id, ['class'=>'form-control select_simple']) !!}

			{!! Form::label('content', 'Contenido', []) !!}
				{!! Form::textarea('content', $art->content, ['placeholder'=>'Introduzca el contenido del articulo...', 'class'=>'form-control areaStyle', 'required'=>'required', 'rows'=>'5', 'style'=>'resize:none']) !!}

		</div>
		<div class="form-group">
			{!! Form::label('tags', 'Tag', []) !!}
				{!! Form::select('tags[]', $tag, $myTags, ['class'=>'form-control select-tag', 'multiple']) !!}
		</div>

			
		<div class="form-group">
			{!! Form::submit('Modificar', ['class'=>'btn btn-primary']) !!}
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
	