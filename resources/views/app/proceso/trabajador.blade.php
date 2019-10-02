
<div role="form" actions="{{url('/completeinformacion_trabajo')}}" style="padding: 5px 0 " method="post">
    {{ csrf_field() }}

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Centro de Trabajo:</label>
                <input id="_a" name="_a" type="text" class="form-control " disabled  value="{{$trabajador->centrodetrabajo}}" >
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Puesto*:</label>
                <select  name="puesto" class="form-control" disabled>
                    <option value="DOCENTE">DOCENTE</option>
                    <option value="PAAE">PAAE</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Grado:</label>
                <select  name="ocupacion" class="form-control" disabled>
                    <option value="Normal" {{$trabajador->puesto}}>{{$trabajador->puesto}}</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">

            <div class="form-group">
                <label class="control-label" >Hora de entrada:</label>
                <input autocomplete="off" disabled name="horaentrada" id="horae" type="text" class="form-control horas {{$errors->has('horaentrada')?'has-error':''}}"  value="{{$trabajador->horaentrada}}" >
                @if($errors->has('horaentrada'))
                    <span class="help-block"> {{$errors->first('horaentrada')}}</span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Hora de salida:</label>
                <input autocomplete="off" disabled id="horas" name="horasalida" type="text" class="form-control hora {{$errors->has('horasalida')?'has-error':''}}"  value="{{$trabajador->horasalida}}" >
                @if($errors->has('horasalida'))
                    <span class="help-block"> {{$errors->first('horasalida')}}</span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Sueldo mensual:</label>
                <input disabled   name="sueldomensual" id="suledomen" type="text" class="form-control number {{$errors->has('sueldomensual')?'has-error':''}}"  value="{{$trabajador->sueldomensual}}" >
                @if($errors->has('sueldomensual'))
                    <span class="help-block"> {{$errors->first('sueldomensual')}}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Teléfono oficina:</label>
                <input disabled  name="telefonooficina" id="" type="text" class="form-control number {{$errors->has('telefonooficina')?'has-error':''}}"  value="{{$trabajador->telefonooficina}}" >
                @if($errors->has('telefonooficina'))
                    <span class="help-block"> {{$errors->first('telefonooficina')}}</span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Extención oficina:</label>
                <input disabled  name="extencionoficina" id="" type="text" class="form-control number {{$errors->has('extencionoficina')?'has-error':''}}"  value="{{$trabajador->extencionoficina}}" >
                @if($errors->has('extencionoficina'))
                    <span class="help-block"> {{$errors->first('extencionoficina')}}</span>
                @endif
            </div>
        </div>

    </div>



</div>


