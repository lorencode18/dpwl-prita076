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

    public function edit_mobil($no_plat)
    {
        $info['nm_user'] = explode(
            '@',
            $this->session->userdata('emailuser')
        )[0];

        $mobil = $this->load->model('m_master/Mobil_M');

        $dt['m'] = $mobil->detailmobil($no_plat);

        if (!$dt['m']) {
            echo "<script>
                alert('Data mobil tidak ditemukan!');
                window.location.href = '" . base_url('Mobil_C') . "';
            </script>";
            exit;
        }

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/edit_mobilview', $dt);
        $this->load->view('layout/footer');
    }
    public function update()
    {
        $mobil = $this->load->model('m_master/Mobil_M');

        $no_plat = $this->input->post('no_plat');

        $mobil_lama = $mobil->detailmobil($no_plat);

        if (!$mobil_lama) {
            echo "<script>
                alert('Data mobil tidak ditemukan!');
                window.location.href = '" . base_url('Mobil_C') . "';
            </script>";
            exit;
        }

        $ft_depan = $mobil_lama['ft_depan'];
        $ft_blkg = $mobil_lama['ft_blkg'];
        $ft_interior = $mobil_lama['ft_interior'];

        $folder = FCPATH . 'img/';

        if (
            isset($_FILES['ft_depan']) &&
            $_FILES['ft_depan']['error'] === UPLOAD_ERR_OK
        ) {
            $ft_depan = time() . '_depan_' . basename($_FILES['ft_depan']['name']);

            if (!move_uploaded_file(
                $_FILES['ft_depan']['tmp_name'],
                $folder . $ft_depan
            )) {
                echo "<script>
                    alert('Gagal mengunggah foto depan!');
                    window.history.back();
                </script>";
                exit;
            }
        }

        if (
            isset($_FILES['ft_blkg']) &&
            $_FILES['ft_blkg']['error'] === UPLOAD_ERR_OK
        ) {
            $ft_blkg = time() . '_belakang_' . basename($_FILES['ft_blkg']['name']);

            if (!move_uploaded_file(
                $_FILES['ft_blkg']['tmp_name'],
                $folder . $ft_blkg
            )) {
                echo "<script>
                    alert('Gagal mengunggah foto belakang!');
                    window.history.back();
                </script>";
                exit;
            }
        }

        if (
            isset($_FILES['ft_interior']) &&
            $_FILES['ft_interior']['error'] === UPLOAD_ERR_OK
        ) {
            $ft_interior = time() . '_interior_' . basename($_FILES['ft_interior']['name']);

            if (!move_uploaded_file(
                $_FILES['ft_interior']['tmp_name'],
                $folder . $ft_interior
            )) {
                echo "<script>
                    alert('Gagal mengunggah foto interior!');
                    window.history.back();
                </script>";
                exit;
            }
        }

        $data = [
            'no_plat' => $no_plat,
            'nm_mobil' => $this->input->post('nm_mobil'),
            'nkursi' => $this->input->post('nkursi'),
            'nbagasi' => $this->input->post('nbagasi'),
            'jns_mobil' => $this->input->post('jns_mobil'),
            'transmisi' => $this->input->post('transmisi'),
            'thn_buat' => $this->input->post('thn_buat'),
            'ft_depan' => $ft_depan,
            'ft_blkg' => $ft_blkg,
            'ft_interior' => $ft_interior,
            'hrg_hari' => $this->input->post('hrg_hari'),
            'cttn_unit' => $this->input->post('cttn_unit'),
            'status_unit' => $this->input->post('status_unit')
        ];

        if ($mobil->update($data)) {
            echo "<script>
                alert('Data mobil berhasil diperbarui!');
                window.location.href = '" . base_url('Mobil_C') . "';
            </script>";
        } else {
            echo "<script>
                alert('Data mobil gagal diperbarui!');
                window.history.back();
            </script>";
        }
    }
}