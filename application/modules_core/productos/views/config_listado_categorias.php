
<?php $this->load->view('config'); ?>

<div class="col-md-12">
	<div class="col-md-2">
	</div>

	<div class="col-md-6">
		<table class="table  table-condensed">
			<tr>
				<th><strong>CODIGO</strong></th>
				<th><strong>NOMBRE</strong></th>
				<th><strong>ACCIONES</strong></th>
			</tr>
			<?php foreach ($categorias AS $cat): ?>
				<tr>
					<td>
						<?php echo $cat['codigo_abrev']; ?>
					</td>
					<td>
						<?php echo $cat['nombre']; ?>
					</td>
					<td  class="actions">
						<a href="<?php echo site_url('productos/editar/' . $cat['id_categorias']);?>">
							<img class="edit" src="<?php echo ASSETS . 'frontend/images/icons/edit_30.png'; ?>" alt="editar" title="Editar" width="20" height="20" />
						</a>
						<a href="#">
							<img class="del del_producto" id="<?php echo $cat['id_categorias']; ?>" src="<?php echo ASSETS . 'frontend/images/icons/del_30.png'; ?>" alt="eliminar" title="Borrar" width="20" height="20" />
						</a>
					</td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>

	<div class="col-md-4">
	</div>

</div>

