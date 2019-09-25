@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa fa-arrow-right "></i> Proceso de inscricpción <small></small></h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <div class="wizard">

                    <div class="wizard-inner">
                        <div class="connecting-line"></div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="disabled">
                                <a  >
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-user "></i>
                                    </span>
                                    <p>Alumno</p>
                                </a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a  >
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-user "></i>
                                    </span>
                                    <p>Conyuge</p>
                                </a>
                            </li>
                            <li role="presentation" class="disabled" >
                                <a >
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-home"></i>
                                    </span>
                                    <p>Dirección de Conyuge</p>
                                </a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a  >
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-user "></i>
                                    </span>
                                    <p>Persona autorizada</p>
                                </a>
                            </li>
                            <li role="presentation" class="disabled" >
                                <a >
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-home"></i>
                                    </span>
                                    <p>Dirección de Persona autorizada</p>
                                </a>
                            </li>
                            <li role="presentation" class="  disabled" >
                                <a >
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-file"></i>
                                    </span>
                                    <p>Documentos</p>
                                </a>
                            </li>
                            <li role="presentation" class="  active" >
                                <a >
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-education"></i>
                                    </span>
                                    <p>Cendi</p>
                                </a>
                            </li>

                        </ul>
                    </div>

                    <div role="form">
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="step1">
                               {{--Inicia el form--}}




                                <form role="form" action="{{url('/procesoinscripcion/cendi')}}" style="padding: 15px 0 " method="post">
                                    {{ csrf_field() }}
                                    <h4 >Centro de Desarrolo Infantil</h4>


                                    <div class="row dieflex">
                                        @foreach($data as $d)
                                        <div class="col-md-3 col-sm-3 col-xs-12 profile_details">
                                            <div class="well profile_view cendiitem" data-id="{{$d->id}}">
                                                <i class="paloma fa fa-check-circle "></i>
                                                <div class="col-sm-12">
                                                    <div class="left col-xs-12" style="margin-top: 0">
                                                        <h4>"{{$d->nombre}}"</h4>
                                                        <p><strong>Ubicación: </strong>  Oroya No. 760, Col. Lindavista, Alcaldía Gustavo A. Madero, C.P. 07300.</p>
                                                        <ul class="list-unstyled">
                                                            <li><i class="fa fa-user "></i> {{$d->directora}} </li>
                                                            <li><i class="fa fa-phone "></i> {{$d->telefono}} </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                    <input id="cendi_input" type="hidden" name="cendi">

                                    @if($errors->has('cendi'))
                                        <div class="alert alert-danger alert-dismissible fade show in" role="alert">
                                            <strong>Error!</strong> {{$errors->first('cendi')}}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif


                                    <div class="row">
                                        <div class="col-md-4 pull-right mt-5"  >
                                            <button role="sumbit" class="btn btn-block btn-primary">Guardar</button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </div>


    <style>
        #map ,#map_canvas{
            height: 400px;
            width: 100%;
            background: #f5f5f591;
        }
        .dieflex{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }
        .cendiitem{
            position: relative;
            border: 2px solid #e3e3e3;
        }
        .cendiitem:hover,.cendiitem.hover{
            border: 2px solid #6b2848;
            cursor: pointer;
        }
        .cendiitem .paloma{
            opacity: 0;
            position: absolute;
            right: 10px;
            top: 10px;
            color: #6b2848;
            font-size: 25px;
        }
        .cendiitem:hover .paloma,.cendiitem.hover .paloma{
            opacity: 1;
        }
    </style>



    <script>
        $(document).ready(function () {
            $('.cendiitem').click(function (e) {
                if ($(this).hasClass('hover')){
                    $(this).removeClass('hover');
                    $('#cendi_input').val("");
                }else{
                    $('.cendiitem').each(function (e,i) {
                        $(this).removeClass('hover');
                    });
                    $(this).addClass('hover');
                    $('#cendi_input').val($(this).data('id'));
                }


            });
        });





    </script>



    {{--<script type="text/javascript" src="//maps.google.com/maps/api/js?key=AIzaSyDaKaRdamRqFDTwe0sCgo0taIlxAfxjPis"></script>
    <script src="{{asset('js/gmaps.js')}}"></script>

    <script>
        var map;
        $(document).ready(function () {

            map = new GMaps({
                div: '#map',
                lat: 19.5046539,
                lng: -99.1468518
            });

            GMaps.geolocate({
                success: function(position) {
                    map.setCenter(position.coords.latitude, position.coords.longitude);
                },
                error: function(error) {
                    //alert('Geolocation failed: '+error.message);
                },
                not_supported: function() {
                    //alert("Your browser does not support geolocation");
                },
                always: function() {
                   // alert("Done!");
                }
            });
        });
    </script>--}}


@endsection