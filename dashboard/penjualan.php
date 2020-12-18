<?php
require('header.php');
?>
<!-- CONTENT-START -->
<h3>Dashboard</h3>
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
                                    <input type="text" class="form-control" name="hargaBarang" id="hargaBarang"
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
<!-- CONTENT-END -->
<?php
require('footer.php');
?>