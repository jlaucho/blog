@extends('admin.template.main')


               @section('cuerpoArticle')
               <div class="panel panel-info">
                   <div class="panel-heading">
                       <h3 class="panel-title">Area de envio de Correo de Prueba</h3>
                   </div>
                   <div class="panel-body">
                       {!! Form::open(['route'=>'admin.user.eviarmail', 'method'=>'POST']) !!}

                        {!! Form::label('correo', 'Initroduzca el email destino', []) !!}
                            {!! Form::email('correo', null, ['class'=>'form-control']) !!}
                        {!! Form::label('texto', 'Indroduzca su mensaje', []) !!}
                            {!! Form::textarea('texto', null, ['class'=>'form-control']) !!}
                        {!! Form::submit('Enviar correo', ['class'=>'btn btn-primary']) !!}

                       {!! Form::close() !!}
                   </div>
               </div>
               <hr>
               <h1>este</h1>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
                @endsection

@section('cabeceraArticle')
    <h4>Seccion de Logueo </h4>
@stop
