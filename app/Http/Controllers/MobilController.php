<?php

namespace App\Http\Controllers;

use App\Mobil;
use App\Merk;
use App\Member;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = Mobil::with('Merk','Member')->get();
        return view('mobil.index',compact('a'));
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $a = Merk::all();
        $b = Member::all();
        return view('merk.create',compact('a','b'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|max:255',
            'nama' => 'required',
            'warna' => 'required',
            'transmisi' => 'required',
            'varian' => 'required',
            'cakupan_mesin' => 'required',
            'penumpang' => 'required',
            'kilometer' => 'required',
            'tahun_keluar' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'merk_id' => 'required',
            'tipe' => 'required',
            'member_id' => 'required',


        ]);

         $mobils = new Mobil;
         $mobils->nama = $request->nama;
         $mobils->warna = $request->warna;
         $mobils->transmisi = $request->transmisi;
         $mobils->varian = $request->varian;
         $mobils->cakupan_mesin = $request->cakupan_mesin;
         $mobils->penumpang = $request->penumpang;
         $mobils->kilometer = $request->kilometer;
         $mobils->tahun_keluar = $request->tahun_keluar;
         $mobils->harga = $request->harga;
         $mobils->deskripsi = $request->deskripsi;
         $mobils->merk_id = $request->merk_id;
         $mobils->tipe = $request->tipe;
         $mobils->member_id = $request->member_id;
         
         if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = str_random(6). '_'.$file->getClientOriginalName();
            $desinationPath = public_path() .DIRECTORY_SEPARATOR. 'img';
            $uploadSucces = $file->move($desinationPath, $filename);
            $mobils->gambar = $filename;
        }
         $mobils->save();
        return redirect()->route('mobil.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function show(Mobil $mobil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function edit(Mobil $mobil)
    {
        $b = Mobil::findOrFail($id);
        $a = Merk::all();
        $c = Member::all();
        $selectedMK = Mobil::findOrFail($id)->merk_id;
        $selectedMB = Mobil::findOrFail($id)->member_id;
        return view('tipe.edit',compact('a','b','selectedMK','selectedMB'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mobil $mobil)
    {
        $request->validate([
            'gambar' => 'required|max:255',
            'nama' => 'required',
            'warna' => 'required',
            'transmisi' => 'required',
            'varian' => 'required',
            'cakupan_mesin' => 'required',
            'penumpang' => 'required',
            'kilometer' => 'required',
            'tahun_keluar' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'merk_id' => 'required',
            'tipe' => 'required',
            'member_id' => 'required',


        ]);

         $b = Mobil::findOrFail($id);
         $mobils->nama = $request->nama;
         $mobils->warna = $request->warna;
         $mobils->transmisi = $request->transmisi;
         $mobils->varian = $request->varian;
         $mobils->cakupan_mesin = $request->cakupan_mesin;
         $mobils->penumpang = $request->penumpang;
         $mobils->kilometer = $request->kilometer;
         $mobils->tahun_keluar = $request->tahun_keluar;
         $mobils->harga = $request->harga;
         $mobils->deskripsi = $request->deskripsi;
         $mobils->merk_id = $request->merk_id;
         $mobils->tipe = $request->tipe;
         $mobils->member_id = $request->member_id;
         
         if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = str_random(6). '_'.$file->getClientOriginalName();
            $desinationPath = public_path() .DIRECTORY_SEPARATOR. 'img';
            $uploadSucces = $file->move($desinationPath, $filename);
            $mobils->gambar = $filename;
        }
         $mobils->save();
        return redirect()->route('mobil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mobil $mobil)
    {
        $a = Mobil::findOrFail($id);
        $a->delete();
        return redirect()->route('mobil.index');
    }
}
