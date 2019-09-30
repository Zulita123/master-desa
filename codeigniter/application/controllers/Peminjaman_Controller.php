
<?php
	class Peminjaman_Controller extends CI_Controller{
		function __construct(){
			parent:: __construct();
			$this->load->model('Peminjaman_Model');
		}
		function hello(){ 
			$page=$this->uri->segment(3);
			if(empty($page)){
				$page='dashboard';
			}
			$data['page']=$page;
			if($page=='detail_pinjam'){
				}
				if(empty($yy)){ 
				$data['status']='simpan';
				$data['open']='Peminjaman_Controller/simpan_peminjaman';
				}
		$this->load->view('index',$data);
	}
		function cinv(){
			$id_inventaris=$this->input->post('id_inventaris');
			$query=$this->Peminjaman_Model->qw("inventaris.id_inventaris,inventaris.nama,inventaris.jumlah,inventaris.kode_inventaris,inventaris.kondisi,ruang.nama_ruang","inventaris","INNER JOIN ruang ON ruang.id_ruang=inventaris.id_ruang WHERE inventaris.id_inventaris='$id_inventaris'");
			$tampil=$query->row();
			$hasilnya=array('nama'=>$tampil->nama,
							'jumlah'=>$tampil->jumlah,
							'kode_inventaris'=>$tampil->kode_inventaris,
							'kondisi'=>$tampil->kondisi,
							'nama_ruang'=>$tampil->nama_ruang,);
			echo json_encode($hasilnya);
		}
		function cpw(){
			$id_pegawai=$this->input->post('id_pegawai');
			$query=$this->Peminjaman_Model->qw("*","pegawai","WHERE pegawai.id_pegawai='$id_pegawai'");
			$tampil=$query->row();
			$hasilnya=array('nip'=>$tampil->nip,
							'nama_pegawai'=>$tampil->nama_pegawai,
							'alamat'=>$tampil->alamat,);
			echo json_encode($hasilnya);
		}
		function simpan_detail(){
			$ar=array(
				'id_inventaris'=>$this->input->post('id_inventaris'),
				'id_peminjaman'=>$this->input->post('id_peminjaman'),
				'jumlah_pinjam'=>$this->input->post('jumlah_pinjam')
			);
			$simpan=$this->Peminjaman_Model->tambah('detail_pinjam',$ar);
			if($simpan){
				echo "Berhasil";
			}else{
				echo "Gagal";
			}
		}
		function tampil_detail($id){
			$data['tmp_peminjaman']=$this->Peminjaman_Model->qw("detail_pinjam.id_detail_pinjam,detail_pinjam.id_peminjaman,inventaris.nama,inventaris.kondisi,detail_pinjam.jumlah_pinjam,ruang.nama_ruang","detail_pinjam","INNER JOIN inventaris ON inventaris.id_inventaris=detail_pinjam.id_inventaris INNER JOIN ruang ON ruang.id_ruang=inventaris.id_ruang WHERE id_peminjaman='$id'")->result();
			$this->load->view('konten/detail_pinjam',$data);
		}
		function simpan_peminjaman(){
			$ar=array(
				'id_peminjaman'=>$this->input->post('id_peminjaman'),
				'tanggal_pinjam'=>$this->input->post('tanggal_pinjam'),
				'tanggal_kembali'=>$this->input->post('tanggal_kembali'),
				'status_peminjaman'=>'dipinjam',
				'id_pegawai'=>$this->input->post('id_pegawai')
			);
			$simpan=$this->Peminjaman_Model->simpan_peminjaman('peminjaman',$ar);
			if($simpan){
				echo "Berhasil";
			}else{
				echo "Gagal";
			}
		}
		function hapus_peminjaman(){
			$id_detail_pinjam=$this->input->post('id_detail_pinjam');
			$this->Peminjaman_Model->hapus_peminjaman('detail_pinjam',$id_detail_pinjam);
		}

	}
?>