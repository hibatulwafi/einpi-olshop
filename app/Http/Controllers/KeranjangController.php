<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function index()
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
        );

        return view('customer.keranjang.index',$data);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|string|max:100',
            'qty' => 'required|string|max:100',
            'harga_jual' => 'required|string|max:100',

        ]);


        $id_user = \Auth::user()->id;

        $cek = DB::table('keranjang')
                ->where('id_user',$id_user)
                ->where('id_produk',$request->id)
                ->first();

        if ( $cek != '') {
            DB::table('keranjang')
            ->where('id_user',$id_user)
            ->where('id_produk',$request->id)
            ->update([
            'qty' => $cek->qty+$request->qty,
            ]);
            session()->flash('success', "Berhasil Menambah Produk Baru");
            return redirect()->route('ui.keranjang');
        }else{
            DB::table('keranjang')->insert([
            'id_user' => $id_user,
            'id_produk' => $request->id,
            'qty' => $request->qty,
            'harga' => $request->harga_jual,
            ]);
            session()->flash('success', "Berhasil Menambah Produk Baru");
            return redirect()->route('ui.keranjang');
        }

    }

    public function delete($id)
    {
       $id_user = \Auth::user()->id;

       $hapus = DB::table('keranjang')
        ->where('id_user',$id_user)
        ->where('id_produk',$id)
        ->delete();

        if ($hapus) {
            session()->flash('success', "Berhasil Manghapus Data");
            return redirect()->route('ui.keranjang');
        }else{
            session()->flash('success', "Gagal Hapus Data");
            return redirect()->route('ui.keranjang');
        }
        return redirect()->back();
        
   }
}
