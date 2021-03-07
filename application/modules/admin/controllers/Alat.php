<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Alat extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
  }



  public function detail($id_alat)
  {
    $alat = $this->Crud_model->listingOne('tbl_alat', 'id_alat', $id_alat);
    $data = [
      'title'    => 'List Berita',
      'alat'   => $alat,
      'content'  => 'admin/alat/index'
    ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  public function edit($id_alat)
  {
    $alat = $this->Crud_model->listingOne('tbl_alat', 'id_alat', $id_alat);
    $valid = $this->form_validation;
    $valid->set_rules('deskripsi', 'Deskripsi', 'required', array('required' => '%s tidak boleh kosong'));

    $i = $this->input;
    if ($valid->run()) {
      if (!empty($_FILES['gambar']['name'])) {
        $config['upload_path']   = './assets/uploads/images/';
        $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
        $config['max_size']      = '24000'; // KB 
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('gambar')) {
          $data = [
            'title'   => 'Edit Alat',
            'alat'    => $alat,
            'error'     => $this->upload->display_errors(),
            'content'  => 'admin/alat/edit'
          ];
          $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
          $upload_data = ['uploads' => $this->upload->data()];

          if ($alat->gambar != '') {
            unlink($alat->gambar);
          }

          $data = [
            'id_alat'       => $id_alat,
            'nama_alat'    => $i->post('nama_alat'),
            'deskripsi'    => $i->post('deskripsi'),
            'gambar'          => $config['upload_path'] . $upload_data['uploads']['file_name']
          ];
          $this->Crud_model->edit('tbl_alat', 'id_alat', $id_alat, $data);
          $this->session->set_flashdata('msg', 'Data Alat diubah');
          redirect('admin/alat/detail/' . $id_alat);
        }
      } else {
        $data = [
          'id_alat'       => $id_alat,
          'deskripsi'    => $i->post('deskripsi'),
          'nama_alat'    => $i->post('nama_alat')
        ];
        $this->Crud_model->edit('tbl_alat', 'id_alat', $id_alat, $data);
        $this->session->set_flashdata('msg', 'Data Alat diubah');
        redirect('admin/alat/detail/' . $id_alat);
      }
    }
    $data = [
      'title'   => 'Edit Alat',
      'alat'    => $alat,
      'content'  => 'admin/alat/edit'
    ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }
}
