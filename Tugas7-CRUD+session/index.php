<?php
session_start();
require 'functions.php';

if(!isset($_SESSION['login'])){
	header("Location: login.php");
	exit;	
}

$mahasiswa = query("SELECT * FROM mahasiswa");
?>

<DOCTYPE html>
<html> 
<head>
	<title>Data Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background-color: white;">
	<?php include 'navbar.php'?>
	<br>
	<div class="content" align="center">
		<caption align="center"><h1 style="color: #850785;">DATA MAHASISWA</h1></caption>
		<br>
		<br>
		<table class="table"	>
			<thead>
				<tr>
					<th>No</th>
					<th>Nim</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1; ?> 
				<?php foreach ($mahasiswa as $row ) : ?> 
				<tr>
					<td><?= $i; ?></td>
					<td><?= $row["nim"]; ?></td>
					<td><?= $row["nama"]; ?></td>
					<td><?= $row["alamat"]; ?></td>
					<td><a href="edit.php?id=<?= $row["id"];?>">edit</a> |<a href="hapus.php?id=<?= $row["id"];?>">hapus</a></td>	
				</tr>
				<?php $i++; ?>
				<?php endforeach ?>
			</tbody>
		</table>
		<a class="submit" href="tambah.php">Tambah Data</a>
	</div>
</table>
</body>
</html>