@extends('template.template')

@section('content')

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
					<form role="form" class="form-horizontal" action="{{ url('ongkir/update/'.$ongkir->id_ongkir) }}" method="POST">
						 {{ csrf_field() }}
						<div class="box-body">
							<div class="form-group">
								<label class="col-sm-3 control-label">Kode Ongkir</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="kode_ongkir" readonly="" value="{{ $ongkir->kode_ongkir }}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Wilayah</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" placeholder="Wilayah" name="nama"  value="{{ $ongkir->nama }}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Harga</label>
								<div class="col-sm-4">
									<input type="number" name="harga_ongkir" class="form-control" placeholder="Harga" value="{{$ongkir->harga_ongkir}}">
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