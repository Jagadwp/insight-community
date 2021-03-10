<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use File;

class ProfileController extends Controller
{
    public function create(){
        return view('profile.create');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:Users',
            'password' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'institusi' => 'required'
            

        ]);

        $profile = new User;
        $profile->name = $request["name"];
        $profile->email = $request["email"];
        $profile->password = $request["password"];
        $profile->tgl_lahir = $request["tgl_lahir"];
        $profile->alamat = $request["alamat"];
        $profile->no_telepon = $request["no_telepon"];
        $profile->institusi = $request["institusi"];
        $profile->foto = $request["foto"];
        $profile->save();

        return redirect('/profile');
    }
    public function index(){
        $users = User::all();
        // dd($users);
        return view('profile.show', compact('users'));
    }
    public function edit($id) {
        $users = User::all();

        return view('profile.edit', compact('users'));
    }
    
    public function update($id, Request $request){
        $update = User::where('id', $id)->update([
            "name" => $request["name"],
            "email" => $request["email"],
            "password" => $request["password"],
            "tgl_lahir" => $request["tgl_lahir"],
            "alamat" => $request["alamat"],
            "no_telepon" => $request["no_telepon"],
            "institusi" => $request["institusi"],
            "foto" => $request["foto"]
        ]);
        return redirect('/profile')->with('success', 'Profile berhasil di edit!');
    }
    
    public function destroy($id)
    {
        $pengguna = User::find($id);
        $pengguna->delete();
        return redirect('/profile');
    }
}
