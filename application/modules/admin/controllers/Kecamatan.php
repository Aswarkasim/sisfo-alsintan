<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kecamatan extends CI_Controller
{

  public function index()
  {
    $kecamatan = $this->Crud_model->listing('tbl_kecamatan');
    $data = [
      'add'      => 'admin/kecamatan/add',
      'edit'      => 'admin/kecamatan/edit/',
      'delete'      => 'admin/kecamatan/delete/',
      'kecamatan'      => $kecamatan,
      'content'   => 'admin/kecamatan/index'
    ];

    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }


  function add()
  {
    $this->load->helper('string');

    $valid = $this->form_validation;

    $valid->set_rules('nama_kecamatan', 'Nama Kecamatan', 'required');

    if ($valid->run() === FALSE) {
      $data = [
        'title'     => 'Tambah User',
        'add'       => 'admin/kecamatan/add',
        'back'      => 'admin/kecamatan',
        'content'   => 'admin/kecamatan/add'
      ];
      $this->load->view('admin/layout/wrapper', $data, FALSE);
    } else {
      $i = $this->input;
      $data = [
        'id_kecamatan'       => random_string(),
        'nama_kecamatan'     => $i->post('nama_kecamatan')
      ];
      $this->Crud_model->add('tbl_kecamatan', $data);
      $this->session->set_flashdata('msg', 'ditambah');
      redirect('admin/kecamatan/add', 'refresh');
    }
  }
}
