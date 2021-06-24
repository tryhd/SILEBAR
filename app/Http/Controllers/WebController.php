<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Kelurahan;
use App\Kegiatan;
class WebController extends Controller
{
    //
    public function index(){
        $kelurahan = Kelurahan::all();
        $user = User::all();
        $data=Kegiatan::where('status','Posting')
        ->orderby('id','desc')
        ->get();
        return view ('web.index',compact('user','data','kelurahan'));
    }

    public function kegiatan(){
        $kelurahan = Kelurahan::all();
        $user = User::all();
        $data=Kegiatan::where('status','Posting')
        ->orderby('id','desc')
        ->get();
        //dd($data);
        return view ('web.kegiatan',compact('data','user','kelurahan'));
    }

    public function pelayanan(){
        $kelurahan = Kelurahan::all();
        $user = User::all();
        $data=Kegiatan::where('status','Posting')
        ->orderby('id','desc')
        ->get();
        //dd($data);
        return view ('web.pelayanan',compact('data','user','kelurahan'));
    }

    public function login(){
        return view('Auths.login');
    }

    public function register(){
        return view('auths.register');
    }
}
