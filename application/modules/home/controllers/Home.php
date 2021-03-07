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
        $sambutan = $this->Crud_model->listingOne('tbl_general', 'type', 'sambutan');
        $data = [
            'sambutan'    => $sambutan,
            'content'  => 'home/home/index'
        ];
        $this->load->view('home/layout/wrapper', $data, FALSE);
        //$this->load->view('home/index');
    }
}
