<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row mt--2">
                <div class="col-md-12">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <!-- <i class="fas fa-th-list fa-2x"></i> -->
                                    <h6 class="fw-bold mb--5 h2 mt-2">Paket</h6>
                                    <h1 class="fw-bold mb-0 mt--2" style="font-size: 56px;"><?= $this->model->countPaket(); ?></h1>
                                </div>
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <h6 class="fw-bold mb--5 h2 mt-2">Member</h6>
                                    <h1 class="fw-bold mb-0 mt--2" style="font-size: 56px;"><?= $this->model->countMember(); ?></h1>
                                </div>
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <h6 class="fw-bold mb--5 h2 mt-2">Outlet</h6>
                                    <h1 class="fw-bold mb-0 mt--2" style="font-size: 56px;"><?= $this->model->countOutlet(); ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>