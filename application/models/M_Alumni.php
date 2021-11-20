<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Alumni extends CI_Model
{
    public function get_highlight_alumni(){
        $query = $this->db->select('*')
                ->from('tb_alumni')
                ->order_by('date','DESC')
                ->limit(20, 0)
                ->get();
                return $query;
    }

    public function get_chart(){
        return $this->db->query("SELECT fakultas, count(*) as jumlah
        FROM tb_alumni
        WHERE fakultas is not null
        GROUP BY fakultas");
    }

    public function get_max_chart(){
        return $this->db->query("SELECT fakultas, count(*) as jumlah
        FROM tb_alumni
        WHERE fakultas is not null
        GROUP BY fakultas
        ORDER BY jumlah DESC
        limit 1");
    }

    public function get_alumni($nomor, $q){
        $page = abs((int)$nomor);
        $first = $page*20-20;
        if (empty($q)){
            $query = $this->db->select('*')
            ->from('tb_alumni')
            ->order_by('date','DESC')
            ->limit(20, $first)
            ->get();
            return $query;
        }
        else {
            $query = $this->db->select('*')
            ->from('tb_alumni')
            ->like('nama_depan', $q)
            ->or_like('nama_belakang', $q)
            ->or_like('pekerjaan', $q)
            ->or_like('sektor', $q)
            ->or_like('tempat', $q)
            ->or_like('email', $q)
            ->or_like('pekerjaan', $q)
            ->or_like('fakultas', $q)
            ->or_like('departemen', $q)
            ->or_like('angkatan', $q)
            ->order_by('date','DESC')
            ->limit(20, $first)
            ->get();
            return $query;
        }
    }

    public function hasil ($q){
        if (empty($q)){
            $query = $this->db->select('*')
            ->from('tb_alumni')
            ->order_by('date','DESC')
            ->count_all_results();
            return $query;
        }
        else {
            $query = $this->db->select('*')
            ->from('tb_alumni')
            ->like('nama_depan', $q)
            ->or_like('nama_belakang', $q)
            ->or_like('pekerjaan', $q)
            ->or_like('sektor', $q)
            ->or_like('tempat', $q)
            ->or_like('email', $q)
            ->or_like('pekerjaan', $q)
            ->or_like('fakultas', $q)
            ->or_like('departemen', $q)
            ->or_like('angkatan', $q)
            ->order_by('date','DESC')
            ->count_all_results();
            return $query;
        }
    }

    public function save($data, $cek){
        $query = $this->db->select('*')
        ->from('tb_alumni')
        ->where($cek)
        ->get();
        $result = $query->result_array();
        $count = count($result);
        if (empty($count)){
            $this->db->insert('tb_alumni',$data);
        }
        else{
            $this->db->where($cek);
            $this->db->update('tb_alumni',$data);
        } 
        return 1;
    }

    public function tambah_data_alumni($data){
        $this->db->insert('tb_alumni',$data);
    }

    public function del_alumni($data){
        $query = $this->db->delete('tb_alumni',$data);
        return $query;
    }

    public function update_data_alumni($data, $id){
        $this->db->where('id', "$id");
        $this->db->update('tb_alumni',$data);
    }
}