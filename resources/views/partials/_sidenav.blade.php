<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{url('/')}}" class="site_title">
                <img src="{{asset('images/logo/logo_header.png')}}" alt="">
            </a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="/images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span style="line-height: 1.8">{{Auth::user()->getTitleOfRole()}},</span>
                <h2>{{ Auth::user()->name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />
        <br />
        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li>
                        <a href="{{url('/verificapreregistro')}}"><i class="fa fa-check"></i> Valida Preregistro</a>
                    </li>
                    <li>
                        <a href="{{url('/validadocumentos')}}"><i class="fa fa-list-alt "></i> Valida Documentos</a>
                    </li>
                    <li>
                        <a href="{{url('/inscripciones_cendi')}}"><i class="fa fa-list-ul  "></i> Lista de Procesos</a>
                    </li>
                    <li>
                        <a><i class="fa fa-cogs"></i>Inscripciones <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{url('/inscripciones')}}">Listar procesos</a></li>
                            <li><a href="{{url('/procesoinscripcion')}}">Iniciar proceso</a></li>
                        </ul>
                    </li>
                    <li>
                        <a><i class="fa fa-refresh"></i>Reinscripciones <span class="fa fa-chevron-down "></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Registrar Menor</a></li>
                            <li><a href="#">Listar </a></li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        @include('partials._sidenav_footer')
    </div>
</div>