@extends('master.master')



@section('content')


<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">{{$title}}</h3>
          
        </div>
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover" id="example3">
            <thead>
                      <tr>
                         <th>#</th>
                         <th>Keterangan</th>
                         <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($data as $sj)
                    <tr>
                        <td>{{$sj->id}}</td>
                        <td>{{$sj->keterangan}}</td>
                        <td>
                          <a href="{{url('/sejarah/edit/'.$sj->id)}}" ><i class="fa fa-fw fa-edit"></i></a>
                          <a href="{{url('/sejarah/lihat/'.$sj->id)}}"><i class="fa fa-fw fa-search"></i></a>
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