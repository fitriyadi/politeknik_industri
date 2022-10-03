<?php
session_start();
require_once '../setting/koneksi.php';
require_once '../setting/crud.php';

$user = mysqli_real_escape_string($mysqli, $_POST['username']);
$pass = mysqli_real_escape_string($mysqli, $_POST['password']);

//Pengecekan ada data dalam login tidak
$sqluser = "Select idpegawai from tb_pegawai where nik='$user' and password='$pass'";

if (_cekData($mysqli, $sqluser) == true) {
    //JIka data ditemukan
    $_SESSION['user'] = _dataCustom($mysqli, $sqluser);
    echo "<script>alert('Anda login sebagai User Pegawai')</script>";
    echo "<script>window.location='index.php?hal=user_home';</script>";
} else {
    //Jika tidak ditemukan
    echo "<script>alert('Username atau password tidak terdaftar pada sistem')</script>";
    echo "<script>window.location='index.php?hal=login';</script>";
}
