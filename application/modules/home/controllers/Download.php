<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Download extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $download = $this->Crud_model->listing('tbl_download');
        $data = [
            'download' => $download,
            'content'  => 'home/download/index'
        ];
        $this->load->view('home/layout/wrapper', $data, FALSE);
        //$this->load->view('home/index');
    }

    function download($id_download)
    {

        $file = $this->Crud_model->listingOne('tbl_download', 'id_download', $id_download);

        $this->load->helper('download');
        force_download($file->file, null);
    }
}
