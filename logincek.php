<?php
session_start();
require_once 'setting/koneksi.php';
require_once 'setting/crud.php';

$user = mysqli_real_escape_string($mysqli, $_POST['username']);
$pass = mysqli_real_escape_string($mysqli, $_POST['password']);

//Pengecekan ada data dalam login tidak
$sqladmin = "Select idpengguna from tb_pengguna where username='$user' and password='$pass'";

if (_cekData($mysqli, $sqladmin) == true) {
	//JIka data ditemukan
	$_SESSION['admin'] = _dataCustom($mysqli, $sqladmin);
	echo "<script>alert('Anda login sebagai Admin')</script>";
	echo "<script>window.location='admin/index.php?hal=dashboard';</script>";
} else {
	//Jika tidak ditemukan
	echo "<script>alert('Username atau password tidak terdaftar pada sistem')</script>";
	echo "<script>window.location='login.php';</script>";
}
