<?php
	class Login_Controller extends CI_Controller{
		function __construct(){
			parent:: __construct();
			$this->load->model('Login_Model');
		}
		function index(){
			$this->load->view('login');
		}
		function aksi_login(){
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$where=array(
				'username'=>$username,
				'password'=>$password
				);
			$cek=$this->Login_Model->cek_login('petugas',$where)->num_rows();
			$query=$this->db->where('username',$username)->get('petugas');
			$row=$query->row();
			if($cek > 0){
				$data_session=array(
					'nama'=>$row->nama_petugas,
					'id_petugas'=>$row->id_petugas,
					'status'=>'login',
					'level'=>$row->id_level
				);
				$this->session->set_userdata($data_session);
				redirect('Belajar_Controller/hello');
			}else{
				redirect('Login_Controller');
			}
		}
	}
?>