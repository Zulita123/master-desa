 @extends('template.template')
 @section('content')
<section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{$page_titel}}</h3>
              <a href="{{url('petugas/create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"> Add</i></a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Petugas</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($petugas as $index=>$n)
                <tr>
                  <td>{{$index+1}}</td>
                  <td>{{$n->name}}</td>
                  <td>{{$n->email}}</td>
                  <td>{{$n->password}}</td>
                  <td>
                    <a href="{{url('petugas/edit/'.$n->id)}}" class="btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                    <a href="{{url('petugas/delete/'.$n->id)}}" onclick="return confirm('Apakah anda yakin??')" class="btn-danger btn-xs"><i class="fa fa-remove"></i></a>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
 @endsection

 @section('scripts')

<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script>
  $(document).ready(function(){
    var flash = "{{ Session::has('pesan') }}";
    if(flash){
      var pesan = "{{ Session::get('pesan') }}";
      swal('success', pesan, 'success');
    }

  });
</script>

@endsection