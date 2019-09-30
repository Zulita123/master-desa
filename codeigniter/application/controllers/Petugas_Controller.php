<?php
	class Petugas_Controller extends CI_Controller{
		function __construct(){
			parent:: __construct();
			$this->load->model('Petugas_Model');
		}
		function hello(){
			$page=$this->uri->segment(3);
			if(empty($page)){
				$page='dashboard';
			}
			$data['page']=$page;
			if($page=='petugas'){
				$data['tmp_petugas']=$this->Petugas_Model->qw("petugas.id_petugas,petugas.username,petugas.password,petugas.nama_petugas,petugas.id_level,level.nama_level","petugas","INNER JOIN level on level.id_level=petugas.id_level")->result();
			}elseif($page=="f_petugas"){
				$yy=$this->uri->segment(4);
				if(empty($yy)){
					$data['tmp_level']=$this->Petugas_Model->qw("*","level","")->result();
					$data['status']='simpan';
					$data['open']='Petugas_Controller/simpan_petugas';
				}else{
					$data['tmp_level']=$this->Petugas_Model->qw("*","level","")->result();
					$data['status']='edit';
					$data['nomot']=$yy;
					$data['open']='Petugas_Controller/edit_petugas';
					$data['hsl']=$this->Petugas_Model->qw("*","petugas","WHERE id_petugas='$yy'");
				}
			}
			$this->load->view('index',$data);
		}
		function simpan_petugas(){
			$ar=array(
				'id_petugas'=>$this->input->post('id_petugas'),
				'username'=>$this->input->post('username'),
				'password'=>$this->input->post('password'),
				'nama_petugas'=>$this->input->post('nama_petugas'),
				'id_level'=>$this->input->post('id_level')
			);
			$this->Petugas_Model->simpan_petugas('petugas',$ar);
			redirect('Petugas_Controller/hello/petugas');
		}
		function edit_petugas(){
			$id_petugas=$this->input->post('id_petugas');
			$ar=array(
				'id_petugas'=>$this->input->post('id_petugas'),
				'username'=>$this->input->post('username'),
				'password'=>$this->input->post('password'),
				'nama_petugas'=>$this->input->post('nama_petugas'),
				'id_level'=>$this->input->post('id_level')
			);
			$this->Petugas_Model->edit_petugas('petugas',$id_petugas,$ar);
			redirect('Petugas_Controller/hello/petugas');
		}
		function hapus_petugas($id_petugas){
			$this->Petugas_Model->hapus_petugas('petugas',$id_petugas);
			redirect('Petugas_Controller/hello/petugas');
		}
	}
?>