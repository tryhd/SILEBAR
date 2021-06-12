<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\warga;
use App\Pekerjaan;
use App\PengajuanKK;
use App\PengajuanKTP;
use App\User;
use Session;
use File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
class PengajuanController extends Controller
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
        $data=PengajuanKTP::all();
        $kerjas=Pekerjaan::all();
        $wargas=warga::all();
        return view('PengajuanKTP.ktp-pemula',compact('user','data','kerjas','wargas'));
    }

    public function PostPengajuanKTPPemula(Request $request){
        //validasi
        $rules=[

        ];
        $message=[

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
