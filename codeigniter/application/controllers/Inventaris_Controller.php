<?php
	class Inventaris_Controller extends CI_Controller{
		function __construct(){
			parent:: __construct();
			$this->load->model('Inventaris_Model');
		}
		function hello(){
			$page=$this->uri->segment(3);
			if(empty($page)){
				$page='dashboard';
			}
			$data['page']=$page;
			if($page=='inventaris'){
				$data['tmp_inventaris']=$this->Inventaris_Model->qw("inventaris.id_inventaris,inventaris.nama,inventaris.kondisi,inventaris.keterangan,inventaris.jumlah,inventaris.id_jenis,jenis.nama_jenis,inventaris.tanggal_register,inventaris.kode_inventaris,inventaris.id_ruang,inventaris.id_petugas,petugas.nama_petugas,ruang.nama_ruang","inventaris","INNER JOIN jenis on jenis.id_jenis=inventaris.id_jenis INNER JOIN ruang on ruang.id_ruang=inventaris.id_ruang INNER JOIN petugas on petugas.id_petugas=inventaris.id_petugas")->result();
			}elseif($page=="f_inventaris"){
				$yy=$this->uri->segment(4);
				if(empty($yy)){
					$data['tmp_jenis']=$this->Inventaris_Model->qw("*","jenis","")->result();
					$data['tmp_ruang']=$this->Inventaris_Model->qw("*","ruang","")->result();
					$data['tmp_petugas']=$this->Inventaris_Model->qw("*","petugas","")->result();
					$data['status']='simpan';
					$data['open']='Inventaris_Controller/simpan_inventaris';
				}
			}
			$this->load->view('index',$data);
		}
		function simpan_inventaris(){
			$ar=array(
				'id_inventaris'=>$this->input->post('id_inventaris'),
				'nama'=>$this->input->post('nama'),
				'kondisi'=>$this->input->post('kondisi'),
				'keterangan'=>$this->input->post('keterangan'),
				'jumlah'=>$this->input->post('jumlah'),
				'id_jenis'=>$this->input->post('id_jenis'),
				'tanggal_register'=>$this->input->post('tanggal_register'),
				'id_ruang'=>$this->input->post('id_ruang'),
				'kode_inventaris'=>$this->input->post('kode_inventaris'),
				'id_petugas'=>$this->input->post('id_petugas')
			);
			$this->Inventaris_Model->simpan_inventaris('inventaris',$ar);
			redirect('Inventaris_Controller/hello/inventaris');
		}
		function hapus_inventaris($id_inventaris){
			$this->Inventaris_Model->hapus_inventaris('inventaris',$id_inventaris);
			redirect('Inventaris_Controller/hello/inventaris');
		}
	}
?>