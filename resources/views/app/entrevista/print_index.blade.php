@extends('layouts.app')


@section('content')






    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-arrow-right "></i>   <small>Entrevista Médica</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div action="{{url('/entrevista_llena_post')}}" method="post">


                    @include('app.proceso._menor')


                    <table class="table table-striped">

                        <thead>
                        <tr>

                            <th>Pregunta</th>
                            <th>Respuesta</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($preguntas as $pregunta)
                            <tr>
                                <td width="50%" > {{$pregunta->txt}}</td>
                                <td width="50%" >{{$pregunta->resp}}</td>
                            </tr>



                        @endforeach

                        </tbody>
                    </table>










                    </div>




                </div>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function () {

        });
    </script>


@endsection