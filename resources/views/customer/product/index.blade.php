@extends('customer.layouts.master')

@section('content')
    <!-- ***** Breadcrumb Area Start ***** -->
    <section class="breadcrumb-area overlay-dark d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Breamcrumb Content -->
                    <div class="breadcrumb-content text-center">
                        <h2 class="m-0" style="color:white;">PRODUCT</h2>
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="{{route('ui.home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Product</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Breadcrumb Area End ***** -->
    <!-- ***** Live Auctions Area Start ***** -->
    <section class="live-auctions-area load-more">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <!-- Intro -->
                    <div class="intro text-center">
                        <span>Produk</span>
                        <h3 class="mt-3 mb-0">Semua Produk Kami</h3>
                        <p>Berikut adalah produk yang kami tawarkan, jangan sampai kehabisan!</p>
                    </div>
                </div>

                <div class="col-9">
                    <form action="{{route('ui.product')}}" method="GET" id="myform">
                    @csrf
                        <div class="input-group">

                        <div class="input-group-prepend">
                            <button style="background:#212529; width: 70px;" type="submit"> <i class="fa fa-search" style="color:white;"> </i></button> 
                        </div>

                            <input type="text" name="search" placeholder="Cari disini ..." class="form-control col-8">

                            <select name="kategori" id="kategori" class="form-control col-2">
                                <option value="" selected="">Pilih Kategori</option>
                                @foreach($kategori as $row)
                                <option value="{{$row->nama_kategori}}">{{$row->nama_kategori}}</option>
                                @endforeach
                            </select>
                                
                        </div>
                    </form>
                </div>

            </div>
            <div class="row items">
                @php
                    $no=1;
                @endphp
                @forelse($allproduk as $row)
                <div class="col-12 col-sm-6 col-lg-3 item">
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
                <div class="col-12" style="padding-top:100px;">
                    <div class="intro text-center">
                        <span>Pencarian Tidak Ditemukan</span>
                    </div>
                </div>
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


    
@endsection
