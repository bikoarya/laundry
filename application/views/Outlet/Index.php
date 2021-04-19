<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-headers">
                            <div class="card-title mt-4 ml-4" style="font-weight: bold;">Outlet</div>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-primary ml-1 mt-3 mb-5" data-toggle="modal" data-target="#addOutlet"> <i class="fas fa-plus mr-2 fa-lg"></i>Tambah Outlet</button>

                            <div class="table-responsive">
                                <table class="table table-hover" width="100%">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Nama Outlet</td>
                                            <td>Alamat</td>
                                            <td>No. Telpon</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody id="dataOutlet">

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
    <div class="modal fade" id="addOutlet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="border: none;">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0 none;">
                    <h3 class="modal-title mt-3" id="exampleModalLabel" style="font-weight: bold;">Tambah Outlet</h3>
                    <button type="button" class="close mt-1 mr-2" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formOutlet">
                        <div class="form-group">
                            <label for="txtNamaOutlet">Nama Outlet</label>
                            <input type="text" class="form-control" name="txtNamaOutlet" id="txtNamaOutlet" placeholder="Nama outlet" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="txtAlamatOutlite">Alamat</label>
                            <input type="text" class="form-control" name="txtAlamatOutlet" id="txtAlamatOutlet" placeholder="Alamat" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="txtNoTlp">No. Telepon</label>
                            <input type="text" class="form-control" name="txtNoTlp" id="txtNoTlp" placeholder="Nomor telepon" autocomplete="off">
                        </div>
                </div>
                <div class="modal-footer" style="border-top: 0 none;">
                    <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="simpanOutlet">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="editOutlet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="border: none;">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0 none;">
                    <h3 class="modal-title mt-3" id="exampleModalLabel" style="font-weight: bold;">Ubah Outlet</h3>
                    <button type="button" class="close mt-1 mr-2" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formEditOutlet">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="id_outlet" id="id_outlet">
                            <label for="txtNamaOutlet">Nama Outlet</label>
                            <input type="text" class="form-control" name="editNamaOutlet" id="editNamaOutlet" placeholder="Nama outlet" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="txtAlamatOutlite">Alamat</label>
                            <input type="text" class="form-control" name="editAlamatOutlet" id="editAlamatOutlet" placeholder="Alamat" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="txtNoTlp">No. Telepon</label>
                            <input type="text" class="form-control" name="editNoTlp" id="editNoTlp" placeholder="Nomor telepon" autocomplete="off">
                        </div>
                </div>
                <div class="modal-footer" style="border-top: 0 none;">
                    <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="editOutlet">Ubah</button>
                </div>
                </form>
            </div>
        </div>
    </div>