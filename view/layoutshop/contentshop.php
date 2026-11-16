<!-- Products Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">

        <!-- Mobil Avanza -->
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="img/DepanBN 1555 XY.jpg" alt="Avanza">
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3">Avanza</h6>
                    <div class="d-flex justify-content-center">
                        <h6>Rp250.000/hari</h6>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                    <a href="<?= base_url('shopping/detail/' . $m['no_plat']) ?>" class="btn btn-sm text-dark p-0">
                        <i class="fas fa-eye text-danger mr-1"></i>View Detail
                    </a>
                    <a href="<?= base_url('Sewa_C/simpan/' . rawurlencode($m['no_plat'])); ?>"class="btn btn-sm text-dark p-0">
                        <i class="fas fa-shopping-cart text-info mr-1"></i>Pilih Sewa
                    </a>
                </div>
            </div>
        </div>

        <!-- Mobil BMW 320i -->
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="img/DepanBN 1888 AB.jpg" alt="BMW 320i">
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3">BMW 320i</h6>
                    <div class="d-flex justify-content-center">
                        <h6>Rp800.000/hari</h6>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                    <a href="<?= base_url('shopping/detail/' . $m['no_plat']) ?>" class="btn btn-sm text-dark p-0">
                        <i class="fas fa-eye text-danger mr-1"></i>View Detail
                    </a>
                    <a href="<?= base_url('Sewa_C/simpan/' . rawurlencode($m['no_plat'])); ?>"class="btn btn-sm text-dark p-0">
                        <i class="fas fa-shopping-cart text-info mr-1"></i>Pilih Sewa
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Products End -->
