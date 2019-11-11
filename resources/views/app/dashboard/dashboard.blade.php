@extends('layouts.app')


@section('content')



    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_content">

                    <div class="row">

                        <div class="col-md-6 col-sm-6 col-xs-12 profile_left">
                            <h2 class="text-center">Bienvenido</h2>
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <img style="width: 200px;;border-radius: 50%;margin: auto" class="img-responsive avatar-view" src="{{'/perfil/'.'img_'.Auth::user()->id.'.jpg'}}" alt="Avatar" title="Change the avatar">
                                </div>
                            </div>
                            <h3 class="text-center">{{ Auth::user()->name }}</h3>

                            <ul class="list-unstyled user_data">


                                <li class="text-center">
                                    <i class="fa fa-briefcase user-profile-icon text-center"></i> {{Auth::user()->getTitleOfRole()}}
                                </li>

                            </ul>


                            <br />

                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2 style="font-size: 1.2em">Notificaciones <small></small></h2>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <img id="loadis" style="margin: auto;display: block" src="{{asset('images/loa.gif')}}" alt="">
                                            <ul class="list-unstyled msg_list ntt">

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row" style="margin-top: 30px">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            @include('partials.progressbar')
                        </div>

                    </div>



                </div>
            </div>
        </div>
    </div>


    <script>

        $(document).ready(function () {
            $.get('/notificaciones/get').done(function (data) {
                var noti = data.split('--jscode--');
                $('#loadis').fadeOut(null,function () {
                    $('.ntt').html(noti[0]);
                });

                //alert(noti[1])

                //$('#main_noti').html(noti[1]).fadeIn();
            });
        });

    </script>

@endsection
