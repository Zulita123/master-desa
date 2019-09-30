@extends('template.template')

@section('content')

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">{{$page_titel}}</h3>
					<a href="{{ url('ongkir/create') }}" class="btn btn-info">Tambah Ongkir</a>
				</div>
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover" id="example1">
						<thead>
			                <tr>
			                  <th>#</th>
			                  <th>Kode Ongkir</th>
			                  <th>Wilayah</th>
			                  <th>Harga</th>
			                  <th>Action</th>
			                </tr>
		                </thead>
		                <tbody>
		                  @foreach($ongkirs as $index=>$ongkir)
		                <tr>
		                  <td>{{$index+1}}</td>
		                  <td>{{$ongkir->kode_ongkir}}</td>
		                  <td>{{$ongkir->nama}}</td>
		                  <td>{{$ongkir->harga_ongkir}}</td>
		                  <td>
		                    <a href="{{url('ongkir/edit/'.$ongkir->id_ongkir)}}" class="btn-primary btn-xs" ><i class="fa fa-edit"></i></a>
		                    <a href="{{url('ongkir/delete/'.$ongkir->id_ongkir)}}" onclick="return confirm('Apakah anda yakin??')" class="btn-danger btn-xs" ><i class="fa fa-remove"></i></a>
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