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
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            {{$valida->gettxtestado()}}
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
                    @if($valida->ext == "jpeg" || $valida->ext == "jpg" || $valida->ext == "png")
                        <img class="img-responsive" src="{{url('/files/verificapreregistro/'.$valida->id)}}" alt="">
                    @else

                        <iframe src="{{url('/files/verificapreregistro/'.$valida->id)}}" width="100%" height="600"></iframe>
                    @endif
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
                            <button type="submit" id="valida_btn" class="btn btn-success btn-block">Validar</button>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" id="rechaza_btn" class="btn btn-danger btn-block">Rechazar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif





    </div>


        <script>
            $(document).ready(function (e) {

               $('#valida_btn').click(function (e) {
                   e.preventDefault();
                   $.post("{{url('verificapreregistro/valida/'.$valida->id)}}",{'_token':'{{csrf_token()}}' }).done(function (data) {
                       json = JSON.parse(data);
                       if(json.estado == 1){
                            alert_ok('Se valido de manera correcta!');

                           setTimeout(function () {
                               window.location.href = "/verificapreregistro";
                           },3000)

                       }else{
                           alert_error('Ocurrio un error intentelo mas tarde!');
                       }
                   });
               });

               $('#rechaza_btn').click(function (e) {
                   e.preventDefault();
                   $.post("{{url('verificapreregistro/rechaza/'.$valida->id)}}",{'_token':'{{csrf_token()}}' }).done(function (data) {
                       json = JSON.parse(data);
                       if(json.estado == 1){
                            alert_ok('Se rechazo de manera correcta!');

                           setTimeout(function () {
                               window.location.href = "/verificapreregistro";
                           },3000)

                       }else{
                           alert_error('Ocurrio un error intentelo mas tarde!');
                       }
                   });
               });



            });


            function alert_ok(msg) {

                new PNotify({
                    title: 'Excelente',
                    text: msg,
                    type: 'success',
                    hide: false,
                    styling: 'bootstrap3'
                });
            }
            function alert_error(msg) {
                new PNotify({
                    title: 'Ups!',
                    text: msg,
                    type: 'error',
                    hide: false,
                    styling: 'bootstrap3'
                });
            }








        </script>



@endsection