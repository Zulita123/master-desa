@extends('master.master')



@section('content')


<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">{{$title}}</h3>
          <div>
            <a href="{{url('upload')}}"><i class="fa fa-fw fa-plus"></i></a>
          </div>
          
        </div>
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover" id="example3">
            <thead>
                      <tr>
                         <th>#</th>
                         <th>Nama</th>
                         <th>Jabatan</th>
                         <th>File Gambar</th>
                         <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($data as $dt)
                    <tr>
                        <td>{{$dt->id}}</td>
                        <td>{{$dt->nama}}</td>
                        <td>{{$dt->jabatan}}</td>
                        <td><img width="150px" src="{{ url('/data_file/'.$dt->file_gambar)}}"></td>
                        <td>
                          <a href="{{url('/pemerintah/edit/'.$dt->id)}}" ><i class="fa fa-fw fa-edit"></i></a>
                          <a href="{{url('/upload/hapus/'.$dt->id)}}"><i class="fa fa-fw fa-delete"></i></a>
                          <a href="{{url('/pemerintah/lihat/'.$dt->id)}}"><i class="fa fa-fw fa-search"></i></a>
                        </td>
                    </tr>
                    @endforeach
                  
                    </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection