<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-headers">
                            <div class="card-title mt-4 ml-4" style="font-weight: bold;">Transaksi</div>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-primary ml-1 mt-3 mb-5" data-toggle="modal" data-target="#addTransaksi"> <i class="fas fa-plus mr-2 fa-lg"></i>Tambah Transaksi</button>
                            <a href="<?= site_url('Data') ?>" class="btn btn-warning ml-1 mt-3 mb-5"> <i class="fas fa-list mr-2 fa-lg"></i>Data Transaksi</a>

                            <div class="table-responsive">
                                <table class="table table-hover" width="100%">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Kode Invoice</td>
                                            <td>Tanggal Terima</td>
                                            <td>Nama Member</td>
                                            <td>Paket</td>
                                            <td>Tanggal Selesai</td>
                                            <td>Harga</td>
                                            <td>Berat</td>
                                            <td>Sub Total</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody id="dataTransaksi">

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="8" class="text-center" style="border: none">TOTAL</th>
                                            <th id="grandTotal" style="border: none"></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="btn-simpan d-flex align-items-center justify-content-end mt-3 mb-3">
                                <a href="<?= site_url('Transaksi/simpanTransaksi') ?>" class="btn btn-primary st">Simpan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="addTransaksi" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="border: none;">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center" style="border-bottom: 0 none;">
                    <h3 class="modal-title mt-3" id="exampleModalLabel" style="font-weight: bold;">Tambah Transaksi</h3>
                    <button type="button" class="close mt-1 mr-2" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formTransaksi">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="txtKodeInvoice">Kode Invoice</label>
                                    <input type="text" class="form-control" name="txtKodeInvoice" id="txtKodeInvoice" placeholder="Kode invoice" autocomplete="off" readonly value="<?= $this->model->kode_invoice(); ?>" style="font-weight: bold; color: black">
                                </div>
                                <div class="form-group">
                                    <label for="tglTerima">Tanggal</label>
                                    <input type="text" class="form-control" name="tglTerima" id="tglTerima" placeholder="Tanggal terima" readonly value="<?= date('d M Y') ?>" autocomplete="off" style="font-weight: bold; color: black">
                                </div>
                                <div class="form-group">
                                    <label for="tPetugas">Petugas</label>
                                    <input type="text" class="form-control" name="tPetugas" id="tPetugas" placeholder="Petugas" autocomplete="off" readonly value="<?= $this->session->userdata('nama_lengkap'); ?>" style="font-weight: bold; color: black">
                                </div>
                                <div class="form-group">
                                    <label for="tOutlet">Outlet</label>
                                    <input type="text" class="form-control" name="tOutlet" id="tOutlet" placeholder="Outlet" autocomplete="off" readonly value="<?= $this->session->userdata('nama_outlet'); ?>" style="font-weight: bold; color: black">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="tNamaMember">Nama Member</label>
                                    <select class="form-control tMember" name="tNamaMember" id="tNamaMember" style="width: 100%;" autocomplete="off">
                                        <option value=""></option>
                                        <?php foreach ($member as $mbr) : ?>
                                            <option value="<?= $mbr['nama'] ?>"><?= $mbr['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tNamaPaket">Nama Paket</label>
                                    <select class="form-control tPaket" name="tNamaPaket" id="tNamaPaket" style="width: 100%;" autocomplete="off">
                                        <option value=""></option>
                                        <?php foreach ($paket as $pkt) : ?>
                                            <option harga="<?= $pkt['harga'] ?>" jenis="<?= $pkt['jenis'] ?>" value="<?= $pkt['nama_paket'] ?>"><?= $pkt['nama_paket']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-5" id="berat">
                                            <label for="tBerat">Berat (Kg)</label>
                                            <input type="number" class="form-control" name="tBerat" id="tBerat" placeholder="Berat (kg)" autocomplete="off" min="1">
                                        </div>
                                        <div class="col-5" id="qty">
                                            <label for="tQty">Qty</label>
                                            <input type="number" class="form-control" name="tQty" id="tQty" placeholder="Qty" autocomplete="off" min="1">
                                        </div>
                                        <div class="col-7">
                                            <label for="tHarga">Harga</label>
                                            <input type="text" readonly class="form-control" name="tHarga" id="tHarga" placeholder="Harga" autocomplete="off" style="font-weight: bold; color: black">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tglSelesai">Tgl Selesai</label>
                                    <input type="text" class="form-control" data-date-format="dd M yyyy" name="tglSelesai" id="tglSelesai" autocomplete="off" placeholder="Tanggal selesai">
                                </div>
                            </div>
                        </div>

                </div>
                <div class="modal-footer" style="border-top: 0 none;">
                    <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="simpanTransaksi">Tambah</button>
                </div>
                </form>
            </div>
        </div>
        <!-- </div> -->