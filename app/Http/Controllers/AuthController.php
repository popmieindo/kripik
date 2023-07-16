<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\Member;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use File;
class AuthController extends Controller
{
    public function login()
    {   
        
        return view('login');
    }

    public function logout(Request $request): RedirectResponse{
    
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }

    public function process(Request $request){
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

    if(Auth::guard('member')->attempt($credentials)) {
        $request->session()->regenerate();
        
        return redirect()->intended('/shop');
    }
    if(Auth::guard('web')->attempt($credentials)) {
        $request->session()->regenerate();
        
        return redirect()->intended('admin/beranda');
    }
        return back()->withErrors([
            'email' => 'Email atau Password anda salah'
        ])->onlyInput('email');
    }

    public function register(){

        return view('register');
    }

    public function svMember(Request $request){

        $member = new Member();

        $imel = Member::whereEmail($request->email)->first();
        
        if($imel != null){
            return back()->with('gagal','Email sudah terdaftar');
        }else
        $member->nama = $request->nama;
        $member->email = $request->email;
        $member->no_hp = $request->no_hp;
        $member->alamat = $request->alamat;
        $member->password = Hash::make($request->password);

        $member->save();
        


        return redirect('/login')->with('pesan','akun berhasil dibuat');
    }
}
