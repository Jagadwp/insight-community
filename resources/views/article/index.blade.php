@extends('adminlte.master')

@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="callout callout-info">
            <h1><i class=""></i> Judul Artikel</h1>
          </div>

              <!-- Main content -->
              <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                  <div class="col-12">
                    <h4>
                      <i class=""></i> Tulis Artikel
                      <small class="float-right">Tanggal: 2/10/2014</small>
                    </h4>
                  </div>
                </div>

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
        </div><!-- /.container-fluid -->
      </section>
      <a href="/article/create" class="btn btn-primary ml-2"><b>Tulis Artikel</b></a>
@endsection