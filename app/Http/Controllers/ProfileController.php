<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Profile;
use File;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index(){
        $profiles = Profile::all();

        return view('profile.index', compact('profiles'));
    }
    
    public function create(){
        return view('profile.create');
    }

    public function store(Request $request){
        $request->validate([
            'nama_lengkap' => 'required',
            'institusi' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required'
        ]);

        $user = Auth::user();
        $user->profile()->create($request->all());
        return redirect('/profile')->with('success', 'Profil berhasil dibuat');
    }
    
    public function edit($id) {
        $profile = profile::where('id',$id)->get();  

        return view('profile.edit', compact('profile'));
    }
    
    public function update($id, Request $request){
        $request->validate([
            'nama_lengkap' => 'required',
            'institusi' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required'
        ]);

        $update = Profile::where('id', $id)->update([
            "nama_lengkap" => $request["nama_lengkap"],
            "institusi" => $request["institusi"],
            "tgl_lahir" => $request["tgl_lahir"],
            "alamat" => $request["alamat"],
            "no_telepon" => $request["no_telepon"],
            "foto" => $request["foto"]
        ]);

        return redirect('/profile')->with('success', 'Profile berhasil diedit');
    }
    
    public function destroy($id)
    {
        Profile::destroy($id);
        
        return redirect('/profile')->with('success', 'Profile berhasil dihapus');
    }
}