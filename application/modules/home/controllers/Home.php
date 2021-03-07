<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $berita = $this->Crud_model->listing('tbl_berita');
        $data = [
            'berita'    => $berita,
            'content'  => 'home/home/index'
        ];
        $this->load->view('home/layout/wrapper', $data, FALSE);
        //$this->load->view('home/index');
    }
}
