@extends('adminlte.master')

@section('content')
<div class="mx-3 mt-n3">    
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-judul mb-0">Edit Komentar</h3>
            </div>
            <!-- /.card-header -->

            <!-- form start -->
            <form role="form" action="/comment/{{ $comment->id }}" method="POST" id="article-form">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="isi">Isi</label>
                        <textarea name="isi" class="form-control" id="isi" 
                            cols="30" rows="10"  placeholder="Tulis Isi">{{ old('isi', $comment->isi ) }}
                        </textarea> 
                            @error('isi')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button class="btn btn-primary ml-1"><b>Submit Komentar</b></button>
                </div>
            </form>
        </div>
    </div>

@endsection
