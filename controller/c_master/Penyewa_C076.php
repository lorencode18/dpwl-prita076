<?php
class Penyewa_C extends Controller
{
    public function index()
    {
        $info['nm_user'] = explode('@', $this->session->userdata('emailuser'))[0];
        $cekdata = $this->load->model('m_master/Penyewa_M');
        $dt['dtpenyewa'] = $cekdata->datapenyewa();

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/penyewaview', $dt);
        $this->load->view('layout/footer');
    }
}