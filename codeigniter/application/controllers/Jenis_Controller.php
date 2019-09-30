<?php
	class Jenis_Controller extends CI_Controller{
		function __construct(){
			parent:: __construct();
			$this->load->model('Jenis_Model');
		}
		function hello(){
			$page=$this->uri->segment(3);
			if(empty($page)){
				$page='dashboard';
			}
			$data['page']=$page;
			if($page=='jenis'){
				$data['tmp_jenis']=$this->Jenis_Model->qw("*","jenis","")->result();
			}elseif($page=="f_jenis"){
				$yy=$this->uri->segment(4);
				if(empty($yy)){
					$data['status']='simpan';
					$data['open']='Jenis_Controller/simpan_jenis';
				}else{
					$data['status']='edit';
					$data['nomot']=$yy;
					$data['open']='Jenis_Controller/edit_jenis';
					$data['hsl']=$this->Jenis_Model->qw("*","jenis","WHERE id_jenis='$yy'");
				}
			}
			$this->load->view('index',$data);
		}
		function simpan_jenis(){
			$ar=array(
				'id_jenis'=>$this->input->post('id_jenis'),
				'kode_jenis'=>$this->input->post('kode_jenis'),
				'nama_jenis'=>$this->input->post('nama_jenis'),
				'keterangan'=>$this->input->post('keterangan')
			);
			$this->Jenis_Model->simpan_jenis('jenis',$ar);
			redirect('Jenis_Controller/hello/jenis');
		}
		function edit_jenis(){
			$id_jenis=$this->input->post('id_jenis');
			$ar=array(
				'id_jenis'=>$this->input->post('id_jenis'),
				'kode_jenis'=>$this->input->post('kode_jenis'),
				'nama_jenis'=>$this->input->post('nama_jenis'),
				'keterangan'=>$this->input->post('keterangan')
			);
			$this->Jenis_Model->edit_jenis('jenis',$id_jenis,$ar);
			redirect('Jenis_Controller/hello/jenis');
		}
		function hapus_jenis($id_jenis){
			$this->Jenis_Model->hapus_jenis('jenis',$id_jenis);
			redirect('Jenis_Controller/hello/jenis');
		}
	}
?>