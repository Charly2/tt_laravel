@extends('layouts.app')

@section('content')

    <style>
        .hover_S{
            background-image: url("/images/bitmap2.png")!important;
            background-size: cover!important;
            position: relative;
        }
        .hover_S * {
            position: relative;
            z-index: 100;
        }
        .hover_S:before{
            content: "";
            width: 100%;
            height: 100%;
            background: rgba(45, 66, 86, .8);
            position: absolute;
            left: 0;
            top: 0;
        }
    </style>

    <div class="">
        <div class="page-title">

        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>   <small></small></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="bs-example" data-example-id="simple-jumbotron">
                            <div class="jumbotron bg-poli hover_S">
                                <h1 class="text-center">Inicia tu Inscripcción</h1>
                                <p>Para poder iniciar tu inscripcción debes tener a la mano los siguientes documentos:</p>
                                <p>- Documento tipo 1</p>
                                <p>- Documento tipo 2</p>
                                <p>- Documento tipo 3</p>
                                <p>- Documento tipo 4</p>

                                <div class="row">
                                    <div class="col-md-4 col-md-offset-4">
                                        <form action="{{url('/procesoinscripcion/inicio')}}" method="get">
                                            {{csrf_field()}}
                                            <button type="submit" href="" class="btn btn-success btn-block" style="line-height: 1.8">Iniciar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection