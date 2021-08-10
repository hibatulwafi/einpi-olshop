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
    <!-- ***** Activity Area Start ***** -->
        <section class="activity-area load-more">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Intro -->
                        <div class="intro mb-4">
                            <div class="intro-content">
                                <span>My Order</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row items card" style="background: white;">
                    <div class="col-12">
                        <!-- Netstorm Tab -->
                        <ul class="netstorm-tab nav nav-tabs" id="nav-tab">
                            <li>
                                <a class="active" id="nav-home-tab" data-toggle="pill" href="#nav-home">
                                    <h5 class="m-0" style="color:black;">Harus Dibayar</h5>
                                </a>
                            </li>
                            <li>
                                <a id="nav-profile-tab" data-toggle="pill" href="#nav-profile">
                                    <h5 class="m-0"  style="color:black;">Dikirim</h5>
                                </a>
                            </li>
                            <li>
                                <a id="nav-contact-tab" data-toggle="pill" href="#nav-contact">
                                    <h5 class="m-0"  style="color:black;">Selesai</h5>
                                </a>
                            </li>
                        </ul>
                        <!-- Tab Content -->
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" >
                                <ul class="list-unstyled">
                                    <!-- Single Tab List -->
                                    @foreach($bayar as $row)
                                    <a href="{{route('ui.pembayaran.detail',[$id = $row->id_order])}}">
                                    <li class="single-tab-list d-flex card" style="background: white;">
                                        <div class="activity-content">
                                          Invoice : {{$row->invoice}} <br/>
                                          <font style="color:black;"> Subtotal : Rp.{{number_format($row->subtotal+$row->ongkir)}} </font> <br/>
                                           <font style="color:black;"> Tanggal : {{$row->created_at}} </font>
                                        </div>
                                    </li>
                                    </a>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="nav-profile">
                                <ul class="list-unstyled">
                                    <!-- Single Tab List -->
                                    @foreach($dikirim as $row)
                                    <a href="{{route('ui.dikirim.detail',[$id = $row->id_order])}}">
                                    <li class="single-tab-list d-flex card" style="background: white;">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td>
                                                    <div class="activity-content">
                                                      Invoice : {{$row->invoice}} <br/>
                                                      <font style="color:black;"> Subtotal : Rp.{{number_format($row->subtotal+$row->ongkir)}} </font> <br/>
                                                    </div>
                                                </td>
                                                <td class="text-right">
                                                    <div>
                                                        <?php if ($row->status_order == 2): ?>
                                                            <button style="background:#006db2; color: white; border-radius: 5px 5px 5px 5px;">Sedang Dikemas</button>
                                                        <?php endif ?>
                                                        <?php if ($row->status_order == 3): ?>
                                                            <button style="background:#006db2; color: white; border-radius: 5px 5px 5px 5px;">Sedang Dikirim</button>
                                                        <?php endif ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </li>
                                    </a>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="nav-contact">
                                <ul class="list-unstyled">
                                    <!-- Single Tab List -->

                                    @foreach($selesai as $row)
                                    <a href="{{route('ui.selesai.detail',[$id = $row->id_order])}}">
                                    <li class="single-tab-list d-flex card" style="background: white;">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td>
                                                    <div class="activity-content">
                                                      Invoice : {{$row->invoice}} <br/>
                                                      <font style="color:black;"> Subtotal : Rp.{{number_format($row->subtotal+$row->ongkir)}} </font> <br/>
                                                    </div>
                                                </td>
                                                <td class="text-right">
                                                    <div>
                                                        <?php if ($row->status_order == 4): ?>
                                                            <button style="background:#006db2; color: white; border-radius: 5px 5px 5px 5px;">Selesai</button>
                                                        <?php endif ?>
                                                        <?php if ($row->status_order == 5): ?>
                                                             <button style="background:red; color: white; border-radius: 5px 5px 5px 5px;">Dibatalkan</button>
                                                        <?php endif ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </li>
                                    </a>
                                    @endforeach
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Activity Area End ***** -->

     
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
