    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Halaman Pengajuan</h2>
                <p>Halaman ini digunakan untuk proses pengajuan permintaan pengadaan barang dan jasa.</p>
            </div>

            <div class="row gx-lg-0 gy-4">

                <div class="col-lg-3">
                    <div class="info-container d-flex flex-column align-items-center justify-content-center">

                        <?php require_once '_menuuser.php'; ?>

                    </div>

                </div>

                <div class="col-lg-9">
                    <form action="proses_pengajuan.php" method="post" role="form" class="php-email-form" enctype="multipart/form-data">

                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="tujuan" id="tujuan" placeholder="Tujuan Pengajuan" required>
                        </div>

                        <div class="form-group mt-3">
                            <input type="number" class="form-control" name="total" id="total" placeholder="Total Biaya" required>
                        </div>

                        <div class="form-group mt-3">
                            <input type="file" class="form-control" name="dokumen" id="dokumen" placeholder="File Dokumen" required>
                        </div>

                        <div class="text-center"><button type="submit" name="tambah">Proses</button></div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>
    </section><!-- End Contact Section -->