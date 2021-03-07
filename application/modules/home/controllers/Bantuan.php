<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Bantuan extends CI_Controller
{

    public function index()
    {
        $bantuan = $this->Crud_model->listingOne('tbl_general', 'type', 'bantuan');
        $data = [
            'bantuan'  => $bantuan,
            'content'  => 'home/bantuan/index'
        ];
        $this->load->view('home/layout/wrapper', $data, FALSE);
        //$this->load->view('home/index');
    }
}
