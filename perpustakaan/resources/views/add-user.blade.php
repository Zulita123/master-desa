<h1>
	{{$judul}}
</h1>
<hr>

<form action="{{$url}}" method="POST">

	{{csrf_field()}}
	<input type="hidden" name="id" value="{{(isset($edit))?$edit->id:''}}">

	Nama<br>
	<input type="text" name="nama" value="{{(isset($edit))?$edit->nama:''}}" ><br>
	No. Telp<br>
	<input type="text" name="telp" value="{{(isset($edit))?$edit->telp:''}}"><br>
	Alamat<br>
	<textarea rows="3" name="alamat" >{{(isset($edit))?$edit->alamat:''}}</textarea><br>
	Password<br>
	<input type="password" name="password">
	<br>
	@if(isset($edit))
		<i>Biarkan kosong jika tidak ingin merubah password</i>
	@endif
	<br><br>
	<button type="submit"><b>SIMPAN</button>
</form>
<style type="text/css">
	input,textarea{
		width: 50%;
		font-family: segoe ui;
		padding: 10px;
		border-collapse: 1px solid #ddd;
		border-radius: 2%;
	}
	form{
		width: 100%;
		font-family: segoe ui;
	}
	button{
		padding: 10px;
		border-radius: 10%;
		background-color: #ddd;
		font-family: segoe ui;
		color: #333;
	}
	button:hover{
		background-color: #3cbfe0;
		transition: 1s;
	}
</style>