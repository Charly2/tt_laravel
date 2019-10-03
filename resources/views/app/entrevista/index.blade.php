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
                    <h2><i class="fa fa-arrow-right "></i>   <small>Entrevista</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    @foreach($preguntas as $pregunta)

                        <div class="col-md-12">
                            <div class="form-group">
                                <label style="font-size: 19px;" class="control-label" >{{$pregunta->txt}}:</label> <br>
                                <div style="display: flex; justify-content: flex-start; align-items: center;">
                                    @php  $resps = explode('-',$pregunta->resp);   @endphp
                                    <div class="btn-group" data-toggle="buttons">
                                        @foreach($resps as $r )
                                        <label class="btn ">
                                            <input type="radio" name='gender2' class="{{$r=="Si"?"issi":""}}"  >
                                            <i class="fa fa-check-circle-o fa-2x"></i>
                                            <span> {{$r}}</span>
                                        </label>
                                        @endforeach
                                            <label class="btn " style="pointer-events: none">
                                                <input type="radio" name='gender2s' >
                                                <i class="fa fa-question-circle-o fa-2x"></i>
                                                <span> Cuál</span>
                                            </label>
                                    </div>

                                    <input style="width: 50%;" autocomplete="off" id="num_e" name="num_int" type="text" class="form-control {{$errors->has('num_int')?'has-error':''}}"  value="{{old('num_int')}}" >
                                </div>
                                @if($errors->has('num_int'))
                                    <span class="help-block"> {{$errors->first('num_int')}}</span>
                                @endif
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>




    <script>
        $(document).ready(function () {
            $('.issi').change(function (e) {
                console.log(this);
            });
        });
    </script>


@endsection