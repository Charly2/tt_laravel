@extends('index.layout')

@section('content')


<div class="container">



    <h2 class="text-center">Prerregistro de Inscripción</h2>


    <section class="mb-3">
        <div class="row">
            <div class="col-md-12 text-right">

            </div>
        </div>
    </section>

        <form id="form" action="{{url('preregistro')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

        <div class="list-group noPadding">



            <div class="list-group-item py-3 noPadding" data-acc-stepx>
                <div class="mb-0 headerform" data-acc-titlex>Datos del Derechohabiente </div>

                <div data-acc-contentx>
                    <div class="my-3">
                        <span class="subtitlereg">Datos institucionales</span>
                        <div class="row rowjc">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Número de empleado*:</label>
                                    <input type="text" value="{{old('num_emp')}}" name="num_emp" class="form-control autoupdate req_this {{$errors->has('num_emp')?'is-invalid':''}}"     placeholder="Escribe aquí tu nombre" />
                                    @if($errors->has('num_emp'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('num_emp')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Centro de Trabajo:</label>

                                    <select  name="ct" class="form-control">
                                        @foreach($centros as $centro)
                                            {{--<option value="{{$pro->id}}">{{$pro->title}}</option>--}}
                                            <option value="{{ $centro->nombre }}"{{ old('ct') == $centro->nombre ? ' selected' : '' }}>
                                                {{ $centro->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('ct'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('ct')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Email:</label>
                                    <input type="text" value="{{old('email')}}" name="email" class="form-control autoupdate req_this {{$errors->has('email')?'is-invalid':''}}"     placeholder="Escribe aquí tu email" />
                                    @if($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('email')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <span class="subtitlereg">Datos Generales</span>
                        <div class="row rowjc">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Nombre (s)*:</label>
                                    <input type="text" value="{{old('nombre')}}" name="nombre" class="form-control autoupdate req_this {{$errors->has('nombre')?'is-invalid':''}}"     placeholder="Escribe aquí tu nombre" />
                                    @if($errors->has('nombre'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('nombre')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Primer apellido*:</label>
                                    <input type="text" name="appaterno" value="{{old('appaterno')}}"  class="form-control autoupdate req_this {{$errors->has('appaterno')?'is-invalid':''}}" placeholder="Escribe aquí tu primer apellido" />
                                    @if($errors->has('appaterno'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('appaterno')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Segundo apellido*:</label>
                                    <input type="text" name="apmaterno" value="{{old('apmaterno')}}"  class="form-control autoupdate req_this {{$errors->has('apmaterno')?'is-invalid':''}}"  placeholder="Escribe aquí tu segundo apellido"/>
                                    @if($errors->has('apmaterno'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('apmaterno')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row rowjc">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Lugar de nacimiento*:</label>
                                    <select  name="lugarnac" class="form-control">
                                        @foreach($estados as $estado)
                                            {{--<option value="{{$pro->id}}">{{$pro->title}}</option>--}}
                                            <option value="{{ $estado->nombre }}"{{ old('luegarnac') == $estado->nombre ? ' selected' : '' }}>
                                                {{ $estado->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Fecha de nacimiento*:</label>
                                    <input type="text" value="{{old('fechanac')}}"  name="fechanac" class="form-control fecha autoupdate req_this {{$errors->has('fechanac')?'is-invalid':''}}" placeholder="dd/mm/aaaa" />
                                    @if($errors->has('fechanac'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('fechanac')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CURP*:</label>
                                    <input type="text" name="curp" value="{{old('curp')}}"  class="form-control autoupdate req_this {{$errors->has('curp')?'is-invalid':''}}"  data-valido="curpValido" placeholder="Escribe aquí tu CURP"/>
                                    @if($errors->has('curp'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('curp')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>



                        <span class="subtitlereg">Estado Civil</span>
                        <div class="row rowjc">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Género*:</label>
                                    <select type="text" name="genero"  class="form-control autoupdate req_this" id="genero" data-callback="muestraAlertGenero" >
                                        <option value="masculino" >Masculino</option>
                                        <option value="femenino" >Femenino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Estado Civil*:</label>
                                    <select type="text" name="edocivil"  class="form-control autoupdate req_this" id="edocivil" data-valido="validaedoCivil" >
                                        <option value="casado" >Casada</option>
                                        <option value="soltero" >Soltero</option>
                                        <option value="viudo" >Viudo</option>
                                    </select>
                                </div>
                            </div>

                        </div>








                        {{--<span class="subtitlereg">Datos del Centro de Trabajo</span>--}}



{{--
                        <div class="row rowjc">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Centro de Trabajo*:</label>
                                    <select class="form-control select select-primary autoupdate req_this" data-toggle="select" >
                                        <option value="1">ESIME</option>
                                        <option value="2">UPIITA</option>
                                        <option value="3">UPIICSA</option>
                                        <option value="4" selected>ESCOM</option>
                                        <option value="5">CECYT 2</option>
                                        <option value="5">CECYT 1</option>
                                        <option value="5">CECYT 3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Puesto*:</label>
                                    <input type="text" name="" class="form-control autoupdate req_this" placeholder="Escribe aquí tu puesto" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Escolaridad*:</label>
                                <!--<input type="text" name="" class="form-control autoupdate req_this" <?/*=autoUpdate("persona","escolaridad",encryptIt($data['persona']['idPersona']),'pre_registro/update',$data['persona']['escolaridad'],4,25)*/?> placeholder="Escribe aquí tu escolaridad" />-->
                                    <select type="text" name="" class="form-control autoupdate req_this" >

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row rowjc">

                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Hora de entrada*:</label>
                                    <input type="text" name="" class="form-control hora autoupdate req_this" placeholder="Escribe aquí tu hora de entrada" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Hora de salida*:</label>
                                    <input type="text" name="" class="form-control hora autoupdate req_this" placeholder="Escribe aquí tu hora de salida" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Horas de base*:</label>
                                    <input type="text" name="" class="form-control autoupdate req_this" placeholder="Escribe aquí tus horas de base" />
                                </div>
                            </div>
                        </div>
                        <div class="row rowjc">


                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Horas de Interinato*:</label>
                                    <input type="text" name="" class="form-control autoupdate req_this" placeholder="Escribe aquí tus horas de base" />
                                </div>
                            </div>
                        </div>--}}


                        <span class="subtitlereg">Documentos</span>

                        <div class="row rowjc">
                            <div class="col-md-6">
                                    <label class="lw100">Adjuntar foto de la credendial instutucional:</label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input class="custom-file-input" id="inputGroupFile04" name="foto_pre" type="file">
                                                    <label class="custom-file-label" id="fileeaa" for="inputGroupFile04">Subir archivo</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @if($errors->has('foto_pre'))
                                    <div class="invalid-feedback" style="display: block">
                                        {{$errors->first('foto_pre')}}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row rowjc mt-4" id="fileuploadedocivil">
                            <div class="col-md-6 offset-md-3">
                                @if($errors->any())

                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Error!</strong> Se encontraron algunos errores en tu información.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-4 offset-md-8">
                                <button type="submit" id="finalizars" class="btn btn-block btn-primary float-right btnnet" value="Finalizar">Finalizar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>

    </form>
</div>


    <style>

    </style>
    <script>

        $('.form-control').change(function (e) {
            e.preventDefault();
            console.log(this.classList.remove('is-invalid'));
        });
        $(function() {
            // We can attach the `fileselect` event to all file inputs on the page
            $(document).on("change", ":file", function() {
                var input = $(this),
                    numFiles = input.get(0).files ? input.get(0).files.length : 1,
                    label = input
                        .val()
                        .replace(/\\/g, "/")
                        .replace(/.*\//, "");
                input.trigger("fileselect", [numFiles, label]);
            });

            // We can watch for our custom `fileselect` event like this
            $(document).ready(function() {
                $(":file").on("fileselect", function(event, numFiles, label) {
                    var input = $(this)
                            .parents(".input-group")
                            .find(":text"),
                        log = numFiles > 1 ? numFiles + " files selected" : label;

                    if (input.length) {
                        input.val(log);
                    } else {
                        if (log) {
                            $('#fileeaa').html(log);

                        }
                    }
                });
            });
        });







    </script>
    <script src="{{asset('js/jquery.accordion-wizard.min.js')}}"></script>

    <script src="{{asset('js/index/pre_registro_paso2.js')}}"></script>



@endsection