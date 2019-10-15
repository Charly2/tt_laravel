@extends('layouts.app')


@section('content')

    <style>
        .itemComp:hover{
            cursor: move;
        }
        body{
            background: #f7f7f7;
        }

        #sinasignar{
            height: 75vh;
            overflow-y: scroll;
        }
        .bbt    {
            position: absolute;
            right: 16px;
            top: 12px;
            width: 270px;
        }
    </style>










    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title position-relative">
                <h2>Grapo A Cendi Jose Lopez  <small>{{$num}} Lugares</small></h2>
                <div class="clearfix"></div>
                <button class="btn btn-primary bbt "><span class="fa fa-check"></span> Finalizar asignación</button>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="text-center">Asignados</h4>
                            <ul class="list-unstyled msg_list" id="asigandos">
                                @foreach($si as $s)
                                    <li class="itemComp col-md-6">
                                        <a>
                                    <span class="image">
                                      <img src="{{asset('images/img.jpg')}}" alt="img" />
                                    </span>
                                            <span>
                                      <span>Nombre del Alumno con el proceso num {{$s->proceso}} </span>
                                      <span class="time">{{$s->result}}</span>
                                    </span>
                                        <span class="message">
                                          Información sobre el alumno
                                        </span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h4 class="text-center">Sin asignar</h4>
                            <ul class="list-unstyled msg_list" id="sinasignar">
                                @foreach($no as $s)
                                    <li class="itemComp col-md-6">
                                        <a>
                                    <span class="image">
                                      <img src="{{asset('images/img.jpg')}}" alt="img" />
                                    </span>
                                            <span>
                                      <span>Nombre del Alumno con el proceso num {{$s->proceso}} </span>
                                      <span class="time">{{$s->result}}</span>
                                    </span>
                                            <span class="message">
                                          Información sobre el alumno
                                        </span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>




    <script src="https://raw.githack.com/SortableJS/Sortable/master/Sortable.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.3/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.3/dist/sweetalert2.min.css">

    <script>


        $('.bbt').click(function () {
            Swal.fire({
                title: '¿Estás seguro? ',
                text: "Una vez que finalices la asignación no podrás hacer cambios",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#6b2848',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, finalizar',
                cancelButtonText:'Cancelar'
            }).then((result) => {
                if (result.value) {
                    new PNotify({
                        title: 'Perfecto',
                        text: 'Se finalizo correctamente',
                        type: 'success',
                        styling: 'bootstrap3'
                    });
                    setTimeout(function () {
                        window.location.href = "/asigna_uno";
                    },3000)

                }
            })
        });




        Sortable.create(sinasignar, {
            animation: 200,
            group: {
                name: "shared",
                pull: function (to,from) {
                    return (to.el.children.length)<{{$num}};
                },
            },
            onChange: function(/**Event*/evt) {
            },
            sort: true
        });

        Sortable.create(asigandos, {
            group: "shared",
            sort: false,
            onChange: function(/**Event*/evt) {
            }
        });


    </script>


@endsection
