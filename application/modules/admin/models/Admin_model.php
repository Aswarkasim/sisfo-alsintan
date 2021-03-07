<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

  function listData()
  {
    $this->db->select('tbl_data.*,
                            tbl_kecamatan.nama_kecamatan')
      ->from('tbl_data')
      ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_data.id_kecamatan', 'LEFT')
      ->order_by('tbl_data.tahun', 'DESC');
    return $this->db->get()->result();
  }

  function cekKecTahun($id_kecamatan, $tahun)
  {
    $this->db->select('*')
      ->from('tbl_data')
      ->where('id_kecamatan', $id_kecamatan)
      ->where('tahun', $tahun);
    return $this->db->get()->row();
  }
}
