@extends('customer.layouts.master')

@section('content')

    <!-- ***** Breadcrumb Area Start ***** -->
    <section class="breadcrumb-area overlay-dark d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Breamcrumb Content -->
                    <div class="breadcrumb-content text-center">
                        <h2 class="m-0" style="color: white;">Order Detail</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Breadcrumb Area End ***** -->

     <!-- ***** Help Center Area Start ***** -->
       <!--  <section class="help-center-area" style="margin-bottom: -190px; margin-top: -50px;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="intro text-center">
                            <span>Pilih Rekening Pembayaran</span>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center items" style="margin-top: -50px;">

                    <div class="col-4 item">
                        <div class="card help-card" style="background: #fff;">
                            <a class="d-block text-center" href="#">
                                <img src="{{asset('/img/logo/Mandiri_logo.png')}}" alt="Image" class="img-fluid" height="70" >
                                <h4>1270 0000 0000</h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-4 item">
                        <div class="card help-card" style="background: #fff;">
                            <a class="d-block text-center" href="#">
                                <img src="{{asset('/img/logo/BSI_logo.png')}}" alt="Image" class="img-fluid" height="70">
                                <h4>0810 000 000</h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-4 item">
                        <div class="card help-card" style="background: #fff;">
                            <a class="d-block text-center" href="#">
                                <img src="{{asset('/img/logo/BCA_logo.png')}}" alt="Image" class="img-fluid" height="70">
                                <h4>9800 000 000</h4>
                            </a>
                        </div>
                    </div>
                   
                </div>
            </div>
        </section> -->
        <!-- ***** Help Center Area End ***** -->

    <!-- ***** Create Area Start ***** -->
        <section class="author-area">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-12 col-md-4">
                        <!-- Author Profile -->
                        <div class="card no-hover text-center">
                            <div class="image-over">
                                <h3 style="color:white;">Produk Detail</h3>
                            </div>
                            <!-- Card Caption -->
                            <div class="card-caption col-12">
                                <!-- Card Body -->
                                <div class="card-body mt-4">
                                  <table class="table table-borderless">
                                    @php $subtotal = 0; @endphp
                                    @foreach($keranjangs as $row)
                                    @php 
                                        $total = $row->harga * $row->qty; 
                                        $subtotal = $subtotal + $total; 
                                    @endphp
                                    <tr>
                                        <td class="text-left" style="color:white; padding:0px 0px 0px 0px;">{{$row->nama_produk}} ({{$row->qty}}x)</td>
                                        <td class="text-right" style="color:white; padding:0px 0px 0px 0px;">Rp.{{number_format($total)}}</td>  
                                    </tr>
                                   @endforeach
                                    <tr>
                                        <td style="color:white; padding:0px 0px 0px 0px;"></td>
                                        <td class="text-right" style="color:white; padding:0px 0px 0px 0px;">Rp.{{number_format($subtotal+$kodeunik)}} </br> <p style="font-size: 10px;">*3 Digit Dibelakang Merupakan Kode unik</p></td>  
                                    </tr>
                                   </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-7">
                        <!-- Item Form -->
                        <form class="item-form card no-hover" method="POST" action="{{route('ui.checkout.post')}}">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group mt-3">
                                        <input type="hidden" class="form-control" name="subtotal" placeholder="Name" value="{{$subtotal+$kodeunik}}" required="required">
                                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{Auth::user()->name}}" required="required">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group mt-3">
                                        <input type="text" class="form-control" name="phone" placeholder="Phone Number" value="{{Auth::user()->phone}}" required="required">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="alamat" placeholder="Alamat" cols="30" rows="3">{{Auth::user()->alamat}}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="pesan" placeholder="Tuliskan Pesan Anda" cols="30" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn w-100 mt-3 mt-sm-4" type="submit">Order</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Create Area End ***** -->

     
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
