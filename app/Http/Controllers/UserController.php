<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Session;
use File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=User::all();
        return view('user.user-index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.user-tambah',compact('data'));
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
        $rules = [
            'name' =>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|max:12',
            'role'=>'required',
            'foto_user'=>'sometimes|image|mimes:jpg,jpeg,png',
            'status'=>'required',
        ];
        $message=[
            'name.required' => ':attribute tidak boleh kosong!',
            'email.required' => ':attribute tidak boleh kosong!',
            'email.unique'=>':attribute sudah terdaftar!',
            'email.email'=>'format :attribute tidak sesuai!',
            'password.required' => ':attribute tidak boleh kosong!',
            'password.min'=>':attribute tidak boleh kurang dari 6 karakter!',
            'password.max'=>':attribute tidak boleh lebih dari 12 karakter!',
            'role.required'=>':attribute tidak boleh kosong!',
            'foto_user.image' => ':attribute tidak boleh selain file gambar!',
            'foto_user.mimes' => ':attribute tidak boleh selain *.jpg, *.jpeg , *.png!',
            'status.required' => ':attribute tidak boleh kosong!',
        ];
        $request->validate($rules,$message);
        $nama_foto=null;
        if ($request->hasFile('foto_user')){
            $nama_foto=$this->uploadFoto($request,$nama_foto);
        }
        $data=new user;
        $data->name=($request->name);
        $data->email=$request->email;
        $data->password=Hash::make($request->password);
        $data->status=$request->status;
        $data->role=$request->role;
        $data->foto_user = $nama_foto;
        //dd($request->all());
        $data->save();
        Session::flash('message', 'Data '. $data->name .' berhasil ditambahkan!');
        Session::flash('type', 'success');
        return redirect()->route('user.index');
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
        $data=User::find($id);
        return view ('user.user-edit',compact('data'));
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
        $rules = [
            'name' =>'required',
            'email'=>'required|email',
            //'password'=>'required|min:6',
            'role'=>'required',
            'foto_user'=>'sometimes|image|mimes:jpg,jpeg,png',
            'status'=>'required',
        ];
        $message=[
            'name.required' => ':attribute tidak boleh kosong!',
            'email.required' => ':attribute tidak boleh kosong!',
            'email.unique'=>':attribute sudah terdaftar!',
            'email.email'=>'format :attribute tidak sesuai!',
            //'password.required' => ':attribute tidak boleh kosong!',
            //'password.min'=>':attribute tidak boleh kurang dari 6 karakter!',
            'role.required'=>':attribute tidak boleh kosong!',
            'foto_user.image' => ':attribute tidak boleh selain file gambar!',
            'foto_user.mimes' => ':attribute tidak boleh selain *.jpg, *.jpeg , *.png!',
            'status.required' => ':attribute tidak boleh kosong!',
        ];
        $request->validate($rules,$message);
        $foto_nama=null;
        if ($request->hasFile('foto_user')){
            $foto_nama=$this->uploadFoto($request,$foto_nama);
        }
        $data=User::find($id);
        $data->name=$request->name;
        $data->email=$request->email;
        $data->role=$request->role;
        $data->status=$request->status;
        //$data->password=$request->password;
        $data->foto_user=$foto_nama;
        $data->save();
        Session::flash('message', 'Data '. $data->name .' berhasil diubah!');
        Session::flash('type', 'success');
       return redirect()->route('user.index');
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
        $data = User::find($id);
        if ($data->foto_user != null) {
            $path_old = 'images/images' . $data->foto;
            @unlink($path_old);
        }
        $data->delete();
        Session::flash('message', 'Data'. $data->name .'Berhasil dihapus');
        Session::flash('type', 'success');
        return redirect()->route('user.index');
    }

    private function uploadFoto(Request $request, $foto_user_old)
    {
        $foto_user = $request->file('foto_user');
        $ext = $foto_user->getClientOriginalExtension();
        if ($request->file('foto_user')->isValid()) {
            $foto_nama   = date('Ymdhis') . "." . $ext;
            $image_resize = Image::make($foto_user->getRealPath());
            $image_resize->resize(300, 300);
            $image_resize->save('img/images/' . $foto_nama);
            if ($foto_user_old != null) {
                $path_old = 'img/images/' . $foto_user_old;
                @unlink($path_old);
            }
            return $foto_nama;
        }
        return $foto_user_old;
    }
}
