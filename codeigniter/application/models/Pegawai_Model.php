<?php
	class Pegawai_Model extends CI_Model{
		function qw($cel,$table,$prop){
			return $this->db->query("SELECT $cel FROM $table $prop");
		}
		function simpan_pegawai($table,$value){
			return $this->db->insert($table,$value);
		}
		function edit_pegawai($table,$where,$value){
			$this->db->where('id_pegawai',$where);
			return $this->db->update($table,$value);
		}
		function hapus_pegawai($table,$where){
			$this->db->where('id_pegawai',$where);
			return $this->db->delete($table);
		}
	}
?>