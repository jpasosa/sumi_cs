<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Is_productos extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->config('estados');
	}



	public function existCodigo($code)
	{

		try {
			$sql = "SELECT * FROM productos P
					WHERE P.codigo = '$code'";
			$query = $this->db->query($sql);
			$resp = $query->result_array();

			if(count($resp) > 0) {
				return true;
			} else {
				return false;
			}

		} catch (Exception $e) {
			return array();
		}



	}



}

?>
