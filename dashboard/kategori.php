<?php
require('header.php');
require('logic/kategori-act.php');
// Tambah Kategori
if (isset($_POST['submitKategori'])) {
    $hasil = tambahKategori($_POST);
    if ($hasil>0) {
        echo "
            <script>
                swal({
                    title: 'Sukses',
                    text: 'Data Berhasil Di Tambahkan',
                    type: 'success',
                    icon: 'success',
                }).then(function() {
                    window.location = 'kategori.php';
                });
            </script>
        ";
    } else {
        echo "
            <script>
                swal({
                    title: 'Gagal',
                    text: 'Data Gagal Di tambahkan',
                    type: 'error',
                    icon: 'error',
                }).then(function() {
                    window.location = 'kategori.php';
                });
            </script>
        ";
    }
}
// Tambah Kategori End
// Edit Kategori
if (isset($_POST['submitEditKategori'])) {
    $hasil = updateKategori($_POST);
    if ($hasil>0) {
        echo "
            <script>
                swal({
                    title: 'Sukses',
                    text: 'Data Berhasil Di Edit',
                    type: 'success',
                    icon: 'success',
                }).then(function() {
                    window.location = 'kategori.php';
                });
            </script>
        ";
    } else {
        echo "
            <script>
                swal({
                    title: 'Gagal',
                    text: 'Data Gagal Di Edit',
                    type: 'error',
                    icon: 'error',
                }).then(function() {
                    window.location = 'kategori.php';
                });
            </script>
        ";
    }
}

// Edit Kategori End
// Hapus Kategori
if (isset($_GET['hapusKategori'])) {
    $id = $_GET['hapusKategori'];
    $hasil = hapusKategori($id);
    if ($hasil>0) {
        echo "
                    <script>
                        swal({
                            title: 'Sukses',
                            text: 'Data Berhasil Di Hapus',
                            type: 'success',
                            icon: 'success',
                        }).then(function() {
                            window.location = 'kategori.php';
                        });
                    </script>
                    ";
    } else {
        echo "
                    <script>
                        swal({
                            title: 'Gagal',
                            text: 'Data Gagal Di Hapus',
                            type: 'error',
                            icon: 'error',
                        }).then(function() {
                            window.location = 'kategori.php';
                        });
                    </script>
                    ";
    }
}
// Hapus Kategori End

?>
<!-- CONTENT-START -->
<?php if (!isset($_GET['editKategori'])) :?>
<h3>Data Kategori</h3>
<!-- Kategori -->
<div class="row">
	<div class="col-12">
		<button type="button" class="btn btn-primary mb-3 p-2 shadow-sm" data-toggle="modal"
			data-target="#tambahKategori">
			<span class="icon text-white-50 mr-2">
				<i class="fas fa-clipboard-list"></i>
			</span>
			Tambah Kategori
		</button>
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach ($dataKategori as $dk) :?>
							<tr>
								<td><?= $i++ ?></td>
								<td><?= $dk['name'] ?></td>
								<td class="text-center">
									<?php if ($dk['id']!=0) :?>
									<a href="?editKategori=<?= $dk['id']?>" class="btn btn-warning">
										<span class="text">Edit</span>
									</a>
									<a href="?hapusKategori=<?= $dk['id']?>" class="btn btn-danger"
										onclick="return confirm('Yakin ingin menghapus data ini?')">
										<span class="text">Hapus</span>
									</a>
									<?php endif ?>
								</td>

							</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Kategori END -->
<!-- Modal Tambah Kategori  -->
<div class="modal fade" id="tambahKategori" tabindex="-1" role="dialog" aria-labelledby="tambahKategoriLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tambahKategoriLabel">Tambah Kategori</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<!-- form -->
			<div class="modal-body">
				<form action="" method="post">
					<div class="form-group">
						<div class="form-group">
							<label for="namaKategori" class="col-form-label">Nama Kategori</label>
							<input type="text" class="form-control" name="namaKategori" id="namaKategori" autocomplete="off" required>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" name="submitKategori" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Modal Tambah Kategori End -->
<?php elseif (isset($_GET['editKategori'])) :?>
<?php
    $idEditKategori = $_GET['editKategori'];
    $getKategori = getKategori($idEditKategori);
?>
<h3>Edit Kategori</h3>
<div class="row">
	<div class="col">
		 <div class="card w-50 shadow-sm">
		<div class="modal-body">
				<form action="" method="post">
					<input type="hidden" name="idKategori" value="<?=$getKategori['id']?>">
					<div class="form-group">
						<div class="form-group">
							<label for="namaKategori" class="col-form-label">Nama Kategori</label>
							<input type="text" class="form-control" name="namaKategori" id="namaKategori" value="<?= $getKategori['name']?>" autocomplete="off" required>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" name="submitEditKategori" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
</div>
	</div>
</div>
<?php endif; ?>
<!-- CONTENT-END -->
<?php
require('footer.php');
?>