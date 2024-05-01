<?php
defined('BASEPATH') or exit ('no direct script access allowed');
class Web extends CI_Controller{
    function __construct(){
    parent::__construct();
    $this->load->helper('url');
    }

    public function index(){
        $data['judul'] = "Aplikasi Sederhana Digital Learning Management System (Di-Lemas)";
        $this->load->view('v_header',$data);
        $this->load->view('v_index',$data);
        $this->load->view('v_footer',$data);
    }

    public function daftar(){
        $data['judul'] = "Pendaftaran Siswa/Murid Baru";
        $this->load->view('v_header',$data);
        $this->load->view('v_form',$data);
        $this->load->view('v_footer',$data);
    }

    public function cetak()
    {
        $this->form_validation->set_rules('nama', 'Nama Siswa',
            'required|min_length[10]', [
            'required' => 'Nama Siswa Harus diisi',
            'min_length' => 'Nama terlalu pendek'
        ]);
        $this->form_validation->set_rules('nis', 'NIS',
            'required|min_length[8]', [
            'required' => 'NIS Harus diisi',
            'min_length' => 'NIS terlalu pendek'
        ]);
        $this->form_validation->set_rules('nis', 'Tempat Tanggal Lahir',
            'required|min_length[8]', [
            'required' => 'Tempat Tanggal Lahir Harus diisi',
            'min_length' => 'Tempat Tanggal Lahir terlalu pendek'
        ]);
        if ($this->form_validation->run() != true) {
            $this->load->view('v_header');
            $this->load->view('v_form');
            $this->load->view('v_footer');
        } else {
            $data = [
                'nama'  => $this->input->post('nama'),
                'nis'   => $this->input->post('nis'),
                'kelas' => $this->input->post('kelas'),
                'ttl'   => $this->input->post('ttl'),
                'jk1'   => $this->input->post('jk1'),
                'jk2'   => $this->input->post('jk2'),
                'agama' => $this->input->post('agama')
            ];
            $this->load->view('v_header',$data);
            $this->load->view('v_about', $data);
            $this->load->view('v_footer',$data);

        }
    }
}
