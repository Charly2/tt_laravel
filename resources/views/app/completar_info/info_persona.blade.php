@extends('layouts.app')


@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa fa-bars"></i> Completar Información <small></small></h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">


                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Home</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Profile</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                        </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                            <div class="my-3">
                                <span class="subtitlereg">Datos institucionales</span>
                                <div class="row rowjc">
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label>Número de empleado*:</label>
                                            <input type="text" value="" name="num_emp" class="form-control autoupdate req_this " placeholder="Escribe aquí tu nombre">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label>Centro de Trabajo:</label>

                                            <select name="ct" class="form-control">

                                                <option value="ESCOM">
                                                    ESCOM
                                                </option>

                                                <option value="ESIA">
                                                    ESIA
                                                </option>

                                                <option value="UPIITA">
                                                    UPIITA
                                                </option>

                                                <option value="ESIME">
                                                    ESIME
                                                </option>

                                                <option value="CET 1">
                                                    CET 1
                                                </option>

                                                <option value="CECYT 9">
                                                    CECYT 9
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label>Email:</label>
                                            <input type="text" value="" name="email" class="form-control autoupdate req_this " placeholder="Escribe aquí tu email">
                                        </div>
                                    </div>
                                </div>


                                <span class="subtitlereg">Datos Generales</span>
                                <div class="row rowjc">
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label>Nombre (s)*:</label>
                                            <input type="text" value="" name="nombre" class="form-control autoupdate req_this " placeholder="Escribe aquí tu nombre">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label>Primer apellido*:</label>
                                            <input type="text" name="appaterno" value="" class="form-control autoupdate req_this " placeholder="Escribe aquí tu primer apellido">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Segundo apellido*:</label>
                                            <input type="text" name="apmaterno" value="" class="form-control autoupdate req_this " placeholder="Escribe aquí tu segundo apellido">
                                        </div>
                                    </div>
                                </div>
                                <div class="row rowjc">
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label>Lugar de nacimiento*:</label>
                                            <select name="lugarnac" class="form-control">

                                                <option value="Aguascalientes">
                                                    Aguascalientes
                                                </option>

                                                <option value="Baja California">
                                                    Baja California
                                                </option>

                                                <option value="Baja California Sur">
                                                    Baja California Sur
                                                </option>

                                                <option value="Campeche">
                                                    Campeche
                                                </option>

                                                <option value="Coahuila de Zaragoza">
                                                    Coahuila de Zaragoza
                                                </option>

                                                <option value="Colima">
                                                    Colima
                                                </option>

                                                <option value="Chiapas">
                                                    Chiapas
                                                </option>

                                                <option value="Chihuahua">
                                                    Chihuahua
                                                </option>

                                                <option value="Distrito Federal">
                                                    Distrito Federal
                                                </option>

                                                <option value="Durango">
                                                    Durango
                                                </option>

                                                <option value="Guanajuato">
                                                    Guanajuato
                                                </option>

                                                <option value="Guerrero">
                                                    Guerrero
                                                </option>

                                                <option value="Hidalgo">
                                                    Hidalgo
                                                </option>

                                                <option value="Jalisco">
                                                    Jalisco
                                                </option>

                                                <option value="México">
                                                    México
                                                </option>

                                                <option value="Michoacán de Ocampo">
                                                    Michoacán de Ocampo
                                                </option>

                                                <option value="Morelos">
                                                    Morelos
                                                </option>

                                                <option value="Nayarit">
                                                    Nayarit
                                                </option>

                                                <option value="Nuevo León">
                                                    Nuevo León
                                                </option>

                                                <option value="Oaxaca de Juárez">
                                                    Oaxaca de Juárez
                                                </option>

                                                <option value="Puebla">
                                                    Puebla
                                                </option>

                                                <option value="Querétaro">
                                                    Querétaro
                                                </option>

                                                <option value="Quintana Roo">
                                                    Quintana Roo
                                                </option>

                                                <option value="San Luis Potosí">
                                                    San Luis Potosí
                                                </option>

                                                <option value="Sinaloa">
                                                    Sinaloa
                                                </option>

                                                <option value="Sonora">
                                                    Sonora
                                                </option>

                                                <option value="Tabasco">
                                                    Tabasco
                                                </option>

                                                <option value="Tamaulipas">
                                                    Tamaulipas
                                                </option>

                                                <option value="Tlaxcala">
                                                    Tlaxcala
                                                </option>

                                                <option value="Veracruz de Ignacio de la Llave">
                                                    Veracruz de Ignacio de la Llave
                                                </option>

                                                <option value="Yucatán">
                                                    Yucatán
                                                </option>

                                                <option value="Zacatecas">
                                                    Zacatecas
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label>Fecha de nacimiento*:</label>
                                            <input type="text" value="" name="fechanac" class="form-control fecha autoupdate req_this " placeholder="dd/mm/aaaa">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>CURP*:</label>
                                            <input type="text" name="curp" value="" class="form-control autoupdate req_this " data-valido="curpValido" placeholder="Escribe aquí tu CURP">
                                        </div>
                                    </div>
                                </div>



                                <span class="subtitlereg">Estado Civil</span>
                                <div class="row rowjc">
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label>Género*:</label>
                                            <select type="text" name="genero" class="form-control autoupdate req_this" id="genero" data-callback="muestraAlertGenero">
                                                <option value="masculino">Masculino</option>
                                                <option value="femenino">Femenino</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label>Estado Civil*:</label>
                                            <select type="text" name="edocivil" class="form-control autoupdate req_this" id="edocivil" data-valido="validaedoCivil">
                                                <option value="casado">Casada</option>
                                                <option value="soltero">Soltero</option>
                                                <option value="viudo">Viudo</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>















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
                                    </div>
                                </div>

                                <div class="row rowjc mt-4" id="fileuploadedocivil">
                                    <div class="col-md-6 offset-md-3">
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-4 offset-md-8">
                                        <button type="submit" id="finalizars" class="btn btn-block btn-primary float-right btnnet" value="Finalizar">Finalizar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                            <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                                booth letterpress, commodo enim craft beer mlkshk aliquip</p>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                                booth letterpress, commodo enim craft beer mlkshk </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection