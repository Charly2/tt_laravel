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
                                <li role="presentation" class="active">
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
                                <li role="presentation" class="  disabled" >
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

                                    <form role="form" action="{{url('/procesoinscripcion/menor')}}" style="padding: 15px 0 " method="post">
                                        {{ csrf_field() }}
                                        <h4 >Datos generales</h4>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" >Nombre:</label>
                                                    <input type="text" class="form-control {{$errors->has('nombre')?'has-error':''}}" name="nombre" value="{{old('nombre')}}">
                                                    @if($errors->has('nombre'))
                                                        <span class="help-block"> {{$errors->first('nombre')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" >Apellido paterno:</label>
                                                    <input type="text" class="form-control {{$errors->has('appaterno')?'has-error':''}}"  name="appaterno" value="{{old('appaterno')}}">
                                                    @if($errors->has('appaterno'))
                                                        <span class="help-block"> {{$errors->first('appaterno')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" >Apellido paterno:</label>
                                                    <input type="text" class="form-control {{$errors->has('apmaterno')?'has-error':''}}"  name="apmaterno" value="{{old('apmaterno')}}">
                                                    @if($errors->has('apmaterno'))
                                                        <span class="help-block"> {{$errors->first('apmaterno')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" >Fecha de nacimiento*:</label>
                                                    <input type="text" value="{{old('fechanac')}}"  name="fechanac" class="form-control fecha  {{$errors->has('fechanac')?'has-error':''}}  " placeholder="dd/mm/aaaa" />
                                                    @if($errors->has('fechanac'))
                                                        <span class="help-block"> {{$errors->first('fechanac')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" >Lugar de nacimiento:</label>
                                                    <select  name="lugarnac" class="form-control">
                                                        @foreach($estados as $estado)
                                                            {{--<option value="{{$pro->id}}">{{$pro->title}}</option>--}}
                                                            <option value="{{ $estado->nombre }}"{{ old('luegarnac') == $estado->nombre ? ' selected' : '' }}>
                                                                {{ $estado->nombre }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" >CURP:</label>
                                                    <input type="text"  class="form-control {{$errors->has('curp')?'has-error':''}} " name="curp" value="{{old('curp')}}" >
                                                    @if($errors->has('curp'))
                                                        <span class="help-block"> {{$errors->first('curp')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" >Género:</label>
                                                    <select  name="genero" class="form-control">
                                                        <option value="masculino"  {{ old('genero') == "masculino" ? ' selected' : '' }} >Masculino</option>
                                                        <option value="femenino"  {{ old('genero') == "femenino" ? ' selected' : '' }} >Femenino</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" >Grupo sanguíneo*:</label>
                                                    <select  name="gruposan" class="form-control">
                                                        @foreach($gruposan as $grupo)
                                                            <option value="{{ $grupo }}" {{ old('gruposan') == $grupo ? ' selected' : '' }}>
                                                                {{ $grupo }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="col-md-12">
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

            $('.hora').datepicker({
                timepicker: true,
                onlyTimepicker: true,
                language: 'es',
                maxHours: 18,
                onSelect: function (fd, d, picker) {
                    $(picker.el).trigger('change')
                }
            });

            $('.number').keypress(numberFormatTo);
            $('.number').keyup(numberFormatTo);
        });


        function numberFormatTo() {
            var numbers = /^[0-9]+$/;

            if(!this.value.match(numbers))
            {
                this.value = this.value.slice(0, -1);
            }

        }


    </script>





@endsection