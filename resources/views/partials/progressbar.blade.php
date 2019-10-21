<div class="progrsbar_custom">
    <h4 class="text-center mb-0">Estado Actual </h4>
    <div class="main_container_pb">

        <div class="continer_pb prog_{{$alumno['id']}}">
            <div class="circle_pb ok letft">
                <span class="glyphicon glyphicon-ok"></span>
            </div>
            <div class="item_pb  ">
                <div class="pb_item "></div>
                <div class="pb_item_bar "></div>
                <div class="circle_pb ">
                    <span class="glyphicon glyphicon-ok"></span>
                </div>
            </div>
            <div class="item_pb ">
                <div class="pb_item "></div>
                <div class="pb_item_bar"></div>
                <div class="circle_pb ">
                    <span class="glyphicon glyphicon-ok"></span>
                </div>
            </div>
            <div class="item_pb ">
                <div class="pb_item "></div>
                <div class="pb_item_bar"></div>
                <div class="circle_pb ">
                    <span class="glyphicon glyphicon-remove"></span>
                </div>
            </div>
            <div class="item_pb ">
                <div class="pb_item "></div>
                <div class="pb_item_bar"></div>
                <div class="circle_pb  anima">
                    <span class="glyphicon glyphicon-refresh"></span>
                </div>
            </div>
            <div class="item_pb">
                <div class="pb_item"></div>
                <div class="pb_item_bar"></div>
                <div class="circle_pb">
                    <span class="glyphicon glyphicon-ok"></span>
                </div>
            </div>
        </div>
        <div class="main_cont_text">
            <div class="main_cont_text_item">
                <h5>Validación Completa</h5>
            </div>
            <div class="main_cont_text_item">
                <h5>En espera de asignación</h5>
            </div>
            <div class="main_cont_text_item">
                <h5>Cendi Asignado</h5>
            </div>
            <div class="main_cont_text_item">
                <h5>Paso 4</h5>
            </div>
            <div class="main_cont_text_item">
                <h5>Paso 5</h5>
            </div>
        </div>
    </div>


</div>


<script>
    var cont_{{$alumno['id']}} = 0;
    var items_{{$alumno['id']}} = {{$alumno['estado']}} ;
    var $inter_{{$alumno['id']}};
    $(document).ready(function (e) {
        $inter_{{$alumno['id']}} = setInterval(contador_{{$alumno['id']}},1000)
    });


    function contador_{{$alumno['id']}}(){
        if (cont_{{$alumno['id']}} < items_{{$alumno['id']}}){
            $(".prog_{{$alumno['id']}} .item_pb:nth("+cont_{{$alumno['id']}}+")").addClass('ok');
            cont_{{$alumno['id']}}++
        }else{
            clearInterval($inter_{{$alumno['id']}});

        }

    }
</script>