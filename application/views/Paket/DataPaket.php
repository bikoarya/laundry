<?php foreach ($query as $row => $value) : ?>
    <tr>
        <td><?= ($row + 1); ?></td>
        <td><?= $value['nama_paket'] ?></td>
        <td><?= $value['jenis'] ?></td>
        <td>Rp. <?= number_format($value['harga']) ?></td>
        <td><?= $value['nama_outlet'] ?></td>
        <td style="white-space: nowrap;"><a href="javascript:void(0);" class="editPaket" data-id_paket=<?= $value['id_paket'] ?> data-nama_paket=<?= $value['nama_paket'] ?> data-jenis=<?= $value['id_jenis'] ?> data-harga=<?= $value['harga'] ?> data-outlet=<?= $value['id_outlet'] ?> data-toggle="modal" data-target="#editPaket"><i class="fas fa-edit" style="font-size: 18px" data-placement="bottom" title="Edit"></i></a>
            <a href="javascript:void(0);" class="text-danger ml-3 hapusPaket" data-id_paket=<?= $value['id_paket'] ?>><i class="fas fa-trash-alt text-danger" style="font-size: 18px" data-placement="bottom" title="Hapus"></i></a>
        </td>
    <?php endforeach; ?>
    </tr>