<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-headers">
                            <div class="card-title mt-4 ml-4" style="font-weight: bold;">Member</div>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-primary ml-1 mt-3 mb-5" data-toggle="modal" data-target="#addMember"> <i class="fas fa-plus mr-2 fa-lg"></i>Tambah Member</button>

                            <div class="table-responsive">
                                <table class="table table-hover" width="100%">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Nama Lengkap</td>
                                            <td>Alamat</td>
                                            <td>Jenis Kelamin</td>
                                            <td>No. Telpon</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody id="dataMember">

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
    <div class="modal fade" id="addMember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="border: none;">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0 none;">
                    <h3 class="modal-title mt-3" id="exampleModalLabel" style="font-weight: bold;">Tambah Member</h3>
                    <button type="button" class="close mt-1 mr-2" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formMember">
                        <div class="form-group">
                            <label for="txtNamaMember">Nama Lengkap</label>
                            <input type="text" class="form-control" name="txtNamaMember" id="txtNamaMember" placeholder="Nama lengkap" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="txtAlamatMember">Alamat</label>
                            <input type="text" class="form-control" name="txtAlamatMember" id="txtAlamatMember" placeholder="Alamat" autocomplete="off">
                        </div>
                        <label for="gender" class="ml-2 mt-2 d-block align-items-center" style="font-weight: bold;">Jenis Kelamin</label>
                        <div class="form-check form-check-inline form-group m-0">
                            <input class="form-check-input m-0 mr-1" type="radio" name="gender" id="gender" value="Laki-laki">
                            <label class="form-check-label m-0 mr-4" for="gender">
                                Laki-laki
                            </label>
                            <input class="form-check-input m-0 mr-1" type="radio" name="gender" id="gender" value="Perempuan">
                            <label class="form-check-label m-0 mr-3" for="gender">
                                Perempuan
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="txtTlp">No. Telepon</label>
                            <input type="text" class="form-control" name="txtTlp" id="txtTlp" placeholder="Nomor telepon" autocomplete="off">
                        </div>
                </div>
                <div class="modal-footer" style="border-top: 0 none;">
                    <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="simpanMember">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="editMember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="border: none;">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0 none;">
                    <h3 class="modal-title mt-3" id="exampleModalLabel" style="font-weight: bold;">Ubah Member</h3>
                    <button type="button" class="close mt-1 mr-2" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formEditMember">
                        <div class="form-group">
                            <input type="hidden" name="id_member" id="id_member">
                            <label for="txtEditNamaMember">Nama Lengkap</label>
                            <input type="text" class="form-control" name="txtEditNamaMember" id="txtEditNamaMember" placeholder="Nama lengkap" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="txtEditAlamatMember">Alamat</label>
                            <input type="text" class="form-control" name="txtEditAlamatMember" id="txtEditAlamatMember" placeholder="Alamat" autocomplete="off">
                        </div>
                        <label for="gender" class="ml-2 mt-2 d-block align-items-center" style="font-weight: bold;">Jenis Kelamin</label>
                        <div class="form-check form-check-inline form-group m-0">
                            <input class="form-check-input m-0 mr-1" type="radio" name="editGender" id="editGender" value="Laki-laki">
                            <label class="form-check-label m-0 mr-4" for="editGender">
                                Laki-laki
                            </label>
                            <input class="form-check-input m-0 mr-1" type="radio" name="editGender" id="editGender" value="Perempuan">
                            <label class="form-check-label m-0 mr-3" for="editGender">
                                Perempuan
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="editTlpMember">No. Telepon</label>
                            <input type="text" class="form-control" name="editTlpMember" id="editTlpMember" placeholder="Nomor telepon" autocomplete="off">
                        </div>
                </div>
                <div class="modal-footer" style="border-top: 0 none;">
                    <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="editMember">Ubah</button>
                </div>
                </form>
            </div>
        </div>
    </div>