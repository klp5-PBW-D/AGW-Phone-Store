<?php
require('header.php');
?>
<!-- CONTENT-START -->
<h3>Dashboard</h3>
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
									<a href="?editKategori=<?= $dk['id']?>" class="btn btn-warning disabled">
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
							<input type="text" class="form-control" name="namaKategori" id="namaKategori" required>
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
<!-- CONTENT-END -->
<?php
require('footer.php');
?>