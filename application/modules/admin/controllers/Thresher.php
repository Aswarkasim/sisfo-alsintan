<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Thresher extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/Admin_model', 'AM');
  }


  public function index()
  {
    $thresher = $this->AM->listData();
    $data = [
      'add'      => 'admin/thresher/add',
      'edit'      => 'admin/thresher/edit/',
      'delete'      => 'admin/thresher/delete/',
      'thresher'      => $thresher,
      'content'   => 'admin/thresher/index'
    ];

    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }


  function add()
  {
    $this->load->helper('string');

    $kecamatan = $this->Crud_model->listing('tbl_kecamatan');
    $valid = $this->form_validation;
    $valid->set_rules('luas_panen', 'Luas Panen', 'required');

    if ($valid->run() === FALSE) {
      $data = [
        'title'     => 'Tambah Thresher',
        'add'       => 'admin/thresher/add',
        'back'      => 'admin/thresher',
        'kecamatan' => $kecamatan,
        'content'   => 'admin/thresher/add'
      ];
      $this->load->view('admin/layout/wrapper', $data, FALSE);
    } else {

      $thresher = $this->Crud_model->listingOne('tbl_alat', 'type', 'thresher');
      $i = $this->input;
      $id_data = random_string();
      $tahun = $i->post('tahun');
      $id_kecamatan = $i->post('id_kecamatan');
      $a   = $i->post('asumsi_penggunaan');
      $tersedia   = $i->post('tersedia');
      $lp   = $i->post('luas_panen');
      $ph   = $i->post('produktivitas_gabah');

      $gkp = $lp * $ph;

      $kebutuhan = $this->hitungKebutuhan($thresher, $lp, $ph, $a);
      $selisih = $tersedia - $kebutuhan;
      $status = $this->setStatus($tersedia, $kebutuhan);


      //cek apakah data kecamatan dan tahun sudah ada
      $kec = $this->AM->cekKecTahun($id_kecamatan, $tahun);
      if ($kec == null) {
        $data = [
          'id_data'                      => $id_data,
          'id_kecamatan'                 => $id_kecamatan,
          'tahun'                        => $id_kecamatan,
          'tersedia_thresher'            => $tersedia,
          'luas_panen'                   => $lp,
          'asumsi_penggunaan_thresher'   => $a,
          'kebutuhan_thresher'           => $kebutuhan,
          'produksi_gabah_kering'        => $gkp,
          'selisih_thresher'             => $selisih,
          'status_thresher'              => $status,
        ];
        $this->Crud_model->add('tbl_data', $data);
        $this->session->set_flashdata('msg', 'ditambah');
        redirect('admin/thresher/add', 'refresh');
      } else {
        $id_data = $kec->id_data;
        if (($kec->kebutuhan_thresher != '') || $kec->kebutuhan_thresher != null) {
          $this->session->set_flashdata('msg_er', 'data kecamatan telah ada. Gunakan fitur edit untuk perubahan data');
          redirect('admin/thresher/add', 'refresh');
        } else {
          $data = [
            'id_data'                      => $id_data,
            'id_kecamatan'                 => $id_kecamatan,
            'tahun'                        => $id_kecamatan,
            'tersedia_thresher'            => $tersedia,
            'luas_panen'                   => $lp,
            'asumsi_penggunaan_thresher'   => $a,
            'kebutuhan_thresher'           => $kebutuhan,
            'produksi_gabah_kering'        => $gkp,
            'selisih_thresher'             => $selisih,
            'status_thresher'              => $status,
          ];
          $this->Crud_model->edit('tbl_data', 'id_data', $id_data, $data);
          $this->session->set_flashdata('msg', 'ditambah');
          redirect('admin/thresher/add', 'refresh');
        }
      }
    }
  }

  function hitungKebutuhan($thresher, $lp = 0, $ph = 0, $a = 0)
  {

    $dpt = $thresher->dtj * $thresher->jtd * $thresher->htd;
    $p = $lp * $ph;
    $po = $p * ($a / 100);
    $jb = $po / $dpt;

    // print_r($jb);
    // die;
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
    $thresher = $this->Crud_model->listingOne('tbl_data', 'id_data', $id_data);

    $kecamatan = $this->Crud_model->listing('tbl_kecamatan');
    $valid = $this->form_validation;
    $valid->set_rules('luas_panen', 'Luas Sawah', 'required');

    if ($valid->run() === FALSE) {
      $data = [
        'title'     => 'Edit Thresher',
        'edit'       => 'admin/thresher/edit/',
        'back'      => 'admin/thresher',
        'kecamatan' => $kecamatan,
        'thresher' => $thresher,
        'content'   => 'admin/thresher/edit'
      ];
      $this->load->view('admin/layout/wrapper', $data, FALSE);
    } else {

      $thresher = $this->Crud_model->listingOne('tbl_alat', 'type', 'thresher');
      $i = $this->input;
      $a   = $i->post('asumsi_penggunaan');
      $tersedia   = $i->post('tersedia');
      $ls   = $i->post('luas_sawah');

      $kebutuhan = $this->hitungKebutuhan($thresher, $ls, $a);
      $selisih = $tersedia - $kebutuhan;
      $status = $this->setStatus($tersedia, $kebutuhan);

      $data = [
        'id_data'          => $id_data,
        'id_kecamatan'        => $i->post('id_kecamatan'),
        'tahun'               => $i->post('tahun'),
        'type'          => 'thresher',
        'tersedia'    => $tersedia,
        'luas_sawah'          => $ls,
        'asumsi_penggunaan'   => $a,
        'kebutuhan'   => $kebutuhan,
        'selisih'             => $selisih,
        'status'              => $status,
      ];
      $this->Crud_model->edit('tbl_data', 'id_data', $id_data, $data);
      $this->session->set_flashdata('msg', 'ditambah');
      redirect('admin/thresher', 'refresh');
    }
  }

  function delete($id_data)
  {
    $this->Crud_model->delete('tbl_data', 'id_data', $id_data);
    $this->session->set_flashdata('msg', 'dihapus');
    redirect('admin/thresher');
  }
}
