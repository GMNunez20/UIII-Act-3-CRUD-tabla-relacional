<?php include_once "encabezado.php" ?>

<div class="col-xs-12">
	<h1>Nuevo producto</h1>
	<form method="post" action="nuevo.php">

			<label for="VIN">VIN:</label>
			<input class="form-control" name="VIN" required type="text" id="VIN" placeholder="Escribe el VIN">

			<label for="cod_titulo">Código de título:</label>
			<input class="form-control" name="cod_titulo" required type="text" id="cod_titulo" placeholder="Código de título">

			<label for="transmision">Transmisión:</label>
			<input class="form-control" name="transmision" required type="text" id="transmision" placeholder="Transmisión">

			<label for="costo">Costo:</label>
			<input class="form-control" name="costo" required type="text" id="costo" placeholder="Costo">

			<label for="motor">Motor:</label>
			<input class="form-control" name="motor" required type="text" id="motor" placeholder="Escribe el motor">

			<label for="color">Color:</label>
			<input class="form-control" name="color" required type="text" id="color" placeholder="Escribe el color">

			<label for="serie">Serie:</label>
			<input class="form-control" name="serie" required type="text" id="serie" placeholder="Escribe la serie">

			<label for="descrip">Descripción:</label>
			<input class="form-control" name="descrip" required type="text" id="descrip" placeholder="Escribe la descripción">

			<label for="no_cil">No. de cilindros:</label>
			<input class="form-control" name="no_cil" required type="text" id="no_cil" placeholder="Escribe el No. de cilindros">

			<label for="disponible">Disponible:</label>
			<input class="form-control" name="disponible" required type="text" id="disponible" placeholder="Disponible">

		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>
<?php include_once "pie.php" ?>