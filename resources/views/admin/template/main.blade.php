<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')| Administrador</title>
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css')}}">
	<link rel="stylesheet" href="{{ asset('plugins/trumbowyg/ui/trumbowyg.css')}}">
	@yield('link')
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-md-12">			
			<header>
				@yield('header')
			</header>
			<nav>
				@include('admin.template.parts.nav')
			</nav>
			<article>
			
			@if (count($errors)>0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			@endif

				<div class="panel panel-primary">
				  <div class="panel-heading">@yield('cabeceraArticle')</div>
				  @include('flash::message')

				  <div class="panel-body">@yield('cuerpoArticle')</div>
				</div>
				
			</article>
			<footer>
				<div class="container">
					<div class="row">
						<div class="panel-footer nav navbar-nav navbar-right">Realizado por Jesus Laucho</div>
					</div>
				</div>
				
			</footer>

		</div>
		<div class="col-md-1"></div>
	</div>
</div>
	
</body>
	<script type="text/javascript" src="{{ asset('plugins/jQuery/jquery-2.2.3.js') }}"></script>
	<script type="text/javascript" src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
	<script type="text/javascript" src="{{ asset('plugins/trumbowyg/trumbowyg.js') }}"></script>
	@yield('script')
</html>