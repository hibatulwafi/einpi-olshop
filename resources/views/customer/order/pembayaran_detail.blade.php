@extends('customer.layouts.master')

@section('content')

    <!-- ***** Breadcrumb Area Start ***** -->
    <section class="breadcrumb-area overlay-dark d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Breamcrumb Content -->
                    <div class="breadcrumb-content text-center">
                        <h2 class="m-0" style="color:white;">Detail Pembayaran</h2>
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="{{route('ui.home')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('ui.pembayaran')}}">Pembayaran</a></li>
                            <li class="breadcrumb-item active">Detail</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Breadcrumb Area End ***** -->
    <section class="help-center-area" style="margin-bottom: -190px; margin-top: -50px;">
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
                                <img src="{{asset('/img/logo/Mandiri_logo.png')}}" alt="Image" class="img-fluid" width ="100" >
                                <h4>1270 0000 0000</h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-4 item">
                        <div class="card help-card" style="background: #fff;">
                            <a class="d-block text-center" href="#">
                                <img src="{{asset('/img/logo/BSI_logo.png')}}" alt="Image" class="img-fluid" width="100">
                                <h4>0810 000 000</h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-4 item">
                        <div class="card help-card" style="background: #fff;">
                            <a class="d-block text-center" href="#">
                                <img src="{{asset('/img/logo/BCA_logo.png')}}" alt="Image" class="img-fluid" width="100">
                                <h4>9800 000 000</h4>
                            </a>
                        </div>
                    </div>
                   
                </div>
            </div>
        </section>
    <!-- ***** Signup Area Start ***** -->
    <section class="author-area">
        <div class="container">
            <div class="row justify-content-center">

            <form method="POST" action="{{route('ui.pembayaran.post')}}" enctype="multipart/form-data">
                @csrf
                <div class="col-12 col-md-12 col-lg-12 card" style="background:white;">
                    <!-- Intro -->
                   
                    <table class="table table-borderless" style="width:100%;">
                    <thead>
                        <tr class="text-center">
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                            
                        <?php $subtotal=0; foreach($bayar as $row): ?>
                        <tr>
                        <td>
                          {{ $row->nama_produk }}
                        </td>
                        <td class="text-right">Rp. {{ number_format($row->harga,2,',','.') }} </td>
                        <td class="text-center">
                         {{ $row->qty }} Pcs
                        </td>
                        <?php
                            $total = $row->harga * $row->qty;
                            $subtotal = $subtotal + $total;
                        ?>
                        <td class="text-right">Rp. {{ number_format($total,2,',','.') }}</td>
                        </tr>
                        <?php endforeach;?>
                        <tr>
                        	<th colspan="2" class="text-center"></th>
	                        <th class="text-center">Subtotal + Ongkir</th>
	                        <th class="text-right">Rp. {{ number_format($row->subtotal+$row->ongkir,2,',','.') }}</th>
                        </tr>
                        <tr style="padding:0px 0px 0px 0px;">
                        	<td colspan="4" class="text-center"><hr style="height: 3px; background:grey;"></td>
                        </tr>
                        <tr style="padding:0px 0px 0px 0px;">
                        	<td colspan="3">
                        		<div class="activity-content">
			                      Invoice : {{$row->invoice}} <br/>
			                      Nama : {{$row->name}} <br/>
			                      No HP : {{$row->no_hp}} <br/>
			                      Method : {{$row->metode_pembayaran}} <br/>
			                      Pesan : {{$row->pesan}} <br/>
			                      Alamat : {{$row->alamat}} <br/>
			                    </div>
                        	</td>
                        	<td width="25%">
                        		<form method="POST" enctype="multipart/form-data" action="{{route('ui.pembayaran.post')}}">
	                                <input type="hidden" class="form-control" name="id_order" value="{{$id}}" required="required">
	                                <input type="file" class="form-control" name="bukti" required="required">
	                                <button type="submit" class="btn w-100 mt-3 mt-sm-4" type="submit">Kirim</button>
                                </form>
                        	</td>
                        </tr>
                    </tbody>
                    </table>
                     
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
