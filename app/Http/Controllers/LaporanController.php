<?php

namespace App\Http\Controllers;
use App\Warga;
use App\Pelayanan;
use App\Kegiatan;
use App\Kelurahan;
use App\Pekerjaan;
use App\User;
use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Kegiatan::all();
        $mulai=$request->mulai;
        $akhir=$request->akhir;
        $status=$request->status;
        $search=Kegiatan::query()
        ->Where('status',$status)
        ->whereBetween('created_at',[$mulai,$akhir])
        ->get();
        // dd($search);
        return view ('laporan.laporan-kegiatan-index',compact('data','search'));
    }

    public function pelayananindex(Request $request)
    {
        $user = User::all();
        $data = Pelayanan::all();
        $mulai=$request->mulai;
        $akhir=$request->akhir;
        $jenis=$request->jenis;
        $status=$request->status;
        $search=Pelayanan::whereBetween('created_at',[$mulai,$akhir])
        ->where('jenis_permohonan','like',"%$jenis%")
        ->Where('status',$status)->get();
        return view ('laporan.laporan-pelayanan-index',compact('data','search'));
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

    public function kegiatanpdf(Request $request)
    {
        $mulai=$request->mulai;
        $akhir=$request->akhir;
        $status=$request->status;
        $search=Kegiatan::with('user')
        ->Where('status',$status)
        ->whereBetween('created_at',[$mulai,$akhir])
        ->get();
        // dd($search);
        $pdf = PDF::loadView('pdf.kegiatan-pdf',compact('search','mulai','akhir'));
        return $pdf->download('Laporan-Kegiatan.pdf');
    }

    public function Pelayananpdf(Request $request)
    {
        $mulai=$request->mulai;
        $akhir=$request->akhir;
        $jenis=$request->jenis;
        $status=$request->status;
        $search=Pelayanan::with('user','warga')
        ->whereBetween('created_at',[$mulai,$akhir])
        ->where('jenis_permohonan','like',"%$jenis%")
        ->Where('status',$status)->get();
        // dd($search);
        $pdf = PDF::loadView('pdf.pelayanan-pdf',compact('search','mulai','akhir','jenis'));
        return $pdf->download('Laporan-Pelayanan.pdf');
    }
}
