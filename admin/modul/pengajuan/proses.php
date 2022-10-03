<?php
if (isset($_POST['ubah'])) {

    //Proses ubah data
    $stmt = $mysqli->prepare("UPDATE tb_pengajuan  SET 
		statuspengajuan=?,
		komentar=?
		where idpengajuan=?");
    $stmt->bind_param(
        "sss",
        $_POST['status'],
        $_POST['komentar'],
        $_POST['idpengajuan']
    );

    if ($stmt->execute()) {
        echo "<script>alert('Data perbaruan pengajuan berhasil diubah')</script>";
        echo "<script>window.location='index.php?hal=pengajuan/data';</script>";
    } else {
        echo "<script>alert('Data perbaruan pengajuan Gagal Disimpan')</script>";
        echo "<script>window.location='javascript:history.go(-1)';</script>";
    }
} else if (isset($_GET['hapus'])) {

    //Proses hapus
    $stmt = $mysqli->prepare("DELETE FROM tb_pengajuan where idpengajuan=?");
    $stmt->bind_param("s", $_GET['hapus']);

    if ($stmt->execute()) {
        echo "<script>alert('Data pengajuan Berhasil Dihapus')</script>";
        echo "<script>window.location='index.php?hal=pengajuan/data';</script>";
    } else {
        echo "<script>alert('Data pengajuan Gagal Dihapus')</script>";
        echo "<script>window.location='javascript:history.go(-1)';</script>";
    }
}
