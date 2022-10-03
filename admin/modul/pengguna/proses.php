<?php

if (isset($_POST['tambah'])) {
	//Proses penambahan index
	$stmt = $mysqli->prepare("INSERT INTO tb_pengguna 
		(namapengguna,username,password) 
		VALUES (?,?,?)");

	$stmt->bind_param(
		"sss",
		$_POST['namapengguna'],
		$_POST['username'],
		$_POST['password']
	);

	if ($stmt->execute()) {
		echo "<script>alert('Data pengguna berhasil disimpan')</script>";
		echo "<script>window.location='index.php?hal=pengguna/data';</script>";
	} else {
		echo "<script>alert('Data pengguna Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}
} else if (isset($_POST['ubah'])) {

	//Proses ubah data
	$stmt = $mysqli->prepare("UPDATE tb_pengguna  SET 
		namapengguna=?,
		username=?,
		password=?
		where idpengguna=?");
	$stmt->bind_param(
		"ssss",
		$_POST['namapengguna'],
		$_POST['username'],
		$_POST['password'],
		$_POST['idpengguna']
	);
	if ($stmt->execute()) {
		echo "<script>alert('Data pengguna berhasil diubah')</script>";
		echo "<script>window.location='index.php?hal=pengguna/data';</script>";
	} else {
		echo "<script>alert('Data pengguna Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}
} else if (isset($_GET['hapus'])) {

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM tb_pengguna where idpengguna=?");
	$stmt->bind_param("s", $_GET['hapus']);

	if ($stmt->execute()) {
		echo "<script>alert('Data pengguna Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=pengguna/data';</script>";
	} else {
		echo "<script>alert('Data pengguna Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}
}
