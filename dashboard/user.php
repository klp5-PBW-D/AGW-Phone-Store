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
            Tambah User
        </button>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Roles</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach ($userData as $ud) :?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $ud['username'] ?></td>
                                <td><?= $ud['roles'] ?></td>
                                <td class="text-center">
                                    <a href="?editUser=<?= $ud['id']?>" class="btn btn-warning disabled">
                                        <span class="text">Edit</span>
                                    </a>
                                    <a href="?hapus=<?= $ud['id']?>"
                                        class="btn btn-danger <?= ($_SESSION['username']==$ud['username']) ? 'disabled' : '' ?>"
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
<!-- Modal tambah user -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>

            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="username" class="col-form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                    <div class="form-group mb-1">
                        <label for="password" class="col-form-label">Password</label>
                        <input type="password" class="form-control form-password" name="password" id="password">
                    </div>
                    <div class="form-check float-right">
                        <input class="form-check-input form-checkbox" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">show password </label>
                    </div>
                    <div class="form-group mt-4">
                        <label for="roles" class="col-form-label">Role User</label>
                        <select class="form-control" id="roles" name="roles" required>
                            <option value="" disabled selected hidden>Pilih Role User ...</option>
                            <option value="1">Admin</option>
                            <option value="2">Operator</option>
                        </select>
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
<!-- Modal tambah user END-->
<!-- CONTENT-END -->
<?php
require('footer.php');
?>