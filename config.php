
<?php
// si se produce algun error, q aparezca en pantalla
ini_set('display_errors', 1);

$db_host = 'localhost';
$db_name = 'laMejorAsistencia_db';
$db_user = 'admin_lma';
$db_pass = 'lma2022#';

// de acá para abajo, no tocar

$db_charset = 'UTF8';
$db_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_CASE => PDO::CASE_LOWER,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

$con = mysqli_connect($db_host, $db_user, $db_pass) or die("No se ha podido conectar al Servidor");
$db = mysqli_select_db($con, $db_name) or die("Error en conectar a la Base de Datos");

$db_dsn = "mysql:host=$db_host;dbname=$db_name;charset=$db_charset";
// fin config.php