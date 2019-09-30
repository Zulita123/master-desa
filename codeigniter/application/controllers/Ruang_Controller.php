<?php
	class Ruang_Controller extends CI_Controller{
		function __construct(){
			parent:: __construct();
			$this->load->model('Ruang_Model');
		}
		function hello(){
			$page=$this->uri->segment(3);
			if(empty($page)){
				$page='dashboard';
			}
			$data['page']=$page;
			if($page=='ruang'){
				$data['tmp_ruang']=$this->Ruang_Model->qw("*","ruang","")->result();
			}elseif($page=="f_ruang"){
				$yy=$this->uri->segment(4);
				if(empty($yy)){
					$data['status']='simpan';
					$data['open']='Ruang_Controller/simpan_ruang';
				}else{
					$data['status']='edit';
					$data['nomot']=$yy;
					$data['open']='Ruang_Controller/edit_ruang';
					$data['hsl']=$this->Ruang_Model->qw("*","ruang","WHERE id_ruang='$yy'");
				}
			}
			$this->load->view('index',$data);
		}
		function simpan_ruang(){
			$ar=array(
				'id_ruang'=>$this->input->post('id_ruang'),
				'kode_ruang'=>$this->input->post('kode_ruang'),
				'nama_ruang'=>$this->input->post('nama_ruang'),
				'keterangan'=>$this->input->post('keterangan')
			);
			$this->Ruang_Model->simpan_ruang('ruang',$ar);
			redirect('Ruang_Controller/hello/ruang');
		}
		function edit_ruang(){
			$id_ruang=$this->input->post('id_ruang');
			$ar=array(
				'id_ruang'=>$this->input->post('id_ruang'),
				'kode_ruang'=>$this->input->post('kode_ruang'),
				'nama_ruang'=>$this->input->post('nama_ruang'),
				'keterangan'=>$this->input->post('keterangan')
			);
			$this->Ruang_Model->edit_ruang('ruang',$id_ruang,$ar);
			redirect('Ruang_Controller/hello/ruang');
		}
		function hapus_ruang($id_ruang){
			$this->Ruang_Model->hapus_ruang('ruang',$id_ruang);
			redirect('Ruang_Controller/hello/ruang');
		}
	}
?>