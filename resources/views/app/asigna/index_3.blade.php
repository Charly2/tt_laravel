@extends('layouts.app')


@section('content')

    <style>
        .itemComp:hover{
            cursor: move;
        }
        body{
            background: #f7f7f7;
        }
    </style>




    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Finalizar Asignación<small>Listado por Cendi</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">

                    <div class="row ">
                        @php $i =0; @endphp
                        @foreach($data as $d)
                            @php $i++;@endphp
                            <div class="col-md-3 col-sm-6 col-xs-12" style="min-height: 400px">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h4>{{$d->nombre}}<small> </small></h4>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="">
                                            <ul class="to_do">
                                                @foreach($grupos[$i] as $gru)
                                                    <li>
                                                        <a href="{{url('/procesos_cendi/'.$gru->id)}}" >
                                                            <p CLASS="cendiitem ">
                                                                <i class="paloma fa fa-check-circle "></i>
                                                                <span>{{$gru->nombre}}</span>
                                                            </p>
                                                        </a>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-2 col-md-offset-5">
                        <button class="btn btn-primary btn-block " disabled>Finalizar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://raw.githack.com/SortableJS/Sortable/master/Sortable.js"></script>

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

         .paloma{
             position: absolute;
             opacity: 0;
             color: #6b2848;
             font-size: 20px;
             right: 10px;
             top: 7px;f
        }
        .cendiitem.hover .paloma{
            opacity: 1;
        }

        .none{
            pointer-events: none;
        }
    </style>

    <script>
        $(document).ready(function () {

        });

        function sendm(t) {
            window.location.href = "{{url('/asigna_uno/')}}/"+t;
        }
    </script>


@endsection
