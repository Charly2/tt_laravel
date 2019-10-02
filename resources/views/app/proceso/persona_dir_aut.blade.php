

                                    <form role="form" action="{{url('/procesoinscripcion/conyuge_direccion')}}" style="padding: 15px 0 " method="post">
                                        {{ csrf_field() }}
                                        <h4 >Dirección principal persona autorizada</h4>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" >Calle:</label>
                                                    <input id="calle" name="calle" type="text" class="form-control {{$errors->has('calle')?'has-error':''}}"  value="{{$dir_au->calle}}" >
                                                    @if($errors->has('calle'))
                                                        <span class="help-block"> {{$errors->first('calle')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" >Número interior:</label>
                                                    <input id="num_e" name="num_int" type="text" class="form-control {{$errors->has('num_int')?'has-error':''}}"  value="{{$dir_au->num_int}}" >
                                                    @if($errors->has('num_int'))
                                                        <span class="help-block"> {{$errors->first('num_int')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" >Número exterior:</label>
                                                    <input id="num_i" name="num_ext" type="text" class="form-control {{$errors->has('num_ext')?'has-error':''}}"  value="{{$dir_au->num_ext}}" >
                                                    @if($errors->has('num_ext'))
                                                        <span class="help-block"> {{$errors->first('num_ext')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" >Codigo postal:</label>
                                                    <input id="CP" name="cp" type="text" class="form-control {{$errors->has('cp')?'has-error':''}}"  value="{{$dir_au->cp}}" >
                                                    @if($errors->has('cp'))
                                                        <span class="help-block"> {{$errors->first('cp')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" >Estado:</label>
                                                    <input name="estado" id="EN" type="text" class="form-control {{$errors->has('estado')?'has-error':''}}"  value="{{$dir_au->estado}}" >
                                                    @if($errors->has('estado'))
                                                        <span class="help-block"> {{$errors->first('estado')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" >Municipio:</label>
                                                    <input name="municipio" id="MU" type="text" class="form-control {{$errors->has('municipio')?'has-error':''}}"  value="{{$dir_au->municipio}}" >
                                                    @if($errors->has('municipio'))
                                                        <span class="help-block"> {{$errors->first('municipio')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" >Colonia*:</label>
                                                    <select  id="colonias" name="colonia" class="form-control">
                                                        <option value="">{{$dir_au->colonia}}</option>
                                                    </select>
                                                </div>
                                            </div>


                                        </div>





                                    </form>
