
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
    }
    .ok .circle_pb span,.circle_pb.ok span{
        display: block;
    }

    .circle_pb span{
        display: none;
    }

    .ok .pb_item:before{
        content: "";
        position: absolute;
        width: 100%;
        left: 0;
        top: 21px;
        background: #682444fa;
        height: 9px;

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
</style>


<div class="progrsbar_custom">
<h4 class="text-center mb-0">Estado Actual</h4>
<div class="main_container_pb">
    <div class="circle_pb ok letft">
        <span class="glyphicon glyphicon-ok"></span>
    </div>
    <div class="continer_pb">
        <div class="item_pb ok ">
            <div class="pb_item "></div>
            <div class="circle_pb ">
                <span class="glyphicon glyphicon-ok"></span>
            </div>
        </div>
        <div class="item_pb ok">
            <div class="pb_item "></div>
            <div class="circle_pb ">
                <span class="glyphicon glyphicon-ok"></span>
            </div>
        </div>
        <div class="item_pb ok">
            <div class="pb_item "></div>
            <div class="circle_pb ">
                <span class="glyphicon glyphicon-remove"></span>
            </div>
        </div>
        <div class="item_pb ok">
            <div class="pb_item "></div>
            <div class="circle_pb  anima">
                <span class="glyphicon glyphicon-refresh"></span>
            </div>
        </div>
        <div class="item_pb">
            <div class="pb_item"></div>
            <div class="circle_pb">
                <span class="glyphicon glyphicon-ok"></span>
            </div>
        </div>
    </div>
</div>


</div>