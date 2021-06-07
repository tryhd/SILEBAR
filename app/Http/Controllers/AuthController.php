<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function login(){
        return view('Auths.login');
    }

    public function register(){
        return view('Auths.register');
    }

    public function PostLogin(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required',
        ]);
        if(\Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status'=>'Aktif'])){

       return redirect()->route('home');
       }
       return redirect()->back();
    }

    public function PostRegister(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|confirmed'
        ]);
        $data=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>'Warga',
            'status'=>'Aktif',
            'foto_user'=>null
        ]);
        return redirect()->route('login');
    }

    public function logout(){
        \Auth::logout();
        return redirect()->route('login');
    }
}
