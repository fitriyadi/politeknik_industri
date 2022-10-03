<?php
if (isset($_POST['ubah'])) {

    //Proses ubah data
    $stmt = $mysqli->prepare("UPDATE tb_pengajuan  SET 
		statusorder=?
		where idpengajuan=?");
    $stmt->bind_param(
        "ss",
        $_POST['status'],
        $_POST['idpengajuan']
    );

    if ($stmt->execute()) {
        echo "<script>alert('Data perbaruan order pengajuan berhasil diubah')</script>";
        echo "<script>window.location='index.php?hal=order/data';</script>";
    } else {
        echo "<script>alert('Data perbaruan order pengajuan Gagal Disimpan')</script>";
        echo "<script>window.location='javascript:history.go(-1)';</script>";
    }
}
