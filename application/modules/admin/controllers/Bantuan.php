<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Bantuan extends CI_Controller
{

    public function index()
    {
        $bantuan = $this->Crud_model->listingOne('tbl_general', 'type', 'bantuan');
        $valid = $this->form_validation;
        $valid->set_rules('deskripsi', 'Deskripsi', 'required', array('required' => '%s tidak boleh kosong'));

        if ($valid->run() === FALSE) {
            $data = [
                'title'     => 'Bantuan ',
                'bantuan'    => $bantuan,
                'content'   => 'admin/bantuan/edit'
            ];
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;
            $data = [
                'deskripsi'   => $i->post('deskripsi')
            ];
            $this->Crud_model->edit('tbl_general', 'type', 'bantuan', $data);
            $this->session->set_flashdata('msg', 'Kontak diubah');
            redirect('admin/bantuan');
        }
    }
}
