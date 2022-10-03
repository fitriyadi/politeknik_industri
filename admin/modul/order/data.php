<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?hal=dashboard">Home</a></li>
        <li class="breadcrumb-item" aria-current="page">Data Proses Order</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">
                    <form class="forms-sample" action="?hal=order/data" method="POST">
                        <div class="row">
                            <div class="col-sm-1">
                                <label for="input" class="col-form-label">Tanggal</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" name="par1" value="<?= (isset($_POST['par1']) ? $_POST['par1'] : '') ?>" placeholder="Inputkan Parameter 1" required>
                            </div>
                            <label for="input" class="col-sm-1 col-form-label">s/d</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" name="par2" value="<?= (isset($_POST['par2']) ? $_POST['par2'] : '') ?>" placeholder="Inputkan Parameter 2" required>
                            </div>

                            <div class="col-sm-2">
                                <select class="form-control" name="status" required="">
                                    <?php
                                    foreach ($_array_status_order as $key => $value) :
                                    ?>
                                        <option value="<?= $value ?>" <?= isselect(@$_POST['status'], $key) ?>>
                                            <?= $value ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary mr-2" name="cari?>">Cari</button>
                                <a class="btn btn-light" href="?hal=order/data">Reset</a>
                            </div>
                        </div>
                    </form>
                </h6>

                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Pengaju</th>
                                <th>Tujuan</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Status Order</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $totalall = 0;
                            if (isset($_POST['par1'])) :
                                $par1 = $_POST['par1'];
                                $par2 = $_POST['par2'];
                                $status = $_POST['status'];
                                if ($status != '-Semua-') :
                                    $statusquery = " statusorder='$status' and";
                                else :
                                    $statusquery = "";
                                endif;

                                $sql = "SELECT * FROM tb_pengajuan join tb_pegawai using(idpegawai) where $statusquery statuspengajuan='Diterima' and (tanggal between '$par1' and '$par2')";
                            else :
                                $sql = "SELECT * FROM tb_pengajuan join tb_pegawai using(idpegawai) where statuspengajuan='Diterima'";
                            endif;
                            foreach (_dataGetAll($mysqli, $sql) as $key => $value) :
                                extract($value);
                            ?>
                                <tr>
                                    <td><?= $no += 1 ?></td>
                                    <td><?= tgl_indo($tanggal) ?></td>
                                    <td><?= $nama ?></td>
                                    <td><?= $tujuan ?></td>
                                    <td><?= number_format($totalbiaya, 0);
                                        $totalall += $totalbiaya; ?></td>
                                    <td><?= label_status_pengajuan($statuspengajuan) ?></td>
                                    <td><?= label_status_order($statusorder) ?></td>
                                    <td>
                                        <?= _detail("?hal=order/detail&id=$idpengajuan") ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <th colspan="4">Total</th>
                                <th colspan="4"><?= number_format($totalall, 0) ?></th>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>