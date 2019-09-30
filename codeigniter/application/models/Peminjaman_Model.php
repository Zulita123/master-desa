<?php
	class Peminjaman_Model extends CI_Model{
		function qw($cel,$table,$prop){
			return $this->db->query("SELECT $cel FROM $table $prop");
		}
		function simpan_peminjaman($table,$value){
			return $this->db->insert($table,$value);
		}
		function edit_peminjaman($table,$where,$value){
			$this->db->where('id_peminjaman',$where);
			return $this->db->update($table,$value);
		}
		function hapus_peminjaman($table,$where){
			$this->db->where('id_detail_pinjam',$where);
			return $this->db->delete($table);
		}
		function tambah($table,$value){
			return $this->db->insert($table,$value);
		}
	}
?>