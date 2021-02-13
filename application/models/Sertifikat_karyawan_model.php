<?php

class Sertifikat_karyawan_model extends CI_model
{
    public function getSertikat()
    {
        $id = $this->input->post('id');
        return $this->db->query("SELECT 
                                    * 
                                FROM 
                                    sertifikat 
                                WHERE 
                                    NOT EXISTS (
                                    SELECT 
                                        1 
                                    FROM 
                                        sertifikat_karyawan 
                                    WHERE 
                                        sertifikat_karyawan.sertifikat_id = sertifikat.id 
                                        AND sertifikat_karyawan.karyawan_id = $id
                                    )
                                ")->result_array();
    }

    public function save()
    {
        // $qr_code = 'QR-'. mt_rand(10000,99999) .'-'. mt_rand(100,999);
        $no_urut = $this->db->query("SELECT * FROM tr_input ORDER BY id DESC")->row_array();
        $qr_code = date('Y') . date('m') . date('d') . ($no_urut['id']+1);

        $lama_garansi = "+" . $this->input->post('lama_garansi') . "month";
        $garansi = date('Y-m-d', strtotime($lama_garansi, strtotime( $this->input->post('tgl_beli') )));

        $produk_id = explode("|", $this->input->post('produk_id'));
        $customer_id = explode("|", $this->input->post('customer_id'));
        $data = [
            'produk_id' => $produk_id[0],
            'customer_id' => $customer_id[0],
            'serial_no' => $this->input->post('serial_no'),
            'tgl_beli' => $this->input->post('tgl_beli'),
            'lama_garansi' => $this->input->post('lama_garansi'),
            'garansi' => $garansi,
            'qr_code' => $qr_code,
        ];
        $this->db->insert('tr_input', $data);

        // $json = [
        //     'kategori' => $produk_id[1],
        //     'merk' => $produk_id[2],
        //     'nama' => $customer_id[1],
        //     'no_hp' => $customer_id[2],
        //     'serial_no' => $this->input->post('serial_no'),
        //     'tgl_beli' => $this->input->post('tgl_beli'),
        //     'qr_code' => $qr_code,
        // ];

        $json = [
            'qr_code' => $qr_code,
        ];


        $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/qr_code/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 
        $image_name=$qr_code.'.png'; //buat name dari qr code sesuai dengan nim
 
        $params['data'] = json_encode($json); //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
    }

    public function getTransaksiById($id)
    {
        return $this->db->query("SELECT a.*, b.*, c.*,  a.id as transaksi_id from tr_input a JOIN tb_produk b ON a.produk_id = b.id JOIN tb_customer c ON a.customer_id = c.id WHERE a.id=$id")->row_array();
    }

    public function update()
    {
        // $transaksi = $this->db->get_where('tr_input', ['id'=>$this->input->post('id')])->row_array();
        // unlink(FCPATH . 'assets/qr_code/' . $transaksi['qr_code'] . '.png');

        // $qr_code = 'QR'. mt_rand(10000,99999) . mt_rand(100,999);
        $produk_id = explode("|", $this->input->post('produk_id'));
        $customer_id = explode("|", $this->input->post('customer_id'));

        $lama_garansi = "+" . $this->input->post('lama_garansi') . "month";
        $garansi = date('Y-m-d', strtotime($lama_garansi, strtotime( $this->input->post('tgl_beli') )));
        // $data = [
        //     'produk_id' => $produk_id[0],
        //     'customer_id' => $customer_id[0],
        //     'serial_no' => $this->input->post('serial_no'),
        //     'tgl_beli' => $this->input->post('tgl_beli'),
        //     'qr_code' => $qr_code,
        // ];
        $data = [
            'produk_id' => $produk_id[0],
            'customer_id' => $customer_id[0],
            'serial_no' => $this->input->post('serial_no'),
            'tgl_beli' => $this->input->post('tgl_beli'),
            'lama_garansi' => $this->input->post('lama_garansi'),
            'garansi' => $garansi,
        ];
        $this->db->update('tr_input', $data, ['id'=>$this->input->post('id')]);

        // $json = [
        //     'kategori' => $produk_id[1],
        //     'merk' => $produk_id[2],
        //     'nama' => $customer_id[1],
        //     'no_hp' => $customer_id[2],
        //     'serial_no' => $this->input->post('serial_no'),
        //     'tgl_beli' => $this->input->post('tgl_beli'),
        //     'qr_code' => $qr_code,
        // ];


        // $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        // $config['cacheable']    = true; //boolean, the default is true
        // $config['cachedir']     = './assets/'; //string, the default is application/cache/
        // $config['errorlog']     = './assets/'; //string, the default is application/logs/
        // $config['imagedir']     = './assets/qr_code/'; //direktori penyimpanan qr code
        // $config['quality']      = true; //boolean, the default is true
        // $config['size']         = '1024'; //interger, the default is 1024
        // $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        // $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        // $this->ciqrcode->initialize($config);
 
        // $image_name=$qr_code.'.png'; //buat name dari qr code sesuai dengan nim
 
        // $params['data'] = json_encode($json); //data yang akan di jadikan QR CODE
        // $params['level'] = 'H'; //H=High
        // $params['size'] = 10;
        // $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        // $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

    }

    public function delete($id)
    {
        $transaksi = $this->db->get_where('tr_input', ['id'=>$id])->row_array();
        unlink(FCPATH . 'assets/qr_code/' . $transaksi['qr_code'] . '.png');
        $this->db->delete('tr_input',['id'=>$id]);
    }
}