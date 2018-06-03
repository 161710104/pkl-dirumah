<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = Comment::all();
        return view('comment.index',compact('a'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comment.create');
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
            'nama' => 'required|max:255',
            'email' => 'required',
            'isi_comment' => 'required',
        ]);

         $comments = new Comment;
         $comments->nama = $request->nama;
         $comments->email = $request->email;
         $comments->isi_comment = $request->isi_comment;
         $comments->save();
        return redirect()->route('comment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        $a = Comment::findOrFail($id);
        return view('comment.edit',compact('a'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required',
            'isi_comment' => 'required',
        ]);

         $comments = Comment::findOrFail($id);
         $comments->nama = $request->nama;
         $comments->email = $request->email;
         $comments->isi_comment = $request->isi_comment;
         $comments->save();
        return redirect()->route('comment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $a = Comment::findOrFail($id);
        $a->delete();
        return redirect()->route('comment.index');
    }
}
