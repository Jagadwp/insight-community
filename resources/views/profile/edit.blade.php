@extends('adminlte.master')

@section('content')
@foreach($users as $key => $pengguna)
    <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit Profile {{$pengguna->id}}</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="/profile/{{$pengguna->id}}" method="POST">
        @csrf
        @method('PUT')
      <div class="card-body">

        <div class="form-group">
          <label for="name">Nama</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $pengguna->name)}}" placeholder="Masukkan Nama">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $pengguna->email)}}" placeholder="Masukkan E-mail">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" class="form-control" id="password" name="password" value="{{ old('password', $pengguna->password)}}" placeholder="Masukkan Password">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

        <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir', $pengguna->tgl_lahir)}}" placeholder="Masukkan Tanggal lahir">
        @error('tgl_lahir')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat', $pengguna->alamat)}}" placeholder="Masukkan Alamat">
            @error('alamat')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

        <div class="form-group">
            <label for="no_telepon">Nomor Telepon</label>
            <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ old('no_telepon', $pengguna->no_telepon)}}" placeholder="Masukkan Nomor Telepon">
            @error('no_telepon')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="institusi">Institusi</label>
            <input type="text" class="form-control" id="institusi" name="institusi" value="{{ old('institusi', $pengguna->institusi)}}" placeholder="Masukkan Institusi">
            @error('institusi')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          {{-- input foto --}}
          <div class="form-group">
            <label for="exampleInputFile">Foto</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="exampleInputFile">
                <label class="custom-file-label" for="foto">Choose file</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text">Upload</span>
              </div>
            </div>
          </div>
        
        
        
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Update Profile</button>
      </div>
    </form>
  </div>
@endforeach   
@endsection