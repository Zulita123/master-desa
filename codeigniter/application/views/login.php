<!DOCTYPE html>
<html>
<head>
	<title>FROM LOGIN</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/login.css">
</head>
<body>
<form action="<?php echo site_url('Login_Controller/aksi_login')?>" method="POST">
	<div class="kotak-judul">
		<p>Inventary System</p>
	</div>
	<div class="kotak-wadah">
		<div class="kotak-d-isi">
			<div class="kotak-isi">
				<input type="text" name="username" placeholder="Username" class="kotak">
			</div>
			<div class="kotak-isi">
				<input type="password" name="password" placeholder="Password" class="kotak">
			</div>
			<div class="kotak-tombol">
				<input type="submit" value="Login" class="button" name="">
			</div>
		</div>
	</div>
</form>
</body>
</html>