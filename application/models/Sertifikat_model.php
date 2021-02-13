<?php

class Sertifikat_model extends CI_model
{
    public function getSertifikat()
    {
        return $this->db->get('sertifikat')->result_array();
    }

    public function save()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama')),
        ];

        $this->db->insert('sertifikat', $data);
    }

    public function getSertifikatById($id)
    {
        return $this->db->get_where('sertifikat', ['id'=>$id])->row_array();
    }

    public function update()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama')),
        ];

        $this->db->update('sertifikat', $data, ['id'=>htmlspecialchars($this->input->post('id'))]);
    }

    public function delete($id)
    {
        $this->db->delete('sertifikat',['id'=>$id]);
    }
}