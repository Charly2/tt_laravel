<nav class="nav-gob ">
    <dgm-navbar></dgm-navbar>
</nav>


<div class="headerLN">
    <div class=" ipnLogo-enlace">
        <a href="index" class="linklandinipn">
            <p class="ipn-logo">
                <img src="{{asset('images/logo/logo-ipn.png')}}" class="img-fluid" alt="Logotipo del Instituto Politécnico Nacional">
            </p>
            <p class="ipnLogo-slogan">
                <span class="u-fw600">Sistema para la Gestión de los Procesos de </span><br>
                <span class="slogan">Inscripción y Reinscripción de COCENDI</span>
            </p>
        </a>
    </div>
</div>

<nav class="navbar navbar-inverse navbar-embossed navbar-expand-lg " role="navigation" id="navin_1">
    <a class="navbar-brand" href="index">
        <img src="{{asset('images/logo/logo_header.png')}}" class="logo_h"  alt="">
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-01"></button>
    <div class="collapse navbar-collapse" id="navbar-collapse-01">
        <ul class="nav navbar-nav mr-auto">
            <li><a href="{{ route('index.index') }}" >Inicio</a></li>
            <li><a >¿Quiénes somos?</a></li>
            <li><a href="{{ route('index.requisitos') }}">Requisitos de Inscripción</a></li>
            <li><a href="{{ route('index.preregistro') }}">Prerregistro</a></li>
        </ul>

        <div class="navbar-form form-inline my-2 my-lg-0">
            <ul class="nav navbar-nav mr-auto">
                <li><a href="{{url('/login')}}" >Login</a></li>
            </ul>
        </div>
    </div><!-- /.navbar-collapse -->
</nav><!-- /navbar -->
