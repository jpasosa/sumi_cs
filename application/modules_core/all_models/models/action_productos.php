<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Action_productos extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->config('estados');
	}

	public function validate_add($product)
	{
		$errors = false;

		if(!isset($product['codigo'])) {
			$errors['codigo'] = 'El codigo es obligatorio';
		}

		if(!isset($product['descripcion'])) {
			$errors['descripcion'] = 'El descripcion es obligatorio';
		}

		if(!isset($product['id_categorias'])) {
			$errors['id_categorias'] = 'Debe indicar la categoría';
		}

		return $errors;
	}




}

?>
