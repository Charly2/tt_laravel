@extends('layouts.app')
@section('title','')


@section('content')

 {{--   <img src="{{asset('/images/403.svg')}}" alt="">
<h1 class="text-center">No tienes acceso para ver este proceso</h1>

--}}


    <div class="containera">
        <div class="forbidden-sign"></div>
        <h1>El acceso a esta página está restringido.</h1>
        <p>No tienes acceso para ver este proceso.</p>
    </div>
@endsection


<style>
    /* sorry for the scrambled mess */
    @import url("https://fonts.googleapis.com/css?family=Montserrat:400,400i,700");

    .containera {

        background: white;
        height: auto;
        width: 75%;
        margin:10em auto;
        padding: 1.5rem;
        box-shadow: 0px 3px 15px rgba(0, 0, 0, 0.2);
        border-radius: 0.5rem;
        text-align: center;
    }
    .containera h1 {
        font-size: 3.25rem;
        margin: 0;
        margin-top: 1rem;
        color: #263238;
        opacity: 0;
        -webkit-transform: translateX(-0.1rem);
        transform: translateX(-0.1rem);
        -webkit-animation: fadeIn 1s forwards 1.5s;
        animation: fadeIn 1s forwards 1.5s;
    }
    .containera p {
        margin: 0;
        margin-top: 0.5rem;
        color: #546e7a;
        font-size: 1.5rem;
        opacity: 0;
        -webkit-transform: translateX(-0.1rem);
        transform: translateX(-0.1rem);
        -webkit-animation: fadeIn 1s forwards 1.75s;
        animation: fadeIn 1s forwards 1.75s;
    }

    @media screen and (max-width: 768px) {
        .containera {
            width: 50vw;
        }
    }
    @media screen and (max-width: 600px) {
        .containera {
            width: 60vw;
        }
    }
    @media screen and (max-width: 500px) {
        .containera {
            width: 80vw;
        }
    }
    @-webkit-keyframes fadeIn {
        from {
            -webkit-transform: translateY(1rem);
            transform: translateY(1rem);
            opacity: 0;
        }
        to {
            -webkit-transform: translateY(0rem);
            transform: translateY(0rem);
            opacity: 1;
        }
    }
    @keyframes fadeIn {
        from {
            -webkit-transform: translateY(1rem);
            transform: translateY(1rem);
            opacity: 0;
        }
        to {
            -webkit-transform: translateY(0rem);
            transform: translateY(0rem);
            opacity: 1;
        }
    }
    .forbidden-sign {
        margin: auto;
        width: 8rem;
        height: 8rem;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #ef5350;
        -webkit-animation: grow 1s forwards;
        animation: grow 1s forwards;
    }

    @-webkit-keyframes grow {
        from {
            -webkit-transform: scale(1);
            transform: scale(1);
        }
        to {
            -webkit-transform: scale(1);
            transform: scale(1);
        }
    }

    @keyframes grow {
        from {
            -webkit-transform: scale(1);
            transform: scale(1);
        }
        to {
            -webkit-transform: scale(1);
            transform: scale(1);
        }
    }
    .forbidden-sign::before {
        position: absolute;
        background-color: white;
        border-radius: 50%;
        content: "";
        width: 6.4rem;
        height: 6.5rem;
        -webkit-transform: scale(0);
        transform: scale(0);
        -webkit-animation: grow2 0.5s forwards 0.5s;
        animation: grow2 0.5s forwards 0.5s;
    }

    @-webkit-keyframes grow2 {
        from {
            -webkit-transform: scale(0);
            transform: scale(0);
        }
        to {
            -webkit-transform: scale(1);
            transform: scale(1);
        }
    }

    @keyframes grow2 {
        from {
            -webkit-transform: scale(0);
            transform: scale(0);
        }
        to {
            -webkit-transform: scale(1);
            transform: scale(1);
        }
    }
    /* slash */
    .forbidden-sign::after {
        content: "";
        z-index: 2;
        position: absolute;
        width: 8rem;
        height: 0.7rem;
        -webkit-transform: scaley(0) rotateZ(0deg);
        transform: scaley(0) rotateZ(0deg);
        background: #ef5350;
        -webkit-animation: grow3 0.5s forwards 1s;
        animation: grow3 0.5s forwards 1s;
    }

    @-webkit-keyframes grow3 {
        from {
            -webkit-transform: scaley(0) rotateZ(0deg);
            transform: scaley(0) rotateZ(0deg);
        }
        to {
            -webkit-transform: scaley(1) rotateZ(-45deg);
            transform: scaley(1) rotateZ(-45deg);
        }
    }

    @keyframes grow3 {
        from {
            -webkit-transform: scaley(0) rotateZ(0deg);
            transform: scaley(0) rotateZ(0deg);
        }
        to {
            -webkit-transform: scaley(1) rotateZ(-45deg);
            transform: scaley(1) rotateZ(-45deg);
        }
    }

</style>