<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Traktor extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/Admin_model', 'AM');
  }


  public function index()
  {
    $traktor = $this->AM->listData();
    $data = [
      'add'      => 'admin/traktor/add',
      'edit'      => 'admin/traktor/edit/',
      'delete'      => 'admin/traktor/delete/',
      'traktor'      => $traktor,
      'content'   => 'admin/traktor/index'
    ];

    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }


  function add()
  {


    $this->load->helper('string');

    $kecamatan = $this->Crud_model->listing('tbl_kecamatan');
    $valid = $this->form_validation;
    $valid->set_rules('luas_sawah', 'Luas Sawah', 'required');

    if ($valid->run() === FALSE) {
      $data = [
        'title'     => 'Tambah Traktor',
        'add'       => 'admin/traktor/add',
        'back'      => 'admin/traktor',
        'kecamatan' => $kecamatan,
        'content'   => 'admin/traktor/add'
      ];
      $this->load->view('admin/layout/wrapper', $data, FALSE);
    } else {

      $traktor = $this->Crud_model->listingOne('tbl_alat', 'type', 'traktor');
      $i = $this->input;
      $id_data = random_string();
      $tahun = $i->post('tahun');
      $id_kecamatan = $i->post('id_kecamatan');
      $a   = $i->post('asumsi_penggunaan');
      $tersedia   = $i->post('tersedia');
      $ls   = $i->post('luas_sawah');

      $kebutuhan = $this->hitungKebutuhan($traktor, $ls, $a);
      $selisih = $tersedia - $kebutuhan;
      $status = $this->setStatus($tersedia, $kebutuhan);


      $kec = $this->AM->cekKecTahun($id_kecamatan, $tahun);
      if ($kec == null) {
        $data = [
          'id_data'                     => random_string(),
          'id_kecamatan'                => $id_kecamatan,
          'tahun'                       => $tahun,
          'tersedia_traktor'            => $tersedia,
          'luas_sawah'                  => $ls,
          'asumsi_penggunaan_traktor'   => $a,
          'kebutuhan_traktor'           => $kebutuhan,
          'selisih_traktor'             => $selisih,
          'status_traktor'              => $status,
        ];
        $this->Crud_model->add('tbl_data', $data);
        $this->session->set_flashdata('msg', 'ditambah');
        redirect('admin/traktor/add', 'refresh');
      } else {
        $id_data = $kec->id_data;
        if (($kec->kebutuhan_traktor != '') || $kec->kebutuhan_traktor != null) {
          $this->session->set_flashdata('msg_er', 'data kecamatan telah ada. Gunakan fitur edit untuk perubahan data');
          redirect('admin/thresher/add', 'refresh');
        } else {
          $data = [
            'id_data'                     => random_string(),
            'id_kecamatan'                => $id_kecamatan,
            'tahun'                       => $tahun,
            'tersedia_traktor'            => $tersedia,
            'luas_sawah'                  => $ls,
            'asumsi_penggunaan_traktor'   => $a,
            'kebutuhan_traktor'           => $kebutuhan,
            'selisih_traktor'             => $selisih,
            'status_traktor'              => $status,
          ];
          $this->Crud_model->edit('tbl_data', 'id_data', $id_data, $data);
          $this->session->set_flashdata('msg', 'ditambah');
          redirect('admin/traktor/add', 'refresh');
        }
      }
    }
  }

  function hitungKebutuhan($traktor, $ls, $a)
  {
    $dtt = $traktor->dtj * $traktor->jtd * $traktor->htd;
    $lso = $ls * ($a / 100);

    $jb = $lso / $dtt;
    $kebutuhan = round($jb);
    return $kebutuhan;
  }

  function setStatus($tersedia, $kebutuhan)
  {
    $status = '';
    if ($tersedia == $kebutuhan) {
      $status = "Cukup";
    } else if ($tersedia > $kebutuhan) {
      $status = "Lebih";
    } else if ($tersedia < $kebutuhan) {
      $status = "Kurang";
    }
    return $status;
  }


  function edit($id_data)
  {
    $traktor = $this->Crud_model->listingOne('tbl_data', 'id_data', $id_data);

    $kecamatan = $this->Crud_model->listing('tbl_kecamatan');
    $valid = $this->form_validation;
    $valid->set_rules('luas_sawah', 'Luas Sawah', 'required');

    if ($valid->run() === FALSE) {
      $data = [
        'title'     => 'Tambah Traktor',
        'edit'       => 'admin/traktor/edit/',
        'back'      => 'admin/traktor',
        'kecamatan' => $kecamatan,
        'traktor' => $traktor,
        'content'   => 'admin/traktor/edit'
      ];
      $this->load->view('admin/layout/wrapper', $data, FALSE);
    } else {

      $traktor = $this->Crud_model->listingOne('tbl_alat', 'type', 'traktor');
      $i = $this->input;
      $a   = $i->post('asumsi_penggunaan');
      $tersedia   = $i->post('traktor_tersedia');
      $ls   = $i->post('luas_sawah');

      $kebutuhan = $this->hitungKebutuhan($traktor, $ls, $a);
      $selisih = $tersedia - $kebutuhan;
      $status = $this->setStatus($tersedia, $kebutuhan);

      $data = [
        'id_data'          => $id_data,
        'id_kecamatan'        => $i->post('id_kecamatan'),
        'tahun'               => $i->post('tahun'),
        'tersedia_traktor'    => $tersedia,
        'luas_sawah'          => $ls,
        'asumsi_penggunaan_traktor'   => $a,
        'kebutuhan_traktor'   => $kebutuhan,
        'selisih_traktor'             => $selisih,
        'status_traktor'              => $status,
      ];
      $this->Crud_model->edit('tbl_data', 'id_data', $id_data, $data);
      $this->session->set_flashdata('msg', 'ditambah');
      redirect('admin/traktor', 'refresh');
    }
  }

  function delete($id_data)
  {
    $this->Crud_model->delete('tbl_data', 'id_data', $id_data);
    $this->session->set_flashdata('msg', 'dihapus');
    redirect('admin/traktor');
  }
}
