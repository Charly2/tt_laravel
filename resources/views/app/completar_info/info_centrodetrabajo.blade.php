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
                                <a  >
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-user "></i>
                                    </span>
                                    <p>Información general</p>
                                </a>
                            </li>
                            <li role="presentation" class="disabled" >
                                <a >
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-home"></i>
                                    </span>
                                    <p>Dirección</p>
                                </a>
                            </li>
                            <li role="presentation" class=" active" >
                                <a >
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-briefcase"></i>
                                    </span>
                                    <p>Centro de Trabajo</p>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div role="form">
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="step1">
                               {{--Inicia el form--}}




                                <form role="form" action="{{url('/completeinformacion_trabajo')}}" style="padding: 15px 0 " method="post">
                                    {{ csrf_field() }}
                                    <h4 >Dirección principal</h4>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" >Centro de Trabajo:</label>
                                                <input id="_a" name="_a" type="text" class="form-control " disabled  value="{{$trabajador->centrodetrabajo}}" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" >Puesto*:</label>
                                                <select  name="puesto" class="form-control">
                                                    <option value="DOCENTE">DOCENTE</option>
                                                    <option value="PAAE">PAAE</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" >Grado:</label>
                                                <select  name="ocupacion" class="form-control">
                                                    <option value="Normal" {{ old('ocupacion') == "Normal" ? ' selected' : '' }}>Normal</option>
                                                    <option value="Directivo" {{ old('ocupacion') == "Directivo" ? ' selected' : '' }}>Directivo</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <label class="control-label" >Hora de entrada:</label>
                                                <input autocomplete="off" name="horaentrada" id="horae" type="text" class="form-control hora {{$errors->has('horaentrada')?'has-error':''}}"  value="{{old('horaentrada')}}" >
                                                @if($errors->has('horaentrada'))
                                                    <span class="help-block"> {{$errors->first('horaentrada')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" >Hora de salida:</label>
                                                <input autocomplete="off" id="horas" name="horasalida" type="text" class="form-control hora {{$errors->has('horasalida')?'has-error':''}}"  value="{{old('cp')}}" >
                                                @if($errors->has('horasalida'))
                                                    <span class="help-block"> {{$errors->first('horasalida')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" >Sueldo mensual:</label>
                                                <input   name="sueldomensual" id="suledomen" type="text" class="form-control number {{$errors->has('sueldomensual')?'has-error':''}}"  value="{{old('sueldomensual')}}" >
                                                @if($errors->has('sueldomensual'))
                                                    <span class="help-block"> {{$errors->first('sueldomensual')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" >Teléfono oficina:</label>
                                                <input  name="telefonooficina" id="" type="text" class="form-control number {{$errors->has('telefonooficina')?'has-error':''}}"  value="{{old('telefonooficina')}}" >
                                                @if($errors->has('telefonooficina'))
                                                    <span class="help-block"> {{$errors->first('telefonooficina')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" >Extención oficina:</label>
                                                <input  name="extencionoficina" id="" type="text" class="form-control number {{$errors->has('extencionoficina')?'has-error':''}}"  value="{{old('extencionoficina')}}" >
                                                @if($errors->has('extencionoficina'))
                                                    <span class="help-block"> {{$errors->first('extencionoficina')}}</span>
                                                @endif
                                            </div>
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