<?php
session_start();
include_once "encabezado.php";
if (!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
$granTotal = 0;
?>
<div class="col-xs-12">
	<h1>Vender</h1>
	<?php
	if (isset($_GET["status"])) {
		if ($_GET["status"] === "1") {
	?>
			<div class="alert alert-success">
				<strong>¡Correcto!</strong> Venta realizada correctamente
			</div>
		<?php
		} else if ($_GET["status"] === "2") {
		?>
			<div class="alert alert-info">
				<strong>Venta cancelada</strong>
			</div>
		<?php
		} else if ($_GET["status"] === "3") {
		?>
			<div class="alert alert-info">
				<strong>Ok</strong> vehiculo quitado de la lista
			</div>
		<?php
		} else if ($_GET["status"] === "4") {
		?>
			<div class="alert alert-warning">
				<strong>Error:</strong> El vehiculo que buscas no existe
			</div>
		<?php
		} else if ($_GET["status"] === "5") {
		?>
			<div class="alert alert-danger">
				<strong>Error: </strong>El vehiculo está agotado
			</div>
		<?php
		} else {
		?>
			<div class="alert alert-danger">
				<strong>Error:</strong> Algo salió mal mientras se realizaba la venta
			</div>
	<?php
		}
	}
	?>
	<br>
	<form method="post" action="agregarAlCarrito.php">
		<label for="modelo">VIN:</label>
		<input autocomplete="off" autofocus class="form-control" name="VIN" required type="text" id="VIN" placeholder="Escribe el VID del vehiculo">
	</form>
	<br><br>
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
				<th>Cantidad</th>
				<th>Total</th>
				<th>Quitar</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($_SESSION["carrito"] as $indice => $vehiculo) {
				$granTotal += $vehiculo->total;
			?>
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
					<td>
						<form action="cambiar_cantidad.php" method="post">
							<input name="indice" type="hidden" value="<?php echo $indice; ?>">
							<input min="1" name="cantidad" class="form-control" required type="number" step="1" value="<?php echo $vehiculo->cantidad; ?>">
						</form>
					</td>
					<td><?php echo $vehiculo->total ?></td>
					<td><a class="btn btn-danger" href="<?php echo "quitarDelCarrito.php?indice=" . $indice ?>"><i class="fa fa-trash"></i></a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

	<h3>Total: <?php echo $granTotal; ?></h3>
	<form action="./terminarVenta.php" method="POST">
		<input name="total" type="hidden" value="<?php echo $granTotal; ?>">
		<button type="submit" class="btn btn-success">Terminar venta</button>
		<a href="./cancelarVenta.php" class="btn btn-danger">Cancelar venta</a>
	</form>
</div>
<?php include_once "pie.php" ?>