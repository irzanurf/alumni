<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('M_Login');
        $current_user=$this->M_Login->is_role();
        //cek session dan level user
        if($this->M_Login->is_role() != "1"){
            redirect("welcome/");
        }
        $this->load->helper('file');
        $this->load->model('M_Akun');
        $this->load->model('M_Alumni');
    }

    public function index(){
        $username = $this->session->userdata('username');
        $head['username']=$username;
        $nomor = $this->input->get('page');
        $q = $this->input->get('q');
        

        if(empty($nomor))
        {
            $nomor=1;
        }
        $previous = (int)$nomor-1;
        $next = (int)$nomor+1;
        $cek = $this->M_Alumni->get_alumni($nomor, $q)->result();
        
            $data['search'] = $cek;
            //CEK PREVIOUS BUTTON
            if($previous==0){
                $data['previous']=0;
            }
            else{
                $previous_cek = $this->M_Alumni->get_alumni($previous, $q)->result();
                if (empty($previous_cek)){
                    $data['previous']=0;
                }
                else{
                    $data['previous']=1;
                }
            }

            //CEK NEXT BUTTON
            $next_cek = $this->M_Alumni->get_alumni($next, $q)->result();
            if (empty($next_cek)){
                $data['next']=0;
            }
            else{
                $data['next']=1;
            }
        $data['highlight'] = $this->M_Alumni->get_highlight_alumni()->result();
        $foot['chart'] = $this->M_Alumni->get_chart()->result();
        // $foot['max'] = $this->M_Alumni->get_max_chart()->row();
        $data['cari']=$q;
        $data['page']=$nomor;
        $data['hasil'] = $this->M_Alumni->hasil($q);
        $this->load->view('layout/header', $head);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('layout/footer', $foot);
    }

    public function import() {
        $this->load->library('Csvimport');
        //Check file is uploaded in tmp folder
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
            //validate whether uploaded file is a csv file
            $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
            $mime = get_mime_by_extension($_FILES['file']['name']);
            $fileArr = explode('.', $_FILES['file']['name']);
            $ext = end($fileArr);
            if (($ext == 'csv') && in_array($mime, $csvMimes)) {
                $file = $_FILES['file']['tmp_name'];
                $csvData = $this->csvimport->get_array($file);
                
                        $first = array_key_first($csvData[0]);
                        
                        foreach ($csvData as $row) {
                            $date = $row["$first"];
                            $timestamp = date('Y-m-d', strtotime($date));   
                            $data = array(
                                "nama_depan" => $row["Nama Depan"],
                                "nama_belakang" => $row['Nama Belakang'],
                                "pekerjaan" => $row['Pekerjaan'],
                                "sektor" => $row['Sektor'],
                                "tempat" => $row['Instansi/Perusahaan/Tempat Bekerja'],
                                "email" => $row['Alamat Email (aktif)'],
                                "no_hp" => $row['No. HP (Aktif)'],
                                "alamat" => $row['Alamat Rumah (Domisili/untuk pengiriman souvenir Undip)'],
                                "kode_pos" => $row['Kodepos'],
                                "fakultas" => $row['Alumni dari fakultas'],
                                "departemen" => $row['Departemen'],
                                "angkatan" => $row['Angkatan Masuk Undip'],
                                "date" => $timestamp,
                            );
                            $cek = [
                                "nama_depan" => $row["Nama Depan"],
                                "nama_belakang" => $row['Nama Belakang'],
                                "fakultas" => $row['Alumni dari fakultas'],
                                "departemen" => $row['Departemen'],
                                "angkatan" => $row['Angkatan Masuk Undip'],
                            ];
                            $save = $this->M_Alumni->save($data, $cek);
                        }
                        if ($save==1){
                            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Data berhasil ter-import</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            </div>');
                            redirect("admin/"); 
                        }
                        else {
                            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <b><i class="fa fa-exclamation-circle"></i> ERROR</b> Format template tidak sesuai
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            </div>');
                            redirect("admin/"); 
                        }
                    
                }
            
        } else {
            // $this->session->set_flashdata("error_msg", "Please select a CSV file to upload.");
            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <b><i class="fa fa-exclamation-circle"></i> ERROR</b> Silahkan pilih CSV file terlebih dahulu
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');;
            redirect("admin/"); 
        }
    }

    public function update_data_alumni(){
        $id = $this->input->post('id');
        $q = $this->input->post('q');
        $page = $this->input->post('page');
        $nama_depan = $this->input->post('nama_depan');
        $nama_belakang = $this->input->post('nama_belakang');
        $alamat = $this->input->post('alamat');
        $kode_pos = $this->input->post('kode_pos');
        $pekerjaan = $this->input->post('pekerjaan');
        $sektor = $this->input->post('sektor');
        $tempat = $this->input->post('tempat');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');
        $fakultas = $this->input->post('fakultas');
        $departemen = $this->input->post('departemen');
        $angkatan = $this->input->post('angkatan');
        $date = date("Y-m-d");
        $data = [
            "nama_depan"=>$nama_depan,
            "nama_belakang"=>$nama_belakang,
            "alamat"=>$alamat,
            "kode_pos"=>$kode_pos,
            "pekerjaan"=>$pekerjaan,
            "sektor"=>$sektor,
            "tempat"=>$tempat,
            "email"=>$email,
            "no_hp"=>$no_hp,
            "fakultas"=>$fakultas,
            "departemen"=>$departemen,
            "angkatan"=>$angkatan,
            "date"=>$date,
        ];
        $this->M_Alumni->update_data_alumni($data, $id);
        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Data berhasil diperbaruhi</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            </div>');
        redirect (base_url("admin?q=$q&page=$page"));
    }

    public function tambah_data_alumni(){
        $id = $this->input->post('id');
        $nama_depan = $this->input->post('nama_depan');
        $nama_belakang = $this->input->post('nama_belakang');
        $alamat = $this->input->post('alamat');
        $kode_pos = $this->input->post('kode_pos');
        $pekerjaan = $this->input->post('pekerjaan');
        $sektor = $this->input->post('sektor');
        $tempat = $this->input->post('tempat');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');
        $fakultas = $this->input->post('fakultas');
        $departemen = $this->input->post('departemen');
        $angkatan = $this->input->post('angkatan');
        $date = date("Y-m-d");
        $data = [
            "nama_depan"=>$nama_depan,
            "nama_belakang"=>$nama_belakang,
            "alamat"=>$alamat,
            "kode_pos"=>$kode_pos,
            "pekerjaan"=>$pekerjaan,
            "sektor"=>$sektor,
            "tempat"=>$tempat,
            "email"=>$email,
            "no_hp"=>$no_hp,
            "fakultas"=>$fakultas,
            "departemen"=>$departemen,
            "angkatan"=>$angkatan,
            "date"=>$date,
        ];
        $this->M_Alumni->tambah_data_alumni($data, $id);
        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Data berhasil ditambahkan</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            </div>');
        redirect (base_url("admin"));
    }

    public function delete_data_alumni() {
        $id = $this->input->post('id');
        $q = $this->input->post('q');
        $page = $this->input->post('page');
        $this->M_Alumni->del_alumni(array("id"=>$id));
        redirect (base_url("admin?q=$q&page=$page"));
    }
}