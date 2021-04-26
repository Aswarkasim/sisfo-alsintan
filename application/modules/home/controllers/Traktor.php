<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Traktor extends CI_Controller
{

    public function index()
    {

        $this->load->model('home/Home_model', 'HM');
        $tahun = $this->input->post('tahun');
        $current = date('Y-m-d');
        $yearNow = date("Y", strtotime($current));

        if ($tahun == null) {
            $tahun  = $yearNow;
        }
        $traktor = $this->HM->listData($tahun);
        $data = [
            'traktor'  => $traktor,
            'tahun'  => $tahun,
            'content'  => 'home/traktor/index'
        ];
        $this->load->view('home/layout/wrapper', $data, FALSE);
        //$this->load->view('home/index');
    }
}
