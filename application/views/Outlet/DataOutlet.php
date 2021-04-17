<?php foreach ($query as $row => $value) : ?>
    <tr>
        <td><?= ($row + 1); ?></td>
        <td><?= $value['nama_outlet'] ?></td>
        <td><?= $value['alamat'] ?></td>
        <td><?= $value['tlp'] ?></td>
        <td style="white-space: nowrap;"><a href="javascript:void(0);" class="editOutlet" data-id_outlet=<?= $value['id_outlet'] ?> data-nama=<?= $value['nama_outlet'] ?> data-alamat=<?= $value['alamat'] ?> data-tlp=<?= $value['tlp'] ?> data-toggle="modal" data-target="#editOutlet"><i class="fas fa-edit" style="font-size: 18px" data-placement="bottom" title="Edit"></i></a>
            <a href="javascript:void(0);" class="text-danger ml-3 hapusOutlet" data-id_outlet=<?= $value['id_outlet'] ?>><i class="fas fa-trash-alt text-danger" style="font-size: 18px" data-placement="bottom" title="Hapus"></i></a>
        </td>
    <?php endforeach; ?>
    </tr>