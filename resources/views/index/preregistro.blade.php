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

        <form id="form" action="{{url('preregistro')}}" method="post">
            {{ csrf_field() }}

        <div class="list-group noPadding">



            <div class="list-group-item py-3 noPadding" data-acc-stepx>
                <div class="mb-0 headerform" data-acc-titlex>Datos del Derechohabiente </div>

                <div data-acc-contentx>
                    <div class="my-3">
                        <span class="subtitlereg">Datos Generales</span>
                        <div class="row rowjc">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Nombre (s)*:</label>
                                    <input type="text" name="" class="form-control autoupdate req_this"     placeholder="Escribe aquí tu nombre" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Primer apellido*:</label>
                                    <input type="text"    class="form-control autoupdate req_this" placeholder="Escribe aquí tu primer apellido" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Segundo apellido*:</label>
                                    <input type="text"  class="form-control autoupdate req_this"  placeholder="Escribe aquí tu segundo apellido"/>
                                </div>
                            </div>
                        </div>
                        <div class="row rowjc">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Lugar de nacimiento*:</label>
                                    <select  name="profession_id" class="form-control">
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
                                    <input type="text"  class="form-control fecha autoupdate req_this" placeholder="" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CURP*:</label>
                                    <input type="text" class="form-control autoupdate req_this"  data-valido="curpValido" placeholder="Escribe aquí tu CURP"/>
                                </div>
                            </div>
                        </div>



                        <span class="subtitlereg">Estado Civil</span>
                        <div class="row rowjc">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Género*:</label>
                                    <select type="text"  class="form-control autoupdate req_this" id="genero" data-callback="muestraAlertGenero" >
                                        <option value="masculino" >Masculino</option>
                                        <option value="femenino" >Femenino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>Estado Civil*:</label>
                                    <select type="text"  class="form-control autoupdate req_this" id="edocivil" data-valido="validaedoCivil" >
                                        <option value="casado" >Casada</option>
                                        <option value="soltero" >Soltero</option>
                                        <option value="viudo" >Viudo</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="row rowjc hide" id="fileuploadedocivil">
                            <div class="col-md-8">
                                <div class="form-group ">
                                    <label>Adjuntar evidencia*:</label>
                                    <form action="#" method="GET" class="form demo_form">
                                        <div class="upload" data-upload-options='{"action":""}'></div>
                                        <p class="info_docs">Formato: PDF o JPG. Tamaño máximo: 4 Mb</p>
                                        <div class="filelists">
                                            <ol class="filelist complete">
                                                <li data-index="0"><span class="content"><span class="file" style="color: rgb(255, 255, 255);"></span></span><span class="bar" style="width: 100%; background: rgb(47, 191, 65);"></span></li>
                                            </ol>
                                            <ol class="filelist queue">
                                            </ol>
                                        </div>
                                    </form>
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


                        <span class="subtitlereg">Fotografía</span>

                        <div class="row rowjc">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <label class="lw100">Adjuntar Fotografía*:</label>
                                    <form action="#" method="GET" class="form demo_form">
                                        <div class="upload" data-upload-options='{"action":""}'></div>
                                        <p class="info_docs">Formato: PDF o JPG. Tamaño máximo: 4 Mb</p>
                                        <div class="filelists">
                                            <ol class="filelist complete">

                                            </ol>
                                            <ol class="filelist queue">
                                            </ol>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <input type="submit" id="finalizar" class="btn btn-primary float-right btnnet" value="Finalizar">

        </div>

    </form>
</div>


    <style>

    </style>
    <script>
        $(document).ready(function() {
            $(".upload").upload({
                maxSize: 1073741824,
                maxConcurrent:1,

                beforeSend: onBeforeSend
            }).on("start.upload", onStart)
                .on("complete.upload", onCompleteEdoCivilAll)
                .on("filestart.upload", onFileStart)
                .on("fileprogress.upload", onFileProgress)
                .on("filecomplete.upload", onCompleteEdoCivil)
                .on("fileerror.upload", onFileError)
                .on("chunkstart.upload", onChunkStart)
                .on("chunkprogress.upload", onChunkProgress)
                .on("chunkcomplete.upload", onChunkComplete)
                .on("chunkerror.upload", onChunkError)
                .on("queued.upload", onQueued);



        });


        function  onCompleteEdoCivilAll(e) {
            console.log(e)
        }

        function onCompleteEdoCivil(e, file, response) {
            response = response.split("--code--")[1];
            if (response.trim() != "OK" ) {
                $(this).parents("form").find(".filelist.complete")
                    .find("li[data-index=" + file.index + "]").addClass("error")
                    .find(".progress").text(response.trim());
            } else {
                var $target = $(this).parents("form").find(".filelist.complete").find("li[data-index=" + file.index + "]");
                $target.find(".file").text(file.name);
                $target.find(".progress").remove();
                $target.find(".cancel").remove();
                //$target.appendTo($(this).parents("form").find(".filelist.complete"));
                $(this).parents("form").find(".filelist.complete").html($target);
                var a = $(this).parents("form").find(".filelist.complete .content .file")
                var b = $(this).parents("form").find(".filelist.complete .bar ")
                a.css('color','white')
                b.css('background','#2fbf41')
            }
        }




    </script>
    <script src="{{asset('js/jquery.accordion-wizard.min.js')}}"></script>

    <script src="{{asset('js/index/pre_registro_paso2.js')}}"></script>



@endsection