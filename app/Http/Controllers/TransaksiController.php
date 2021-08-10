<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TransaksiController extends Controller
{
    public function checkout_post(Request $request)
    {
        $q=DB::table('order')->select(DB::raw('MAX(id_order) as kd_max'));
        if($q->count()>0) {foreach($q->get() as $k){$id_order = $k->kd_max+1;}
        }else{$id_order = "1";}

        $id_user = \Auth::user()->id;
        $today = date("dmY");
        $invoice = 'INV/'.$today.'-000'.$id_order;


        $qry = DB::table('order')
            ->insert([
            'id_order' => $id_order,
            'id_user' => $id_user,
            'invoice' => $invoice,
            'metode_pembayaran' => 'Transfer',
            'no_hp' => $request->phone,
            'ongkir' => '12000',
            'subtotal' =>$request->subtotal,
            'pesan' => $request->pesan,
            'alamat' => $request->alamat,
            ]);

        if($qry){

        $keranjang = DB::table('keranjang')
                    ->join('users','users.id','=','keranjang.id_user')
                    ->join('produk','produk.id','=','keranjang.id_produk')
                    ->select('produk.*','users.name','keranjang.*')
                    ->where('keranjang.id_user','=',$id_user)
                    ->get();

        foreach($keranjang as $insert){
           DB::table('order_detail')
            ->insert([
            'id_user' => $insert->id_user,
            'id_order' => $id_order,
            'id_produk' => $insert->id_produk,
            'qty' => $insert->qty,
            'harga' => $insert->harga_jual,
            ]);

            $cek = DB::table('produk')
                ->where('id',$insert->id_produk)
                ->first();

            $update = DB::table('produk')
            ->where('id',$insert->id_produk)
            ->update([
            'stok' => $cek->stok-$insert->qty,
            ]);
        }

        $hapus = DB::table('keranjang')
        ->where('id_user',$id_user)
        ->delete();

        session()->flash('success', "Sukses");
        return redirect()->route('ui.pembayaran');

      }else{
        session()->flash('error', "Gagal");
        return redirect()->route('ui.keranjang');
      }

    }

    public function checkout_order()
    {
       $id_user = \Auth::user()->id;
       $keranjangs = DB::table('keranjang')
                        ->join('users','users.id','=','keranjang.id_user')
                        ->join('produk','produk.id','=','keranjang.id_produk')
                        ->select('produk.*','users.name','keranjang.*')
                        ->where('keranjang.id_user','=',$id_user)
                        ->get();
        $data=array(
            'keranjangs' => $keranjangs,
            'kategori' => DB::table('kategori')->get(),
            'kodeunik' => rand(1,999),
        );

        return view('customer.order.order',$data);


    }

    public function pembayaran()
    {
        $id_user = \Auth::user()->id;
        $bayar = DB::table('order')
                        ->join('users','users.id','=','order.id_user')
                        ->select('order.*')
                        ->where('order.id_user','=',$id_user)
                        ->where('order.status_order','=',1) //Menunggu Pembayaran
                        ->get();
        $dikirim = DB::table('order')
                        ->join('users','users.id','=','order.id_user')
                        ->select('order.*')
                        ->where('order.id_user','=',$id_user)
                        ->where( function($query) {
                             return $query
                                    ->where('order.status_order', '=', 2) // Menunggu Dikirim
                                    ->orWhere('order.status_order', '=', 3); // Dikirim
                            }) 
                        ->get();
        $selesai = DB::table('order')
                        ->join('users','users.id','=','order.id_user')
                        ->select('order.*')
                        ->where('order.id_user','=',$id_user)
                        ->where(function($query) {
                             return $query
                                    ->where('order.status_order', '=', 4) // Selesai
                                    ->orWhere('order.status_order', '=', 5); // Dibatalkan
                            })
                        ->get();        
        $data=array(
            'bayar' => $bayar,
            'dikirim' => $dikirim,
            'selesai' => $selesai,
            'kategori' => DB::table('kategori')->get(),
        );

        return view('customer.order.pembayaran',$data);
    }

    public function pembayaran_detail($id)
    {   
        $id_order = $id;
        $id_user = \Auth::user()->id;
        $bayar = DB::table('order')
                        ->join('users','users.id','=','order.id_user')
                        ->join('order_detail','order_detail.id_order','=','order.id_order')
                        ->join('produk','produk.id','=','order_detail.id_produk')
                        ->select('produk.*','users.name','order_detail.*','order.*')
                        ->where('order.id_user','=',$id_user)
                        ->where('order.status_order','=',1)
                        ->where('order_detail.id_order','=',$id_order)
                        ->get();
        
        $data=array(
            'bayar' => $bayar,
            'kategori' => DB::table('kategori')->get(),
            'id' =>$id_order
        );

        return view('customer.order.pembayaran_detail',$data);
    }

    public function pembayaran_post(Request $request)
    {   
        $id_user = \Auth::user()->id;

        $bukti = '';
        if($request->hasFile('bukti')){
            $bukti = $this->uploadGambar($request);
        }else{
            $bukti = "buktidefault.jpg";
        }


        $bayar = DB::table('order')
                ->where('id_order',$request->id_order)
                ->update([
                    'bukti_pembayaran' => $bukti,
                    'status_order' => 2,
                ]);

      
        session()->flash('success', 'Data Produk Berhasil Ditambahkan');
            return redirect(route('ui.pembayaran'));
    }

    public function uploadGambar($request)
    {
        $namaFile = Str::random(15);
        $ext = explode('/', $request->bukti->getClientMimeType())[1];
        $uniq = uniqid();
        $bukti = "$namaFile-$uniq.$ext";
        $request->bukti->move(public_path('bukti_bayar'), $bukti);

        return $bukti;
    }

    public function dikirim_detail($id)
    {   
        $id_order = $id;
        $id_user = \Auth::user()->id;
        $bayar = DB::table('order')
                        ->join('users','users.id','=','order.id_user')
                        ->join('order_detail','order_detail.id_order','=','order.id_order')
                        ->join('produk','produk.id','=','order_detail.id_produk')
                        ->select('produk.*','users.name','order_detail.*','order.*')
                        ->where('order.id_user','=',$id_user)
                        ->where('order.status_order','=',2)
                        ->orWhere('order.status_order','=',3)
                        ->where('order_detail.id_order','=',$id_order)
                        ->get();
        
        $data=array(
            'bayar' => $bayar,
            'kategori' => DB::table('kategori')->get(),
            'id' =>$id_order
        );

        return view('customer.order.dikirim_detail',$data);
    }

    public function diterima(Request $request)
    {   
        $id_user = \Auth::user()->id;
        $bayar = DB::table('order')
                ->where('id_order',$request->id_order)
                ->update([
                    'status_order' => 4,
                ]);

            session()->flash('success', 'Pesanan Diterima');
            return redirect(route('ui.pembayaran'));
    }

    public function selesai($id)
    {   
        $id_order = $id;
        $id_user = \Auth::user()->id;
        $bayar = DB::table('order')
                        ->join('users','users.id','=','order.id_user')
                        ->join('order_detail','order_detail.id_order','=','order.id_order')
                        ->join('produk','produk.id','=','order_detail.id_produk')
                        ->select('produk.*','users.name','order_detail.*','order.*')
                        ->where('order.id_user','=',$id_user)
                        ->where('order.status_order','=',4)
                        ->orWhere('order.status_order','=',5)
                        ->where('order_detail.id_order','=',$id_order)
                        ->get();
        
        $data=array(
            'bayar' => $bayar,
            'kategori' => DB::table('kategori')->get(),
            'id' =>$id_order
        );

        return view('customer.order.selesai',$data);
    }
    

    
}
