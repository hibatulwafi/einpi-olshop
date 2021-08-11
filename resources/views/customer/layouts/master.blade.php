<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel='icon' href='{{asset('/img/'.\Setting::getSetting()->favicon)}}' type='image/x-icon' />
    <link rel="stylesheet" href="{{ asset('/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/toastr.min.css') }}">
    @yield('css')

</head>

<body>
    <!--====== Preloader Area Start ======-->
    <div id="netstorm-preloader" class="netstorm-preloader">
        <!-- Preloader Animation -->
        <div class="preloader-animation">
            <!-- Spinner -->
            <div class="spinner"></div>
            <p class="fw-5 text-center text-uppercase">Loading</p>
        </div>
        <!-- Loader Animation -->
        <div class="loader-animation">
            <div class="row h-100">
                <!-- Single Loader -->
                <div class="col-3 single-loader p-0">
                    <div class="loader-bg"></div>
                </div>
                <!-- Single Loader -->
                <div class="col-3 single-loader p-0">
                    <div class="loader-bg"></div>
                </div>
                <!-- Single Loader -->
                <div class="col-3 single-loader p-0">
                    <div class="loader-bg"></div>
                </div>
                <!-- Single Loader -->
                <div class="col-3 single-loader p-0">
                    <div class="loader-bg"></div>
                </div>
            </div>
        </div>
    </div>
    <!--====== Preloader Area End ======-->

    <div class="main">
 
        @include('customer.layouts.header')

        @yield('content')

        @include('customer.layouts.footer')


        <!--====== Modal Search Area Start ======-->
        <div id="search" class="modal fade p-0">
            <div class="modal-dialog dialog-animated">
                <div class="modal-content h-100">
                    <div class="modal-header" data-dismiss="modal">
                        Search <i class="far fa-times-circle icon-close"></i>
                    </div>
                    <div class="modal-body">
                            <div class="col-12 align-self-center">
                                <div class="row">
                                    <div class="col-12 pb-3">
                                        <h2 class="search-title mt-0 mb-3">Apa Yang Kamu Cari?</h2>
                                        <p>Silahkan masukan kata kunci *<i>E.G Hoodie.</i></p>
                                    </div>
                                </div>
                            <form action="{{route('ui.product')}}" method="GET" >
                            @csrf
                                <div class="row">
                                    <div class="col-12 input-group mt-4">
                                        <input type="text" name="search" placeholder="Masukan Kata Kunci">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 input-group align-self-center">
                                        <button type="submit" class="btn btn-bordered-white mt-3" style="color:black;">Cari</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== Modal Search Area End ======-->

        <!--====== Modal Responsive Menu Area Start ======-->
        <div id="menu" class="modal fade p-0">
            <div class="modal-dialog dialog-animated">
                <div class="modal-content h-100">
                    <div class="modal-header" data-dismiss="modal">
                        Menu <i class="far fa-times-circle icon-close"></i>
                    </div>
                    <div class="menu modal-body">
                        <div class="row w-100">
                            <div class="items p-0 col-12 text-center"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== Modal Responsive Menu Area End ======-->

        <!--====== Scroll To Top Area Start ======-->
        <div id="scroll-to-top" class="scroll-to-top">
            <a href="#header" class="smooth-anchor">
                <i class="fas fa-arrow-up"></i>
            </a>
        </div>
        <!--====== Scroll To Top Area End ======-->

    </div>


    <!-- ***** All jQuery Plugins ***** -->

    <!-- jQuery(necessary for all JavaScript plugins) -->
    <script src="{{ asset('/js/vendor/jquery.min.js')}}"></script>

    <!-- Bootstrap js -->
    <script src="{{ asset('/js/vendor/popper.min.js')}}"></script>
    <script src="{{ asset('/js/vendor/bootstrap.min.js')}}"></script>

    <!-- Plugins js -->
    <script src="{{ asset('/js/vendor/all.min.js')}}"></script>
    <script src="{{ asset('/js/vendor/slider.min.js')}}"></script>
    <script src="{{ asset('/js/vendor/countdown.min.js')}}"></script>
    <script src="{{ asset('/js/vendor/shuffle.min.js')}}"></script>

    <!-- Active js -->
    <script src="{{ asset('/js/main.js')}}"></script>
    <script src="{{ asset('/js/toastr.min.js') }}"></script>


    @yield('scripts')
</body>

</html>
