
<style>
    @-webkit-keyframes active-spin {
        from {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        to {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }
    @keyframes active-spin {
        from {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        to {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }
    .continer_pb{
        margin: auto;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .main_container_pb{
        position: relative;
        display: flex;
        align-items: center;
        flex-wrap: wrap;
    }
    .main_container_pb .main_cont_text,.main_container_pb .continer_pb{
        width: 100%;
        display: flex;
    }
    .item_pb{
        flex: 1;
        height: 50px;
        /*border: 1px solid white;*/
        box-sizing: content-box;
        align-items: center;
        display: flex;
        justify-content: center;
        position: relative;
    }
    .circle_pb{
        width: 32px;
        height: 32px;
        background: #E4E4E7;
        position: absolute;
        right: -16px;
        border-radius: 50%;
        z-index: 200;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .ok .circle_pb:before,.circle_pb.ok:before{
        content: "";
        position: absolute;
        width: 22px;
        background: #682444fa;
        left: 5px;
        top: 5px;
        height: 22px;
        border-radius: 50%;
        opacity: 0;
        transition-property:all;
        transition-duration:3s;
        transition-delay:3s;
        transition-timing-function: linear;
        -webkit-transition-property:all;
        -webkit-transition-duration:3s;
        -webkit-transition-delay:3s;
        -webkit-transition-timing-function: linear;
    }

    .ok .circle_pb:before,.circle_pb.ok:before{
        opacity: 1;
        transition-property:all;
        transition-duration:3s;
        transition-delay:3s;
        transition-timing-function: linear;
        -webkit-transition-property:all;
        -webkit-transition-duration:3s;
        -webkit-transition-delay:3s;
        -webkit-transition-timing-function: linear;
    }
    .ok .circle_pb span,.circle_pb.ok span{
        display: block;
    }

    .circle_pb span{
        display: none;
    }


    .pb_item_bar{
        width: 0;
        transition: all 1s;
    }
    .ok .pb_item_bar{
        content: "";
        position: absolute;
        width: 100%;
        left: 0;
        top: 21px;
        background: #682444fa;
        height: 9px;
        z-index: 100;
        transition: all 1s;


    }




    .pb_item{
        background: #E4E4E7;
        width: 100%;
        height: 15px;
        z-index: 100;
    }

    .anima span{
        -webkit-animation: active-spin infinite 1s linear;
        animation: active-spin infinite 1s linear;
    }
    .circle_pb .glyphicon{
        top: 0;
        color: white;

    }

    .letft{
        left: -11px!important;
    }


    .progrsbar_custom{
        width: 80%;
        margin: auto;
    }
    .mb-0{
        margin-bottom: 0;
    }

    .ok .pb_item:before{

    }

    .main_cont_text_item{
        flex: 1;
    }

    .main_cont_text_item h5{
        font-weight: bold;
        text-align: center;
        margin-top: 0;
    }
</style>


<div class="progrsbar_custom">
<h4 class="text-center mb-0">Estado Actual</h4>
<div class="main_container_pb">

    <div class="continer_pb">
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
            <h5>Paso 1</h5>
            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium aut consequatur.</p>--}}
        </div>
        <div class="main_cont_text_item">
            <h5>Paso 2</h5>
            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium aut consequatur.</p>--}}
        </div>
        <div class="main_cont_text_item">
            <h5>Paso 3</h5>
            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium aut consequatur.</p>--}}
        </div>
        <div class="main_cont_text_item">
            <h5>Paso 4</h5>
            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium aut consequatur.</p>--}}
        </div>
        <div class="main_cont_text_item">
            <h5>Paso 5</h5>
            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium aut consequatur.</p>--}}
        </div>
    </div>
</div>


</div>


<script>
    var cont = 0;
    var items =4 ;
    var $inter;
    $(document).ready(function (e) {
        $inter = setInterval(contador,1000)
    });


    function contador(){
        if (cont < items){
            $('.item_pb:nth('+cont+')').addClass('ok');
            cont++
        }else{
            clearInterval($inter);
        }

    }


    function limpialoader() {
        cont = 0;
        $('.item_pb').each(function (e,t){
            $(this).removeClass('ok')
        });
    }
</script>