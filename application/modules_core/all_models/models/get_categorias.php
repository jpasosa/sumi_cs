<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Get_categorias extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->config('estados');
	}

	public function getAll()
	{
		try {
			$sql = "SELECT * FROM categorias C WHERE activo = 1";
			$query = $this->db->query($sql);
			return $query->result_array();

		} catch (Exception $e) {
			return array();
		}
	}





}

?>
