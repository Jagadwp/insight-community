<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Article;
use File;

class ArticleController extends Controller
{
    public function create(){
        return view('article.create');
}
public function store(Request $request){

    $request->validate([
        'isi' => 'required',
        'judul' => 'required|unique:Users',
        

    ]);

    $article = new Article;
    $article->judul = $request["judul"];
    $article->isi = $request["isi"];
    $article->save();

    return redirect('/article');
}
public function index(){
    $users = Article::all();
    // dd($users);
    return view('article.index', compact('users'));
}
public function edit($id) {
    $users = Article::all();

    return view('article.edit', compact('users'));
}

public function update($id, Request $request){
    $update = Article::where('id', $id)->update([
        "isi" => $request["isi"],
        "judul" => $request["judul"],
    ]);
    return redirect('/article')->with('success', 'Article berhasil di edit!');
}

public function destroy($id)
{
    $pengguna = Article::find($id);
    $pengguna->delete();
    return redirect('/article');
}
}
