<?php
	class Pengembalian_Controller extends CI_Controller{
		function __construct(){
			parent:: __construct();
			$this->load->model('Pengembalian_Model');
		}
		function hello(){
			$page=$this->uri->segment(3);
			if(empty($page)){
				$page='dashboard';
			}
			$data['page']=$page;
			if($page=='pengembalian'){
				$this->load->view('index',$data);
			}
		}
		function kembalikan($id){
			$id_peminjaman=$this->uri->segment(3);
			$ar=array(
				'status_peminjaman'=>'dikembalikan'
			);
			$this->db->where('id_peminjaman',$id_peminjaman);
			$simpan=$this->db->update('peminjaman',$ar);
			redirect('Pengembalian_Controller/hello/pengembalian');
		}
		
	}
?>