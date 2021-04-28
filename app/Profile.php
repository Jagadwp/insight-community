<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['nama_lengkap', 'institusi', 'tgl_lahir', 'alamat', 'no_telepon', 'foto', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
