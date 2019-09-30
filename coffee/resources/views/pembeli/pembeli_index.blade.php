@extends('template.template')

@section('content')

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">{{$page_titel}}</h3>
					<a href="{{ url('pembeli/create') }}" class="btn btn-info">Tambah Pembeli</a>
				</div>
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover" id="example1">
						<thead>
			                <tr>
			                  <th>#</th>
			                  <th>Kode Pembeli</th>
			                  <th>Nama Pembeli</th>
			                  <th>Alamat</th>
			                  <th>Action</th>
			                </tr>
		                </thead>
		                <tbody>
		                  @foreach($pembelis as $index=>$pembeli)
		                <tr>
		                  <td>{{$index+1}}</td>
		                  <td>{{$pembeli->kode_pembeli}}</td>
		                  <td>{{$pembeli->nama_pembeli}}</td>
		                  <td>{{$pembeli->alamat_pembeli}}</td>
		                  <td>
		                    <a href="{{url('pembeli/edit/'.$pembeli->id_pembeli)}}" class="btn-primary btn-xs" ><i class="fa fa-edit"></i></a>
		                    <a href="{{url('pembeli/delete/'.$pembeli->id_pembeli)}}" onclick="return confirm('Apakah anda yakin??')" class="btn-danger btn-xs" ><i class="fa fa-remove"></i></a>
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