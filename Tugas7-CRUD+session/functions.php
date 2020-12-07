<?php
$conn = mysqli_connect("localhost", "root", "", "db_mahasiswa");
 
function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;	
}

function tambah($data){
	global $conn;
	$nim = htmlspecialchars($data["nim"]);
	$nama = htmlspecialchars($data["nama"]);
	$alamat = htmlspecialchars($data["alamat"]);

	$query = "INSERT INTO mahasiswa VALUES ('','$nim','$nama','$alamat')";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function hapus($id){
	global $conn;
	mysqli_query($conn, " DELETE FROM mahasiswa WHERE id = $id ");
	return mysqli_affected_rows($conn);
}

function edit($data){
	global $conn;
	$id	= $data["id"];
	$nim = htmlspecialchars($data["nim"]);
	$nama = htmlspecialchars($data["nama"]);
	$alamat = htmlspecialchars($data["alamat"]);

	$query = "UPDATE mahasiswa SET 
				nim = '$nim',
				nama = '$nama',
				alamat = '$alamat'
				WHERE id = $id";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}
?>