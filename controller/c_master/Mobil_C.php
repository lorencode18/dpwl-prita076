<?php
class Mobil_C extends Controller
{
    public dunction index()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/mobilview');
        $this->load->view('layout/footer');
    }
}