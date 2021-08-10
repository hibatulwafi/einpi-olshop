<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class FrontendController extends Controller
{
    public function __construct()
    { 

    }

    public function index()
    {

        $data=array(
            'produk' => DB::table('produk')->join('kategori','kategori.id','produk.kategori_id')
            ->select('produk.*','kategori.nama_kategori')
            ->limit(8)->orderBy('produk.id','DESC')->get(),
            'kategori' => DB::table('kategori')->get(),
            'allproduk' => DB::table('produk')->join('kategori','kategori.id','produk.kategori_id')
            ->select('produk.*','kategori.nama_kategori')
            ->get(),
        );

        return view('customer.index',$data);
    }

    public function register()
    {
        $data=array(
            'kategori' => DB::table('kategori')->get(),
        );

        return view('customer.register',$data);
    }

    public function tentang()
    {
        $data=array(
            'kategori' => DB::table('kategori')->get(),
        );

        return view('customer.tentang',$data);
    }

    public function post_register(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'alamat' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $user = User::firstOrCreate([
            'email' => $request->email
        ], [
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'alamat' => $request->alamat,
            'phone' => $request->phone,
            'role' => 'customer',
            'status' => true
        ]);

        $user->assignRole('customer');

        session()->flash('success', "Data User : $user->name Berhasil Ditambahkan");
        return redirect(route('ui.register'));
        
    }
    
    public function detail($id)
    {
        $data=array(
            'produk' => DB::table('produk')->join('kategori','kategori.id','produk.kategori_id')
                        ->select('produk.*','kategori.nama_kategori')
                        ->limit(8)->get(),
            'detail' => DB::table('produk')->join('kategori','kategori.id','produk.kategori_id')
                        ->where('produk.id',$id)
                        ->select('produk.*','kategori.nama_kategori')
                        ->first(),
            'kategori' => DB::table('kategori')->get(),
        );

        return view('customer.product.detail',$data);
    }

    public function product(Request $request, $param1='' , $param2=''){


        $param1 = $request->search;
        $param2 = $request->kategori;

        $data=array(
            'kategori' => DB::table('kategori')->get(),
            'allproduk' => DB::table('produk')->join('kategori','kategori.id','produk.kategori_id')
            ->where('produk.nama_produk','like','%'.$param1.'%')
            ->where('kategori.nama_kategori','like','%'.$param2.'%')
            ->select('produk.*','kategori.nama_kategori')
            ->get(),
            'param1' => $param1,
            'param2' => $param2,
        );

        return view('customer.product.index',$data);
    }

    public function product_kategori($kategori){


         $param2 = $kategori;

        $data=array(
            'kategori' => DB::table('kategori')->get(),
            'allproduk' => DB::table('produk')->join('kategori','kategori.id','produk.kategori_id')
            ->where('kategori.nama_kategori','like','%'.$param2.'%')
            ->select('produk.*','kategori.nama_kategori')
            ->get(),
            'param1' => '',
            'param2' => $param2,
        );

        return view('customer.product.index',$data);
    }
      public function search(Request $request){
        $data=array(
            'param1' => $request->search,
            'param2' => $request->topik,
            'param3' => $request->opd,
            'table' =>DB::table('datasheet')
                      ->join('topik','topik.id_topik','datasheet.id_topik')
                      ->join('opd','opd.id_opd','datasheet.id_opd')
                      ->where('datasheet.statuskonfirm','2')
                      ->where('datasheet.judul','like','%'.$request->search.'%')
                      ->where('topik.nama_topik','like','%'.$request->topik.'%')
                      ->where('opd.nama_opd','like','%'.$request->opd.'%')
                      ->select('datasheet.*','topik.nama_topik','opd.nama_opd')
                      ->orderBy('datasheet.id_datasheet','DESC')
                      ->paginate(5),
            'opd' => DB::table('opd')->get(),
            'topik' => DB::table('topik')->get(),
            'jumlah_datasheet' => DB::table('datasheet')->where('statuskonfirm',2)->count(),
        );
        return view('frontend.datasheet.search',$data);
    } 

}
