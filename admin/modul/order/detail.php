<?php
if (isset($_GET['id']))
    extract(_dataGetId($mysqli, "tb_pengajuan join tb_pegawai using(idpegawai)", "idpengajuan='" . $_GET['id'] . "'"));
?>

<style type="text/css">
    .form-group {
        margin-top: -20px !important;
    }
</style>

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?hal=dashboard">Home</a></li>
        <li class="breadcrumb-item"><a href="?hal=order/data">Data Order</a></li>
        <li class="breadcrumb-item" aria-current="page">Detail</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Informasi Detail Order</h6>


                <form class="forms-sample" action="?hal=order/proses" method="POST">

                    <input type="hidden" class="form-control" name="idpengajuan" value="<?= @$idpengajuan ?>">
                    <dl class="row">
                        <dt class="col-sm-3">NIK Karyawan</dt>
                        <dd class="col-sm-9"><?= $nik ?></dd>

                        <dt class="col-sm-3">Nama Pengaju / Jabatan</dt>
                        <dd class="col-sm-9"><?= $nama . " / " . $jabatan ?></dd>

                        <dt class="col-sm-3">Tanggal</dt>
                        <dd class="col-sm-9"><?= tgl_indo($tanggal) ?></dd>

                        <div class="border-top my-3"></div>

                        <dt class="col-sm-3">Keperluan</dt>
                        <dd class="col-sm-9"><?= $tujuan ?></dd>

                        <dt class="col-sm-3">Total Biaya</dt>
                        <dd class="col-sm-9"><b><?= number_format($totalbiaya, 0) ?></b></dd>

                        <dt class="col-sm-3">File</dt>
                        <dd class="col-sm-9"><a class="btn btn-primary" href="../user/dokumen/<?= $datafile ?>" target="_blank">Download</a></dd>

                        <dt class="col-sm-3">Status Pengajuan</dt>
                        <dd class="col-sm-9"><?= label_status_pengajuan($statuspengajuan) ?></dd>

                        <label for="input" class="col-sm-3 col-form-label mt-2">Keterangan</label>
                        <div class="col-sm-9 mt-2 mb-2">
                            <textarea class="form-control" name="komentar" placeholder="Inputkan Komentar" rows="3" required disabled><?= @$komentar ?></textarea>
                        </div>

                        <dt class="col-sm-3 mt-2">Status Order</dt>
                        <dd class="col-sm-9" mt-2><?= label_status_order($statusorder) ?></dd>

                        <label for="input" class="col-sm-3 col-form-label mt-2">Perbarui Status Order</label>
                        <div class="col-sm-4 mt-2">
                            <select class="form-control" name="status" required="">
                                <option value="Order Diproses" <?= isselect(@$statusorder, "Order Diproses") ?>>Order Diproses</option>
                                <option value="Order Selesai" <?= isselect(@$statusorder, "Order Selesai") ?>>Order Selesai</option>
                            </select>
                        </div>
                        <dt class="col-sm-5"></dt>



                    </dl>

                    <div class="form-group row ">
                        <div class="col-sm-9 offset-3">
                            <button type="submit" class="btn btn-primary mr-2" name="ubah">Perbarui</button>
                            <a class="btn btn-light" href="?hal=pengajuan/data">Batal</a>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>