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
      'title'    => 'List Download',
      'add'    => 'admin/download/add',
      'edit'    => 'admin/download/edit/',
      'delete'    => 'admin/download/delete/',
      'download'   => $download,
      'content'  => 'admin/download/index'
    ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }


  public function add()
  {

    $this->load->helper('string');

    $required = '%s tidak boleh kosong';
    $valid = $this->form_validation;
    $valid->set_rules('nama_download', 'Nama File', 'required', ['required' => $required]);
    if ($valid->run()) {

      if (!empty($_FILES['file']['name'])) {
        $config['upload_path']   = './assets/uploads/dokumen/';
        $config['allowed_types'] = 'pdf|doc|docx|xlx|xls|xlsx';
        $config['max_size']      = '24000'; // KB 
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('file')) {
          $data = [
            'title'    => 'Tambah Download',
            'add'    => 'admin/download/add',
            'edit'    => 'admin/download/edit/',
            'back'    => 'admin/download',
            'error'     => $this->upload->display_errors(),
            'content'  => 'admin/download/add'
          ];
          $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
          $upload_data = ['uploads' => $this->upload->data()];

          $i = $this->input;
          $data = [
            'id_download'       => random_string(),
            'nama_download'    => $i->post('nama_download'),
            'file'          => $config['upload_path'] . $upload_data['uploads']['file_name']
          ];
          $this->Crud_model->add('tbl_download', $data);
          $this->session->set_flashdata('msg', 'Download ditambahkan');
          redirect('admin/download/');
        }
      }
    }

    $data = [
      'title'    => 'Tambah Download',
      'add'    => 'admin/download/add',
      'edit'    => 'admin/download/edit/',
      'back'    => 'admin/download',
      'content'  => 'admin/download/add'
    ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }


  public function edit($id_download)
  {

    $file = $this->Crud_model->listingOne('tbl_download', 'id_download', $id_download);
    $required = '%s tidak boleh kosong';
    $i = $this->input;
    $valid = $this->form_validation;
    $valid->set_rules('nama_download', 'Nama File', 'required', ['required' => $required]);
    if ($valid->run()) {

      if (!empty($_FILES['file']['name'])) {
        $config['upload_path']   = './assets/uploads/dokumen/';
        $config['allowed_types'] = 'pdf|doc|docx|xlx|xls|xlsx';
        $config['max_size']      = '24000'; // KB 
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('file')) {
          $data = [
            'title'    => 'Tambah Download',
            'edit'    => 'admin/download/edit/',
            'back'    => 'admin/download',
            'file'    => $file,
            'error'     => $this->upload->display_errors(),
            'content'  => 'admin/download/edit'
          ];
          $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
          $upload_data = ['uploads' => $this->upload->data()];

          if ($file->file != '') {
            unlink($file->file);
          }

          $data = [
            'id_download'       => $id_download,
            'nama_download'    => $i->post('nama_download'),
            'file'          => $config['upload_path'] . $upload_data['uploads']['file_name']
          ];
          $this->Crud_model->edit('tbl_download', 'id_download', $id_download, $data);
          $this->session->set_flashdata('msg', 'Download diubah');
          redirect('admin/download/');
        }
      } else {
        $data = [
          'id_download'       => $id_download,
          'nama_download'    => $i->post('nama_download')
        ];
        $this->Crud_model->edit('tbl_download', 'id_download', $id_download, $data);
        $this->session->set_flashdata('msg', 'Download diubah');
        redirect('admin/download/');
      }
    }

    $data = [
      'title'    => 'Tambah Download',
      'edit'    => 'admin/download/edit/',
      'back'    => 'admin/download',
      'file'    => $file,
      'content'  => 'admin/download/edit'
    ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  function download($id_download)
  {

    $file = $this->Crud_model->listingOne('tbl_download', 'id_download', $id_download);

    $this->load->helper('download');
    force_download($file->file, null);
  }

  function delete($id_download)
  {
    $d = $this->Crud_model->listingOne('tbl_download', 'id_download', $id_download);
    if ($d->dile != '') {
      unlink($d->dile);
    }
    $this->Crud_model->delete('tbl_download', 'id_download', $id_download);
    $this->session->set_flashdata('msg', 'data telah dihapus');
    redirect('admin/download');
  }
}
