@extends('template.template')
@section('content')

 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <a href="{{url(Request::get('return_url'))}}" style="color: #000">
                <i class="fa fa-arrow-left"></i>
                <h3 class="box-title">Back</h3>
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="{{url(Request::url())}}">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kode Buku</label>
                  <div class="col-sm-10">
                    <input readonly="" type="text" class="form-control" id="kode_buku" placeholder="Kode buku" name="kode_buku" value="{{(isset($data)?$data->kode_buku:$kode)}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nama buku</label>
                  <div class="col-sm-10">
                    <input required="" type="text" class="form-control" placeholder="Nama buku" name="nama_buku" id="nama_buku" value="{{(isset($data)?$data->nama_buku:'')}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">No Telepon</label>
                  <div class="col-sm-10">
                    <input required="" type="number" class="form-control" placeholder="No Telepon" name="telp" id="telp" value="{{(isset($data)?$data->telp:'')}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <select required="" class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="{{(isset($data)?$data->jenis_kelamin:'')}}">
                      <option @if(isset($data)) @if($data->jenis_kelamin=='Laki laki') selected="" @endif @endif>Laki Laki</option>
                      <option @if(isset($data)) @if($data->jenis_kelamin=='Perempuan') selected="" @endif @endif>Perempuan</option>
                    </select>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-10">
                    <textarea required="" class="form-control" id="alamat" placeholder="Alamat" name="alamat"> {{(isset($data)?$data->alamat:'')}}</textarea>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="col-sm-2">&nbsp;</div>
                <div class="col-sm-10">
                <button type="submit" class="btn btn-info">Simpan</button>
                <a href="{{Request::get('return_url')}}" type="submit" class="btn btn-default">Batal</a>
              </div>
            </div>
              <!-- /.box-footer -->
            </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

@endsection