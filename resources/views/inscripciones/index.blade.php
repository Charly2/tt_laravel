@extends('layouts.app')


@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-bars"></i> Lista de Procesos de Inscripción<small></small></h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">


                        @foreach($alumnos as $alumno)
                        <div class="col-md-12 col-sm-12 col-xs-12 profile_details">
                            <div class="well profile_view">
                                <div class="col-sm-12">
                                    <h4 class="brief"><i>Digital Strategist  {{$alumno['id']}}</i></h4>
                                    <div class="left col-xs-7">
                                        <h2>Nicole Pearson</h2>
                                        <p><strong>About: </strong> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-building"></i> Address: </li>
                                            <li><i class="fa fa-phone"></i> Phone #: </li>
                                        </ul>
                                    </div>
                                    <div class="right col-xs-5 text-center">
                                        <img src="images/img.jpg" alt="" class="img-circle img-responsive">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            @include('partials.progressbar')
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 bottom text-center">
                                    <div class="col-xs-12 col-sm-6 emphasis">
                                        <p class="ratings">
                                            <a>4.0</a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                        </p>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 emphasis">
                                        <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                                            </i> <i class="fa fa-comments-o"></i> </button>
                                        <button type="button" class="btn btn-primary btn-xs">
                                            <i class="fa fa-user"> </i> View Profile
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>










@endsection