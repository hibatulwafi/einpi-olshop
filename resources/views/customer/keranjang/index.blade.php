@extends('customer.layouts.master')

@section('content')

    <!-- ***** Breadcrumb Area Start ***** -->
    <section class="breadcrumb-area overlay-dark d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Breamcrumb Content -->
                    <div class="breadcrumb-content text-center">
                        <h2 class="m-0">Keranjang</h2>
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
    <!-- ***** Signup Area Start ***** -->
    <section class="author-area">
        <div class="container">
            <div class="row justify-content-center">

            <form method="POST" action="{{route('ui.checkout.order')}}" enctype="multipart/form-data">
                @csrf
                <div class="col-12 col-md-12 col-lg-12">
                    <!-- Intro -->
                   
                    <table class="table table-bordered" style="width:100%;">
                    <thead>
                        <tr class="text-center">
                        <th>Gambar</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $subtotal=0; foreach($keranjangs as $keranjang): ?>
                        <tr>
                        <td class="text-center">
                            <img src="{{asset('/img/gambar').'/'.$keranjang->gambar}}" alt="Image" class="img-fluid" width="70">
                        </td>
                        <td>
                          {{ $keranjang->nama_produk }}
                        </td>
                        <td class="text-right">Rp. {{ number_format($keranjang->harga,2,',','.') }} </td>
                        <td class="text-center">
                         {{ $keranjang->qty }} Pcs
                        </td>
                        <?php
                            $total = $keranjang->harga * $keranjang->qty;
                            $subtotal = $subtotal + $total;
                        ?>
                        <td class="text-right">Rp. {{ number_format($total,2,',','.') }}</td>
                        <td class="text-center"><a href="{{ route('ui.keranjang.delete',['id' => $keranjang->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                    </table>
                </div>
                
                <div class="row">
                <div class="col-8">
                &nbsp;
                </div>
                <div class="col-4">
                    <h3 class="text-black h4 text-uppercase text-center">Total Belanja</h3>
                    <table class="table-borderless table">
                        <tr>
                            <td>Sub Total</td>
                            <td class="text-right"><strong class="text-black text-center">Rp. {{ number_format($subtotal,2,',','.') }}</strong>
                            </td>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-primary btn-lg py-3 btn-block" >Checkout</button>
                </div>
                </div>
            </form>
            </div>
        </div>
    </section>
        <!-- ***** Signup Area End ***** -->

     
@endsection

@section('scripts')
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
