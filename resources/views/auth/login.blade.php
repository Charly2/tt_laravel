@extends('index.layout')
@section('title','Login')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1">
                <h2 class="text-center">Login</h2>
                <form role="form" method="POST" action="{{ url('/login') }}">
                    {{csrf_field()}}
                    <div class="login-form">
                        <label class="lavllo" for="login-name">Usuario:</label>
                        <div class="form-group  {{ $errors->has('email') ? ' has-error' : '' }}">
                            <input autocomplete="off" type="text" class="form-control login-field" value="{{old('email')}}" name="email" placeholder="Ingresa tu usuario" id="login-name" >
                            <label class="login-field-icon fui-user" for="login-name"></label>
                        </div>
                        <label class="lavllo" for="login-pass">Password:</label>
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <input autocomplete="off" type="password" class="form-control login-field" value="{{old('password')}}" name="password" placeholder="Ingresa tu Password" id="login-pass">
                            <label class="login-field-icon fui-lock" for="login-pass"></label>
                        </div>


                        @if ($errors->has('email'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>
                                Error!<br>
                            </strong>
                            {{ $errors->first('email') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true" >&times;</span>
                            </button>
                        </div>
                        @endif

                        <button class="btn btn-primary btn-lg btn-block" >Ingresar</button>
                        <a class="login-link" href="#">Olvidaste tu contraseña?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function (e) {
            $('.form-control').keypress(function (e) {
                $('.form-group').each(function (e) {
                $(this).removeClass('has-error');
                });
            });
        });
    </script>

{{--
    <div class="animate form login_form">
        <section class="login_content">
            <form role="form" method="POST" action="{{ url('/login') }}">
                {{csrf_field()}}
                <h1>Login</h1>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" class="form-control" name="email" placeholder="email" required="" />
                    @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" class="form-control" name="password" placeholder="Password" required="" />
                    @if ($errors->has('password'))
                        <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
                <div>
                    <button class="btn btn-default submit" type="submit">Log in</button>
                    <a class="reset_pass" href="{{ url('/password/reset') }}">Lost your password?</a>
                </div>

                <div class="clearfix"></div>

                <div class="separator">
                    <p class="change_link">New to site?
                        <a href="{{url('register')}}" class="to_register"> Create Account </a>
                    </p>

                    <div class="clearfix"></div>
                    <br />

                    <div>
                        <h1><i class="fa fa-plus-circle"></i> {{config('app.name')}}</h1>
                        <p>©{{date('Y')}} </p>
                    </div>
                </div>
            </form>
        </section>
    </div>--}}
@endsection
