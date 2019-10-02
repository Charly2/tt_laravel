



<form role="form" action="{{url('/completeinformacion_general')}}" style="padding: 5px 0 " method="post">
    {{ csrf_field() }}
    <h4 >Datos generales del trabajador</h4>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Nombre:</label>
                <input type="text" class="form-control " value="{{$persona_a->nombre}}" disabled>

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Apellido paterno:</label>
                <input type="text" class="form-control "  value="{{$persona_a->appaterno}}" disabled>

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Apellido paterno:</label>
                <input type="text" class="form-control "  value="{{$persona_a->apmaterno}}" disabled>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Grupo sanguíneo*:</label>
                <select  name="gruposan" class="form-control" disabled>
                    <option value="{{ $persona_a->gruposan }}">{{ $persona_a->gruposan }}</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Lugar de nacimiento:</label>
                <input type="text" class="form-control "  value="{{$persona_a->lugarnac}}" disabled>

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Estado Civil:</label>
                <input type="text" class="form-control "  value="{{$persona_a->fechanac}}" disabled>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >CURP:</label>
                <input type="text" class="form-control " value="{{$persona_a->curp}}" disabled>

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" >Género:</label>
                <input type="text" class="form-control "  value="{{$persona_a->genero}}" disabled>

            </div>
        </div>

    </div>





</form>
