<?php
	class Inventaris_Model extends CI_Model{
		function qw($cel,$table,$prop){
			return $this->db->query("SELECT $cel FROM $table $prop");
		}
		function simpan_inventaris($table,$value){
			return $this->db->insert($table,$value);
		}
		function edit_inventaris($table,$where,$value){
			$this->db->where('id_inventaris',$where);
			return $this->db->update($table,$value);
		}
		function hapus_inventaris($table,$where){
			$this->db->where('id_inventaris',$where);
			return $this->db->delete($table);
		}
	}
?>