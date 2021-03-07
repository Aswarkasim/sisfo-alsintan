<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
{

    public function index()
    {
        $kontak = $this->Crud_model->listingOne('tbl_general', 'type', 'kontak');
        $data = [
            'kontak'   => $kontak,
            'content'  => 'home/kontak/index'
        ];
        $this->load->view('home/layout/wrapper', $data, FALSE);
        //$this->load->view('home/index');
    }
}
