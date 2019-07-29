@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Lista de Notificaciones <small></small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <ul class="list-unstyled msg_list">
                        @foreach($noti as $n)
                            <li>
                                <a href="{{$n->url}}" style="display: block;width: 100%;">
                                    <span class="image">
                                        <img style="width: 40px;" src="{{asset('/images/logo/_logo-ipn.png')}}" alt="img" />
                                    </span>
                                    <span>
                                        @if($n->tipo == 1)
                                           <span>COCENDI </span>
                                        @else
                                           <span>CENDI </span>
                                        @endif
                                        <span style="right: 55px;" class="time">{{$n->created_at}}</span>
                                    </span>
                                    <span class="message">
                                       {{$n->mensaje}}
                                    </span>
                                </a>
                            </li>

                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection