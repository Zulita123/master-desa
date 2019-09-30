@extends('master.master')


@section('content')


<section class="content">
    <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">{{$title}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form action="{{url('/upload/proses')}}" method="POST" enctype="multipart/form-data">
              	{{ csrf_field() }}
                    <div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Anggota</label>
                      <input type="text" name="nama" value="" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Jabatan</label>
                      <input type="text" name="jabatan" value="" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">File input gambar</label>
                      <input type="file" name="file_gambar" id="exampleInputFile">
                      <p class="help-block">Example block-level help text here.</p>
                    </div>
                	<div class="box-footer">
		                <button type="submit" class="btn btn-primary">Simpan</button>
		                <a href="{{Request::get('return_url')}}" class="btn btn-default">Cancel</a>
		             </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
    </section>



@stop