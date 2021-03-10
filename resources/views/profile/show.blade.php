@extends('adminlte.master')

@section('content')

<div class="container-fluid">

  @forelse($users as $key => $pengguna)

    <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">profile</li>
          </ol>
        </div>
      </div>
    <div>
      <div>
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="{{ asset('/adminlte/dist/img/user4-128x128.jpg')}}" alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">{{ $pengguna->name }}</h3>

            <p class="text-muted text-center">{{ $pengguna->email }}</p>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        
        <!-- About Me Box -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">About Me</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <strong><i class="fas fa-book mr-1"></i> Intitusi</strong>
            <p class="text-muted">
              {{ $pengguna->institusi }}
            </p>

            <hr>

            <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
            <p class="text-muted">{{ $pengguna->alamat }}</p>

            <hr>

            <strong><i class="fas fa-phone-alt mr-1"></i> Nomor Telepon</strong>
            <p class="text-muted">{{ $pengguna->no_telepon }}</p>

            <hr>

            <strong><i class="far fa-file-alt mr-1"></i> Tanggal Lahir</strong>

            <p class="text-muted">{{ $pengguna->tgl_lahir }}</p>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <a href="/profile/{{$pengguna->id}}/edit" class="btn btn-primary btn-block"><b>Edit Profile</b></a>

      <form action="/profile/{{ $pengguna->id }}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Hapus Profile" class="btn btn-danger btn-block mt-2">
      </form>

    </div>
    <!-- /.row -->
    @empty
      <p>No Profile</p>
      <a href="/profile/create" class="btn btn-primary"><b>Buat Profile!</b></a>


    @endforelse
  </div>

  
 
  @endsection