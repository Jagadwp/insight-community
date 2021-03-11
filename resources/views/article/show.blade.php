@extends('adminlte.master')
@section('content')
<section class="content">

      <div class="container-fluid">
        @forelse($article as $key => $artikel)
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h1><i class=""></i>{{ $article->judul }}</h1>
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="">{{ $article->isi }}</i>
                    <small class="float-right">Tanggal: 2/10/2014</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <!-- /.row -->

              <!-- Table row -->

              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">

                </div>
                <!-- /.col -->
                <div class="col-6">

                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        @empty
      <p>Belum ada artikel</p>
        @endforelse
      </div><!-- /.container-fluid -->

    </section>
    <a href="/article/create" class="btn btn-primary ml-2"><b>Tulis Artikel</b></a>
@endsection