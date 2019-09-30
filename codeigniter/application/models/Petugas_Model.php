<?php
	class Petugas_Model extends CI_Model{
		function qw($cel,$table,$prop){
			return $this->db->query("SELECT $cel FROM $table $prop");
		}
		function simpan_petugas($table,$value){
			return $this->db->insert($table,$value);
		}
		function edit_petugas($table,$where,$value){
			$this->db->where('id_petugas',$where);
			return $this->db->update($table,$value);
		}
		function hapus_petugas($table,$where){
			$this->db->where('id_petugas',$where);
			return $this->db->delete($table);
		}
	}
?>