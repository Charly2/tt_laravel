



<div class="row top_tiles">
    <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <a href="{{url('/verificapreregistro/')}}">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-list-ul @if($itemactive==1) poli @endif"></i></div>
                <div class="count">{{$totales[0]}}</div>
                <h3 class="dark">Pendientes</h3>
            </div>
        </a>
    </div>
    <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <a href="{{url('/verificapreregistro/cancelados')}}">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-close @if($itemactive==3) red @endif"></i></div>
                <div class="count">{{$totales[2]}}</div>
                <h3 class="dark">Cancelados</h3>
            </div>
        </a>
    </div>
    <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <a href="{{asset('/verificapreregistro/aprobados')}}">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-check @if($itemactive==2) green @endif"></i></div>
                <div class="count">{{$totales[1]}}</div>
                <h3 class="dark">Aprobados</h3>
            </div>
        </a>
    </div>
</div>