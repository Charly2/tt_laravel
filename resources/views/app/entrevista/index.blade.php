@extends('layouts.app')


@section('content')

    <style>
        label.btn span {
            font-size: 1.5em ;
        }

        label input[type="radio"] ~ i.fa.fa-circle-o{
            color: #c8c8c8;    display: inline;
        }

        label input[type="radio"] ~ i.fa.fa-dot-circle-o{
            display: none!important;
        }
        label input[type="radio"]:checked ~ i.fa.fa-circle-o{
            display: none;
        }
        label input[type="radio"]:checked ~ i.fa.fa-dot-circle-o{
            color: #692545;    display: inline;
        }
        label:hover input[type="radio"] ~ i.fa {
            color: #7AA3692545CC;
        }

        label input[type="checkbox"] ~ i.fa.fa-square-o{
            color: #c8c8c8;    display: inline;
        }
        label input[type="checkbox"] ~ i.fa.fa-check-square-o{
            display: none;
        }
        label input[type="checkbox"]:checked ~ i.fa.fa-square-o{
            display: none;
        }
        label input[type="checkbox"]:checked ~ i.fa.fa-check-square-o{
            color: #692545;    display: inline;
        }
        label:hover input[type="checkbox"] ~ i.fa {
            color: #692545;
        }

        div[data-toggle="buttons"] label.active{
            color: #692545;
        }

        div[data-toggle="buttons"] label {
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: normal;
            line-height: 2em;
            text-align: left;
            white-space: nowrap;
            vertical-align: top;
            cursor: pointer;
            background-color: none;
            border: 0px solid
            #c8c8c8;
            border-radius: 3px;
            color: #c8c8c8;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            -o-user-select: none;
            user-select: none;
        }

        div[data-toggle="buttons"] label:hover {
            color: #692545;
        }

        div[data-toggle="buttons"] label:active, div[data-toggle="buttons"] label.active {
            -webkit-box-shadow: none;
            box-shadow: none;
        }



    </style>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-arrow-right "></i>   <small>Entrevista Médica</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">


                    @include('app.proceso.menor')

                    @foreach($preguntas as $pregunta)
                        @if($pregunta->tipo == 1)
                        <div class="col-md-12">
                            <div class="form-group">
                                <label style="font-size: 19px;" class="control-label" >{{$pregunta->txt}}:</label> <br>
                                <div style="display: flex; justify-content: flex-start; align-items: center;">
                                    @php  $resps = explode('-',$pregunta->resp);   @endphp
                                    <div class="btn-group" data-toggle="buttons">
                                        @foreach($resps as $r )
                                        <label class="btn issix">
                                            <input type="radio" name='gender2'  data-cc = "opc{{$pregunta->id}}" data-val="{{$r=="Si"?'true':''}}" class="issi"  >
                                            <i class="fa fa-check-circle-o fa-2x"></i>
                                            <span> {{$r}}</span>
                                        </label>
                                        @endforeach
                                            <label class="btn issix opc{{$pregunta->id}} opc0"  style="pointer-events: none" classs="">
                                                <input type="radio" name='gender2s'  >
                                                <i class="fa fa-question-circle-o fa-2x"></i>
                                                <span> Cuál</span>
                                            </label>
                                    </div>

                                    <input style="width: 50%;" autocomplete="off" id="num_e" name="num_int" type="text" class="form-control opc0 opc{{$pregunta->id}} {{$errors->has('num_int')?'has-error':''}}"  value="{{old('num_int')}}" >
                                </div>
                                @if($errors->has('num_int'))
                                    <span class="help-block"> {{$errors->first('num_int')}}</span>
                                @endif
                            </div>
                        </div>
                        @endif

                    @endforeach


                        <div class="col-md-12">
                            <div class="form-group">
                                <label style="font-size: 19px;" class="control-label" >Comentarios:</label> <br>
                                <div style="display: flex; justify-content: flex-start; align-items: center;">

                                    <textarea style="width: 65%;" rows="4" autocomplete="off" id="num_e" name="num_int" type="text" class="form-control {{$errors->has('num_int')?'has-error':''}}"  value="{{old('num_int')}}" ></textarea>
                                </div>
                                @if($errors->has('num_int'))
                                    <span class="help-block"> {{$errors->first('num_int')}}</span>
                                @endif
                            </div>
                        </div>


                        <div class="col-md-7">
                            <div class="form-group" style="text-align: center;margin-top: 30px">
                                <button class="btn btn-success sithj">
                                    <i class="fa fa-check "></i>
                                    Aprobado
                                </button>
                                <button class="btn btn-danger sithj">
                                    <i class="fa fa-close "></i>
                                    Rechazado
                                </button>
                            </div>
                        </div>


                        <div class="col-md-7">
                            <div class="form-group" style="text-align: center;margin-top: 30px">
                                <button class="btn btn-primary ">
                                    <i class="fa fa-send "></i>
                                    Finalizar
                                </button>
                            </div>
                        </div>











                </div>
            </div>
        </div>
    </div>


    <style>
        .opc0{
            opacity: 0;
            transition: all .5s;
        }
        .sithj{
            transform: scale(1);
            transition: all .5s;
            opacity: .5;
        }

        .sithj:hover{
            transform: scale(1.1);
            opacity: .8;
            transition: all .5s;
        }
        .succ{
            transform: scale(1.2);
            opacity: 1;
            transition: all .5s;
        }
    </style>

    <script>
        $(document).ready(function () {
            $('.issi').change(function (e) {
                if($(this)[0].dataset.val=="true"){
                    $('.'+$(this)[0].dataset.cc).css('opacity',1);
                }else{
                    $('.'+$(this)[0].dataset.cc).css('opacity',0);
                }
                //console.dir($(this).children('input')[0].checked  );
            });

            $('.sithj').click(function (e) {
                $('.sithj').each(function () {
                    $(this).removeClass('succ');
                })
                $(this).addClass('succ');
            });
        });
    </script>


@endsection