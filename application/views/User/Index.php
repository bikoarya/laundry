<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-headers">
                            <div class="card-title mt-4 ml-4" style="font-weight: bold;">User</div>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-primary ml-1 mt-3 mb-5" data-toggle="modal" data-target="#addUser"> <i class="fas fa-plus mr-2 fa-lg"></i>Tambah User</button>

                            <div class="table-responsive">
                                <table class="table table-hover" width="100%">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Nama Lengkap</td>
                                            <td>Username</td>
                                            <td>Outlet</td>
                                            <td>Role</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody id="dataUser">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="addUser" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="border: none;">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0 none;">
                    <h3 class="modal-title mt-3" id="exampleModalLabel" style="font-weight: bold;">Tambah User</h3>
                    <button type="button" class="close mt-1 mr-2" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formUser">
                        <div class="form-group">
                            <label for="txtNamaLengkap">Nama Lengkap</label>
                            <input type="text" class="form-control" name="txtNamaLengkap" id="txtNamaLengkap" placeholder="Nama Lengkap" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="txtUsername">Username</label>
                            <input type="text" class="form-control" name="txtUsername" id="txtUsername" placeholder="Username" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="txtPassword">Password</label>
                            <input type="password" class="form-control" name="txtPassword" id="txtPassword" placeholder="Password" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="txtOutletUser">Outlet</label>
                            <select class="form-control outletUser" name="txtOutletUser" id="txtOutletUser" style="width: 100%;" autocomplete="off">
                                <option value=""></option>
                                <?php foreach ($outlet as $ot) : ?>
                                    <?php if ($ot['nama_outlet'] != 'Outlet Pusat') { ?>
                                        <option value="<?= $ot['id_outlet'] ?>"><?= $ot['nama_outlet']; ?></option>
                                    <?php } ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="txtRole">Role</label>
                            <select class="form-control role" name="txtRole" id="txtRole" style="width: 100%;" autocomplete="off">
                                <option value=""></option>
                                <?php foreach ($role as $rol) : ?>
                                    <?php if ($rol['nama_role'] != 'Admin') { ?>
                                        <option value="<?= $rol['nama_role'] ?>"><?= $rol['nama_role']; ?></option>
                                    <?php } ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                </div>
                <div class="modal-footer" style="border-top: 0 none;">
                    <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="simpanUser">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="editUser" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="border: none;">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0 none;">
                    <h3 class="modal-title mt-3" id="exampleModalLabel" style="font-weight: bold;">Ubah User</h3>
                    <button type="button" class="close mt-1 mr-2" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formEditUser">
                        <div class="form-group">
                            <input type="hidden" name="id_user" id="id_user">
                            <label for="editNamaLengkap">Nama Lengkap</label>
                            <input type="text" class="form-control" name="editNamaLengkap" id="editNamaLengkap" placeholder="Nama Lengkap" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="editUsername">Username</label>
                            <input type="text" class="form-control" name="editUsername" id="editUsername" placeholder="Username" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="editPassword">Password</label>
                            <input type="password" class="form-control" name="editPassword" id="editPassword" placeholder="Password" autocomplete="off">
                            <input type="hidden" class="form-control" name="oldPass" id="oldPass" placeholder="Password" autocomplete="off">
                            <span>
                                <p class="text-danger mb-0">*Kosongkan jika tidak ingin mengubah password.</p>
                            </span>
                        </div>
                        <div class="form-group" style="margin-top: -10px;">
                            <label for="editOutletUser">Outlet</label>
                            <select class="form-control editOutletUser" name="editOutletUser" id="editOutletUser" style="width: 100%;" autocomplete="off">
                                <option value=""></option>
                                <?php foreach ($outlet as $ot) : ?>
                                    <?php if ($ot['nama_outlet'] != 'Outlet Pusat') { ?>
                                        <option value="<?= $ot['id_outlet'] ?>"><?= $ot['nama_outlet']; ?></option>
                                    <?php } ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="editRole">Role</label>
                            <select class="form-control editRole" name="editRole" id="editRole" style="width: 100%;" autocomplete="off">
                                <option value=""></option>
                                <?php foreach ($role as $rol) : ?>
                                    <?php if ($rol['nama_role'] != 'Admin') { ?>
                                        <option value="<?= $rol['nama_role'] ?>"><?= $rol['nama_role']; ?></option>
                                    <?php } ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                </div>
                <div class="modal-footer" style="border-top: 0 none;">
                    <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="editUser">Ubah</button>
                </div>
                </form>
            </div>
        </div>
    </div>