<!-- --------------------------MODEL-->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable_model extends CI_Model {

	public function listar_veiculos(){
		$query = $this->db->query("SELECT * FROM veiculo ;");

	    if($query->num_rows() > 0){
	        return $query->result();
	    }
	    return false;
	}
}
