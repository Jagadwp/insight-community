<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
    public function create($artikel_id)
    {
        return view('comment.create', compact('artikel_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        
        $request->validate([
            'isi' => 'required'
        ]);
            
        $user = Auth::user();
        $article = Article::find($id);

        $article->comments()->create([
            'isi' => $request['isi'],
            'user_id' => $user->id
        ]);

        return redirect('/main')->with('success', 'Komentar berhasil ditambahkan');
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
        $comment = Comment::find($id);  

        return view('comment.edit', ['comment' => $comment]);
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
        $request->validate([
            'isi' => 'required'
        ]);

        $update = Comment::where('id', $id)->update([
            'isi' => $request['isi']
        ]);

        return redirect('/main')->with('success', 'Komentar berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::destroy($id);

        return redirect('/main')->with('success', 'Komentar berhasil dihapus');
    }
}
