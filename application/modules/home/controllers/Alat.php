<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Alat extends CI_Controller
{

    public function index()
    {
        $alat  = $this->Crud_model->listing('tbl_alat');
        $data = [
            'alat'     => $alat,
            'content'  => 'home/alat/index'
        ];
        $this->load->view('home/layout/wrapper', $data, FALSE);
        //$this->load->view('home/index');
    }

    function detail($id_alat)
    {
        $alat = $this->Crud_model->listingOne('tbl_alat', 'id_alat', $id_alat);
        $data = [
            'alat'     => $alat,
            'content'  => 'home/alat/detail'
        ];
        $this->load->view('home/layout/wrapper', $data, FALSE);
    }
}
