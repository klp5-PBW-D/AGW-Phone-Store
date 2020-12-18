<?php
require('header.php');
require('logic/penjualan-act.php');

// Submit Tambah Penjualan
if (isset($_POST['submit'])) {
    $hasil = tambahDataPenjualan($_POST);
    if ($hasil>0) {
        echo "
            <script>
                swal({
                    title: 'Sukses',
                    text: 'Data Berhasil Di Tambahkan',
                    type: 'success',
                    icon: 'success',
                }).then(function() {
                    window.location = 'penjualan.php';
                });
            </script>
        ";
    } else {
        echo "
            <script>
                swal({
                    title: 'Gagal',
                    text: 'Data Gagal Di Tambahkan',
                    type: 'error',
                    icon: 'error',
                }).then(function() {
                    window.location = 'penjualan.php';
                });
            </script>
        ";
    }
}
// Submit Tambah Penjualan END
// Hapus Penjualan
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $hasil = hapus($id);
    if ($hasil>0) {
        echo "
                    <script>
                        swal({
                            title: 'Sukses',
                            text: 'Data Berhasil Di Hapus',
                            type: 'success',
                            icon: 'success',
                        }).then(function() {
                            window.location = 'penjualan.php';
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
                            window.location = 'penjualan.php';
                        });
                    </script>
                    ";
    }
}
// Hapus Penjualan END
// Submit Edit Penjualan
if (isset($_POST['submitEdit'])) {
    $hasil = editPenjualan($_POST);
    if ($hasil>0) {
        echo "
            <script>
                swal({
                    title: 'Sukses',
                    text: 'Data Berhasil Di Edit',
                    type: 'success',
                    icon: 'success',
                }).then(function() {
                    window.location = 'penjualan.php';
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
                    window.location = 'penjualan.php';
                });
            </script>
        ";
    }
}
// Submit Edit Penjualan END


?>
<!-- CONTENT-START -->
<?php if (!isset($_GET['edit'])) :?>
<h3>Entry Penjualan</h3>
<div class="row">
    <div class="col">
        <button type="button" class="btn btn-primary mb-3 p-2 shadow-sm" data-toggle="modal"
            data-target="#exampleModal">
            <span class="icon text-white-50 mr-2">
                <i class="fas fa-dolly-flatbed"></i>
            </span>
            Tambah Penjualan
        </button>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Penjualan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Barang</th>
                                <th>Harga Satuan</th>
                                <th>Qty</th>
                                <th>Total</th>
                                <th>Laba</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach ($dataList as $dl) :?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $dl['date'] ?></td>
                                <td><?= $dl['name'] ?></td>
                                <td><?= "Rp ".number_format($dl['each_price']) ?></td>
                                <td><?= $dl['quantity'] ?></td>
                                <td><?= "Rp ".number_format($dl['total']) ?></td>
                                <td><?= "Rp ".number_format($dl['profit']) ?></td>
                                <td class="text-center">
                                    <a href="?edit=<?= $dl['id']?>" class="btn btn-warning">
                                        <span class="text">Edit</span>
                                    </a>
                                    <a href="?hapus=<?= $dl['id']?>" class="btn btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">
                                        <span class="text">Hapus</span>
                                    </a>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Penjualan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="idOperator" class="col-form-label">Nama Operator</label>
                        <input type="text" class="form-control" id="idOperator" value="<?= $_SESSION['username'] ?>"
                            readonly>
                        <input type="text" class="form-control" name="idOperator" value="<?= $_SESSION['id'] ?>" hidden>
                    </div>
                    <div class="form-group">
                        <label for="tanggal" class="col-form-label">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-9">
                            <label for="idBarang" class="col-form-label">Nama Barang</label>
                            <select class="form-control" id="idBarang" name="idBarangBaru">
                                <option value="" disabled selected hidden>Pilih nama barang ...
                                </option>
                                <?php foreach ($produk as $p) :?>
                                <option value="<?= $p['id']."-".$p['stock']?>"><?= $p['name']?>
                                </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label for="stock" class="col-form-label stock">Stock :</label>
                            <input type="text" class="form-control" id="stock" value="0" readonly>
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="form-group col-7 mb-0">
                            <div class="form-row">
                                <div class="col-4">
                                    <label for="hargaBarang" class="mt-2">Harga / pcs</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" class="form-control" name="hargaBarang" id="hargaBarang" autocomplete="off"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-5 mb-0">
                            <div class="input-group form-group">
                                <label for="message-text" class="col-form-label">Quantity</label>
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default btn-number" disabled="disabled"
                                        data-type="minus" data-field="jumlah">
                                        <span class=""><i class='fas fa-minus'></i></span>
                                    </button>
                                </span>
                                <input type="text" name="jumlah" class="form-control input-number text-center"
                                    id="inputStock" value="0" min="0" max="0">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default btn-number" data-type="plus"
                                        data-field="jumlah">
                                        <span class=""><i class='fas fa-plus'></i></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-0">
                        <label for="totalHarga" class="col-form-label">Total Harga</label>
                        <input type="text" name="totalHarga" id="totalHarga" class="form-control" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Penjualan -->
<?php elseif (isset($_GET['edit']))  :?>
<?php
    $idPenjualan = $_GET['edit'];
    $getPenjualan = getPenjualan($idPenjualan);
?>
<h3>Edit Penjualan</h3>
<div class="row justify-content-md-center">
    <div class="col">
        <div class="card w-50 shadow-sm">
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="idOperator" class="col-form-label">Nama Operator</label>
                        <input type="text" class="form-control" id="idOperator" value="<?= $_SESSION['username'] ?>"
                            readonly>
                        <input type="hidden" name="idOrder" value="<?=$getPenjualan['idOrder']?>">
                    </div>
                    <div class="form-group">
                        <label for="tanggal" class="col-form-label">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control"
                            value="<?= $getPenjualan['date'] ?>" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-9">
                            <label for="idBarang" class="col-form-label">Nama Barang</label>
                            <input type="hidden" name="idProduct" value="<?=$getPenjualan['idProduct']?>">
                            <input type="text" class="form-control" value="<?=$getPenjualan['name']?>" id="idBarang"
                                readonly>
                        </div>
                        <div class="form-group col-3">
                            <label for="stock" class="col-form-label stock">Stock :</label>
                            <input type="text" class="form-control" value="<?=$getPenjualan['stock']?>" readonly>
                            <input type="hidden" id="stock"
                                value="<?= $getPenjualan['stock']+$getPenjualan['quantity'] ?>">
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="form-group col-7 mb-0">
                            <div class="form-row">
                                <div class="col-3">
                                    <label for="hargaBarang" class="mt-2">Harga / pcs</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" class="form-control" name="hargaBarang" id="hargaBarang"
                                        value="<?= $getPenjualan['each_price'] ?>" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-5 mb-0">
                            <div class="input-group form-group">
                                <label for="message-text" class="col-form-label mr-2">Quantity (Maks =
                                    <?= $getPenjualan['stock']+$getPenjualan['quantity'] ?>)</label>
                                <input type="number" name="newQuantity" class="form-control" id="inputStock" min="0"
                                    max="<?= $getPenjualan['stock']+$getPenjualan['quantity'] ?>"
                                    value="<?= $getPenjualan['quantity'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-0">
                        <label for="totalHarga" class="col-form-label">Total Harga</label>
                        <input type="text" id="totalHarga"
                            value="<?= $getPenjualan['each_price']*$getPenjualan['quantity'] ?>" class="form-control"
                            readonly>
                    </div>
                    <div class="modal-footer mt-4">
                        <a href="penjualan.php"><button type="button" class="btn btn-secondary">Cancel</button></a>
                        <button type="submit" name="submitEdit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif ?>
<!-- Edit Penjualan End -->
<!-- CONTENT-END -->
<?php
require('footer.php');
?>