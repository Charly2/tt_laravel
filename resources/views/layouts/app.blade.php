<!DOCTYPE html>
<html lang="en">
@include('partials._head')

<body class="nav-md" >
<div class="container body">

    <div class="main_container">

    {{--top nav--}}
    @include('partials._sidenav')
    {{--/topnav--}}

    <!-- top navigation -->
    @include('partials._topnav')
    <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main" >
            <div class="page-title">
                <div class="title_left">
                    <h3>@yield('title')</h3>
                </div>


            </div>
            <div class="clearfix"></div>
            <div class="data-pjax">
                @yield('content')

            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
    @include('partials._footer')
    <!-- /footer content -->
    </div>
</div>



<script src="{{asset('js/_app.js')}}"></script>
<link href="{{asset('css/datepicker.min.css')}}" rel="stylesheet" type="text/css">
<script src="{{asset('js/datepicker.min.js')}}"></script>
@include('partials._notification')
@stack('scripts')


</body>
</html>