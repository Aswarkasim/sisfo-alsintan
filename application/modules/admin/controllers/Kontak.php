<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
{

    public function index()
    {
        $kontak = $this->Crud_model->listingOne('tbl_general', 'type', 'kontak');
        $valid = $this->form_validation;
        $valid->set_rules('deskripsi', 'Deskripsi', 'required', array('required' => '%s tidak boleh kosong'));

        if ($valid->run() === FALSE) {
            $data = [
                'title'     => 'kontak ',
                'back'      => 'barang/kontak',
                'kontak'    => $kontak,
                'content'   => 'admin/kontak/edit'
            ];
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;
            $data = [
                'deskripsi'   => $i->post('deskripsi')
            ];
            $this->Crud_model->edit('tbl_general', 'type', 'kontak', $data);
            $this->session->set_flashdata('msg', 'Kontak diubah');
            redirect('admin/kontak');
        }
    }
}
