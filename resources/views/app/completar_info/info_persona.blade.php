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
                            <li role="presentation" class=" active">
                                <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
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
                        </ul>
                    </div>

                    <div role="form">
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="step1">
                               {{--Inicia el form--}}




                                <form role="form" action="{{url('/completeinformacion_general')}}" style="padding: 15px 0 " method="post">
                                    {{ csrf_field() }}
                                    <h4 >Datos generales</h4>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" >Nombre:</label>
                                                <input type="text" class="form-control " value="{{$persona->nombre}}" disabled>
                                                <span class="help-block">Please correct the error</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" >Apellido paterno:</label>
                                                <input type="text" class="form-control "  value="{{$persona->appaterno}}" disabled>
                                                <span class="help-block">Please correct the error</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" >Apellido paterno:</label>
                                                <input type="text" class="form-control "  value="{{$persona->apmaterno}}" disabled>
                                                <span class="help-block">Please correct the error</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" >Número de empleado:</label>
                                                <input type="text" class="form-control " value="{{$trabajador->numtrabajador}}" disabled>
                                                <span class="help-block">Please correct the error</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" >Lugar de nacimiento:</label>
                                                <input type="text" class="form-control "  value="{{$persona->lugarnac}}" disabled>
                                                <span class="help-block">Please correct the error</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" >Estado Civil:</label>
                                                <input type="text" class="form-control "  value="{{$persona->fechanac}}" disabled>
                                                <span class="help-block">Please correct the error</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" >CURP:</label>
                                                <input type="text" class="form-control " value="{{$persona->curp}}" disabled>
                                                <span class="help-block">Please correct the error</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" >Género:</label>
                                                <input type="text" class="form-control "  value="{{$persona->genero}}" disabled>
                                                <span class="help-block">Please correct the error</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" >Estado Civil:</label>
                                                <input type="text" class="form-control "  value="{{$persona->estadocivil}}" disabled>
                                                <span class="help-block">Please correct the error</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" >Grupo sanguíneo*:</label>
                                                <select  name="gruposan" class="form-control">
                                                    @foreach($gruposan as $centro)
                                                        <option value="{{ $centro }}"{{ old('gruposan') == $centro ? ' selected' : '' }}>
                                                            {{ $centro }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 >Datos de Contacto</h4>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" >Email:</label>
                                                <input type="text" class="form-control " value="{{$persona->email}}" disabled>
                                                <span class="help-block">Please correct the error</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" >Teléfono fijo*:</label>
                                                <input name="telefono_fijo" type="text" class="form-control {{$errors->has('telefono_fijo')?'has-error':''}}"  value="{{old('telefono_fijo')}}" >
                                                @if($errors->has('telefono_fijo'))
                                                    <span class="help-block"> {{$errors->first('telefono_fijo')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" >Teléfono celular:</label>
                                                <input name="telefono_cel" type="text" class="form-control {{$errors->has('telefono_cel')?'has-error':''}}"  value="{{old('telefono_cel')}}" >
                                                @if($errors->has('telefono_cel'))
                                                    <span class="help-block"> {{$errors->first('telefono_cel')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
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

@endsection