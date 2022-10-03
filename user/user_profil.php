    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Halaman Profil User</h2>
                <p>Halaman ini menampilkan informasi user dan perubahan password user</p>
            </div>

            <div class="row gx-lg-0 gy-4">

                <div class="col-lg-3">
                    <div class="info-container d-flex flex-column align-items-center justify-content-center">

                        <?php require_once '_menuuser.php'; ?>

                    </div>

                </div>

                <div class="col-lg-9">
                    <form action="proses_profil.php" method="post" role="form" class="php-email-form">
                        <div class="row">

                            <dt class="col-sm-4">NIK Pegawai</dt>
                            <dd class="col-sm-8"><?= $nik ?></dd>

                            <dt class="col-sm-4">Nama Pegawai</dt>
                            <dd class="col-sm-8"><?= $nama ?></dd>

                            <dt class="col-sm-4">Jabatan</dt>
                            <dd class="col-sm-8"><?= $jabatan ?></dd>

                            <dt class="col-sm-4">Email</dt>
                            <dd class="col-sm-8"><?= $email ?></dd>

                            <dt class="col-sm-4">Alamat</dt>
                            <dd class="col-sm-8"><?= $alamat ?></dd>
                            <hr>
                            <h6>Perbarui Password</h6>
                            <div class="form-group mt-3">
                                <input type="password" class="form-control" name="passwordlama" id="subject" placeholder="Password Lama" required>
                            </div>

                            <div class="form-group mt-3">
                                <input type="password" class="form-control" name="passwordbaru" id="subject" placeholder="Password Baru" required>
                            </div>

                            <div class="form-group mt-3">
                                <input type="password" class="form-control" name="passwordkonfirmasi" id="subject" placeholder="Konfirmasi Password" required>
                            </div>

                            <input type="hidden" name="passworddb" value="<?= $password ?>">
                            <input type="hidden" name="idpegawai" value="<?= $idpegawai ?>">


                            <div class="text-center"><button type="submit">Ubah Password</button></div>
                        </div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>
    </section><!-- End Contact Section -->