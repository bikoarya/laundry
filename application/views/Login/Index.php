<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?= $title; ?></title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="<?= base_url('assets/img/icon.ico') ?>" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="<?= base_url('assets/js/plugin/webfont/webfont.min.js') ?>"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ['assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!-- Data Tables -->
    <link rel="stylesheet" href="<?= base_url('assets/datatables/dataTables.bootstrap4.css'); ?>">
    <!-- Select 2 -->
    <link rel="stylesheet" href="<?= base_url('assets/select2/css/select2.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/select2/css/select2-bootstrap4.min.css'); ?>">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url('assets/toastr/toastr.min.css'); ?>">
    <!-- Sweet Alert 2 -->
    <link rel="stylesheet" href="<?= base_url('assets/sweetalert2/sweetalert2.min.css'); ?>">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?= base_url('assets/datepicker/dist/css/bootstrap-datepicker.min.css'); ?>">

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/atlantis.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

    <script defer type="text/javascript">
        var base_url = '<?= base_url() ?>';
        var site_url = '<?= site_url() ?>';
    </script>
</head>

<body style="background-color: #F9FBFD;">

    <div class="box-container align-items-center w-25">
        <h1 class="text-center">Login</h1>
        <form id="formOutlet">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="txtNamaOutlet">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off">
            </div>
            <div class="btn-login pl-2 pr-2 mt-4 align-items-center mb-3">
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </div>
        </form>
    </div>


    <!--   Core JS Files   -->
    <script src="<?= base_url('assets/js/core/jquery.3.2.1.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/core/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/core/bootstrap.min.js') ?>"></script>

    <!-- jQuery UI -->
    <script src="<?= base_url('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') ?>"></script>

    <!-- jQuery Scrollbar -->
    <script src="<?= base_url('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') ?>"></script>


    <!-- Chart JS -->
    <script src="<?= base_url('assets/js/plugin/chart.js/chart.min.js') ?>"></script>

    <!-- jQuery Sparkline -->
    <script src="<?= base_url('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') ?>"></script>

    <!-- Chart Circle -->
    <script src="<?= base_url('assets/js/plugin/chart-circle/circles.min.js') ?>"></script>

    <!-- Datatables -->
    <script src="<?= base_url('assets/js/plugin/datatables/datatables.min.js') ?>"></script>
    <!-- Data Tables -->
    <script src="<?= base_url('assets/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/datatables/dataTables.bootstrap4.min.js'); ?>"></script>
    <!-- JQuery Validate -->
    <script src="<?= base_url('assets/jquery-validation/jquery.validate.min.js'); ?>"></script>

    <!-- Select 2 -->
    <script src="<?= base_url('assets/select2/js/select2.min.js') ?>"></script>
    <!-- Toastr -->
    <script src="<?= base_url('assets/toastr/toastr.min.js'); ?>"></script>
    <!-- Sweet Alert 2 -->
    <script src="<?= base_url('assets/sweetalert2/sweetalert2.all.min.js'); ?>"></script>
    <!-- Date Picker -->
    <script src="<?= base_url('assets/datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>

    <!-- Bootstrap Notify -->
    <script src="<?= base_url('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') ?>"></script>

    <!-- jQuery Vector Maps -->
    <script src="<?= base_url('assets/js/plugin/jqvmap/jquery.vmap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugin/jqvmap/maps/jquery.vmap.world.js') ?>"></script>

    <!-- Sweet Alert -->
    <script src="<?= base_url('assets/js/plugin/sweetalert/sweetalert.min.js') ?>"></script>

    <!-- Atlantis JS -->
    <script src="<?= base_url('assets/js/atlantis.min.js') ?>"></script>

    <!-- Main JS -->
    <script src="<?= base_url('assets/js/main.js') ?>"></script>

    <!-- Main JS -->
    <script src="<?= base_url('assets/js/custom.js') ?>"></script>

</body>

</html>