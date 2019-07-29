<!-- footer content -->
{{--<footer>
    <div class="pull-right">
        <a href="https://colorlib.com">{{config('app.name')}}</a>
    </div>
    <div class="clearfix"></div>
</footer>--}}
<!-- /footer content -->


<script>
    function getNotificaciones() {
        $.get('/notificaciones/get').done(function (data) {
            var noti = data.split('--jscode--');
            $('#menu1').html(noti[0]);
            //alert(noti[1])

            $('#main_noti').html(noti[1]).fadeIn();
        });
    }


    $(document).ready(function (e) {
        getNotificaciones();
    });
</script>