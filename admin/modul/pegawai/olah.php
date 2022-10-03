<?php
$notelepon = "";
if (isset($_GET['id']))
	extract(_dataGetId($mysqli, "tb_pegawai", "idpegawai='" . $_GET['id'] . "'"));
?>
<nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?hal=dashboard">Home</a></li>
		<li class="breadcrumb-item"><a href="?hal=pegawai/data">Data Pegawai</a></li>
		<li class="breadcrumb-item" aria-current="page"><?= (isset($_GET['id']) ? 'Ubah' : 'Tambah') ?></li>
	</ol>
</nav>

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h6 class="card-title"><?= (isset($_GET['id']) ? 'Ubah' : 'Tambah') ?> Data Pegawai</h6>

				<form class="forms-sample" action="?hal=pegawai/proses" method="POST">

					<input type="hidden" class="form-control" name="idpegawai" value="<?= @$idpegawai ?>">

					<div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">NIK Pegawai</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" name="nik" value="<?= @$nik ?>" placeholder="Inputkan NIK Pegawai" required>
						</div>
					</div>

					<div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Nama Pegawai</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="nama" value="<?= @$nama ?>" placeholder="Inputkan Nama pegawai" required>
						</div>
					</div>

					<div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Email</label>
						<div class="col-sm-9">
							<input type="email" class="form-control" name="email" value="<?= @$email ?>" placeholder="Inputkan Email" required>
						</div>
					</div>

					<div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Jabatan</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="jabatan" value="<?= @$jabatan ?>" placeholder="Inputkan Jabatan" required>
						</div>
					</div>

					<div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Alamat</label>
						<div class="col-sm-9">
							<textarea class="form-control" name="alamat" placeholder="Inputkan alamat" rows="3" required><?= @$alamat ?></textarea>
						</div>
					</div>


					<div class="form-group row ">
						<div class="col-sm-9 offset-3">
							<button type="submit" class="btn btn-primary mr-2" name="<?= (isset($_GET['id']) ? 'ubah' : 'tambah') ?>">Simpan</button>
							<a class="btn btn-light" href="?hal=pegawai/data">Batal</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>