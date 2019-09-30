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
              <form action="{{url('/upload/proses/'.$data->id)}}" method="POST" enctype="multipart/form-data">
              	{{ csrf_field() }}
                
                    <textarea id="editor1" name="keterangan" rows="10" cols="80">
                    {{ $data->keterangan }}          
                    </textarea>
                   
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