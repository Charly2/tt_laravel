@extends('layouts.app')
@section('title','Verificar Preregistro')
@section('content')



    <div class="row position-relative" style="position: relative" >
        <div class="col-md-8">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Datos personales del trabajador</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre completo</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            {{$persona->nombrecompleto()}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Curp </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            {{$persona->curp}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Número de empleado </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            {{$valida->num_emp}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de nacimiento </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            {{$persona->fechanac}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Lugar de nacimiento </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            {{$persona->lugarnac}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Genero </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            {{$persona->genero}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Centro de Trabajo </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            {{$valida->ct}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <span>Se registro el {{$valida->created_at}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="x_panel">
                <div class="x_title">
                    <h2>Documento probatorio</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <iframe src="{{url('/files/verificapreregistro/'.$valida->id)}}" width="100%" height="600"></iframe>
                </div>
            </div>
        </div>

        @if($valida->estado==1 )
        <div class="col-md-3 dixed_ri" style="">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Acciones</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{url('verificapreregistro/valida/'.$valida->id)}}" method="post">
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-success btn-block">Validar</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form action="{{url('verificapreregistro/rechaza/'.$valida->id)}}" method="post">
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-danger btn-block">Rechazar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if($notificacion == 1)
            <div class="col-md-4 " style="">
                <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Excelente</strong> <br> Se valido de manera correcta
                </div>
            </div>
        @endif
        @if($notificacion == 2)
            <div class="col-md-4 " style="">
                <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Excelente</strong> <br> Se rechazo de manera correcta
                </div>
            </div>
        @endif



    </div>

    @if($notificacion != 0)
        <script>
            $(document).ready(function (e) {
                setTimeout(function () {
                    window.location.href = "/verificapreregistro";
                },2000)
            });
        </script>
    @endif


@endsection