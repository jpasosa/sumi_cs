<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Action_productos extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->config('estados');
	}

	public function validateAdd($product)
	{
		$errors = false;

		if($product['codigo'] == '') {
			$errors['codigo'] = 'El codigo es obligatorio';
		}

		if($product['descripcion'] == '') {
			$errors['descripcion'] = 'La descripcion es obligatoria';
		}

		if($product['id_categorias'] == '') {
			$errors['id_categorias'] = 'Debe indicar la categoría';
		}

		return $errors;
	}

	public function insert($product)
	{

		$insert_prod = $this->db->insert('productos', $product);
		if($insert_prod) {
			return true;
		}else {
			return false;
		}

	}

	public function update($product)
	{

		$this->db->where('id_productos', $product['id_productos']);
		$this->db->update('productos', $product);
		$update = $this->db->affected_rows();
		if($update == 1) {
			return true;
		}else {
			return false;
		}


	}



}

?>
