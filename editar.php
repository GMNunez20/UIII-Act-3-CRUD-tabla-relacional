<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM vehiculos WHERE id = ?;");
$sentencia->execute([$id]);
$vehiculo = $sentencia->fetch(PDO::FETCH_OBJ);
if($vehiculo === FALSE){
	echo "¡No existe algún vehiculo con ese ID!";
	exit();
}

?>
<?php include_once "encabezado.php" ?>
	<div class="col-xs-12">
		<h1>Editar vehiculo con el ID <?php echo $vehiculo->id; ?></h1>
		<form method="post" action="guardarDatosEditados.php">
			<input type="hidden" name="id" value="<?php echo $vehiculo->id; ?>">
			<label for="VIN">VIN:</label>
			<input value="<?php echo $vehiculo->VIN ?>" class="form-control" name="VIN" required type="text" id="VIN" placeholder="Escribe el VIN">

			<label for="cod_titulo">Código de título:</label>
			<input value="<?php echo $vehiculo->cod_titulo ?>" class="form-control" name="cod_titulo" required type="text" id="cod_titulo" placeholder="Código de título">

			<label for="transmision">Transmisión:</label>
			<input value="<?php echo $vehiculo->transmision ?>" class="form-control" name="transmision" required type="text" id="transmision" placeholder="Transmisión">

			<label for="costo">Costo:</label>
			<input value="<?php echo $vehiculo->costo ?>" class="form-control" name="costo" required type="text" id="costo" placeholder="Costo">

			<label for="motor">Motor:</label>
			<input value="<?php echo $vehiculo->motor ?>" class="form-control" name="motor" required type="text" id="motor" placeholder="Escribe el motor">

			<label for="color">Color:</label>
			<input value="<?php echo $vehiculo->color ?>" class="form-control" name="color" required type="text" id="color" placeholder="Escribe el color">

			<label for="serie">Serie:</label>
			<input value="<?php echo $vehiculo->serie ?>" class="form-control" name="serie" required type="text" id="serie" placeholder="Escribe la serie">

			<label for="descrip">Descripción:</label>
			<input value="<?php echo $vehiculo->descrip ?>" class="form-control" name="descrip" required type="text" id="descrip" placeholder="Escribe la descripción">

			<label for="no_cil">No. de cilindros:</label>
			<input value="<?php echo $vehiculo->no_cil ?>" class="form-control" name="no_cil" required type="text" id="no_cil" placeholder="Escribe el No. de cilindros">


			<label for="disponible">Disponible:</label>
			<input value="<?php echo $vehiculo->disponible ?>" class="form-control" name="disponible" required type="text" id="disponible" placeholder="Disponible">
			
			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./listar.php">Cancelar</a>
		</form>
	</div>
<?php include_once "pie.php" ?>
