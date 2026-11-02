
<!-- Content Wrapper -->
<div class="content-wrapper">

    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Entri Data Penyewa</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('Penyewa_C076/index') ?>">Master Penyewa</a>
                        </li>
                        <li class="breadcrumb-item active">Entri Penyewa</li>
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
                        <i class="fas fa-user-plus"></i> Form Entri Data Penyewa
                    </h3>
                </div>

                <form action="<?= base_url('Penyewa_C076/simpan') ?>"
                      method="post"
                      enctype="multipart/form-data">

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Username (User Pelanggan)</label>
                                    <input type="text" name="user_plg076"
                                           class="form-control"
                                           placeholder="Contoh: Budi123"
                                           required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kata Sandi (Password)</label>
                                    <input type="password" name="sandi076"
                                           class="form-control"
                                           placeholder="Masukkan kata sandi"
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
                                           placeholder="Nomor Induk Kependudukan"
                                           required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nm_lngkp076"
                                           class="form-control"
                                           placeholder="Contoh: Budi Santoso"
                                           required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>No. Handphone</label>
                                    <input type="text" name="no_hp076"
                                           class="form-control"
                                           placeholder="Contoh: 081234567890"
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
                                              placeholder="Masukkan alamat lengkap penyewa"
                                              required></textarea>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <h5><i class="fas fa-id-card"></i> Dokumen Identitas</h5>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Foto KTP (ft_ktp)</label>
                                    <input type="file" name="ft_ktp"
                                           class="form-control"
                                           accept=".jpg,.jpeg,.png"
                                           required>
                                    <small class="text-muted">
                                        Format JPG, JPEG atau PNG
                                    </small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Foto SIM A (ft_sim_a)</label>
                                    <input type="file" name="ft_sim_a"
                                           class="form-control"
                                           accept=".jpg,.jpeg,.png"
                                           required>
                                    <small class="text-muted">
                                        Format JPG, JPEG atau PNG
                                    </small>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan
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
