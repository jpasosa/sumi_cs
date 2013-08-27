
<div class="inner-content new_article">
	<div class="box_new_article">
		<div class="title"> ALTA DE PRODUCTO </div>
		<form action="<?php echo $form_action; ?>" method="post" enctype="multipart/form-data" >
			<div class="image_top">
				<img src="<?php echo ASSETS . 'frontend/images/alta_productos.png'; ?>" width="198" height="114" alt="alta" />
				<div class="code"> <!-- CODIGO DEL ARTICULO-->
				<label>Código</label>
				<input type="text" required="required" name="codigo">
				</div>
				<!-- DESCRIPCION -->
				<div class="descripcion">
					<label>Descripción:</label>
					<input type="text" required="required" name="descripcion">
				</div>
			</div>
			<div class="bottom">
				<div class="detalle"> <!-- DESCRIPCION DEL ARTICULO -->
					<label>Detalle:</label>
					<input type="text" name="detalle">
				</div>

				<div class="observaciones"> <!-- REFERENCIA DEL ARTICULO -->
					<label>Observaciones:</label>
					<textarea name="observaciones"></textarea>
				</div>

				<div class="categoria"> <!-- CATEGORIA DEL ARTICULO -->
					<label>Categoría:</label>
					<select name="categoria">
						<?php foreach ($product['id_categorias'] AS $cat): ?>
							<option value="<?php echo $cat['id_categorias']; ?>"><?php echo $cat['nombre'] . ' (' . $cat['codigo_abrev'] . ')'; ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<input class="agregar" type="submit" value="AGREGAR" />
		</form>
	</div> <!-- cierro box_new_article -->
</div> <!-- cierro inner-content new_article -->




