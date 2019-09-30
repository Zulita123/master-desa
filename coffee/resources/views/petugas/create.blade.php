@extends('template.template')

@section('content')

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
					<form role="form" class="form-horizontal" action="{{ url('petugas/store') }}" method="POST">
						 {{ csrf_field() }}
						<div class="box-body">
							<div class="form-group">
								<label class="col-sm-3 control-label">Nama Petugas</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" placeholder="Nama Petugas" name="name"  value="{{ old('name') }}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Email</label>
								<div class="col-sm-4">
									<input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Password</label>
								<div class="col-sm-4">
									<input type="password" name="password" class="form-control" placeholder="Email" value="{{ old('password') }}">
								</div>
							</div>
						</div>
						<div class="box-footer">
		                <div class="col-sm-2">&nbsp</div>
		                  <div class="col-sm-4" style="padding: 0">
		                    <button type="submit" class="btn btn-primary">Tambah</button>
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