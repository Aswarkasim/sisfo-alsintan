<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{
  function listDataKecamatan($tahun)
  {
    $this->db->select('tbl_kecamatan.*,
                            tbl_data.*')
      ->from('tbl_kecamatan')
      ->join('tbl_data', 'tbl_data.id_kecamatan = tbl_kecamatan.id_kecamatan', 'LEFT')
      ->where('tbl_data.tahun', $tahun);
    return $this->db->get()->result();
  }
}
