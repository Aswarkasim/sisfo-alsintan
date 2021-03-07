<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Gis extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('home/Home_model', 'HM');
    }


    public function index()
    {

        $tahun = $this->input->post('tahun');
        $current = date('Y-m-d');
        $yearNow = date("Y", strtotime($current));

        if ($tahun == null) {
            $tahun  = $yearNow;
        }

        $kecamatan = $this->HM->listDataKecamatan($tahun);
        // $kecamatan = $this->Crud_model->listing('tbl_kecamatan');
        // print_r($tahun);
        // print_r($kecamatan);



        $data = [
            'kecamatan' => $kecamatan,
            'tahun'      => $tahun,
            'content'  => 'home/gis/index_b'
        ];
        $this->load->view('home/layout/wrapper', $data, FALSE);
        //$this->load->view('home/index');
    }
}
