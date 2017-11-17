<?php
include_once("config.php");

$datetime = "01/02/2017" . ' ' . "05:00";
$datetime = mysqli_real_escape_string($mysqli,$datetime);
$datetime = strtotime($datetime);
$datetime = date('Y-m-d H:i:s',$datetime);

$_POST["titulo"] = "new1";
$_POST["fecha_inicio"] = $datetime;
$_POST["hora_inicio"] = $datetime;
$_POST["fecha_fin"] = $datetime;
$_POST["hora_fin"] = $datetime;
$_POST["dia_completo"] = 1;
$_POST["usuario"] = "andresd55@hotmail.com";

$titulo = mysqli_real_escape_string($mysqli, $_POST["titulo"]);
$fecha_inicio = mysqli_real_escape_string($mysqli, $_POST["fecha_inicio"]);
$hora_inicio = mysqli_real_escape_string($mysqli, $_POST["hora_inicio"]);
$fecha_fin = mysqli_real_escape_string($mysqli, $_POST["fecha_fin"]);
$hora_fin = mysqli_real_escape_string($mysqli, $_POST["hora_fin"]);
$dia_completo = mysqli_real_escape_string($mysqli, $_POST["dia_completo"]);
$usuario = mysqli_real_escape_string($mysqli, $_POST["usuario"]);

$result = mysqli_query($mysqli, "insert into evento(titulo,fecha_inicio,hora_inicio,fecha_fin,hora_fin,dia_completo,usuario) VALUES('$titulo','$fecha_inicio','$hora_inicio','$fecha_fin','$hora_fin',$dia_completo,'$usuario')");

 ?>
