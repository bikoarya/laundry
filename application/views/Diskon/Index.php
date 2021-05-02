<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-headers">
                            <div class="card-title mt-4 ml-4" style="font-weight: bold;">Diskon</div>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-primary ml-1 mt-3 mb-5" data-toggle="modal" data-target="#addDiskon"> <i class="fas fa-plus mr-2 fa-lg"></i>Tambah Diskon</button>

                            <div class="table-responsive">
                                <table class="table table-hover" width="100%" id="tabelDiskon">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Jumlah Diskon</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody id="dataDiskon">

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
    <div class="modal fade" id="addDiskon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="border: none;">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0 none;">
                    <h3 class="modal-title mt-3" id="exampleModalLabel" style="font-weight: bold;">Tambah Diskon</h3>
                    <button type="button" class="close mt-1 mr-2" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formDiskon">
                        <div class="form-group">
                            <label for="diskon">Jumlah Diskon</label>
                            <input type="text" class="form-control" name="diskon" id="diskon" placeholder="Jumlah diskon" autocomplete="off">
                        </div>
                </div>
                <div class="modal-footer" style="border-top: 0 none;">
                    <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="simpanDiskon">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="editDiskon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="border: none;">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0 none;">
                    <h3 class="modal-title mt-3" id="exampleModalLabel" style="font-weight: bold;">Ubah Diskon</h3>
                    <button type="button" class="close mt-1 mr-2" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formEditDiskon">
                        <div class="form-group">
                            <input type="hidden" name="id_diskon" id="id_diskon">
                            <label for="editDiskon">Jumlah Diskon</label>
                            <input type="text" class="form-control" name="txtDiskon" id="txtDiskon" placeholder="Jumlah diskon" autocomplete="off">
                        </div>
                </div>
                <div class="modal-footer" style="border-top: 0 none;">
                    <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="editDiskon">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>