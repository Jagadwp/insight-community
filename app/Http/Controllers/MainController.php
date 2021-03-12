<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Article;
use App\Article_has_tag;
use App\Comment;
use App\Tag;
use RealRashid\SweetAlert\Facades\Alert;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        // \dd($articles);
        // $comments = Comment::all();

        return view('main.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('main.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //memisahkan dengan koma ','
        $tag_temp = explode(',', $request['tag']);
        $tag_array = [];
        foreach ($tag_temp as $tag) {
            $tag_array[] = trim($tag);
        }

        // ambil atau create tag
        $tag_ids = [];
        foreach ($tag_array as $tag_name) {
            $tag = Tag::firstOrCreate(['nama' => $tag_name]);
            $tag_ids[] = $tag->id;
        }

        $request->validate([
            'judul' => 'required|unique:Articles',
            'isi' => 'required',
        ]);

        $user = Auth::user();
        $article = $user->articles()->create($request->all());
        
        //menambahkan ke artcle_id & tag_id tabel pivot
        $article->tags()->sync($tag_ids);

        Alert::success('Sukses!', 'Artikel berhasil dibuat!');        
        
        return redirect('/main');
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
        $article = Article::find($id);  

        return view('main.edit', ['article' => $article]);
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
            'judul' => 'required',
            'isi' => 'required'
        ]);

        $update = Article::where('id', $id)->update([
            "judul" => $request["judul"],
            "isi" => $request["isi"]
        ]);

        Alert::success('Sukses!', 'Artikel berhasil diedit!');

        return redirect('/main');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::where('article_id', $id)->delete();
        Article_has_tag::where('article_id', $id)->delete();
        Article::destroy($id);

        Alert::warning('Info', 'Artikel berhasil dihapus');

        return redirect('/main');
    }
}
