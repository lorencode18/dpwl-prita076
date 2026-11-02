
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">DATA PENYEWA</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Starter Page</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <a href="<?= base_url('Penyewa_C076/create_penyewa') ?>"
                               class="btn btn-primary">
                                <i class="fas fa-user-plus"></i>
                                Tambah Data Penyewa
                            </a>

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
                                            <td><?= $p['Nik076'] ?></td>
                                            <td><?= $p['nm_lngkp076'] ?></td>
                                            <td><?= $p['no_hp076'] ?></td>
                                            <td><?= $p['almt_lngkp076'] ?></td>

                                            <td>
                                                <b>KTP:</b><br>
                                                <a href="<?= base_url('img/' . $p['ft_ktp076']) ?>"
                                                   target="_blank">
                                                    <img src="<?= base_url('img/' . $p['ft_ktp076']) ?>"
                                                         style="width: 60px; height: auto; cursor: pointer;">
                                                </a>
                                                <br>

                                                <b>SIM A:</b><br>
                                                <a href="<?= base_url('img/' . $p['ft_sim_a076']) ?>"
                                                   target="_blank">
                                                    <img src="<?= base_url('img/' . $p['ft_sim_a076']) ?>"
                                                         style="width: 60px; height: auto; cursor: pointer;">
                                                </a>
                                            </td>

                                            <td>
                                                <a href="<?= base_url('Penyewa_C076/edit/' . $p['user_plg076']) ?>"
                                                   class="btn btn-warning btn-sm">
                                                    Edit
                                                </a>

                                                <a href="<?= base_url('Penyewa_C076/hapus/' . $p['user_plg076']) ?>"
                                                   class="btn btn-danger btn-sm"
                                                   onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                                    Hapus
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
