<?php

include_once("config.php");

$_POST["id_event"] = 4;
$_POST["fecha_inicio"] = "2017-01-01";
$_POST["hora_inicio"] = "2017-01-01";
$_POST["fecha_fin"] = "2017-01-01";
$_POST["hora_fin"] = "2017-01-01";

$id = $_POST["id_event"];
$fecha_inicio = $_POST["fecha_inicio"];
$hora_inicio = $_POST["hora_inicio"];
$fecha_fin = $_POST["fecha_fin"];
$hora_fin = $_POST["hora_fin"];

$result = mysqli_query($mysqli, "UPDATE evento SET fecha_inicio='$fecha_inicio', hora_inicio='$hora_inicio', fecha_fin='$fecha_fin', hora_fin='$hora_fin' WHERE id=$id;");



 ?>
