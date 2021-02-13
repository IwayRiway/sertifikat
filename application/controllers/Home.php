<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
      $this->load->view('templates/index');
    }

    public function print($qr_code)
    {
       $data['qr_code'] = $qr_code;
       $this->load->view('templates/print', $data);
    }

    public function search()
    {
       $keyword = $_POST['keyword'];
      //  $data =  $this->db->query("SELECT a.*, b.*, c.*, a.id as transaksi_id from tr_input a JOIN tb_produk b ON a.produk_id = b.id JOIN tb_customer c ON a.customer_id = c.id WHERE a.id LIKE '%$keyword%' OR a.qr_code LIKE '%$keyword%' OR  b.kategori LIKE '%$keyword%' OR  b.merk LIKE '%$keyword%' OR  c.nama LIKE '%$keyword%' OR  c.no_hp LIKE '%$keyword%'")->result_array();
       $data =  $this->db->query("SELECT a.*, b.*, c.*, a.id as transaksi_id from tr_input a JOIN tb_produk b ON a.produk_id = b.id JOIN tb_customer c ON a.customer_id = c.id WHERE a.qr_code='$keyword' OR a.serial_no = '$keyword' ")->result_array();

       echo json_encode($data);
    }

}