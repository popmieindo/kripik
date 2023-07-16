<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use File;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index(){
        $data = Produk::all();
        return view('landing',compact('data'));
    }
    public function profil(){
        $userId = Auth::user()->id;

        $data = Order::whereMemberId($userId)->orderBy('created_at','desc')->paginate(10);
        
        return view('profil',compact('data'));
    }

    

    

    

    public function checkout(){
        
        return view('checkout');
    }

    public function simpanOrder(Request $request){

        $order = new Order();
        $order->total = $request->total;
        $order->status = 'Pending';
        $order->pay = $request->pay;
        $userId = Auth::user()->id;
        $order->member_id = $userId;


        $foundUnique = false;

        while (!$foundUnique) {
            $randomNumber = mt_rand(001, 999);
            $randomString = Str::random(3);
            $kodes = $randomString . $randomNumber;

            // Periksa apakah kode sudah ada dalam database
            $kodeExists = Order::where('kode', $kodes)->exists();

            if (!$kodeExists) {
                $foundUnique = true;
            }
        }

        $order->kode = $kodes;


        $order->save();
        
        $orderId = $order->id;
        $isi = $request->all();
        foreach ($isi['nama'] as $item => $value) {
            $finalArray = array(
                'order_id' => $orderId,
                'nama' => $isi['nama'][$item],
                'harga' => $isi['harga'][$item],
                'qty' => $isi['qty'][$item],
            );

            Cart::create($finalArray);
        }
        return redirect('/shop')->with('pesan','  Data Berhasil disimpan');
    }
    
}
