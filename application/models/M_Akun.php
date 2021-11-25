<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Akun extends CI_Model
{
    public function changePass($username,$pass)
    {
        $this->db->where('username',"$username");
        $this->db->update('tb_users', $pass);
        
    }

    public function del_akun(array $data){
        $query = $this->db->delete('tb_users',$data);
        return $query;
    }

    public function del_prodi(array $data){
        $query = $this->db->delete('tb_prodi',$data);
        return $query;
    }

    public function insert_akun($akun,$username)
    {
        $query = $this->db->query("SELECT * FROM tb_users WHERE username = '$username'");
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('tb_users',$akun);
        }
        else{

        }   
    }

    public function insert_prodi($prodi,$username)
    {
        $query = $this->db->query("SELECT * FROM tb_prodi WHERE username = '$username'");
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('tb_prodi',$prodi);
        }
        else{

        }   
    }

    public function get_fakultas(){
        $query = $this->db->select('*')
                ->from('tb_prodi')
                ->get();
                return $query;
    }

    public function getwhere_prodi($data){
        $query = $this->db->select('*')
                ->from('tb_prodi')
                ->where($data)
                ->get();
                return $query;
    }

}