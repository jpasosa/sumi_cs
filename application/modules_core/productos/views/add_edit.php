<?php if (!$error_message): ?>

<?php else: ?>
	<?php foreach ($error_message as $em): ?>
			<?php echo $em; ?>
	<?php endforeach ?>
<?php endif ?>

<?php if (isset($message_error)): ?>
		<?php echo $message_error; ?>
<?php endif ?>

<?php if (isset($message_notice)): ?>
		<?php echo $message_notice; ?>
<?php endif ?>

<div class="inner-content new_article">
	<div class="box_new_article">
		<div class="title">
			<?php if ($section == 'productos.editar'): ?>
				EDICIÓN DEL PRODUCTO
			<?php else: ?>
				ALTA DEL PRODUCTO
			<?php endif; ?>
		</div>
		<form action="<?php echo $form_action; ?>" method="post" enctype="multipart/form-data" >
			<div class="image_top">
				<img src="<?php echo ASSETS . 'frontend/images/alta_productos.png'; ?>" width="198" height="114" alt="alta" />
				<div class="code"> <!-- CODIGO DEL ARTICULO-->
					<label>Código</label>
					<input type="text" name="codigo" value="<?php if($product['codigo'] != ''): echo $product['codigo']; endif; ?>">
				</div>
				<!-- DESCRIPCION -->
				<div class="descripcion">
					<label>Descripción:</label>
					<input type="text" name="descripcion" <?php if($product['descripcion'] != ''): echo $product['descripcion']; endif; ?>>
				</div>
			</div>
			<div class="bottom">
				<div class="detalle"> <!-- DESCRIPCION DEL ARTICULO -->
					<label>Detalle:</label>
					<input type="text" name="detalle" value="<?php if($product['detalle'] != ''): echo $product['detalle']; endif; ?>">
				</div>

				<div class="observaciones"> <!-- REFERENCIA DEL ARTICULO -->
					<label>Observaciones:</label>
					<textarea name="observaciones"><?php if($product['observaciones'] != ''): echo $product['observaciones']; endif; ?></textarea>
				</div>

				<div class="categoria"> <!-- CATEGORIA DEL ARTICULO -->
					<label>Categoría:</label>
					<select name="id_categorias">
						<?php foreach ($categorys AS $cat): ?>
							<option value="<?php echo $cat['id_categorias']; ?>">
								<?php echo $cat['nombre'] . ' (<span style="font-weight: bold;">' . $cat['codigo_abrev'] . '</span>)'; ?>
							</option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<input class="agregar" type="submit" value="AGREGAR" />
		</form>
	</div> <!-- cierro box_new_article -->
</div> <!-- cierro inner-content new_article -->




