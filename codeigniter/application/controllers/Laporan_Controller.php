<?php
	class Laporan_Controller extends CI_Controller{
		function __construct(){
			parent:: __construct();
			$this->load->model('Laporan_Model');

		}
		function hello(){
			$page=$this->uri->segment(3);
			if(empty($page)){
				$page='dashboard';
			}
			$data['page']=$page;
			if($page=="laporan_peminjaman"){
				$bulan=$this->input->post('bulan');
				$tahun=$this->input->post('tahun');
				if(empty($bulan)){
					$data['qu']=$this->Laporan_Model->qw("peminjaman.id_peminjaman,peminjaman.tanggal_pinjam,peminjaman.tanggal_kembali,pegawai.nama_pegawai,peminjaman.status_peminjaman","peminjaman","INNER JOIN pegawai on peminjaman.id_pegawai=pegawai.id_pegawai")->result();
				}else{
					$data['qu']=$this->Laporan_Model->qw("peminjaman.id_peminjaman,peminjaman.tanggal_pinjam,peminjaman.tanggal_kembali,pegawai.nama_pegawai,peminjaman.status_peminjaman","peminjaman","INNER JOIN pegawai on peminjaman.id_pegawai=pegawai.id_pegawai WHERE month(peminjaman.tanggal_pinjam)='$bulan' and year(peminjaman.tanggal_pinjam)='$tahun'")->result();
				}
			}
			$this->load->view('index',$data);
		}
		function c_laporan(){
			$bulan=$this->uri->segment(3);
			$tahun=$this->uri->segment(4);
			$data['qu']=$this->Laporan_Model->qw("peminjaman.id_peminjaman,peminjaman.tanggal_pinjam,peminjaman.tanggal_kembali,pegawai.nama_pegawai,peminjaman.status_peminjaman","peminjaman","inner join pegawai on pegawai.id_pegawai=peminjaman.id_pegawai WHERE month(peminjaman.tanggal_pinjam)='$bulan' and year(peminjaman.tanggal_pinjam)='$tahun'")->result();
			$this->load->view('konten/c_laporan',$data);
		}
	}
?>