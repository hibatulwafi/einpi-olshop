<?php

namespace App\Http\Controllers;

use App\Produk;
use App\User;
use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $produk = Produk::inRandomOrder()->paginate(10);
        $users = User::all();
        $rolesCount = Role::count();
        $omzet = DB::table('order')
        ->select(DB::raw("SUM(subtotal) as omzet"))
                ->where('order.status_order','=',4)
                ->first();
        
        return view('home', compact('produk', 'users', 'rolesCount','omzet'));
    }
}
