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
                            <li class="breadcrumb-item active">Selesai</li>
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
                                  Status : <?php if ($row->status_order == 4): ?>
                                            <button style="background:#006db2; color: white; border-radius: 5px 5px 5px 5px;">Selesai</button>
                                        <?php endif ?>
                                        <?php if ($row->status_order == 5): ?>
                                            <button>Dibatalkan</button>
                                        <?php endif ?> <br/>
                                  Resi : {{$row->no_resi}} <br/> 
			                    </div>
                        	</td>
                            <td>
                                <font size="6">Bukti Bayar</font><br/>
                            <img src="{{asset('/bukti_bayar').'/'.$row->bukti_pembayaran}}" alt="Image" class="img-fluid" width="200">
                            </td>
                        </tr>
                    </tbody>
                    </table>
                     
                </div>
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
