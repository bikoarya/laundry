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
                            <a href="<?= site_url('Laporan/Cetak') ?>" class="btn btn-primary ml-1 mt-3 mb-5"> <i class="fas fa-print mr-2 fa-lg"></i>Cetak Laporan</a>

                            <div class="table-responsive">
                                <table class="table table-hover" width="100%">
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