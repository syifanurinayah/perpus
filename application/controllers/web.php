<?php
class Web extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model(array('m_petugas','m_anggota'));
		if($this->session->userdata('username')){
		redirect('dashboard');
	}
}

	function index(){
		$this->load->view('web/index');
	}

	function login(){
		$this->load->view('web/login');
	}

    function cari_buku(){
        $cari=$this->input->post('cari');
        $data['title']="Pencarian Buku";
        $data['hasil']=$this->m_buku->cari($cari)->result();
      
        $this->load->view('web/cari_buku',$data);

    }

    function anggota(){
        $data['title']="Data Anggota";
        $data['anggota']=$this->m_anggota->semua()->result();
        $this->load->view('web/anggota',$data);
    }

    function cari_anggota(){
        $cari=$this->input->post('cari');
        $data['title']="Data Anggota";
        $data['anggota']=$this->m_anggota->cari($cari)->result();
        $this->load->view('web/anggota');
    }

	function proses(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','Username','required|trim|xss_clean');
        $this->form_validation->set_rules('password','password','required|trim|xss_clean');
        
     
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $cek=$this->m_petugas->cek($username,md5($password));
            if($cek->num_rows()>0){
                //login berhasil, buat session
                $this->session->set_userdata('username',$username);
                redirect('dashboard');
                
            }else{
                //login gagal
                $this->session->set_flashdata('message','Username atau password salah');
                redirect('web');
            }
        }
    
}

