@extends('customer.layouts.master')

@section('content')
        <!-- ***** Hero Area Start ***** -->
        <section class="hero-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-7">
                        <span>{{ config('app.name', 'Laravel') }}</span>
                        <h1 class="mt-4">Discover & collect awesome product</h1>
                        <p>Explore my awesome Online shop</p>
                        <!-- Buttons -->
                        <div class="button-group">
                            <a class="btn btn-bordered-white" href="{{route('ui.product')}}"><i class="icon-basket mr-2"></i>Product</a>
                            <a class="btn btn-bordered-white" href="{{route('ui.register')}}"><i class="icon-note mr-2"></i>Register</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Shape -->
         <!--    <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 465" version="1.1">
                    <defs>
                        <linearGradient x1="49.7965246%" y1="28.2355058%" x2="49.7778147%" y2="98.4657689%" id="linearGradient-1">
                            <stop stop-color="rgba(69,40,220, 0.15)" offset="0%" />
                            <stop stop-color="rgba(87,4,138, 0.15)" offset="100%" />
                        </linearGradient>
                    </defs>
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="" fill="url(#linearGradient-1)">
                            <animate id="graph-animation" xmlns="http://www.w3.org/2000/svg" dur="2s" repeatCount="" attributeName="points" values="0,464 0,464 111.6,464 282.5,464 457.4,464 613.4,464 762.3,464 912.3,464 1068.2,464 1191.2,464 1328.1,464 1440.1,464 1440.1,464 0,464; 0,464 0,367 111.6,323.3 282.5,373 457.4,423.8 613.4,464 762.3,464 912.3,464 1068.2,464 1191.2,464 1328.1,464 1440.1,464 1440.1,464 0,464; 0,464 0,367 111.6,263 282.5,336.6 457.4,363.5 613.4,414.4 762.3,464 912.3,464 1068.2,464 1191.2,464 1328.1,464 1440.1,464 1440.1,464 0,464; 0,464 0,367 111.6,263 282.5,282 457.4,323.3 613.4,340 762.3,425.6 912.3,464 1068.2,464 1191.2,464 1328.1,464 1440.1,464 1440.1,464 0,464; 0,464 0,367 111.6,263 282.5,282 457.4,263 613.4,290.4 762.3,368 912.3,446.4 1068.2,464 1191.2,464 1328.1,464 1440.1,464 1440.1,464 0,464; 0,464 0,367 111.6,263 282.5,282 457.4,263 613.4,216 762.3,329.6 912.3,420 1068.2,427.6 1191.2,464 1328.1,464 1440.1,464 1440.1,464 0,464; 0,464 0,367 111.6,263 282.5,282 457.4,263 613.4,216 762.3,272 912.3,402.4 1068.2,373 1191.2,412 1328.1,464 1440.1,464 1440.1,464 0,464; 0,464 0,367 111.6,263 282.5,282 457.4,263 613.4,216 762.3,272 912.3,376 1068.2,336.6 1191.2,334 1328.1,404 1440.1,464 1440.1,464 0,464; 0,464 0,367 111.6,263 282.5,282 457.4,263 613.4,216 762.3,272 912.3,376 1068.2,282 1191.2,282 1328.1,314 1440.1,372.8 1440.1,464 0,464; 0,464 0,367 111.6,263 282.5,282 457.4,263 613.4,216 762.3,272 912.3,376 1068.2,282 1191.2,204 1328.1,254 1440.1,236 1440.1,464 0,464; 0,464 0,367 111.6,263 282.5,282 457.4,263 613.4,216 762.3,272 912.3,376 1068.2,282 1191.2,204 1328.1,164 1440.1,144.79999999999998 1440.1,464 0,464; 0,464 0,367 111.6,263 282.5,282 457.4,263 613.4,216 762.3,272 912.3,376 1068.2,282 1191.2,204 1328.1,164 1440.1,8 1440.1,464 0,464;" fill="freeze" />
                        </polygon>
                    </g>
                </svg>
            </div> -->
		</section>
        <!-- ***** Hero Area End ***** -->

        <!-- ***** Live Auctions Area Start ***** -->
        <section class="live-auctions-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Intro -->
                        <div class="intro d-flex justify-content-between align-items-end m-0">
                            <div class="intro-content">
                                <span>Terbaru</span>
                                <h3 class="mt-3 mb-0">Produk Terbaru Kami</h3>
                            </div>
                            <div class="intro-btn">
                                <a class="btn content-btn" href="auctions.html">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="auctions-slides">
                    <div class="swiper-container slider-mid items">
                        <div class="swiper-wrapper">
                            @php
                                $no=1;
                            @endphp
                            @forelse($produk as $row)

                            <!-- Single Slide -->
                            <div class="swiper-slide item">
                                <div class="card">
                                    <div class="image-over">
                                        <a href="{{route('ui.product.detail',['id' => $row->id])}}">
                                            <img class="card-img-top" src="{{asset('/img/gambar').'/'.$row->gambar}}" alt="">
                                        </a>
                                    </div>
                                    <!-- Card Caption -->
                                    <div class="card-caption col-12 p-0">
                                        <!-- Card Body -->
                                        <div class="card-body">
                                        <a href="{{route('ui.product.detail',['id' => $row->id])}}">
                                                <h5 class="mb-0">{{$row->nama_produk }}</h5>
                                            </a>
                                            <a class="seller d-flex align-items-center my-3" href="{{route('ui.product.detail',['id' => $row->id])}}">
                                                <span>{{$row->nama_kategori }}</span>
                                            </a>
                                            <div class="card-bottom d-flex justify-content-between">
                                                <span>Rp.{{number_format($row->harga_jual) }}</span>
                                                <span>{{$no++}} of 8</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @empty
                            @endforelse

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Live Auctions Area End ***** -->

        <!-- ***** Top Kategori Area Start ***** -->
        <section class="top-seller-area p-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Intro -->
                        <div class="intro m-0">
                            <div class="intro-content">
                                <span>Kategori</span>
                                <h3 class="mt-3 mb-0">{{$kategori->count()}} Kategori Kami</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row items">

                    @forelse($kategori as $row)
                    <div class="col-12 col-sm-4 col-lg-3 item">
                        <div class="card no-hover">
                            <div class="single-seller d-flex text-center">
                               <!--  <a href="author.html">
                                    <img class="avatar-md rounded-circle" style="width: 50px; height: 50px" src="{{ asset('/img/content/avatar_1.jpg')}}" alt="">
                                </a> -->
                                <div class="seller-info">
                                    <a class="seller" href="{{route('ui.product.kategori',[$param2 = $row->nama_kategori])}}"><h4 class="seller">{{$row->nama_kategori }}</h4></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </section>
        <!-- ***** Top Kategori Area End ***** -->

       <!-- ***** Live Auctions Area Start ***** -->
        <section class="live-auctions-area load-more">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-7">
                        <!-- Intro -->
                        <div class="intro text-center">
                            <span>Produk</span>
                            <h3 class="mt-3 mb-0">Semua Produk Kami</h3>
                            <p>Berikut adalah produk yang kami tawarkan, jangan sampai kehabisan!</p>
                        </div>
                    </div>
                </div>
                <div class="row items">
                    @php
                        $no=1;
                    @endphp
                    @forelse($allproduk as $row)
                    <div class="col-12 col-sm-6 col-lg-3 item">
                        <div class="card">
                            <div class="image-over">
                                <a href="{{route('ui.product.detail',['id' => $row->id])}}">
                                    <img class="card-img-top" src="{{asset('/img/gambar').'/'.$row->gambar}}" alt="">
                                </a>
                            </div>
                            <!-- Card Caption -->
                            <div class="card-caption col-12 p-0">
                                <!-- Card Body -->
                                <div class="card-body">
                                    <a href="{{route('ui.product.detail',['id' => $row->id])}}">
                                        <h5 class="mb-0">{{$row->nama_produk }}</h5>
                                    </a>
                                    <a class="seller d-flex align-items-center my-3 justify-content-between" href="item-details.html">
                                        <span>{{$row->nama_kategori }}</span>
                                        <span>{{$row->stok}}Pcs</span>

                                    </a>
                                    <div class="card-bottom d-flex justify-content-between">
                                         <span>Rp.{{number_format($row->harga_jual) }}</span>
                                         <span>{{$no++}} of {{$allproduk->count()}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @empty
                    @endforelse
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <a id="load-btn" class="btn btn-bordered-white mt-5" href="#" style="color:#040402;">Load More</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Live Auctions Area End ***** -->

       
        <!-- ***** Work Area Start ***** -->
        <section class="work-area" style="margin-top: -140px;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Intro -->
                        <div class="intro mb-4">
                            <div class="intro-content">
                                <span>Pelayanan Kami</span>
                                <h3 class="mt-3 mb-0">Memberikan Pelayan Terbaik Kepada Anda</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row items">
                    <div class="col-12 col-sm-6 col-lg-3 item">
                        <!-- Single Work -->
                        <div class="single-work">
                            <i class="icons icon-wallet text-effect"></i>
                            <h4>Ramah Dikantong</h4>
                            <p>Produk yang kami jual merupakan produk kami sendiri, yang pastinya ramah di kantong.</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 item">
                        <!-- Single Work -->
                        <div class="single-work">
                            <i class="icons icon-grid text-effect"></i>
                            <h4>Banyak Kategori</h4>
                            <p>Tidak hanya menawarkan 1 kategori saja, ada juga seperti buku, makanan, jaket dan lain lain</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 item">
                        <!-- Single Work -->
                        <div class="single-work">
                            <i class="icons icon-drawer text-effect"></i>
                            <h4>Pengiriman</h4>
                            <p>Pengiriman bisa ke seluruh wilayah indonesia</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 item">
                        <!-- Single Work -->
                        <div class="single-work">
                            <i class="icons icon-bag text-effect"></i>
                            <h4>Produk</h4>
                            <p>Kualitas barangnya terjamin karena semuanya disini original.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Work Area End ***** -->

     
@endsection
