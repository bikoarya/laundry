<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan</title>
    <!-- CSS Files -->
    <style>
        /* @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap'); */
        /* @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap'); */
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap');
    </style>
</head>

<body>
    <h4 style="font-family: 'Roboto', sans-serif; position: relative; font-weight: 700; font-size: 20px; margin-left: 600px; margin-bottom: 0; margin-top: 20px;">Laporan</h4>
    <h3 class="go-laundry" style="font-family: 'Roboto', sans-serif; color: #1269DB; font-size: 30px;margin-top: -20px; margin-bottom: 0; margin-top: -35px;"><?= $this->session->userdata('nama_outlet'); ?></h3>
    <h4 style="font-family: 'Roboto', sans-serif; font-weight: lighter; position: relative; margin-top: 5px; font-size: 14px; margin-left: 4px; margin-bottom: 0;"><?= $this->session->userdata('alamat'); ?></h4>
    <h4 style="font-family: 'Roboto', sans-serif; font-weight: lighter; position: relative; margin-top: 8px; font-size: 14px; margin-left: 2px;">Tlp. <?= $this->session->userdata('tlp'); ?></h4>
    <div class="content">
        <table width="100%" style="font-family: 'Roboto', sans-serif; margin-top: 30px; border-collapse: collapse;">
            <tr>
                <td style="border-top: 1px solid black; border-right: 1px solid black; border-left: 1px solid black; border-bottom: 1px solid black; padding: 7px">No</td>
                <td style="border-top: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;padding: 5px">No Invoice</td>
                <td style="border-top: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;padding: 5px">Tanggal</td>
                <td style="border-top: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;padding: 5px; white-space: nowrap;">Nama Member</td>
                <td style="border-top: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;padding: 5px">Paket</td>
                <td style="border-top: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;padding: 5px">Harga</td>
                <td style="border-top: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;padding: 5px">Berat</td>
                <td style="border-top: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;padding: 5px">Petugas</td>
                <td style="border-top: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;padding: 5px">Total</td>
            </tr>
            <?php
            $total = 0;
            foreach ($transaksi as $row => $value) :
                $subtotal = $value['harga'] * $value['berat']; ?>
                <tr>
                    <td style="border-left: 1px solid black; padding: 5px; border-bottom: 1px solid black;"><?= ($row + 1) ?></td>
                    <td style="border-left: 1px solid black; padding: 5px; border-bottom: 1px solid black;"><?= $value['kode_invoice'] ?></td>
                    <td style="border-left: 1px solid black; padding: 5px; border-bottom: 1px solid black; white-space: nowrap;"><?= date('d M Y', strtotime($value['tanggal'])) ?></td>
                    <td style="border-left: 1px solid black; padding: 5px; border-bottom: 1px solid black;"><?= $value['nama'] ?></td>
                    <td style="border-left: 1px solid black; padding: 5px; border-bottom: 1px solid black;"><?= $value['nama_paket'] ?></td>
                    <td style="border-left: 1px solid black; padding: 5px; border-bottom: 1px solid black; white-space: nowrap;">Rp. <?= number_format($value['harga'], 0, ',', '.') ?></td>
                    <td style="border-left: 1px solid black; padding: 5px; border-bottom: 1px solid black;"><?= $value['berat'] ?></td>
                    <td style="border-left: 1px solid black; padding: 5px; border-bottom: 1px solid black;"><?= $value['nama_lengkap'] ?></td>
                    <td style="border-left: 1px solid black; padding: 5px; border-bottom: 1px solid black; border-right: 1px solid black; white-space: nowrap;">Rp. <?= number_format($subtotal, 0, ',', '.') ?></td>
                </tr>
            <?php
                $total += $subtotal;
            endforeach; ?>
            <tr>
                <td colspan="8" style="text-align: center; padding: 7px; border-left: 1px solid black; border-bottom: 1px solid black; font-weight: bold;">Total</td>
                <td style="border-right: 1px solid black; border-left: 1px solid black; padding: 5px; border-bottom: 1px solid black; font-weight: bold;">Rp. <?= number_format($total, 0, ',', '.'); ?></td>
            </tr>
        </table>
    </div>
</body>

</html>