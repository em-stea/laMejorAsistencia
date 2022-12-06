<?php 
include 'config.php';

$db = new PDO($db_dsn, $db_user, $db_pass, $db_options);

/*recibo los datos del formulario*/
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$consulta=$_POST['consulta'];
$fecha=$_POST['fecha'];

/*guardo los datos en la db*/
$sql = 'insert into Datos (nombre, telefono, email, consulta, fecha) values (?, ?, ?, ?, ?)'; //nombres de las columnas de la db
$sql_params = [$nombre, $telefono, $email, $consulta, $fecha];

$st = $db->prepare($sql);
$st->execute($sql_params);


/*mail destinatario y contenido a recibir*/
$email_to = "lamejorasistencia.org@gmail.com";
$contenido = "$nombre ha enviado un mensaje desde la web<br /> Nombre: $nombre<br />Email: $email<br /> Mensaje: $consulta";
$asunto = "Consulta desde la Web - Accidentes de Trabajo";

//Cabeceras del correo para que no llegue a spam
$header = "MIME-Version: 1.0 \r\n";
$header.= "Content-type: text/html; charset=utf-8 \r\n";

/*función para enviar mail*/
mail($email_to, $asunto, utf8_decode($contenido), $header);

//echo "<script>alert('Mensaje enviado con éxito');document.location='$regresar';</script>";
//echo '<h4>¡Mail enviado exitosamente!</h4>';
header('Location: ' . 'form-success-laboral.html#laboral');

