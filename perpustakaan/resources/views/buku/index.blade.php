@extends('template.template')
@section('content')

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{$page_titel}}</h3>
              <a href="{{url(config('app.admin_path').'/buku/add?return_url='.Request::url())}}" class="btn btn-primary btn-sm">
              	<i class="fa fa-plus"></i> <span>Add</span>
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Kode Buku</th>
                  <th>Nama Buku</th>
                  <th>Pengarang</th>
                  <th>Tahun Terbit</th>
                  <th>File Buku</th>
                  <th>Sampul</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                	@foreach($data as $row)
                <tr>
                  <td>{{$row->kode_buku}}</td>
                  <td>{{$row->nama_buku}}</td>
                  <td>{{$row->pengarang}}</td>
                  <td>{{$row->tahun_terbit}}</td>
                  <td>{{$row->file_buku}}</td>
                  <td>{{$row->sampul}}</td>
                  <td>
                  	<a href="{{url(config('app.admin_path').'/buku/edit/'.$row->id.'?return_url='.Request::url())}}" class="btn btn-warning btn-xs">
                  		<i class="fa fa-edit"></i>
                  	</a>
                    <a href="{{url(config('app.admin_path').'/buku/delete
                    /'.$row->id.'?return_url='.Request::url())}}" onclick="return confirm('Apakah anda Yakin??')" class="btn btn-danger btn-xs">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
                </tr>
                	@endforeach
                </tbody>
                <tfoot>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

@endsection