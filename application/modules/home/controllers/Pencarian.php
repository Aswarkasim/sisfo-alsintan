<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Pencarian extends CI_Controller
{

    public function index()
    {
        $data = ['content'  => 'home/pencarian/index'];
        $this->load->view('home/layout/wrapper', $data, FALSE);
    }
}
