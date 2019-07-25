@extends('layouts.app')
@section('title','Verificar Preregistro')
@section('content')

    @include('app.verificapreregistro._toptiles')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><small>Listar de personas que reliazaron su Preregistro</small></h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Número de empleado</th>
                                <th>Curp</th>
                                <th>Centro de Trabajo</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody class="hoverTd">
                        @foreach($validas as $valida)
                            <tr class="">
                                <td>{{$valida->id}}</td>
                                <td>{{$valida->persona()->nombrecompleto()}}</td>
                                <td>{{$valida->num_emp}}</td>
                                <td>{{$valida->ct}}</td>
                                <td>{{$valida->persona()->curp}}</td>
                                <td>{{$valida->created_at}}</td>
                                <td>
                                    @if($itemactive == 1)
                                        <a href="{{url('/verificapreregistro/valida/'.$valida->id)}}" class="btn btn-success btn-xs">Validar</a>
                                    @endif
                                    @if($itemactive == 2 || $itemactive == 3)
                                        <a href="{{url('/verificapreregistro/ver/'.$valida->id)}}" class="btn btn-success btn-xs">Ver</a>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>


@endsection