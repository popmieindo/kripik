<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use File;


class LandingController extends Controller
{
    public function index(){
        $data = Produk::all();
        return view('landing',compact('data'));
    }
}
