<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Article;
use File;

class ArticleController extends Controller
{
    public function index()
    {
        $users = Article::all();
        // dd($users);
        return view('article.index', compact('users'));
    }

    public function create()
    {
        return view('article.create');
    }

    public function store(Request $request)
    {
        \dd($request);
        $request->validate([
            'judul' => 'required|unique:Users',
            'isi' => 'required',
        ]);

        $user = Auth::user();
        $user->articles()->create($request->all());

        return redirect('/article')->with('success', 'Artikel berhasil dibuat');;
    }

    
    public function edit($id) 
    {
        $article = Article::where('id',$id)->get();

        return view('article.edit', compact('article'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required'
        ]);

        $update = Article::where('id', $id)->update([
            "judul" => $request["judul"],
            "isi" => $request["isi"]
        ]);

        return redirect('/article')->with('success', 'Artikel berhasil di edit!');
    }

    public function destroy($id)
    {
        Article::destroy($id);
        
        return redirect('/article')->with('success', 'article berhasil dihapus');
    }
}
