<?php

class Karyawan_model extends CI_model
{
    public function getKaryawan()
    {
        return $this->db->get('karyawan')->result_array();
    }

    public function save()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama')),
            'divisi' => htmlspecialchars($this->input->post('divisi')),
            'nik' => htmlspecialchars($this->input->post('nik')),
        ];

        $this->db->insert('karyawan', $data);
    }

    public function getKaryawanById($id)
    {
        return $this->db->get_where('karyawan', ['id'=>$id])->row_array();
    }

    public function update()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama')),
            'divisi' => htmlspecialchars($this->input->post('divisi')),
            'nik' => htmlspecialchars($this->input->post('nik')),
        ];

        $this->db->update('karyawan', $data, ['id'=>htmlspecialchars($this->input->post('id'))]);
    }

    public function delete($id)
    {
        $this->db->delete('karyawan',['id'=>$id]);
    }
}