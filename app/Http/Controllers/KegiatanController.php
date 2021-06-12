<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Kegiatan;
use Session;
use File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::all();
        $data=Kegiatan::all();

        return view ('kegiatan.kegiatan-index',compact('data','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = user::all();
        // dd($user);
        $data = Kegiatan::all();
        return view('kegiatan.kegiatan-tambah',compact('data','user'));
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
            'tanggal' =>'required',
            'judul'=>'required',
            'foto'=>'sometimes|image|mimes:jpg,jpeg,png',
            'deskripsi'=>'required',
            'status' => 'required',
       ];
        $message=[
            'tanggal.required' => ':attribute tidak boleh kosong!',
            'judul.required' => ':attribute tidak boleh kosong!',
            'deskripsi.required' => ':attribute tidak boleh kosong!',
            'status.required' => ':attribute tidak boleh kosong!',
            'foto_user.image' => ':attribute tidak boleh selain file gambar!',
            'foto_user.mimes' => ':attribute tidak boleh selain *.jpg, *.jpeg , *.png!',
        ];

       $request->validate($rules,$message);
       $nama_foto=null;
       if ($request->hasFile('foto')){
           $nama_foto=$this->uploadFoto($request,$nama_foto);
       }
       $data=new kegiatan;
       $data->tanggal=($request->tanggal);
       $data->judul=$request->judul;
       $data->user_id=Auth()->user()->id;
       $data->deskripsi=$request->deskripsi;
       $data->status=$request->status;
       $data->foto = $nama_foto;
       //dd($request->all());
       $data->save();
       Session::flash('message', 'Data '. $data->judul .' berhasil ditambahkan!');
       Session::flash('type', 'success');
       return redirect()->route('kegiatan.index');
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
        $user = user::all();
        $data= Kegiatan::find($id);
        return view ('kegiatan.kegiatan-edit',compact('data','user'));
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
        $nama_foto=null;
       if ($request->hasFile('foto')){
           $nama_foto=$this->uploadFoto($request,$nama_foto);
       }
        $data=Kegiatan::find($id);
        $data->tanggal=($request->tanggal);
        $data->judul=$request->judul;
        $data->user_id=$request->user_id;
        $data->deskripsi=$request->deskripsi;
        $data->status=$request->status;
        $data->foto = $nama_foto;
        //dd($request->all());
        $data->save();
        Session::flash('message', 'Data '. $data->judul .' berhasil diUpdate!');
        Session::flash('type', 'success');
        return redirect()->route('kegiatan.index');
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
        $data = Kegiatan::find($id);
            if ($data->foto != null) {
                $path_old = 'images/images' . $data->foto;
                @unlink($path_old);
            }
            $data->delete();
            Session::flash('message', 'Data'. $data->judul .'Berhasil dihapus');
            Session::flash('type', 'success');
            return redirect()->route('kegiatan.index');
    }

    private function uploadFoto(Request $request, $foto_old)
    {
        $foto = $request->file('foto');
        $ext = $foto->getClientOriginalExtension();
        if ($request->file('foto')->isValid()) {
            $foto_nama   = date('Ymdhis') . "." . $ext;
            $image_resize = Image::make($foto->getRealPath());

            $image_resize->save('img/images/' . $foto_nama);
            if ($foto_old != null) {
                $path_old = 'img/images/' . $foto_old;
                @unlink($path_old);
            }
            return $foto_nama;
        }
        return $foto_old;
    }


    public function approve($id)
    {
        $user = user::all();
        $data= Kegiatan::find($id);
        return view ('kegiatan.kegiatan-approve',compact('data','user'));
    }

    public function updateapprove(Request $request, $id)
    {
        $data=Kegiatan::find($id);
        $data->status=$request->status;
        //dd($request->all());
        $data->save();
        Session::flash('message', 'Data '. $data->judul .' berhasil diUpdate!');
        Session::flash('type', 'success');
        return redirect()->route('kegiatan.index');
    }

    public function Posting()
    {
        $user = User::all();
        $data=Kegiatan::where('status','Posting')->get();
        //dd($data);
        return view ('kegiatan.kegiatan-posting',compact('data','user'));
    }
}
