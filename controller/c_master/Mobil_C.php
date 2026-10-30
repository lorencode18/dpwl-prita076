<?php
class Mobil_C extends Controller
{
    public function index()
    {
        $info['nm_user'] = explode('@', $this->session->userdata('emailuser'))[0];
        $cekdata = $this->load->model('m_master/Mobil_M');
        $dt['dtmobil'] = $cekdata->datamobil();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/mobilview', $dt);
        $this->load->view('layout/footer');
    }

    public function create_mobil()
    {
        $info['nm_user'] = explode('@', $this->session->userdata('emailuser'))[0];
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar',$info);
        $this->load->view('v_master/create_mobilview');
        $this->load->view('layout/footer');
    }

    public function simpan()
    {
        $mobil = $this->load->model('m_master/Mobil_M');
        if ($mobil->cekplat($this->load->post('no_plat'))) {
            echo "<script>
                alert('Nomor plat sudah terdaftar!');
                window.history.back();
                </script>";
            exit;
        }
        
        $ft_depan = 'Depan' . $this->load->post('no_plat');
        $ft_blkg = 'Belakang' . $this->load->post('no_plat');
        $ft_interior = 'Interior' . $this->load->post('no_plat');

        
        $nmgambar = $_FILES['ft_depan']['tmp_name'];
        $ekstensi = explode(".", $_FILES['ft_depan']['name']);
        $ekstensi = end($ekstensi);
        $ft_depan = $ft_depan . '.' . $ekstensi;
        $target_dir = dirname(__DIR__, 2) . '/img/' . $ft_depan;
        if ($ekstensi != 'jpg' && $ekstensi != 'png' && $ekstensi != 'jpeg') {
            echo "<script>alert('Gagal simpan gambar depan, format jpg, png dan jpeg...');</script>";
        } else {
            move_uploaded_file($nmgambar, $target_dir);
        }

        $nmgambar = $_FILES['ft_blkg']['tmp_name'];
        $ekstensi = explode(".", $_FILES['ft_blkg']['name']);
        $ekstensi = end($ekstensi);
        $ft_blkg = $ft_blkg . '.' . $ekstensi;
        $target_dir = dirname(__DIR__, 2) . '/img/' . $ft_blkg;
        if ($ekstensi != 'jpg' && $ekstensi != 'png' && $ekstensi != 'jpeg') {
            echo "<script>alert('Gagal simpan gambar blkg, format jpg, png dan jpeg...');</script>";
        } else {
            move_uploaded_file($nmgambar, $target_dir);
        }

        $nmgambar = $_FILES['ft_interior']['tmp_name'];
        $ekstensi = explode(".", $_FILES['ft_interior']['name']);
        $ekstensi = end($ekstensi);
        $ft_interior = $ft_interior . '.' . $ekstensi;
        $target_dir = dirname(__DIR__, 2) . '/img/' . $ft_interior;
        if ($ekstensi != 'jpg' && $ekstensi != 'png' && $ekstensi != 'jpeg') {
            echo "<script>alert('Gagal simpan gambar interior, format jpg, png dan jpeg...');</script>";
        } else {
            move_uploaded_file($nmgambar, $target_dir);
        }

        $data = [
            'no_plat' => $this->load->post('no_plat'),
            'nm_mobil' => $this->load->post('nm_mobil'),
            'nkursi' => $this->load->post('nkursi'),
            'nbagasi' => $this->load->post('nbagasi'),
            'jns_mobil' => $this->load->post('jns_mobil'),
            'transmisi' => $this->load->post('transmisi'),
            'thn_buat' => $this->load->post('thn_buat'),
            'ft_depan' => $ft_depan,
            'ft_blkg' => $ft_blkg,
            'ft_interior' => $ft_interior,
            'hrg_hari' => $this->load->post('hrg_hari'),
            'cttn_unit' => $this->load->post('cttn_unit'),
            'status_unit' => $this->load->post('status_unit')
        ];

        $simpan = $mobil->simpan($data);

        if ($simpan) {
            echo "<script>
                alert('Data mobil berhasil disimpan!');
                window.location.href = '" . base_url('Mobil_C/index') . "';
            </script>";
        } else {
            echo "<script>
                alert('Data mobil gagal disimpan!');
                window.history.back();
            </script>";
        }
    }

    public function edit($no_plat)
    {
        $info['nm_user'] = explode('@', $this->session->userdata('emailuser'))[0];
        $mobil = $this->load->model('Mobil_M');
        $dt['mobil'] = $mobil->detailmobil($no_plat);

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/update_mobilview', $dt);
        $this->load->view('layout/footer');
    }
    
    public function update()
    {
        $mobil = $this->load->model('m_master/Mobil_M');
        $no_plat = $this->load->post('no_plat');

        $lama = $mobil->detailmobil($no_plat);

        if (!$lama) {
            echo "<script>
                alert('Data mobil tidak ditemukan!');
                window.location.href = '" . base_url('Mobil_C/index') . "';
            </script>";
            exit;
        }

        $foto = [
            'ft_depan' => $lama['ft_depan'],
            'ft_blkg' => $lama['ft_blkg'],
            'ft_interior' => $lama['ft_interior']
        ];

        $kolomFoto = [
            'ft_depan' => 'Depan',
            'ft_blkg' => 'Belakang',
            'ft_interior' => 'Interior'
        ];

        foreach ($kolomFoto as $kolom => $awalan) {
            if (
                isset($_FILES[$kolom]) &&
                $_FILES[$kolom]['error'] === UPLOAD_ERR_OK
            ) {
                $ekstensi = strtolower(
                    pathinfo(
                        $_FILES[$kolom]['name'],
                        PATHINFO_EXTENSION
                    )
                );

                if (!in_array($ekstensi, ['jpg', 'jpeg', 'png'])) {
                    echo "<script>
                        alert('Format foto harus JPG, JPEG, atau PNG!');
                        window.history.back();
                    </script>";
                    exit;
                }

                $namaFoto = $awalan . $no_plat . '.' . $ekstensi;
                $target = dirname(__DIR__, 2) . '/img/' . $namaFoto;

                if (move_uploaded_file(
                    $_FILES[$kolom]['tmp_name'],
                    $target
                )) {
                    $foto[$kolom] = $namaFoto;
                } else {
                    echo "<script>
                        alert('Foto gagal diunggah!');
                        window.history.back();
                    </script>";
                    exit;
                }
            } elseif (
                isset($_FILES[$kolom]) &&
                $_FILES[$kolom]['error'] !== UPLOAD_ERR_NO_FILE
            ) {
                echo "<script>
                    alert('Terjadi kesalahan saat mengunggah foto!');
                    window.history.back();
                </script>";
                exit;
            }
        }

        $data = [
            'no_plat' => $no_plat,
            'nm_mobil' => $this->load->post('nm_mobil'),
            'nkursi' => $this->load->post('nkursi'),
            'nbagasi' => $this->load->post('nbagasi'),
            'jns_mobil' => $this->load->post('jns_mobil'),
            'transmisi' => $this->load->post('transmisi'),
            'thn_buat' => $this->load->post('thn_buat'),
            'ft_depan' => $foto['ft_depan'],
            'ft_blkg' => $foto['ft_blkg'],
            'ft_interior' => $foto['ft_interior'],
            'hrg_hari' => $this->load->post('hrg_hari'),
            'cttn_unit' => $this->load->post('cttn_unit'),
            'status_unit' => $this->load->post('status_unit')
        ];

        if ($mobil->update($data)) {
            echo "<script>
                alert('Data mobil berhasil diperbarui!');
                window.location.href = '" . base_url('Mobil_C/index') . "';
            </script>";
        } else {
            echo "<script>
                alert('Data mobil gagal diperbarui!');
                window.history.back();
            </script>";
        }
    }

    public function hapus($no_plat)
    {
        $mobil = $this->load->model('m_master/Mobil_M');

        if ($mobil->hapus($no_plat)) {
            echo "<script>
                alert('Data mobil berhasil dihapus!');
                window.location.href = '" . base_url('Mobil_C/index') . "';
            </script>";
        } else {
            echo "<script>
                alert('Data mobil gagal dihapus!');
                window.location.href = '" . base_url('Mobil_C/index') . "';
            </script>";
        }
    }

    public function keluar()
    {
        $this->session->unset_userdata('emailuser');
        $this->session->set_flashdata('pesan', 'Berhasil Logout');
        redirect('login_C/index');
        exit;
    }
}