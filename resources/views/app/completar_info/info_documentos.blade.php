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
                            <li role="presentation" class="disabled" >
                                <a >
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-briefcase"></i>
                                    </span>
                                    <p>Centro de Trabajo</p>
                                </a>
                            </li>
                            <li role="presentation" class=" active" >
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
                                                <label class="control-label" >Número exterior:</label>
                                                <input type="file" name="img" class="file">
                                                <div class="input-group asd564">
                                                    <input type="text" class="form-control asda75 file_style"  placeholder="Upload Image">
                                                    <span class="input-group-btn" style="display: block;width: 25%;height: 38px;">
                                                        <button class="browse btn btn-primary q516" type="button"><i class="glyphicon glyphicon-search"></i> Browse</button>
                                                    </span>
                                                </div>
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

        .file {
            visibility: hidden;
            position: absolute;
        }
        .file_style{
            border: 2px solid #bdc3c7;
            color: #34495e;
            font-family: "Lato", Helvetica, Arial, sans-serif;
            font-size: 15px;
            line-height: 1.467;
            padding: 5px 7px;
            height: 38px;
            border-radius: 6px;
            box-shadow: none;
            transition: border .25s linear, color .25s linear, background-color .25s linear;
        }
        .asd564{
            display: flex;
            width: 100%;
        }
        .asda75{
            width: 75%;
        }
        .q516{
            width: 100%;
            height: 100%;
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


        $(document).on('click', '.browse', function(){
            var file = $(this).parent().parent().parent().find('.file');
            file.trigger('click');
        });
        $(document).on('change', '.file', function(){
            $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
        });
    </script>





@endsection