<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Repo_trans extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->config('estados');
	}

	public function addTrans( $id_tabla )
	{
		$exception 	= new Exception;
        	$trace 		= $exception->getTrace();

        	$file_array 	= explode('/', $trace[1]['file']);
        	$file 		= end($file_array);
        	$function 	= $trace[1]['function'];

        	if ( $file == 'productos.php' && $function == 'insert') { // ALTA DE PRODUCTOS
        		$this->insertAltaProducto( $id_tabla );
        	} else {
        		return false;
        	}

        	return true;
	}

	private function insertAltaProducto( $id_tabla )
	{
		try {

			$insert_data = array( 	'id_trans_estado' => 4,
									'id_usuario' 		=> $this->session->userdata('id_usuario'),
									'fecha'			=> date('Y-m-d'),
									'id_tabla' 		=> $id_tabla
								);
			$insert_trans = $this->db->insert('trans', $insert_data);

			if( $insert_trans )
			{
				$id_tabla_trans = $this->db->insert_id();
				$this->db->where('id_productos', $id_tabla);
				$this->db->update('productos', array('id_trans' => $id_tabla_trans));
				$update = $this->db->affected_rows();
				if($update == 1) {
					return true;
				}else {
					return false;
				}

			} else {
				return false;
			}

		} catch ( Exception $e ) {
			throw new Exception("Error Processing Request", 1);
			return 0;
		}
	}



}

?>
