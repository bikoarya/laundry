<?php foreach ($query as $row => $value) : ?>
    <tr>
        <td><?= ($row + 1); ?></td>
        <td><?= $value['nama_lengkap'] ?></td>
        <td><?= $value['username'] ?></td>
        <td><?= $value['nama_outlet'] ?></td>
        <td><?= $value['nama_role'] ?></td>
        <td style="white-space: nowrap;"><a href="javascript:void(0);" class="editUser" data-id_user=<?= $value['id_user'] ?> data-nama_lengkap=<?= $value['nama_lengkap'] ?> data-username=<?= $value['username'] ?> data-password=<?= $value['password'] ?> data-outlet=<?= $value['id_outlet'] ?> data-role=<?= $value['id_role'] ?> data-toggle="modal" data-target="#editUser"><i class="fas fa-edit" style="font-size: 18px" data-placement="bottom" title="Edit"></i></a>
            <a href="javascript:void(0);" class="text-danger ml-3 hapusUser" data-id_user=<?= $value['id_user'] ?>><i class="fas fa-trash-alt text-danger" style="font-size: 18px" data-placement="bottom" title="Hapus"></i></a>
        </td>
    <?php endforeach; ?>
    </tr>