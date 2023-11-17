<?php
#Salir si alguno de los datos no está presente
if( !isset($_POST["id"]) ||
	!isset($_POST["VIN"]) || 
	!isset($_POST["cod_titulo"]) || 
	!isset($_POST["transmision"]) || 
	!isset($_POST["costo"]) || 
	!isset($_POST["motor"]) || 
	!isset($_POST["color"]) ||
	!isset($_POST["serie"]) ||
	!isset($_POST["descrip"]) ||
	!isset($_POST["no_cil"]) ||
	!isset($_POST["disponible"]))


#Si todo va bien, se ejecuta esta parte del código...

$contraseña = "";
$usuario = "root";
$nombre_base_de_datos = "bd_lotedecarros";
try{
	$base_de_datos = new PDO('mysql:host=localhost;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
	 $base_de_datos->query("set names utf8;");
    $base_de_datos->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base_de_datos->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}catch(Exception $e){
	echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}
$id = $_POST["id"];
$VIN = $_POST["VIN"];
$cod_titulo = $_POST["cod_titulo"];
$transmision = $_POST["transmision"];
$costo = $_POST["costo"];
$motor = $_POST["motor"];
$color = $_POST["color"];
$serie = $_POST["serie"];
$descrip = $_POST["descrip"];
$no_cil = $_POST["no_cil"];
$disponible = $_POST["disponible"];

$sentencia = $base_de_datos->prepare("UPDATE vehiculos SET VIN = ?, cod_titulo = ?, transmision = ?, costo = ?, motor = ?, color = ?, serie = ?, descrip = ?, no_cil = ?, disponible = ? WHERE id = ?;");
$resultado = $sentencia->execute([$VIN, $cod_titulo, $transmision, $costo, $motor, $color, $serie, $descrip, $no_cil, $disponible, $id]);

if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del vuelo";
?>