<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Action_categorias extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->config('estados');
	}



	public function validateAdd($category)
	{
		$errors = false;

		if($category['nombre'] == '') {
			$errors['nombre'] = 'El nombre es obligatorio';
		}

		if($category['codigo_abrev'] == '') {
			$errors['codigo_abrev'] = 'El código de abreviación es obligatoria';
		} else {
			$category['codigo_abrev'] = strtoupper($category['codigo_abrev']);
			$cod_repetido = $this->is_categorias->existCodAbrev($category['codigo_abrev']);
			if($cod_repetido) {
				$errors['codigo_abrev'] = 'El código de abreviación ya existe. Debe elejir otro.';
			}
		}

		return $errors;
	}

	public function validateAddUpdated($category)
	{
		$errors = false;

		if($category['nombre'] == '') {
			$errors['nombre'] = 'El nombre es obligatorio';
		}

		if($category['codigo_abrev'] == '')
		{
			$errors['codigo_abrev'] = 'El código de abreviación es obligatoria';

		} else {
			$category['codigo_abrev'] = strtoupper($category['codigo_abrev']);
			$cod_repetido = $this->is_categorias->existCodAbrev($category['codigo_abrev']);
			if($cod_repetido) {
				$category_repeated = $this->get_categorias->getById($category['id_categorias']);
				if($category_repeated['codigo_abrev'] != $category['codigo_abrev']) {
					$errors['codigo_abrev'] = 'El código de abreviación ya existe. Debe elejir otro.';
				}
			}
		}

		return $errors;
	}

	public function insert($category)
	{
		$category['codigo_abrev'] = strtoupper($category['codigo_abrev']);
		$insert_cat = $this->db->insert('categorias', $category);
		if($insert_cat) {
			return true;
		}else {
			return false;
		}

	}

	public function update($category)
	{
		$category['codigo_abrev'] = strtoupper($category['codigo_abrev']);



		$this->db->where('id_categorias', $category['id_categorias']);
		$this->db->update('categorias', $category);
		$update = $this->db->affected_rows();

		if($update == 1) {
			return true;
		}else {
			return false;
		}


	}

	public function erase($id_category)
	{
		$products_with_category = $this->get_productos->getByCategory($id_category);

		if(!$products_with_category)
		{
			$erase = $this->db->delete('categorias', array('id_categorias' => $id_category));
			if($erase) {
				return true;
			}
		}

		return false;


	}

}

?>
