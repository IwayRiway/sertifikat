<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sertifikat_karyawan extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
        // is_login();
        $this->load->model('Sertifikat_karyawan_model');
        $this->load->model('Karyawan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = "Data Sertifikat Karyawan";

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('sertifikat_karyawan/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data['karyawan'] = $this->Karyawan_model->getKaryawan();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('sertifikat_karyawan/create', $data);
        $this->load->view('templates/footer');
    }

    public function getSertikat()
    {
        $data = $this->Sertifikat_karyawan_model->getSertikat();
        echo json_encode($data);
    }

    public function save()
    {   
        $this->Sertifikat_karyawan_model->save();
        $this->session->set_flashdata('sukses', 'Data Berhasil Simpan');
        redirect('transaksi');
    }

}