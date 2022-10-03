<?php
if (isset($_POST['tambah'])) {
	//Proses penambahan index
	$stmt = $mysqli->prepare("INSERT INTO tb_pegawai 
		(nik,nama,email,alamat,jabatan,password) 
		VALUES (?,?,?,?,?,?)");

	$stmt->bind_param(
		"ssssss",
		$_POST['nik'],
		$_POST['nama'],
		$_POST['email'],
		$_POST['alamat'],
		$_POST['jabatan'],
		$_POST['nik']
	);

	if ($stmt->execute()) {
		echo "<script>alert('Data pegawai berhasil disimpan')</script>";
		echo "<script>window.location='index.php?hal=pegawai/data';</script>";
	} else {
		echo "<script>alert('Data pegawai Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}
} else if (isset($_POST['ubah'])) {

	//Proses ubah data
	$stmt = $mysqli->prepare("UPDATE tb_pegawai  SET 
		nik=?,
		nama=?,
		email=?,
		alamat=?,
		jabatan=?
		where idpegawai=?");
	$stmt->bind_param(
		"ssssss",
		$_POST['nik'],
		$_POST['nama'],
		$_POST['email'],
		$_POST['alamat'],
		$_POST['jabatan'],
		$_POST['idpegawai']
	);

	if ($stmt->execute()) {
		echo "<script>alert('Data pegawai berhasil diubah')</script>";
		echo "<script>window.location='index.php?hal=pegawai/data';</script>";
	} else {
		echo "<script>alert('Data pegawai Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}
} else if (isset($_GET['hapus'])) {

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM tb_pegawai where idpegawai=?");
	$stmt->bind_param("s", $_GET['hapus']);

	if ($stmt->execute()) {
		echo "<script>alert('Data pegawai Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=pegawai/data';</script>";
	} else {
		echo "<script>alert('Data pegawai Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}
} else if (isset($_GET['reset'])) {

	//Proses hapus
	$stmt = $mysqli->prepare("update tb_pegawai set password=nik where idpegawai=?");
	$stmt->bind_param("s", $_GET['reset']);

	if ($stmt->execute()) {
		echo "<script>alert('Data password pegawai Berhasil Direset')</script>";
		echo "<script>window.location='index.php?hal=pegawai/data';</script>";
	} else {
		echo "<script>alert('Data password pegawai Gagal Direset')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}
}
