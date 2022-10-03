<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/adminhome">Home</a></li>
        <li class="breadcrumb-item" aria-current="page">Laporan Pengajuan</li>
    </ol>
</nav>

<?php
$par1 = $_POST['par1'];
$par2 = $_POST['par2'];
?>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center">Laporan Pengajuan</h3>
                <p class="text-center"> Periode <?= tgl_indo($par1); ?> sd <?= tgl_indo($par2); ?> </p>
                <p class="text-center"> Status Pengajuan : <b><?= $_POST['status']; ?></b></p>
                <div class="table-responsive">
                    <table id="" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pengaju</th>
                                <th>Jabatan</th>
                                <th>Tanggal</th>
                                <th>Tujuan</th>
                                <?php if ($_POST['status'] == 'Ditolak') { ?>
                                    <th>Komentar</th>
                                <?php } ?>
                                <th>Status Pengajuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $par1 = $_POST['par1'];
                            $par2 = $_POST['par2'];
                            $status = $_POST['status'];
                            if ($status != 'Semua') :
                                $statusquery = " statuspengajuan='$status' and";
                            else :
                                $statusquery = "";
                            endif;

                            $sql = "SELECT * FROM tb_pengajuan join tb_pegawai using(idpegawai) where $statusquery tanggal between '$par1' and '$par2'";

                            foreach (_dataGetAll($mysqli, $sql) as $key => $value) :
                                extract($value);
                            ?>
                                <tr>
                                    <td><?= $no += 1; ?></td>
                                    <td><?= $nama ?></td>
                                    <td><?= $jabatan ?></td>
                                    <td><?= tgl_indo($tanggal) ?></td>
                                    <td><?= $tujuan ?></td>
                                    <?php if ($_POST['status'] == 'Ditolak') { ?>
                                        <td><?= $komentar ?></td>
                                    <?php } ?>
                                    <td><?= $statuspengajuan ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>