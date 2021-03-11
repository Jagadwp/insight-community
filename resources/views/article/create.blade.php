@extends('adminlte.master')
@section('content')
<div class="mx-3 mt-n3">    
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-judul">Buat Artikel</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="/article" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" 
                            value="{{ old('judul') }}" placeholder="Tulis Judul">
                        @error('judul')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi</label>
                        <textarea name="isi" class="form-control" id="isi" cols="30" rows="10" value="{{ old('isi') }}" placeholder="Tulis Isi"></textarea> 
                        @error('isi')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <a href="/article" class="btn btn-primary ml-1"><b>Submit Artikel</b></a>
                </div>
            </form>
        </div>
    </div>

@endsection
