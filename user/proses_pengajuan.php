<?php
session_start();
require_once '../setting/koneksi.php';
require_once '../setting/crud.php';

if (isset($_POST['tambah'])) {
    //Proses ubah data
    if ($_FILES['dokumen']['tmp_name'] != "") {
        $temp = $_FILES['dokumen']['tmp_name'];
        $name = $_FILES['dokumen']['name'];
        $size = $_FILES['dokumen']['size'];
        $type = $_FILES['dokumen']['type'];
        $folder = "dokumen/";
        $name = $_FILES['dokumen']['name'];
        $tempdata = explode(".", $_FILES['dokumen']['name']);
        $newfilename = round(microtime(true)) . '.' . end($tempdata);
        $target = $folder . $newfilename;
        move_uploaded_file($temp, $target);
    } else {
        $name = "default.jpg";
    }

    $tanggal = date('Y-m-d');
    $status = "Diajukan";
    $stmt = $mysqli->prepare("INSERT INTO tb_pengajuan 
		(tujuan,tanggal,totalbiaya,statuspengajuan,idpegawai,datafile) 
		VALUES (?,?,?,?,?,?)");

    $stmt->bind_param(
        "ssssss",
        $_POST['tujuan'],
        $tanggal,
        $_POST['total'],
        $status,
        $_SESSION['user'],
        $newfilename
    );

    if ($stmt->execute()) {
        echo "<script>alert('Data pengajuan berhasil disimpan')</script>";
        echo "<script>window.location='index.php?hal=user_home';</script>";
    } else {
        echo "<script>alert('Data pengajuan Gagal Disimpan')</script>";
        echo "<script>window.location='javascript:history.go(-1)';</script>";
    }
}
