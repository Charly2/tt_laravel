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
                                @for($i=0;$i<count($si);$i++)
                                    <li class="itemComp col-md-6 " data-id="{{$a[$i]->id}}">
                                        <a>
                                    <span class="image">
                                      <img src="{{asset('perfil/img_'.$a[$i]->getPhoto().'.jpg')}}" alt="img" />
                                    </span>
                                            <span>
                                      <span style="text-transform: uppercase;">{{$a[$i]->id}}-{{$a[$i]->getNombreAlumno()}} </span>
                                      <span class="time">{{$si[$i]->result}}</span>
                                    </span>
                                        <span class="message">
                                          Información sobre el alumno
                                        </span>
                                        </a>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h4 class="text-center">Sin asignar</h4>
                            <ul class="list-unstyled msg_list" id="sinasignar">
                                @for($i=0;$i<count($no);$i++)
                                    <li class="itemComp col-md-6" data-id="{{$b[$i]->id}}">
                                        <a>
                                    <span class="image">
                                      <img src="{{asset('perfil/img_'.$b[$i]->getPhoto().'.jpg')}}" alt="img" />
                                    </span>
                                            <span>
                                      <span style="text-transform: uppercase;">{{$b[$i]->id}}-{{$b[$i]->getNombreAlumno()}} </span>
                                      <span class="time">{{$no[$i]->result}}</span>
                                    </span>
                                            <span class="message">
                                          Información sobre el alumno
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




    <script src="https://raw.githack.com/SortableJS/Sortable/master/Sortable.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.3/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.3/dist/sweetalert2.min.css">

    <script>


        $('.bbt').click(function () {
            $asi = [];
            $('#asigandos > li.itemComp').each(function (e,i) {
                $asi.push($(this).data('id'));
            });





            $.get('{{url('/asigna_uno/actualiza')}}',{
                'data':$asi,
                'id':{{$id}},
            }).done(function (data) {
                console.log(data);

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
