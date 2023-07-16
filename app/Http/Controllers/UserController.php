<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Status;
use App\Models\Member;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use File;

class UserController extends Controller
{
    public function beranda(){
        $m = Member::all()->count();
        $p = Produk::all()->count();
        $o = Order::all()->count();
        $a = Order::whereStatus('Pending')->count();
        $b = Order::whereStatus('Cancel')->count();
        $c = Order::whereStatus('Diterima')->count();
        $d = Order::whereStatus('Dikirim')->count();
        return view('index',compact('a','b','c','d','m','p','o'));
    }
    public function produk(){
        $data = Produk::all();
        return view('produk', compact('data'));
    }
    public function member(){
        $data = Member::all();
        return view('member', compact('data'));
    }

    public function order(){
        $cart = Cart::all();
        $data = Order::all();
       
        return view('order', compact('data'));
    }

    public function orderDetail(Request $request, $id){
        $stt = Status::all();
        $data = Order::Find($id);
        $cart = Cart::where('order_id', $id)->get();

        $member = Member::whereId($data->member_id)->first();

        return view('orderDetail', compact('data','cart','stt','member'));
    }
    public function tambahProduk(){
        return view('tambahProduk');
    }

    public function updateStatus(Request $request, $id){
        $data = Order::findOrFail($id);

        $data->status = $request->input('status');
        

        $data->save();
        return redirect('/admin/order');
    }

    public function simpanProduk(Request $request){

        
        $produk = new Produk();

        $produk->nama = $request->nama;
        $produk->kategori = $request->kategori;
        $produk->harga = $request->harga;

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('/public/img');
            $url = Storage::url($path);
            $produk->foto = $url;
        }

        $produk->save();
        
        return redirect('/admin/produk')->with('pesan','  Data Berhasil diSimpan');
    }

    public function deleteProduk($id){

        $data = Produk::findOrFail($id)->delete();
        
        return back()->with('pesan','  Data Berhasil dihapus');
    }

    public function edit($id){
        $data = Produk::whereId($id)->first();
        return view('editProduk', compact('data'));
    }

    public function updateProduk(Request $request, $id){

        
        $produk = Produk::findOrFail($id);
        
        $produk->nama = $request->nama;
        $produk->kategori = $request->kategori;
        $produk->harga = $request->harga;
        
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('/public/img');
            $url = Storage::url($path);
            $produk->foto = $url;
        }

        $produk->save();
        
        return redirect('/admin/beranda')->with('pesan','  Data Berhasil diUpdate');
    }

    
}
