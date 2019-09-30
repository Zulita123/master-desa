
@if(Session::get('message')!='')
<span class="pesan-{{Session::get('message_type')}}">
	{{Session::get('message')}}
</span>
@endif

<br>
<a href="{{url('/users/add')}}">Tambah Data</a>
<br><br><br>
<table>
	<tr>
		<th>Nama</th>
		<th>Alamat</th>
		<th>No. Telp</th>
		<th>Action</th>
	</tr>
	@foreach($users as $row)
	<tr>
		<td>{{$row->nama}}</td>
		<td>{{$row->alamat}}</td>
		<td>{{$row->telp}}</td>
		<td>
			<a href="{{url('users/edit/'.$row->id)}}">Edit</a>
			<a href="{{url('users/hapus/'.$row->id)}}" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
		</td>
	</tr>
	@endforeach
</table>

<style type="text/css">
	table{
		width: 50%;
		border-collapse: collapse;
	}
	table tr th,table tr td{
		border: 1px solid #ddd;
		font-family: segoe ui;
		text-align: center;
		padding: 10px;
	}
	a{
		font-family: segoe ui;
		size:14px;
		padding: 10px;
	}
	.pesan-success{
		padding: 20px;
		background-color: green;
		color: #fff;
		width: 50%;
		border-radius: 5px;
		display: block;
		font-family: tahoma;
	}
	.pesan-warning{
		padding: 20px;
		background-color: orange;
		color: #fff;
		width: 50%;
		border-radius: 5px;
		display: block;
		font-family: tahoma;
	}
	.close{

	}
</style>