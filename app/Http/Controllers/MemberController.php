<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = Member::all();
        return view('member.index',compact('a'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.create');
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
            'foto' => 'required|max:255',
            'nama' => 'required',
            'email' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required',
            'lokasi' => 'required',
            'alamat' => 'required',



        ]);

         $members = new Member;
         $members->nama = $request->nama;
         $members->email = $request->email;
         $members->jenis_kelamin = $request->jenis_kelamin;
         $members->no_hp = $request->no_hp;
         $members->lokasi = $request->lokasi;
         $members->alamat = $request->alamat;
         if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = str_random(6). '_'.$file->getClientOriginalName();
            $desinationPath = public_path() .DIRECTORY_SEPARATOR. 'img';
            $uploadSucces = $file->move($desinationPath, $filename);
            $members->foto = $filename;
        }
         $members->save();
        return redirect()->route('member.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        $a = Member::findOrFail($id);
        return view('member.edit',compact('a'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $request->validate([
            'foto' => 'required|max:255',
            'nama' => 'required',
            'email' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required',
            'lokasi' => 'required',
            'alamat' => 'required',



        ]);

         $a = Member::findOrFail($id);
         $members->nama = $request->nama;
         $members->email = $request->email;
         $members->jenis_kelamin = $request->jenis_kelamin;
         $members->no_hp = $request->no_hp;
         $members->lokasi = $request->lokasi;
         $members->alamat = $request->alamat;
         if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = str_random(6). '_'.$file->getClientOriginalName();
            $desinationPath = public_path() .DIRECTORY_SEPARATOR. 'img';
            $uploadSucces = $file->move($desinationPath, $filename);
            $members->foto = $filename;
        }
         $members->save();
        return redirect()->route('member.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $a = Member::findOrFail($id);
        $a->delete();
        return redirect()->route('member.index');
    }
}
