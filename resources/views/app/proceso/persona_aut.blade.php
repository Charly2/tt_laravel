



<form role="form" action="{{url('/completeinformacion_general')}}" style="padding: 5px 0 " method="post">
    {{ csrf_field() }}
    <h4 >Datos generales persona autorizada</h4>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Nombre:</label>
                <input type="text" class="form-control " value="{{$persona_aut->nombre}}" disabled>

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Apellido paterno:</label>
                <input type="text" class="form-control "  value="{{$persona_aut->appaterno}}" disabled>

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Apellido paterno:</label>
                <input type="text" class="form-control "  value="{{$persona_aut->apmaterno}}" disabled>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Grupo sanguíneo*:</label>
                <select  name="gruposan" class="form-control" disabled>
                    <option value="{{ $persona_a->gruposan }}">{{ $persona_aut->gruposan }}</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Lugar de nacimiento:</label>
                <input type="text" class="form-control "  value="{{$persona_aut->lugarnac}}" disabled>

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Estado Civil:</label>
                <input type="text" class="form-control "  value="{{$persona_aut->fechanac}}" disabled>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >CURP:</label>
                <input type="text" class="form-control " value="{{$persona_aut->curp}}" disabled>

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Género:</label>
                <input type="text" class="form-control "  value="{{$persona_aut->genero}}" disabled>

            </div>
        </div>

    </div>


    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Email:</label>
                <input type="text" class="form-control " value="{{$persona_aut->email}}" disabled>

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Teléfono fijo*:</label>
                <input name="telefono_fijo"  disabled type="text" class="form-control {{$errors->has('telefono_fijo')?'has-error':''}}"  value="{{$persona_aut->telefono_fijo}}" >

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Teléfono celular:</label>
                <input name="telefono_cel" disabled type="text" class="form-control {{$errors->has('telefono_cel')?'has-error':''}}"  value="{{$persona_aut->telefono_cel}}" >

            </div>
        </div>
    </div>




</form>
