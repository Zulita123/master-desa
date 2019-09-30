@extends('template.template')

@section('content')

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
					<form role="form" class="form-horizontal" action="{{ url('pembeli/update/'.$pembeli->id_pembeli) }}" method="POST">
						 {{ csrf_field() }}
						<div class="box-body">
							<div class="form-group">
								<label class="col-sm-3 control-label">Kode Pembeli</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="kode_pembeli" readonly="" value="{{ $pembeli->kode_pembeli }}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Nama Pembeli</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" placeholder="Nama Pembeli" name="nama_pembeli"  value="{{ $pembeli->nama_pembeli }}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Alamat</label>
								<div class="col-sm-4">
									<textarea rows="3" class="form-control" placeholder="Nama Pembeli" name="alamat_pembeli">{{$pembeli->alamat_pembeli}}</textarea>
								</div>
							</div>
						</div>
						<div class="box-footer">
		                <div class="col-sm-2">&nbsp</div>
		                  <div class="col-sm-4" style="padding: 0">
		                    <button type="submit" class="btn btn-primary">Edit</button>
		                    <span class="submitLoading" style="display: none;"><img src="{{ asset('loading.gif') }}"></span>
		                    <a href="{{Request::get('return_url')}}" class="btn btn-default">Cancel</a>
		                  </div>
		              </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>


@endsection

@section('scripts')

<script type="text/javascript">
	$(document).ready(function(){
		$("button[type='submit']").click(function(){
			$('.submitLoading').show();
		});
	});
</script>

@endsection