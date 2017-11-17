<?php

include_once("config.php");

//$_POST["id_event"] = 4;
//$_POST["fecha_inicio"] = "2017-01-01";
//$_POST["hora_inicio"] = "2017-01-01";
//$_POST["fecha_fin"] = "2017-01-01";
//$_POST["hora_fin"] = "2017-01-01";

$id = $_POST["id"];
$fecha_inicio = $_POST["start_date"];
$hora_inicio = $_POST["start_hour"];
$fecha_fin = $_POST["end_date"];
$hora_fin = $_POST["end_hour"];

$fecha_inicio = strtotime($fecha_inicio);
$fecha_inicio = date('Y-m-d H:i:s',$fecha_inicio);
$hora_inicio = strtotime($hora_inicio);
$hora_inicio = date('Y-m-d H:i:s',$hora_inicio);
$fecha_fin = strtotime($fecha_fin);
$fecha_fin = date('Y-m-d H:i:s',$fecha_fin);
$hora_fin = strtotime($hora_fin);
$hora_fin = date('Y-m-d H:i:s',$hora_fin);

$result = mysqli_query($mysqli, "UPDATE evento SET fecha_inicio='$fecha_inicio', hora_inicio='$hora_inicio', fecha_fin='$fecha_fin', hora_fin='$hora_fin' WHERE id=$id;");

$r=[];
$r["msg"] = "OK";

echo json_encode($r);

 ?>
