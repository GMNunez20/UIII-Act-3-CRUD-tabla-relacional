<?php
if (!isset($_GET["id"])) {
    exit("No hay id");
}
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id, fecha, total FROM ventas WHERE id = ?");
$sentencia->execute([$id]);
$venta = $sentencia->fetchObject();
if (!$venta) {
    exit("No existe venta con el id proporcionado");
}

$setenciavehiculos = $base_de_datos->prepare("SELECT v.VIN, v.descrip, v.costo, vv.cantidad
FROM vehiculos v
INNER JOIN 
vehiculos_vendidos vv
ON v.id = vv.id_vehiculo
WHERE vv.id_venta = ?");
$setenciavehiculos->execute([$id]);
$vehiculos = $setenciavehiculos->fetchAll();
if (!$vehiculos) {
    exit("No hay vehiculos");
}

?>
<style>
    * {
        font-size: 20px;
        font-family: 'Times New Roman';
    }

    td,
    th,
    tr,
    table {
        border-top: 1px solid black;
        padding-top: 10px;
        padding-bottom: 10px;
        border-collapse: collapse;
    }

    td.vehiculo,
    th.vehiculo {
        width: 80px;
        max-width: 80px;
    }

    td.cantidad,
    th.cantidad {
        padding-left: 45px;
        width: 150px;
        max-width: 150px;
        word-break: break-all;
    }

    td.costo,
    th.costo {
        width: 130px;
        max-width: 130px;
        word-break: break-all;
        text-align: right;
    }

    .centrado {
        text-align: center;
        align-content: center;
    }

    .ticket {
        width: 700px;
        max-width: 700px;
    }

    img {
        border-radius: 50%;
        max-width: 100px;
        width: 100px;
    }

    @media print {

        .oculto-impresion,
        .oculto-impresion * {
            display: none !important;
        }
    }
</style>

<body>
    <div class="ticket">
        <h1 style="color: lightgray;">LC</h1>
        <h1>Lote de carros.</h1>
        <p class="centrado">TICKET DE VENTA
            <br><?php echo $venta->fecha; ?>
        </p>
        <table>
            <thead>
                <tr>
                    <th class="vehiculo">CANT</th>
                    <th class="cantidad">VIN</th>
                    <th class="cantidad">DESCRIPCIÓN</th>
                    <th class="costo">COSTO</th>
                    <th class="costo">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($vehiculos as $vehiculo) {
                    $subtotal = $vehiculo->costo * $vehiculo->cantidad;
                    $total += $subtotal;
                ?>
                    <tr>
                        <td class="vehiculo"><?php echo $vehiculo->cantidad;  ?></td>
                        <td class="cantidad"><?php echo $vehiculo->VIN;  ?> </td>
                        <td class="cantidad">  <?php echo $vehiculo->descrip;  ?></td>
                        <td class="costo"><strong>$<?php echo number_format($vehiculo->costo, 2) ?></strong></td>
                        <td class="costo">$<?php echo number_format($subtotal, 2)  ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="2" style="text-align: right;">TOTAL</td>
                    <td class="costo">
                        <strong>$<?php echo number_format($total, 2) ?></strong>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="centrado">¡GRACIAS POR SU COMPRA!
        </p>
    </div>
</body>


<script>
    document.addEventListener("DOMContentLoaded", () => {
        window.print();
        setTimeout(() => {
            window.location.href = "./ventas.php";
        }, 1000);
    });
</script>