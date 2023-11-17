<?php
#Salir si alguno de los datos no está presente
if
(!!isset($_POST["VIN"]) || 
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

include_once "base_de_datos.php";
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

$sentencia = $base_de_datos->prepare("INSERT INTO `vehiculos`(`VIN`, `cod_titulo`, `transmision`, `costo`, `motor`, `color`, `serie`, `descrip`, `no_cil`, `disponible`)  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$VIN, $cod_titulo, $transmision, $costo, $motor, $color, $serie, $descrip, $no_cil, $disponible]);

if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>
<?php include_once "pie.php" ?>