<?php
include_once("config.php");
session_start();
$_POST['correo'] = $_SESSION["usuario"];

$correo = $_POST['correo'];
$result = mysqli_query($mysqli, "SELECT evento.* FROM usuario INNER JOIN evento ON evento.usuario = usuario.correo where usuario.correo='$correo'");

$r = [];

while($res = mysqli_fetch_array($result)) {
    $evento = [];
    if($res["fecha_fin"] == null){
        $evento = [
            "id" => $res["id"],
            "title" => $res["titulo"],
            "start" => $res["fecha_inicio"],
            "end" => $res["fecha_inicio"],
            "allDay" => $res["dia_completo"]
        ];
    }
    else{
        $evento = [
            "id" => $res["id"],
            "title" => $res["titulo"],
            "start" => substr($res["fecha_inicio"],0,10) . " " . substr($res["hora_inicio"],-8),
            "end" => substr($res["fecha_fin"],0,10). " " . substr($res["hora_fin"],-8),
            "allDay" => $res["dia_completo"]
        ];
    }
    array_push($r, $evento);
}
$r["eventos"] = json_encode($r);

if(count($r) == 0){
    $r["msg"] = "no hay eventos registrados";
}
else{
    $r["msg"] = "OK";
}
echo json_encode($r);

 ?>
