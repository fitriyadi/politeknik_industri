<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/adminhome">Home</a></li>
        <li class="breadcrumb-item" aria-current="page">Laporan Order</li>
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
                <h3 class="text-center">Laporan Order</h3>
                <p class="text-center"> Periode <?= tgl_indo($par1); ?> sd <?= tgl_indo($par2); ?> </p>
                <p class="text-center"> Status Order : <b><?= $_POST['status']; ?></b></p>
                <div class="table-responsive">
                    <table id="" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pengaju</th>
                                <th>Jabatan</th>
                                <th>Tanggal</th>
                                <th>Tujuan</th>
                                <th>Status Order</th>
                                <th>Biaya</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $par1 = $_POST['par1'];
                            $par2 = $_POST['par2'];
                            $status = $_POST['status'];
                            if ($status != 'Semua') :
                                $statusquery = " statusorder='$status' and statuspengajuan='Diterima' and ";
                            else :
                                $statusquery = " statuspengajuan='Diterima' and";
                            endif;

                            $sql = "SELECT * FROM tb_pengajuan join tb_pegawai using(idpegawai) where $statusquery tanggal between '$par1' and '$par2'";
                            $total = 0;
                            foreach (_dataGetAll($mysqli, $sql) as $key => $value) :
                                extract($value);
                            ?>
                                <tr>
                                    <td><?= $no += 1; ?></td>
                                    <td><?= $nama ?></td>
                                    <td><?= $jabatan ?></td>
                                    <td><?= tgl_indo($tanggal) ?></td>
                                    <td><?= $tujuan ?></td>
                                    <td><?= $statusorder ?></td>
                                    <td><?= number_format($totalbiaya, 0);
                                        $total += $totalbiaya; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <th colspan="6">Total</th>
                                <th><?= number_format($total, 0); ?></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>