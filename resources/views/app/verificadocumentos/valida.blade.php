@extends('layouts.app')
@section('title','Verificar Documentos')
@section('content')



    <div class="row position-relative" style="position: relative" >
        <div class="col-md-7">

            <div class="x_panel">
                <div class="x_title">
                    <h2>Documentos probatorio</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Documento A</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Documento B</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Documento C</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contactw" role="tab" aria-controls="nav-contact" aria-selected="false">Documento D</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contactw3" role="tab" aria-controls="nav-contact" aria-selected="false">Documento E</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade in active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <br>
                            @if($docs->getExt('documentoA') == "jpeg" || $docs->getExt('documentoA') == "jpg" || $docs->getExt('documentoA') == "png")
                                <img class="img-responsive" src="{{url('/files/documentosTrabajador/'.$valida->id.'/'.$docs->documentoA)}}" alt="">
                            @else

                                <iframe src="{{url('/files/documentosTrabajador/'.$valida->id.'/'.$docs->documentoA)}}" width="100%" height="600"></iframe>
                            @endif
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <br>
                            @if($docs->getExt('documentoB') == "jpeg" || $docs->getExt('documentoB') == "jpg" || $docs->getExt('documentoB') == "png")
                                <img class="img-responsive" src="{{url('/files/documentosTrabajador/'.$valida->id.'/'.$docs->documentoB)}}" alt="">
                            @else

                                <iframe src="{{url('/files/documentosTrabajador/'.$valida->id.'/'.$docs->documentoB)}}" width="100%" height="600"></iframe>
                            @endif
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <br>
                            @if($docs->getExt('documentoC') == "jpeg" || $docs->getExt('documentoC') == "jpg" || $docs->getExt('documentoC') == "png")
                                <img class="img-responsive" src="{{url('/files/documentosTrabajador/'.$valida->id.'/'.$docs->documentoC)}}" alt="">
                            @else

                                <iframe src="{{url('/files/documentosTrabajador/'.$valida->id.'/'.$docs->documentoC)}}" width="100%" height="600"></iframe>
                            @endif
                        </div>
                        <div class="tab-pane fade" id="nav-contactw" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <br>
                            @if($docs->getExt('documentoD') == "jpeg" || $docs->getExt('documentoD') == "jpg" || $docs->getExt('documentoD') == "png")
                                <img class="img-responsive" src="{{url('/files/documentosTrabajador/'.$valida->id.'/'.$docs->documentoD)}}" alt="">
                            @else

                                <iframe src="{{url('/files/documentosTrabajador/'.$valida->id.'/'.$docs->documentoD)}}" width="100%" height="600"></iframe>
                            @endif
                        </div>
                        <div class="tab-pane fade" id="nav-contactw3" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <br>
                            @if($docs->getExt('documentoE') == "jpeg" || $docs->getExt('documentoE') == "jpg" || $docs->getExt('documentoE') == "png")
                                <img class="img-responsive" src="{{url('/files/documentosTrabajador/'.$valida->id.'/'.$docs->documentoE)}}" alt="">
                            @else

                                <iframe src="{{url('/files/documentosTrabajador/'.$valida->id.'/'.$docs->documentoB)}}" width="100%" height="600"></iframe>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 dixed_ri" style="">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Acciones</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="form-group row">
                        <label class="control-label col-md-5 col-sm-6 col-xs-12">Nombre completo</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{$persona->nombrecompleto()}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-5 col-sm-6 col-xs-12">Curp </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{$persona->curp}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-5 col-sm-6 col-xs-12">Número de empleado </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{$valida->numtrabajador}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-5 col-sm-6 col-xs-12">Fecha de nacimiento </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{$persona->fechanac}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-5 col-sm-6 col-xs-12">Lugar de nacimiento </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{$persona->lugarnac}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-5 col-sm-6 col-xs-12">Genero </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{$persona->genero}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-5 col-sm-6 col-xs-12">Centro de Trabajo </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{$valida->centrodetrabajo}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-5 col-sm-6 col-xs-12">Puesto </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{$valida->puesto}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-5 col-sm-6 col-xs-12">Sueldo Mensual </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            $ {{$valida->sueldomensual}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-5 col-sm-6 col-xs-12">Teléfono Oficina </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{$valida->telefonooficina}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-5 col-sm-6 col-xs-12">Dirección </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{$dir->direccionForm()}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-9 col-xs-12">Comentarios </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea name="" id="comen" cols="30" rows="4" style="width: 100%;resize: none;"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <span>Se registro el {{$valida->created_at}}</span>
                        </div>
                    </div>
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






    </div>


    <style>
        #nav-tab{
            display: flex;
        }
        #nav-tab a{
            color: #73879C;
            display: block;
            width: 130px;
            line-height: 2.5;
            background:white;
            font-size: 16px;
            text-align: center;
            border: 1px solid #E4E4E7;
        }
        #nav-tab a.active{
            color: #FFFFFF;
            display: block;
            width: 130px;
            line-height: 2.5;
            font-size: 16px;
            background: #672442;
            text-align: center;
            border: 1px solid #E4E4E7;
        }
    </style>


        <script>
            $(document).ready(function (e) {

                $('#nav-tab .nav-item').click(function (e) {
                    console.log($(this))
                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');
                });

               $('#valida_btn').click(function (e) {
                   e.preventDefault();
                   $.post("{{url('validadocumentos/valida/'.$valida->id)}}",{'_token':'{{csrf_token()}}' }).done(function (data) {
                       json = JSON.parse(data);
                       if(json.estado == 1){
                            alert_ok('Se valido de manera correcta!');

                           setTimeout(function () {
                               window.location.href = "/validadocumentos";
                           },3000)

                       }else{
                           alert_error('Ocurrio un error intentelo mas tarde!');
                       }
                   });
               });

               $('#rechaza_btn').click(function (e) {
                   e.preventDefault();
                   $.post("{{url('validadocumentos/rechaza/'.$valida->id)}}",{'_token':'{{csrf_token()}}','come':  $('#comen').val() }).done(function (data) {
                       json = JSON.parse(data);
                       if(json.estado == 1){
                            alert_ok('Se rechazo de manera correcta!');

                           setTimeout(function () {
                               window.location.href = "/validadocumentos";
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