@extends('customer.layouts.master')

@section('content')

    <!-- ***** Breadcrumb Area Start ***** -->
    <section class="breadcrumb-area overlay-dark d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Breamcrumb Content -->
                    <div class="breadcrumb-content text-center">
                        <h2 class="m-0" style="color:white;">ITEM DETAILS</h2>
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="{{route('ui.home')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('ui.product')}}">Product</a></li>
                            <li class="breadcrumb-item active">Detail</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Breadcrumb Area End ***** -->

  
<!-- ***** Item Details Area Start ***** -->
        <section class="item-details-area">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-12 col-lg-5">
                        <div class="item-info">
                            <div class="item-thumb text-center">
                                <img src="{{asset('/img/gambar').'/'.$detail->gambar}}" style="width: 350px;"  alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <!-- Content -->
                    <form action="{{ route('ui.keranjang.create') }}" method="post">
                        @csrf
                        <div class="content mt-5 mt-lg-0">
                            <h3 class="m-0">{{$detail->nama_produk}}</h3>
                            <p>{{$detail->deskripsi}}</p>
                            <!-- Owner -->
                            <div class="owner d-flex align-items-center">
                                <span>kategori</span>
                                <a class="owner-meta d-flex align-items-center ml-3" href="author.html">
                                    <img class="avatar-sm rounded-circle" src="assets/img/content/avatar_1.jpg" alt="">
                                    <h6 class="ml-2">{{$detail->nama_kategori}}</h6>
                                </a>
                            </div>
                            <!-- Item Info List -->
                            <div class="item-info-list mt-4">
                                <ul class="list-unstyled">
                                    <li class="price d-flex justify-content-between">
                                        <span>Harga</span>
                                        <span>Rp.{{number_format($detail->harga_jual)}}</span>
                                        <span>{{number_format($detail->stok)}} Pcs</span>
                                    </li>
                                </ul>
                            </div>


                            <div class="input-group mb-3" >
                                <div class="input-group-prepend">
                                <button class="btn btn-outline-primary" id="dec" onclick="decNumber()" type="button">&minus;</button>
                                </div>

                                <input type="number" id="display" readonly="" name="qty" class="form-control text-center" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" value="1" min="1" max="{{ $detail->stok }}" style="height: 50px;">
                                
                                <div class="input-group-append">
                                <button class="btn btn-outline-primary" id="inc" onclick="incNumber()" type="button">&plus;</button>
                                </div>
                            </div>


                                <input type="hidden" name="id" value="{{ $detail->id }}">
                                <input type="hidden" name="harga_jual" value="{{ $detail->harga_jual }}">

                            <button type="submit" class="d-block btn btn-bordered-white mt-4" style="color:black;">Tambah Ke Keranjang</button>
                        </div>
                    </form>
                    </div>


                </div>
            </div>
        </section>
        <!-- ***** Item Details Area End ***** -->

         <!-- ***** Live Auctions Area Start ***** -->
        <section class="live-auctions-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Intro -->
                        <div class="intro d-flex justify-content-between align-items-end m-0">
                            <div class="intro-content">
                                <span>Lainnya</span>
                                <h3 class="mt-3 mb-0">Produk Lainnya Kami</h3>
                            </div>
                            <div class="intro-btn">
                                <a class="btn content-btn" href="{{route('ui.product')}}">Selengkapnya</a>
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
                                <div class="card" style="background:#212529;">
                                    <div class="image-over">
                                        <a href="{{route('ui.product.detail',['id' => $row->id])}}">
                                            <img class="card-img-top" src="{{asset('/img/gambar').'/'.$row->gambar}}" alt="">
                                        </a>
                                    </div>
                                    <!-- Card Caption -->
                                    <div class="card-caption col-12 p-0">
                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <a href="item-details.html">
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

     
@endsection

@section('scripts')

    <script type="text/javascript">

    var i = 1;

    function incNumber() {
        if (i < {{$detail->stok}}) {
            i++;
        } else if (i = {{$detail->stok}}) {
            i = 1;
        }
          document.getElementById("display").value = i;
    }

    function decNumber() {
        if (i > 1) {
            --i;
        } else if (i = 1) {
            i = {{$detail->stok}};
        }
        document.getElementById("display").value = i;
    }
    </script>

    @if (session()->has('success'))
    <script>
        $(document).ready(function() {
            toastr["success"]('{{ session()->get('success') }}')

        });
    </script>
    @endif

    @if(session()->has('error'))
    <script>
        $(document).ready(function () {
            toastr["info"]('{{ session()->get('error') }}')
        });

    </script>
    @endif

@endsection
