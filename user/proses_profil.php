<?php
session_start();
require_once '../setting/koneksi.php';
require_once '../setting/crud.php';

$idpegawai = mysqli_real_escape_string($mysqli, $_POST['idpegawai']);
$passdb = mysqli_real_escape_string($mysqli, $_POST['passworddb']);
$passlama = mysqli_real_escape_string($mysqli, $_POST['passwordlama']);
$passbaru = mysqli_real_escape_string($mysqli, $_POST['passwordbaru']);
$passkonfirmasi = mysqli_real_escape_string($mysqli, $_POST['passwordkonfirmasi']);

if ($passkonfirmasi != $passbaru) {
    echo "<script>alert('Passsword konfirmasi dan password baru tidak sesuai')</script>";
    echo "<script>window.location='index.php?hal=user_profil';</script>";
} else if ($passdb != $passlama) {
    echo "<script>alert('password lama tidak sesuai')</script>";
    echo "<script>window.location='index.php?hal=user_profil';</script>";
} else {
    //Proses ubah data
    $stmt = $mysqli->prepare("UPDATE tb_pegawai  SET 
		password=?
		where idpegawai=?");
    $stmt->bind_param(
        "ss",
        $passbaru,
        $idpegawai
    );

    if ($stmt->execute()) {
        echo "<script>alert('Data perubahan password berhasil diubah')</script>";
        echo "<script>window.location='index.php?hal=user_profil';</script>";
    } else {
        echo "<script>alert('Data perubahan password Gagal diubah')</script>";
        echo "<script>window.location='javascript:history.go(-1)';</script>";
    }
}
