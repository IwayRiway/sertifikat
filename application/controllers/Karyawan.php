<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
        // is_login();
        $this->load->model('Karyawan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = "Data Karyawan";
        $data['karyawan'] = $this->Karyawan_model->getKaryawan();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('karyawan/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('karyawan/create');
        $this->load->view('templates/footer');
    }

    public function save()
    {   
        $this->Karyawan_model->save();
        $this->session->set_flashdata('sukses', 'Data Berhasil Simpan');
        redirect('karyawan');
    }

    public function edit($id)
    { 
       $data['karyawan'] = $this->Karyawan_model->getKaryawanById($id);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('karyawan/edit', $data);
        $this->load->view('templates/footer');
    }

    
    public function update()
    {   
        $this->Karyawan_model->update();
        $this->session->set_flashdata('info', 'Data Berhasil Diubah');
        redirect('karyawan');
    }
    
    public function delete($id)
    {   
        $this->Karyawan_model->delete($id);
        $this->session->set_flashdata('warning', 'Data Berhasil Dihapus');
        redirect('karyawan');
    }

}