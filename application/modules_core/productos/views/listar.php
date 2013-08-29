<?php if (!$error_message): ?>

<?php else: ?>
    <?php foreach ($error_message as $em): ?>
            <?php echo $em; ?>
    <?php endforeach ?>
<?php endif ?>

<?php if ($this->session->flashdata('flash_notice')): ?> <!-- TRABAJO CREADO CORRECTAMENTE -->
	<div class="alert-message alert-success" >
		<a class="close" data-dismiss="alert" href="#">&times;</a>
		<?php echo $this->session->flashdata('flash_notice'); ?>
	</div>
<?php endif ?>

<?php if (isset($message_error)): ?>
        <?php echo $message_error; ?>
<?php endif ?>

<?php if (isset($message_notice)): ?>
        <?php echo $message_notice; ?>
<?php endif ?>

<div class="inner-content list_article">
<table id="kurosawa">
	<col /><col /><col /><col /><col /><col />
	<caption>LISTADO DE PRODUCTOS</caption>
	<thead>
	<tr>
	<th>CODIGO</th>
	<th>DESCRIPCION</th>
	<th>DETALLE</th>
	<th>OBSERVACIONES</th>
	<th>CATEGORIA</th>
	<th width="120" >Acciones</th>
	</tr>
	</thead>
	<tbody>
		<?php foreach ($products AS $pr): ?>
			<tr>
				<td>
					<?php echo $pr['codigo']; ?>
				</td>
				<td>
					<?php echo $pr['descripcion']; ?>
				</td>
				<td>
					<?php echo $pr['detalle']; ?>
				</td>
				<td>
					<?php echo $pr['observaciones']; ?>
				</td>
				<td>
					<?php echo $pr['nombre']; ?>
				</td>
				<td  class="actions">
					<a href="<?php echo site_url('productos/ver/' . $pr['id_productos']);?>">
						<img class="view" src="<?php echo ASSETS . 'frontend/images/icons/view_30.png'; ?>" alt="ver" title="Ver" width="15" height="15" />
					</a>
					<a href="<?php echo site_url('productos/editar/' . $pr['id_productos']);?>">
						<img class="edit" src="<?php echo ASSETS . 'frontend/images/icons/edit_30.png'; ?>" alt="editar" title="Editar" width="15" height="15" />
					</a>
					<a href="#">
						<img class="del del_producto" id="<?php echo $pr['id_productos']; ?>" src="<?php echo ASSETS . 'frontend/images/icons/del_30.png'; ?>" alt="eliminar" title="Borrar" width="15" height="15" />
					</a>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>

</div> <!-- cierro inner-content list_article -->




