<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\warga;
use App\Pekerjaan;
use App\Kelurahan;
use App\Pelayanan;
use App\User;
use Session;
use File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
class PelayananController extends Controller
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

    private function uploadFoto(Request $request, $foto_old)
    {
        $foto_user = $request->file('foto_user');
        $ext = $foto_user->getClientOriginalExtension();
        if ($request->file('foto_user')->isValid()) {
            $file_nama   = date('Ymdhis') . "." . $ext;
            $image_resize = Image::make($foto_user->getRealPath());
            $image_resize->resize(300, 300);
            $image_resize->save('img/images/'. $file_nama);
            if ($foto_old != null) {
                $path_old = 'img/images/' . $foto_old;
                @unlink($path_old);
            }
            return $file_nama;
        }
        return $foto_old;
    }

    public function PengajuanKTPPemula(){
        $users=User::all();
        $data=Pelayanan::all();
        $kerjas=Pekerjaan::all();
        $wargas=warga::all();
        return view('PengajuanKTP.ktp-pemula',compact('user','data','kerjas','wargas'));
    }

    public function PostPengajuanKTPPemula(Request $request){
        //validasi
        $rules=[
            'nik'=>'required|number|unique:warga',
            'no_kk'=>'required|number|unique:warga',
            'nama'=>'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required|date',
            'jenis_kelamin'=>'required',
            'alamat'=>'required',
            'kelurahan'=>'required',
            'rt'=>'required',
            'rw'=>'required',
            'agama'=>'required',
            'status_perkawinan'=>'required',
            'pendidikan'=>'required',
            'id_pekerjaan'=>'required',
            'gol_darah'=>'required',
            'kewarganegaraan'=>'required',
            'foto'=>'sometimes|image|mimes:jpg,jpeg,png',
            'surat_pengantar'=>'sometimes|image|mimes:jpg,jpeg,png',
            'kk'=>'sometimes|image|mimes:jpg,jpeg,png',
        ];
        $message=[
            'nik.required'=>':attribute tidak boleh kosong!',
            'nik.unique'=>'attribute sudah terdaftar!',
            'no_kk.required'=>':attribute tidak boleh kosong!',
            'no_kk.unique'=>':attribute sudah terdaftar!',
            'nama.required'=>':attribute tidak boleh kosong!',
            'tempat_lahir.required'=>':attribute tidak boleh kosong!',
            'tanggal_lahir.required'=>':attribute tidak boleh kosong!',
            'jenis_kelamin.required'=>':attribute tidak boleh kosong!',
            'alamat.required'=>':attribute tidak boleh kosong!',
            'kelurahan.required'=>':attribute tidak boleh kosong!',
            'rt.required'=>':attribute tidak boleh kosong!',
            'rw.required'=>':attribute tidak boleh kosong!',
            'agama.required'=>':attribute tidak boleh kosong!',
            'status_perkawinan.required'=>':attribute tidak boleh kosong!',
            'pendidikan.required'=>':attribute tidak boleh kosong!',
            'id_pekerjaan.required'=>':attribute tidak boleh kosong!',
            'gol_darah.required'=>':attribute tidak boleh kosong!',
            'kewarganegaraan.required'=>':attribute tidak boleh kosong!',
            'foto.required'=>':attribute tidak boleh kosong!',
            'surat_pengantar.required'=>':attribute tidak boleh kosong!',
            'kk.required'=>':attribute tidak boleh kosong!',
        ];
        //Get data
        $users=User::all();
        $kerjas=Pekerjaan::all();
        $wargas=warga::all();

        //Input Data Pengajuan
        $data=PengajuanKTP::create([
            'user_id'=>$request->user_id,
            'surat_pengantar'=>$request->surat,
        ]);
    }
}
