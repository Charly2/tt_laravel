



<form role="form" action="{{url('/completeinformacion_general')}}" style="padding: 5px 0 " method="post">
    {{ csrf_field() }}
    <h4 >Datos generales del trabajador</h4>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Nombre:</label>
                <input type="text" class="form-control " value="{{$persona_t->nombre}}" disabled>

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Apellido paterno:</label>
                <input type="text" class="form-control "  value="{{$persona_t->appaterno}}" disabled>

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Apellido paterno:</label>
                <input type="text" class="form-control "  value="{{$persona_t->apmaterno}}" disabled>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Número de empleado:</label>
                <input type="text" class="form-control " value="{{$trabajador->numtrabajador}}" disabled>

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Lugar de nacimiento:</label>
                <input type="text" class="form-control "  value="{{$persona_t->lugarnac}}" disabled>

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Estado Civil:</label>
                <input type="text" class="form-control "  value="{{$persona_t->fechanac}}" disabled>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >CURP:</label>
                <input type="text" class="form-control " value="{{$persona_t->curp}}" disabled>

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Género:</label>
                <input type="text" class="form-control "  value="{{$persona_t->genero}}" disabled>

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Estado Civil:</label>
                <input type="text" class="form-control "  value="{{$persona_t->estadocivil}}" disabled>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Grupo sanguíneo*:</label>
                <select  name="gruposan" class="form-control" disabled>
                        <option value="{{ $persona_t->gruposan }}">{{ $persona_t->gruposan }}</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Email:</label>
                <input type="text" class="form-control " value="{{$persona_t->email}}" disabled>

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Teléfono fijo*:</label>
                <input name="telefono_fijo"  disabled type="text" class="form-control {{$errors->has('telefono_fijo')?'has-error':''}}"  value="{{$persona_t->telefono_fijo}}" >

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Teléfono celular:</label>
                <input name="telefono_cel" disabled type="text" class="form-control {{$errors->has('telefono_cel')?'has-error':''}}"  value="{{$persona_t->telefono_cel}}" >

            </div>
        </div>
    </div>



</form>
