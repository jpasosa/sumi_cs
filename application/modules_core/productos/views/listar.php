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




<div class="inner-content list_article">
<div class=".col-md-1"> </div>

<div class=".col-md-10">

	<div class="alert alert-error fade in">
		<a class="close" data-dismiss="alert">×</a>
		<strong>Error!</strong>This is a fatal error.
	</div>

	<?php if ($this->session->flashdata('flash_notice')): ?> <!-- TRABAJO CREADO CORRECTAMENTE -->
		<div class="alert alert-success fade in" >
			<a class="close" data-dismiss="alert" href="#">&times;</a>
			<?php echo $this->session->flashdata('flash_notice'); ?>
		</div>
	<?php endif ?>

	<table class="table  table-condensed">
		<tr>
			<th><strong>CODIGO</strong></th>
			<th><strong>DESCRIPCION</strong></th>
			<th><strong>DETALLE</strong></th>
			<th><strong>OBSERVACIONES</strong></th>
			<th><strong>CATEGORIA</strong></th>
			<th><strong>ACCIONES</strong></th>
		</tr>
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
						<img class="view" src="<?php echo ASSETS . 'frontend/images/icons/view_30.png'; ?>" alt="ver" title="Ver" width="20" height="20" />
					</a>
					<a href="<?php echo site_url('productos/editar/' . $pr['id_productos']);?>">
						<img class="edit" src="<?php echo ASSETS . 'frontend/images/icons/edit_30.png'; ?>" alt="editar" title="Editar" width="20" height="20" />
					</a>
					<a href="#">
						<img class="del del_producto" id="<?php echo $pr['id_productos']; ?>" src="<?php echo ASSETS . 'frontend/images/icons/del_30.png'; ?>" alt="eliminar" title="Borrar" width="20" height="20" />
					</a>
				</td>
			</tr>
		<?php endforeach ?>
	</table>

</div>

<div class=".col-md-1">

</div>

</div> <!-- cierro inner-content list_article -->




