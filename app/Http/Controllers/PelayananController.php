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
    public function PengajuanKTPPemula(){
        $users=User::all();
        $kelurahans=Kelurahan::all();
        $data=Pelayanan::all();
        $kerjas=Pekerjaan::all();
        return view('PengajuanKTP.ktp-pemula',compact('user','data','kerjas','kelurahans'));
    }

    public function PostPengajuanKTPPemula(Request $request){
        //validasi
        $rules=[
            'nik'=>'required|numeric|unique:warga',
            'no_kk'=>'required|numeric|unique:warga',
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
            'pekerjaan'=>'required',
            'gol_darah'=>'required',
            'kewarganegaraan'=>'required',
            'foto_ktp'=>'sometimes|image|mimes:jpg,jpeg,png',
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
            'pekerjaan.required'=>':attribute tidak boleh kosong!',
            'gol_darah.required'=>':attribute tidak boleh kosong!',
            'kewarganegaraan.required'=>':attribute tidak boleh kosong!',
            'foto_ktp.required'=>':attribute tidak boleh kosong!',
            'surat_pengantar.required'=>':attribute tidak boleh kosong!',
            'kk.required'=>':attribute tidak boleh kosong!',
        ];
        //Get data
        $kerjas=Pekerjaan::all();


        //Input Data Pengajuan Pelayanan
        $request->validate($rules,$message);
        $nama_foto=null;
        $surat_nama=null;
        $kk_nama=null;
        if ($request->hasFile('foto_ktp')){
            $nama_foto=$this->uploadFotoKTP($request,$nama_foto);
        }
        if ($request->hasFile('kk')){
            $kk_nama=$this->uploadKK($request,$kk_nama);
        }
        if ($request->hasFile('surat_pengantar')){
            $surat_nama=$this->uploadSuratPengantar($request,$surat_nama);
        }
        $wargas=new warga;
        $wargas->nik=$request->nik;
        $wargas->no_kk=$request->no_kk;
        $wargas->nama=$request->nama;
        $wargas->tempat_lahir=$request->tempat_lahir;
        $wargas->tanggal_lahir=$request->tanggal_lahir;
        $wargas->jenis_kelamin=$request->jenis_kelamin;
        $wargas->alamat=$request->alamat;
        $wargas->kelurahan=$request->input('kelurahan');
        $wargas->rt=$request->rt;
        $wargas->rw=$request->rw;
        $wargas->agama=$request->agama;
        $wargas->status_perkawinan=$request->status_perkawinan;
        $wargas->pendidikan=$request->pendidikan;
        $wargas->id_pekerjaan=$request->input('pekerjaan');
        $wargas->gol_darah=$request->gol_darah;
        $wargas->kewarganegaraan=$request->kewarganegaraan;
        $wargas->foto_ktp = $nama_foto;
        //dd($request->all());
        $wargas->save();

        $data=new pelayanan;
        $data->surat_pengantar=$surat_nama;
        $data->kk=$kk_nama;
        $data->user_id=Auth()->user()->id;
        $data->jenis_permohonan='KTP Pemula';
        $data->warga_id=$wargas->id;
        $data->status='Diproses';
        $data->tanggal=$wargas->created_at;
        $data->save();
        dd($data,$wargas);
    }

    private function uploadFotoKTP(Request $request, $file_old)
    {
        $foto_user = $request->file('foto_ktp');
        $ext = $foto_user->getClientOriginalExtension();
        if ($request->file('foto_ktp')->isValid()) {
            $foto_nama   = date('Ymdhis') . "." . $ext;
            $image_resize = Image::make($foto_user->getRealPath());
            $image_resize->resize(300, 300);
            $image_resize->save('img/images/' . $foto_nama);
            if ($file_old != null) {
                $path_old = 'img/images/' . $file_old;
                @unlink($path_old);
            }
            return $foto_nama;
        }
        return $file_old;
    }

    private function uploadSuratPengantar(Request $request, $file_old)
    {
        $surat = $request->file('surat_pengantar');
        $ext = $surat->getClientOriginalExtension();
        if ($request->file('surat_pengantar')->isValid()) {
            $foto_nama   = 'SP'.date('Ymdhis') . "." . $ext;
            $image_resize = Image::make($surat->getRealPath());
            $image_resize->resize(300, 300);
            $image_resize->save('dokumen/pengantar/' . $foto_nama);
            if ($file_old != null) {
                $path_old = 'dokumen/pengantar/' . $file_old;
                @unlink($path_old);
            }
            return $foto_nama;
        }
        return $file_old;
    }

    private function uploadSuratHilang(Request $request, $file_old)
    {
        $surat = $request->file('surat_hilang');
        $ext = $surat->getClientOriginalExtension();
        if ($request->file('surat_hilang')->isValid()) {
            $foto_nama   = 'SH'.date('Ymdhis') . "." . $ext;
            $image_resize = Image::make($surat->getRealPath());
            $image_resize->resize(300, 300);
            $image_resize->save('dokumen/kehilangan/' . $foto_nama);
            if ($file_old != null) {
                $path_old = 'dokumen/kehilangan/' . $file_old;
                @unlink($path_old);
            }
            return $foto_nama;
        }
        return $file_old;
    }

    private function uploadKK(Request $request, $file_old)
    {
        $surat = $request->file('kk');
        $ext = $surat->getClientOriginalExtension();
        if ($request->file('kk')->isValid()) {
            $foto_nama   = 'KK'.date('Ymdhis') . "." . $ext;
            $image_resize = Image::make($surat->getRealPath());
            $image_resize->resize(300, 300);
            $image_resize->save('dokumen/kk/' . $foto_nama);
            if ($file_old != null) {
                $path_old = 'dokumen/kk/' . $file_old;
                @unlink($path_old);
            }
            return $foto_nama;
        }
        return $file_old;
    }

    private function uploadScanKTP(Request $request, $file_old)
    {
        $surat = $request->file('ktp');
        $ext = $surat->getClientOriginalExtension();
        if ($request->file('ktp')->isValid()) {
            $foto_nama   = 'KTP'.date('Ymdhis') . "." . $ext;
            $image_resize = Image::make($surat->getRealPath());
            $image_resize->resize(300, 300);
            $image_resize->save('dokumen/ktp/' . $foto_nama);
            if ($file_old != null) {
                $path_old = 'dokumen/ktp/' . $file_old;
                @unlink($path_old);
            }
            return $foto_nama;
        }
        return $file_old;
    }

    private function uploadAktaNikah(Request $request, $file_old)
    {
        $surat = $request->file('akta_nikah');
        $ext = $surat->getClientOriginalExtension();
        if ($request->file('akta_nikah')->isValid()) {
            $foto_nama   = 'AH'.date('Ymdhis') . "." . $ext;
            $image_resize = Image::make($surat->getRealPath());
            $image_resize->resize(300, 300);
            $image_resize->save('dokumen/akta nikah/' . $foto_nama);
            if ($file_old != null) {
                $path_old = 'dokumen/akta nikah/' . $file_old;
                @unlink($path_old);
            }
            return $foto_nama;
        }
        return $file_old;
    }
}
