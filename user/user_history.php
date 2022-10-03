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
                        <table id="" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Tujuan</th>
                                    <th>File</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                $sql = "SELECT * FROM tb_pengajuan join tb_pegawai using(idpegawai) where tb_pegawai.idpegawai='$idpegawai' order by idpengajuan desc";

                                foreach (_dataGetAll($mysqli, $sql) as $key => $value) :
                                    extract($value);
                                ?>
                                    <tr>
                                        <td><?= $no += 1 ?></td>
                                        <td><?= tgl_indo($tanggal) ?></td>
                                        <td><?= $tujuan ?></td>
                                        <td>
                                            <a class="btn btn-secondary btn-sm" href="dokumen/<?= $datafile ?>" target="_blank">Download</a>
                                        </td>
                                        <td><?= number_format($totalbiaya, 0); ?></td>
                                        <td>
                                            <?= user_label_status_pengajuan($statuspengajuan); ?>
                                            <?php
                                            if ($statuspengajuan == 'Diterima') :
                                                echo user_label_status_order($statusorder);
                                            endif;
                                            ?>
                                        </td>
                                        <td>
                                            <a href='?hal=user_history_detail&id=<?= $idpengajuan ?>' class='btn btn-primary btn-sm float-right'>Detail</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>
    </section><!-- End Contact Section -->