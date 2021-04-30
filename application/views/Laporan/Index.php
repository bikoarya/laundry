<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-headers">
                            <div class="card-title mt-4 ml-4" style="font-weight: bold;">Data Transaksi</div>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <a href="<?= site_url('Laporan/Cetak') ?>" class="btn btn-primary ml-1 mt-3 mb-5"> <i class="fas fa-print mr-2 fa-lg"></i>Laporan</a>
                            <button class="btn btn-info ml-1 mt-3 mb-5" data-toggle="modal" data-target="#laporanBulanan"> <i class="fas fa-print mr-2 fa-lg"></i>Laporan Bulanan</button>

                            <div class="table-responsive">
                                <table class="table table-hover" width="100%" id="tabelTransaksi">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Kode Invoice</td>
                                            <td>Tgl Terima</td>
                                            <td>Nama Member</td>
                                            <td>Paket</td>
                                            <td>Tgl Selesai</td>
                                            <td>Petugas</td>
                                            <td>Status</td>
                                            <td>Bayar</td>
                                        </tr>
                                    </thead>
                                    <tbody id="dataStatus">
                                        <?php foreach ($transaksi as $row => $value) : ?>
                                            <tr>
                                                <td><?= ($row + 1) ?></td>
                                                <td><?= $value['kode_invoice'] ?></td>
                                                <td style="white-space: nowrap;"><?= date('d M Y', strtotime($value['tanggal'])) ?></td>
                                                <td><?= $value['nama'] ?></td>
                                                <td><?= $value['nama_paket'] ?></td>
                                                <td style="white-space: nowrap;"><?= date('d M Y', strtotime($value['tgl_selesai'])) ?></td>
                                                <td><?= $value['nama_lengkap'] ?></td>
                                                <?php if ($value['status'] == 'Baru') { ?>
                                                    <td style="white-space: nowrap;"><span class="statusBaru"><?= $value['status'] ?></span></td>
                                                <?php } else if ($value['status'] == 'Proses') { ?>
                                                    <td style="white-space: nowrap;"><span class="statusProses"><?= $value['status'] ?></span></td>
                                                <?php } else if ($value['status'] == 'Selesai') { ?>
                                                    <td style="white-space: nowrap;"><span class="statusProses"><?= $value['status'] ?></span></td>
                                                <?php } else { ?>
                                                    <td style="white-space: nowrap;"><span class="statusSelesai"><?= $value['status'] ?> <i class="fas fa-check"></i></span></td>
                                                <?php } ?>
                                                <?php if ($value['status_bayar'] == 'Belum bayar') { ?>
                                                    <td style="white-space: nowrap;"><span class="statusBayar"><?= $value['status_bayar'] ?></span></td>
                                                <?php } else { ?>
                                                    <td style="white-space: nowrap;"><span class="bayarSuccess"><?= $value['status_bayar'] ?></span></td>
                                                <?php } ?>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Bulanan -->
    <div class="modal fade" id="laporanBulanan" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="border: none;">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0 none;">
                    <h3 class="modal-title mt-3" id="exampleModalLabel" style="font-weight: bold;">Laporan Bulanan</h3>
                    <button type="button" class="close mt-1 mr-2" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formBulanan">
                        <div class="form-group">
                            <label for="txtBulan">Nama Bulan</label>
                            <input type="month" class="form-control" name="txtBulan" id="txtBulan" placeholder="Nama Bulan" autocomplete="off">
                        </div>
                </div>
                <div class="modal-footer" style="border-top: 0 none;">
                    <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="cariBulanan">Cari</button>
                </div>
                </form>
            </div>
        </div>
    </div>