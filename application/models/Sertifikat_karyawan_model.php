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

        $karyawan_id = explode("|", htmlspecialchars($this->input->post('karyawan_id')));
        $sertifikat = $this->input->post('sertifikat_id');

        $insert = [];
        for ($i=0; $i < count($sertifikat); $i++) { 
            $data = [
                'karyawan_id' => $karyawan_id[0],
                'sertifikat_id' => $sertifikat[$i]
            ];

            array_push($insert, $data);
        }
        
        $this->db->insert_batch('sertifikat_karyawan', $insert);
    }

    public function delete($id)
    {
        $this->db->delete('sertifikat_karyawan',['id'=>$id]);
    }
}