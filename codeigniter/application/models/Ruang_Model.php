<?php
	class Ruang_Model extends CI_Model{
		function qw($cel,$table,$prop){
			return $this->db->query("SELECT $cel FROM $table $prop");
		}
		function simpan_ruang($table,$value){
			return $this->db->insert($table,$value);
		}
		function edit_ruang($table,$where,$value){
			$this->db->where('id_ruang',$where);
			return $this->db->update($table,$value);
		}
		function hapus_ruang($table,$where){
			$this->db->where('id_ruang',$where);
			return $this->db->delete($table);
		}
	}
?>