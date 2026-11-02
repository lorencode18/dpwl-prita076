<?php
class Penyewa_C076 extends Controller
{
    public function index()
    {
        $info['nm_user'] = explode('@', $this->session->userdata('emailuser'))[0];
        $cekdata = $this->load->model('m_master/Penyewa_M076');
        $dt['dtpenyewa'] = $cekdata->datapenyewa();

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/penyewaview076', $dt);
        $this->load->view('layout/footer');
    }

    public function create_penyewa()
    {
        $info['nm_user'] = explode('@', $this->session->userdata('emailuser'))[0];

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/create_penyewaview076');
        $this->load->view('layout/footer');
    }

    public function simpan()
    {
        $penyewa = $this->load->model('m_master/Penyewa_M076');

        if ($penyewa->cekuser($this->load->post('user_plg076'))) {
            echo "<script>
                alert('Username sudah terdaftar!');
                window.history.back();
                </script>";
            exit;
        }

        $ft_ktp = 'KTP' . $this->load->post('user_plg076');
        $ft_sim_a = 'SIM' . $this->load->post('user_plg076');

        $nmgambar = $_FILES['ft_ktp076']['tmp_name'];
        $ekstensi = explode(".", $_FILES['ft_ktp076']['name']);
        $ekstensi = end($ekstensi);
        $ft_ktp = $ft_ktp . '.' . $ekstensi;
        $target_dir = dirname(__DIR__, 2) . '/img/' . $ft_ktp;

        if ($ekstensi != 'jpg' && $ekstensi != 'png' && $ekstensi != 'jpeg') {
            echo "<script>alert('Gagal simpan gambar KTP, format jpg, png dan jpeg...');</script>";
        } else {
            move_uploaded_file($nmgambar, $target_dir);
        }

        $nmgambar = $_FILES['ft_sim_a076']['tmp_name'];
        $ekstensi = explode(".", $_FILES['ft_sim_a076']['name']);
        $ekstensi = end($ekstensi);
        $ft_sim_a = $ft_sim_a . '.' . $ekstensi;
        $target_dir = dirname(__DIR__, 2) . '/img/' . $ft_sim_a;

        if ($ekstensi != 'jpg' && $ekstensi != 'png' && $ekstensi != 'jpeg') {
            echo "<script>alert('Gagal simpan gambar SIM A, format jpg, png dan jpeg...');</script>";
        } else {
            move_uploaded_file($nmgambar, $target_dir);
        }

        $data = [
            'user_plg076' => $this->load->post('user_plg076'),
            'Sandi076' => $this->load->post('Sandi076'),
            'Nik076' => $this->load->post('Nik076'),
            'nm_lngkp076' => $this->load->post('nm_lngkp076'),
            'no_hp076' => $this->load->post('no_hp076'),
            'almt_lngkp076' => $this->load->post('almt_lngkp076'),
            'ft_ktp076' => $ft_ktp,
            'ft_sim_a076' => $ft_sim_a
        ];

        $simpan = $penyewa->simpan($data);

        if ($simpan) {
            echo "<script>
                alert('Data penyewa berhasil disimpan!');
                window.location.href = '" . base_url('Penyewa_C076/index') . "';
            </script>";
        } else {
            echo "<script>
                alert('Data penyewa gagal disimpan!');
                window.history.back();
            </script>";
        }
    }

    public function edit($user_plg)
    {
        $info['nm_user076'] = explode('@', $this->session->userdata('emailuser'))[0];
        $penyewa = $this->load->model('m_master/Penyewa_M076');
        $dt['p'] = $penyewa->detailpenyewa($user_plg);

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/update_penyewaview076', $dt);
        $this->load->view('layout/footer');
    }

    public function UpdatePenyewa()
    {
        $penyewa = $this->load->model('m_master/Penyewa_M076');

        $ft_ktp076 = 'KTP' . $this->load->post('user_plg076');
        $ft_ktp_asli076 = $this->load->post('ft_ktp_asli076');

        // Upload gambar baru
        if (isset($_FILES['ft_ktp076']) && $_FILES['ft_ktp076']['error'] != UPLOAD_ERR_NO_FILE) {
            $namagambar = $_FILES['ft_ktp076']['tmp_name'];
            $ekstensi = explode(".", $_FILES['ft_ktp076']['name']);
            $ekstensi = end($ekstensi);
            $ft_ktp076 = $ft_ktp076 . '.' . $ekstensi;
            $target_dir = dirname(__DIR__, 2) . '/img/' . $ft_ktp076;

            if ($ekstensi != "jpg" && $ekstensi != "png" && $ekstensi != "jpeg") {
                echo "<script>alert('Gagal simpan gambar KTP, format jpg, png, dan jpeg..!');</script>";
            } else {
                move_uploaded_file($namagambar, $target_dir);
            }
        } else {
            $ft_ktp076 = $ft_ktp_asli076;
        }

        // Foto SIM A
        $ft_sim_a076 = 'SIM' . $this->load->post('user_plg076');
        $ft_sim_a_asli076 = $this->load->post('ft_sim_a_asli076');

        if (isset($_FILES['ft_sim_a076']) && $_FILES['ft_sim_a076']['error'] != UPLOAD_ERR_NO_FILE) {
            $namagambar = $_FILES['ft_sim_a076']['tmp_name'];
            $ekstensi = explode(".", $_FILES['ft_sim_a076']['name']);
            $ekstensi = end($ekstensi);
            $ft_sim_a076 = $ft_sim_a076 . '.' . $ekstensi;
            $target_dir = dirname(__DIR__, 2) . '/img/' . $ft_sim_a076;

            if ($ekstensi != "jpg" && $ekstensi != "png" && $ekstensi != "jpeg") {
                echo "<script>alert('Gagal simpan gambar SIM A, format jpg, png, dan jpeg..!');</script>";
            } else {
                move_uploaded_file($namagambar, $target_dir);
            }
        } else {
            $ft_sim_a076 = $ft_sim_a_asli076;
        }

        // End upload gambar baru

        $data = [
            'user_plg076' => $this->load->post('user_plg076'),
            'sandi076' => $this->load->post('sandi076'),
            'Nik076' => $this->load->post('Nik076'),
            'nm_lngkp076' => $this->load->post('nm_lngkp076'),
            'no_hp076' => $this->load->post('no_hp076'),
            'almt_lngkp076' => $this->load->post('almt_lngkp076'),
            'ft_ktp076' => $ft_ktp076,
            'ft_sim_a076' => $ft_sim_a076
        ];

        $simpan = $penyewa->UbahDtPenyewa($data);

        if ($simpan) {
            echo "<script>
                alert('Data penyewa berhasil diubah!');
                window.location.href = '" . base_url('Penyewa_C076/index') . "';
                </script>";
        } else {
            echo "<script>
                alert('Data penyewa gagal diubah!');
                window.history.back();
                </script>";
        }
    }

    public function hapus($user_plg076)
    {
        $penyewa = $this->load->model('m_master/Penyewa_M076');

        if ($penyewa->hapus($user_plg076)) {
            echo "<script>
                alert('Data penyewa berhasil dihapus!');
                window.location.href = '" . base_url('Penyewa_C076/index') . "';
            </script>";
        } else {
            echo "<script>
                alert('Data penyewa gagal dihapus!');
                window.location.href = '" . base_url('Penyewa_C076/index') . "';
            </script>";
        }
    }

}