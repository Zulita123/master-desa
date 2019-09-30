<?php
	class Pegawai_Controller extends CI_Controller{
		function __construct(){
			parent:: __construct();
			$this->load->model('Pegawai_Model');
		}
		function hello(){
			$page=$this->uri->segment(3);
			if(empty($page)){
				$page='dashboard';
			}
			$data['page']=$page;
			if($page=='pegawai'){
				$data['tmp_pegawai']=$this->Pegawai_Model->qw("*","pegawai","")->result();
			}elseif($page=="f_pegawai"){
				$yy=$this->uri->segment(4);
				if(empty($yy)){
					$data['status']='simpan';
					$data['open']='Pegawai_Controller/simpan_pegawai';
				}else{
					$data['status']='edit';
					$data['nomot']=$yy;
					$data['open']='Pegawai_Controller/edit_pegawai';
					$data['hsl']=$this->Pegawai_Model->qw("*","pegawai","WHERE id_pegawai='$yy'");
				}
			}
			$this->load->view('index',$data);
		}
		function simpan_pegawai(){
			$ar=array(
				'id_pegawai'=>$this->input->post('id_pegawai'),
				'nip'=>$this->input->post('nip'),
				'nama_pegawai'=>$this->input->post('nama_pegawai'),
				'alamat'=>$this->input->post('alamat')
			);
			$this->Pegawai_Model->simpan_pegawai('pegawai',$ar);
			redirect('Pegawai_Controller/hello/pegawai');
		}
		function edit_pegawai(){
			$id_pegawai=$this->input->post('id_pegawai');
			$ar=array(
				'id_pegawai'=>$this->input->post('id_pegawai'),
				'nip'=>$this->input->post('nip'),
				'nama_pegawai'=>$this->input->post('nama_pegawai'),
				'alamat'=>$this->input->post('alamat')
			);
			$this->Pegawai_Model->edit_pegawai('pegawai',$id_pegawai,$ar);
			redirect('Pegawai_Controller/hello/pegawai');
		}
		function hapus_pegawai($id_pegawai){
			$this->Pegawai_Model->hapus_pegawai('pegawai',$id_pegawai);
			redirect('Pegawai_Controller/hello/pegawai');
		}
	}
?>