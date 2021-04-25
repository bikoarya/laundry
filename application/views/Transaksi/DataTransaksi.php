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
                            <a href="<?= site_url('Transaksi') ?>" class="btn btn-primary ml-1 mt-3 mb-5"> <i class="fas fa-arrow-left mr-2 fa-lg"></i>Kembali</a>

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
                                            <td>Aksi</td>
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
                                                    <td style="white-space: nowrap;"><span class="statusSelesai"><?= $value['status'] ?></span></td>
                                                <?php } else if ($value['status'] == 'Diambil' && $value['status_bayar'] == 'Lunas') { ?>
                                                    <td style="white-space: nowrap;"><span class="statusSelesai"><?= $value['status'] ?> <i class="fas fa-check"></i></span></td>
                                                <?php } else { ?>
                                                    <script>
                                                        alert('Bayar dulu');
                                                    </script>;
                                                    <td style="white-space: nowrap;"><span class="statusSelesai"><?= $value['status'] ?> <i class="fas fa-check"></i></span></td>
                                                <?php } ?>
                                                <?php if ($value['status_bayar'] == 'Belum bayar') { ?>
                                                    <td style="white-space: nowrap;"><span class="statusBayar"><?= $value['status_bayar'] ?></span></td>
                                                <?php } else { ?>
                                                    <td style="white-space: nowrap;"><span class="bayarSuccess"><?= $value['status_bayar'] ?> <i class="fas fa-check"></i></span></td>
                                                <?php } ?>
                                                <td><a href="javascript:void(0);" class="editStatus" data-toggle="modal" data-target="#editTransaksi" data-id_transaksi="<?= $value['id_transaksi'] ?>" data-paket="<?= $value['nama_paket'] ?>" data-berat="<?= $value['berat'] ?>" data-harga="<?= $value['harga'] ?>" data-status="<?= $value['status'] ?>" data-bayar="<?= $value['status_bayar'] ?>">
                                                        <i class="fas fa-edit" style="font-size: 18px" data-placement="bottom" title="Edit"></i>
                                                    </a></td>
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

    <!-- Modal Edit -->
    <div class="modal fade" id="editTransaksi" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="border: none;">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0 none;">
                    <h3 class="modal-title mt-3" id="exampleModalLabel" style="font-weight: bold;">Ubah Status</h3>
                    <button type="button" class="close mt-1 mr-2" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formUpdateStatus">
                        <div class="form-group">
                            <input type="hidden" name="id_transaksi" id="id_transaksi">
                            <label for="dNamaPaket">Nama Paket</label>
                            <input type="text" class="form-control" name="dNamaPaket" id="dNamaPaket" placeholder="Nama paket" readonly autocomplete="off" style="font-weight: bolder; color: black">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-5">
                                    <label for="dBerat">Berat / Qty</label>
                                    <input type="text" class="form-control" name="dBerat" id="dBerat" placeholder="Berat" readonly autocomplete="off" style="font-weight: bolder; color: black">
                                </div>
                                <div class="col-7">
                                    <label for="dHarga">Harga</label>
                                    <input type="text" readonly class="form-control" name="dHarga" id="dHarga" placeholder="Harga" autocomplete="off" value="" style="font-weight: bold; color: black">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dTotal">Biaya Total</label>
                            <input type="text" class="form-control" name="dTotal" id="dTotal" placeholder="Total" readonly autocomplete="off" style="font-weight: bolder; color: black">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="dStatus">Status</label>
                                        <select class="form-control dStatus" data-size="5" name="dStatus" id="dStatus" style="width: 100%;" autocomplete="off">
                                            <option value=""></option>
                                            <?php foreach ($status as $stat) : ?>
                                                <option value="<?= $stat ?>"><?= $stat; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="dBayar">Status</label>
                                        <select class="form-control dBayar" data-size="5" name="dBayar" id="dBayar" style="width: 100%;" autocomplete="off">
                                            <option value=""></option>
                                            <?php foreach ($bayar as $byr) : ?>
                                                <option value="<?= $byr ?>"><?= $byr; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer" style="border-top: 0 none;">
                    <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="updateStatus">Ubah</button>
                </div>
                </form>
            </div>
        </div>
    </div>