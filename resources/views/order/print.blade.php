

<table style=" border: 1px solid black; border-collapse: collapse;" cellpadding="5px">	
  	<tr>
	<td><strong>Nama Penerima</strong></td>
        <td  colspan="3">{{$customer->name}}</td>
    </tr>
  	<tr>
	<td><strong>No Telp</strong></td>
        <td  colspan="3">{{$customer->no_hp}}</td>
    </tr>
   	<tr>
        <td><strong>Pesan</strong></td>
        <td  colspan="3">{{$customer->pesan}}</td>
    </tr>
    <tr>
        <td><strong>Alamat</strong></td>
        <td style="white-space:pre-wrap; word-wrap:break-word" colspan="3">{{$customer->alamat}}</td>
    </tr>
    <tr>
        <td><strong>Resi</strong></td>
        <td colspan="3">{{ $customer->no_resi}}</td>
    </tr>
    <tr>
    <th>Produk</th>
    <th>Harga</th>
    <th>Jumlah</th>
    <th>Total</th>
    </tr>
        
    <?php $subtotal=0; foreach($produk as $barang): ?>
    <tr>
    <td>
      {{ $barang->nama_produk }}
    </td>
    <td>Rp. {{ number_format($barang->harga,2,',','.') }} </td>
    <td>
     {{ $barang->qty }} Pcs
    </td>
    <?php
        $total = $barang->harga * $barang->qty;
        $subtotal = $subtotal + $total;
    ?>
    <td>Rp. {{ number_format($total,2,',','.') }}</td>
    </tr>
    <?php endforeach;?>
    <tr>
        <td colspan="3" >Subtotal</td>
        <td><strong>Rp. {{ number_format($subtotal+$barang->ongkir,2,',','.') }}</strong><br/> <sub>*ongkir Rp. {{ number_format($barang->ongkir,2,',','.') }}</sub></td>
    </tr>
   
</table>


<script type="text/javascript">
<!--
window.print();
//-->
</script>