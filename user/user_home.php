<?php
@$iduser = $_SESSION['user'];
$sql = "SELECT * FROM tb_pengajuan where is_notif='1' and idpegawai='$iduser'";
if (_cekData($mysqli, $sql) == true) :
    extract(_dataGetId($mysqli, "tb_pengajuan join tb_pegawai using(idpegawai)", "is_notif='1'"));
else :
    $statuspengajuan = 'tidak ada';
endif;
?>

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Halaman User</h2>
            <p>Halaman ini berisi mengani informasi user dan proses pengajuan</p>
        </div>

        <div class="row gx-lg-0 gy-4">

            <div class="col-lg-3">
                <div class="info-container d-flex flex-column align-items-center justify-content-center">

                    <?php require_once '_menuuser.php'; ?>

                </div>

            </div>

            <div class="col-lg-9">
                <form action="#" method="post" role="form" class="php-email-form">
                    <h4>Selamat datang, <?= $nama ?></h4>

                    <?php if ($statuspengajuan == 'tidak ada') : ?>
                        <div class="alert alert-primary" role="alert">
                            Anda tidak memiliki proses pengajuan
                        </div>
                    <?php endif; ?>

                    <?php if ($statuspengajuan != 'tidak ada') : ?>
                        <div class="row">
                            <?php
                            if ($statuspengajuan == 'Diajukan') :
                                pengajuan_submit();
                            elseif ($statuspengajuan == 'Ditolak') :
                                pengajuan_ditolak();
                            elseif ($statuspengajuan == 'Diterima' && $statusorder == 'Persiapan Order') :
                                pengajuan_diterima();
                            elseif ($statuspengajuan == 'Diterima' && $statusorder == 'Order Diproses') :
                                pengajuan_proses();
                            elseif ($statuspengajuan == 'Diterima' && $statusorder == 'Order Selesai') :
                                pengajuan_selesai();
                            endif;

                            ?>
                        </div>

                        <div class="card mt-4">
                            <div class="card-body">
                                <h5 class="card-title">Pengajuan</h5>

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
                                        <?php if ($statuspengajuan == 'Diterima' && $statusorder == 'Order Selesai') : ?>
                                            <a class="btn btn-primary" href="?hal=proses_user_history&id=<?= $idpengajuan ?>">Konfirmasi Selesai Order</a>
                                        <?php endif; ?>

                                        <?php if ($statuspengajuan == 'Ditolak') : ?>
                                            <a class="btn btn-primary" href="?hal=proses_user_history&id=<?= $idpengajuan ?>">Konfirmasi Ditolak</a>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <?php if ($statuspengajuan == 'Diterima' && $statusorder == 'Order Selesai') : ?>
                                    <div class="alert alert-warning" role="alert">
                                        *Anda wajib melakukan proses konfirmasi untuk dapat mengajukan proses pengajuan baru atau ulang.
                                    </div>
                                <?php endif; ?>

                                <?php if ($statuspengajuan == 'Ditolak') : ?>
                                    <div class="alert alert-warning" role="alert">
                                        *Anda wajib melakukan proses konfirmasi untuk dapat mengajukan proses pengajuan baru atau ulang.
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>


                    <?php endif; ?>

                </form>
            </div><!-- End Contact Form -->

        </div>

    </div>
</section><!-- End Contact Section -->


<?php function pengajuan_submit()
{ ?>
    <div class="col-sm-3 m-0">
        <button class="btn btn-success btn-sm btn-block">
            <i class="bi bi-check-all"></i>Request Submitted
        </button>
    </div>

    <div class="col-sm-3 m-0">
        <button class="btn btn-primary btn-sm btn-block">
            <span class="spinner-border spinner-border-sm"></span>
            PPPK Approval
        </button>
    </div>

    <div class="col-sm-3">
        <button class="btn btn-secondary btn-sm btn-block">
            Order Processing
        </button>
    </div>

    <div class="col-sm-3">
        <button class="btn btn-secondary btn-sm btn-block">
            Order Completed
        </button>
    </div>
<?php } ?>

<?php function pengajuan_diterima()
{ ?>
    <div class="col-sm-3 m-0">
        <button class="btn btn-success btn-sm btn-block">
            <i class="bi bi-check-all"></i>Request Submitted
        </button>
    </div>

    <div class="col-sm-3 m-0">
        <button class="btn btn-success btn-sm btn-block">
            <i class="bi bi-check-all"></i>
            PPPK Approval
        </button>
    </div>

    <div class="col-sm-3">
        <button class="btn btn-primary btn-sm btn-block">
            <span class="spinner-border spinner-border-sm"></span>
            Order Processing
        </button>
    </div>

    <div class="col-sm-3">
        <button class="btn btn-secondary btn-sm btn-block">
            Order Completed
        </button>
    </div>
<?php } ?>

<?php function pengajuan_ditolak()
{ ?>
    <div class="col-sm-3">
        <button class="btn btn-success btn-sm btn-block">
            <i class="bi bi-check-all"></i>
            Request Submitted
        </button>
    </div>

    <div class="col-sm-3">
        <button class="btn btn-danger btn-sm  btn-block">
            <i class="bi bi-x-octagon"></i>
            PPPK Approval
        </button>
    </div>

    <div class="col-sm-3">
        <button class="btn btn-danger btn-sm  btn-block">
            Order Processing
        </button>
    </div>

    <div class="col-sm-3">
        <button class="btn btn-danger btn-sm  btn-block">
            Order Completed
        </button>
    </div>
<?php } ?>

<?php function pengajuan_proses()
{ ?>
    <div class="col-sm-3 m-0">
        <button class="btn btn-success btn-sm btn-block">
            <i class="bi bi-check-all"></i>Request Submitted
        </button>
    </div>

    <div class="col-sm-3 m-0">
        <button class="btn btn-success btn-sm btn-block">
            <i class="bi bi-check-all"></i>
            PPPK Approval
        </button>
    </div>

    <div class="col-sm-3">
        <button class="btn btn-success btn-sm btn-block">
            <i class="bi bi-check-all"></i>
            Order Processing
        </button>
    </div>

    <div class="col-sm-3">
        <button class="btn btn-secondary btn-sm btn-block">
            <span class="spinner-border spinner-border-sm"></span>
            Order Completed
        </button>
    </div>
<?php } ?>

<?php function pengajuan_selesai()
{ ?>
    <div class="col-sm-3 m-0">
        <button class="btn btn-success btn-sm btn-block">
            <i class="bi bi-check-all"></i>Request Submitted
        </button>
    </div>

    <div class="col-sm-3 m-0">
        <button class="btn btn-success btn-sm btn-block">
            <i class="bi bi-check-all"></i>
            PPPK Approval
        </button>
    </div>

    <div class="col-sm-3">
        <button class="btn btn-success btn-sm btn-block">
            <i class="bi bi-check-all"></i>
            Order Processing
        </button>
    </div>

    <div class="col-sm-3">
        <button class="btn btn-success btn-sm btn-block">
            <i class="bi bi-check-all"></i>
            Order Completed
        </button>
    </div>
<?php } ?>