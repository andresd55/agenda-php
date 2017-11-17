<?php
include_once("config.php");
session_start();

//$datetime = "01/02/2017" . ' ' . "05:00";
//$datetime = mysqli_real_escape_string($mysqli,$datetime);
//$datetime = strtotime($datetime);
//$datetime = date('Y-m-d H:i:s',$datetime);
//
//$_POST["titulo"] = "new1";
//$_POST["fecha_inicio"] = $datetime;
//$_POST["hora_inicio"] = $datetime;
//$_POST["fecha_fin"] = $datetime;
//$_POST["hora_fin"] = $datetime;
//$_POST["dia_completo"] = 1;
//$_POST["usuario"] = "andresd55@hotmail.com";

$titulo = mysqli_real_escape_string($mysqli, $_POST["titulo"]);
$fecha_inicio = mysqli_real_escape_string($mysqli, $_POST["start_date"]);
$hora_inicio = $_POST["start_hour"] == "" ? 'NULL' : mysqli_real_escape_string($mysqli, $_POST["start_hour"]);
$fecha_fin = $_POST["end_date"] == "" ? 'NULL' : mysqli_real_escape_string($mysqli, $_POST["end_date"]);
$hora_fin = $_POST["end_hour"] == "" ? 'NULL' : mysqli_real_escape_string($mysqli, $_POST["end_hour"]);
$dia_completo = mysqli_real_escape_string($mysqli, $_POST["allDay"]);
$usuario = mysqli_real_escape_string($mysqli, $_SESSION["usuario"]);

$fecha_inicio = strtotime($fecha_inicio);
$fecha_inicio = date('Y-m-d H:i:s',$fecha_inicio);
if($hora_inicio != 'NULL'){
    $hora_inicio = strtotime($hora_inicio);
    $hora_inicio = "'".date('Y-m-d H:i:s',$hora_inicio)."'";
}
if($fecha_fin != 'NULL'){
    $fecha_fin = strtotime($fecha_fin);
    $fecha_fin = "'".date('Y-m-d H:i:s',$fecha_fin)."'";
}
if($hora_fin != 'NULL'){
    $hora_fin = strtotime($hora_fin);
    $hora_fin = "'".date('Y-m-d H:i:s',$hora_fin)."'";
}

$result = mysqli_query($mysqli, "insert into evento(titulo,fecha_inicio,hora_inicio,fecha_fin,hora_fin,dia_completo,usuario) VALUES('$titulo','$fecha_inicio',$hora_inicio,$fecha_fin,$hora_fin,$dia_completo,'$usuario')");
$r=[];
$r["msg"] = "OK";
$r["resulr"] =$result;
$r["error"] =mysqli_error($mysqli);

echo json_encode($r);
 ?>
