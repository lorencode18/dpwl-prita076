
<!-- Content Wrapper -->
<div class="content-wrapper">

    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Data Mobil</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('Mobil_C/index') ?>">Master Mobil</a>
                        </li>
                        <li class="breadcrumb-item active">Edit Mobil</li>
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
                        <i class="fas fa-edit"></i> Form Edit Data Mobil
                    </h3>
                </div>

                <form action="<?= base_url('Mobil_C/update') ?>"
                      method="post"
                      enctype="multipart/form-data">

                    <div class="card-body">

                        <!-- Informasi Mobil -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>No. Plat</label>
                                    <input type="text" name="no_plat"
                                           class="form-control"
                                           value="<?= htmlspecialchars($m['no_plat'] ?? '') ?>"
                                           readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Mobil</label>
                                    <input type="text" name="nm_mobil"
                                           class="form-control"
                                           placeholder="Contoh: Toyota Avanza"
                                           value="<?= htmlspecialchars($m['nm_mobil'] ?? '') ?>"
                                           required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Jumlah Kursi</label>
                                    <input type="number" name="nkursi"
                                           class="form-control"
                                           min="1"
                                           value="<?= htmlspecialchars($m['nkursi'] ?? '') ?>"
                                           required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Jumlah Bagasi</label>
                                    <input type="number" name="nbagasi"
                                           class="form-control"
                                           min="0"
                                           value="<?= htmlspecialchars($m['nbagasi'] ?? '') ?>"
                                           required>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Jenis Mobil</label>
                                    <select name="jns_mobil"
                                            class="form-control" required>
                                        <option value="">-- Pilih Jenis --</option>
                                        <?php
                                        $jenisMobil = [
                                            'Kijang',
                                            'Minibus',
                                            'MPV',
                                            'SUV',
                                            'Sedan',
                                            'City Car'
                                        ];

                                        foreach ($jenisMobil as $jenis) {
                                        ?>
                                            <option value="<?= htmlspecialchars($jenis) ?>"
                                                <?= ($m['jns_mobil'] ?? '') === $jenis ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($jenis) ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Transmisi</label>
                                    <select name="transmisi"
                                            class="form-control" required>
                                        <option value="">-- Pilih Transmisi --</option>
                                        <option value="Manual"
                                            <?= ($m['transmisi'] ?? '') === 'Manual' ? 'selected' : '' ?>>
                                            Manual
                                        </option>
                                        <option value="Automatic"
                                            <?= ($m['transmisi'] ?? '') === 'Automatic' ? 'selected' : '' ?>>
                                            Automatic
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tahun Pembuatan</label>
                                    <input type="number" name="thn_buat"
                                           class="form-control"
                                           placeholder="Contoh: 2024"
                                           min="1900" max="2100"
                                           value="<?= htmlspecialchars($m['thn_buat'] ?? '') ?>"
                                           required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Biaya Per Hari</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="number" name="hrg_hari"
                                               class="form-control"
                                               placeholder="Contoh: 350000"
                                               min="0" step="0.01"
                                               value="<?= htmlspecialchars($m['hrg_hari'] ?? '') ?>"
                                               required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Status Unit</label>
                                    <select name="status_unit"
                                            class="form-control" required>
                                        <option value="">-- Pilih Status --</option>
                                        <?php
                                        $statusUnit = [
                                            'Aktif',
                                            'Tidak Aktif',
                                            'Tersedia',
                                            'Tidak Tersedia'
                                        ];

                                        foreach ($statusUnit as $status) {
                                        ?>
                                            <option value="<?= htmlspecialchars($status) ?>"
                                                <?= ($m['status_unit'] ?? '') === $status ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($status) ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>

                    <hr>

                    <!-- Foto Mobil -->
                    <div class="card-body">
                        <h5><i class="fas fa-camera"></i> Foto Mobil</h5>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Foto Depan Saat Ini</label><br>
                                    <img src="<?= base_url('img/' . rawurlencode($m['ft_depan'] ?? '')) ?>"
                                         alt="Foto depan mobil"
                                         style="width:200px; height:130px; object-fit:contain;">

                                    <input type="file" name="ft_depan"
                                           class="form-control mt-2"
                                           accept=".jpg,.jpeg,.png">

                                    <small class="text-muted">
                                        Kosongkan jika tidak ingin mengganti foto.
                                    </small>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Foto Belakang Saat Ini</label><br>
                                    <img src="<?= base_url('img/' . rawurlencode($m['ft_blkg'] ?? '')) ?>"
                                         alt="Foto belakang mobil"
                                         style="width:200px; height:130px; object-fit:contain;">

                                    <input type="file" name="ft_blkg"
                                           class="form-control mt-2"
                                           accept=".jpg,.jpeg,.png">

                                    <small class="text-muted">
                                        Kosongkan jika tidak ingin mengganti foto.
                                    </small>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Foto Interior Saat Ini</label><br>
                                    <img src="<?= base_url('img/' . rawurlencode($m['ft_interior'] ?? '')) ?>"
                                         alt="Foto interior mobil"
                                         style="width:200px; height:130px; object-fit:contain;">

                                    <input type="file" name="ft_interior"
                                           class="form-control mt-2"
                                           accept=".jpg,.jpeg,.png">

                                    <small class="text-muted">
                                        Kosongkan jika tidak ingin mengganti foto.
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Catatan Unit</label>
                            <textarea name="cttn_unit"
                                      class="form-control"
                                      rows="3"
                                      placeholder="Masukkan catatan mengenai kendaraan"><?= htmlspecialchars($m['cttn_unit'] ?? '') ?></textarea>
                        </div>
                    </div>

                    <!-- Tombol -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Perubahan
                        </button>

                        <a href="<?= base_url('Mobil_C/index') ?>"
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
