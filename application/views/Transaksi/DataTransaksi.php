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
                            <a href="<?= site_url('Transaksi') ?>" class="btn btn-primary ml-1 mt-3 mb-5"> <i class="fas fa-arrow-alt-circle-left mr-2 fa-lg"></i>Kembali</a>

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
                                            <!-- <td>Harga</td> -->
                                            <!-- <td>Berat</td> -->
                                            <td>Status</td>
                                            <td>Bayar</td>
                                            <!-- <td>Total</td> -->
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody id="historyTransaksi">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>