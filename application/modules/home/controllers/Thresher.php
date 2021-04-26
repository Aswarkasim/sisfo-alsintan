<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Thresher extends CI_Controller
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
        $thresher = $this->HM->listData($tahun);
        $data = [
            'thresher'  => $thresher,
            'tahun'  => $tahun,
            'content'  => 'home/thresher/index'
        ];
        $this->load->view('home/layout/wrapper', $data, FALSE);
        //$this->load->view('home/index');
    }
}
