@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa fa-bars"></i> Completar Información <small></small></h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <div class="wizard">

                    <div class="wizard-inner">
                        <div class="connecting-line"></div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="disabled">
                                <a >
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-user "></i>
                                    </span>
                                    <p>Información general</p>
                                </a>
                            </li>
                            <li role="presentation" class="active" >
                                <a >
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-home"></i>
                                    </span>
                                    <p>Dirección</p>
                                </a>
                            </li>
                            <li role="presentation" class="disabled" >
                                <a >
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-briefcase"></i>
                                    </span>
                                    <p>Centro de Trabajo</p>
                                </a>
                            </li>
                            <li role="presentation" class=" disabled" >
                                <a >
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-file"></i>
                                    </span>
                                    <p>Documentos</p>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div role="form">
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="step1">
                               {{--Inicia el form--}}




                                <form role="form" action="{{url('/completeinformacion_direccion')}}" style="padding: 15px 0 " method="post">
                                    {{ csrf_field() }}
                                    <h4 >Dirección principal</h4>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" >Calle:</label>
                                                <input id="calle" name="calle" type="text" class="form-control {{$errors->has('calle')?'has-error':''}}"  value="{{old('calle')}}" >
                                                @if($errors->has('calle'))
                                                    <span class="help-block"> {{$errors->first('calle')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" >Número interior:</label>
                                                <input id="num_e" name="num_int" type="text" class="form-control {{$errors->has('num_int')?'has-error':''}}"  value="{{old('num_int')}}" >
                                                @if($errors->has('num_int'))
                                                    <span class="help-block"> {{$errors->first('num_int')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" >Número exterior:</label>
                                                <input id="num_i" name="num_ext" type="text" class="form-control {{$errors->has('num_ext')?'has-error':''}}"  value="{{old('num_ext')}}" >
                                                @if($errors->has('num_ext'))
                                                    <span class="help-block"> {{$errors->first('num_ext')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" >Codigo postal:</label>
                                                <input id="CP" name="cp" type="text" class="form-control {{$errors->has('cp')?'has-error':''}}"  value="{{old('cp')}}" >
                                                @if($errors->has('cp'))
                                                    <span class="help-block"> {{$errors->first('cp')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" >Estado:</label>
                                                <input name="estado" id="EN" type="text" class="form-control {{$errors->has('estado')?'has-error':''}}"  value="{{old('estado')}}" >
                                                @if($errors->has('estado'))
                                                    <span class="help-block"> {{$errors->first('estado')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" >Municipio:</label>
                                                <input name="municipio" id="MU" type="text" class="form-control {{$errors->has('municipio')?'has-error':''}}"  value="{{old('municipio')}}" >
                                                @if($errors->has('municipio'))
                                                    <span class="help-block"> {{$errors->first('municipio')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" >Colonia*:</label>
                                                <select  id="colonias" name="colonia" class="form-control">

                                                </select>
                                            </div>
                                        </div>


                                    </div>


                                    <h4 >Geolocalización</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="map"></div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12"><br>
                                            @if ($errors->any())
                                                <div class="alert alert-danger alert-dismissible fade show in" role="alert">
                                                    <strong>Error!</strong> No se pudo guardar la información ya que algunos campos estan incorrectos.
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">

                                            <div id="map"></div>


                                        </div>
                                    </div>


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
    </style>



    <script>
        $(document).ready(function () {
            $('#CP').change(function (e) {
                console.log(this.value);

                fetch('https://api-codigos-postales.herokuapp.com/codigo_postal/'+this.value)
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(myJson) {
                        console.log(myJson);
                        $('#MU').val(myJson[0].municipio).trigger('change');
                        $('#EN').val(myJson[0].estado).trigger('change');

                        var $_html = "";

                        myJson.forEach(function (e,t) {
                            $_html += "<option value='"+e.colonia+"'>"+e.colonia+"</option>";
                            console.log(e)
                        });

                        $('#colonias').html($_html).trigger('change');
                        console.log($_html);

                        setMaps();




                    });

            });
        });


        $('#colonias').change(function () {
            setMaps();
        });

        function setMaps() {
            GMaps.geocode({
                address:getdir(),
                callback: function(results, status){
                    console.dir(status)
                    console.dir(results)
                    if(status=='OK'){
                        var latlng = results[0].geometry.location;
                        map.setCenter(latlng.lat(), latlng.lng());
                        map.addMarker({
                            lat: latlng.lat(),
                            lng: latlng.lng()
                        });
                    }
                }
            });
        }




        function getdir() {
            return $('#calle').val()+
            $('#num_e').val()+
            //$('#num_i').val()+
            $('#colonias').val()+
            $('#CP').val()+
            $('#MU').val()+
            $('#EN').val();
        }
    </script>



    <script type="text/javascript" src="//maps.google.com/maps/api/js?key=AIzaSyDaKaRdamRqFDTwe0sCgo0taIlxAfxjPis"></script>
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
    </script>


@endsection