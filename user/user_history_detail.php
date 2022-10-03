<?php
if (isset($_GET['id']))
    extract(_dataGetId($mysqli, "tb_pengajuan join tb_pegawai using(idpegawai)", "idpengajuan='" . $_GET['id'] . "'"));
?>
<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Halaman History Pengajuan</h2>
            <p>Halaman ini berisi riwayat history pengajuan</p>
        </div>

        <div class="row gx-lg-0 gy-4">

            <div class="col-lg-3">
                <div class="info-container d-flex flex-column align-items-center justify-content-center">
                    <?php require_once '_menuuser.php'; ?>
                </div>

            </div>

            <div class="col-lg-9">
                <form action="#" method="post" role="form" class="php-email-form">
                    <input type="hidden" class="form-control" name="idpengajuan" value="<?= @$idpengajuan ?>">
                    <dl class="row">
                        <dt class="col-sm-4">NIK Karyawan</dt>
                        <dd class="col-sm-8"><?= $nik ?></dd>

                        <dt class="col-sm-4">Nama Pengaju / Jabatan</dt>
                        <dd class="col-sm-8"><?= $nama . " / " . $jabatan ?></dd>

                        <dt class="col-sm-4">Tanggal</dt>
                        <dd class="col-sm-8"><?= tgl_indo($tanggal) ?></dd>

                        <div class="border-top my-3"></div>

                        <dt class="col-sm-4">Keperluan</dt>
                        <dd class="col-sm-8"><?= $tujuan ?></dd>

                        <dt class="col-sm-4">Total Biaya</dt>
                        <dd class="col-sm-8"><b><?= number_format($totalbiaya, 0) ?></b></dd>

                        <dt class="col-sm-4">File</dt>
                        <dd class="col-sm-8"><a class="btn btn-primary" href="dokumen/<?= $datafile ?>" target="_blank">Download</a></dd>

                        <dt class="col-sm-4">Status Pengajuan</dt>
                        <dd class="col-sm-8"><?= user_label_status_pengajuan($statuspengajuan) ?></dd>

                        <?php if ($statuspengajuan == 'Ditolak') : ?>
                            <label for="input" class="col-sm-4 col-form-label mt-2">Keterangan</label>
                            <div class="col-sm-8 mt-2 mb-2">
                                <textarea class="form-control" name="komentar" placeholder="" rows="3" required disabled><?= @$komentar ?></textarea>
                            </div>
                        <?php endif; ?>

                        <?php if ($statuspengajuan == 'Diterima') : ?>
                            <dt class="col-sm-4 mt-2">Status Order</dt>
                            <dd class="col-sm-8" mt-2><?= user_label_status_order($statusorder) ?></dd>
                        <?php endif; ?>
                    </dl>

                    <div class="form-group row ">
                        <div class="col-sm-8 offset-4">
                            <a class="btn btn-light" href="?hal=user_history">Batal</a>
                        </div>
                    </div>
                </form>
            </div><!-- End Contact Form -->

        </div>

    </div>
</section><!-- End Contact Section -->