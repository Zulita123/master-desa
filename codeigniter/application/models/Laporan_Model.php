<?php
	class Laporan_Model extends CI_Model{
		function qw($cel,$table,$prop){
			return $this->db->query("SELECT $cel FROM $table $prop");
		}
	}
?>