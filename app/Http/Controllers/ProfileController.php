<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Profile;
use RealRashid\SweetAlert\Facades\Alert;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $profiles = Profile::where('user_id', $user->id)->get(); 
        
        return view('profile.index', compact('profiles'));
    }
    
    public function create()
    {
        return view('profile.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'institusi' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required'
        ]);

        $user = Auth::user();
        
        $data = $request->all();
        $linkFoto =  $request->file('foto')->store('public/Foto_Profil');
        $data['foto'] = substr($linkFoto, 6);
        
        $user->profile()->create($data);
        
        // $data['user_id'] = 3;
        // $profile = Profile::create($data);
        // if ($profile) {
        //     Alert::success('Sukses!', 'Profil berhasil dibuat!');
        //     $response = [
        //         'code' => 201,
        //         'status' => 'Success',
        //         'data-profil' => $profile
        //     ];
        //     return response($response, 201);
        // }
        // $response = [
        //     'code' => 406,
        //     'status' => 'Failed',
        //     'data' => "error"
        // ];
        // return response($response, 406);
        
        return redirect('/profile');
    }
    
    public function edit($id) 
    {
        $profile = profile::where('id',$id)->get();  

        return view('profile.edit', compact('profile'));
    }
    
    public function update($id, Request $request)
    {
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

        Alert::success('Sukses!', 'Profil berhasil diedit!');
        
        return redirect('/profile');
    }
    
    public function destroy($id)
    {
        Profile::destroy($id);

        Alert::warning('Info', 'Profil berhasil dihapus!');

        return redirect('/profile');
    }
}
