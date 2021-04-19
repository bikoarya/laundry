<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-headers">
                            <div class="card-title mt-4 ml-4" style="font-weight: bold;">Paket</div>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-primary ml-1 mt-3 mb-5" data-toggle="modal" data-target="#addPaket"> <i class="fas fa-plus mr-2 fa-lg"></i>Tambah Paket</button>

                            <div class="table-responsive">
                                <table class="table table-hover" width="100%">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Nama Paket</td>
                                            <td>Jenis</td>
                                            <td>Harga</td>
                                            <td>Outlet</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody id="dataPaket">

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
    <div class="modal fade" id="addPaket" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="border: none;">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0 none;">
                    <h3 class="modal-title mt-3" id="exampleModalLabel" style="font-weight: bold;">Tambah Paket</h3>
                    <button type="button" class="close mt-1 mr-2" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formPaket">
                        <div class="form-group">
                            <label for="txtNamaPaket">Nama Paket</label>
                            <input type="text" class="form-control" name="txtNamaPaket" id="txtNamaPaket" placeholder="Nama Paket" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="txtjenisPaket">Jenis</label>
                            <select class="form-control jenisPaket" data-size="5" name="txtJenisPaket" id="txtJenisPaket" style="width: 100%;" autocomplete="off">
                                <option value=""></option>
                                <option value="newPaket">Lainnya</option>
                                <?php foreach ($jenis as $j) : ?>
                                    <option value="<?= $j['id_jenis'] ?>"><?= $j['jenis']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="txtHargaPaket">Harga</label>
                            <input type="text" class="form-control" name="txtHargaPaket" id="txtHargaPaket" placeholder="Harga" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="txtOutletPaket">Outlet</label>
                            <select class="form-control outletPaket" name="txtOutletPaket" id="txtOutletPaket" style="width: 100%;" autocomplete="off">
                                <option value=""></option>
                                <?php foreach ($outlet as $ot) : ?>
                                    <option value="<?= $ot['id_outlet'] ?>"><?= $ot['nama_outlet']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                </div>
                <div class="modal-footer" style="border-top: 0 none;">
                    <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="simpanPaket">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Jenis -->
    <div class="modal fade" id="modalPaket" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="border: none;">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0 none;">
                    <h3 class="modal-title mt-3" id="exampleModalLabel" style="font-weight: bold;">Tambah Jenis</h3>
                    <button type="button" class="close mt-1 mr-2" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formJenis">
                        <div class="form-group">
                            <label for="jenis">Nama Jenis</label>
                            <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Nama Jenis" autocomplete="off">
                        </div>
                </div>
                <div class="modal-footer" style="border-top: 0 none;">
                    <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="simpanJenis">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="editPaket" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="border: none;">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0 none;">
                    <h3 class="modal-title mt-3" id="exampleModalLabel" style="font-weight: bold;">Ubah Paket</h3>
                    <button type="button" class="close mt-1 mr-2" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formEditPaket">
                        <div class="form-group">
                            <input type="hidden" name="id_paket" id="id_paket">
                            <label for="txtNamaPaket">Nama Paket</label>
                            <input type="text" class="form-control" name="editNamaPaket" id="editNamaPaket" placeholder="Nama Paket" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="editJenisPaket">Jenis</label>
                            <select class="form-control editJenisPaket" name="editJenisPaket" id="editJenisPaket" style="width: 100%" autocomplete="off">
                                <option value=""></option>
                                <?php foreach ($jenis as $j) : ?>
                                    <option value="<?= $j['id_jenis'] ?>"><?= $j['jenis']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="editHargaPaket">Harga</label>
                            <input type="text" class="form-control" name="editHargaPaket" id="editHargaPaket" placeholder="Harga" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="editOutletPaket">Outlet</label>
                            <select class="form-control editOutletPaket" data-size="5" name="editOutletPaket" id="editOutletPaket" style="width: 100%;" autocomplete="off">
                                <option value=""></option>
                                <?php foreach ($outlet as $ot) : ?>
                                    <option value="<?= $ot['id_outlet'] ?>"><?= $ot['nama_outlet']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                </div>
                <div class="modal-footer" style="border-top: 0 none;">
                    <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="editPaket">Ubah</button>
                </div>
                </form>
            </div>
        </div>
    </div>