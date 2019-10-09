@extends('layouts.app')


@section('content')

    <style>
        .itemComp:hover{
            cursor: move;
        }
        body{
            background: #f7f7f7;
        }
    </style>









    @for($j=1;$j<3;$j++)
    <div class="col-md-6">
        <div class="x_panel">
            <div class="x_title">
                <h2>Grapo A Cendi Jose Lopez {{$j}} <small>4 Lugares</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="text-center">Asignados</h4>
                            <ul class="list-unstyled msg_list" id="asigandos{{$j}}">
                                @for ($i= 0;$i<3;$i++)
                                    <li class="itemComp col-md-6">
                                        <a>
                                    <span class="image">
                                      <img src="images/img.jpg" alt="img" />
                                    </span>
                                            <span>
                                      <span>John Smith {{$i+1}}</span>
                                      <span class="time">3 mins ago</span>
                                    </span>
                                            <span class="message">
                                      Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that
                                    </span>
                                        </a>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h4 class="text-center">Sin asignar</h4>
                            <ul class="list-unstyled msg_list" id="sinasignar{{$j}}">
                                @for ($i= 0;$i<4;$i++)
                                    <li class="itemComp col-md-6">
                                        <a>
                                    <span class="image">
                                      <img src="images/img.jpg" alt="img" />
                                    </span>
                                            <span>
                                      <span>John Smith {{($i+1)*5}}</span>
                                      <span class="time">3 mins ago</span>
                                    </span>
                                            <span class="message">
                                      Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that
                                    </span>
                                        </a>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    @endfor



    <script src="https://raw.githack.com/SortableJS/Sortable/master/Sortable.js"></script>

    <script>


        @for($j=1;$j<3;$j++)
        Sortable.create(sinasignar{{$j}}, {
            animation: 200,
            group: {
                name: "shared",
                pull: function (to,from) {
                    return (to.el.children.length)<3;
                },
            },
            onChange: function(/**Event*/evt) {
            },
            sort: true
        });

        Sortable.create(asigandos{{$j}}, {
            group: "shared",
            sort: false,
            onChange: function(/**Event*/evt) {
            }
        });

        @endfor
    </script>


@endsection
