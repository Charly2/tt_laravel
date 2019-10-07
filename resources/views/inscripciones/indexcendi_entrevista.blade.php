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

                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <td>Nombre del Trabajador</td>
                                <td>N° de empleado</td>
                                <th>Nombre del Menor</th>
                                <th>Edad del Menor</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>


                            <tbody>




                            @foreach($alumnos as $alumno)
                                <tr>
                                    <td>{{$alumno->id}}</td>
                                    <td>{{$alumno->getNombreTrabajador()}}</td>
                                    <td>{{$alumno->getNumTrabajador()}}</td>
                                    <td>{{$alumno->getNombreAlumno()}}</td>
                                    <td>{{$alumno->getEdadAlumno()}}</td>
                                    <td width="20%" style="text-align: center">
                                        <a type="button" class="btn btn-primary " href="{{url('/entrevista_llena/'.$alumno->id)}}">
                                            <i class="fa fa-user"> </i> Iniciar entrevista
                                        </a>
                                        <a type="button" class="btn btn-success " href="{{url('/entrevista_llena/print/'.$alumno->id)}}">
                                            <i class="fa fa-print"> </i> Imprimir
                                        </a>
                                    </td>
                                </tr>


                            @endforeach

                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>










@endsection