<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM  vehiculos;");
$vehiculos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>vehiculos</h1>
		<div>
			<a class="btn btn-success" href="./formulario.php">Nuevo <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>VIN</th>
					<th>Código título</th>
					<th>Transmisión</th>
					<th>Costo</th>
					<th>Motor</th>
					<th>Color</th>
					<th>Serie</th>
					<th>Descripción</th>
					<th>No. cilindros</th>
					<th>Disponible</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($vehiculos as $vehiculo){ ?>
				<tr>
					<td><?php echo $vehiculo->id ?></td>
					<td><?php echo $vehiculo->VIN ?></td>
					<td><?php echo $vehiculo->cod_titulo ?></td>
					<td><?php echo $vehiculo->transmision ?></td>
					<td><?php echo $vehiculo->costo ?></td>
					<td><?php echo $vehiculo->motor ?></td>
					<td><?php echo $vehiculo->color ?></td>
					<td><?php echo $vehiculo->serie ?></td>
					<td><?php echo $vehiculo->descrip ?></td>
					<td><?php echo $vehiculo->no_cil ?></td>
					<td><?php echo $vehiculo->disponible ?></td>
					<td><a class="btn btn-warning" href="<?php echo "editar.php?id=" . $vehiculo->id?>"><i class="fa fa-edit"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminar.php?id=" . $vehiculo->id?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>