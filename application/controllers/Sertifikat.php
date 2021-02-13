<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sertifikat extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
        // is_login();
        $this->load->model('Sertifikat_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = "Data Sertifikat";
        $data['sertifikat'] = $this->Sertifikat_model->getSertifikat();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('sertifikat/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('sertifikat/create');
        $this->load->view('templates/footer');
    }

    public function save()
    {   
        $this->Sertifikat_model->save();
        $this->session->set_flashdata('sukses', 'Data Berhasil Simpan');
        redirect('sertifikat');
    }

    public function edit($id)
    { 
       $data['sertifikat'] = $this->Sertifikat_model->getSertifikatById($id);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('sertifikat/edit', $data);
        $this->load->view('templates/footer');
    }

    
    public function update()
    {   
        $this->Sertifikat_model->update();
        $this->session->set_flashdata('info', 'Data Berhasil Diubah');
        redirect('sertifikat');
    }
    
    public function delete($id)
    {   
        $this->Sertifikat_model->delete($id);
        $this->session->set_flashdata('warning', 'Data Berhasil Dihapus');
        redirect('sertifikat');
    }

}