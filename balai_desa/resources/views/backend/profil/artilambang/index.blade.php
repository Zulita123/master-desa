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
                     @foreach($data as $al)
                    <tr>
                        <td>{{$al->id}}</td>
                        <td>{{$al->keterangan}}</td>
                        <td>
                          <a href="{{url('/artilambang/edit/'.$al->id)}}" ><i class="fa fa-fw fa-edit"></i></a>
                          <a href="{{url('/artilambang/lihat/'.$al->id)}}"><i class="fa fa-fw fa-search"></i></a>
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