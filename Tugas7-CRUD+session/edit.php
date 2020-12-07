<?php
session_start();
if(!isset($_SESSION['login'])){
	header("Location: login.php");
	exit;	
}
require 'functions.php';

$id = $_GET["id"];
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];   

if( isset($_POST["submit"])){
	if(edit($_POST) > 0){
		echo 
		"
			<script>
				alert('data berhasil diedit!');
				document.location.href = 'index.php';
			</script>
		";
	}
	else{
		echo
		"
			<script>
				alert('data gagal diubah!');
				document.location.href = 'index.php';
			</script>
		";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Data</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include 'navbar.php';?>
	<div class="kotak_login">
		<p class="tulisan_login">Edit Data Mahasiswa</p>
			<form action="" method="post">
				<input type="hidden" name="id" class="form_login" value="<?= $mhs["id"]; ?>">
				<label for="nim">Nim</label>
				<input type="text" name="nim" id="nim" class="form_login" required value="<?= $mhs["nim"]; ?>">
				<br>
				<label for="nama">Nama</label>
				<input type="text" name="nama" id="nama" class="form_login" required value="<?= $mhs["nama"]; ?>">
				<br>
				<label for="alamat">Alamat</label>
				<input type="text" name="alamat" id="alamat" class="form_login" required value="<?= $mhs["alamat"]; ?>">
				<br>
				<div align="center">
					<button class="submit" type="submit" name="submit">EDIT DATA</button>
				</div>
			</form>
</body>
</html>