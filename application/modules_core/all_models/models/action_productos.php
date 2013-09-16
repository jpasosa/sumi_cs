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
		} else {
			$valid_codigo = $this->validateCodigo($product['codigo']);
			if ($valid_codigo['validado'] == false) {
				$errors['codigo'] = $valid_codigo['message'];
			}
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
		$product['codigo'] = $this->putWellCodigo($product['codigo']);
		$insert_prod = $this->db->insert('productos', $product);
		if($insert_prod) {
			return true;
		}else {
			return false;
		}

	}

	public function update($product)
	{
		$product['codigo'] = $this->putWellCodigo($product['codigo']);
		$this->db->where('id_productos', $product['id_productos']);
		$this->db->update('productos', $product);
		$update = $this->db->affected_rows();
		if($update == 1) {
			return true;
		}else {
			return false;
		}


	}

	// VALIDA EL CAMPO CODIGO
	private function validateCodigo($code) {
		$ret['validado']	= true;
		$ret['message']	= '';
		$code 			= trim($code);
		$code_explode 	= explode(" ", $code);


		// Si no son dos terminos esta mal el codigo. Deben ser dos términos separados por un espacio.
		if(count($code_explode) != 2) {
			$ret['validado'] 	= false;
			$ret['message'] = 'Código incorrecto. Deben ser dos términos separados por un espacio';
			return $ret;
		} else {
			$cod_abrev = strtoupper($code_explode[0]);
			$numeros 	= $code_explode[1];
		}

		// CONTROLA QUE EXISTA EL CODIGO DE ABREVIACION
		$exist_abrev = $this->get_categorias->getByCodigoAbrev($cod_abrev);
		if(!$exist_abrev) {
			$ret['validado'] 	= false;
			$ret['message'] 	= 'El código de la categoria cargado no existe.';
			return $ret;
		}

		// CONTROLA QUE LOS NUMEROS NO SE PASEN DE 5CARACTERES Y QUE SEAN SOLO NUMEROS
		$patron = "/^[[:digit:]]+$/";
		if (preg_match($patron, $numeros)) {
			$cant_numeros = strlen($numeros);
			if($cant_numeros > 5) {
				$ret['validado'] 		= false;
				$ret['message'] 	= 'El código está mal escrito. Hay más de 5 dígitos en los números.';
				return $ret;
			}
		} else {
			$ret['validado'] 		= false;
			$ret['message'] 	= 'Código incorrecto. No van letras en numeración.';
			return $ret;
		}

		// CONTROLA QUE NO EXISTA EL CÓDIGO
		$code_for_insert = $this->putWellCodigo($code);
		$exist_code = $this->is_productos->existCodigo($code_for_insert);
		if($exist_code) {
			$ret['validado'] 		= false;
			$ret['message'] 	= 'Código ya existente.';
			return $ret;
		}

		return $ret;
	}

	// PONE DE LA FORMA QUE DEBE IR ORDENADAMENTE EL CODIGO DEL PRODUCTO
	private function putWellCodigo($code) {
		$code = trim($code);
		$code_explode = explode(" ", $code);

		// CODIFICO LOS NUMEROS
		$numeros	= $code_explode[1];
		$count_num = mb_strlen( $numeros );
		if($count_num == 1) {
			$numeros = '0000' . $numeros;
		}elseif ($count_num == 2) {
			$numeros = '000' . $numeros;
		}elseif ($count_num == 3) {
			$numeros = '00' . $numeros;
		}elseif ($count_num == 4) {
			$numeros = '0' . $numeros;
		}
		$code = strtoupper($code_explode[0]) . ' - ' . $numeros;
		return $code;
	}

	// SACA EL GUION DEL MEDIO DEL PRODUCTO, PARA QUE PODAMOS EDITARLO
	public function removeCodeGuion($code) {
		$code = trim($code);
		$code_explode = explode("-", $code);
		if(isset($code_explode[0]) && isset($code_explode[1]))
		{
			$cod_abrev		= trim($code_explode[0]);
			$numeros 		= trim($code_explode[1]);
			$code 			= $cod_abrev . ' ' . $numeros;
		}


		return $code;
	}



}

?>
