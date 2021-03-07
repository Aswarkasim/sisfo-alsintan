<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Utama extends CI_Controller
{

  public function index()
  {
    $utama = $this->Crud_model->listingOne('tbl_general', 'type', 'sambutan');
    $valid = $this->form_validation;
    $valid->set_rules('deskripsi', 'Deskripsi', 'required', array('required' => '%s tidak boleh kosong'));

    if ($valid->run() === FALSE) {
      $data = [
        'title'     => 'Utama ',
        'utama'    => $utama,
        'content'   => 'admin/utama/edit'
      ];
      $this->load->view('admin/layout/wrapper', $data, FALSE);
    } else {
      $i = $this->input;
      $data = [
        'judul'   => $i->post('judul'),
        'deskripsi'   => $i->post('deskripsi')
      ];
      $this->Crud_model->edit('tbl_general', 'type', 'sambutan', $data);
      $this->session->set_flashdata('msg', 'Kontak diubah');
      redirect('admin/utama');
    }
  }
}
