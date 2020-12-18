<?php
require('header.php');
require('logic/supplier-act.php');

?>
<!-- CONTENT-START -->
<h3>Dashboard</h3>
<!-- Supplier -->
<div class="row">
	<div class="col-12">
		<button type="button" class="btn btn-primary mb-3 p-2 shadow-sm" data-toggle="modal"
			data-target="#tambahSupplier">
			<span class="icon text-white-50 mr-2">
				<i class="fas fa-clipboard-list"></i>
			</span>
			Tambah Supplier
		</button>
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Data Supplier</h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable4" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Alamat</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach ($dataSupplier as $ds) :?>
							<tr>
								<td><?= $i++ ?></td>
								<td><?= $ds['name'] ?></td>
								<td><?= $ds['address'] ?></td>
								<td class="text-center">
									<?php if ($ds['id']!=0) :?>
									<a href="?editSupplier=<?= $ds['id']?>" class="btn btn-warning disabled">
										<span class="text">Edit</span>
									</a>
									<a href="?hapusSupplier=<?= $ds['id']?>" class="btn btn-danger"
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
	<!-- Supplier END -->
	<!-- Modal Tambah Supplier -->
	<div class="modal fade" id="tambahSupplier" tabindex="-1" role="dialog" aria-labelledby="tambahSupplierLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="tambahSupplierLabel">Tambah Supplier</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<!-- Form -->
				<div class="modal-body">
					<form action="" method="post">
						<div class="form-group">
							<label for="namaSupplier" class="col-form-label">Nama Supplier</label>
							<input type="text" class="form-control" name="namaSupplier" id="namaSupplier" required>
						</div>
						<div class="form-group">
							<label for="alamatSupplier" class="col-form-label">Alamat
								Supplier</label>
							<input type="text" class="form-control" name="alamatSupplier" id="alamatSupplier" required>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							<button type="submit" name="submitSupplier" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal Tambah Supplier End -->
<!-- CONTENT-END -->
<?php
require('footer.php');
?>