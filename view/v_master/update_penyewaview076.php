
<!-- Content Wrapper -->
<div class="content-wrapper">

    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Data Penyewa</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('Penyewa_C076/index') ?>">Master Penyewa</a>
                        </li>
                        <li class="breadcrumb-item active">Edit Penyewa</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i> Form Edit Data Penyewa
                    </h3>
                </div>

                <form action="<?= base_url('Penyewa_C076/UpdatePenyewa') ?>"
                      method="post"
                      enctype="multipart/form-data">

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Username (User Pelanggan)</label>
                                    <input type="text" name="user_plg076"
                                           class="form-control"
                                           value="<?= $p['user_plg076'] ?>"
                                           readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kata Sandi (Password)</label>
                                    <input type="password" name="sandi076"
                                           class="form-control"
                                           value="<?= $p['Sandi076'] ?>"
                                           required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="text" name="Nik076"
                                           class="form-control"
                                           value="<?= $p['Nik076'] ?>"
                                           required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nm_lngkp076"
                                           class="form-control"
                                           value="<?= $p['nm_lngkp076'] ?>"
                                           required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>No. Handphone</label>
                                    <input type="text" name="no_hp076"
                                           class="form-control"
                                           value="<?= $p['no_hp076'] ?>"
                                           required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Alamat Lengkap</label>
                                    <textarea name="almt_lngkp076"
                                              class="form-control"
                                              rows="3"
                                              required><?= $p['almt_lngkp076'] ?></textarea>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <h5><i class="fas fa-id-card"></i> Dokumen Identitas</h5>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Foto KTP (ft_ktp)</label>
                                    <br>

                                    <?php if (!empty($p['ft_ktp076'])) : ?>
                                        <img src="<?= base_url('img/' . $p['ft_ktp076']) ?>"
                                             width="120"
                                             class="mb-2">
                                    <?php endif; ?>

                                    <input type="file" name="ft_ktp076"
                                           class="form-control"
                                           accept=".jpg,.jpeg,.png">

                                    <input type="hidden" name="ft_ktp_asli076"
                                           value="<?= $p['ft_ktp076'] ?>">

                                    <small class="text-muted">
                                        Kosongkan jika tidak ingin mengganti foto KTP.
                                    </small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Foto SIM A (ft_sim_a)</label>
                                    <br>

                                    <?php if (!empty($p['ft_sim_a076'])) : ?>
                                        <img src="<?= base_url('img/' . $p['ft_sim_a076']) ?>"
                                             width="120"
                                             class="mb-2">
                                    <?php endif; ?>

                                    <input type="file" name="ft_sim_a076"
                                           class="form-control"
                                           accept=".jpg,.jpeg,.png">

                                    <input type="hidden" name="ft_sim_a_asli076"
                                           value="<?= $p['ft_sim_a076'] ?>">

                                    <small class="text-muted">
                                        Kosongkan jika tidak ingin mengganti foto SIM A.
                                    </small>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update
                        </button>

                        <a href="<?= base_url('Penyewa_C076/index') ?>"
                           class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>

                </form>
            </div>

        </div>
    </section>
</div>
<!-- /.content-wrapper -->
