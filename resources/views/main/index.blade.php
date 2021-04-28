@extends('adminlte.master')

@section('content')
    <a href="main/create" class="btn btn-primary ml-5 mt-n3"><b>Buat artikel baru</b></a>

    @if (session('success'))
        <br>
        <a class="btn btn-success text-light ml-5 mt-2 mb-n1"><b>{{ session('success') }}</b></a>
    @endif
    
    @forelse ($articles as $key => $article)
        <div class="post mx-5 pb-2 mt-4" style="box-shadow:0 4px 8px 0 rgb(0 0 0 / 20%); background-color:rgb(255, 255, 255)">
            <div class="px-5">
                <div class="py-3">
                    <div class="row">
                        <h3 class="text-primary">{{ $article->judul }}</h3>
                    </div>
                    <div class="row">
                        @if (Auth::check() && Auth::user()->profile()->exists())
                            <div class="description text-primary">{{ $article->user->profile->nama_lengkap }}</div>
                        @else
                            <div class="description text-primary">{{ $article->user->name }}</div>
                        @endif
                        <div class="description ml-2">{{ $article->created_at }}</div>
                        <div class="d-flex flex-row mt-n2 mr-n3 ml-auto">
                            <a href="/main/{{ $article->id }}/edit" class="btn btn-default mx-1">Edit</a>
                            <form action="/main/{{ $article->id }}" method="POST" class="mx-1">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Hapus">
                            </form>
                        </div>

                    </div>
                    
                </div>
                <!-- /.user-block -->
                <p>
                    {{ $article->isi }} 
                </p>
                <p>
                    <div class="tags-container d-flex">
                        <a href="#" class="link-black text-sm mr-n2"><i class="fas fa-tags"></i>Tags: </a>
                        <ul class="d-flex ml-n4" style="list-style: none;">
                            {{-- List Tags --}}
                            @forelse ($article->tags as $tag)
                                <li class="mr-2 btn-sm btn-info px-1 py-0">{{ $tag->nama }}</li>
                            @empty
                                <li class="mr-2 btn-sm btn-info px-1 py-0">Tanpa Tag</li>
                            @endforelse
                        </ul>
                        <span class="ml-auto">
                            <a href="/comment/{{ $article->id }}/create" class="link-black text-sm">
                                <i class="far fa-comments mr-1"></i>
                                {{-- <span class="total-comment">(2)</span> --}}
                                Tambah komentar
                            </a>
                        </span>
                    </div>
                </p>
            </div>
        </div>

        {{--list komentar --}}
        @forelse ($article->comments as $temp => $comment)
            <div class="post mr-5 pb-1 mb-1" 
                style="box-shadow:0 4px 8px 0 rgb(0 0 0 / 20%); 
                background-color:rgb(255, 255, 255);
                margin-left: 7vw; border-left: 5px solid #007bff;">
                <div class="px-5">
                    <div class="py-2">
                        <div class="row">
                            @if (Auth::check() && Auth::user()->profile()->exists())
                                <p class="text-primary">{{ $comment->user->profile->nama_lengkap }}</p>
                            @else
                                <p class="text-primary">{{ $comment->user->name }}</p>
                            @endif
                            <div class="description ml-2 my-0">{{ $comment->created_at }}</div>
                            <div class="d-flex py-n3 ml-auto">
                                <a href="/comment/{{ $comment->id }}/edit" class="btn btn-default mx-1">Edit</a>
                                <form action="/comment/{{ $comment->id }}" method="POST" class="ml-1 mr-n2">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="Hapus">
                                </form>
                            </div>
                        
                        </div>
                    </div>
                    <!-- /.user-block -->
                    <div style="padding-right: 15vw">
                        <p class="mb-2 mt-n3" style="font-size:0.9rem">
                            {{ $comment->isi }}
                        </p>
                    </div>
                </div>
            </div>    
        @empty
            <div class="card mx-5 py-1 pl-3" style="width: 19%">
                Belum ada komentar
            </div>  
        @endforelse
        {{-- forelse comments end --}}
        <hr>
    @empty
        <div class="ml-5 pl-2 mt-3">Tidak ada data</div>  
    @endforelse  
    {{-- forelse content end --}}
@endsection