<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Mejor Asistencia</title>
</head>
<body>
    
<?php
include('config.php');
date_default_timezone_set("America/Argentina");
$fecha = date("d/m/Y");

header("Content-Type: text/html;charset=utf-8");
header("Content-Type: application/vnd.ms-excel charset=iso-8859-1");
$filename = "FormulariosWeb_" .$fecha. ".xls";
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Disposition: attachment; filename=" . $filename . "");


$listDB = ("SELECT * FROM Datos ORDER BY id_usuario ASC");
$DataDB = mysqli_query($con, $listDB);

?>


<table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
<thead>
    <tr style="background: #D0CDCD;">
    <th>#</th>
    <th>Id Usuario</th>
    <th>Nombre</th>
    <th>Telefono</th>
    <th>Email</th>
    <th>Consulta</th>
    <th>Fecha</th>
    </tr>
</thead>
<?php
$i =1;
    while ($varTable = mysqli_fetch_array($DataDB)) { ?>
    <tbody>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $varTable['id_usuario']; ?></td>
            <td><?php echo $varTable['Nombre']; ?></td>
            <td><?php echo $varTable['Telefono'] ; ?></td>
            <td><?php echo $varTable['Email'] ; ?></td>
            <td><?php echo $varTable['Consulta'] ; ?></td>
            <td><?php echo $varTable['Fecha'] ; ?></td>
        </tr>
    </tbody>
    
<?php } ?>
</table>

</body>
</html>
