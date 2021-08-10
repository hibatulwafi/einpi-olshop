<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function baru(){   
        $data = DB::table('order')
                        ->join('users','users.id','=','order.id_user')
                        ->select('users.name','order.*', 'users.id as id_user')
                        ->where('order.status_order','=',1)
                        ->get();
        $data=array(
            'table' => $data,
            'status_order' => 1
        );

        return view('order.index',$data);
    }

    public function verifikasi(){   
        $data = DB::table('order')
                        ->join('users','users.id','=','order.id_user')
                        ->select('users.name','order.*', 'users.id as id_user')
                        ->where('order.status_order','=',2)
                        ->get();
        $data=array(
            'table' => $data,
            'status_order' => 2
        );

        return view('order.index',$data);
    }

    public function dikirim(){   
        $data = DB::table('order')
                        ->join('users','users.id','=','order.id_user')
                        ->select('users.name','order.*', 'users.id as id_user')
                        ->where('order.status_order','=',3)
                        ->get();
        $data=array(
            'table' => $data,
            'status_order' => 3
        );

        return view('order.index',$data);
    }

    public function selesai(){   
        $data = DB::table('order')
                        ->join('users','users.id','=','order.id_user')
                        ->select('users.name','order.*', 'users.id as id_user')
                        ->where('order.status_order','=',4)
                        ->get();
        $data=array(
            'table' => $data,
            'status_order' => 4
        );

        return view('order.index',$data);
    }

    public function batal(){   
        $data = DB::table('order')
                        ->join('users','users.id','=','order.id_user')
                        ->select('users.name','order.*', 'users.id as id_user')
                        ->where('order.status_order','=',5)
                        ->get();
        $data=array(
            'table' => $data,
            'status_order' => 5
        );

        return view('order.index',$data);
    }

    public function inputresi(Request $request){
        $update = DB::table('order')
                ->where('id_order',$request->id_order)
                ->update([
                    'no_resi' =>$request->no_resi,
                    'status_order' => 3,
                ]);
        if($update) {
            session()->flash('success', 'Sukses input resi');
            return redirect(route('order.dikirim'));
        }else{
            session()->flash('error', 'Gagal input resi');
            return redirect(route('order.verifikasi'));
        }
           

    }

    public function print(Request $request){
        $produk = DB::table('order')
                ->join('order_detail','order_detail.id_order','=','order.id_order')
                ->join('produk','produk.id','=','order_detail.id_produk')
                ->select('produk.*','order_detail.*','order.*')
                ->where('order.id_order','=',$request->id_order)
                ->get();

        $customer = DB::table('order')
                ->join('users','users.id','=','order.id_user')
                ->select('users.email','users.name','order.*')
                ->where('order.id_order','=',$request->id_order)
                ->first();

        $data=array(
            'produk' => $produk,
            'customer' => $customer,
        );
        return view('order.print',$data);
    }

    public function diterima(Request $request){
        $update = DB::table('order')
                ->where('id_order',$request->id_order)
                ->update([
                    'status_order' => 4,
                ]);
        if($update) {
            session()->flash('success', 'Barang Diterima');
            return redirect(route('order.selesai'));
        }else{
            session()->flash('error', 'Gagal');
            return redirect(route('order.dikirim'));
        }
           

    }
    
    public function batalkan(Request $request){

    $order_detail = DB::table('order')
                ->join('order_detail','order.id_order','=','order_detail.id_order')
                ->join('produk','produk.id','=','order_detail.id_produk')
                ->where('order_detail.id_order','=',$request->id_order)
                ->get();

        foreach($order_detail as $update){
            DB::table('produk')
            ->where('produk.id',$update->id_produk)
            ->update([
            'stok' => $update->stok+$update->qty,
            ]);
        }

        $update = DB::table('order')
                ->where('id_order',$request->id_order)
                ->update([
                    'status_order' => 5,
                ]);

        if($update) {
            session()->flash('success', 'Orderan Dibatalkan');
            return redirect(route('order.batal'));
        }else{
            session()->flash('error', 'Gagal');
            return redirect(route('order.baru'));
        }
           

    }
    

       
}
