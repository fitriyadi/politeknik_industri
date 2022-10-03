<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?hal=dashboard">Home</a></li>
        <li class="breadcrumb-item" aria-current="page">Data Pegawai</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <h6 class="card-title">Data Pegawai
                    <?= _daftar("?hal=pegawai/olah") ?>
                </h6>

                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Jabatan</th>
                                <th>Alamat</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $sql = "SELECT * FROM tb_pegawai";
                            foreach (_dataGetAll($mysqli, $sql) as $key => $value) :
                                extract($value);
                            ?>
                                <tr>
                                    <td><?= $no += 1 ?></td>
                                    <td><?= $nik ?></td>
                                    <td><?= $nama ?></td>
                                    <td><?= $email ?></td>
                                    <td><?php if ($password == $nik) : ?>
                                            <span class="badge badge-pill badge-primary">Default</span>
                                        <?php else : ?>
                                            <span class="badge badge-pill badge-success">Sudah Dirubah</span>
                                            <?= _reset("?hal=pegawai/proses&reset=$idpegawai") ?>
                                        <?php endif ?>
                                    </td>
                                    <td><?= $jabatan ?></td>
                                    <td><?= $alamat ?></td>
                                    <td>
                                        <?= _edit("?hal=pegawai/olah&id=$idpegawai") ?>
                                        <?= _hapus("?hal=pegawai/proses&hapus=$idpegawai") ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>