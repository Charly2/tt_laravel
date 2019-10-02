@extends('layouts.app')

@section('content')

    <style>


        .tabs {
            height: 50px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);

            border-bottom: 2px solid #b1b3b7;
        }

        .tab:nth-child(1):not(.active){
            border-right: 2px solid #b1b3b7;
        }

        .tab:nth-child(2):not(.active){
            border-right: 2px solid #b1b3b7;
        }

        .tab {
            width: 100%;
            color: #2f4256;
            position: relative;
            z-index: 5;
            cursor: pointer;
            padding: 0px 30px;
            background: #E6E9ED;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0.9;
            transition: 0.3s ease-in-out;
            font-size: 18px;
            text-align: center;
        }
        .tab.active {
            background: #692545;
            color: white;
            opacity: 1;
        }
        .tab figure {
            margin: 0;
            margin-right: 10px;
            width: 15px;
            height: 15px;
            background: #84c2ff;
            border-radius: 50%;
        }
        .tab .text {
            flex: 1;
            text-align: center;
            height: 5px;
            background: #84c2ff;
            border-radius: 10px;
        }

        .content-wrapper {
            background: white;
            width: 100%;
            padding: 30px;
            display: grid;
            grid-template-columns: 1fr;
            grid-template-rows: 1fr;
        }

        .content {
            width: 100%;
            grid-row: 1/-1;
            grid-column: 1/-1;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            -webkit-transform: translateX(-20px);
            transform: translateX(-20px);
            transition: 0.3s ease-in-out;
        }
        .content:nth-child(1) .text:nth-child(3) {
            width: 90%;
        }
        .content:nth-child(1) .text:nth-child(4) {
            width: 60%;
        }
        .content:nth-child(2) .text:nth-child(3) {
            width: 80%;
        }
        .content:nth-child(2) .text:nth-child(4) {
            width: 50%;
        }
        .content:nth-child(3) .text:nth-child(4) {
            width: 70%;
        }
        .content.active {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
            -webkit-transform: translateX(0px);
            transform: translateX(0px);
        }
        .content .title {
            width: 30%;
            margin-bottom: 20px;
            height: 20px;
            background: #51a9ff;
            border-radius: 20px;
        }
        .content .text {
            width: 100%;
            height: 5px;
            background: #84c2ff;
            border-radius: 10px;
            margin-bottom: 10px;
        }
        .content .text:last-child {
            width: 40%;
            margin-bottom: 0px;
        }

    </style>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">

        <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa fa-bars"></i> Proceso de inscripción <small></small></h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                @include('partials.progressbar')



                <div class="wrapper" style="margin-top: 25px">
                    <div class="tabs">
                        <div class="tab active">
                            Trabajador
                        </div>
                        <div class="tab">
                            Alumno
                        </div>
                        <div class="tab">
                            Persona Autorizada
                        </div>
                    </div>
                    <div class="content-wrapper">
                        <div class="content active">
                            @include('app.proceso.trabajador_persona')
                            @include('app.proceso.trabajador')
                            @include('app.proceso.persona_dir')
                        </div>
                        <div class="content">

                            @include('app.proceso.menor')
                        </div>
                        <div class="content">
                            @include('app.proceso.persona_aut')
                            @include('app.proceso.persona_dir_aut')
                        </div>
                    </div>
                </div>









            </div>
        </div>
    </div>
</div>



<style>
    input,select{
        background: white!important;
    }
</style>

    <script>
        $(document).ready(function() {
            $('.tab').on('click', function() {
                const $this = $(this);
                const index = $this.index();

                $('.tab').removeClass('active');
                $this.addClass('active');
                $('.content').removeClass('active');
                $('.content').eq(index).addClass('active');

            });
        })
    </script>

@endsection

