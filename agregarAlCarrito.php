<?php
if (!isset($_POST["VIN"])) {
    return;
}

$vehiculo = $_POST["VIN"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM vehiculos WHERE VIN = ? LIMIT 1;");
$sentencia->execute([$vehiculo]);
$vehiculo = $sentencia->fetch(PDO::FETCH_OBJ);
# Si no existe, salimos y lo indicamos
if (!$vehiculo) {
    header("Location: ./vender.php?status=4");
    exit;
}
# Si no hay existencia...
if ($vehiculo->disponible < 1) {
    header("Location: ./vender.php?status=5");
    exit;
}
session_start();
# Buscar vehiculo dentro del cartito
$indice = false;
for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {
    if ($_SESSION["carrito"][$i]->VIN === $VIN) {
        $indice = $i;
        break;
    }
}
# Si no existe, lo agregamos como nuevo
if ($indice === false) {
    $vehiculo->cantidad = 1;
    $vehiculo->total = $vehiculo->costo;
    array_push($_SESSION["carrito"], $vehiculo);
} else {
    # Si ya existe, se agrega la cantidad
    # Pero espera, tal vez ya no haya
    $cantidadExistente = $_SESSION["carrito"][$indice]->cantidad;
    # si al sumarle uno supera lo que existe, no se agrega
    if ($cantidadExistente + 1 > $vehiculo->disponible) {
        header("Location: ./vender.php?status=5");
        exit;
    }
    $_SESSION["carrito"][$indice]->cantidad++;
    $_SESSION["carrito"][$indice]->total = $_SESSION["carrito"][$indice]->cantidad * $_SESSION["carrito"][$indice]->costo;
}
header("Location: ./vender.php");
