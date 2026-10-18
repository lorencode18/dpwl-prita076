<!-- Content Wrapper -->
<div class="content-wrapper">

    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Entri Data Mobil</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('Mobil_C/index') ?>">Master Mobil</a>
                        </li>
                        <li class="breadcrumb-item active">Entri Mobil</li>
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
                        <i class="fas fa-car"></i> Form Entri Data Mobil
                    </h3>
                </div>

                <form action="<?= base_url('Mobil_C/simpan') ?>"
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
                                           placeholder="Contoh: BN 1234 AB"
                                           required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Mobil</label>
                                    <input type="text" name="nm_mobil"
                                           class="form-control"
                                           placeholder="Contoh: Toyota Avanza"
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
                                           min="1" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Jumlah Bagasi</label>
                                    <input type="number" name="nbagasi"
                                           class="form-control"
                                           min="0" required>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Jenis Mobil</label>
                                    <select name="jns_mobil"
                                            class="form-control" required>
                                        <option value="">-- Pilih Jenis --</option>
                                        <option value="Kijang">Kijang</option>
                                        <option value="Minibus">Minibus</option>
                                        <option value="MPV">MPV</option>
                                        <option value="SUV">SUV</option>
                                        <option value="Sedan">Sedan</option>
                                        <option value="City Car">City Car</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Transmisi</label>
                                    <select name="transmisi"
                                            class="form-control" required>
                                        <option value="">-- Pilih Transmisi --</option>
                                        <option value="Manual">Manual</option>
                                        <option value="Automatic">Automatic</option>
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
                                           min="1900" max="2100" required>
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
                                               min="0" step="0.01" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Status Unit</label>
                                    <select name="status_unit"
                                            class="form-control" required>
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Aktif">Aktif</option>
                                        <option value="Tidak Aktif">Tidak Aktif</option>
                                        <option value="Tersedia">Tersedia</option>
                                        <option value="Tidak Tersedia">Tidak Tersedia</option>
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
                                    <label>Foto Depan</label>
                                    <input type="file" name="ft_depan"
                                           class="form-control"
                                           accept=".jpg,.jpeg,.png" required>
                                    <small class="text-muted">
                                        Format JPG, JPEG atau PNG
                                    </small>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Foto Belakang</label>
                                    <input type="file" name="ft_blkg"
                                           class="form-control"
                                           accept=".jpg,.jpeg,.png" required>
                                    <small class="text-muted">
                                        Format JPG, JPEG atau PNG
                                    </small>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Foto Interior</label>
                                    <input type="file" name="ft_interior"
                                           class="form-control"
                                           accept=".jpg,.jpeg,.png" required>
                                    <small class="text-muted">
                                        Format JPG, JPEG atau PNG
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Catatan Unit</label>
                            <textarea name="cttn_unit"
                                      class="form-control"
                                      rows="3"
                                      placeholder="Masukkan catatan mengenai kendaraan"></textarea>
                        </div>
                    </div>

                    <!-- Tombol -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan
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
