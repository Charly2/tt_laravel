
@foreach($noti as $n)
<li>
    <a href="{{$n->url}}">
        <span class="image">
            <img src="{{asset('/images/logo/_logo-ipn.png')}}" alt="img" />
        </span>
        <span>
            @if($n->tipo == 1)
                <span>COCENDI </span>
            @else
                <span>CENDI </span>
            @endif
            <span class="time">{{$n->created_at}}</span>
        </span>
        <span class="message">
           {{$n->mensaje}}
        </span>
    </a>
</li>

@endforeach


<li>
    <div class="text-center">
        <a href="{{asset('notificaciones')}}">
            <strong>Ver todas las notificaciones</strong>
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</li>
--jscode--{{sizeof($noti)}}