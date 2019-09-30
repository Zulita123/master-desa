@extends('template.template')

@section('content')

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">{{$page_titel}}</h3>
					<a href="{{ url('menu/create') }}" class="btn btn-info">Tambah Menu</a>
				</div>
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover" id="example1">
						<thead>
			                <tr>
				                 <th>#</th>
				                 <th>Kode Menu</th>
				                 <th>Nama Menu</th>
				                 <th>Harga</th>
				                 <th>Keterangan</th>
				                 <th>Action</th>
			                </tr>
		                </thead>
		                <tbody>
		                  @foreach($menu as $index=>$p)
		                <tr>
			                  <td>{{$index+1}}</td>
			                  <td>{{$p->kode_menu}}</td>
			                  <td>{{$p->nama_menu}}</td>
			                  <td>{{$p->harga_menu}}</td>
			                  <td>{{$p->keterangan}}</td>
			                  <td>
			                    <a href="{{url('menu/edit/'.$p->id_menu)}}" class="btn-primary btn-xs" ><i class="fa fa-edit"></i></a>
			                    <a href="{{url('menu/delete/'.$p->id_menu)}}" onclick="return confirm('Apakah anda yakin??')" class="btn-danger btn-xs" ><i class="fa fa-remove"></i></a>
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