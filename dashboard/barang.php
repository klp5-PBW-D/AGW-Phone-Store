<?php
require('header.php');
?>
<!-- CONTENT-START -->
<h3>Dashboard</h3>
<!-- Content Row -->
<div class="row">
	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total
							Modal (Belum Keluar)
						</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">RP
							<?= number_format($jumlahModal['total']) ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total
							Barang (Di Toko)</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">
							<?= $dataJumlahBarang['total'] ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-box fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total
							Handphone</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">
							<?= $dataJumlahLaptopSecond['total'] ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-mobile-alt fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total
							Aksesoris</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">
							<?= $dataJumlahMacbookSecond['total'] ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-headset fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<!-- Content Row -->

<div class="row">

	<!-- Area Table Barang -->
	<div class="col">
		<button type="button" class="btn btn-primary mb-3 p-2 shadow-sm" data-toggle="modal"
			data-target="#tambahBarang">
			<span class="icon text-white-50 mr-2">
				<i class="fas fa-box"></i>
			</span>
			Tambah Barang
		</button>
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Stock</th>
								<th>Kategori</th>
								<th>Supplier</th>
								<th>Modal</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach ($dataBarang as $db) :?>
							<tr>
								<td><?= $i++ ?></td>
								<td><?= $db['nama'] ?></td>
								<td><?= $db['stock'] ?></td>
								<td><?= $db['kategori'] ?></td>
								<td><?= $db['supplier'] ?></td>
								<td><?= "Rp ".number_format($db['modal']) ?></td>
								<td class="text-center">
									<a href="?editBarang=<?= $db['id']?>" class="btn btn-warning">
										<span class="text">Edit</span>
									</a>
									<a href="?hapus=<?= $db['id']?>" class="btn btn-danger"
										onclick="return confirm('Yakin ingin menghapus data ini?')">
										<span class="text">Hapus</span>
									</a>
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

<!-- Modal Tambah Barang -->
<div class="modal fade" id="tambahBarang" tabindex="-1" role="dialog" aria-labelledby="tambahBarangLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tambahBarangLabel">Tambah Barang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<!-- Form -->
			<div class="modal-body">
				<form action="" method="post">
					<div class="form-group">
						<label for="tanggalBarang" class="col-form-label">Tanggal</label>
						<input type="date" class="form-control" name="tanggalBarang" id="tanggalBarang" required>
					</div>
					<div class="form-group">
						<label for="namaBarang" class="col-form-label">Nama Barang</label>
						<input type="text" class="form-control" name="namaBarang" id="namaBarang" required>
					</div>
					<div class="form-row">
						<div class="form-group col-6">
							<label for="kategoriBarang" class="col-form-label">Kategori
								Barang</label>
							<select class="form-control" id="kategoriBarang" name="kategoriBarang" required>
								<option value="" disabled selected hidden>Pilih kategori Barang
									...</option>
								<?php foreach ($dataKategori as $dk) :?>
								<option value="<?=$dk['id']?>"><?= $dk['name'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group col-6">
							<label for="supplierBarang" class="col-form-label">Supplier
								Barang</label>
							<select class="form-control" id="supplierBarang" name="supplierBarang" required>
								<option value="" disabled selected hidden>Pilih Supplier Barang
									...</option>
								<?php foreach ($dataSupplier as $ds) :?>
								<option value="<?=$ds['id']?>"><?= $ds['name'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-8">
							<label for="hargaBarang" class="col-form-label">Harga Modal /
								pcs</label>
							<input type="text" class="form-control" name="hargaModal" id="hargaBarang" required>
						</div>
						<div class="form-group col-4">
							<label for="jumlahBarang" class="col-form-label">Jumlah
								Barang</label>
							<input type="number" class="form-control" name="jumlahBarang" id="jumlahBarang" required>
						</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" name="submitBarang" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Modal Tambah Barang END -->
<!-- CONTENT-END -->
<?php
require('footer.php');
