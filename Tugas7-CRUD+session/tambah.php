<?php
session_start();
require 'functions.php';

if(!isset($_SESSION['login'])){
	header("Location: login.php");
	exit;	
}

if( isset($_POST["submit"])){
	if(tambah($_POST) > 0){
		echo 
		"
			<script>
				alert('data berhasil ditambahkan');
				document.location.href = 'index.php';
			</script>
		";
	}
	else{
		echo
		"
			<script>
				alert('data gagal ditambahkan');
				document.location.href = 'index.php';
			</script>
		";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include 'navbar.php';?>
	<div class="kotak_login">
		<p class="tulisan_login">Tambah Data Mahasiswa</p>
			<form action="" method="post">
				<label for="nim">Nim</label>
				<input type="text" name="nim" id="nim" class="form_login" required>
				<br>
				<label for="nama">Nama</label>
				<input type="text" name="nama" id="nama" class="form_login" required>
				<br>
				<label for="alamat">Alamat</label>
				<input type="text" name="alamat" id="alamat" class="form_login" required>
				<br>
				<div align="center">
				<button type="submit" name="submit" class="submit">TAMBAH</button>
				</div>
			</form>
	</div>
</body>
</html>