<?php
	class Belajar_Controller extends CI_Controller{
		function __construct(){
			parent:: __construct();

		}
		function hello(){
			$page=$this->uri->segment(3);
			if(empty($page)){
				$page='dashboard';
			}
			$data['page']=$page;
			$this->load->view('index',$data);
		}
	}
?>