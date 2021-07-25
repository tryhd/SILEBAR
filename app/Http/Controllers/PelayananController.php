<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\warga;
use App\Pekerjaan;
use App\Kelurahan;
use App\Pelayanan;
use App\User;
use Session;
use App\Detailkk;
use File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
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
        $data=Pelayanan::orderby('status','asc')
                        ->orderby('id','asc')
                        ->get();
        return view ('Pelayanan.pelayanan-index',compact('data'));
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
        $data=Pelayanan::find($id);
        $istri=detailkk::where('no_kk',$data->Warga->no_kk)->where('status','Istri')->get();
        $suami=detailkk::where('no_kk',$data->Warga->no_kk)->where('status','Kepala Keluarga')->get();
        return view ('pelayanan.pelayanan-detail',compact('data','istri','suami'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data=Pelayanan::find($id);
        return view ('pelayanan.pelayanan-konfirmasi');
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

    public function Konfirmasi($id){
        $data=Pelayanan::find($id);
        $data->status='Selesai';
        $data->update();
        Session::flash('message', 'Pengajuan ' .$data->jenis_permohonan .' '.$data->warga->nama .' telah selesai!');
        Session::flash('type', 'success');
        return redirect()->route('pelayanan.index');
    }

    public function PengajuanKTPPemula(){
        $user=User::all();
        $kelurahans=Kelurahan::all();
        $data=Pelayanan::all();
        $kerjas=Pekerjaan::all();
        return view('PengajuanKTP.ktp-pemula',compact('user','data','kerjas','kelurahans'));
    }

    public function PostPengajuanKTPPemula(Request $request){
        //validasi
        $rules=[
            'nik'=>'required|numeric|unique:warga|digits:16',
            'no_kk'=>'required|numeric|digits:16',
            'nama'=>'required|alpha_spaces',
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
            'foto_ktp'=>'required|image|mimes:jpg,jpeg,png',
            'surat_pengantar'=>'required|mimes:jpg,jpeg,png',
            'kk'=>'required|mimes:jpg,jpeg,png,pdf',
        ];
        $message=[
            'nik.required'=>':attribute tidak boleh kosong!',
            'nik.numeric'=>':attribute tidak boleh selain angka!',
            'nik.digits'=>'attribute harus 16 digit!',
            'nik.unique'=>':attribute sudah terdaftar!',
            'no_kk.required'=>':attribute tidak boleh kosong!',
            'no_kk.numeric'=>':attribute tidak boleh selain angka',
            'no_kk.digits'=>':attribute harus 16 digits!',
            'nama.required'=>':attribute tidak boleh kosong!',
            'nama.alpha'=>':attribute tidak boleh selain huruf!',
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
            'foto_ktp.image'=>':attribute hanya boleh menggunakan file image',
            'foto_ktp.mimes'=>':attribute tidak boleh selain *jpg *jpeg *png!',
            'surat_pengantar.required'=>':attribute tidak boleh kosong!',
            'kk.required'=>'kartu keluaraga tidak boleh kosong!',
            'surat_pengantar.mimes'=>':attribute tidak boleh selain *jpg *jpeg *png',
            'kk.mimes'=>'Scan KK tidak boleh selain *jpg *jpeg *png ',
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
        Session::flash('message', 'Data Pengajuan '. $data->jenis_permohonan.' '. $wargas->nama.' berhasil disimpan!');
        Session::flash('type', 'success');
        return redirect()->route('dashboard.index');
    }

    public function KTPPemula(){
        $pelayanan=DB::select("SELECT *From pelayanan WHERE jenis_permohonan='KTP Pemula'");
        return view('pelayanan.index-ktppemula',compact('pelayanan'));
    }


    private function uploadFotoKTP(Request $request, $file_old)
    {
        $foto_ktp = $request->file('foto_ktp');
        $ext = $foto_ktp->getClientOriginalExtension();
        if ($request->file('foto_ktp')->isValid()) {
            $foto_nama   = 'SP'.date('Ymdhis') . "." . $ext;
            $image_resize = Image::make($foto_ktp->getRealPath());
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


        //------------------------------------- PERUBAHAN ---------------------//

        public function CariPerubahanKTP(){
            $users=User::all();
            $kelurahans=Kelurahan::all();
            $data=Pelayanan::all();
            $kerjas=Pekerjaan::all();
            $wargas = Warga::all();
            // $d = Warga::where('nama', 'like', '%' . $request->q . '%')->get();
            // dd($d);
            return view('PengajuanKTP.ktp-ubahdata-index',compact('wargas','users','data','kerjas','kelurahans'));
        }

        public function AjukanPerubahanKTP(Request $request){
            $search=$request->search;
            $data=Warga::query()->where('nik',$search)->get();
            return view ('pengajuanktp.ktp-perubahan',compact('data'));
        }

        public function PerubahanKTP($id)
        {
            //
            $users=User::all();
            $kelurahans=Kelurahan::all();
            $data=Pelayanan::all();
            $kerjas=Pekerjaan::all();
            $wargas = Warga::find($id);
            return view ('PengajuanKTP.ktp-ubahdata',compact('wargas','users','data','kerjas','kelurahans'));
        }

        public function PostEditKTPPemula(Request $request, $id){
            //validasi
            $rules=[
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
                'foto_ktp'=>'image|mimes:jpg,jpeg,png',
                'surat_pengantar'=>'required|image|mimes:jpg,jpeg,png',
                'kk'=>'required|image|mimes:jpg,jpeg,png',
                'ktp'=>'required|image|mimes:jpg,jpeg,png',
            ];
            $message=[
                'no_kk.required'=>':attribute tidak boleh kosong!',
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
                //'foto_ktp.required'=>':attribute tidak boleh kosong!',
                'surat_pengantar.required'=>':attribute tidak boleh kosong!',
                'surat_pengantar.mimes'=>':attribute tidak boleh selain *jpg *jpeg *png',
                'kk.required'=>':attribute tidak boleh kosong!',
                'kk.mimes'=>'Scan KK tidak boleh selain *jpg *jpeg *png ',
                'ktp.required'=>':attribute tidak boleh kosong!',
                'ktp.mimes'=>'KTP lama tidak boleh selain *jpg *jpeg *png ',
            ];
            //Get data
            $kerjas=Pekerjaan::all();


            //Input Data Perubahan Pelayanan
            $request->validate($rules,$message);
            $nama_foto=null;
            $surat_nama=null;
            $kk_nama=null;
            $ktplama_nama=null;
            if ($request->hasFile('foto_ktp')){
                $nama_foto=$this->uploadFotoKTP($request,$nama_foto);
            }
            if ($request->hasFile('kk')){
                $kk_nama=$this->uploadKK($request,$kk_nama);
            }
            if ($request->hasFile('ktp')){
                $ktplama_nama=$this->uploadScanKTP($request,$ktplama_nama);
            }
            if ($request->hasFile('surat_pengantar')){
                $surat_nama=$this->uploadSuratPengantar($request,$surat_nama);
            }
            $wargas= warga::find($id);
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
            if($nama_foto == null){
                $nama_foto=$wargas->foto_ktp;
            }else{
                $wargas->foto_ktp = $nama_foto;
            }
            //dd($request->all());
            $wargas->save();

            $data=new pelayanan;
            $data->surat_pengantar=$surat_nama;
            $data->kk=$kk_nama;
            $data->ktp=$ktplama_nama;
            $data->user_id=Auth()->user()->id;
            $data->jenis_permohonan='Perubahan Data KTP';
            $data->warga_id=$wargas->id;
            $data->status='Diproses';
            $data->tanggal=$wargas->updated_at;
            $data->save();
            // dd($data,$wargas);
            Session::flash('message', 'Data '.$data->jenis_permohonan . ' ' .$wargas->nama .' berhasil disimpan!');
            Session::flash('type', 'success');
            return redirect()->route('dashboard.index');
        }

        // public function approveUbahKTP($id)
        // {
        //     $user = user::all();
        //     $data= Pelayanan::find($id);
        //     return view ('PengajuanKTP.ktp-ubah-approve',compact('data','user'));
        // }

        // public function updateapproveUbahKTP(Request $request, $id)
        // {
        //     $data=Pelayanan::find($id);
        //     $data->status=$request->status;
        //     //dd($request->all());
        //     $data->save();
        //     Session::flash('message', 'Data '. $data->judul .' berhasil diUpdate!');
        //     Session::flash('type', 'success');
        //     return redirect()->route('perubahanKTP');
        // }

        // public function select2(Request $request)
        // {
        //     return Warga::where('nama', 'like', '%' . $request->q . '%')->get();
        // }
        //------------------------------- END PERUBAHAN ---------------------//

        //                      Kehilangan KTP
        public function CariKTPHilang(Request $request){
            $cari = $request->input('cari');
            $data = warga::query()->where('nik',$cari)->get();
            return view('pengajuanktp.ktp-hilang',compact('data'));
        }
        public function KTPHilang($id){
            $users=User::all();
            $kelurahans=Kelurahan::all();
            $data=Pelayanan::all();
            $kerjas=Pekerjaan::all();
            $wargas = Warga::find($id);
            return view('pengajuanKTP.ktp-formhilang',compact('users','kelurahans','data','kerjas','wargas'));
        }

        public function KTPHilangStore(Request $request,$id){
            $rules=[
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
                'foto_ktp'=>'image|mimes:jpg,jpeg,png',
                'surat_pengantar'=>'required|image|mimes:jpg,jpeg,png',
                'kk'=>'required|image|mimes:jpg,jpeg,png',
                'surat_kehilangan'=>'required|image|mimes:jpg,jpeg,png',
            ];
            $message=[
                'no_kk.required'=>':attribute tidak boleh kosong!',
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
                //'foto_ktp.required'=>':attribute tidak boleh kosong!',
                'surat_pengantar.required'=>':attribute tidak boleh kosong!',
                'kk.required'=>':attribute tidak boleh kosong!',
                'surat_pengantar.mimes'=>':attribute tidak boleh selain *jpg *jpeg *png',
                'kk.mimes'=>'Scan KK tidak boleh selain *jpg *jpeg *png ',
                'surat_kehilangan.required'=>':attribute tidak boleh kosong!',
                'surat_kehilangan.mimes'=>':attribute tidak boleh selain *jpg *jpeg *png',
            ];
            $request->validate($rules,$message);
            $nama_foto=null;
            $surat_nama=null;
            $kk_nama=null;
            $kehilangan_nama=null;
            if ($request->hasFile('foto_ktp')){
                $nama_foto=$this->uploadFotoKTP($request,$nama_foto);
            }
            if ($request->hasFile('kk')){
                $kk_nama=$this->uploadKK($request,$kk_nama);
            }
            if ($request->hasFile('surat_kehilangan')){
                $kehilangan_nama=$this->uploadSuratHilang($request,$kehilangan_nama);
            }
            if ($request->hasFile('surat_pengantar')){
                $surat_nama=$this->uploadSuratPengantar($request,$surat_nama);
            }
            $wargas= warga::find($id);
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
            if($nama_foto == null){
                $nama_foto=$wargas->foto_ktp;
            }else{
                $wargas->foto_ktp = $nama_foto;
            }
            //dd($request->all());
            $wargas->save();

            $data=new pelayanan;
            $data->surat_pengantar=$surat_nama;
            $data->kk=$kk_nama;
            $data->surat_kehilangan=$kehilangan_nama;
            $data->user_id=Auth()->user()->id;
            $data->jenis_permohonan='Kehilangan KTP';
            $data->warga_id=$wargas->id;
            $data->tanggal=$wargas->updated_at;
            $data->status='Diproses';
            $data->save();
            // dd($data,$wargas);
            Session::flash('message', 'Data pengajuan '.$data->jenis_permohonan . ' ' .$wargas->nama .' berhasil disimpan!');
            Session::flash('type', 'success');
            return redirect()->route('dashboard.index');

        }
        //                      END Kehilangan KTP
        //------------------------------------- PENDATANG ---------------------//

        // public function KTPPendatangIndex(){
        //     $wargas=DB::Select("SELECT w.id, w.nik ,w.nama, p.id, p.warga_id, p.jenis_permohonan, p.status
        //     FROM pelayanan p
        //     JOIN warga w
        //     where p.warga_id=w.id AND p.jenis_permohonan='KTP Pendatang'");
        //     return view('PengajuanKTP.ktp-pendatang-index',compact('wargas'));
        // }


        // public function approvektppendatang($id)
        // {
        //     $wargas= Warga::find($id);
        //     $pelayanan = Pelayanan::all();
        //     return view ('PengajuanKTP.ktp-pendatang-approve',compact('wargas','pelayanan'));
        // }

        // public function updateapprovektppendatang(Request $request, $id)
        // {
        //     $pelayanan=Pelayanan::find($id);
        //     $pelayanan->status=$request->status;
        //     //dd($request->all());
        //     $pelayanan->save();
        //     Session::flash('message', 'Data '. $pelayanan->nama .' berhasil diUpdate!');
        //     Session::flash('type', 'success');
        //     return redirect()->route('pendatangindex');
        // }

        public function PengajuanKTPPendatang(){
            $users=User::all();
            $kelurahans=Kelurahan::all();
            $data=Pelayanan::all();
            $kerjas=Pekerjaan::all();
            return view('PengajuanKTP.ktp-pendatang',compact('users','data','kerjas','kelurahans'));
        }

        public function PostPengajuanKTPPendatang(Request $request){
            //validasi
            $rules=[
                'nik'=>'required|numeric|unique:warga',
                'no_kk'=>'required|numeric',
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
                'foto_ktp'=>'required|image|mimes:jpg,jpeg,png',
                'surat_pengantar'=>'required|image|mimes:jpg,jpeg,png',
                'kk'=>'required|image|mimes:jpg,jpeg,png',
                'ktp'=>'required|image|mimes:jpg,jpeg,png',
            ];
            $message=[
                'nik.required'=>':attribute tidak boleh kosong!',
                'nik.unique'=>'attribute sudah terdaftar!',
                'no_kk.required'=>':attribute tidak boleh kosong!',
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
                'ktp.required'=>':attribute tidak boleh kosong!',
            ];
            //Get data
            $kerjas=Pekerjaan::all();


            //Input Data Pengajuan Pelayanan
            $request->validate($rules,$message);
            $nama_foto=null;
            $surat_nama=null;
            $kk_nama=null;
            $ktplama_nama=null;
            if ($request->hasFile('foto_ktp')){
                $nama_foto=$this->uploadFotoKTP($request,$nama_foto);
            }
            if ($request->hasFile('kk')){
                $kk_nama=$this->uploadKK($request,$kk_nama);
            }
            if ($request->hasFile('surat_pengantar')){
                $surat_nama=$this->uploadSuratPengantar($request,$surat_nama);
            }
            if ($request->hasFile('ktp')){
                $ktplama_nama=$this->uploadScanKTP($request,$ktplama_nama);
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
            $data->ktp=$ktplama_nama;
            $data->user_id=Auth()->user()->id;
            $data->jenis_permohonan='KTP Pendatang';
            $data->warga_id=$wargas->id;
            $data->status='Diproses';
            $data->tanggal=$wargas->created_at;
            $data->save();
            Session::flash('message', 'Data Pengajuan '. $data->jenis_permohonan . $wargas->nama.' berhasil diubah!');
            Session::flash('type', 'success');
            return redirect()->route('dashboard.index');
        }

        // -------------------------------- END PENDATANG

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
        $surat = $request->file('surat_kehilangan');
        $ext = $surat->getClientOriginalExtension();
        if ($request->file('surat_kehilangan')->isValid()) {
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
            $foto_nama   = 'AN'.date('Ymdhis') . "." . $ext;
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

    // ----------- KARTU KELUARGA
    //format tanggal
    public function date(){
        $date=date("Y-m-d");   //Format tanggal 2017-06-28
        return $date;
    }

    //cek data kk
    public function jumlahDatakk($date)
    {
       $check=detailkk::where('created_at',$date)->get()
                           ->count();
                            return $check;
    }

    public function FormKK(){
        $kelurahans=Kelurahan::all();
        return view('pengajuankk.kk-form',compact('kelurahans'));
    }

    public function PengajuanKKStore(Request $request){

        //validadi
        $rules=[
            'suami'=>'required|numeric|digits:16|min:0',
            'istri'=>'required|numeric|digits:16|min:0',
            'alamat'=>'required',
            'kelurahan'=>'required',
            'rt'=>'required|numeric|min:0',
            'rw'=>'required|numeric|min:0',
            'ayah_istri'=>'required|alpha_spaces',
            'ayah_suami'=>'required|alpha_spaces',
            'ibu_istri'=>'required|alpha_spaces',
            'ibu_suami'=>'required|alpha_spaces',
            'surat_pengantar'=>'required|image|mimes:png,jpg,jpeg',
            'akta_nikah'=>'required|image|mimes:png,jpg,jpeg'
        ];
        $message=[
            'suami.required'=>':attribute tidak boleh kosong!',
            'suami.numeric'=>':attribute hanya boleh angka!',
            'suami.min'=>':attribute tidak boleh kurang dari 0!',
            'suami.digits'=>':attribute tidak boleh kurang dari 16 digit angka!',
            'istri.required'=>':attribute tidak boleh kosong!',
            'istri.numeric'=>':attribute hanya boleh angka!',
            'istri.min'=>':attribute tidak boleh kurang dari 0!',
            'istri.digits'=>':attribute tidak boleh kurang dari 16 digit angka!',
            'rt.required'=>':attribute tidak boleh kosong!',
            'rt.numeric'=>':attribute tidak boleh selain angka!',
            'rt.min'=>':attribute tidak boleh kurang dari 0!',
            'rw.required'=>':attribute tidak boleh kosong!',
            'rw.numeric'=>':attribute tidak boleh selain angka!',
            'rw.min'=>':attribute tidak boleh kurang dari 0!',
            'alamat.required'=>':attribute tidak boleh kosong!',
            'kelurahan.required'=>':attribute tidak boleh kosong!',
            'ayah_istri.required'=>':attribute tidak boleh kosong!',
            'ayah_suami.required'=>':attribute tidak boleh kosong!',
            'ayah_suami.alpha_spaces'=>':attribute tidak boleh selain huruf!',
            'ayah_istri.alpha_spaces'=>':attribute tidak boleh selain huruf!',
            'ibu_istri.required'=>':attribute tidak boleh kosong!',
            'ibu_suami.required'=>':attribute tidak boleh kosong!',
            'ibu_suami.alpha_spaces'=>':attribute tidak boleh selain huruf!',
            'ibu_istri.alpha_spaces'=>':attribute tidak boleh selain huruf!',
            'surat_pengantar.required'=>':attribute tidak boleh kosong!',
            'surat_pengantar.image'=>':attribute tidak boleh selain file gambar!',
            'surat_pengantar.mimes'=>':attribute tidak boleh selain file *jpg, *png, *jpeg!',
            'akta_nikah.required'=>':attribute tidak boleh kosong!',
            'akta_nikah.image'=>':attribute tidak boleh selain file gambar!',
            'akta_nikah.mimes'=>':attribute tidak boleh selain file *jpg, *png, *jpeg!',

        ];
        //end validasi

        //generate no kk
        $kodearea=321530;
        $dateformat=explode("-",$this->date()); //2017-05-30  {format year-month-day}
        $tgl=$dateformat[2];
        $bln=$dateformat[1];
        $thn=substr($dateformat[0],2);

        $kodeurut=Detailkk::max('id'); //initial code akhir di kartukeluarga
        /*
        |----------------------------------------------------------
        | check data kartu keluarga denga kode area & tgl
        | permohonan yg sama
        |----------------------------------------------------------
        |
        */
        $cekData=$this->jumlahDatakk($this->date());

        if ($cekData>=1) {
           $get=$kodeurut+$cekData;
           $kodeurut=str_pad($get,4,"0",STR_PAD_LEFT);

        }else{

           $kodeurut=str_pad($kodeurut,4,"0",STR_PAD_LEFT);

        }
        // end generate

        $akta=Null;
        $surat=Null;
        $request->validate($rules,$message);
        if ($request->hasFile('akta_nikah')){
            $akta=$this->uploadAktaNikah($request,$akta);
        }
        if ($request->hasFile('surat_pengantar')){
            $surat=$this->uploadSuratPengantar($request,$surat);
        }
        $nik1=$request->suami;
        $nik2=$request->istri;
        $cariSuami=Warga::where('nik',$nik1)->first();
        $cariIstri=Warga::where('nik',$nik2)->first();

        //Cek Nik Suami Istri
        if($cariIstri != null && $cariSuami !=null){
            $dataSuami=Warga::where('nik',$nik1)->get();
            $dataIstri=Warga::where('nik',$nik2)->get();
            foreach($dataSuami as $suami){
            $detailSuami= New Detailkk;
            $detailSuami->no_kk=$kodearea.$tgl.$bln.$thn.$kodeurut+1;
            $detailSuami->warga_id=$suami->id;
            $detailSuami->status="Kepala Keluarga";
            $detailSuami->ayah=$request->ayah_suami;
            $detailSuami->ibu=$request->ibu_suami;
            $detailSuami->save();
            $suami->no_kk=$detailSuami->no_kk;
            $suami->alamat=$request->alamat;
            $suami->rt=$request->rt;
            $suami->rw=$request->rw;
            $suami->kelurahan=$request->kelurahan;
            $suami->status_perkawinan="KAWIN";
            $suami->update();
            }
            foreach($dataIstri as $istri){
                $detailIstri= New Detailkk;
                $detailIstri->no_kk=$detailSuami->no_kk;
                $detailIstri->warga_id=$istri->id;
                $detailIstri->status="Istri";
                $detailIstri->ayah=$request->ayah_istri;
                $detailIstri->ibu=$request->ibu_istri;
                $detailIstri->save();
                $istri->no_kk=$detailIstri->no_kk;
                $istri->alamat=$request->alamat;
                $istri->rt=$request->rt;
                $istri->rw=$request->rw;
                $istri->kelurahan=$request->kelurahan;
                $istri->status_perkawinan="KAWIN";
                $istri->update();
            }
            $data=New Pelayanan;
            $data->user_id=Auth()->user()->id;
            $data->warga_id=$suami->id;
            $data->status="Diproses";
            $data->tanggal=$detailSuami->updated_at;
            $data->jenis_permohonan="Pembuatan KK";
            $data->surat_pengantar=$surat;
            $data->akta_nikah=$akta;
            $data->save();
            //dd($detailSuami,$suami,$detailIstri,$istri,$data);
        //Aksi Nik Istri Tidak Ditemukan
        return redirect()->route('dashboard.index');
        }elseif($cariIstri == Null){
            Session::flash('message', 'Data NIK Istri tidak ditemukan');
            Session::flash('type', 'danger');
            return redirect()->back();
        //Aksi Nik suami Tidak Ditemukan
        }else{
            Session::flash('message', 'Data NIK Suami tidak ditemukan');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
}
