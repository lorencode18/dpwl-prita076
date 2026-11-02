
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Username</th>
            <th>NIK</th>
            <th>Nama Lengkap</th>
            <th>No. HP</th>
            <th>Alamat Lengkap</th>
            <th>Foto Identitas (KTP & SIM A)</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($dtpenyewa as $p) : ?>
            <tr>
                <td><?= $p['user_plg076'] ?></td>
                <td><?= $p['nik076'] ?></td>
                <td><?= $p['nm_lngkp076'] ?></td>
                <td><?= $p['no_hp076'] ?></td>
                <td><?= $p['almt_lngkp076'] ?></td>

                <td>
                    <b>KTP:</b><br>
                    <a href="<?= base_url('img/' . $p['ft_ktp076']) ?>" target="_blank">
                        <img src="<?= base_url('img/' . $p['ft_ktp076']) ?>"
                             style="width: 60px; height: auto; cursor: pointer;">
                    </a>
                    <br>

                    <b>SIM A:</b><br>
                    <a href="<?= base_url('img/' . $p['ft_sim_a076']) ?>" target="_blank">
                        <img src="<?= base_url('img/' . $p['ft_sim_a076']) ?>"
                             style="width: 60px; height: auto; cursor: pointer;">
                    </a>
                </td>
                <td>
                    <a href="javascript:void(0)"
                    class="btn btn-warning btn-sm disabled"
                    style="pointer-events: none;">
                        Edit
                    </a>

                    <a href="javascript:void(0)"
                    class="btn btn-danger btn-sm disabled"
                    style="pointer-events: none;">
                        Hapus
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
