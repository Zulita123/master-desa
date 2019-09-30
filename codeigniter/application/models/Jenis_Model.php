<?php
	class Jenis_Model extends CI_Model{
		function qw($cel,$table,$prop){
			return $this->db->query("SELECT $cel FROM $table $prop");
		}
		function simpan_jenis($table,$value){
			return $this->db->insert($table,$value);
		}
		function edit_jenis($table,$where,$value){
			$this->db->where('id_jenis',$where);
			return $this->db->update($table,$value);
		}
		function hapus_jenis($table,$where){
			$this->db->where('id_jenis',$where);
			return $this->db->delete($table);
		}
	}
?>