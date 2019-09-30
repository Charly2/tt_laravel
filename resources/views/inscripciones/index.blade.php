@extends('layouts.app')


@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-bars"></i> Lista de Procesos de Inscripción<small></small></h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">


                        @foreach($alumnos as $alumno)
                        <div class="col-md-12 col-sm-12 col-xs-12 profile_details">
                            <div class="well profile_view">
                                <div class="col-sm-12">

                                    <div class="left col-xs-7">
                                        <h2>{{$alumno->getNombreAlumno()}}</h2>
                                        <p style="font-size: 16px;"><strong>Edad: </strong> {{$alumno->getEdadAlumno()}} </p>
                                        <ul class="list-unstyled">
                                            <li style="font-size: 16px;"><i class="fa fa-building"></i>Cendi: {{$alumno->getCendi()}} </li>
                                        </ul>
                                    </div>
                                    <div class="right col-xs-5 text-center">
                                        <img src="images/img.jpg" alt="" class="img-circle img-responsive">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            @include('partials.progressbar')
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 bottom text-center">
                                    <div class="col-xs-12 col-sm-12 emphasis">
                                        <a type="button" class="btn btn-primary " href="{{url('/inscripciones/'.$alumno->id)}}">
                                            <i class="fa fa-user"> </i> Ver Inscripción
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>










@endsection