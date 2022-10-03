<?php
session_start();
require_once '../setting/koneksi.php';
require_once '../setting/crud.php';

//Proses ubah data
$statuscomplete = "0";
$stmt = $mysqli->prepare("UPDATE tb_pengajuan  SET 
		is_notif=?
		where idpengajuan=?");
$stmt->bind_param(
    "ss",
    $statuscomplete,
    $_GET['id']
);

if ($stmt->execute()) {
    echo "<script>alert('Data konfirmasi berhasil diubah')</script>";
    echo "<script>window.location='index.php?hal=user_home';</script>";
} else {
    echo "<script>alert('Data konfirmasi Gagal diubah')</script>";
    echo "<script>window.location='javascript:history.go(-1)';</script>";
}
