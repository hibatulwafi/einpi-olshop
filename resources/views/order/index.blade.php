@extends('layouts.master')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Order Baru</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Order Baru</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-head-fixed text-nowrap table-borderless  table-hover" id="myTable">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>No Invoice</th>
                                        <th>Pembeli</th>
                                        <th>No HP</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($no=1)
                                    @forelse($table as $row)
                                        <tr>
                                            <td width="5%" class="text-center">{{$no++}}</td>
                                            <td>{{$row->invoice }}</td>
                                            <td>{{$row->name }}</td>
                                            <td>{{$row->no_hp }}</td>
                                            <td class="text-center">
                                              @if($row->status_order == 0)
                                                <span class="badge badge-danger">Dibatalkan</span>
                                              @elseif($row->status_order == 1)
                                                <span class="badge badge-info">Belum Dibayar</span>
                                              @elseif($row->status_order == 2)
                                                <span class="badge badge-info">Menunggu Verifikasi</span>
                                              @elseif($row->status_order == 3)
                                                <span class="badge badge-info">Dikirim</span>
                                              @elseif($row->status_order == 4)
                                                <span class="badge badge-success">Selesai</span>
                                              @elseif($row->status_order == 5)
                                                <span class="badge badge-danger">Dibatalkan</span>
                                              @else
                                                <span class="badge badge-danger">Error</span>
                                              @endif
                                            </td>
                                            <td>{{date_format(date_create($row->created_at),"d, M Y") }}</td>                                           
                                            <td style="width: 20px">
                                                <div class="btn-group">
                                                    <a class="btn btn-info" href="#" data-toggle="modal" data-target="#barcodeModal{{ $row->id_order }}">
                                                        <i class="fas fa-eye    "></i>
                                                        Detail
                                                    </a>
                                                </div>

                                                 <!-- Modal Barcode-->
                                        <div class="modal fade" id="barcodeModal{{ $row->id_order }}"  role="dialog" aria-labelledby="exampleModalLabel">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Detail - {{ $row->invoice }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                            <?php $detail = DB::table('order')
                                                            ->join('users','users.id','=','order.id_user')
                                                            ->join('order_detail','order_detail.id_order','=','order.id_order')
                                                            ->join('produk','produk.id','=','order_detail.id_produk')
                                                            ->select('produk.*','users.name','order_detail.*','order.*')
                                                            ->where('order.status_order','=',$status_order)
                                                            ->where('order.id_user','=',$row->id_user)
                                                            ->where('order_detail.id_order','=',$row->id_order)
                                                            ->get(); ?>
                                                             <table class="table">
                                                                    <tr class="text-center">
                                                                    <th>Gambar</th>
                                                                    <th>Produk</th>
                                                                    <th>Harga</th>
                                                                    <th>Jumlah</th>
                                                                    <th>Total</th>
                                                                    </tr>
                                                                        
                                                                    <?php $subtotal=0; foreach($detail as $barang): ?>
                                                                    <tr>
                                                                    <td class="text-center">
                                                                        <img src="{{asset('/img/gambar').'/'.$barang->gambar}}" alt="Image" class="img-fluid" width="70">
                                                                    </td>
                                                                    <td>
                                                                      {{ $barang->nama_produk }}
                                                                    </td>
                                                                    <td class="text-right">Rp. {{ number_format($barang->harga,2,',','.') }} </td>
                                                                    <td class="text-center">
                                                                     {{ $barang->qty }} Pcs
                                                                    </td>
                                                                    <?php
                                                                        $total = $barang->harga * $barang->qty;
                                                                        $subtotal = $subtotal + $total;
                                                                    ?>
                                                                    <td class="text-right">Rp. {{ number_format($total,2,',','.') }}</td>
                                                                    </tr>
                                                                    <?php endforeach;?>
                                                                    <tr>
                                                                        <td colspan="4" class="text-right">Subtotal</td>
                                                                        <td class="text-right"><strong class="text-black text-center">Rp. {{ number_format($subtotal+$barang->ongkir,2,',','.') }}</strong><br/> <sub>*ongkir Rp. {{ number_format($barang->ongkir,2,',','.') }}</sub></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Pesan</strong></td>
                                                                        <td  colspan="4">{{$row->pesan}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Alamat</strong></td>
                                                                        <td style="white-space:pre-wrap; word-wrap:break-word" colspan="4">{{$row->alamat}}</td>
                                                                    </tr>
                                                                    @if($row->status_order != 1)
                                                                    <tr>
                                                                        <td><strong>Bukti</strong></td>
                                                                        <td colspan="4"> <a href="{{asset('/bukti_bayar').'/'.$row->bukti_pembayaran}}" data-fancybox data-caption="{{ $row->bukti_pembayaran}}">
                                                                        <img width="64px" height="64px" src="{{asset('/bukti_bayar').'/'. $row->bukti_pembayaran}}" alt="">
                                                                        </a></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Resi</strong></td>
                                                                        <td colspan="4">{{ $row->no_resi}}</td>
                                                                    </tr>
                                                                    @endif
                                                                    @if($row->status_order == 2 || $row->status_order == 3)
                                                                    <tr>
                                                                        <td><strong>Update Resi</strong></td>
                                                                        <td colspan="4">
                                                                        <form method="POST" action="{{route('order.inputresi')}}">
                                                                            @csrf
                                                                            <div class="form-row">
                                                                                <div class="col">
                                                                                    <input type="hidden" name="id_order" value="{{ $row->id_order}}" class="form-control">
                                                                                    <input type="text" name="no_resi" value="{{ $row->no_resi}}" class="form-control">
                                                                                </div>
                                                                                <div class="col">
                                                                                    <input type="submit" name="submit" class="btn btn-success" value="Tambah">
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                        </td>
                                                                    </tr>
                                                                    @endif
                                                            </table>
                                                    </div>
                                                    <div class="modal-footer"> 
                                                        @if($row->status_order == 1 || $row->status_order == 2)
                                                        <form method="POST"  action="{{ route('order.batalkan') }}" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="id_order" value="{{$row->id_order}}">
                                                        <button type="submit" class="btn btn-outline-danger"> <i class="fas fa-times"></i>&nbsp;Batalkan Pesanan</button>
                                                        </form>                                                        
                                                        @endif
                                                        @if($row->status_order == 3)
                                                        <form method="POST"  action="{{ route('order.diterima') }}" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="id_order" value="{{$row->id_order}}">
                                                        <button type="submit" class="btn btn-outline-info"> <i class="fas fa-handshake"></i>&nbsp;Pesanan Diterima</button>
                                                        </form>                                                        
                                                        @endif
                                                        @if($row->status_order != 1 && $row->status_order != 5)
                                                        <form method="POST"  target="_blank" action="{{ route('order.print') }}" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="id_order" value="{{$row->id_order}}">
                                                        <button type="submit" class="btn btn-outline-success"> <i class="fas fa-print"></i> Print</button>
                                                        </form>                                                        
                                                        @endif
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Data Tidak Ada</td>
                                        </tr>
                                    @endforelse
    
                                </tbody>
                            </table>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                 </div>
                </div>
                <!-- /.card -->
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
@endsection

@section('scripts')

<script src="{{ url('https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js') }}"></script>

<script>
    function handleBarcode(id) {
        $('#barcodeModal').modal('show');
    }
</script>

 <script type="text/javascript">
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
 </script>

@if(session()->has('success'))
    <script>
        $(document).ready(function () {
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
