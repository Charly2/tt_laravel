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

                    <div class="row dieflex">
                        @foreach($data as $d)
                            <div class="col-md-3 col-sm-3 col-xs-12 profile_details" onclick="sendm({{$d->id}})">
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

        });

        function sendm(t) {
            window.location.href = "{{url('/asigna_uno/')}}/"+t;
        }
    </script>


@endsection
